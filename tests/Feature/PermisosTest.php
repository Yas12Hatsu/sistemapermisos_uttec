<?php

namespace Tests\Feature;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PermisosTest extends TestCase
{
    public function testRegistroPermiso()
    {
        Artisan::call('migrate');

        $response = $this->get(route('nuevo.permiso'));
        $response->assertStatus(302);

        $registromal = $this->post(route('permiso.guardar'), [
            "fecha" => "abc",
            "estado" => 123,
            "motivo" => 123,
            "id_profesor" => "abc"
        ]);
        
        $registromal->assertStatus(302);

        $registrobien = $this->post(route('permiso.guardar'), [
            "fecha" => "2024-04-05",
            "estado" => "aprobado",
            "motivo" => "Ejemplo de motivo",
            "observaciones" => "Ninguna",
            "id_profesor" => 123
        ]);
        
        $registrobien->assertStatus(302);
    }
}
