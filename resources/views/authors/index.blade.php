@extends('layout.layout')
@section('title')
    Author
@endsection


@section('content')
    <div style="width: 900px;" class=" container max-w-full mx-auto pt-4">
        <h1 class="text-4xl mb-4 text-center dosis">Authors</h1>

        @include('partials.messages')

        <a href="/authors/create"
            class=" mb-4 bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Add
            author</a>

        @foreach ($authors as $author)
            <article class="">

                <a href="/authors/{{ $author->id }}/edit" class="text-md ">
                    <div class="hover:bg-gray-100 hover:text-lg p-2">
                        <span class="text-blue-600 font-bold">
                            {{ ucfirst($author->name) }}
                        </span>


                        <p>{{ ucfirst($author->surname) }} </p>

                    </div>
                    <hr>
                </a>


            </article>
        @endforeach
    </div>
@endsection
