<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

/**
 * Class BlogHomePageController
 * @package App\Http\Controllers
 */
class BlogHomePageController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $posts = Post::where('status', true)
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        return view('blogHomePage', compact('posts'));
    }
}
