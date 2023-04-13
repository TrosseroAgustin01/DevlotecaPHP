<?php

namespace Controllers;

use Models\Contactos;
/*use http\Client\Response;*/
class ContactosController extends Controller
{
    public function index(){
        $datoContactos = Contactos::all();
        response()->json(["message" =>"Todos los contactos", "data" => $datoContactos]);
    }

    public function showContact($id) {
        $contactoId = Contactos::find($id);
        response()->json(["message" =>"Datos del contacto numero $id","data" => $contactoId]);

    }

    public function createContact(){

        $contacto = new Contactos();
        
        /* echo    app()->request()->get("nombre")." ".  app()->request()->get("primerapellido")." ". 
                app()->request()->get("segundoapellido")." ". app()->request()->get("correo"); */

        $contacto->nombre=app()->request()->get("nombre");
        $contacto->primerapellido=app()->request()->get("primerapellido");
        $contacto->segundoapellido=app()->request()->get("segundoapellido");
        $contacto->correo=app()->request()->get("correo");

        $contacto->save(); //* este save representa el inster de lo que seria el codigo sql de nuestra end point.

        response()->json(["status Code" => 200, "message" =>"Usuario creado con exito"]);
    }
    
    public function deleteContact($id){

        $contactoId = Contactos::destroy($id);

        response()->json(["status code" => 200,"message" =>"Datos del contacto numero $id eliminados"]);

    }    

    public function editContact($id){
        
        $contactoId = Contactos::find($id);

        $contactoId->updated();

    }

}


