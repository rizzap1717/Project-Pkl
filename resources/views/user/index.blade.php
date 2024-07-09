@extends('layouts.backend')
@section('content')
<h3 class="mb-0 text-uppercase pb-3">DAFTAR KASIR</h3>
<hr>
<div class="card">
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="col-lg-2 pb-3 ms-auto">
            <a href="{{ route('user.create') }}" class="btn btn-primary px-5 d-flex gap-2">
                Daftar Kasir
            </a>
        </div>
        <table class="table mb-0">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kasir</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jenis kelamin</th>
                    <th scope="col">Kontrak</th>
                    <th scope="col">Email</th>
                    <th scope="col">Level</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $data)

                <tr>
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{$data->name}}</td>
                    <td>{{$data->alamat}}</td>
                    <td>{{$data->jenis_kelamin}}</td>
                    <td>{{$data->kontrak}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data ->is_admin ? 'Admin' : 'User'}}</td>
                    <td>
                        
                        <a href="{{ route('user.edit', $data->id) }}" class="btn btn-grd btn-warning px-5">Edit</a>
                        <a class="btn btn-grd btn-danger px-5" href="{{ route('user.destroy', $data->id) }}" onclick="event.preventDefault(); document.getElementById('destroy-form').submit();return confirm('Apakah anda yakin ingin menghapus??')">Hapus</a>

                        <form id="destroy-form" action="{{ route('user.destroy', $data->id) }}"
                            method="POST" class="d-none">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>

            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection