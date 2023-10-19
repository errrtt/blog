<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserArticleController extends Controller
{
    public function index()
    {
        $articles = \App\Models\Article::paginate(10);
        return view('user-articles.index', ['articles' => $articles]);
    }
}
