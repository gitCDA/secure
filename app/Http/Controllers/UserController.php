<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){

        $users = User::all() ;
        return view("admin.user", compact("users")) ;
    }

    /****  
     *    Gestion des droits administrateurs
     ****/
    public function manage_right(User $user){

    //  variable créée :: trouver dans le modèle (base de données)
        //$user = User::find($id) ;

        $user->admin = !$user->admin ;
        $user->update() ;

        // return view("admin.user", compact("user")) ;
        return back() ;
    }
}