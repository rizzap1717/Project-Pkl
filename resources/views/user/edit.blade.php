@extends('layouts.backend')
@section('content')
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Edit User {{ $user->name }}</h5>
            <form class="row g-3" method="POST" action="{{ route('user.update', $user->id) }}">
                @method('PATCH')
                @csrf
                <div class="col-md-4x">
                    <label for="input13" class="form-label">Nama</label>
                    <div class="position-relative">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="input13" value="{{ $user->name }}" placeholder="Full Name" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4x">
                    <label for="input13" class="form-label">Alamat</label>
                    <div class="position-relative">
                        <input type="text-area" name="alamat" class="form-control" placeholder="Masukkan Alamat" value="{{ $user->alamat }}" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="input19" class="form-label">Jenis Kelamin</label>
                    <div class="position-relative">
                        <input type="text" name="jenis_kelamin" class="form-control" value="{{$user->jenis_kelamin}}" disabled>
                    </div>
                    {{-- <select id="input19" name="jenis_kelamin" class="form-select">
                        <option selected="">Pilih...</option>
                        <option>Laki-Laki</option>
                        <option>Perempuan</option>
                    </select> --}}
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Kontrak</label>
                    <div class="position-relative">
                        <input type="text" name="kontrak" class="form-control" placeholder="Masukkan Kontrak"value="{{ $user->kontrak }}" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="input16" class="form-label">Email</label>
                    <div class="position-relative">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" id="input16" placeholder="Email" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- <div class="col-md-12">
                    <label for="input17" class="form-label">Password</label>
                    <div class="position-relative">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="input17" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="input17" class="form-label">Confirm Password</label>
                    <div class="position-relative">
                        <input type="password" name="password_confirmation" class="form-control" id="input17" placeholder="Password">
                    </div>
                </div> --}}
                {{-- <div class="col-md-12">
                    <label for="input19" class="form-label">level</label>
                    <select id="input19" name="is_admin" class="form-select">
                        <option value="0" {{ $user->is_admin == 0 ? 'selected' : '' }}>User</option>
                        <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Admin</option>
                    </select>
                </div> --}}
                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <a href="{{route('user.index')}}" class="btn btn-danger px-4">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection