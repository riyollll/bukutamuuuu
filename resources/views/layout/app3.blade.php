<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="adminHMD professional admin dashboard template">
    <title>Datadiri</title>



    <link rel="stylesheet" href="{{ asset('template/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('index') }}">Sikelas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('jurusan.index') }}">data jurusan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kelas.index') }}">Data kelas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('guru.index') }}">Data Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('walikelas.index') }}">Data Walikelas</a>
                    </li>
                </ul>
                <button class="icon-button theme-toggle ms-3" type="button" data-theme-toggle
                    aria-label="Switch color theme" title="Switch color theme">
                    <i class="bi bi-moon-stars" data-theme-icon aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1">
        @yield('isi3')
    </main>

    <footer class="bg-dark text-white py-3 mt-auto px-4">
        <div class="d-flex justify-content-between align-items-center">
            <p class="mb-0">Web Personal &copy; 2026.</p>
            <p class="mb-0">Dibuat oleh Firiyal Anggara Putra. Semua hak dilindungi.</p>
        </div>
    </footer>

    <script src="{{ asset('template/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
