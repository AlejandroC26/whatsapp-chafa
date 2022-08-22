<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\mensaje; 
use App\Models\User;

class mensajeController extends Controller
{
    public function registrarMensaje(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "cont_mensaje" => "required",
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }
        $user = User::find($request->fk_usuario);
        $user2 = User::find($request->fk_receptor);
        if(!$user) return response()->json(['message'=>'usuario no encontrado']);
        if(!$user2) return response()->json(['message'=>'usuario no encontrado']);
        $imagen = null;
        if($request->hasFile('archivo')){
            $archivo = $request->file('archivo');
            $file_validator = Validator::make($request->all(),[
                "archivo" => "max:2560",
            ]);
            if($file_validator->fails()){
                return response()->json(["message"=>'Tamaño excedido'],400);
            }
            $file_name = time().'.'.$archivo->getClientOriginalExtension();
            $new_route = public_path('/images/messages/'.$file_name);
            copy($archivo->getRealPath(), $new_route);
            $imagen = $file_name;
        }
        mensaje::create(array_merge($validator->validate(), [
            "fk_usuario"=>$request->fk_usuario,
            "fk_receptor"=>$request->fk_receptor,
            'archivos'=>$imagen
        ]));
        return response()->json([
            'message'=>'Mensaje registrado con exito',
        ],201);
    }

    public function consultarMensaje(Request $request)
    {
        $mensaje = mensaje::all();
        return response()->json($mensaje);
    }
    public function cambioEstado(Request $request,$id)
    {
        $estado = mensaje::find($id);
        $estado->est_mensaje = 'visto';
        $current_date = date('Y-m-d H:i:s');
        $estado->hora_visto = $current_date;
        $estado->save();
        return response()->json([
            'message'=>'cambio de estado exitoso',
        ]);

    }
}
