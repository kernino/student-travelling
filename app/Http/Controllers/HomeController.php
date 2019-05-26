<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    
    public function __construct() {

    }
    
    public function saveTravelCode(Request $request)
    {
        $trip = DB::table('trips')->where('travel_code', '=', $request->input("code"))->first();
        
        $request->session()->put('code', $trip->travel_code);
        
        return redirect()->route('home');
    }
    
    public function readAndAccepted(Request $request)
    {
        $request->session()->put('regulations', "accepted");
        
        return redirect()->route('home');
    }
    
    public function getHomeData(Request $request){
        
        if ($request->session()->has('code')) {
            if (!$request->session()->has('regulations')) {   
                    $sAccepted = "AlgemeneAfspraken";
                    
                    $tripCode = $request->session()->get('code');

                    $aHomeData = DB::table('trips')->where('travel_code', '=', $tripCode)->first();  

                    return view('partials.frontend.index', ["aHomeData" => $aHomeData, "sAccepted" => $sAccepted]);
                
            }
            else
            {
                    $tripCode = $request->session()->get('code');

                    $aHomeData = DB::table('trips')->where('travel_code', '=', $tripCode)->first();  

                    return view('partials.frontend.index', ["aHomeData" => $aHomeData, "sAccepted" => ""]);
            }
        }
        else
        {
            return redirect()->route('login');
        }
    }
    

    

}

