@extends('layouts.layout')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Detail Rumah Sakit
                </div>
                <div class="float-end">
                    <a href="{{ route('home') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <label for="nama" class="col-md-4 col-form-label text-md-end text-start"><strong>Nama :</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $dataRS->nama }}
                    </div>
                </div>

                <div class="row">
                    <label for="alamat" class="col-md-4 col-form-label text-md-end text-start"><strong>Alamat :</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $dataRS->alamat }}
                    </div>
                </div>

                <div class="row">
                    <label for="email" class="col-md-4 col-form-label text-md-end text-start"><strong>Email :</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $dataRS->email }}
                    </div>
                </div>

                <div class="row">
                    <label for="telepon" class="col-md-4 col-form-label text-md-end text-start"><strong>No. Telepon :</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $dataRS->telepon }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
