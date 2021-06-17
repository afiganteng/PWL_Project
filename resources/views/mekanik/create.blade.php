@extends('layout.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Form Tambah Mekanik</h1>
            </div>
        </div>
    </div>
</div>

<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3><strong>Silahkan masukkan data mekanik</strong></h3>
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
                        <form method="POST" action="{{ route('mekanik.store') }}" id="myForm" id="myForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Mekanik</label>
                                <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" required="required">
                            </div>

                            <div class="form-group">
                                <label for="foto">Foto</label> 
                                <input type="file" name="foto" class="form-control" id="foto" aria-describedby="foto" required="required">
                            </div>
                            
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
				                    <div class="row">
                                    	<div class="col-sm">
                                        	<input type="radio" class="form-control" id="Laki-laki" value="Laki-laki" name="jk">
                                        	<label for="Laki-laki">Laki-laki</label>
                                    	</div>
                                    	<div class="col-sm">
                                        	<input type="radio" class="form-control" id="Perempuan" value="Perempuan" name="jk">
                                        	<label for="Perempuan">Perempuan</label>
                                    	</div>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat" required="required">
                            </div>
                            
                            <div class="form-group">
                                <label for="telepon">Telepon</label>
                                <input type="text" name="telepon" class="form-control" id="telepon" aria-describedby="telepon" required="required">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('mekanik.index') }}" class="btn btn-danger">KEMBALI</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
