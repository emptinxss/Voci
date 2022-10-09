@extends('layout.layout')
@section('title')
    Create posts
@endsection

@section('content')
    <div style="width: 900px;" class=" container max-w-full mx-auto pt-4">
        <h1 class="text-4xl mb-4 text-center text-gray-700 my-6 dosis">Add new posts</h1>
        @include('partials.messages')



        <form method="POST" action="/posts">

            @csrf

            <div class="w-full md:w-1/2  mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Post name:
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-2 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="name" name="post_name" value="{{ old('post_name') }}">
            </div>
            <div class="w-full md:w-1/3  mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Author:
                </label>
                <div class="relative">
                    <select
                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-2"
                        name="author_id">
                        <option selected disabled>Select Author...</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}"{{ old('author_id') == $author->id ? 'selected' : '' }}>
                                {{ ucfirst($author->name) }} {{ ucfirst($author->surname) }}
                            </option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/3  mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Media:
                </label>
                <div class="relative mb-4">
                    <select
                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 mb-2"
                        name="media_id">
                        <option selected disabled>Select Media...</option>
                        @foreach ($medias as $media)
                            <option value="{{ $media->id }}"{{ old('media_id') == $media->id ? 'selected' : '' }}>
                                {{ ucfirst($media->name) }}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
            </div>

            <button class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">
                Save
            </button>
            <a href="/posts"
                class="bg-gray-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">
                Go back
            </a>



        </form>
    </div>
@endsection
