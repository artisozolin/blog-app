@include('partials.header')

    <main class="blog-display-page">
        <h1 class="blog-display-title">
            {{ $post->title }}
        </h1>
        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}"
                 alt="{{ $post->title }}"
                 class="blog-display-image">
        @endif
        <div class="blog-display-description">
            {{ $post->content }}
        </div>
        <p class="blog-display-author">
            Written by <span class="font-medium">{{ $post->author_name }}</span>
        </p>
        <p class="blog-display-date">
            Published on {{ $post->formattedDate() }}
        </p>
    </main>

@include('partials.footer')
