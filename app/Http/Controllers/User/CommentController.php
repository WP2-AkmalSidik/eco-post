<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'body' => 'required|string|max:1000',
            'parent_id' => 'nullable|exists:comments,id'
        ]);

        $comment = Comment::create([
            'post_id' => $request->post_id,
            'user_id' => Auth::id(),
            'parent_id' => $request->parent_id,
            'body' => $request->body
        ]);

        // Load user relationship for the response
        $comment->load('user');

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'comment' => $comment,
                'message' => 'Komentar berhasil diposting'
            ]);
        }

        return back()->with('success', 'Komentar berhasil diposting');
    }

    public function destroy(Comment $comment)
    {
        // Pastikan hanya pemilik komentar atau admin yang bisa menghapus
        if (Auth::id() !== $comment->user_id && !Auth::user()->isAdmin()) {
            abort(403);
        }

        $comment->delete();

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Komentar berhasil dihapus'
            ]);
        }

        return back()->with('success', 'Komentar berhasil dihapus');
    }

    public function loadMore(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'offset' => 'required|integer'
        ]);

        $comments = Comment::with(['user', 'replies.user'])
            ->where('post_id', $request->post_id)
            ->whereNull('parent_id')
            ->orderBy('created_at', 'desc')
            ->skip($request->offset)
            ->take(5)
            ->get();

        $html = '';
        foreach ($comments as $comment) {
            $html .= view('user.partials.comment', ['comment' => $comment])->render();
        }

        return response()->json([
            'success' => true,
            'html' => $html,
            'remaining' => Comment::where('post_id', $request->post_id)
                ->whereNull('parent_id')
                ->count() - ($request->offset + $comments->count())
        ]);
    }
}
