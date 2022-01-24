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
                <h3>Detail Pembayaran</h3>
                {{-- <p class="text-subtitle text-muted">Bayar tagihan tepat waktu agar listrik tetap hidup</p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('cekTagihan') }}">Cek Tagihan</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('bayar') }}">Cek Harga</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Pembayaran</li>
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
                                            Struk Pembayaran Tagihan Meteran Listrik</h4>
                                        <table style="margin: auto; width: 40%;">
                                            <tbody>
                                                <tr>
                                                    <th>Nomor Meteran</th>
                                                    <td>{{ $noMeter }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nama</th>
                                                    <td>{{ $nama }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Daya</th>
                                                    <td>{{ $daya }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Bulan - Tahun</th>
                                                    <td>{{ $blnThn }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Stand Meter</th>
                                                    <td>{{ $stdMeter }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tarif Tagihan</th>
                                                    <td>Rp. {{ number_format($harga,0,',','.') }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Biaya Admin</th>
                                                    <td>Rp. {{ $adm }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Total Bayar</th>
                                                    <td>Rp. {{ number_format($totbar,0,',','.') }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
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