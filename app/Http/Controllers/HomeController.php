<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function getHomeData()
    {
        $aHomeData = array(
            'title' => "USA2019",
            'place' => "Verenigde Staten",
            'start_date' => "10/05/2019",
            'end_date' => "24/05/2019",
            'travelcode' => "1234",
        ); 
        return view('partials.frontend.index', ["aHomeData" => $aHomeData]);
    }
}

