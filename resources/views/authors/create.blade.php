@extends('layout.layout')
@section('title')
    Create author
@endsection


@section('content')
    <h1 class=" text-4xl mb-4 text-center text-gray-700 my-6 dosis">Add new author</h1>
    <div style="width: 900px;" class=" container max-w-full mx-auto pt-4">

        @include('partials.messages')


        <form class="w-full max-w-lg" method="POST" action="/authors">

            @csrf

            <div class="w-full md:w-1/2  mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    First Name
                </label>
                <input
                    class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-100 rounded py-3 px-4 mb-3 leading-tight outline-none focus:bg-white focus:border-gray-700"
                    id="name" name="name" value=" {{ old('name') }}">
            </div>
            <div class="w-full md:w-1/2  mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Last Name
                </label>
                <input
                    class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-100 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-700"
                    id="surname" name="surname" value=" {{ old('surname') }}">
            </div>



            <button
                class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Save</button>
            <a href="/authors"
                class="bg-gray-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Go
                back</a>

        </form>
    </div>
@endsection
