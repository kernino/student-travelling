<?php

namespace App\Http\Controllers;
use App\Repositories\Contracts\VervoerRepositoryBackend;
use App\Models\Vervoer;
use Illuminate\Support\Facades\DB;

class VervoerController extends Controller
{
    private $vervoer;
    
    public function __construct(VervoerRepositoryBackend $vervoer) {
        $this->vervoer = $vervoer;
    }

    public function CheckDbConnection(){
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            return  true ;  
        }
    }
    
    // functions backend
    public function index() {
        if($this->CheckDbConnection()){
            return redirect()->route('home_backend')->withErrors(["DB connectie mislukt" => "Kan niet met de database connecteren, controleer je configuratie"]);
        }
        else{
            $vervoer_content = $this->vervoer->getVervoerContent();
            //return $vervoer_content;
            return view('partials.backend.extraVervoersInformatie', array("vervoer_content" => $vervoer_content[0]));
        }
    }
    
    public function create() {
        if($this->CheckDbConnection()){
            return redirect()->route('home_backend')->withErrors(["DB connectie mislukt" => "Kan niet met de database connecteren, controleer je configuratie"]);
        }
        else{
            $this->validate(request(), [
                'vervoer_content' => 'required',
                'vervoer_id' => 'required'
            ]);

            if(request()->action == "Opslaan") {
                if(request()->vervoer_id != "") {
                    $vervoerContent["content"] = request()->vervoer_content;
                    $vervoerContent["id"] = request()->vervoer_id;
                    if($this->vervoer->updateVervoerContent($vervoerContent)) {
                        return redirect()->route('vervoer_backend');
                    }
                    return  redirect()->route('vervoer_backend')->withErrors(["Opslaan mislukt" => "Kan de aanpassing niet opslaan"]);
                }
            }

            return redirect()->route('vervoer_backend');
        }
    }
}