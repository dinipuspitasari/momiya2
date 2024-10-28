@extends('layouts.admin')

@section('title', 'Detail Reservasi')

@section('content')
    <h1>Detail Reservasi</h1>
    <p><strong>Nama Orang Tua:</strong> {{ $reservasi->pasien->name }}</p>
    <p><strong>Nama Anak:</strong> {{ $reservasi->nama_anak }}</p>
    <p><strong>NIK Anak:</strong> {{ $reservasi->nik_anak }}</p>
    <p><strong>No KK:</strong> {{ $reservasi->no_kk_anak }}</p>
    <p><strong>Dokter</strong> {{ $reservasi->dokter->user->name }}</p>
    <p><strong>Poliklinik</strong> {{ $reservasi->poli->nama_poli }}</p>
    <p><strong>Tanggal Kedatangan:</strong> {{ $reservasi->tanggal_kedatangan }}</p>
    <p><strong>Jam Reservasi:</strong> {{ $reservasi->jam_reservasi }}</p>
    <p><strong>Status:</strong> {{ $reservasi->status }}</p>
    
    <a href="{{ route('reservasi.adminIndex') }}" class="btn btn-secondary">Kembali</a>
@endsection
