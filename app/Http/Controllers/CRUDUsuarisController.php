<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuariRequest;
use App\User;
class CRUDUsuarisController extends Controller
{
    public function getUsuaris(){
    	$arrayUsuaris = User::paginate(6);
    	return view('admin.usuaris.show', array('usuaris'=>$arrayUsuaris));
    }
    public function getUsuCreate(){
        return view('admin.usuaris.create');
    }
    public function postUsuCreate(UsuariRequest $request){
        $name = $request->all();
        $p = new User;
        $p->email = $name['email'];
        $p->usuari = $name['usuari'];
        $p->contrasenya = bcrypt($name['contrasenya']);
        $p->save();
        return redirect('/administracio/usuaris');
    }
    public function deleteUsu($id){
        User::destroy($id);
        return redirect('/administracio/usuaris');
    }
    public function getEditUsu($id){
        $usuari = User::findOrFail($id);
        return view('admin.usuaris.edit', array('usuari'=>$usuari));
    }
    public function putEditUsu(UsuariRequest $request, $id){
        $name = $request->all();
        $p = User::findOrFail($id);
        $p->email = $name['email'];
        $p->usuari = $name['usuari'];
        $p->contrasenya = bcrypt($name['contrasenya']);
        $p->save();
        return redirect('/administracio/usuaris');
    }
}
