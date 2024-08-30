<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CmsReservationsController extends Controller
{
    public function showCmsReservations(){
        return view('cms.cmsReservations');
    }

    public function updateCmsOpeningHours(Request $request){


        if (Request::has('closed')){
            dd($request);
        }
//        return view('cms.updateCmsOpeningHours');
        dd('no');
    }
}
