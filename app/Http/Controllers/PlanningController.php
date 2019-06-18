<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\PlanningRepository;
use App\Repositories\Contracts\DayPlanningRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class PlanningController extends Controller
{
    private $planningBackend;
    private $planningFrontend;


    public function __construct(PlanningRepository $planningBackend, DayPlanningRepository $planningFrontend) {
        $this->planningBackend = $planningBackend;
        $this->planningFrontend = $planningFrontend;
    } 


    //backend
    public function CheckDbConnection(){
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            return  true ;  
        }
    }
    
    public function GetAllPlanningen(){
        if($this->CheckDbConnection()){
            return redirect()->route('home_backend')->withErrors(["DB connectie mislukt" => "Kan niet met de database connecteren, controleer je configuratie"]);
        }
        else{
            $aPlanningen = $this->planningBackend->GetAllPlanningen();              
            $aTripData = $this->planningBackend->GetTripData();
            return view('partials.backend.planning', ["aPlanningen" => $aPlanningen, "aTripData" => $aTripData]);
        }
    }
    
    public function GetPlanning($id, $dagnr){
        if($this->CheckDbConnection()){
            return redirect()->route('home_backend')->withErrors(["DB connectie mislukt" => "Kan niet met de database connecteren, controleer je configuratie"]);
        }
        else{
            if($id != 0){
                $aPlanning = $this->planningBackend->GetPLanning($id); 
                $aDay = $dagnr;

            }
            else{
                $aKeys = array ('day_planning_id', 'name', 'date', 'end_location', 'highlight', 'description', 'created_at', 'updated_at');
                $aData = array('', '','' ,'', '', '', '','');
                $aPlanning = (object)array_combine($aKeys, $aData);
                $aDay = "*";
            }
            return view('partials.backend.PlanningWijzig', ["aPlanning" => $aPlanning, "aDay" => $aDay]);
        }
    }
    
    public function CUD() {     
        if($this->CheckDbConnection()){
            return redirect()->route('home_backend')->withErrors(["DB connectie mislukt" => "Kan niet met de database connecteren, controleer je configuratie"]);
        }
        else{
            if(request()->action == "Opslaan") {
                $aPlanningContent["planningId"] = request()->planningId;
                $aPlanningContent["planningName"] = request()->planningName;
                $aPlanningContent["planningLocation"] = request()->planningLocation;
                $aPlanningContent["planningDate"] = request()->planningDate;
                $aPlanningContent["planningHighlight"] = request()->planningHighlight;
                $aPlanningContent["planning_content"] = request()->planning_content;

                if($this->planningBackend->UpdatePlanning($aPlanningContent)) {
                    return redirect()->route('planningen');
                }
                return  redirect()->route('planningen')->withErrors(["Opslaan mislukt" => "Kan de aanpassing niet opslaan"]);          
            }
            if(request()->action == "Toevoegen") {
                //$aPlanningContent["planningId"] = request()->planningId;
                $aPlanningContent["planningName"] = request()->planningName;
                $aPlanningContent["planningLocation"] = request()->planningLocation;
                $aPlanningContent["planningDate"] = request()->planningDate;
                $aPlanningContent["planningHighlight"] = request()->planningHighlight;
                $aPlanningContent["planning_content"] = request()->planning_content;

                if($this->planningBackend->CreatePlanning($aPlanningContent)) {
                    return redirect()->route('planningen');
                }
                return  redirect()->route('planningen')->withErrors(["Toevoegen mislukt" => "Kan de planning niet toevoegen"]);          
            }
            if(request()->action == "Verwijderen") {
                $id = request()->planningId;

                if($this->planningBackend->DeletePlanning($id)) {
                    return redirect()->route('planningen');
                }
                return  redirect()->route('planningen')->withErrors(["verwijderen mislukt" => "Kan de verwijdering niet voldoen"]);          
            }

            return redirect()->route('planningen');
        }
    }
    

    
    //frontend
    public function GetTripPlanning(Request $request){
         if ($request->session()->has('code')) {
            
            $tripCode = $request->session()->get('code');
            $trip = DB::table('trips')->where('travel_code', '=', $tripCode)->first();  
            
            $aPlanning = $this->planningFrontend->GetTripPLanning($trip->trip_id);
            
            return view('partials.frontend.planning', ["aPlanning" => $aPlanning]);
        }
        else
        {
            return redirect()->route('login');
        }
    }
    
    public function GetDayPlanning(Request $request, $id)
    {
        if ($request->session()->has('code')) {
                      
            $aDayPlanning = $this->planningFrontend->GetDayPlanning($id);
            
            return view('partials.frontend.planningDay', ["aPlanning" => $aDayPlanning]);
        }
        else
        {
            return redirect()->route('login');
        }
    }
}   

    


