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

        <a class="btn btn-light btn-sm" href="{{ route('pengunjung.form') }}">
            <i class="bi bi-plus" aria-hidden="true"></i> Tambah
        </a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle mb-0" id="guestsTable" data-searchable-table>
            <thead>
                <tr>
                    <th scope="col">Nama lengkap</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Keperluan</th>
                    <th scope="col">Pihak yang dituju</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="fw-semibold">Ahmad Fauzi</td>
                    <td>Jl. Merdeka No. 12, Blitar</td>
                    <td>Kunjungan kerja</td>
                    <td>Kepala Bagian Umum</td>
                </tr>
                <tr>
                    <td class="fw-semibold">Siti Rahmawati</td>
                    <td>Jl. Panglima Sudirman No. 8, Wlingi</td>
                    <td>Konsultasi layanan</td>
                    <td>Ibu Rina</td>
                </tr>
                <tr>
                    <td class="fw-semibold">Budi Santoso</td>
                    <td>Jl. Diponegoro No. 21, Blitar</td>
                    <td>Pengajuan surat</td>
                    <td>Bapak Hasan</td>
                </tr>
                <tr>
                    <td class="fw-semibold">Dewi Anggraini</td>
                    <td>Jl. Raya Wlingi No. 15, Wlingi</td>
                    <td>Keperluan administrasi</td>
                    <td>Ibu Rina</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

@endsection
