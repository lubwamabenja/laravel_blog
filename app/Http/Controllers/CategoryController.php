<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $categories = Category::all();
        $notifications = auth()->user()->unreadNotifications;
        return view('categories.index')->withCategories($categories)->withNotifications($notifications);
    }

    public function getCategory($category,Request $request){

        $tags = Tag::all();
        $categories = Category::all();
        $latestPosts = Post::orderBy('created_at','desc')->limit(3)->get();
        $category = Category::where('name','=',$category)->first();
        $posts = $category->posts()->paginate(8);
        $popularPosts = Post::orderBy('views','desc')->limit(6)->get();
        $mainPosts = Post::orderBy('id','desc')->limit(1)->get();
        return view('categories.single')->withCategory($category)->withTags($tags)->withCategories($categories)->
        withLatestPosts($latestPosts)->withPosts($posts)->withPopularPosts($popularPosts)->withMainPosts($mainPosts);
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
        $this->validate($request,[
            'name' =>'required|max:255'
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->save();

        $request->session()->flash('success', 'New category has been created');
        return redirect()->route('categories.index');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
