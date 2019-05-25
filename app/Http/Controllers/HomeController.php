<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    
    public function __construct() {

    }
    
    public function saveTravelCode(Request $request, $userCode)
    {
        $trip = DB::table('trips')->where('travel_code', '=', $userCode)->first();
        
        $request->session()->put('code', $travelCode->travel_code);
        
        return redirect()->route('home');
    }
    
    public function getHomeData(Request $request){
        
        if ($request->session()->has('code')) {
            
            $tripCode = $request->session()->get('code');
        
            $aHomeData = DB::table('trips')->where('travel_code', '=', $tripCode);  
        
            return view('partials.frontend.index', ["aHomeData" => $aHomeData]);
        }
        else
        {
            return redirect()->route('login');
        }
    }
    

    

}

