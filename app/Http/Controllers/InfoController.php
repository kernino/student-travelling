<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    public function index() {
        return view('partials.backend.info');
    }
    
    public function create() {
        
    }
}
