<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Categorie;
use Illuminate\Http\Request;

class DetailPostController extends Controller
{
    // app/Http/Controllers/User/DetailPostController.php
    public function show($slug)
    {
        $post = Post::with([
            'user',
            'categories',
            'comments' => function ($query) {
                $query->whereNull('parent_id')
                    ->with([
                        'user',
                        'replies' => function ($q) {
                            $q->with('user');
                        }
                    ])
                    ->orderBy('created_at', 'desc')
                    ->limit(5);
            }
        ])->withCount(['comments as total_comments']) // Menambahkan count total komentar
            ->where('slug', $slug)
            ->firstOrFail();

        $post->increment('views');

        $relatedPosts = Post::with(['user', 'categories'])
            ->whereHas('categories', function ($query) use ($post) {
                $query->whereIn('categories.id', $post->categories->pluck('id'));
            })
            ->where('id', '!=', $post->id)
            ->limit(3)
            ->get();

        $categories = Categorie::withCount('posts')->get();

        return view('user.pages.detail-post', compact('post', 'relatedPosts', 'categories'));
    }
}
