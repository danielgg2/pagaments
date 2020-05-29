<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Categorie;
class CRUDCategoriesController extends Controller
{
    public function getCategories(){
    	$arrayCategories = Categorie::paginate(6);
    	return view('admin.categories.show', array('categories'=>$arrayCategories));
    }
    public function getCatCreate(){
        return view('admin.categories.create');
    }
    public function postCatCreate(CategoriaRequest $request){
        $dadesCategoria = $request->except('_token');
        Categorie::insert($dadesCategoria);
        return redirect('/administracio/categories');
    }
    public function deleteCat($id){
        Categorie::destroy($id);
        return redirect('/administracio/categories');
    }
    public function getEditCat($id){
        $categoria = Categorie::findOrFail($id);
        return view('admin.categories.edit', array('categoria'=>$categoria));
    }
    public function putEditCat($id, CategoriaRequest $request){
        $dadesCategoria = $request->except('_token','_method');
        Categorie::where('id','=',$id)->update($dadesCategoria);
        return redirect('/administracio/categories');
    }
}
