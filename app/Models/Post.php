<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\Media;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query
                ->select('posts.*', 'authors.name', 'authors.surname', 'media.category', 'media.description')
                ->join('authors', 'posts.author_id', '=', 'authors.id')
                ->join('media', 'posts.media_id', '=', 'media.id')
                ->where('posts.post_name', 'like', '%' . $search . '%')
                ->orwhere('authors.name', 'like', '%' . $search . '%')
                ->orwhere('authors.surname', 'like', '%' . $search . '%')
                ->orwhere('media.category', 'like', '%' . $search . '%')
                ->orwhere('media.description', 'like', '%' . $search . '%')

        );
    }

    public function authors()
    {
        return $this->belongsTo(Author::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }

    protected $fillable = [
        'post_name', 'author_id', 'media_id'
    ];
}
