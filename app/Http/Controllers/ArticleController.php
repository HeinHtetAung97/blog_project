<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth')->except('index','detail');
    }

    public function index()
    {
        $articles = Article::latest()->paginate(5);
        return view('articles.index',[
            'articles' => $articles
        ]);
    }

    public function add()
    {
        $category = Category::all();
        return view('articles.add', [
            'categories' => $category,
        ]);
    }


    public function create()
    {
        $validator = Validator(request()->all(),[
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $article = new Article;
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->user_id = Auth::id();
        $article->save();

        return redirect('articles')->with('info', 'Article create success');
    }

    public function detail($id)
    {
        $article =Article::find($id);
        return view('articles.detail',[
            'article' => $article
        ]);
    }

    public function edit ($id)
    {
        $article = Article::find($id);
        $categories = Category::all();
        return view('articles.edit',[
            'article' => $article,
            'categories' => $categories,
        ]);
    }

    public function update ($id)
    {
        $article = Article::find($id);
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->save();

        return redirect('articles');

    }

    public function delete ($id)
    {
        $article = Article::find($id);
        if (Gate::allows('article-delete', $article)){
            $article->delete();
            return redirect('articles')->with('delete', 'Artice is deleted');
        } else {
            return back()->with('error', 'Unauthroize');
        }
    }
}
