@extends('layout.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Pelanggan
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="post" action="{{ route('pelanggan.update', $Pelanggan->id_pelanggan) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id_pelanggan">Id Pelanggan</label>
                        <input type="text" name="id_pelanggan" class="form-control" id="id_pelanggan" value="{{ $Pelanggan->id_pelanggan }}" ariadescribedby="id_pelanggan" >
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Pelanggan</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $Pelanggan->nama }}" ariadescribedby="nama" >
                    </div>

                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control" id="foto" value="{{ $Pelanggan->foto }}" ariadescribedby="foto" >
                        <img width="150px" src="{{asset('images/'.$Pelanggan->foto)}}" alt="">
                    </div>

                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <input type="text" name="jk" class="form-control" id="jk" value="{{ $Pelanggan->jk }}" ariadescribedby="jk" >
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $Pelanggan->alamat }}" ariadescribedby="alamat" >
                    </div>

                    <div class="form-group">
                        <label for="tgl">Tanggal</label>
                        <input type="text" name="tgl" class="form-control" id="tgl" value="{{ $Pelanggan->tgl }}" ariadescribedby="tgl" >
                    </div>

                    <div class="form-group">
                        <label for="jenis">Jenis Kendaraan</label>
                        <input type="text" name="jenis" class="form-control" id="jenis" value="{{ $Pelanggan->jenis }}" ariadescribedby="jenis" >
                    </div>

                    <div class="form-group">
                        <label for="nopol">No. Polisi</label>
                        <input type="text" name="nopol" class="form-control" id="nopol" value="{{ $Pelanggan->nopol }}" ariadescribedby="nopol" >
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-danger">KEMBALI</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
