@extends('layouts.admin')

@section('title', 'Buat Reservasi')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Buat Reservasi</h2>
    <hr>

    <form action="{{ route('reservasi.create') }}" method="POST">
        @csrf

        {{-- Pilih Dokter --}}
        <div class="form-group mb-4">
            <label for="dokter_id">Dokter</label>
            <select class="form-control" name="dokter_id" id="dokter_id" required>
                <option value="" disabled selected>Pilih Dokter</option>
                @foreach($dokters as $dokter)
                <option value="{{ $dokter->id }}" data-poli="{{ $dokter->poli_id }}">
                    {{ $dokter->user->name ?? 'Nama tidak tersedia' }}
                </option>
                @endforeach
            </select>
        </div>

        {{-- Pilih Poliklinik --}}
        <div class="form-group mb-4">
            <label for="poli_id">Poliklinik</label>
            <select class="form-control" name="poli_id" id="poli_id" required>
                <option value="" disabled selected>Pilih Poliklinik</option>
                @foreach($polikliniks as $poli)
                    <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                @endforeach
            </select>
        </div>

        {{-- Input Nama Anak --}}
        <div class="form-group mb-4">
            <label for="nama_anak">Nama Anak</label>
            <input type="text" class="form-control" name="nama_anak" id="nama_anak" required>
        </div>

        {{-- Input NIK Anak --}}
        <div class="form-group mb-4">
            <label for="nik_anak">NIK Anak</label>
            <input type="text" class="form-control" name="nik_anak" id="nik_anak" required>
        </div>

        {{-- Input No KK --}}
        <div class="form-group mb-4">
            <label for="no_kk_anak">No KK</label>
            <input type="text" class="form-control" name="no_kk_anak" id="no_kk_anak" required>
        </div>

        {{-- Input Tanggal Kedatangan --}}
        <div class="form-group mb-4">
            <label for="tanggal_kedatangan">Tanggal Kedatangan</label>
            <input type="date" class="form-control" name="tanggal_kedatangan" id="tanggal_kedatangan" required>
        </div>

        {{-- Input Jam Reservasi --}}
        <div class="form-group mb-4">
            <label for="jam_reservasi">Jam Reservasi</label>
            <input type="time" class="form-control" name="jam_reservasi" id="jam_reservasi" required>
        </div>

        {{-- Tombol Submit --}}
        <button type="submit" class="btn btn-primary">Buat Reservasi</button>
    </form>
</div>

<script>
document.getElementById('dokter_id').addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];
    var poliId = selectedOption.getAttribute('data-poli');

    // Set the selected poliklinik in the poli_id dropdown
    var poliSelect = document.getElementById('poli_id');
    for (var i = 0; i < poliSelect.options.length; i++) {
        if (poliSelect.options[i].value == poliId) {
            poliSelect.selectedIndex = i; // Set selected option
            break;
        }
    }
});
</script>
@endsection
