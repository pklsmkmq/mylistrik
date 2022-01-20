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
                <h3>Profil</h3>
                <p class="text-subtitle text-muted">Lengkapi Data - Data Di Bawah Ini Sebelum Melakukan Transaksi Di MyListrik</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profil</li>
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
                            @include('layout/message')
                            <form class="form" method="POST" action="{{ route('saveProfil') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="alamat-column">Alamat Rumah</label>
                                            <textarea class="form-control" id="alamat-column" rows="5" name="alamat" placeholder="Masukkan Alamat Rumah" required>@if ($cek == true){{$data->alamat}}@endif</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="meteran-column">Nomor Meteran</label>
                                            <input type="number" id="meteran-column" class="form-control"
                                                placeholder="Masukkan Tarif Listrik" name="nomor_meteran"
                                                @if ($cek == true)
                                                    value="{{ $data->nomor_meteran }}" 
                                                @endif
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="daya-column">Pilih Daya Meteran Listrik</label>
                                            <select class="form-control" id="daya-column"name="tarif_id" title="Pilih Daya Meteran" required>
                                                @foreach ($daya as $item)
                                                    <option value="{{ $item->id }}" 
                                                        @if ($cek == true)
                                                            @if ($item->id == $data->tarif_id)
                                                                selected    
                                                            @endif
                                                        @endif
                                                >{{ $item->daya }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">
                                            @if ($cek == true)
                                                Ubah Data
                                            @else
                                                Simpan Data
                                            @endif
                                        </button>
                                        <button type="reset"
                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
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