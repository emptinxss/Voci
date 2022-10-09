<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\MediaResource;
use App\Http\Resources\V1\MediaCollection;
use App\Filters\V1\MediaFilter;
use Illuminate\Support\Facades\Validator;

class MediaController extends Controller
{
    //----------------INDEX--------------------

    public function index(Request $request, ResponseController $response)
    {
        $filter = new MediaFilter();
        $filterItems = $filter->transform($request);

        $includePosts = $request->query('includePosts');

        $media = Media::where($filterItems);

        if ($includePosts) {
            $media = $media->with('posts');
        }

        $filteredMedia = new MediaCollection($media->paginate()->appends($request->query())); //append filter on the link pages

        if (count($filteredMedia) > 0) {

            return $response->succResponse($filteredMedia, "Media Successfully Found.");
        } else {

            return $response->succResponse($filteredMedia, "NOT FOUND. media list is empty.", 404);
        }
    }

    //----------------STORE--------------------

    public function store(Request $request, ResponseController $response)
    {
        $validator = $this->validateRequest($request);

        if ($validator->fails()) {

            return $response->errResponse('Validation Error.', $validator->errors(), 400);
        } else {

            $media = Media::create($request->all());

            return $response->succResponse($media, "Media created succesfully.", 201);
        }
    }

    //----------------SHOW--------------------

    public function show($id, ResponseController $response)
    {
        $media = Media::find($id);

        if ($media) {

            $includePosts = request()->query('includePosts');
            if ($includePosts) {
                $med = new MediaResource($media->loadMissing('posts'));
                return $response->succResponse($med, "Media Succesfully Found.", 200);
            } else {
                $med = new MediaResource($media);
                return $response->succResponse($med, "Media Succesfully Found.", 200);
            }
        } else {
            return $response->errResponse('Error, media not found.', "There is no media with id of $id", 404);
        }
    }

    //----------------UPDATE--------------------

    public function update(ResponseController $response, $id, Request $request)
    {

        $media = Media::find($id);
        if ($media) {
            $validator = $this->validateRequest($request);

            if ($validator->fails()) {
                return $response->errResponse('Error, media not updated.', $validator->errors(), 400);
            } else {
                $media->update($request->all());
                return $response->succResponse($media, "Media updated succesfully.", 200);
            }
        } else {
            return $response->errResponse('Error, media not found.', "There is no media with id of $id", 404);
        }
    }

    //----------------DELETE--------------------

    public function destroy($id, ResponseController $response)
    {

        $media = Media::find($id);
        if ($media) {

            $media->delete();
            return $response->succResponse($media, "Media deleted succesfully.", 200);
        } else {

            return $response->errResponse('Error, media not found.', "There is no media with id of $id.", 404);
        }
    }

    //----------------VALIDATE--------------------

    public function validateRequest(Request $request)
    {


        $method = $request->getMethod();

        if ($method == 'PUT' || $method == 'POST') {
            $rules = [

                'name' => ['required', 'max:255'],
                'category' => ['required', 'max:255'],
                'description' => ['required', 'max:255'],
                'file' => ['required', 'max:255']

            ];
        } else {
            $rules = [

                'name' => ['sometimes', 'required', 'max:255'],
                'category' => ['sometimes', 'required', 'max:255'],
                'description' => ['sometimes', 'required', 'max:255'],
                'file' => ['sometimes', 'required', 'max:255']

            ];
        }


        $validator = Validator::make($request->all(), $rules);

        return $validator;
    }
}
