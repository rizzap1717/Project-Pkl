@extends('layouts.backend')

@section('content')
    <h3 class="mb-0 text-uppercase pb-3">MENU</h3>
    <hr>
    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-lg-2 pb-3 ms-auto">
                <a href="{{ route('menu.create') }}" class="btn btn-primary px-4 raised d-flex gap-2">
                    Tambah Menu
                </a>
            </div>
            <table class="table mb-0 table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama menu</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menu as $data)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $data->menu }}</td>
                            <td>{{ $data->kategori->nama_kategori ?? 'Kategori tidak tersedia' }}</td>
                            <td>{{ $data->harga }}</td>
                            <td>
                                <img src="{{ asset('images/menu/' . $data->gambar) }}" width="200" height="100"
                                    style="object-fit: cover;" alt="">
                            </td>
                            <td>
                                <a href="{{ route('menu.edit', $data->id) }}" class="btn btn-warning px-5">Edit</a>
                                
                                <a class="btn ripple btn-danger px-5" href="#" onclick="event.preventDefault();
                                    document.getElementById('delete-form-{{ $data->id }}').submit();"
                                    onclick="return confirm('Apakah anda yakin??')">Hapus</a>

                                <form id="delete-form-{{ $data->id }}" action="{{ route('menu.destroy', $data->id) }}"
                                    method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
