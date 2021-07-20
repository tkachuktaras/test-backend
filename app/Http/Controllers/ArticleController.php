<?php

namespace App\Http\Controllers;

use App\Article;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function article($id)
    {
        $article = Article::where('id', $id)->with('reviews.reply', 'tags')->first();
        $article->increment('views', 1);
        $article->save();
        $previous = Article::where('id', $id-1)->first();
        if($previous != null){
            for($i = $id-1; $previous->are_published != true; $i--){
                $previous = Article::where('id', $i)->first();
                if($i < 1){
                    break;
                }
            }
        }

        $next = Article::where('id', $id+1)->first();
        if($next != null) {
            for($i = $id+1; $next->are_published != true; $i++){
                if($i > DB::table('articles')->latest()->first()->id){
                    break;
                }
                $next = Article::where('id', $i)->first();
            }
        }
        $avg = DB::table('reviews')->where('are_published', true)->where('article_id', $id)->avg('rating');
        $round_avg = round($avg);
        return view('article', ['article' => $article, 'next' => $next, 'previous' => $previous, 'avg' => $avg, 'round_avg' => $round_avg]);
    }
}
