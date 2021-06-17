<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Pelanggan;

class UserPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	
        $pelanggan = Pelanggan::where([
            ['nama','!=',Null],
            [function($query)use($request){
                if (($term = $request->term)) {
                    $query->orWhere('nama','LIKE','%'.$term.'%')
                          ->orWhere('alamat','LIKE','%'.$term.'%')
                          ->orWhere('foto','LIKE','%'.$term.'%')
                          ->orWhere('jk','LIKE','%'.$term.'%')
                          ->orWhere('tgl','LIKE','%'.$term.'%')
                          ->orWhere('jenis','LIKE','%'.$term.'%')
                          ->orWhere('nopol','LIKE','%'.$term.'%')->get();
                }
            }]
        ])
        ->orderBy('id_pelanggan','asc')
        ->simplePaginate(5);
        
        return view('user_pelanggan.pelanggan' , compact('pelanggan'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_pelanggan.pelanggancreate');
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
            'tgl' => 'required',
            'jenis' => 'required',
            'nopol' => 'required',
        ]);

        // Fungsi eloquent untuk menambah data
        // Pelanggan::create($request->all());
        if ($request->file('foto')) 
        {
            $image_name = $request->file('foto')->store('images', 'public');
            Pelanggan::create([
                'id_pelanggan'              => $request->id_pelanggan,
                'nama'                      => $request->nama,
                'foto'                      => $image_name,
                'jk'                        => $request->jk,
                'alamat'                    => $request->alamat,
                'tgl'                       => $request->tgl,
                'jenis'                     => $request->jenis,
                'nopol'                     => $request->nopol,
            ]);
        }

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('user_pelanggan.index')
            ->with('success', 'Pelanggan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pelanggan)
    {
        // Menampilkan detail data dengan menemukan/berdasarkan id_barang
        $Pelanggan = Pelanggan::find($id_pelanggan);
        return view('user_pelanggan.pelanggandetail', compact('Pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pelanggan)
    {
        // Menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        // $Pelanggan = Pelanggan::find($id_pelanggan);
        // return view('pelanggan.edit', compact('Pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pelanggan)
    {
        // Melakukan validasi data
        // $request->validate([
        //     'nama' => 'required',
        //     'foto' => 'required',
        //     'jk' => 'required',
        //     'alamat' => 'required',
        //     'tgl' => 'required',
        //     'jenis' => 'required',
        //     'nopol' => 'required',
        // ]);

        // // Fungsi eloquent untuk mengupdate data inputan kita
        // // $pelanggan = Pelanggan::find($id_pelanggan)->update($request->all());

        // if($pelanggan->foto && file_exists(storage_path('app/public/' . $pelanggan->foto))){
        //     \Storage::delete('public/' . $pelanggan->foto);
        // }

        // $image_name = $request->file('foto')->store('images', 'public');
        // $pelanggan->foto = $image_name;
        // $pelanggan->save();

        // // Jika data berhasil diupdate, akan kembali ke halaman utama
        // return redirect()->route('pelanggan.index')
        //     ->with('success', 'Pelanggan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pelanggan)
    {
        // // Fungsi eloquent untuk menghapus data
        // Pelanggan::find($id_pelanggan)->delete();
        // return redirect()->route('pelanggan.index')
        //     -> with('success', 'Pelanggan Berhasil Dihapus');
    }
}
