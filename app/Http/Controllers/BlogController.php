<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class BlogController extends Controller
{
    //
    public function getIndex(){
        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::paginate(8);
        $latestPosts = Post::orderBy('created_at','desc')->limit(3)->get();
        $popularPosts = Post::orderBy('views','desc')->limit(3)->get();
        return view('blogs.index')->withPosts($posts)->withTags($tags)->withCategories($categories)
        ->withLatestPosts($latestPosts)->withPopularPosts($popularPosts);
    }
    public function getSingle($slug,Request $request){
        //$slug = Posts::find($slug);

        $tags = Tag::all();
        $categories = Category::all();
        $latestPosts = Post::orderBy('created_at','desc')->limit(3)->get();
        $post = Post::where('slug','=',$slug)->first();

        //Increment views when a post is visited
        $viewed = $request->session()->get('viewed_post', []);
        if (!in_array($post->id,$viewed)) {
            $post->increment('views');
            $request->session()->push('viewed_post', $post->id);
        }
        $popularPosts = Post::orderBy('views','desc')->limit(3)->get();

        return view('blogs.single')->withPost($post)->withTags($tags)->withCategories($categories)->
        withLatestPosts($latestPosts)->withPopularPosts($popularPosts);

    }

}
