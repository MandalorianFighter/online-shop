<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Seo;

class SeoController extends Controller
{
    public function seo()
    {
        $seo = Seo::first();
        return view('admin.seo.index', compact('seo'));
    }

    public function seoUpdate(Request $request, Seo $seo)
    {
        $data = $request->except(['_method', '_token', 'files']);
        $seo->update($data);
        $notification = array(
            'message' => __('SEO Is Updated Successfully!'),
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
