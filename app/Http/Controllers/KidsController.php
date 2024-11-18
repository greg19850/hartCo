<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KidsController extends Controller
{
    public function showKidsPage(){
        return view('home.kids-page');
    }
}
