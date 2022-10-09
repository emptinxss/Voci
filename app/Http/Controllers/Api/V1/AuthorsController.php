<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Validation\Rule;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\AuthorsResource;
use App\Http\Resources\V1\AuthorsCollection;
use App\Filters\V1\AuthorsFilter;
use App\Http\Controllers\Api\V1\ResponseController;
use Illuminate\Support\Facades\Validator;

class AuthorsController extends Controller
{
    //----------------INDEX--------------------

    public function index(Request $request, ResponseController $response)
    {
        $filter = new AuthorsFilter();
        $filterItems = $filter->transform($request);

        $includePosts = $request->query('includePosts');

        $author = Author::where($filterItems);

        if ($includePosts) {
            $author = $author->with('posts');
        }

        $filteredAuthor = new AuthorsCollection($author->paginate()->appends($request->query())); //append filter on the link pages

        if (count($filteredAuthor) > 0) {

            return $response->succResponse($filteredAuthor, "Authors Successfully Found.");
        } else {

            return $response->succResponse($filteredAuthor, "NOT FOUND. Author's list is empty.", 404);
        }
    }

    //----------------STORE--------------------

    public function store(Request $request, ResponseController $response)
    {

        $validator = $this->validateRequest($request);

        if ($validator->fails()) {

            return $response->errResponse('Validation Error.', $validator->errors(), 400);
        } else {

            $author = Author::create($request->all());

            return $response->succResponse($author, "Author created succesfully.", 201);
        }
    }

    //----------------SHOW--------------------

    public function show($id, ResponseController $response)
    {
        $author = Author::find($id);

        if ($author) {

            $includePosts = request()->query('includePosts');
            if ($includePosts) {
                $aut = new AuthorsResource($author->loadMissing('posts'));
                return $response->succResponse($aut, "Author Succesfully Found.", 200);
            } else {
                $aut = new AuthorsResource($author);
                return $response->succResponse($aut, "Author Succesfully Found.", 200);
            }
        } else {
            return $response->errResponse('Error, author not found.', "There is no author with id of $id", 404);
        }
    }

    //----------------UPDATE--------------------

    public function update($id, Request $request, ResponseController $response)
    {
        $author = Author::find($id);
        if ($author) {
            $validator = $this->validateRequest($request);

            if ($validator->fails()) {
                return $response->errResponse('Error, author not updated.', $validator->errors(), 400);
            } else {
                $author->update($request->all());
                return $response->succResponse($author, "Author updated succesfully.", 200);
            }
        } else {
            return $response->errResponse('Error, author not found.', "There is no author with id of $id", 404);
        }
    }

    //----------------DELETE--------------------

    public function destroy(ResponseController $response, $id)
    {
        $author = Author::find($id);
        if ($author) {

            $author->delete();
            return $response->succResponse($author, "Author deleted succesfully.", 200);
        } else {

            return $response->errResponse('Error, author not found.', "There is no author with id of $id.", 404);
        }
    }

    //----------------VALIDATE--------------------

    public function validateRequest(Request $request)
    {
        $uniqueRule =  Rule::unique('authors')->where(function ($query) use ($request) {
            $query->where('name', $request['name']);
            $query->where('surname', $request['surname']);
        });

        $method = $request->getMethod();

        if ($method == 'PUT' || $method == 'POST') {
            $rules = [

                'name' => ['required', 'max:255', $uniqueRule],
                'surname' => ['required', 'max:255']

            ];
        } else {
            $rules = [

                'name' => ['sometimes', 'required', 'max:255', $uniqueRule],
                'surname' => ['sometimes', 'required', 'max:255']

            ];
        }

        $messages =  [
            "name.unique" => 'There is already an author with this first name and last name. ',
        ];


        $validator = Validator::make($request->all(), $rules, $messages);

        return $validator;
    }
}
