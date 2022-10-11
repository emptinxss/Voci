@extends('layout.layout')
@section('title')
    Create posts
@endsection

@section('content')
    <div style="width: 900px;" class="sm:container max-w-full  mx-auto pt-4">
        <h1 class="text-4xl mb-4 text-center dosis">Posts</h1>

        @include('partials.messages')
        <div class="flex justify-between">
            <a href="/posts/create"
                class=" py-2 bg-blue-500 tracking-wide text-white px-6 inline-block  mb-auto rounded hover:shadow-lg">Add
                post</a>
            @include('partials.search')

        </div>
        @if (!$post_row)
            <div class="text-center ">
                <p>Post not found.</p>
            </div>
        @endif
        @foreach ($posts as $post)
            <article class=" mb-2 text-center border border-gray-100">
                <a href="/posts/{{ $post->id }}/edit">
                    <div class="p-2">




                        <span class="text-md font-bold text-blue-500">
                            {{ ucfirst($post->post_name) }}</span>



                        @foreach ($authors as $author)
                            @if ($post->author_id === $author->id)
                                <p class="py-1 ">
                                    {{ ucfirst($author->name) }}
                                    {{ ucfirst($author->surname) }}
                                </p>
                            @endif
                        @endforeach


                        @foreach ($medias as $media)
                            {{-- FOTO --}}
                            @if ($post->media_id === $media->id ? preg_match('(jpg|png|jpeg|gif)', $media->file) : null)
                                <div class="flex justify-center">
                                    <img src="uploads/media/{{ $media->file }}" class="max-w-4xl w-52 md:w-96" />
                                </div>
                            @endif

                            {{-- AUDIO --}}
                            @if ($post->media_id === $media->id ? preg_match('(mp3|ogg|wav)', $media->file) : null)
                                <div class="flex
                                        justify-center">
                                    <audio controls>
                                        <source src="uploads/media/{{ $media->file }}">
                                    </audio>
                                </div>
                            @endif


                            {{-- VIDEO --}}
                            @if ($post->media_id === $media->id ? preg_match('(mp4)', $media->file) : null)
                                <div class="flex justify-center">
                                    <video class="max-w-4xl max-h-fit w-52 md:w-96" controls>
                                        <source src="uploads/media/{{ $media->file }}">
                                    </video>
                                </div>
                            @endif


                            @if ($post->media_id === $media->id)
                                <p class="text-gray-700 pt-2 ">
                                    {{ ucfirst($media->description) }} </p>
                                <p class="text-sm text-white font-bold my-3"> <span
                                        class="rounded-full text-left border-blue bg-gray-500 p-1">{{ Str::upper($media->category) }}
                                    </span></p>
                            @endif
                        @endforeach
                    </div>
                </a>






            </article>
        @endforeach
    </div>
    @include('partials.footer')
@endsection
