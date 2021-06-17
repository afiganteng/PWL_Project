@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Sparepart
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Id Sparepart : </b>{{$Sparepart->id_sparepart}}</li>
                        <li class="list-group-item"><b>Sparepart : </b>{{$Sparepart->sparepart}}</li>
                        <li class="list-group-item"><b>Stok : </b>{{$Sparepart->stok}}</li>
                        <li class="list-group-item"><b>Harga : </b>{{$Sparepart->harga}}</li>
                    </ul>
                </div>

                <a class="btn btn-success mt3" href="{{ route('sparepart.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection