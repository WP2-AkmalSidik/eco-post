<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Categorie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('user.pages.create-post', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category' => 'required|exists:categories,id',
            'status' => 'required|in:publish,draft',
            'featured_image' => 'nullable|image|max:2048', // max 2MB
        ]);

        $slug = Str::slug($validated['title']);
        $baseSlug = $slug;
        $counter = 0;

        while (Post::where('slug', $slug)->exists()) {
            $counter++;
            $slug = $baseSlug . '-' . $counter;
        }

        $imagePath = null;
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('posts', 'public');
        }

        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'slug' => $slug,
            'body' => $validated['content'],
            'image_path' => $imagePath,
        ]);

        $post->categories()->attach($validated['category']);

        return redirect()->route('dashboard.user')
            ->with('success', 'Post created successfully!');
    }

    public function edit($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $categories = Categorie::all();
        $selectedCategory = $post->categories->first();

        return view('user.pages.edit-post', compact('post', 'categories', 'selectedCategory'));
    }

    public function update(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category' => 'required|exists:categories,id',
            'status' => 'required|in:publish,draft',
            'featured_image' => 'nullable|image|max:2048',
        ]);

        if ($post->title !== $validated['title']) {
            $newSlug = Str::slug($validated['title']);
            $baseSlug = $newSlug;
            $counter = 0;

            while (Post::where('slug', $newSlug)->where('id', '!=', $post->id)->exists()) {
                $counter++;
                $newSlug = $baseSlug . '-' . $counter;
            }

            $post->slug = $newSlug;
        }

        if ($request->hasFile('featured_image')) {
            if ($post->image_path) {
                Storage::disk('public')->delete($post->image_path);
            }

            $imagePath = $request->file('featured_image')->store('posts', 'public');
            $post->image_path = $imagePath;
        }

        $post->title = $validated['title'];
        $post->body = $validated['content'];
        $post->save();
        $post->categories()->sync([$validated['category']]);

        return redirect()->route('dashboard.user')
            ->with('success', 'Post updated successfully!');
    }
    public function destroy($id)
    {
        $post = Post::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $this->deletePostComments($post);
        $post->categories()->detach();

        if ($post->image_path) {
            Storage::disk('public')->delete($post->image_path);
        }

        $post->delete();

        return redirect()->route('dashboard.user')
            ->with('success', 'Post and all its related data deleted successfully!');
    }

    protected function deletePostComments(Post $post)
    {
        $comments = $post->comments()->whereNull('parent_id')->get();

        foreach ($comments as $comment) {
            $this->deleteCommentReplies($comment);
            $comment->delete();
        }
    }

    protected function deleteCommentReplies(Comment $comment)
    {
        foreach ($comment->replies as $reply) {
            $this->deleteCommentReplies($reply);
            $reply->delete();
        }
    }
}
