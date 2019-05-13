<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\InfoRepositoryBackend;

class InfoController extends Controller
{
    public function index() {
        return view('partials.backend.info');
    }
    
    public function createInfo() {
        // valideer het request, het transport_content veld moet ingevuld zijn
        $this->validate(request(), [
            'info_type' => 'required',
            'info_content' => 'required'
        ]);
        
        if(request()->save == "Opslaan") {
            if(request()->info_type == "algemeneInfo") {
                $infoContent["type"] = "";
                return request()->info_content;
            }
            return redirect()->route('info_backend');
            
        } else {
            return redirect()->route('info_backend');
        }
    }
}
