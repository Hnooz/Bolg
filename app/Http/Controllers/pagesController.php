<?php

 namespace App\Http\Controllers;

use Illuminate\Http\Request;
//  use http\Env\Request;
 use App\Post;
 use Mail;
 use Session;

 class PagesController extends Controller {

   public function getIndex() {
       $posts = Post::orderBy('created_at','desc')->limit(4)->get();
     return view('pages.welcome')->withPosts($posts);
   }

   public function getAbout() {
     $first = 'Hnooz';
     $last = 'Hno';
     $fullname = $first . " " . $last ;
     $email = 'hnooz@gmail.com';
     $data =[];
     $data['email']= $email;
     $data['fullname'] = $fullname;
     return view('pages.about')->withData($data);
   }

   public function getContact() {
     return view('pages.contact');
   }
     public function postContact(Request $request)
     {
         $this->validate($request,[
            'email' => 'required|email',
             'subject' => 'min:3',
             'message' => 'min:10'
         ]);

         $data = array(
             'email' => $request->email,
             'subject' => $request->subject,
             'bodyMessage' =>$request->message
         );
         Mail::send('emails.contact', $data, function($message) use ($data){
             $message->from($data['email']);
             $message->to('mohammededris23@gmail.com');
             $message->subject($data['subject']);
         });
         Session::flash('success','your email was sent!');
         return redirect()->url('/');
     }


 }
