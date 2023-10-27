<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        $articles = Article::latest()->paginate(9);

        return view('articles.index', ['articles' => $articles]);
    }

    public function detail($id)
    {
        $article = Article::find($id);

        return view('articles.detail', ['article' => $article]);
    }

    public function add()
    {
       return view('articles.add');
    }

    public function create()
    {
        $validator = validator(request()->all(), [
            'file' => 'required',
            'title' => 'required',
            'paragh' => 'required',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $data = new Article;
        if(request()->hasFile('file')) {
            $file = request()->file('file');
            $fileName = time() . '.' . $file->getClientOriginalName();
            $path = $file->storeAs('/public/img/', $fileName);
            $data->photo = $fileName;
        }
        $data->title = request()->title;
        $data->paragraph = request()->paragh;
        $data->user_id = auth()->user()->id;
        $data->save();

        return redirect('/articles');
    }

    public function ask($id)
    {
        $article = Article::find($id);

        if(Gate::allows('article-delete', $article)) {
            return view('articles.ask', ['article' => $article]);
        }
        return back()->with('info', 'Unauthorized');

    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/articles')->with('info', 'your one article is deleted just now');
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit', ['article' => $article]);
    }

    public function update($id)
    {
        $article = Article::find($id);
        if(request()->hasFile('file')) {
            $file = request()->file('file');
            $fileName = time() . '.' . $file->getClientOriginalName();
            $path = $file->storeAs('/public/img/', $fileName);
            $article->photo = $fileName;
        }
        $article->title = request()->title;
        $article->paragraph = request()->paragh;
        $article->save();

        return redirect('/articles');
    }
}
