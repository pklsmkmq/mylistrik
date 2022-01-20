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
                {{-- <a href="#"><button class="btn btn-outline-primary">Tambah Tarif</button></a> --}}
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#uploadSantri">Tambah Tarif</button>
            </div>
            <div class="card-body">
                {{-- @include('layouts/massage') --}}
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>KWH</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($data as $item) --}}
                            <tr>
                                <td>1</td>
                                <td>ABCD</td>
                                <td>Abcd@asba.com</td>
                                <td>1200</td>
                                <td><button class="btn btn-primary">Lihat</button></td>
                               
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

@include('layout/footer')
@endsection