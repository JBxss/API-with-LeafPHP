<?php

namespace App\Controllers;
use App\Models\Contactos;

class ContactosController extends Controller {

    //Este metodo sirve para acceder a todos los registros de la tabla contactos
    public function index(){
        $datosContactos = Contactos::all();
        response()->json($datosContactos);
    }

    public function consultar($id){
        $datosContactos = Contactos::find($id);
        response()->json($datosContactos);
    }

    public function agregar(){
        $contacto = new Contactos;

        $contacto -> nombre = app()->request()->get('nombre');
        $contacto -> primerapellido = app()->request()->get('primerapellido');
        $contacto -> segundoapellido = app()->request()->get('segundoapellido');
        $contacto -> correo = app()->request()->get('correo');
        $contacto -> save();

        response()->json(["message" => "Registro Agregado"]);
    }

    public function borrar($id){
        Contactos::destroy($id);
        response()->json(["message" => "Registro Eliminado #".$id]);
    }

    public function actualizar($id){

        $nombre = app()->request()->get('nombre');
        $primerapellido = app()->request()->get('primerapellido');
        $segundoapellido = app()->request()->get('segundoapellido');
        $correo = app()->request()->get('correo');

        $contacto = Contactos::findorfail($id);

        $contacto -> nombre = ($nombre!="") ? $nombre : $contacto -> nombre;
        $contacto -> primerapellido = ($primerapellido!="") ? $primerapellido : $contacto -> primerapellido;
        $contacto -> segundoapellido = ($segundoapellido!="") ? $segundoapellido : $contacto -> segundoapellido;
        $contacto -> correo = ($correo!="") ? $correo : $contacto -> correo;
        
        $contacto -> update();


        response()->json(["message" => "Registro Actualizado #".$id]);
    }

}