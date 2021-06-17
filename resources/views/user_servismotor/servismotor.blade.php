@extends('layout.app')
@section('content')
<!-- Page Heading -->
<div class="page-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Data Transaksi</h1>
            </div>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<!-- Tables -->
<section class="tables">
    <div class="container-fluid">
        <div class="row">
            <div class="mx-auto pull-right">
                <div class="float-left">
                    <form action="{{ route('user_servismotor.index') }}" method="GET" role="search">                           
                        <div class="input-group">
                            <a href="{{ route('user_servismotor.index') }}" class="mr-4 mt-1">
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button" title="Refresh page">
                                        <span class="fas fa-sync-alt">Refresh</span>
                                    </button>
                                </span>
                            </a>
                            
                            <input type="text" class="form-control mr-4 mt-1" name="term" placeholder="Search" id="term">
                            <span class="input-group-btn mr-2 mt-1">
                                <input type="submit" value="Cari" class="btn btn-primary">
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-12">
                <div class="default-table">
                    <table>
                        <caption></caption>
                        <thead>
                            <tr>
                                <th scope="">Id</th>
                                <th scope="">Pelanggan</th>
                                <th scope="">Mekanik</th>
                                <th scope="">Sparepart</th>
                                <th scope="">Qty</th>
                                <th scope="">Harga Sparepart</th>
                                <th scope="">Harga Jasa</th>
                                <th scope="">Total Bayar</th>
                                <th scope="">Tanggal</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($servis_motor as $sm)
                            <tr>
                                <td>{{ $sm->id }}</td>
                                <td>{{ $sm->pelanggan->nama }}</td>
                                <td>{{ $sm->mekanik->nama }}</td>
                                <td>{{ $sm->sparepart->sparepart }}</td>
                                <td>{{ $sm->harga_sparepart }}</td>
                                <td>{{ $sm->harga_jasa }}</td>
                                <td>{{ $sm->qty }}</td>
                                <td>{{ $sm->total_bayar }}</td>
                                <td>{{ $sm->tanggal }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('user_servismotor.show', $sm->id ) }}">Show</a>
                                    <a class="btn btn-warning" href="{{ route('servismotor.cetak_pdf',  $sm->id) }}">Cetak</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $servis_motor->links() }}
                    <!-- TARUH LINKS DISINI-->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
