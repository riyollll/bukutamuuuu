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
            'pengunjungTerbaru' => Pengunjung::latest()->limit(4)->get(),
        ]);
    }

    public function index(): View
    {
        return view('admin.bukutamu', [
            'pengunjungs' => Pengunjung::latest()->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'alamat' => ['required', 'string', 'max:1000'],
            'keperluan' => ['required', 'string', 'max:255'],
            'pihak_yang_dituju' => ['required', 'string', 'max:255'],
        ]);

        Pengunjung::create($validated);

        return redirect()
            ->route('pengunjung.form')
            ->with('success', 'Data tamu berhasil disimpan.');
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
