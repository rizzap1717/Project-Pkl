@extends('layouts.backend')
@section('content')
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Edit Pembayaran {{ $pembayaran->nama_pembayaran }}</h5>
            <form class="row g-3" method="POST" action="{{ route('pembayaran.update', $pembayaran->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                
                <div class="col-md-4x">
                    <label for="input13" class="form-label">Nama Menu</label>
                    <div class="position-relative input-icon">
                        <select class="form-control mb-3" name="id_menu" placeholder="menu" value="{{$pembayaran->menu}}" required>
                            @foreach ($menu as $data)
                            <option value="{{ $data->id }}">{{ $data->menu }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-md-4x">
                    <label for="input13" class="form-label">Jumlah</label>
                    <div class="position-relative input-icon">
                        <input class="form-control mb-3" type="text" name="jumlah" placeholder="Jumlah" value="{{$pembayaran->jumlah}}" required>
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Subtotal</label>
                    <div class="position-relative input-icon">
                        <input class="form-control mb-3" type="text" name="subtotal" placeholder="Subtotal" value="{{$pembayaran->subtotal}}" required>
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Pajak</label>
                    <div class="position-relative input-icon">
                        <input class="form-control mb-3" type="text" name="pajak" placeholder="Pajak" value="{{$pembayaran->pajak}}" required>
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Total</label>
                    <div class="position-relative input-icon">
                        <input class="form-control mb-3" type="text" name="total" placeholder="Total" value="{{$pembayaran->total}}" required>
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Kembali</label>
                    <div class="position-relative input-icon">
                        <input class="form-control mb-3" type="text" name="kembali" placeholder="Kembali" value="{{$pembayaran->kembali}}" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <a href="{{route('pembayaran.index')}}" class="btn btn-danger px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection