<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amv;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(Auth::check()) {
            $auth = Auth::user();
            $amvs = Amv::latest()->paginate(6);
            return view("amvs.index", [
                'auth' => $auth,
                'amvs' => $amvs,
            ]);
        } else {
            $amvs = Amv::with('user')->latest()->paginate(6);
            return view("amvs.index", [
                'amvs' => $amvs,
            ]);
        }

    }
}
