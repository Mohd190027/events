<?php

namespace App\Http\Controllers;

    // app/Http/Controllers/ContactController.php
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        Contact::create($request->all());

        return back()->with('success','تم إرسال الرسالة بنجاح');
    }
}


