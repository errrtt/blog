<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function index($id)
    {
        $article = \App\Models\Article::find($id);
        return view('articles.comment', ['article' => $article]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $comment = new Comment;
        $comment->content = request()->content;
        $comment->article_id = request()->article_id;
        $comment->user_id = auth()->user()->id;
        $comment->save();

        return back();
    }

    public function delete($id)
    {
        $comment = Comment::find($id);

        if(Gate::allows('comment-delete', $comment)) {
            $comment->delete();
            return back()->with('info', 'your one article is deleted just now');
        }
        return back()->with('info', 'Unauthorized');
    }
}
