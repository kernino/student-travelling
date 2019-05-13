<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class TravelersController extends Controller
{
    private $travelers;
    
    public function GetTravellers(){
        $aTravelers = $this->travelers->GetTravellers();
        return view('travellers.view', array('travellers' => $aTravellers));
    }
    
    public function GetTravellersByName($sName){
         $aTravelers = $this->travelers->GetTravelersByName($sName);
        return view('travellers.view', array('travellers' => $aTravellers));
    }
}