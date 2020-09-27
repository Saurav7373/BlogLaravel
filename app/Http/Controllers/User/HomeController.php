<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user\post;
use App\Models\user\category;
use App\Models\user\tag;

class HomeController extends Controller
{
    public function index()
    {
        $posts = post::where('status', 1)->orderBy('created_at','DESC')->paginate(2);

        return view('user.blogs',compact('posts'));
    }
    public function tag(tag $tag)
    {
        $posts = $tag->posts();
        return view('user.blogs',compact('posts'));

    
    }
    public function category(category $category )
    {
        $posts = $category->posts();
        return view('user.blogs',compact('posts'));

    }
    

}
