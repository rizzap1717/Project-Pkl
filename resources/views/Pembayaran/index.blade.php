@extends('layouts.backend')
@section('content')
<h3 class="mb-0 text-uppercase pb-3">TABEL Pembayaran</h3>
<hr>
<div class="card">
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
            {{-- <div class="col-lg-3 pb-3 ms-auto">
                <a href="{{ route('pembayaran.create') }}" class="btn btn-primary px-4 raised d-flex gap-2">
                    Tambah Pembayaran
                </a>
            </div> --}}
        <table class="table mb-0 table-striped">
            <thead>
                <tr>

                    <th scope="col">No</th>
                    <th scope="col">Nama Pembayaran</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Pajak</th>
                    <th scope="col">Total</th>
                    <th scope="col">Kembali</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembayaran as $data)
                <tr>
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $data->pembayaran }}</td>
                    <td>{{ $data->jumlah }}</td>
                    <td>{{ $data->subtotal }}</td>
                    <td>{{ $data->pajak }}</td>
                    <td>{{ $data->total }}</td>
                    <td>{{ $data->kembali }}</td>

                    <td>
                        {{-- <a href="{{ route('pembayaran.show', $data->id) }}" class="btn btn-primary gap-2"><i class="material-icons-outlined">search</i></a> --}}
                        <a href="{{ route('pembayaran.edit', $data->id) }}" class="btn btn-warning px-5">Edit</a>
                        <a class="btn ripple btn-danger px-5" href="{{ route('pembayaran.destroy', $data->id) }}" onclick="event.preventDefault();
                            document.getElementById('destroy-form').submit();return confirm('Apakah anda yakin??')">
                            Hapus
                        </a>

                        <form id="destroy-form" action="{{ route('pembayaran.destroy', $data->id) }}" method="POST" class="d-none">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection