<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailSendler extends Controller
{
    public function sendMail(Request $request)
    {
        $l =$request->send_name;
        Mail::raw($request->send_text . "       
        От: " . $request->send_name, 
        function ($message, Request $request) {
            global $l;
            $message->from('bookofbooks@bk.ru', $request->send_name);
            $message->sender('bookofbooks@bk.ru', 'John Doe');
            $message->to('bookofbooks@bk.ru', 'John Doe')->subject('Письмо от пользователя');
      
        });
        $request->session()->flash('info', 'Ваше сообщение успешно отправлено');
        return redirect()->route('index');
    }
}
