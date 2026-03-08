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
                            <div class="flex items-center gap-3">
                                @auth
                                    <button
                                        class="editPostBtn text-xs text-yellow-600 hover:underline"
                                        data-id="{{ $post->id }}"
                                        data-title="{{ $post->title }}"
                                        data-content="{{ $post->content }}"
                                        data-status="{{ $post->status }}"
                                        data-date="{{ $post->published_at?->format('Y-m-d') }}"
                                        data-author="{{ $post->author_name }}">
                                        Edit
                                    </button>
                                @endauth
                                <a href="/blog/{{ $post->slug }}"
                                   class="blog-post-cta text-blue-600 font-medium hover:underline">
                                    Read more
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </main>

    <div id="editPostModal"
         class="edit-post-modal fixed inset-0 hidden items-center justify-center bg-black bg-opacity-40 z-50">
        <div class="edit-post-container bg-white rounded-lg shadow-lg w-full max-w-xl p-6 relative">

            <button id="closeEditPost"
                    class="edit-post-close absolute top-3 right-3 text-gray-500 hover:text-gray-700 font-bold">
                x
            </button>

            <h2 class="edit-post-title text-lg font-semibold mb-4">Edit Blog Post</h2>

            <form id="editPostForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="edit-post-input-container mb-3">
                    <label class="edit-post-label block text-sm font-medium mb-1">Title</label>
                    <input id="editTitle"
                           type="text"
                           name="title"
                           class="edit-post-input w-full border rounded px-3 py-2">
                    <p id="editTitleError" class="text-red-500 text-sm hidden"></p>
                </div>

                <div class="edit-post-input-container mb-3">
                    <label class="edit-post-label block text-sm font-medium mb-1">Image</label>
                    <input id="editImage"
                           type="file"
                           name="image"
                           accept="image/*"
                           class="edit-post-input w-full border rounded px-3 py-2">
                    <p id="editImageError" class="text-red-500 text-sm hidden"></p>
                </div>

                <div class="edit-post-input-container mb-3">
                    <label class="edit-post-label block text-sm font-medium mb-1">Content</label>
                    <textarea id="editContent"
                              name="content"
                              rows="5"
                              class="edit-post-input w-full border rounded px-3 py-2"></textarea>
                    <p id="editContentError" class="text-red-500 text-sm hidden"></p>
                </div>

                <div class="edit-post-input-container mb-3">
                    <label class="edit-post-label block text-sm font-medium mb-1">Status</label>
                    <select id="editStatus"
                            name="status"
                            class="edit-post-input w-full border rounded px-3 py-2">
                        <option value="1">Active</option>
                        <option value="0">Disabled</option>
                    </select>
                </div>

                <div class="edit-post-input-container mb-3">
                    <label class="edit-post-label block text-sm font-medium mb-1">Publish Date</label>
                    <input id="editDate"
                           type="date"
                           name="published_at"
                           class="edit-post-input w-full border rounded px-3 py-2">
                    <p id="editDateError" class="text-red-500 text-sm hidden"></p>
                </div>

                <div class="edit-post-input-container mb-3">
                    <label class="edit-post-label block text-sm font-medium mb-1">Author</label>
                    <input id="editAuthor"
                           type="text"
                           name="author_name"
                           class="edit-post-input w-full border rounded px-3 py-2">
                    <p id="editAuthorError" class="text-red-500 text-sm hidden"></p>
                </div>

                <div class="edit-post-footer flex gap-3">

                    <button id="editSubmit"
                            type="submit"
                            class="edit-post-submit flex-1 bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                        Update
                    </button>

                    <button type="button"
                            id="deletePostBtn"
                            class="edit-post-delete flex-1 bg-red-600 text-white py-2 rounded hover:bg-red-700">
                        Delete
                    </button>

                </div>

            </form>
        </div>
    </div>

@include('partials.footer')
