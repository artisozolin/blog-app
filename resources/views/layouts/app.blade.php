<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        <title>@yield('title', 'Blog App')</title>
    </head>
    <body class="blog-page">

        <header class="nav-bar">
            <nav class="nav-bar-container">
                <a href="{{ route('blog.index') }}" class="nav-bar-title">Blog</a>

                <div class="nav-bar-right-container">
                    @auth
                        <button id="addPostBtn" class="nav-bar-add-blog">Add</button>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-bar-logout">Logout</button>
                        </form>
                    @else
                        <button id="loginBtn" class="nav-bar-login">Login</button>
                    @endauth
                </div>
            </nav>
        </header>

        <x-login-modal />
        <x-add-post-modal />

        <main class="blog-page-content">
            @yield('content')
        </main>

        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>