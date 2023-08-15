<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SiteContactController extends Controller
{
    public function create()
    {
        return view('admin.contacts.create');
    }

    public function store(Request $request)
    {
        Setting::create($request->all());
        $notification = array(
            'message' => __('Company Info Is Created Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $contact
     * @return \Illuminate\View\View
     */
    public function edit(Setting $contact)
    {
        return view('admin.contacts.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Setting $contact)
    {
        $contact->update($request->all());
        $notification = array(
            'message' => __('Company Info Is Updated Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
