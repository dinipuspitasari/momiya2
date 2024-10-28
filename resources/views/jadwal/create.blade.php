@extends('layouts.admin')

@section('title', 'Tambah Jadwal Dokter')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center">Tambah Jadwal Dokter</h2>
            <hr>

            {{-- Form untuk menambah jadwal --}}
            <form action="{{ route('jadwal.store') }}" method="POST">
                @csrf

                {{-- Pilih Dokter --}}
                <div class="form-group mb-4">
                    <label for="dokter_id">Dokter</label>
                    <select class="form-control" name="dokter_id" id="dokter_id" required>
                        <option value="" disabled selected>Pilih Dokter</option>
                        @foreach($dokters as $dokter)
                            <option value="{{ $dokter->id }}">{{ $dokter->user->name }}</option>
                        @endforeach
                    </select>
                </div>

                 {{-- Pilih Poliklinik --}}
                <div class="form-group mb-4">
                    <label for="poli_id">Poliklinik</label>
                    <select class="form-control" name="poli_id" id="poli_id" required>
                        <option value="" disabled selected>Pilih Poliklinik</option>
                    </select>
                </div>

                {{-- Input Hari --}}
                <div class="form-group mb-4">
                    <label for="hari">Hari</label>
                    <input type="text" class="form-control" name="hari" id="hari" placeholder="Masukkan Hari" value="{{ old('hari') }}" required>
                </div>

                {{-- Input Jam Mulai --}}
                <div class="form-group mb-4">
                    <label for="jam_mulai">Jam Mulai</label>
                    <input type="time" class="form-control" name="jam_mulai" id="jam_mulai" value="{{ old('jam_mulai') }}" required>
                </div>

                {{-- Input Jam Selesai --}}
                <div class="form-group mb-4">
                    <label for="jam_selesai">Jam Selesai</label>
                    <input type="time" class="form-control" name="jam_selesai" id="jam_selesai" value="{{ old('jam_selesai') }}" required>
                </div>

                {{-- Tombol Submit --}}
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>


            <script>
                document.getElementById('dokter_id').addEventListener('change', function () {
                    var dokterId = this.value;
                    var poliSelect = document.getElementById('poli_id');
            
                    // Kosongkan pilihan poliklinik
                    poliSelect.innerHTML = '<option value="" disabled selected>Pilih Poliklinik</option>';
            
                    if (dokterId) {
                        // Lakukan permintaan AJAX ke server untuk mendapatkan poliklinik
                        fetch(`/get-poli/${dokterId}`)
                            .then(response => response.json())
                            .then(data => {
                                // Tambahkan poliklinik ke dalam select poli
                                poliSelect.innerHTML = `<option value="${data.id}">${data.nama_poli}</option>`;
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    }
                });
            </script>
            
        </div>
    </div>
</div>

@endsection
