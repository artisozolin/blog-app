<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <title>Blog app</title>
</head>
<body class="blog-page min-h-screen bg-gray-100">

    <header class="nav-bar bg-white shadow">
        <nav class="nav-bar-container max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ route('blog.index') }}" class="nav-bar-title text-xl font-bold text-gray-800 hover:text-blue-600
            transition">
                Blog
            </a>

            <div class="nav-bar-right-container flex items-center gap-3">
                @auth
                    <button id="addPostBtn"
                            class="nav-bar-add-blog px-4 py-2 bg-green-600 text-white rounded-md text-sm font-medium
                            hover:bg-green-700 transition">
                            Add
                    </button>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="nav-bar-logout px-4 py-2 bg-red-600 text-white rounded-md text-sm font-medium
                                hover:bg-red-700 transition">
                            Logout
                        </button>
                    </form>
                @else
                    <button id="loginBtn"
                            class="nav-bar-login px-4 py-2 bg-blue-600 text-white rounded-md text-sm font-medium
                            hover:bg-blue-700 transition">
                        Login
                    </button>
                @endauth
            </div>

        </nav>
    </header>

    <div id="loginModal" class="login-modal fixed inset-0 hidden items-center justify-center bg-black bg-opacity-40 z-50">
        <div class="login-modal-container bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
            <button
                id="closeModal"
                class="login-modal-close absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-lg font-bold">
                x
            </button>

            <h2 class="login-title text-lg font-semibold mb-4">Login</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="login-username-container mb-4">
                    <label class="login-title block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input type="text" name="username" required
                           class="login-input w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none
                           focus:ring focus:ring-blue-200">
                </div>

                <div class="login-password-container mb-4">
                    <label class="login-title block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required
                           class="login-input w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none
                           focus:ring focus:ring-blue-200">
                </div>

                <button type="submit"
                        class="login-button w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                    Login
                </button>
            </form>

        </div>
    </div>

    <div id="addPostModal"
         class="add-post-modal fixed inset-0 hidden items-center justify-center bg-black bg-opacity-40 z-50">
        <div class="add-post-container bg-white rounded-lg shadow-lg w-full max-w-xl p-6 relative">

            <button id="closeAddPost" class="add-post-close absolute top-3 right-3 text-gray-500
            hover:text-gray-700 font-bold">
                x
            </button>

            <h2 class="add-post-title text-lg font-semibold mb-4">Add Blog Post</h2>

            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf

                <div class="add-post-input-container mb-3">
                    <label class="add-post-label block text-sm font-medium mb-1">Title</label>
                    <input type="text" name="title" required
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="add-post-input-container mb-3">
                    <label class="add-post-label block text-sm font-medium mb-1">Image</label>
                    <input type="file" name="image" accept="image/*"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="add-post-input-container mb-3">
                    <label class="add-post-label block text-sm font-medium mb-1">Content</label>
                    <textarea name="content" rows="5"
                              class="w-full border rounded px-3 py-2"></textarea>
                </div>

                <div class="add-post-input-container mb-3">
                    <label class="add-post-label block text-sm font-medium mb-1">Status</label>
                    <select name="status" class="w-full border rounded px-3 py-2">
                        <option value="1">Active</option>
                        <option value="0">Disabled</option>
                    </select>
                </div>

                <div class="add-post-input-container mb-3">
                    <label class="add-post-label block text-sm font-medium mb-1">Publish Date</label>
                    <input type="date" name="published_at"
                           class="w-full border rounded px-3 py-2">
                </div>

                <input type="hidden" id="loggedUserName" value="{{ auth()->user()->username ?? '' }}">

                <div class="add-post-input-container mb-3">
                    <label class="add-post-label block text-sm font-medium mb-1">Author Name</label>
                    <input id="authorInput" type="text" name="author_name"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="add-post-checkbox-container mb-4 flex items-center">
                    <input id="useUserName" type="checkbox" class="add-post-checkbox mr-2" checked>
                    <label class="add-post-label text-sm">Use logged in user as author</label>
                </div>

                <button type="submit"
                        class="add-post-submit w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                    Publish
                </button>

            </form>

        </div>
    </div>
