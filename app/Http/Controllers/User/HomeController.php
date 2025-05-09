<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Categorie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua kategori untuk dropdown filter
        $categories = Categorie::all();

        // Query dasar untuk postingan
        $postsQuery = Post::with(['user', 'categories', 'comments'])
            ->orderBy('created_at', 'desc');

        // Filter berdasarkan kategori jika ada
        if ($request->has('category') && $request->category != 'all') {
            $postsQuery->whereHas('categories', function ($query) use ($request) {
                $query->where('categories.id', $request->category);
            });
        }

        // Sorting berdasarkan pilihan
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'oldest':
                    $postsQuery->orderBy('created_at', 'asc');
                    break;
                case 'popular':
                    $postsQuery->withCount('comments')->orderBy('comments_count', 'desc');
                    break;
                default:
                    $postsQuery->orderBy('created_at', 'desc');
                    break;
            }
        }

        // Pagination
        $posts = $postsQuery->paginate(6);

        return view('user.pages.home', compact('posts', 'categories'));
    }
}
