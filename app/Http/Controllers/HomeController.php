<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\User;
 use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=user::all();
        return view('home',["users"=>$users]);
    }
    
    
    public function sendMessage(Request $request){
      $this->validate($request, [
               "subject"=>"required",
               "message"=>"required",
               "email"=>"required"
            ],
           [
               'email.required'=>"please select this email"
        ]);
      
       $subject = $request->subject;
       $message = $request->message;
       $email = $request->email;
       $name=$request->name;
       $postdata=$request->all();   
       $data=[
           "email"=>$email,
           "subject"=>$subject,
           "bodymessage"=>$message
       ];
       
      Mail::send("mails.mail", $data, function($message) use ($data){
          $message->to($data['email']);
          $message->from("your mail");
          $message->subject($data['subject']);
        
      });

      return redirect("/home")->with("message","Message have been successfully");
      
    }

}
