<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::orderBy('id','desc')->paginate(10);

        return view('posts.index')->withPosts($posts);
    }

/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //
        $this-> validate($request,array(
            'title' =>'required|max:255',
            'slug' =>'required|alpha_dash|max:255|min:5|unique:posts,slug',
            'category_id' => 'required|integer',
            'body' => 'required'
        ));

        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;

        try{
            $image = $request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image:: make($image)->save($location);

            $post->image = $filename;
        }catch(\Illuminate\Database\QueryException $ex){
            dd($ex->getMessage());
        }


        $post->save();

        $post->tags()->sync($request->tags,false);

        $request->session()->flash('success', 'The post was successfuly saved');
        return redirect()->route('posts.show',$post->id);





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        $categories = Category::all();
        $cats =[];
        foreach($categories as $category){
            $cats[$category->id] = $category->name;
        }
        $tags = Tag::all();
        $tags2 =[];
        foreach($tags as $tag){
            $tags2[$tag->id] = $tag->name;
        }


        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $post = Post::find($id);

        if($request->input('slug') == $post->slug){
        $this-> validate($request,array(
            'title' =>'required|max:255',
            'body' => 'required',
            'category_id' =>'required|integer',
        ));
    }
        else{
            $this->validate($request,array(
            'title' =>'required|max:255',
            'slug' =>'required|alpha_dash|max:255|min:5|unique:posts,slug',
             'category_id' =>'required|integer',
            'body' => 'required'
            ));

        }


        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');

        $post->save();
        if(isset($request->tags)){
            $post->tags()->sync($request->tags);
        }else{
            $post->tags()->sync([]);
        }

        $request->session()->flash('success', 'The post was successfuly Updated');
        return redirect()->route('posts.show',$post->id);




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request ,$id)
    {
        //
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();
        $request->session()->flash('success', 'Post was successfully Deleted');
        return redirect()->route('posts.index');
    }
}
