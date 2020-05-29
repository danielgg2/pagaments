<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursRequest;
use App\Curso;

class CRUDCursosController extends Controller
{
    public function getCursos(){
    	$arrayCursos = Curso::paginate(6);
    	return view('admin.cursos.show', array('cursos'=>$arrayCursos));
    }
    public function getCurCreate(){
        return view('admin.cursos.create');
    }
    public function postCurCreate(CursRequest $request){
        $dadesCursos = $request->except('_token');
        Curso::insert($dadesCursos);
        return redirect('/administracio/cursos');
    }
    public function deleteCur($id){
        Curso::destroy($id);
        return redirect('/administracio/cursos');
    }
    public function getEditCur($id){
        $curs = Curso::findOrFail($id);
        return view('admin.cursos.edit', array('curs'=>$curs));
    }
    public function putEditCur($id, CursRequest $request){
        $dadesCursos = $request->except('_token','_method');
        Curso::where('id','=',$id)->update($dadesCursos);
        return redirect('/administracio/cursos');
    }
}
