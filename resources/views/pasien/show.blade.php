@extends('layouts.layout')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Detail Pasien
                </div>
                <div class="float-end">
                    <a href="{{ route('indexPasien') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <label for="nama" class="col-md-4 col-form-label text-md-end text-start"><strong>Nama :</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $dataPasien->nama }}
                    </div>
                </div>

                <div class="row">
                    <label for="alamat" class="col-md-4 col-form-label text-md-end text-start"><strong>Alamat :</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $dataPasien->alamat }}
                    </div>
                </div>

                <div class="row">
                    <label for="telepon" class="col-md-4 col-form-label text-md-end text-start"><strong>No. Telepon :</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $dataPasien->telepon }}
                    </div>
                </div>

                <div class="row">
                    <label for="rs" class="col-md-4 col-form-label text-md-end text-start"><strong>Rumah Sakit :</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $dataPasien->rumahsakit->nama }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
