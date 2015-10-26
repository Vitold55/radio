<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Contracts\View\View;
use App\Models\Post;
use Carbon\Carbon;

class PostController extends BaseController
{
    public function index() {

        //$posts = Post::all();
        //$posts = Post::latest('id')->get();
        //$posts = Post::latest('published_at')->get();
        $posts = Post::latest('published_at')
            ->where('published_at', '<=', Carbon::now('Europe/Kiev'))
            ->get();

        return view('post.index',[
            'posts' => $posts,
        ]);
    }

    public function user($name, $id) {
        $aqua = "Hello TryGIT";

        $mala = "Kaka";
        $polo = 55;

        $vava = 9;
        $bla = 666;

        return view('post.user')->with([
            'name' => $name,
            'id' => $id,
        ]);
        $rat = 55;
    }
}
