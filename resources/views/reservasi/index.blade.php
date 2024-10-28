@extends('layouts.admin')

@section('title', 'Daftar Reservasi')

@section('content')
    <h1>Daftar Reservasi</h1>
    <a href="{{ route('reservasi.create') }}" class="btn btn-primary">Buat Reservasi Baru</a>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Nama Anak</th>
                <th>Tanggal Kedatangan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservasis as $reservasi)
                <tr>
                    <td>{{ $reservasi->nama_anak }}</td>
                    <td>{{ $reservasi->tanggal_kedatangan }}</td>
                    <td>{{ $reservasi->status }}</td>
                    <td>
                        <a href="{{ route('reservasi.show', $reservasi->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('reservasi.edit', $reservasi->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
