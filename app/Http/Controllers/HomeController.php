<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::orderBy('created_at','desc')->limit(8)->get();
        $latest=Post::orderBy('created_at','desc')->limit(1)->get();
        $latestPosts = Post::orderBy('created_at','desc')->limit(3)->get();
        return view('home')->withPosts($posts)->withTags($tags)->withCategories($categories)->withLatest($latest)
        ->withlatestPosts($latestPosts);

    }
    public function getAbout()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::orderBy('created_at','desc')->limit(8)->get();
        $latestPosts = Post::orderBy('created_at','desc')->limit(3)->get();
        return view('pages.about')->withPosts($posts)->withTags($tags)->withCategories($categories)->withlatestPosts($latestPosts);;

    }
}
