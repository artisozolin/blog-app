@extends('layouts.app')

@section('title', 'Blog app')

@section('content')
    <main class="blog-list-page max-w-6xl mx-auto px-6 py-10">
        <div id="postsContainer" class="blog-list-container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @include('partials.postCards')
        </div>

        <div id="scrollTrigger"></div>

        <div id="scrollLoader" class="scroll-loader">
            <div class="flex items-center gap-2">
                <div class="dot animate-bounce"></div>
                <div class="dot animate-bounce [animation-delay:150ms]"></div>
                <div class="dot animate-bounce [animation-delay:300ms]"></div>
            </div>
        </div>
    </main>

    <x-edit-post-modal />
@endsection