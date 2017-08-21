<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use Illuminate\Support\Facades\Hash;
use Session;
use Mail;

class UsuariosController extends Controller
{

    public function __construct(){

    }
    // Procesar Login
    public function store(Request $request)
    {
        //
        $rules = [                  
                'email' => 'required|email|max:255|exists:usuarios',
                'password' => 'required|min:2'
                ];  

        $messages = [
                    'email.exists' => 'Usuario no registrado',
                    'email.required' => 'Es indispensable ingresar el email del usuario',
                    'email.email' => 'El email ingresad no es valido',
                    'email.max' => 'El email es demasiado extenso'
                    ];                  

        $this->validate($request,$rules,$messages);
        
        $usuarios = Usuarios::where('email',$request->input('email'))->first();

        if(Hash::check($request->input('password'), $usuarios->password)) {     

            Session::put('name',$usuarios->name); 
            return redirect('panel');
                   
        }else{
            return back()->with('notification','Error en clave');   
        }

             
    }

    public function panel(){                    
        return view('panel');
    }

    public function logout(){
        Session::flush();
        return redirect('/');
    }

    // ventana recuperar clave.
    public function recoverpassword(){ 
        return view('forgotpassword');   
    }

    // operacion recuperar clave.
    public function resetpassword(Request $request){

            $rules = [                  
                'email' => 'required|email|max:255|exists:usuarios'
            ];  

            $messages = [
                'email.exists' => 'Usuario no registrado',
                'email.required' => 'Es indispensable ingresar el email del usuario',
                'email.email' => 'El email ingresado no es valido',
                'email.max' => 'El email es demasiado extenso'
            ];                  

        $this->validate($request,$rules,$messages);

        $usuarios = Usuarios::where('email',$request->input('email'))->first();
        
        // --- Update
        $clave_nueva = str_random(8);        
        Usuarios::where('id', $usuarios->id)->update(['password' => bcrypt($clave_nueva)]);
        // ---

        Mail::send('emails.password', ['content' => $usuarios,'clave_nueva' => $clave_nueva], function ($message)
        {

            $message->from('jsus.guevara@gmail.com', 'Jesus Guevara');
            $message->subject('Correo Recuperar Clave');
            $message->to($usuarios->email);

        });

        return redirect('/recover')->with('notification','Clave enviada revise su correo por favor.');

    }

}
