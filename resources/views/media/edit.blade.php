@extends('layout.layout')
@section('title')
    Edit media
@endsection

@section('content')
    <div style="width: 900px;" class=" container max-w-full mx-auto pt-4">
        <h1 class="text-4xl mb-4 text-center text-gray-700 my-6 dosis">Edit media</h1>

        @include('partials.messages')


        <form method="POST" action="/media/{{ $media->id }}" enctype="multipart/form-data"> 

            @method('PUT') 

            @csrf 

            <div class="w-full md:w-1/2  mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Media name:
                </label>
                <input
                    class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-100 rounded py-3 px-4 mb-3 leading-tight outline-none focus:bg-white focus:border-gray-700"
                    id="name" name="name" value="{{ $media->name }}">
            </div>
            <div class="w-full md:w-1/2  mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Category:
                </label>
                <input
                    class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-100 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-700"
                    id="category" name="category" value="{{ $media->category }}">
            </div>
            <div class="w-full md:w-1/2  mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Description:
                </label>
                <textarea
                    class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-100 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-700"
                    id="description" name="description">{{ $media->description }}</textarea>
            </div>
            <div class="w-full md:w-1/2  mb-6">
                <div class="w-full md:w-1/2  mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Media:
                    </label>
                    <input type="file" id="file" name="file"> </textarea>
                </div>


                <button type="submit"
                    class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Update</button>
                <a href="/media"
                    class="bg-gray-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Cancel</a>

        </form>

        <form method="POST" action="/media/{{ $media->id }}">
            @csrf
            @method('DELETE')


            <button
                class=" bg-red-500 text-black px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">DELETE</button>
        </form>

    </div>
@endsection
