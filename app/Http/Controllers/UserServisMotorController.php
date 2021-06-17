<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ServisMotor;
use App\Models\Mekanik;
use App\Models\Sparepart;
use App\Models\Pelanggan;
use PDF;

class UserServisMotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	
       
        $servis_motor = ServisMotor::where([
            ['qty','!=',Null],
            [function($query)use($request){
                if (($term = $request->term)) {
                    $query->orWhere('mekanik_id','LIKE','%'.$term.'%')
                          ->orWhere('pelanggan_id','LIKE','%'.$term.'%')
                          ->orWhere('sparepart_id','LIKE','%'.$term.'%')
                          ->orWhere('tanggal','LIKE','%'.$term.'%')
                          ->orWhere('harga_sparepart','LIKE','%'.$term.'%')
                          ->orWhere('harga_jasa','LIKE','%'.$term.'%')
                          ->orWhere('qty','LIKE','%'.$term.'%')
                          ->orWhere('total_bayar','LIKE','%'.$term.'%')->get();
                }
            }]
        ])
        ->orderBy('id','asc')
        ->simplePaginate(5);
        
        return view('user_servismotor.servismotor' , compact('servis_motor'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mekanik = Mekanik::all();
        $sparepart = Sparepart::all();
        $pelanggan = Pelanggan::all();
        return view('user_servismotor.servismotorcreate',  ['Pelanggan' => $pelanggan, 'Mekanik' => $mekanik, 'Sparepart' => $sparepart]);
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
            'pelanggan_id' => 'required',
            'mekanik_id' => 'required',
            'sparepart_id' => 'required',
            'qty' => 'required',
            'harga_sparepart' => 'required',
            'harga_jasa' => 'required',
            'total_bayar' => 'required',
            'tanggal' => 'required',
        ]);

        // Fungsi eloquent untuk menambah data
        ServisMotor::create($request->all());

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('user_servismotor.servismotor')
            ->with('success', 'Servis Motor Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Menampilkan detail data dengan menemukan/berdasarkan id_barang
        $servis_motor = ServisMotor::with('pelanggan')->where('id', $id)->first();
        $mekanik = Mekanik::all();
        $sparepart = Sparepart::all();
        $pelanggan = Pelanggan::all();
        return view('user_servismotor.servismotordetail', ['Pelanggan' => $pelanggan, 'ServisMotor' => $servis_motor,'Mekanik' => $mekanik, 'Sparepart' => $sparepart]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        // $servis_motor = ServisMotor::with('pelanggan')->where('id', $id)->first();
        // $mekanik = Mekanik::all();
        // $sparepart = Sparepart::all();
        // $pelanggan = Pelanggan::all();
        // return view('servismotor.edit', ['Pelanggan' => $pelanggan, 'ServisMotor' => $servis_motor,'Mekanik' => $mekanik, 'Sparepart' => $sparepart]);
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
        // Melakukan validasi data
        // $request->validate([
        //     'pelanggan_id' => 'required',
        //     'mekanik_id' => 'required',
        //     'sparepart_id' => 'required',
        //     'qty' => 'required',
        //     'harga_sparepart' => 'required',
        //     'harga_jasa' => 'required',
        //     'total_bayar' => 'required',
        //     'tanggal' => 'required',
        // ]);

        // $mekanik = new Mekanik;
        // $mekanik->id_mekanik = $request->get('mekanik_id');

        // $sparepart = new Sparepart;
        // $sparepart->id_sparepart = $request->get('sparepart_id');

        // $pelanggan = new Pelanggan;
        // $pelanggan->id_pelanggan = $request->get('pelanggan_id');

        // // Fungsi eloquent untuk mengupdate data inputan kita
        // ServisMotor::find($id)->update($request->all());

        // // Jika data berhasil diupdate, akan kembali ke halaman utama
        // return redirect()->route('servismotor.index')
        //     ->with('success', 'Servis Motor Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Fungsi eloquent untuk menghapus data
        // ServisMotor::find($id)->delete();
        // return redirect()->route('servismotor.index')
        //     ->with('success', 'Servis Motor Berhasil Dihapus');
    }

    public function cetak_pdf($id){
        // $products = Produk_Transaksi::with('produk')
        //     ->where('produk_id', $id)
        //     ->first();
        $servis_motor = ServisMotor::with('pelanggan')
            ->where('id', $id)
            ->get();
        $pdf = PDF::loadview('servismotor.servismotor_pdf', compact('servis_motor'));
        return $pdf->stream();
    }
}
