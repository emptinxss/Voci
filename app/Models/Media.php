<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Media extends Model
{
    use HasFactory;


    protected $fillable = [
        'name', 'category', 'description', 'file'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
