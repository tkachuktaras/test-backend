<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReplyRequest;
use App\Reply;
use App\Review;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function reply($id){
        $review = Review::where('id', $id)->first();
        return view('admin-panel.replies.create', ['review' => $review]);
    }

    public function store(ReplyRequest $req, $id){
        $reply = new Reply();

        $reply->message = $req->input('message');
        $reply->review_id = $id;

        $reply->save();

        return redirect()->route('reply.create', $id);
    }

    public function update(ReplyRequest $req, $id){
        $reply = Reply::find($id);

        $reply->message = $req->input('message');

        $reply->save();

        return redirect()->route('reply.create', $reply->review_id);
    }

    public function edit($id){
        $reply = new Reply();
        return view('admin-panel.replies.edit', ['reply' => $reply->find($id)]);
    }

    public function destroy($id)
    {
        Reply::find($id)->delete();
        return redirect()->route('reviews.index');
    }
}
