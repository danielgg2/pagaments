<?php

namespace App\Http\Controllers;

use App\Http\Requests\PagamentRequest;
use App\Pagament;
use App\Curso;
use App\Compte;
use App\Categorie;
use Illuminate\Support\Facades\DB;
class CRUDPagamentsController extends Controller
{
    public function getPagaments(){
        $arrayPagaments = DB::table('pagaments')->orderBy('id','desc')->paginate(6);
    	return view('admin.pagaments.show', array('pagaments'=>$arrayPagaments));
    }
    public function getPagCreate(){
        $arrayCursos = Curso::all();
        $arrayComptes = Compte::all();
        $arrayCategories = Categorie::all();
        return view('admin.pagaments.create', array('cursos'=>$arrayCursos, 'comptes'=>$arrayComptes, 'categories'=>$arrayCategories));
    }
    public function postPagCreate(PagamentRequest $request){
        $dadesCategoria = $request->except('_token');
        Pagament::insert($dadesCategoria);
        return redirect('/administracio/pagaments');
    }
    public function deletePag($id){
        Pagament::destroy($id);
        return redirect('/administracio/pagaments');
    }
    public function getEditPag($id){
        $pagament = Pagament::findOrFail($id);
        $arrayCursos = Curso::all();
        $arrayComptes = Compte::all();
        $arrayCategories = Categorie::all();
        return view('admin.pagaments.edit', array('pagament'=>$pagament, 'cursos'=>$arrayCursos, 'comptes'=>$arrayComptes, 'categories'=>$arrayCategories));
    }
    public function putEditPag($id, PagamentRequest $request){
        $dadesCategoria = $request->except('_token','_method');
        Pagament::where('id','=',$id)->update($dadesCategoria);
        return redirect('/administracio/pagaments');
    }
}
