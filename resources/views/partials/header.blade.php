<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <title>Blog app</title>
</head>
<body class="blog-page">

    <header class="nav-bar">
        <nav class="nav-bar-container">
            <a href="{{ route('blog.index') }}" class="nav-bar-title">
                Blog
            </a>

            <div class="nav-bar-right-container">
                @auth
                    <button id="addPostBtn"
                            class="nav-bar-add-blog">
                            Add
                    </button>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="nav-bar-logout">
                            Logout
                        </button>
                    </form>
                @else
                    <button id="loginBtn"
                            class="nav-bar-login">
                        Login
                    </button>
                @endauth
            </div>

        </nav>
    </header>

    <div id="loginModal" class="login-modal">
        <div class="login-modal-container">
            <button id="closeModal" class="login-modal-close">x</button>

            <h2 class="login-title">Login</h2>

            <form id="loginForm" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="login-username-container">
                    <label class="login-label">Username</label>
                    <input id="loginUsername" type="text" name="username" required class="login-input">
                    <p id="loginUsernameError" class="input-error-message"></p>
                </div>

                <div class="login-password-container">
                    <label class="login-label">Password</label>
                    <input id="loginPassword" type="password" name="password" required class="login-input">
                    <p id="loginPasswordError" class="input-error-message"></p>
                </div>

                <button id="loginSubmit" type="submit" class="login-button">
                    Login
                </button>
            </form>
        </div>
    </div>

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
