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
                <h3>Data Tarif My Listrik</h3>
                <p class="text-subtitle text-muted">list tarif meteran listrik</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tarif</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                {{-- <a href="#"><button class="btn btn-outline-primary">Tambah Tarif</button></a> --}}
                <a href="{{ route('addTarif') }}"><button class="btn btn-outline-success">Tambah Tarif</button></a>
            </div>
            <div class="card-body">
                @include('layout/message')
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Daya</th>
                            <th>Tarif</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->daya }}</td>
                                <td>{{ $item->tarifperkwh }}</td>
                                <td>
                                    <a href="{{ route('editTarif',$id = $item->id) }}"><button class="btn btn-primary mb-1 float-left mr-1">Edit</button></a>
                                    <form action="{{ route('deleteTarif',$id = $item->id) }}" method="post">
                                      @csrf
                                      @method("delete")
                                      <button class="btn btn-danger" type="submit">Delete</button>
                                  </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

@include('layout/footer')
@endsection