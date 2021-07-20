<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\TagRequest;
use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function add(TagRequest $request) {
        if(Tag::where('tag', $request->tag)->first() != null){
            return redirect()->route('article', Tag::where('tag', $request->tag)->first()->article_id)->withErrors(['This tag already exists here.']);
        } else {
            foreach (Article::where('id', $request->article_id) as $article){
                if($article->id != $request->article_id){
                    $tag_str = $request->tag;
                    $str = '<a href="' . route('article', $request->article_id) . '">' . $request->tag . "</a>";
                    $article->description = (str_replace($tag_str, $str, $article->description));
                    $article->save();
                }
            }
            $tag = new Tag();
            $tag->article_id = $request->article_id;
            $tag->tag = $request->tag;

            $tag->save();
            return redirect()->route('article.edit', $request->article_id);
        }
    }

    public function addNew(TagRequest $request) {
        if(Tag::where('tag', $request->tag)->first() != null){
            return back()->withErrors(['This tag already exists.']);
        } else {
            foreach (Article::all() as $article){
                $tag_str = $request->tag;
                $str = '<a href="' . route('article', (Article::orderBy('id', 'DESC')->first()->id) + 1) . '">' . $request->tag . "</a>";
                $article->description = (str_replace($tag_str, $str, $article->description));
                $article->save();
            }
            $tag = new Tag();
            $tag->tag = $request->tag;
            $tag->article_id = (Article::orderBy('id', 'DESC')->first()->id)+1;
            $tag->save();
            return redirect()->route('article.create');
        }
    }

    public function destroy($id)
    {
        $tag = Tag::where('id', $id)->first();
        foreach (Article::all() as $article){
            $tag_str = $tag->tag;
            $str = '<a href="' . route('article', $tag->article_id) . '">' . $tag->tag . "</a>";
            $article->description = (str_replace($str, $tag_str , $article->description));
            $article->save();
        }
        Tag::find($id)->delete();
        return redirect()->route('article.create');
    }

    public function delete($id)
    {
        $tag = Tag::where('id', $id)->first();
        foreach (Article::all() as $article){
            $tag_str = $tag->tag;
            $str = '<a href="' . route('article', $tag->article_id) . '">' . $tag->tag . "</a>";
            $article->description = (str_replace($str, $tag_str , $article->description));
            $article->save();
        }
        Tag::find($id)->delete();
        return redirect()->route('article.edit', $tag->article_id);
    }
}
