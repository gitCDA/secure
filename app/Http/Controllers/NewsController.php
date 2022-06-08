<?php

namespace App\Http\Controllers;

use App\Models\Actu;
use App\Models\Semaine;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function index(){

        $listeactus = Actu::all() ;
        $semaines = Semaine::all() ;
        return view("listeactuclient", compact("listeactus", "semaines")) ;
    }




    public function detail(Actu $listeactu){

        return view("detail", compact("listeactu")) ;
    }
}