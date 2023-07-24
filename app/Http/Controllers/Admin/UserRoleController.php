<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $admin = Admin::create($request->all());

        $admin->password = Hash::make($request->password);
        $admin->type = 2;
        $admin->save();

        $notification = array(
            'message' => __('Admin User Is Added Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->route('admins.index')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\View\View
     */
    public function edit(Admin $admin)
    {
        return view('admin.role.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Admin $admin)
    {
        $admin->update($request->all());
        $notification = array(
            'message' => __('Admin User Is Updated Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->route('admins.index')->with($notification);
    }
}
