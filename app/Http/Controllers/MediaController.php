<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class MediaController extends Controller
{
    //----------------INDEX--------------------

    public function index()
    {
        $media = Media::all();

        return view('media.index', compact('media'));
    }

    //----------------CREATE--------------------

    public function create()
    {
        return view('media.create');
    }
    //----------------STORE--------------------

    public function store(Request $request, Media $media)
    {

        $request = $this->validateRequest($request);


        $media->name = $request->input('name');
        $media->category = $request->input('category');
        $media->description = $request->input('description');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/media/', $filename);
            $media->file = $filename;
        }
        $media->save();

        return redirect('media/create')->with('status', 'Media added succesfully.')->with('desc', 'You can create another media');
    }

    //----------------EDIT--------------------

    public function edit(Media $media)
    {
        return view('media.edit', ['media' => $media]);
    }

    //----------------UPDATE--------------------

    public function update(Media $media, Request $request)
    {

        $request = $this->validateRequest($request);

        $media->name = $request->input('name');
        $media->category = $request->input('category');
        $media->description = $request->input('description');
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/media', $filename);
            $media->file = $filename;
        }
        $media->save();

        return redirect('/media')->with('status', 'Media updated succesfully.');
    }

    //----------------DELETE--------------------

    public function destroy(Media $media)
    {

        $media->delete();

        return redirect('/media')->with('delete', 'Media deleted succesfully.');
    }

    //----------------VALIDATE--------------------

    public function validateRequest(Request $request)
    {

        $request->validate([
            'name' => 'required', 'max:255',
            'category' => 'required', 'max:255',
            'description' => 'required', 'max:255',
            'file' => 'required|max:10000',
        ]);
        return $request;
    }
}
