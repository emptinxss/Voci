@extends('layout.layout')
@section('title')
    Create media
@endsection

@section('content')
    <h1 class="text-4xl mb-4 text-center text-gray-700 my-6 dosis">Add new media</h1>
    <div style="width: 900px;" class=" container max-w-full mx-auto pt-4">

        @include('partials.messages')



        <form method="POST" action="/media" enctype="multipart/form-data">


            @csrf

            <div class="w-full md:w-1/2  mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Media name:
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-100 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="name" name="name" value="{{ old('name') }}">
            </div>
            <div class="w-full md:w-1/2  mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Category:
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-100 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="category" name="category" value="{{ old('category') }}">
            </div>
            <div class="w-full md:w-1/2  mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Description:
                </label>
                <textarea
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-100 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="description" name="description"> {{ old('description') }}</textarea>
            </div>
            <div class="w-full md:w-1/2  mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Media:
                </label>
                <input type="file" id="file" name="file"> </textarea>
            </div>



            <button
                class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Save</button>
            <a href="/media"
                class="bg-gray-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Go
                back</a>
        @endsection
