<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment() {
        $validator = validator(request()->all(), [
            'amv_id' => 'required',
            'content' => 'required',
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }
        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->amv_id = request()->amv_id;
        $comment->content = request()->content;
        $comment->save();
        return back();
    }
}
