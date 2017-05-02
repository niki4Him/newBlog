<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;
use App\Mail\NewUserWelcome;
use Auth;

class PagesController extends Controller
{


    public function __construct()
    {
      $this->middleware('auth');
    }



     public function postContact(Request $request) {

     	$this->validate($request,[
     		'email' => 'request|email',
    		'subject' => 'min:3',
     		'message' => 'min|10'


    		]);

     	$data = array(
    		
     		'email' => $request->email,
     		'subject' => $request->subject,
     		'bodyMessage' => $request->message
    		
    		);

     	Mail::send('emails.contact', $data, function($message) use ($data){
     		$message->from('laravel@mail.bg', 'Laravel');
     		$message->to('nicson@mail.bg');
     		$message->subject($data['subject']);
     	});

    	Session::flash('success', 'Your mail is send successfuly!');


    	return redirect()->route('posts.index');
    
     }

    public function email()
    {
       
        Mail::to(Auth::user()->email)->send(new NewUserWelcome());

       
        Session::flash('success', 'Your mail is send successfuly!');


        return redirect()->route('posts.index');

    }

    public function mail()
    {
        return view('emails.contact');
    }







}
