@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Servis Motor
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Id : </b>{{$ServisMotor->id}}</li>
                        <li class="list-group-item"><b>Pelanggan: </b>{{$ServisMotor->pelanggan->nama}}</li>
                        <li class="list-group-item"><b>Mekanik : </b>{{$ServisMotor->mekanik->nama}}</li>
                        <li class="list-group-item"><b>Sparepart : </b>{{$ServisMotor->sparepart->sparepart}}</li>
                        <li class="list-group-item"><b>Qty : </b>{{$ServisMotor->qty}}</li>
                        <li class="list-group-item"><b>Harga Sparepart : </b>{{$ServisMotor->harga_sparepart}}</li>
                        <li class="list-group-item"><b>Harga Jasa : </b>{{$ServisMotor->harga_jasa}}</li>
                        <li class="list-group-item"><b>Total Bayar : </b>{{$ServisMotor->total_bayar}}</li>
                    </ul>
                </div>

                <a class="btn btn-success mt3" href="{{ route('servismotor.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection