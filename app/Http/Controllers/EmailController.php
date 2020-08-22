<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class EmailController extends Controller
{
    public function send(Request $request){

        $this->validate($request, [
            'email'=>'required|email',
            'name'=>'required',
            'message'=>'required'
        ]);

        $data = array(
            'email' => $request->email,
            'name' => $request->name,
            'message' => $request->message
        );
       

        Mail::to('ali.anwar33@gmail.com', 'To Admin')
        ->send(new SendMail($data));
           
    
        return back()->with('message', 'Your Message has been sent. We ll shortly contact you');
    }
}
