@extends('layout.app')

@section('content')
<div class="container">
    <!-- Banner -->
    <section class="main-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="banner-caption">
                                    <h4>Selamat Datang di website <em>Sistem Informasi Bengkel</em></h4>
                                    @guest
                                    <p>Silahkan gunakan tombol <strong>Login</strong>
                                    </p>
                                    <div class="primary-button">
                                        <a href="{{ route('login') }}">LOGIN</a>
                                    </div>
                                    @else 
                                    <p>Silahkan gunakan tombol <strong>bengkel</strong> untuk melihat data bengkel!
                                    </p>
                                    <div class="primary-button">
                                        <a href="{{ route('pelanggan.index') }}">Bengkel</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
