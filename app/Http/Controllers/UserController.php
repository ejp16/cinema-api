<?php

namespace App\Http\Controllers;

use App\Models\InfoUsuario;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    
    public function login(Request $request)
    {
        $usuario = Usuario::where('correo', $request->correo)->first();
        if(!$usuario){
            return response()->json([
                'status' => 400,
                'description' => 'El usuario no existe'
            ]);

        }

        elseif($usuario && $usuario->password == $request->password){
            
            return response()->json([
                'status' => 200,
                'description' => "Usuario autenticado",
                'is_admin' => $usuario->rol,
                'id' => $usuario->id,
                'password' => $usuario->password
            ]);
        }
        return response()->json([
            'status' => 401,
            "description" => "Usuario no autenticado"
        ]);
    }

    public function cambiarPassword(Request $request){
        $usuario = Usuario::find($request->usuario_id);
        $usuario->password = $request->password;
        $usuario->save();
        return response()->json([
            'description' => 'Contrasena cambiada'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeUser(Request $request)
    {
        $usuario = new Usuario();
        $usuario->correo = $request->correo;
        $usuario->password = $request->password;
        $usuario->save();

        return response()->json([
            'status' => 200
        ]);

    }

    public function storeInfo(Request $request){

        $info = InfoUsuario::where('usuario_id', $request->usuario_id)->first();

        if($info){
            $info->nombre = $request->nombre;
            $info->apellido = $request->apellido;
            $info->cedula = $request->cedula;
            $info->foto = $request->foto;
            $info->direccion = $request->direccion;
            $info->pais = $request->pais;
            $info->estado = $request->estado;
            $info->ciudad = $request->ciudad;
            $info->telefono = $request->telefono;
            $info->usuario_id = $request->usuario_id;
            $info->save();

            return response()->json([
                'response'=>'actualizado'
            ]);
           
        }else{

            $infoUser = new InfoUsuario(); 
            $infoUser->nombre = $request->nombre;
            $infoUser->apellido = $request->apellido;
            $infoUser->cedula = $request->cedula;
            $infoUser->foto = $request->foto;
            $infoUser->direccion = $request->direccion;
            $infoUser->pais = $request->pais;
            $infoUser->estado = $request->estado;
            $infoUser->ciudad = $request->ciudad;
            $infoUser->telefono = $request->telefono;
            $infoUser->usuario_id = $request->usuario_id;
            $infoUser->save();
            return response()->json([
                'response' => 'guardado'
            ]);

        }

    }
    /**
     * Display the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario = Usuario::find($id);
        $usuario->correo = $request->correo;
        $usuario->password = $request->password;
        $usuario->save();
        return $usuario;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Usuario::destroy($id);
    }

    public function getUser(string $id){
        $usuario = Usuario::find($id);
        return $usuario;
    }

    public function getUserInfo(string $id){
        $info = InfoUsuario::where('usuario_id', $id)->first();
        
        return $info;
    }
}
