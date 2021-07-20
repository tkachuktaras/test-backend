<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function add(Request $request) {
        $tag = new Tag();
        $tag->article_id = $request->id;
        $tag->tag = $request->tag;

        $tag->save();
        return redirect()->route('article.edit', $request->id);
    }

    public function addNew(Request $request) {
        $tag = new Tag();
        $tag->tag = $request->tag;
        $tag->article_id = (Article::orderBy('id', 'DESC')->first()->id)+1;
        $tag->save();
        return redirect()->route('article.create');
    }
}
