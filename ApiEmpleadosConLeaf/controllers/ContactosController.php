<?php

namespace Controllers;

use Models\Contactos;

/*use http\Client\Response;*/
class ContactosController extends Controller
{
    public function index()
    {
        $datoContactos = Contactos::all();
        response()->json(["message" => "Todos los contactos", "data" => $datoContactos]);
    }

    public function showContact($id)
    {
        $contactoId = Contactos::find($id);
        response()->json(["message" => "Datos del contacto numero $id", "data" => $contactoId]);

    }

    public function createContact()
    {

        $contacto = new Contactos();

        /* echo    app()->request()->get("nombre")." ".  app()->request()->get("primerapellido")." ". 
        app()->request()->get("segundoapellido")." ". app()->request()->get("correo"); */

        $contacto->nombre = app()->request()->get("nombre");
        $contacto->primerapellido = app()->request()->get("primerapellido");
        $contacto->segundoapellido = app()->request()->get("segundoapellido");
        $contacto->correo = app()->request()->get("correo");

        $contacto->save(); //* este save representa el inster de lo que seria el codigo sql de nuestra end point.

        response()->json(["status Code" => 200, "message" => "Usuario creado con exito"]);
    }

    public function deleteContact($id)
    {

        $contactoId = Contactos::destroy($id);

        response()->json(["status code" => 200, "message" => "Datos del contacto numero $id eliminados"]);

    }

    public function updateContact($id)
    {

        $nombre = app()->request()->get("nombre");
        $primerapellido = app()->request()->get("primerapellido");
        $segundoapellido = app()->request()->get("segundoapellido");
        $correo = app()->request()->get("correo");
        //* aca le pasamos los datos que vamos a querer actualizar, en caso de no querr actualizarlos no le pasamos nada

        $contacto = Contactos::findOrFail($id);
        //* comprobamos si el id existe y si no cortamos la ejecucion

        $contacto->nombre =($nombre!="")? $nombre : $contacto->nombre;
        $contacto->primerapellido =($primerapellido!="")? $primerapellido : $contacto->primerapellido;
        $contacto->segundoapellido =($segundoapellido!="")? $segundoapellido : $contacto->segundoapellido;
        $contacto->correo =($correo!="")? $correo : $contacto->correo;
        //* le asignamos esos datos que antes definimos a el contacto seleccionado y decimos que en caso de que no le hayamos pasado un dato, se quede
        //* con el dato de origen.

        $contacto->update(); //* Actualizamos el contacto

        response()->json(["status code" => 200, "message" => "Datos del contacto numero $id actualizados"]);
    }

}