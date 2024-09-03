<?php

namespace App\Http\Controllers;

use App\Models\WeekDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class CmsReservationsController extends Controller
{
    public function showCmsReservations(){
        return view('cms.cmsReservations');
    }

    public function updateCmsOpeningHours(Request $request, $day){
        if($dayOfTheWeek = WeekDay::where('name', $day)->first()){

            $dayOfTheWeek->delete();

            if ($request->has('closed')){
                $dayOfTheWeek->closed = true;
                $dayOfTheWeek->save();

                return redirect()->back()->with('success', "${$day} opening hours updated");
            } else{
                $dayOfTheWeek->closed = false;

                foreach ($request->input() as $key=> $value) {
                    if(str_contains($key, 'time_from')){
                        dump($key);
                    }
                }
                die;
                $dayOfTheWeek->save();
            }
        }

        return redirect()->back()->withError("Something went wrong, please try again");

    }
}
