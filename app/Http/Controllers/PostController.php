<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Contracts\View\View;

class PostController extends BaseController
{
    public function index() {
        return view('post.index');
    }

    public function user($name, $id) {
        return view('post.user')->with([
            'name' => $name,
            'id' => $id,
        ]);
    }
}
