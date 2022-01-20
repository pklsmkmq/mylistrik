@extends('auth/template')

@section('content')
<div class="container">
  <div class="row align-items-center justify-content-center">
    <div class="col-md-7">
      <h3>Selamat Datang Di <strong>MyListrik</strong></h3>
      <p class="mb-4">Tempat pembayaran listrik</p>
      <form action="{{ route('login') }}" method="post" class="mb-3">
        @csrf
        <div class="form-group first">
          <label for="username">Email Anda</label>
          <input type="text" class="form-control" placeholder="your-email@gmail.com" id="username" name="email">
        </div>
        <div class="form-group last mb-3">
          <label for="password">Password Anda</label>
          <input type="password" class="form-control" placeholder="Your Password" id="password" name="password">
        </div>
        
        <div class="d-flex mb-5 align-items-center">
          <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
            <input type="checkbox" checked="checked"/>
            <div class="control__indicator"></div>
          </label>
          <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
        </div>

        <input type="submit" value="Log In" class="btn btn-block btn-primary">
      </form>

      <span class="ml-auto text-center">Belum Punya Akun ? <a href="#" class="forgot-pass">Daftar Sekarang</a></span> 
    </div>
  </div>
</div>    
@endsection