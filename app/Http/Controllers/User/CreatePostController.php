<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Categorie;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CreatePostController extends Controller
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
}
