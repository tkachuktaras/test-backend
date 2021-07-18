<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ReviewController extends Controller
{
    public function index(){
        $reviews = Review::orderBy('id', 'DESC')->with('articles')->paginate(10);
        return view('admin-panel.reviews.index', ['reviews' => $reviews]);
    }

    public function store(ReviewRequest $req, $id){
        $review = new Review();

        $fields = Input::get('star');
        if($fields == 'star-5'){
            $review->rating = 5;
        }
        if($fields == 'star-4'){
            $review->rating = 4;
        }
        if($fields == 'star-3'){
            $review->rating = 3;
        }
        if($fields == 'star-2'){
            $review->rating = 2;
        }
        if($fields == 'star-1'){
            $review->rating = 1;
        }
        if($fields == ''){
            $review->rating = 0;
        }



        $review->full_name = $req->input('full_name');
        $review->phone = $req->input('phone');
        $review->message = $req->input('message');
        $review->are_published = false;
        $review->article_id = $id;
        $review->save();
        return redirect()->route('article', $id);
    }

    public function update(ReviewRequest $req, $id){
        $review = Review::find($id);

        $fields = Input::get('star');
        if($fields == 'star-5'){
            $review->rating = 5;
        }
        if($fields == 'star-4'){
            $review->rating = 4;
        }
        if($fields == 'star-3'){
            $review->rating = 3;
        }
        if($fields == 'star-2'){
            $review->rating = 2;
        }
        if($fields == 'star-1'){
            $review->rating = 1;
        }
        if($fields == ''){
            $review->rating = 0;
        }



        $review->full_name = $req->input('full_name');
        $review->phone = $req->input('phone');
        $review->message = $req->input('message');
        if(($req->input('are_published')) == '') {
            $review->are_published = false;
        } else {
            $review->are_published = true;
        }

        $review->save();

        return redirect()->route('reviews.index');
    }

    public function edit($id){
        $review = new Review();
        return view('admin-panel.reviews.edit', ['review' => $review->find($id)]);
    }

    public function destroy($id)
    {
        Review::find($id)->delete();
        return redirect()->route('reviews.index');
    }
}
