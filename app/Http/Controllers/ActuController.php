<?php

namespace App\Http\Controllers;

use App\Models\Actu;
use App\Models\Semaine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActuController extends Controller
{
    //
    public function index(){

        $listeactu = Actu::all() ;
        // $contents = Storage::get('storage\app\avatars\ibt37weTo6NCcUTELeeOeZEsnszqcWomcK8zOBZg.jpg');
        return view("admin.actu-lister", compact("listeactu")) ;
    }





    public function actu_editer(Actu $listeactu){

        $semaines = Semaine::all() ;
        
        return view("admin.actu-editer", compact("listeactu", "semaines")) ;
    }





    public function create(Request $request){

        // dd($request) ;

        $validate = $request->validate(
            ["titre" => "required"]
        ) ;

        $listeactu = new Actu() ;

        // Mise à jour du titre et de la description dans la bdd
        $listeactu->titre = $request->titre ;

        $listeactu->description = $request->description ;

// Rentrer en bdd valeur du "name=semaine" de option dans la colonne semaine_id de la table semaine
        $listeactu->semaine_id = $request->semaine ;

     // Je vérifie l'existense de mon image
        if ($request->hasFile("ImageActu")){

            // Je récupère les informations de mon image
            // $image = $request->file("ImageActu") ;

            // Formatage du nom de mon image
            // $filename = time().".".$image->getClientOriginalExtension() ;
            // dd($filename) ;

            // Copie de l'image sur le serveur / la bdd
            $path = Storage::putFile('avatars', $request->file('ImageActu'));
            $listeactu->image = $path ;
        }

        $listeactu->save() ;

        return back() ;
    }




    public function update(Request $request, Actu $listeactu){

        $validate = $request->validate(
            ["titre" => "required"]
        ) ;

        // $listeactus = Actu::find($request->id) ;

        // $listeactus->titre = $request->titre ;

        // $listeactus->description = $request->description ;

        // $listeactus->image = $request->image ;

        // $listeactus->update() ;




        // Mise à jour des infos 
        $listeactu->update( [ "titre"=>$request->titre, "description"=>$request->description, 
        "semaine_id"=>$request->semaine ] ) ;

       // dd(([ "titre"=>$request->titre, "description"=>$request->description ])) ;
       return back() ;
    }




    public function delete(Request $request, Actu $listeactu){

        // Suppression des infos 

        $listeactu->delete() ; // ne rien mettre dans les paranthèses
        
        return back() ;
    }
}