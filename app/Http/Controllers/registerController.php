<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\register;

class registerController extends Controller
{
      public function resgister(Request $request){
          
        $registeries= new register();
        
        $this->validate($request, [
            "fullname"=>"required|max:20",
            "email"=>"required|unique:registers",
            "username"=>"required|unique:registers",
            "password"=>"required|min:8",
            "password_confirmation"=>"required|min:8|same:password",], 
                
                [ 
                "fullname.required"=>" please Enter your full name",
               " password_confirmation.required"=>"Password does not match",
        ]);
        
          $data["fullname"]=$registeries->fullname=$request->fullname;
          $data["email"]=$registeries->email=$request->email;
         $registeries->username=$request->username;
         $registeries->password=Hash::make($request->password);
         
         if( $registeries->password !=""){
            if($registeries->save()){
               Mail::send("message.messageContent",["data"=>$data], function ($mail ) use ($data){
                     $mail->to($data["email"])->from("mahabubulalam952@gmail.com")->subject( "Hello Dear " .$data["fullname"]. " Thank you so much for registration");
                 });
            }
             return redirect("/")->with("message", "Registration have been successfully");
         }else{
                 return redirect("/")->with("message", "Registration have been successfully");
             }
        }   
}
