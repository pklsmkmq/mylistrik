@extends('layout/dashboard')

@section('content')
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-6 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-8">
                                    <h6 class="text-muted font-semibold text-front">
                                        Jumlah Pelanggan
                                    </h6>
                                    <h2 class="font-extrabold mb-0">{{ $data1 }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-8">
                                    <h6 class="text-muted font-semibold text-front">
                                        Jumlah Pembayaran Sukses
                                    </h6>
                                       <h2 class="font-extrabold mb-0">{{ $data2 }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <h3>Selamat Datang {{ auth()->user()->name }} Di My Listrik</h3>
                            <p>Tempat Pembayaran Listrik</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('layout/footer')
@endsection