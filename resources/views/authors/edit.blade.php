@extends('layout.layout')
@section('title')
    Edit author
@endsection


@section('content')
    <div style="width: 900px;" class=" container max-w-full mx-auto pt-4">
        <h1 class="dosis text-4xl mb-4 text-center text-gray-700 my-6">Edit author</h1>

        @include('partials.messages')


        <form method="POST" action="/authors/{{ $author->id }}">

            @method('PUT')

            @csrf
            <div class="w-full md:w-1/2  mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    First Name
                </label>
                <input
                    class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-100 rounded py-3 px-4 mb-3 leading-tight outline-none focus:bg-white focus:border-gray-700"
                    id="name" name="name" value="{{ $author->name }}">
            </div>
            <div class="w-full md:w-1/2  mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Last Name
                </label>
                <input
                    class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-100 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-700"
                    id="surname" name="surname" value="{{ $author->surname }}">
            </div>


            <div class="w-4/5 ">
                <button
                    class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Update</button>
                <a href="/authors"
                    class="bg-gray-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Cancel</a>
            </div>

        </form>

        <div>
            <form method="POST" action="/authors/{{ $author->id }}">
                @csrf
                @method('DELETE')


                <button
                    class="bg-red-500 text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">DELETE</button>
            </form>

        </div>
    </div>
@endsection
