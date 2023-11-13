<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Dislike;
class LikeController extends Controller
{
    public function add($id)
    {
        $article = \App\Models\Article::find($id);
        $userId = auth()->user()->id;

        $existLike = Like::where('user_id', $userId)->where('article_id', $article->id)->first();

        if($existLike) {
            if($existLike->default === 1) {
                $existLike->default = 0;
                $existLike->save();

            }else {
                $existLike->default = 1;
                $existLike->save();
            }

        } else {
            $like = new Like;
            $like->user_id = auth()->user()->id;
            $like->article_id = $article->id;
            $like->default = 1;
            $like->save();
        }

        return back();

    }

    public function dislike_add($id)
    {
        $article = \App\Models\Article::find($id);
        $userId = auth()->user()->id;

        $existDislike = Dislike::where('user_id', $userId)->where('article_id', $article->id)->first();
        if($existDislike) {
            if($existDislike->default === 1) {
                $existDislike->default = 0;
            }else {
                $existDislike->default = 1;

            }

            $existDislike->save();
        }else {
            $dislike = new Dislike;

            $dislike->article_id = $article->id;
            $dislike->user_id = auth()->user()->id;
            $dislike->default = 1;
            $dislike->save();
        }

        return back();

    }
}
