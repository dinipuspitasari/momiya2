@extends('layouts.admin')

@section('title', 'Tambah Dokter')

@section('content')

<div class="container mt-5 pb-28 mb-20">
    <div class="row ">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center text-3xl">Tambah Dokter</h2>
            <hr>

            {{-- Form untuk menambah dokter --}}
            <form action="{{ route('dokter.create') }}" method="POST" class="w-4/5">
                @csrf

                {{-- Input Nama Dokter --}}
                <div class="form-group row mb-4">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Dokter</label>
                    <input type="text"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-900 focus:border-gray-300 block w-full p-2.5 name="name" id="name" placeholder="Masukkan Nama Dokter" value="{{ old('name') }}" required>
                </div>

                {{-- Input NIK --}}
                <div class="form-group mb-4">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK" value="{{ old('nik') }}" required>
                </div>

                {{-- Input No KK --}}
                <div class="form-group mb-4">
                    <label for="no_kk">No KK</label>
                    <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="Masukkan No KK" value="{{ old('no_kk') }}" required>
                </div>

                {{-- Input No Telepon --}}
                <div class="form-group mb-4">
                    <label for="no_telp">No Telepon</label>
                    <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Masukkan No Telepon" value="{{ old('no_telp') }}" required>
                </div>

                {{-- Input Alamat --}}
                <div class="form-group mb-4">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" required>{{ old('alamat') }}</textarea>
                </div>

                {{-- Input Email --}}
                <div class="form-group mb-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" value="{{ old('email') }}" required>
                </div>

                {{-- Input Password --}}
                <div class="form-group mb-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" required>
                </div>

                {{-- Input Spesialis --}}
                <div class="form-group mb-4">
                    <label for="spesialis">Spesialis</label>
                    <input type="text" class="form-control" name="spesialis" id="spesialis" placeholder="Masukkan Spesialis Dokter" value="{{ old('spesialis') }}" required>
                </div>

                {{-- Input Poliklinik (Dropdown dari Poli) --}}
                <div class="form-group mb-4">
                    <label for="poli_id">Poliklinik</label>
                    <select class="form-control" name="poli_id" id="poli_id" required>
                        <option value="" disabled selected>Pilih Poliklinik</option>
                        @foreach($polikliniks as $poli)
                            <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Tombol Submit --}}
                <button type="submit" class="text-white bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Simpan</button>
            </form>
            <br><br><br><br><br>
        </div>
    </div>
</div>

@endsection
