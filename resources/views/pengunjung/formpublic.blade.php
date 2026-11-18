<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Formulir data diri untuk tamu">
    <title>Form Data Diri Tamu</title>
    <link rel="stylesheet" href="{{ asset('template/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <nav class="navbar bg-white border-bottom shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="">
                    <span class="text-primary"><i class="bi bi-journal-text" aria-hidden="true"></i></span>
                    <span>Buku Tamu</span>
                </a>
                <span class="text-body-secondary small">Formulir pengunjung</span>
            </div>
        </nav>
    </header>

    <main class="container flex-grow-1 py-4 py-lg-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 col-xl-7">
                <section class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <div class="mb-4">
                            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                                <span class="badge rounded-pill bg-primary-subtle text-primary-emphasis">
                                    <i class="bi bi-person-vcard me-1" aria-hidden="true"></i>
                                    Data pengunjung
                                </span>
                                <span class="badge rounded-pill bg-primary-subtle text-primary-emphasis">
                                    <i class="bi bi-clock me-1" aria-hidden="true"></i>
                                    <time id="current-time" datetime="{{ now()->setTimezone('Asia/Jakarta')->toIso8601String() }}">{{ now()->setTimezone('Asia/Jakarta')->locale('id')->translatedFormat('l, d F Y H:i:s') }} WIB</time>
                                </span>
                            </div>
                            <h1 class="h3 fw-bold mb-2">Form Data Diri Tamu</h1>
                            <p class="text-body-secondary mb-0">
                                Silakan lengkapi data diri berikut untuk mengisi buku tamu.
                                Data bertanda <span class="text-danger">*</span> wajib diisi.
                            </p>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success d-flex align-items-center gap-2" role="status">
                                <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                Mohon periksa kembali data yang Anda masukkan.
                            </div>
                        @endif

                        <form action="" method="POST">
                            @csrf

                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="nama" class="form-label fw-semibold">
                                        Nama lengkap <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        class="form-control @error('nama') is-invalid @enderror"
                                        id="nama"
                                        name="nama"
                                        type="text"
                                        value="{{ old('nama') }}"
                                        maxlength="100"
                                        autocomplete="name"
                                        required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>







                                <div class="col-12">
                                    <label for="alamat" class="form-label fw-semibold">
                                        Alamat <span class="text-danger">*</span>
                                    </label>
                                    <textarea
                                        class="form-control @error('alamat') is-invalid @enderror"
                                        id="alamat"
                                        name="alamat"
                                        rows="3"
                                        autocomplete="street-address"
                                        required>{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="keperluan" class="form-label fw-semibold">
                                        Keperluan <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        class="form-control @error('keperluan') is-invalid @enderror"
                                        id="keperluan"
                                        name="keperluan"
                                        type="text"
                                        value="{{ old('keperluan') }}"
                                        maxlength="255"
                                        required>
                                    @error('keperluan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="pihak_yang_dituju" class="form-label fw-semibold">
                                        Pihak yang dituju <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        class="form-control @error('pihak_yang_dituju') is-invalid @enderror"
                                        id="pihak_yang_dituju"
                                        name="pihak_yang_dituju"
                                        type="text"
                                        value="{{ old('pihak_yang_dituju') }}"
                                        maxlength="255"
                                        required>
                                    @error('pihak_yang_dituju')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>

                            <div class="d-flex flex-column flex-sm-row justify-content-end gap-2 mt-4">
                                <button class="btn btn-primary px-4" type="submit">
                                    <i class="bi bi-send me-1" aria-hidden="true"></i>
                                    Kirim data
                                </button>
                            </div>
                        </form>
                    </div>
                </section>

                <p class="small text-body-secondary text-center mt-3 mb-0">
                    Data digunakan untuk keperluan pencatatan buku tamu.
                </p>
            </div>
        </div>
    </main>

    <footer class="border-top bg-white py-3 mt-auto">
        <div class="container text-center small text-body-secondary">
            Buku Tamu Riyal
        </div>
    </footer>

    <script src="{{ asset('template/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        const currentTime = document.getElementById('current-time');
        const jakartaTimeFormatter = new Intl.DateTimeFormat('id-ID', {
            weekday: 'long',
            day: 'numeric',
            month: 'long',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            timeZone: 'Asia/Jakarta',
        });

        const updateCurrentTime = () => {
            const now = new Date();
            currentTime.dateTime = now.toISOString();
            currentTime.textContent = `${jakartaTimeFormatter.format(now)} WIB`;
        };

        updateCurrentTime();
        window.setInterval(updateCurrentTime, 1000);
    </script>
</body>

</html>
