<?php

namespace App\Http\Controllers;

class AutoController extends Illuminate\Routing\Controller
{
    private $auto;
    
    public function __construct() {
        ;
    }
    
    public function GetAllTravelersByAuto(){
        $aAuto = $this->auto->getAllTravelersByAuto($iAutoId);
        return view('auto.view', array('auto' => $aAuto));
    }
}