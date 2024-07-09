@extends('layouts.backend')

@section('content')
    <h3 class="mb-0 text-uppercase pb-3">KATEGORI</h3>
    <hr>
    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-lg-2 pb-3 ms-auto">
                <a href="{{ route('kategori.create') }}" class="btn btn-primary px-4 raised d-flex gap-2">
                    Tambah Kategori
                </a>
            </div>
            <table class="table mb-0 table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $data)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $data->nama_kategori }}</td>
                            <td>
                                <img src="{{ asset('images/kategori/' . $data->foto) }}" width="200" height="100"
                                    style="object-fit: cover;" alt="">
                            </td>
                            <td>
                                <a href="{{ route('kategori.edit', $data->id) }}" class="btn btn-warning px-5">Edit</a>

                                <a class="btn ripple btn-danger px-5"
                                    href="{{ route('kategori.destroy', $data->id) }}"
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $data->id }}').submit(); return confirm('Apakah anda yakin??')">
                                    Hapus
                                </a>

                                <form id="delete-form-{{ $data->id }}"
                                    action="{{ route('kategori.destroy', $data->id) }}" method="POST"
                                    style="display: none;">
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
