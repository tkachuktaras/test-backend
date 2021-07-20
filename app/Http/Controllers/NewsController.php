<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ArticleRequestWithoutImg;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(10);
        return view('admin-panel.news.index', ['articles' => $articles]);
    }

    public function create()
    {
        $tags = Tag::where('article_id', Article::orderBy('id', 'DESC')->first()->id + 1)->get();
        return view('admin-panel.news.create', ['tags' => $tags]);
    }

    public function store(ArticleRequest $req){
        $article = new Article();
        $article->title = $req->input('title');
        $req->file('img')->store('images', 'public');
        $article->img = $req->img->hashName();
        $article->short_description = $req->input('short_description');
        $article->description = $req->input('description');
        if(($req->input('are_published')) == '') {
            $article->are_published = false;
        } else {
            $article->are_published = true;
        }


        $article->save();
        return redirect()->route('articles.index');
    }

    public function edit($id){
        $article = Article::with('tags')->where('id', $id)->first();
        return view('admin-panel.news.edit', ['article' => $article]);
    }

    public function update(ArticleRequestWithoutImg $req, $id){
        $article = Article::find($id);
        $article->title = $req->input('title');
        if($req->file('img')!=null) {
            File::delete(storage_path('app/public/images/').$article->img);
            $req->file('img')->store('images', 'public');
            $article->img = $req->img->hashName();
        }
        $article->short_description = $req->input('short_description');
        $article->description = $req->input('description');
        if(($req->input('are_published')) == '') {
            $article->are_published = false;
        } else {
            $article->are_published = true;
        }

        $article->save();

        return redirect()->route('articles.index');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        File::delete(storage_path('app/public/images/').$article->img);
        Article::find($id)->delete();
        return redirect()->route('articles.index');
    }
}
