<?php

namespace App\Http\Controllers;
use App\Repositories\Contracts\AutoRepositoryBackend;
use App\Models\Autos;

class AutoController extends Controller
{
    private $autoBackend;
    
    public function __construct(AutoRepositoryBackend $autoBackend) {
        $this->autoBackend = $autoBackend;
    }
    
    public function GetAllTravelersByAuto(){
        $aAuto = $this->auto->getAllTravelersByAuto($iAutoId);
        return view('auto.view', array('auto' => $aAuto));
    }
    
    
    
}