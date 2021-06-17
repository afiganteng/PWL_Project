<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Sparepart;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	
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
        
        return view('sparepart.index' , compact('sparepart'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sparepart.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Melakukan validasi data
        $request->validate([
            'id_sparepart' => 'required',
            'sparepart' => 'required',
            'stok' => 'required',
            'harga' => 'required',
        ]);

        // Fungsi eloquent untuk menambah data
        Sparepart::create($request->all());

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('sparepart.index')
            ->with('success', 'Sparepart Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_sparepart)
    {
        // Menampilkan detail data dengan menemukan/berdasarkan id_barang
        $Sparepart = Sparepart::find($id_sparepart);
        return view('sparepart.detail', compact('Sparepart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_sparepart)
    {
        // Menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Sparepart = Sparepart::find($id_sparepart);
        return view('sparepart.edit', compact('Sparepart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_sparepart)
    {
        // Melakukan validasi data
        $request->validate([
            'id_sparepart' => 'required',
            'sparepart' => 'required',
            'stok' => 'required',
            'harga' => 'required',
        ]);

        // Fungsi eloquent untuk mengupdate data inputan kita
        $sparepart = Sparepart::find($id_sparepart)->update($request->all());

        // Jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('sparepart.index')
            ->with('success', 'Sparepart Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_sparepart)
    {
        // Fungsi eloquent untuk menghapus data
        Sparepart::find($id_sparepart)->delete();
        return redirect()->route('sparepart.index')
            -> with('success', 'Sparepart Berhasil Dihapus');
    }
}
