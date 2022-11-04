<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Amv;
use App\Models\Category;
use App\Models\like_video;
use App\Models\dislike_video;
use PDO;

class AmvController extends Controller
{
    public function home() {
        if(Auth::check()) {
            $amvs = Amv::latest()->paginate(6);
            return view("amvs.index", [
                'amvs' => $amvs,
            ]);
        } else {
            $amvs = Amv::with('user')->latest()->paginate(6);
            return view("amvs.index", [
                'amvs' => $amvs,
            ]);
        }
    }
    public function acc($id) {
        $amvs = Amv::where("user_id", "=", $id)->latest()->paginate(4);
        $user = User::find($id);
        return view("amvs.account", [
            'amvs' => $amvs,
            'user' => $user,
        ]);
    }
    public function ban() {
        return view("amvs.ban");
    }
    public function watch($id) {
        if(Auth::check()) {
            $amv = Amv::find($id);
            return view("amvs.watch", [
                'amv'=> $amv,
            ]);
        } else {
            $amv = Amv::with('user')->find($id);
            return view("amvs.watch", [
                'amv'=> $amv,
            ]);
        }
    }
    public function upload() {
        $categories = Category::all();
        return view("amvs.upload", [
            'categories' => $categories,
        ]);
    }
    public function post() {
        $validator = validator(request()->all(), [
            'video' => 'required',
            'thumb' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'category_id' => 'required',
        ]);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }
        $file = request()->file('video');
        $filename = $file->getClientOriginalName();
        $file->move(base_path('/public/video'), $filename);

        $img = request()->file('thumb');
        $imgname = $img->getClientOriginalName();
        $img->move(base_path('/public/image'), $imgname);

        $amv = new Amv;
        $amv->video = $filename;
        $amv->thumb = $imgname;
        $amv->title = request()->title;
        $amv->desc = request()->desc;
        $amv->category_id = request()->category_id;
        $amv->user_id = request()->user_id;
        $amv->view = "0";
        $amv->like = "0";
        $amv->dislike = "0";
        $amv->save();
        return redirect("/amvtube");
    }
    public function edit($id) {
        $amv = Amv::find($id);
        $categories = Category::all();
        return view("amvs.edit", [
            'amv' => $amv,
            'categories' => $categories,
        ]);
    }
    public function modify($id) {
        $amv = Amv::find($id);
        $amv->title = request()->title;
        $amv->desc = request()->desc;
        $amv->category_id = request()->category_id;
        $amv->save();
        return redirect("amvtube/watch/$id");
    }
    public function like($id, $value, $userid) {
        $amv = Amv::find($id);
        $perviousValue = $value - 1;
        if($perviousValue == $amv->like) {
            $amv->like = $value;
            $amv->update();

            $like = new like_video;
            $like->amv_id = $id;
            $like->user_id = $userid;
            $like->save();
            return "good";
        } else {
            $user = User::find($userid);
            $user->suspend = 1;
            $user->update();
        }

        return 1;
    }
    public function dislike($id, $value, $userid) {

        $amv = Amv::find($id);
        $perviousValue = $value - 1;
        if($perviousValue == $amv->dislike) {
            $amv->dislike = $value;
            $amv->update();

            $dislike = new dislike_video;
            $dislike->amv_id = $id;
            $dislike->user_id = $userid;
            $dislike->save();
            return "good";
        } else {
            $user = User::find($userid);
            $user->suspend = 1;
            $user->update();
        }

        return 1;
    }
    public function sub($id, $value, $user_id) {

        if(auth()->user()->id == $id){
            return false;
        } else {
            $perviousValue = $value - 1;
            $user = User::find($id);
            if($perviousValue == $user->sub) {
                $user = User::find($id);
                $user->sub = $value;
                $user->update();

                $sub = new Subscription;
                $sub->name = request()->name;
                $sub->user_id = request()->user_id;
                $sub->subid = request()->subid;
                $sub->save();
                return "good";
            } else {
                $user = User::find($user_id);
                $user->suspend = 1;
                $user->update();
        }
        }


        return 1;
    }
    public function view($id) {
        $amv = Amv::find($id);
        if(Auth::check()) {
            $plusview = $amv->view + 1;
            $amv->view = $plusview;
            $amv->update();
            return 1;
        }
        return false;
    }
    public function likedvideo() {
        $id = auth()->user()->id;
        $amvs = like_video::with('amvs')->where("user_id", "=", $id)->paginate(6);
        return view("amvs.likedvideos", [
            'amvs' => $amvs,
        ]);
    }
}
