<?php

namespace App\Http\Controllers;

class TravelersController extends Illuminate\Routing\Controller
{
    private $travelers;
    
    public function GetTravelers(){
        $aTravelers = $this->travelers->GetTravelers();
        return view('travelers.view', array('travelers' => $aTravelers));
    }
    
    public function GetTravelersByName($sName){
         $aTravelers = $this->travelers->GetTravelersByName($sName);
        return view('travelers.view', array('travelers' => $aTravelers));
    }
}
