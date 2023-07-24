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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $subscribers = Newsletter::all();
        return view('admin.newsletter.index', compact('subscribers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Newsletter\StoreNewsletterRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreNewsletterRequest $request)
    {
        Newsletter::create($request->validated());

        $notification = array(
            'message' => __('Thanks For Subscribing!'),
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
