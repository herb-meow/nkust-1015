<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VideoPlayController extends Controller
{
    public function index() {
        
        $username = "Guest";
        if (Auth::check()) {
            $user = Auth::user();
            $username = $user->name;
        }
        $titles = DB::table('video_lists')->get();
        return view('pages.index', compact('username', 'titles'));
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function addlist(Request $req) {
        DB::table("video_lists")->insert(['name'=>$req->title]);
        return redirect('/');
    }

    public function delete($id) {
        DB::table("video_lists")->where('id', '=', $id)->delete();
        return redirect('/');
    }

    public function showlist($id) {
        $username = "Guest";
        if (Auth::check()) {
            $user = Auth::user();
            $username = $user->name;
        }
        $titles = DB::table("videos")->where('listid', '=', $id)->get();
        return view("pages.showlist", compact('titles', 'username'));
    }
}
