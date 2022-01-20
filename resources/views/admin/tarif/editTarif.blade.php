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
                <h3>Edit Tarif Meteran</h3>
                <p class="text-subtitle text-muted">Anda dapat mengedit tarif meteran yang sudah ada disini</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('tarif') }}">Tarif</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Tarif</li>
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
                            <form class="form" method="POST" action="{{ route('updateTarif',$id = $data->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method("put")
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="daya-column">Daya</label>
                                            <input type="number" id="daya-column" class="form-control"
                                                placeholder="Masukkan Daya Listrik" name="daya" value="{{ $data->daya }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="tarif-column">Tarif Per KWH</label>
                                            <input type="number" id="tarif-column" class="form-control"
                                                placeholder="Masukkan Tarif Listrik" name="tarif" value="{{ $data->tarifperkwh }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Submit</button>
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