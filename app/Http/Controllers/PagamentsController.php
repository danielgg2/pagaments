<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pagament;
use App\Categorie;
use App\Curso;
use App\Compte;
use App\User;
use Illuminate\Support\Facades\DB;

class PagamentsController extends Controller
{
    public function getIndex(){
    	$arrayPagaments = Pagament::all();
    	return view('public.index', array('pagaments'=>$arrayPagaments));
    }
    public function getPagament($nivell,$id){
    	$pagament = Pagament::findOrFail($id);
        $compte = DB::table('comptes')->where('id',$pagament->compte_id)->first();
    	$arrayPagaments = Pagament::all();
    	if ($pagament->nivell == $nivell) {
    		return view('public.pagament', array('pagament'=>$pagament, 'pagaments'=>$arrayPagaments, 'compte'=>$compte));
    	}
    }
    public function getAdmin(){
    	return view('admin.admin');
    }

}
