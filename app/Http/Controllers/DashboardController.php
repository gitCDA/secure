<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    //
    public function index(){

        /*****
         * Contrôle l'id de l'utilisateur avant d'accéder à la page dashboard
         *****/
        // ! = l'inverse de l'action
        // Si la Gate ne valide pas = Err 403
        if (! Gate::allows('access-admin')) {
            abort(403);
        }

        return view("dashboard") ;
    }
}