<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CmsReservationsController extends Controller
{
    public function showCmsReservations(){
        return view('cms.cmsReservations');
    }
}
