<?php

namespace App\Http\Controllers;

class AlgemeneInfoController extends Illuminate\Routing\Controller
{
    private $algemeneInfo;
    
    public function getAlgemeneInfo(){
        $aAlgemeneInfo = $this->algemeneInfo->getAlgemeneInfo();
        return view('algemeneInfo.view', array('algemeneInfo' => $aAlgemeneInfo));
    }
}
