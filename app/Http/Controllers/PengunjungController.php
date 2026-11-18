<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    public function dashboard(): View
    {
        return view('admin.home', [
            'totalPengunjung' => Pengunjung::count(),
            'pengunjungHariIni' => Pengunjung::whereDate('created_at', today())->count(),
            'tamuMenunggu' => Pengunjung::where('status', 'menunggu')->count(),
            'tamuSudahMasuk' => Pengunjung::where('status', 'sudah_masuk')->count(),
            'pengunjungTerbaru' => Pengunjung::latest()->limit(4)->get(),
        ]);
    }

    public function index(): View
    {
        return view('admin.bukutamu', [
            'pengunjungs' => Pengunjung::latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.pengunjung-create');
    }

    public function store(Request $request): RedirectResponse
    {
        return $this->storeGuest($request, 'pengunjung.form');
    }

    public function storeAdmin(Request $request): RedirectResponse
    {
        return $this->storeGuest($request, 'tamu.index');
    }

    private function storeGuest(Request $request, string $redirectRoute): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'alamat' => ['required', 'string', 'max:1000'],
            'keperluan' => ['required', 'string', 'max:255'],
            'pihak_yang_dituju' => ['required', 'string', 'max:255'],
        ]);

        Pengunjung::create($validated);

        return redirect()
            ->route($redirectRoute)
            ->with('success', 'Data tamu berhasil disimpan.');
    }

    public function checkIn(Pengunjung $tamu): RedirectResponse
    {
        $updated = $tamu->newQuery()
            ->whereKey($tamu->getKey())
            ->where('status', 'menunggu')
            ->update(['status' => 'sudah_masuk']);

        return redirect()
            ->route('tamu.index')
            ->with(
                'success',
                $updated === 1
                    ? 'Status tamu berhasil diubah menjadi sudah masuk.'
                    : 'Tamu sudah masuk sebelumnya.',
            );
    }

    public function edit(Pengunjung $tamu): View
    {
        return view('admin.pengunjung-edit', ['pengunjung' => $tamu]);
    }

    public function update(Request $request, Pengunjung $tamu): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'alamat' => ['required', 'string', 'max:1000'],
            'keperluan' => ['required', 'string', 'max:255'],
            'pihak_yang_dituju' => ['required', 'string', 'max:255'],
        ]);

        $tamu->update($validated);

        return redirect()
            ->route('tamu.index')
            ->with('success', 'Data tamu berhasil diperbarui.');
    }

    public function destroy(Pengunjung $tamu): RedirectResponse
    {
        $tamu->delete();

        return redirect()
            ->route('tamu.index')
            ->with('success', 'Data tamu berhasil dihapus.');
    }
}
