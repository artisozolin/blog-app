<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class BlogHomePageController
 * @package App\Http\Controllers
 */
class BlogHomePageController extends Controller
{
    /**
     * @param Request $request
     * @return View|string
     */
    public function index(Request $request)
    {
        $query = Post::latest();

        if (!auth()->check()) {
            $query->where('status', 1);
        }

        $posts = $query->paginate(6);

        if ($request->ajax()) {
            return view('partials.postCards', compact('posts'))->render();
        }

        return view('blogHomePage', compact('posts'));
    }
}
