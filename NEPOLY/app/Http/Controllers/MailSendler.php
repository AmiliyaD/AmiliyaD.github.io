<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailSendler extends Controller
{
    public function sendMail(Request $request)
    {
        $l = 'ddd';
        Mail::raw($request->send_text . $request->send_name, 
        function ($message) {
            $message->from('bookofbooks@bk.ru', 'John Doe');
            $message->sender('bookofbooks@bk.ru', 'John Doe');
            $message->to('bookofbooks@bk.ru', 'John Doe')->subject('Письмо от пользователя');
      
        });
        $request->session()->flash('info', 'Ваше сообщение успешно отправлено');
        return redirect()->route('index');
    }
}
