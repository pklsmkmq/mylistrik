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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body px-3 py-4-5" style="height: 30rem;">
                                <h3>Selamat Datang {{ auth()->user()->name }} Di My Listrik</h3>
                                <p>Tempat Pembayaran Listrik</p>
                                <hr>
                                @if ($data == true)
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="mb-5"
                                                style="color: black; font-size: xxx-large;text-align: center;">
                                                Cek Tagihan Listrik Bulan Ini</h4>
                                            <div class="text-center">
                                                <a href="#">
                                                    <button class="btn btn-primary"
                                                        style="height: 5rem; width: 30rem;font-size: 2.5rem;">
                                                        Lihat Sekarang
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($data == false)
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="mb-5"
                                                style="color: black; font-size: xx-large;text-align: center;">
                                                Lengkapi Data - Data MyListrik untuk menikmati layanan
                                                pembayaran listrik secara online</h4>
                                            <div class="text-center">
                                                <a href="{{ route('profil') }}">
                                                    <button class="btn btn-primary"
                                                        style="height: 5rem; width: 30rem;font-size: 2.5rem;">
                                                        Lengkapi Sekarang
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('layout/footer')
@endsection
