<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class BlogDisplayPageController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('blogDisplayPage');
    }

    /**
     * @param $slug
     * @return View
     */
    public function show($slug): View
    {
        $post = Post::where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        return view('blogDisplayPage', compact('post'));
    }
}
