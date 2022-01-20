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
                <h3>Data Pelanggan My Listrik</h3>
                <p class="text-subtitle text-muted">list pelanggan yang sudah daftar di mylistrik</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pelanggan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            {{-- <div class="card-header">
                <a href="{{ route('addSantri') }}"><button class="btn btn-outline-primary">Tambah Santri</button></a>
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#uploadSantri">Tambah Banyak Santri</button>
            </div> --}}
            <div class="card-body">
                {{-- @include('layouts/massage') --}}
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>KWH</th>
                            {{-- <th>Kota</th> --}}
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
                                {{-- <td>
                                    <a href="{{ route('jurnalSantri',$nisn = $item->nisn) }}"><button class="btn btn-secondary mb-1 float-left mr-1">Jurnal</button></a>
                                    <a href="{{ route('editSantri',$nisn = $item->nisn) }}"><button class="btn btn-primary mb-1 float-left mr-1">Edit</button></a>
                                    <form action="{{ route('deleteSantri',$nisn = $item->nisn) }}" method="post">
                                      @csrf
                                      @method("delete")
                                      <button class="btn btn-danger" type="submit">Delete</button>
                                  </form>
                                </td> --}}
                            </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

@include('layout/footer')
@endsection