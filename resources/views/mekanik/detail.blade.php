@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Mekanik
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Id Mekanik : </b>{{$Mekanik->id_mekanik}}</li>
                        <li class="list-group-item"><b>Nama Mekanik : </b>{{$Mekanik->nama}}</li>
                        <li class="list-group-item"><b>Foto : </b>{{$Mekanik->foto}}</li>
                        <li class="list-group-item"><b>Jenis Kelamin : </b>{{$Mekanik->jk}}</li>
                        <li class="list-group-item"><b>Alamat : </b>{{$Mekanik->alamat}}</li>
                        <li class="list-group-item"><b>Telepon : </b>{{$Mekanik->telepon}}</li>
                    </ul>
                </div>

                <a class="btn btn-success mt3" href="{{ route('mekanik.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection