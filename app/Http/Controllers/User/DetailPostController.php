<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Categorie;
use Illuminate\Http\Request;

class DetailPostController extends Controller
{
    public function index(Request $request)
    {
        // Get post by slug with eager loading
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
                    ->orderBy('created_at', 'desc');
            }
        ])->where('slug', $request->slug)
            ->firstOrFail();

        // Tambah view count
        $post->increment('views');

        // Get related posts from the same category
        $relatedPosts = Post::with(['user', 'categories'])
            ->whereHas('categories', function ($query) use ($post) {
                $query->whereIn('categories.id', $post->categories->pluck('id'));
            })
            ->where('id', '!=', $post->id)
            ->limit(3)
            ->get();

        // Get categories with post count
        $categories = Categorie::withCount('posts')->get();

        return view('user.pages.detail-post', compact('post', 'relatedPosts', 'categories'));
    }
}
