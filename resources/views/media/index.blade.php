@extends('layout.layout')
@section('title')
    Media
@endsection


@section('content')
    <div style="width: 900px;" class=" container max-w-full mx-auto  ">
        <h1 class="text-4xl mb-4 text-center text-gray-700 my-6 dosis">Media</h1>

        @include('partials.messages')

        <a href="/media/create"
            class=" mb-4 bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Add
            media</a>

        @foreach ($media as $medias)
            <article>
                <a href="/media/{{ $medias->id }}/edit" class="text-md text-blue-500 ">

                    <div class=" hover:bg-gray-100 hover:text-lg p-2">

                        <span class="font-bold">
                            {{ Str::ucfirst($medias->name) }}
                        </span>

                        {{-- IMAGES --}}
                        @if (preg_match('(jpg|png|jpeg|gif|JPG|PNG|JPEG|GIF)', $medias->file))
                            <img src="uploads/media/{{ $medias->file }}" width="100" height="100" class="my-2">
                        @endif

                        {{-- AUDIO --}}
                        @if (preg_match('(mp3|ogg|wav|MP3|OGG|WAV)', $medias->file))
                            <audio controls class="my-2">
                                <source src="uploads/media/{{ $medias->file }}">
                            </audio>
                        @endif


                        {{-- VIDEOS --}}
                        @if (preg_match('(mp4|MP4)', $medias->file))
                            <video width="220" height="140" controls class="my-2">
                                <source src="uploads/media/{{ $medias->file }}">
                            </video>
                        @endif
                        <p class="text-sm text-gray-600 my-1"> {{ Str::ucfirst($medias->description) }}</p>
                        <p class="text-sm my-3"> <span
                                class="rounded-full text-white border-blue bg-gray-500 p-1">{{ Str::upper($medias->category) }}</span>
                        </p>


                    </div>
                    <hr>
                </a>
            </article>
        @endforeach


    </div>
@endsection
