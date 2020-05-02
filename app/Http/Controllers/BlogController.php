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
        return view('blogs.index')->withPosts($posts)->withTags($tags)->withCategories($categories);
    }
    public function getSingle($slug){
        //$slug = Posts::find($slug);

        $tags = Tag::all();
        $categories = Category::all();


        $post = Post::where('slug','=',$slug)->first();

        return view('blogs.single')->withPost($post)->withTags($tags)->withCategories($categories);

    }

}
