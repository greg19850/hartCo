<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CmsSettingsController extends Controller
{
    public function showSettingsPanel()
    {
        $adminEmail = Auth::guard('admin')->user()['email'];

        $contactInfo = ContactInfo::first();

        return view('cms.cmsSettings', [
            'adminEmail' => $adminEmail,
            'contactInfo' => $contactInfo
        ]);
    }

    public function updateOpeningHours(Request $request){

    }
}
