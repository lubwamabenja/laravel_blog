<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
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
        $latestPosts = Post::orderBy('created_at','desc')->limit(2)->get();
        $popularPosts = Post::orderBy('views','desc')->limit(3)->get();
        $users = User::orderBy('id','desc')->limit(1)->get();
        $mainPosts = Post::orderBy('id','desc')->limit(1)->get();
        return view('home')->withPosts($posts)->withTags($tags)->withCategories($categories)
        ->withlatestPosts($latestPosts)->withPopularPosts($popularPosts)->withUsers($users)->withMainPosts($mainPosts);

    }
    public function getAbout()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::orderBy('created_at','desc')->limit(8)->get();
        $latestPosts = Post::orderBy('created_at','desc')->limit(3)->get();
        $popularPosts = Post::orderBy('views','desc')->limit(3)->get();
        return view('pages.about')->withPosts($posts)->withTags($tags)->withCategories($categories)->withlatestPosts($latestPosts)
        ->withPopularPosts($popularPosts);

    }
}
