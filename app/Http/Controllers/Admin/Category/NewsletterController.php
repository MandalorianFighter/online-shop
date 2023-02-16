<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Newsletter\StoreNewsletterRequest;
use App\Http\Requests\Newsletter\UpdateNewsletterRequest;
use App\Models\Admin\Newsletter;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers = Newsletter::all();
        return view('admin.newsletter.index', compact('subscribers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Newsletter\StoreNewsletterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsletterRequest $request)
    {
        Newsletter::create($request->validated());

        $notification = array(
            'message' => 'Thanks For Subscribing!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Newsletter\UpdateNewsletterRequest  $request
     * @param  \App\Models\Admin\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsletterRequest $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();
        $notification = array(
            'message' => 'Subscriber Is Deleted Successfully!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
