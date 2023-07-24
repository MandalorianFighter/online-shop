<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContact;
use Illuminate\Http\Request;

class SiteContactController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SiteContact  $contact
     * @return \Illuminate\View\View
     */
    public function edit(SiteContact $contact)
    {
        return view('admin.contacts.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SiteContact  $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, SiteContact $contact)
    {
        $contact->update($request->all());
        $notification = array(
            'message' => __('Company Info Is Updated Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
