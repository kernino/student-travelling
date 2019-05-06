<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transport;
use App\Repositories\Eloquent\EloquentTransportBackend;

class TransportController extends Controller
{
    private $Transport;


    public function __construct(EloquentTransportBackend $eloquent) {
        $this->Transport = $eloquent;
    }
    
    public function index() {
        return view('partials.backend.transport');
    }
    
    public function create() {
        // valideer het request, het transport_content veld moet ingevuld zijn
        $this->validate(request(), [
            'transport_content' => 'required'
        ]);
        
        // als de actie opslaan is, sla de gegevens op in de database
        // in elk ander geval, ga terug naar het hoofdscherm
        if(request()->action == "Opslaan") {
            $this->Transport->saveTransportContent(request()->transport_content);
            return "save content";
            //verder werken om de data op te slaan
        } else {
            return redirect()->route('home_backend');
        }
        
        //return $request;
    }
}
