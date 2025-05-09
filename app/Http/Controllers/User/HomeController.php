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
        $categories = Categorie::all();

        if (!$request->ajax()) {
            return view('user.pages.home', compact('categories'));
        }

        try {
            $postsQuery = Post::with(['user', 'categories', 'comments']);

            if ($request->filled('search')) {
                $searchTerm = $request->search;

                $postsQuery->where(function ($query) use ($searchTerm) {
                    $query->where('title', 'like', '%' . $searchTerm . '%')
                        ->orWhereHas('categories', function ($q) use ($searchTerm) {
                            $q->where('name', 'like', '%' . $searchTerm . '%');
                        });
                });
            }

            if ($request->filled('category') && $request->category != 'all') {
                $postsQuery->whereHas('categories', function ($query) use ($request) {
                    $query->where('categories.id', $request->category);
                });
            }

            switch ($request->get('sort', 'newest')) {
                case 'oldest':
                    $postsQuery->orderBy('created_at', 'asc');
                    break;
                case 'popular':
                    $postsQuery->orderBy('views', 'desc');
                    break;
                case 'most_commented':
                    $postsQuery->withCount('comments')->orderBy('comments_count', 'desc');
                    break;
                default:
                    $postsQuery->orderBy('created_at', 'desc');
            }

            $posts = $postsQuery->paginate(9);

            return response()->json([
                'success' => true,
                'html' => view('user.partials.posts', compact('posts'))->render(),
                'pagination' => $posts->appends($request->query())->links()->toHtml()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
