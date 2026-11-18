@extends('layout.app')
@section('isi')

<section class="panel">
    <div class="panel-header">
        <div>
            <h2 class="h5 mb-1 section-title">
                <i class="bi bi-people" aria-hidden="true"></i>
                <span>Data Buku Tamu</span>
            </h2>
            <p class="text-muted mb-0">
                Daftar tamu berdasarkan empat data yang diisi pada formulir.
            </p>
        </div>

        <a class="btn btn-light btn-sm" href="{{ route('tamu.create') }}">
            <i class="bi bi-plus" aria-hidden="true"></i> Tambah
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="status">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table align-middle mb-0" id="guestsTable" data-searchable-table>
            <thead>
                <tr>
                    <th scope="col">Nama lengkap</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Keperluan</th>
                    <th scope="col">Pihak yang dituju</th>
                    <th scope="col">Waktu kedatangan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengunjungs as $pengunjung)
                    <tr>
                        <td class="fw-semibold">{{ $pengunjung->nama }}</td>
                        <td>{{ $pengunjung->alamat }}</td>
                        <td>{{ $pengunjung->keperluan }}</td>
                        <td>{{ $pengunjung->pihak_yang_dituju }}</td>
                        <td>{{ $pengunjung->created_at }}</td>
                        <td>
                            @if ($pengunjung->status === 'menunggu')
                                <span class="badge text-bg-warning">Menunggu</span>
                            @else
                                <span class="badge text-bg-success">Sudah Masuk</span>
                            @endif
                        </td>
                        <td class="text-nowrap">
                            <a class="btn btn-light btn-sm"
                                href="{{ route('tamu.edit', $pengunjung) }}">
                                <i class="bi bi-pencil-square me-1" aria-hidden="true"></i>Edit
                            </a>
                            <form action="{{ route('tamu.destroy', $pengunjung) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-light btn-sm" type="submit"
                                    onclick="return confirm('Hapus data tamu ini?')">
                                    <i class="bi bi-trash me-1" aria-hidden="true"></i>Hapus
                                </button>
                            </form>
                            @if ($pengunjung->status === 'menunggu')
                                <form action="{{ route('tamu.check-in', $pengunjung) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-light btn-sm" type="submit">
                                        <i class="bi bi-person-check me-1" aria-hidden="true"></i>Tandai Masuk
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">Belum ada data tamu.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>

@endsection
