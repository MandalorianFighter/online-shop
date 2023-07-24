<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('pages.contact');
    }

    public function contactMessage(Request $request)
    {
        Contact::create($request->all());
        $notification = array(
            'message' => __('Your message is sent!'),
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function indexMessages()
    {
        return view('admin.message.index');
    }

    public function viewMessage(Contact $message)
    {
        return view('admin.message.show', compact('message'));
    }
}
