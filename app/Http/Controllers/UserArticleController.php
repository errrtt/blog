<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserArticleController extends Controller
{
    public function index()
    {
        $articles = \App\Models\Article::latest()->paginate(3);
        return view('user-articles.index', ['articles' => $articles]);
    }
}
