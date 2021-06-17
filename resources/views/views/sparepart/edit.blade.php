@extends('layout.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Sparepart
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

                    <form method="post" action="{{ route('sparepart.update', $Sparepart->id_sparepart) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                                <label for="id_sparepart">Id Sparepart</label>
                                <input type="text" name="id_sparepart" class="form-control" id="id_sparepart" value="{{ $Sparepart->id_sparepart }}" aria-describedby="id_sparepart" required="required">
                            </div>

                            <div class="form-group">
                                <label for="sparepart">Sparepart</label>
                                <input type="text" name="sparepart" class="form-control" id="sparepart" value="{{ $Sparepart->sparepart }}" aria-describedby="sparepart" required="required">
                            </div>
                            
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="text" name="stok" class="form-control" id="stok" value="{{ $Sparepart->stok }}" aria-describedby="stok" required="required">
                            </div>

                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" name="harga" class="form-control" id="harga" value="{{ $Sparepart->id_harga }}" aria-describedby="harga" required="required">
                            </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('sparepart.index') }}" class="btn btn-danger">KEMBALI</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
