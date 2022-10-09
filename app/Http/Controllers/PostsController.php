<?php


namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use App\Models\Media;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {

        $posts = Post::latest()->filter(request(['search']))->get();
        $post_row = Post::latest()->filter(request(['search']))->count();
        $authors = Author::all();
        $medias = Media::all();

        return view('posts.index', compact('posts', 'authors', 'medias', 'post_row'));
    }

    //----------------CREATE--------------------

    public function create()
    {
        $authors = Author::all();
        $medias = Media::all();

        return view('posts.create', compact('authors', 'medias'));
    }

    //----------------STORE--------------------

    public function store(Post $posts, Request $request)
    {
        $request = $this->validateRequest($request);

        $posts->create($request->all());

        return redirect('/posts/create')->with('status', 'Post added succesfully.')->with('desc', 'You can create another post.');;
    }

    //----------------EDIT--------------------

    public function edit(Post $post)
    {
        $authors = Author::all();
        $medias = Media::all();

        return view('posts.edit', compact('post', 'authors', 'medias'));
    }

    //----------------UPDATE--------------------

    public function update(Post $post, Request $request)
    {
        $request = $this->validateRequest($request);

        $post->update($request->all());

        return redirect('/posts')->with('status', 'Post update succesfully.');
    }

    //----------------DELETE--------------------

    public function destroy(Post $post)
    {

        $post->delete();

        return redirect('/posts')->with('delete', 'Post deleted succesfully.');
    }

    //----------------VALIDATE--------------------

    public function validateRequest(Request $request)
    {

        $request->validate([
            'post_name' => 'required', 'max:255',
            'author_id' => 'required',
            'media_id' => 'required',

        ]);
        return $request;
    }
}
