<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'content' => 'required|string',
            'author_name' => 'nullable|string|max:255',
            'status' => 'required|boolean',
            'published_at' => 'nullable|date',
        ]);

        $slug = Str::slug($data['title']);
        $count = Post::where('slug', 'like', "{$slug}%")->count();
        $data['slug'] = $count ? "{$slug}-{$count}" : $slug;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        if (empty($data['author_name'])) {
            $data['author_name'] = auth()->user()->username;
        }

        if (empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        $data['user_id'] = auth()->id();

        Post::create($data);

        return redirect()->route('blog.index');
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|boolean',
            'author_name' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($post->title !== $data['title']) {

            $slug = Str::slug($data['title']);
            $count = Post::where('slug', 'like', "{$slug}%")
                ->where('id', '!=', $post->id)
                ->count();

            $data['slug'] = $count ? "{$slug}-{$count}" : $slug;
        }

        if ($request->hasFile('image')) {

            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($data);

        return back()->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }
}
