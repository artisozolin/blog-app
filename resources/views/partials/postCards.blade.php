@foreach($posts as $post)

    <div class="blog-post {{ $post->image ? '' : 'no-image' }}
        @auth
            {{ !$post->status ? 'disabled-ring' : '' }}
        @endauth
    ">
        @auth
            @if(!$post->status)
                <span class="disabled-badge">
                    Disabled
                </span>
            @endif
        @endauth
        @if($post->image)
            <a href="/blog/{{ $post->slug }}">
                <img src="{{ asset('storage/' . $post->image) }}"
                     alt="{{ $post->title }}"
                     class="blog-post-image">
            </a>
        @endif
            <div class="blog-post-data {{ $post->image ? '' : 'no-image' }}">
                <div class="blog-post-date">
                    <span>{{ $post->formattedDate() }}</span>
                    <span>{{ $post->readTime() }}</span>
                </div>

                @if(!$post->image)
                    <div class="blog-post-middle">
                        <h2 class="blog-post-title">{{ $post->title }}</h2>
                        <p class="blog-post-description">{{ $post->content }}</p>
                    </div>
                @else
                    <h2 class="blog-post-title">{{ $post->title }}</h2>
                    <p class="blog-post-description">{{ $post->content }}</p>
                @endif

                <div class="blog-post-footer">
                    <span class="blog-post-author">By {{ $post->author_name }}</span>
                    <div class="flex items-center gap-3">
                        @auth
                            <button class="editPostBtn"
                                    data-id="{{ $post->id }}"
                                    data-title="{{ $post->title }}"
                                    data-content="{{ $post->content }}"
                                    data-status="{{ $post->status ? 1 : 0 }}"
                                    data-date="{{ $post->published_at?->format('Y-m-d') }}"
                                    data-author="{{ $post->author_name }}">
                                Edit
                            </button>
                        @endauth
                        <a href="/blog/{{ $post->slug }}" class="blog-post-cta">Read more</a>
                    </div>
                </div>
            </div>
    </div>

@endforeach
