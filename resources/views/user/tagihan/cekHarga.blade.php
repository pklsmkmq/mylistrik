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
                <h3>Tagihan {{ $bulan . " " . $tahun }}</h3>
                <p class="text-subtitle text-muted">Bayar tagihan tepat waktu agar listrik tetap hidup</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('cekTagihan') }}">Cek Tagihan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cek Harga</li>
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
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="mb-2"
                                            style="color: black; font-size: xx-large;text-align: center;">
                                            Tagihan Pada Bulan {{ $bulan . " tahun " . $tahun }} Sebesar</h4>
                                        <h3 class="mb-3"  style="color: rgb(255, 0, 0); font-size: xxx-large;text-align: center;">Rp. {{ number_format($harga,0,',','.') }}</h3>
                                        <div class="text-center">
                                            <a href="{{ route('detailbayar') }}">
                                                <button class="btn btn-primary"
                                                    style="height: 5rem; width: 30rem;font-size: 2.5rem;">
                                                    Bayar Sekarang
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
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