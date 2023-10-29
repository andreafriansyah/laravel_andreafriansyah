@extends('layouts.layout')

@section('content')
    <div class="row justify-content-center mt-3">
        <h3 class=" mt-3">Rumah Sakit </h3>
        <div class="col-md-12">

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">List Rumah Sakit</div>
                <div class="card-body">
                    <a href="{{ route('createRS') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i>
                        Tambah Rumah Sakit</a>
                    <table class="table table-striped table-bordered">
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No. Telepon</th>
                                <th scope="col">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dataRS as $rumahsakit)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $rumahsakit->nama }}</td>
                                    <td>{{ $rumahsakit->alamat }}</td>
                                    <td>{{ $rumahsakit->telepon }}</td>
                                    <td>
                                        <a href="{{ route('showRS', $rumahsakit->id) }}" class="btn btn-warning btn-sm"><i
                                                class="bi bi-eye"></i> Show</a>
                                        <a href="{{ route('editRS', $rumahsakit->id) }}" class="btn btn-primary btn-sm"><i
                                                class="bi bi-pencil-square"></i> Edit</a>
                                        <button class="btn btn-danger btn-sm" id="delete-rs" onclick="deleteRs({{$rumahsakit->id}})" data-id="{{ $rumahsakit->id }}"><i
                                                class="bi bi-trash"></i>Delete</button>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="6">
                                    <span class="text-danger">
                                        <strong>No Data Found!</strong>
                                    </span>
                                </td>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $dataRS->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection

