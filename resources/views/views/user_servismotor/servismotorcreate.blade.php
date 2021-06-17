@extends('layout.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Form Tambah Servis Motor</h1>
            </div>
        </div>
    </div>
</div>

<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3><strong>Silahkan masukkan data servis motor</strong></h3>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Perhatian!</strong> Ada masalah dengan inputan Anda!<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="POST" action="{{ route('user_servismotor.store') }}" id="myForm">
                            @csrf
                            <div class="form-group">
                                <label for="pelanggan_id">Pelanggan</label>
                                <select name="pelanggan_id" id="pelanggan_id" class="form-control">
                                    <option selected disabled>Pilih Pelanggan</option>
                                @foreach($Pelanggan as $pl)
                                    <option value="{{ $pl->id_pelanggan }}">{{ $pl->nama }}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="mekanik_id">Mekanik</label>
                                <select name="mekanik_id" id="mekanik_id" class="form-control">
                                    <option selected disabled>Pilih Mekanik</option>
                                @foreach($Mekanik as $mk)
                                    <option value="{{ $mk->id_mekanik }}">{{ $mk->nama }}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sparepart_id">Mekanik</label>
                                <select name="sparepart_id" id="sparepart_id" class="form-control">
                                    <option selected disabled>Pilih Sparepart</option>
                                @foreach($Sparepart as $sp)
                                    <option value="{{ $sp->id_sparepart }}">{{ $sp->sparepart }}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="qty">Qty</label>
                                <input type="text" name="qty" class="form-control" id="qty" aria-describedby="qty">
                            </div>

                            <div class="form-group">
                                <label for="harga_sparepart">Harga Sparepart</label> 
                                <input type="text" name="harga_sparepart" class="form-control" id="harga_sparepart" aria-describedby="harga_sparepart">
                            </div>

                            <div class="form-group">
                                <label for="harga_jasa">Harga Jasa</label> 
                                <input type="text" name="harga_jasa" class="form-control" id="harga_jasa" aria-describedby="harga_jasa">
                            </div>

                            <div class="form-group">
                                <label for="total_bayar">Total Bayar</label>
                                <input type="text" name="total_bayar" class="form-control" id="total_bayar" aria-describedby="total_bayar">
                            </div>

                            
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" id="tanggal" aria-describedby="tanggal" placeholder="YYYY-MM-DD"
                                value="" min="1997-01-01" max=<?php echo date('Y-m-d'); ?> placeholder="Pilih Tanggal">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('user_servismotor.servismotor') }}" class="btn btn-danger">KEMBALI</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
