<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Mekanik;

class MekanikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	
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
        
        return view('mekanik.index' , compact('mekanik'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mekanik.create');
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
            'nama' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg',
            'jk' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        // Fungsi eloquent untuk menambah data
        // Pelanggan::create($request->all());
        if ($request->file('foto')) 
        {
            $image_name = $request->file('foto')->store('images', 'public');
            Mekanik::create([
                'id_mekanik'                => $request->id_mekanik,
                'nama'                      => $request->nama,
                'foto'                      => $image_name,
                'jk'                        => $request->jk,
                'alamat'                    => $request->alamat,
                'telepon'                   => $request->telepon,
            ]);
        }

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mekanik.index')
            ->with('success', 'Mekanik Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_mekanik)
    {
        // Menampilkan detail data dengan menemukan/berdasarkan id_barang
        $Mekanik = Mekanik::find($id_mekanik);
        return view('mekanik.detail', compact('Mekanik'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_mekanik)
    {
        // Menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Mekanik = Mekanik::find($id_mekanik);
        return view('mekanik.edit', compact('Mekanik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_mekanik)
    {
        // Melakukan validasi data
        $request->validate([
            'nama' => 'required',
            'foto' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        // Fungsi eloquent untuk mengupdate data inputan kita
        // $pelanggan = Pelanggan::find($id_pelanggan)->update($request->all());

        if($mekanik->foto && file_exists(storage_path('app/public/' . $mekanik->foto))){
            \Storage::delete('public/' . $mekanik->foto);
        }

        $image_name = $request->file('foto')->store('images', 'public');
        $mekanik->foto = $image_name;
        $mekanik->save();

        // Jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mekanik.index')
            ->with('success', 'Mekanik Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_mekanik)
    {
        // Fungsi eloquent untuk menghapus data
        Mekanik::find($id_mekanik)->delete();
        return redirect()->route('mekanik.index')
            -> with('success', 'Mekanik Berhasil Dihapus');
    }

    public function produk()
    {
        return view('user_biasa.mekanik');
    }
}
