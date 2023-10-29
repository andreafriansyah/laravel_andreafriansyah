@extends('layouts.layout')

@section('content')

@if ($message = Session::get('errors'))
    <div class="alert alert-danger" role="alert">
        {{ $message }}
    </div>
@endif

<div class="row justify-content-center mt-3">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Pasien
                </div>
                <div class="float-end">
                    <a href="{{ route('indexPasien') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('updatePasien', $dataPasien->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="nama" class="col-md-4 col-form-label text-md-end text-start">Nama</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $dataPasien->nama }}">
                            @if ($errors->has('nama'))
                                <span class="text-danger">{{ $errors->first('nama') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="telepon" class="col-md-4 col-form-label text-md-end text-start">No. Telepon</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="{{ $dataPasien->telepon }}">
                            @if ($errors->has('telepon'))
                                <span class="text-danger">{{ $errors->first('telepon') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="alamat" class="col-md-4 col-form-label text-md-end text-start">Alamat</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ $dataPasien->alamat }}</textarea>
                            @if ($errors->has('alamat'))
                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="rs" class="col-md-4 col-form-label text-md-end text-start">Rumah Sakit</label>
                        <div class="col-md-6">
                            <select name="rs" class="form-control">
                                @forelse($rumahSakit as $rs)
                                    @php
                                        if($rs->nama == $dataPasien->rumahsakit->nama){
                                            $selected = "selected";
                                        }else {
                                            $selected = "";
                                        }
                                    @endphp
                                    <option value="{{ $rs->id }}" $selected>{{ $rs->nama }}</option>
                                @empty
                                    <option>Tidak ada data Rumah Sakit</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
