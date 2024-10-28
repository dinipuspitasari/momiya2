@extends('layouts.admin')

@section('title', 'Manajemen Reservasi')

@section('content')
    <h1>Manajemen Reservasi</h1>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Nama Orang Tua</th>
                <th>Nama Anak</th>
                <th>Tanggal Kedatangan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservasis as $reservasi)
                <tr>
                    <td>{{ $reservasi->pasien->name }}</td>
                    <td>{{ $reservasi->nama_anak }}</td>
                    <td>{{ $reservasi->tanggal_kedatangan }}</td>
                    <td>{{ $reservasi->status }}</td>
                    <td>
                        <a href="{{ route('reservasi.adminShow', $reservasi->id) }}" class="btn btn-info">Detail</a>
                        <form action="{{ route('reservasi.updateStatus', $reservasi->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <select name="status" onchange="this.form.submit()">
                                <option value="pending" {{ $reservasi->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $reservasi->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="completed" {{ $reservasi->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection