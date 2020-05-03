<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function index(){

        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::orderBy('created_at','desc')->limit(3)->get();
        $latestPosts = Post::orderBy('created_at','desc')->limit(3)->get();
        $popularPosts = Post::orderBy('views','desc')->limit(3)->get();

        return view('pages.contact')->withTags($tags)->withCategories($categories)->withPosts($posts)
        ->withLatestPosts($latestPosts)->withPopularPosts($popularPosts);
    }

    public function postContact(Request $request){


            $this->validate($request,[
                'subject' => 'required|min:3',
                'email'   => 'required|email',
                'message' => 'min:10'
            ]);

            $data = array(
                'email' => $request->email,
                'subject' => $request->subject,
                'bodyMessage' => $request->message
            );
            Mail::send('emails.contact', $data, function ($message) use($data) {
                $message->from($data['email']);
                $message->to('lubwama73@gmail.com', 'Lubwama Isaac');
                $message->replyTo($data['email']);
                $message->subject($data['subject']);
            });

            $request->session()->flash('success', 'Your email has been sent');

            return redirect()->route('pages.contact');





        }
}
