<?php

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ProfesorTest extends TestCase
{
    public function testRegisterProfesor()
    {
        Artisan::call('migrate');
    
        $response = $this->get(route('nuevo.profesor'));
        $response->assertStatus(302);
    
        $registrobien = $this->post(route('profesor.guardar'), [
            "numero" => "123",
            "nombre" => "abc",
            "horas_asignadas" => 123,
            "dias_economicos_correspondientes" => 123,
            "id_usuario" => 123,
            "id_puesto" => 123,
            "id_division" => 123,
        ]);
        
        $registrobien->assertStatus(302);
    
        $registromal = $this->post(route('profesor.guardar'), [
            "numero" => "abc",
            "nombre" => "",
            "horas_asignadas" => "abc",
            "dias_economicos_correspondientes" => "xyz",
            "id_usuario" => "abc",
            "id_puesto" => "abc",
            "id_division" => "abc",
        ]);
        
        $registromal->assertStatus(302);
    }
    
}

