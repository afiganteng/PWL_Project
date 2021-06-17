<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mekanik;
use App\Models\Sparepart;

class UserBiasaController extends Controller
{
    public function sparepart(Request $request){
        $sparepart = Sparepart::where([
            ['sparepart','!=',Null],
            [function($query)use($request){
                if (($term = $request->term)) {
                    $query->orWhere('sparepart','LIKE','%'.$term.'%')
                          ->orWhere('stok','LIKE','%'.$term.'%')
                          ->orWhere('harga','LIKE','%'.$term.'%')->get();
                }
            }]
        ])
        ->orderBy('id_sparepart','asc')
        ->simplePaginate(5);
        
        return view('user_biasa.sparepart' , compact('sparepart'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    public function mekanik(Request $request){
        $mekanik = Mekanik::where([
            ['nama','!=',Null],
            [function($query)use($request){
                if (($term = $request->term)) {
                    $query->orWhere('nama','LIKE','%'.$term.'%')
                          ->orWhere('alamat','LIKE','%'.$term.'%')
                          ->orWhere('foto','LIKE','%'.$term.'%')
                          ->orWhere('jk','LIKE','%'.$term.'%')
                          ->orWhere('telepon','LIKE','%'.$term.'%')->get();
                }
            }]
        ])
        ->orderBy('id_mekanik','asc')
        ->simplePaginate(5);
        
        return view('user_biasa.mekanik' , compact('mekanik'))
        ->with('i',(request()->input('page',1)-1)*5);
    }
}
