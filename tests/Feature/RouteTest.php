<?php

namespace Tests\Feature;

use Tests\TestCase;

class RouteTest extends TestCase
{
    public function test_dashboard_route_renders_the_dashboard(): void
    {
        $response = $this->get('/dashboard');

        $response->assertOk();
        $response->assertSee('Kunjungan Harian');
        $response->assertSeeInOrder([
            'Nama lengkap',
            'Alamat',
            'Keperluan',
            'Pihak yang dituju',
        ]);
        $response->assertSeeInOrder([
            'Ahmad Fauzi',
            'Siti Rahmawati',
            'Budi Santoso',
            'Dewi Anggraini',
        ]);
        $response->assertSee('Jl. Merdeka No. 12, Blitar');
        $response->assertDontSee('Instansi');
        $response->assertDontSee('Tanggal');
    }

    public function test_guest_list_route_renders_the_guest_list(): void
    {
        $response = $this->get('/tamu');

        $response->assertOk();
        $response->assertSee('Data Buku Tamu');
        $response->assertSeeInOrder([
            'Nama lengkap',
            'Alamat',
            'Keperluan',
            'Pihak yang dituju',
        ]);
        $response->assertSeeInOrder([
            'Ahmad Fauzi',
            'Siti Rahmawati',
            'Budi Santoso',
            'Dewi Anggraini',
        ]);
        $response->assertSee('Jl. Merdeka No. 12, Blitar');
        $response->assertDontSee('No. HP');
        $response->assertDontSee('Instansi');
    }

    public function test_guest_form_has_separate_inputs_for_all_four_fields(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('name="nama"', false);
        $response->assertSee('name="alamat"', false);
        $response->assertSee('name="keperluan"', false);
        $response->assertSee('name="pihak_yang_dituju"', false);
        $response->assertSee('Waktu sekarang:');
        $response->assertSee('id="current-time"', false);
    }

    public function test_unused_guest_creation_route_is_not_registered(): void
    {
        $this->get('/tamu/create')->assertNotFound();
    }
}
