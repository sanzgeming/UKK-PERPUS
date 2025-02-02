@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Buku</h5>
                    <p class="card-text">{{ $totalBuku }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Anggota</h5>
                    <p class="card-text">{{ $totalAnggota }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Transaksi</h5>
                    <p class="card-text">{{ $totalTransaksi }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Perpustakaan</h5>
                    <p class="card-text">{{ $totalPerpustakaan }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection