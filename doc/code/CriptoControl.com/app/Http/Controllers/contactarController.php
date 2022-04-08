<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NotificacionContacto;
use Illuminate\Support\Facades\Mail;

class contactarController extends Controller
{
    //
    public function create()
    {
        return view("correos.create2");
    }

      /**
     * Método para enviar los correos.
     */
    public function enviar(Request $request)
    {
        try{
            $validate = $request->validate([
                'g-recaptcha-response' => 'required|recaptcha',
                'nombre'=>'required',
                'apellidos'=>'required',
                'email'=>'required',
                'contenido'=>'required',
            ]);
    
            // Creamos un objeto de la clase NotificacionContacto
            $mailable = new NotificacionContacto($request->nombre, $request->apellidos, $request->email, $request->contenido);
    
            // Enviamos el correo al destinatario
            Mail::to('criptocontrol@criptocontrol.com')->send($mailable);
            return back()->with('estado', 'Se han enviado los datos del formulario correctamente. Contactaremos con usted lo antes posible. GRACIAS.');
        }catch(ValidationException $exception){
            dd("NO REVISADo");
        }
      
    }
}


