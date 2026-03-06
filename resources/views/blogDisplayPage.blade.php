@include('partials.header')

    <main class="blog-display-page max-w-4xl mx-auto px-6 pb-12 pt-8">
        <h1 class="blog-display-title text-3xl font-bold text-gray-800 mb-4 justify-self-center">
            {{ $post->title }}
        </h1>
        @if($post->image)
            <img
                src="{{ $post->image }}"
                alt="{{ $post->title }}"
                class="blog-display-image w-full h-auto rounded-lg mb-6 object-cover"
            >
        @endif
        <div class="blog-display-description text-gray-700 leading-relaxed mb-6">
            {{ $post->content }}
        </div>
        <p class="blog-display-author text-sm text-gray-500">
            Written by <span class="font-medium">{{ $post->author_name }}</span>
        </p>
        <p class="blog-display-date text-sm text-gray-400 mt-1">
            Published on {{ $post->formattedDate() }}
        </p>
    </main>

@include('partials.footer')
