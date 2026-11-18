@extends('layout.app')

@section('isi')
    <section class="panel">
        <div class="panel-header">
            <div>
                <h2 class="h5 mb-1 section-title">Tambah Pengunjung</h2>
                <p class="text-muted mb-0">Tambahkan tamu melalui panel admin. Status awal otomatis Menunggu.</p>
            </div>
            <a class="btn btn-light btn-sm" href="{{ route('tamu.index') }}">Kembali</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">Mohon periksa kembali data yang Anda masukkan.</div>
        @endif

        <form action="{{ route('admin.tamu.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama lengkap</label>
                <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    value="{{ old('nama') }}" maxlength="100" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                    rows="3" maxlength="1000" required>{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="keperluan" class="form-label">Keperluan</label>
                <input class="form-control @error('keperluan') is-invalid @enderror" id="keperluan"
                    name="keperluan" value="{{ old('keperluan') }}" maxlength="255" required>
                @error('keperluan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="pihak_yang_dituju" class="form-label">Pihak yang dituju</label>
                <input class="form-control @error('pihak_yang_dituju') is-invalid @enderror" id="pihak_yang_dituju"
                    name="pihak_yang_dituju" value="{{ old('pihak_yang_dituju') }}" maxlength="255" required>
                @error('pihak_yang_dituju')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">
                <i class="bi bi-person-plus me-1" aria-hidden="true"></i>Tambah Pengunjung
            </button>
        </form>
    </section>
@endsection
