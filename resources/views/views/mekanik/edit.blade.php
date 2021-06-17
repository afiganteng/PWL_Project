@extends('layout.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Mekanik
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

                    <form method="post" action="{{ route('mekanik.update', $Mekanik->id_mekanik) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id_mekanik">Id Mekanik</label>
                        <input type="text" name="id_mekanik" class="form-control" id="id_mekanik" value="{{ $Mekanik->id_mekanik }}" ariadescribedby="id_mekanik" >
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Mekanik</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $Mekanik->nama }}" ariadescribedby="nama" >
                    </div>

                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control" id="foto" value="{{ $Mekanik->foto }}" ariadescribedby="foto" >
                        <img width="150px" src="{{asset('images/'.$Mekanik->foto)}}" alt="">
                    </div>

                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <input type="text" name="jk" class="form-control" id="jk" value="{{ $Mekanik->jk }}" ariadescribedby="jk" >
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $Mekanik->alamat }}" ariadescribedby="alamat" >
                    </div>

                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" name="telepon" class="form-control" id="telepon" value="{{ $Mekanik->telepon }}" ariadescribedby="telepon" >
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('mekanik.index') }}" class="btn btn-danger">KEMBALI</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
