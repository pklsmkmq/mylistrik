@extends('layout/dashboard')

@section('content')
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Cek Tagihan</h3>
                <p class="text-subtitle text-muted">Lengkapi data berikut ini untuk mengecek tagihan listrik anda</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cek Tagihan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            @if ($status == "sudah")
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="mb-5"
                                            style="color: black; font-size: xxx-large;text-align: center;">
                                            Pembayaran Bulan Ini Sudah DiBayar Cek Menu Pembayaran</h4>
                                        <div class="text-center">
                                            <a href="{{ route('cekTagihan') }}">
                                                <button class="btn btn-primary"
                                                    style="height: 5rem; width: 30rem;font-size: 2.5rem;">
                                                    Cek Pembayaran
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($status == "No profil")
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="mb-5"
                                            style="color: black; font-size: xxx-large;text-align: center;">
                                            Data Pelanggan Belum Diisi Silahkan Klik Tombol Di Bawah Ini</h4>
                                        <div class="text-center">
                                            <a href="{{ route('profil') }}">
                                                <button class="btn btn-primary"
                                                    style="height: 5rem; width: 30rem;font-size: 2.5rem;">
                                                    Isi Sekarang
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @include('layout/message')
                                <form class="form" method="POST" action="{{ route('cek') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="meteran-awal">Meteran Awal</label> 
                                                <input type="number" id="meteran-awal" class="form-control"
                                                    placeholder="Masukkan Meteran Awal" name="meteran_awal" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="meteran-awal">Meteran Akhir</label> 
                                                <input type="number" id="meteran-akhir" class="form-control"
                                                    placeholder="Masukkan Meteran Akhir" name="meteran_akhir" required>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit"
                                                class="btn btn-primary me-1 mb-1">
                                                    Cek Harga
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>
@include('layout/footer')
@endsection