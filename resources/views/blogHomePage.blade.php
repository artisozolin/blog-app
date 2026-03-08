@include('partials.header')

    <main class="blog-list-page max-w-6xl mx-auto px-6 py-10">
        <div id="postsContainer" class="blog-list-container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @include('partials.postCards')

        </div>

        <div id="scrollTrigger"></div>

        <div id="scrollLoader" class="flex justify-center py-10 hidden">
            <div class="flex items-center gap-2">
                <div class="w-2.5 h-2.5 bg-blue-600 rounded-full animate-bounce"></div>
                <div class="w-2.5 h-2.5 bg-blue-600 rounded-full animate-bounce [animation-delay:150ms]"></div>
                <div class="w-2.5 h-2.5 bg-blue-600 rounded-full animate-bounce [animation-delay:300ms]"></div>
            </div>
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
