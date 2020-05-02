<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function getIndex(){
        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::paginate(8);
        $latestPosts = Post::orderBy('created_at','desc')->limit(3)->get();
        return view('blogs.index')->withPosts($posts)->withTags($tags)->withCategories($categories)
        ->withLatestPosts($latestPosts);
    }
    public function getSingle($slug){
        //$slug = Posts::find($slug);

        $tags = Tag::all();
        $categories = Category::all();


        $post = Post::where('slug','=',$slug)->first();
        $latestPosts = Post::orderBy('created_at','desc')->limit(3)->get();

        return view('blogs.single')->withPost($post)->withTags($tags)->withCategories($categories)
        ->withLatestPosts[$latestPosts];

    }

}
