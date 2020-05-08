<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UserController extends Controller
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
        $users = User::all();
        $notifications = auth()->user()->unreadNotifications;
        return view('users.index')->withUsers($users)->withNotifications($notifications);
    }

    public function getUser($user){
        $tags = Tag::all();
        $categories = Category::all();
        $latestPosts = Post::orderBy('created_at','desc')->limit(3)->get();
        $user = User::where('name','=',$user)->first();
        $posts = $user->posts()->paginate(8);
        $popularPosts = Post::orderBy('views','desc')->limit(5)->get();
        $mainPosts = Post::orderBy('id','desc')->limit(1)->get();
        $notifications = auth()->user()->unreadNotifications;
        return view('users.single')->withUser($user)->withTags($tags)->withCategories($categories)->
        withLatestPosts($latestPosts)->withPosts($posts)
        ->withPopularPosts($popularPosts)->withMainPosts($mainPosts)->withNotifications($notifications);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $user = User::find($id);
        $notifications = auth()->user()->unreadNotifications;
        return view('users.edit')->withUser($user)->withNotifications($notifications);
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

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->bio = $request->input('bio');

            $image = $request->file('profile_image');
            try{
            $filename = time().'.'.$image->getClientOriginalExtension();
        }catch(\Illuminate\Database\QueryException $ex){
            dd($ex->getMessage());
        }
            $location = public_path('images/profile/'.$filename);
            Image:: make($image)->save($location);

            $user->image = $filename;


        $user->save();

        $request->session()->flash('success', 'Your Profile was successfuly Updated');
        return redirect()->route('users.edit',$user->id);
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
