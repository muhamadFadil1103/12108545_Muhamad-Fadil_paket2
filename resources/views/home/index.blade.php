@extends('layout.app')

@section('konten')

@php
  $info_user = @info_user(session('user_id'));
@endphp

<div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-cyan text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-account"></i>
                  </h1>
                  <h3 class="text-white">{{ @$total_pelanggan }}</h3>
                  <h6 class="text-white">Total Pelanggan</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-sale"></i>
                  </h1>
                  <h3 class="text-white">{{ @$total_penjualan }}</h3>
                  <h6 class="text-white">Total Penjualan</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-shopping"></i>
                  </h1>
                  <h3 class="text-white">{{ @$total_pembelian }}</h3>
                  <h6 class="text-white">Total Pembelian</h6>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-primary text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-border-outside"></i>
                  </h1>
                  <h3 class="text-white">{{ @$total_produk }}</h3>
                  <h6 class="text-white">Total Produk</h6>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-warning text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-account-star"></i>
                  </h1>
                  <h3 class="text-white">{{ @$total_supplier }}</h3>
                  <h6 class="text-white">Total Supplier</h6>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                <div class="box bg-danger text-center">
                  <h1 class="font-light text-white">
                    <i class="mdi mdi-account-multiple"></i>
                  </h1>
                  <h3 class="text-white">{{ @$total_user }}</h3>
                  <h6 class="text-white">Total User</h6>
                </div>
              </div>
            </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h4><small>Selamat Datang</small> {{ @$info_user['nama'] }}</h4>
        <h3><small>Anda Login Sebagai</small> {{ @$info_user['level'] }}</h3>
      </div>
    </div>
  </div>
</div>
@endsection