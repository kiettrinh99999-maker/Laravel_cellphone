<?php

namespace App\Http\Controllers;

use App\Http\Middleware\ValidateContact;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
class ContactController extends Controller
{
    public function  showContact()
    {
        return view("contact");
    }

    
    public function send(Request $request)
    {
        Contact::create([
            'sdt'     => $request->phone,
            'email'   => $request->email,
            'tieude'  => $request->subject,
            'noidung' => $request->content,
        ]);
        return redirect()->back()->with('success', 'Gửi liên hệ thành công!');
    }
}
