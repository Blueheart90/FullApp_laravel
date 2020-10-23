<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\User;
use App\Foto;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all(); 
        return view("admin.users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = $request->all();

        if($request->hasFile('foto_id'))
        {
            $ruta = $request->file('foto_id')->store('/public/images');

            //se crea el obj foto y se le asigna la ruta  
            $foto = Foto::create(['ruta'=>$ruta]);
            
            $usuario['foto_id'] = $foto->id; 
            
            // //obtenemos el nombre del file
            // $nombre = $archivo->getClientOriginalName();

            // //movemos el archivo a la carpeta images(/public/images) en el servidor con el nombre obtenido
            // $archivo->move('images', $nombre);

            // //metodo store
            // $archivo->storeAs('/public/images', $nombre);

            // //se crea el obj foto y se le asigna la ruta  
            // $foto = Foto::create(['ruta'=>$nombre]);
   
            
            // //agregamos el nombre del file al objeto rescatado
            // $usuario['foto_id'] = $foto->id;
        }

        //encriptar la contraseña
        $usuario['password'] = bcrypt($request->password);

        //ejecutamos la creacion del usuario
        User::create($usuario);

        return redirect('/admin/users');
        //return $foto->id;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view("admin.users.edit", compact("user"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $datos = $request->all();
        
        //$user->update($request->only('name', 'role_id', 'email'));
        
        if($request->hasFile('foto_id')){ 
            $ruta = $request->file('foto_id')->store('/public/images');
            if (isset($user->foto_id)) {
                $foto = Foto::findOrFail($user->foto_id);
                if (Storage::exists($foto->ruta)) {
                    Storage::delete($foto->ruta);
                } 
                $foto->update(['ruta' => $ruta]);
            }else{
                $foto = Foto::create(['ruta'=>$ruta]);
            }
            $datos['foto_id']= $foto->id;
            //$user->update(['foto_id' => $foto->id]);
        }
        $user->update($datos);
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        if (isset($user->foto_id)) {
            $foto = Foto::findOrFail($user->foto_id);
            
            if (Storage::exists($foto->ruta)) {
                Storage::delete($foto->ruta);
            }              
        }
        
        $user->delete();
        return redirect('/admin/users');

    }
}
