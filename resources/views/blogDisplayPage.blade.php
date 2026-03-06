@include('partials.header')

    <main class="blog-display-page max-w-4xl mx-auto px-6 pb-12 pt-8">
        <h1 class="blog-display-title text-3xl font-bold text-gray-800 mb-4 justify-self-center">
            Test title Test title Test title Test title
        </h1>
        <img
            src="https://placehold.co/800x400"
            alt="Placeholder Image"
            class="blog-display-image w-full h-auto rounded-lg mb-6 object-cover"
        >
        <div class="blog-display-description text-gray-700 leading-relaxed mb-6">
            <p>
                test description test description test description test description test description test description
                test description test description test description test description test description test description
                test description test description test description test description test description test description
                test description test description test description test description test description test description
                test description test description test description test description test description test description
                test description test description test description test description test description test description
                test description test description test description test description test description test description
                test description test description test description test description test description test description
            </p>
        </div>
        <p class="blog-display-author text-sm text-gray-500">
            Written by <span class="font-medium">Username</span>
        </p>
        <p class="blog-display-date text-sm text-gray-400 mt-1">
            Published on March 6th, 2026
        </p>
    </main>

@include('partials.footer')
