<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function showCmsHome()
    {
        return view('cms.cmsHome');
    }

    public function meetTheFamily()
    {
        return view('cms.cmsMeetFamily');
    }
}
