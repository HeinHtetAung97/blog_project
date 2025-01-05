<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(5);
        return view('articles.index',[
            'articles' => $articles
        ]);
    }

    public function detail($id)
    {
        $article =Article::find($id);
        return view('articles.detail',[
            'article' => $article
        ]);
    }

    public function delete($id)
    {
        $data = Article::find($id);
        $data->delete();
        return redirect('articles')->with('delete', 'Atricle is deleted');
    }
}
