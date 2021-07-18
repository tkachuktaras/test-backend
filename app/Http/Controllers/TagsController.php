<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function add($id, $tag_str) {
        $tag = new Tag();
        $tag->article_id = $id;
        $tag->tag = $tag_str;

        $tag->save();
        return redirect()->route('article.edit', $id);
    }

    public function addNew($tag_str) {
        $tag = new Tag();
        //$tag->article_id = $id;
        $tag->tag = $tag_str;

        $tag->save();
        return redirect()->route('article.create');
    }
}
