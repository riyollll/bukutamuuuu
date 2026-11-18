@extends('layout.app')

@section('isi')
    <section class="panel">
        <div class="panel-header">
            <div>
                <h2 class="h5 mb-1 section-title">Edit Data Tamu</h2>
                <p class="text-muted mb-0">Perbarui data yang sama dengan formulir pengunjung.</p>
            </div>
            <a class="btn btn-light btn-sm" href="{{ route('tamu.index') }}">Kembali</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">Mohon periksa kembali data yang Anda masukkan.</div>
        @endif

        <form action="{{ route('tamu.update', $pengunjung) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama lengkap</label>
                <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    value="{{ old('nama', $pengunjung->nama) }}" maxlength="100" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                    rows="3" maxlength="1000" required>{{ old('alamat', $pengunjung->alamat) }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="keperluan" class="form-label">Keperluan</label>
                <input class="form-control @error('keperluan') is-invalid @enderror" id="keperluan"
                    name="keperluan" value="{{ old('keperluan', $pengunjung->keperluan) }}" maxlength="255" required>
                @error('keperluan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="pihak_yang_dituju" class="form-label">Pihak yang dituju</label>
                <input class="form-control @error('pihak_yang_dituju') is-invalid @enderror" id="pihak_yang_dituju"
                    name="pihak_yang_dituju" value="{{ old('pihak_yang_dituju', $pengunjung->pihak_yang_dituju) }}"
                    maxlength="255" required>
                @error('pihak_yang_dituju')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Simpan perubahan</button>
        </form>
    </section>
@endsection
