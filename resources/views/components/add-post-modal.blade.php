<div id="addPostModal"
     class="add-post-modal">
    <div class="add-post-container">

        <button id="closeAddPost" class="add-post-close">x</button>

        <h2 class="add-post-title">Add Blog Post</h2>

        <form id="addPostForm" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="add-post-input-container">
                <label class="add-post-label">Title</label>
                <input id="addTitle"
                       type="text"
                       name="title"
                       required
                       class="add-post-input">
                <p id="addTitleError" class="input-error-message"></p>
            </div>

            <div class="add-post-input-container">
                <label class="add-post-label">Image</label>
                <input id="addImage"
                       type="file"
                       name="image"
                       accept="image/*"
                       class="add-post-input">
                <p id="imageError" class="input-error-message"></p>
            </div>

            <div class="add-post-input-container">
                <label class="add-post-label">Content</label>
                <textarea id="addContent"
                          name="content"
                          rows="5"
                          class="add-post-input"></textarea>
                <p id="addContentError" class="input-error-message"></p>
            </div>

            <div class="add-post-input-container">
                <label class="add-post-label">Status</label>
                <select id="addStatus"
                        name="status"
                        class="add-post-select">
                    <option value="1">Active</option>
                    <option value="0">Disabled</option>
                </select>
                <p id="addStatusError" class="input-error-message"></p>
            </div>

            <div class="add-post-input-container">
                <label class="add-post-label">Publish Date</label>
                <input id="addDate"
                       type="date"
                       name="published_at"
                       class="add-post-input">
                <p id="dateError" class="input-error-message"></p>
            </div>

            <input type="hidden" id="loggedUserName" value="{{ auth()->user()->username ?? '' }}">

            <div class="add-post-input-container">
                <label class="add-post-label">Author Name</label>
                <input id="authorInput"
                       type="text"
                       name="author_name"
                       class="add-post-input">
                <p id="authorError" class="input-error-message"></p>
            </div>

            <div class="add-post-checkbox-container">
                <input id="useUserName"
                       type="checkbox"
                       class="add-post-checkbox"
                       checked>
                <label class="add-post-label">Use logged in user as author</label>
            </div>

            <button id="addSubmit"
                    type="submit"
                    class="add-post-submit">
                Publish
            </button>

        </form>

    </div>
</div>