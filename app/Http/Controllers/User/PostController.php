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
        // Ambil semua kategori untuk dropdown
        $categories = Categorie::all();
        return view('user.pages.create-post', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category' => 'required|exists:categories,id',
            'status' => 'required|in:publish,draft',
            'featured_image' => 'nullable|image|max:2048', // max 2MB
        ]);

        // Generate slug dari judul
        $slug = Str::slug($validated['title']);
        $baseSlug = $slug;
        $counter = 0;

        // Pastikan slug unik
        while (Post::where('slug', $slug)->exists()) {
            $counter++;
            $slug = $baseSlug . '-' . $counter;
        }

        // Proses upload gambar jika ada
        $imagePath = null;
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('posts', 'public');
        }

        // Buat post baru
        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'slug' => $slug,
            'body' => $validated['content'],
            'image_path' => $imagePath,
        ]);

        // Attach category
        $post->categories()->attach($validated['category']);

        return redirect()->route('dashboard.user')
            ->with('success', 'Post created successfully!');
    }

    public function edit($slug)
    {
        // Cari post berdasarkan slug
        $post = Post::where('slug', $slug)
            ->where('user_id', Auth::id()) // Pastikan hanya pemilik post yang bisa edit
            ->firstOrFail();

        // Ambil semua kategori untuk dropdown
        $categories = Categorie::all();

        // Ambil kategori yang terpilih untuk post ini
        $selectedCategory = $post->categories->first();

        return view('user.pages.edit-post', compact('post', 'categories', 'selectedCategory'));
    }

    public function update(Request $request, $slug)
    {
        // Cari post berdasarkan slug
        $post = Post::where('slug', $slug)
            ->where('user_id', Auth::id()) // Pastikan hanya pemilik post yang bisa update
            ->firstOrFail();

        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category' => 'required|exists:categories,id',
            'status' => 'required|in:publish,draft',
            'featured_image' => 'nullable|image|max:2048', // max 2MB
        ]);

        // Cek apakah judul berubah, jika ya maka update slug
        if ($post->title !== $validated['title']) {
            $newSlug = Str::slug($validated['title']);
            $baseSlug = $newSlug;
            $counter = 0;

            // Pastikan slug unik
            while (Post::where('slug', $newSlug)->where('id', '!=', $post->id)->exists()) {
                $counter++;
                $newSlug = $baseSlug . '-' . $counter;
            }

            $post->slug = $newSlug;
        }

        // Proses upload gambar jika ada
        if ($request->hasFile('featured_image')) {
            // Hapus gambar lama jika ada
            if ($post->image_path) {
                Storage::disk('public')->delete($post->image_path);
            }

            $imagePath = $request->file('featured_image')->store('posts', 'public');
            $post->image_path = $imagePath;
        }

        // Update post
        $post->title = $validated['title'];
        $post->body = $validated['content'];
        $post->save();

        // Update kategori
        $post->categories()->sync([$validated['category']]);

        return redirect()->route('dashboard.user')
            ->with('success', 'Post updated successfully!');
    }
    public function destroy($id)
    {
        // Cari post berdasarkan ID
        $post = Post::where('id', $id)
            ->where('user_id', Auth::id()) // Pastikan hanya pemilik post yang bisa hapus
            ->firstOrFail();

        // Hapus semua komentar terkait (termasuk replies)
        $this->deletePostComments($post);

        // Hapus relasi kategori
        $post->categories()->detach();

        // Hapus gambar jika ada
        if ($post->image_path) {
            Storage::disk('public')->delete($post->image_path);
        }

        // Hapus post itu sendiri
        $post->delete();

        return redirect()->route('dashboard.user')
            ->with('success', 'Post and all its related data deleted successfully!');
    }

    /**
     * Recursively delete all comments and their replies
     */
    protected function deletePostComments(Post $post)
    {
        // Dapatkan semua komentar utama (parent comments)
        $comments = $post->comments()->whereNull('parent_id')->get();

        foreach ($comments as $comment) {
            // Hapus semua replies terlebih dahulu (recursive)
            $this->deleteCommentReplies($comment);
            // Hapus komentar utama
            $comment->delete();
        }
    }

    /**
     * Recursively delete comment replies
     */
    protected function deleteCommentReplies(Comment $comment)
    {
        foreach ($comment->replies as $reply) {
            // Hapus replies dari reply ini terlebih dahulu (recursive)
            $this->deleteCommentReplies($reply);
            // Hapus reply
            $reply->delete();
        }
    }
}
