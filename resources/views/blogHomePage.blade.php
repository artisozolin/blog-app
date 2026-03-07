@include('partials.header')

    <main class="blog-list-page max-w-6xl mx-auto px-6 py-10">

        <div class="blog-list-container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($posts as $post)

                <div class="blog-post bg-white rounded-lg shadow hover:shadow-md transition overflow-hidden">
                    <a href="/blog/{{ $post->slug }}">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}"
                                 alt="{{ $post->title }}"
                                 class="blog-post-image w-full h-48 object-cover">
                        @else
                            <img src="https://placehold.co/600x400"
                                 alt="Placeholder image"
                                 class="blog-post-image w-full h-48 object-cover">
                        @endif
                    </a>
                    <div class="blog-post-data p-5">
                        <div class="blog-post-date flex items-center justify-between text-sm text-gray-500 mb-2">
                            <span>
                                {{ $post->formattedDate() }}
                            </span>
                            <span>
                                {{ $post->readTime() }}
                            </span>
                        </div>
                        <h2 class="blog-post-title text-lg font-semibold text-gray-800 mb-2">
                            {{ $post->title }}
                        </h2>
                        <p class="blog-post-description text-gray-600 text-sm mb-4 line-clamp-3">
                            {{ $post->content }}
                        </p>
                        <div class="blog-post-footer flex justify-between items-center">
                            <span class="blog-post-author text-xs text-gray-500">
                                By {{ $post->author_name }}
                            </span>
                            <a href="/blog/{{ $post->slug }}"
                               class="blog-post-cta text-blue-600 font-medium hover:underline">
                                Read more
                            </a>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>

    </main>

@include('partials.footer')
