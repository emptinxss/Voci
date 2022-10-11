<?php


namespace App\Http\Controllers\Api\V1;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PostsResource;
use App\Http\Resources\V1\PostsCollection;
use App\Filters\V1\PostsFilter;
use App\Http\Controllers\Api\V1\ResponseController;
use Illuminate\Support\Facades\Validator;


class PostsController extends Controller
{
    //----------------INDEX--------------------

    public function index(Request $request, ResponseController $response)
    {
        $filter = new PostsFilter();
        $filterItems = $filter->transform($request);

        $posts = Post::where($filterItems)->paginate();

        $filteredPosts = new PostsCollection($posts->appends($request->query())); //append filter on the link pages

        if (count($filteredPosts) > 0) {

            return $response->succResponse($filteredPosts, "Media Successfully Found.");
        } else {

            return $response->succResponse($filteredPosts, "NOT FOUND. media list is empty.", 404);
        }
    }

    //----------------STORE--------------------

    public function store(Request $request, ResponseController $response)
    {

        $validator = $this->validateRequest($request);

        if ($validator->fails()) {

            return $response->errResponse('Validation Error.', $validator->errors(), 400);
        } else {

            $post = Post::create($request->all());

            return $response->succResponse($post, "Author created succesfully.", 201);
        }
    }

    //----------------SHOW--------------------

    public function show($id, ResponseController $response)
    {
        $post = Post::find($id);

        if ($post) {
            $pst = new PostsResource($post);
            return $response->succResponse($pst, "Author Succesfuly Found.", 200);
        } else {
            return $response->errResponse('Error, Post not found.', "There is no post with id of $id", 404);
        }
    }

    //----------------UPDATE--------------------

    public function update($id, Request $request, ResponseController $response)
    {
        $post = Post::find($id);
        if ($post) {
            $validator = $this->validateRequest($request);

            if ($validator->fails()) {
                return $response->errResponse('Error, Post not updated.', $validator->errors(), 400);
            } else {
                $post->update($request->all());
                return $response->succResponse($post, "Post updated succesfully.", 200);
            }
        } else {
            return $response->errResponse('Error, Post not found.', "There is no post with id of $id", 404);
        }
    }

    //----------------DELETE--------------------

    public function destroy(ResponseController $response, $id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            return $response->succResponse($post, "Post deleted succesfully.", 200);
        } else {
            return $response->errResponse('Error, author not found.', "There is no author with id of $id.", 404);
        }
    }

    //----------------VALIDATE--------------------

    public function validateRequest(Request $request)
    {

        $method = $request->getMethod();

        if ($method == 'PUT' || $method == 'POST') {
            $rules = [

                'post_name' => ['required'],
                'author_id' => ['required'],
                'media_id' => ['required']

            ];
        } else {
            $rules = [

                'post_name' => ['sometimes', 'required'],
                'author_id' => ['sometimes', 'required'],
                'media_id' => ['sometimes', 'required']

            ];
        }

        $validator = Validator::make($request->all(), $rules);


        return $validator;
    }
}
