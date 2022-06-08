<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonCompteController extends Controller
{
    /***************************************  
     * Point d'entrée de ma classe construct
    ****************************************/
public function __construct(){

    // Sécurise toutes les pages de mon controlleur
    // $this->middleware('auth') ;
    

    // Sécurité avec une exception
    // $this->middleware('auth')->except("panier") ;
    // $this->middleware('auth')->except(['panier', "index"]) ; //tableau pour plusieurs fonct°


    // Sécuriser une partie de la vue
    
}


    public function index(){

        return view("moncompte") ;
    }

    public function panier(){

        return view("panier") ;
    }
}