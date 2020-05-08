<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
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
        $tags = Tag::all();
        $notifications = auth()->user()->unreadNotifications;
        return view('tags.index')->withTags($tags)->withNotifications($notifications);
    }

    public function getTag($tag){

        $tags = Tag::all();
        $categories = Category::all();
        $latestPosts = Post::orderBy('created_at','desc')->limit(3)->get();
        $tag = Tag::where('name','=',$tag)->first();
        $posts = $tag->posts()->paginate(8);
        $popularPosts = Post::orderBy('views','desc')->limit(6)->get();
        $mainPosts = Post::orderBy('id','desc')->limit(1)->get();
        $notifications = auth()->user()->unreadNotifications;
        return view('tags.single')->withtag($tag)->withTags($tags)->withCategories($categories)->
        withLatestPosts($latestPosts)->withPosts($posts)
        ->withPopularPosts($popularPosts)->withMainPosts($mainPosts)->withNotifications($notifications);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


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
            'name'=>'required|max:255'
        ]);
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();

        $request->session()->flash('success', 'New tag was created successfully');
        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        //

        $tag = Tag::find($id);
        $notifications = auth()->user()->unreadNotifications;
        return view('tags.show')->withTag($tag)->withNotification($notifications);
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
        $tag = Tag::find($id);
        $tags = Tag::all();
        $notifications = auth()->user()->unreadNotifications;
        return view('tags.edit')->withTag($tag)->withTags($tags)->withNotifications($notifications);
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
        $tag = Tag::find($id);
        $this->validate($request,['name' =>'required|max:255']);

        $tag->name = $request->name;
        $tag->save();
        $request->session()->flash('success', 'Tag has been edited successfully');

        return redirect()->route('tags.show',$tag->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $tag = Tag::find($id);
        $tag->posts()->detach();
        $tag->delete();
        $request->session()->flash('success', 'Tag was successfully Deleted');
        return redirect()->route('tags.index');
    }
}
