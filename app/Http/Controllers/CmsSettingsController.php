<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CmsSettingsController extends Controller
{
    public function showSettingsPanel()
    {
        $adminEmail = Auth::guard('admin')->user()['email'];
//        dd(Auth::guard('admin')->user());
        return view('cms.cmsSettings', ['adminEmail' => $adminEmail]);
    }
}
