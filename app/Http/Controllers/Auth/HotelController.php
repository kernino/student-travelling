<?php

namespace App\Http\Controllers;

class HotelController extends Illuminate\Routing\Controller
{
    private $hotel;
    
    public function getAllHotelData(){
        $aHotel = $this->hotel->getAllHotelData();
        return view('hotel.view', array('hotel' => $aHotel));
    }
    
    public function getTravellersByName(){
        $aTravellers = $this->hotel->getTravellersByName();
        return view('hotel.view', array('hotel' => $aTravellers));
    }
}

