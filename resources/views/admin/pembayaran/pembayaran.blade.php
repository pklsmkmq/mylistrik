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
                <h3>Data Pembayaran My Listrik</h3>
                <p class="text-subtitle text-muted">list pembayaran listrik di MyListrik</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pembayaranfa-border</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1" style="text-align: center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Stand Meteran</th>
                            <th>Total Bayar</th>
                            <th>Tanggal Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;    
                        @endphp
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->penggunaan->meter_awal . " - " . $item->penggunaan->meter_akhir }}</td>
                                <td>Rp. {{ number_format($item->pembayaran->total_bayar,0,',','.') }}</td>
                                <td>{{ $item->pembayaran->tanggal_pembayaran }}</td>
                            </tr>
                            @php
                                $no++;    
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

@include('layout/footer')
@endsection