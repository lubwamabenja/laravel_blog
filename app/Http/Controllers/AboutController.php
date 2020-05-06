<?php

namespace App\Http\Controllers;

use App\About;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified'],['except' =>'index']);
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
        $categories = Category::all();
        $posts = Post::orderBy('created_at','desc')->limit(8)->get();
        $latestPosts = Post::orderBy('created_at','desc')->limit(3)->get();
        $popularPosts = Post::orderBy('views','desc')->limit(3)->get();
        $abouts = About::all();
        $mainPosts = Post::orderBy('id','desc')->limit(1)->get();
        return view('pages.about')->withPosts($posts)->withTags($tags)->withCategories($categories)->withlatestPosts($latestPosts)
        ->withPopularPosts($popularPosts)->withAbouts($abouts)->withmainPosts($mainPosts);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('about.create');
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
         //
         $about = new About;
         $about->description = $request->input('description');
         if($request->hasFile('website_image')){
             $image = $request->file('website_image');
             $filename = time().'.'.$image->getClientOriginalExtension();
             $location = public_path('images/page/'.$filename);
             Image:: make($image)->save($location);

             $about->image = $filename;

         }



         $about->save();

         $request->session()->flash('success', 'Page was successfuly Created');
         return redirect()->route('about.edit',$about->id);
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
        $about = About::find($id);
        return view('about.edit')->withAbout($about);
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
        $about = About::find($id);
        $about->description = $request->input('description');
        if($request->hasFile('website_image')){
            $image = $request->file('website_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/page/'.$filename);
            Image:: make($image)->save($location);

            $about->image = $filename;

        }



        $about->save();

        $request->session()->flash('success', 'Page was successfuly Updated');
        return redirect()->route('about.edit',$about->id);
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
