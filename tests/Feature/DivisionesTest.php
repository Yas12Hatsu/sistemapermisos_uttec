<?php

namespace Tests\Feature;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DivisionesTest extends TestCase
{
    public function testRegistroDivision()
    {
        Artisan::call('migrate');
    
        $response = $this->get(route('nueva.division'));
        $response->assertStatus(302);
    
        $registromal = $this->post(route('division.guardar'), [
            "codigo" => "A-z123",
            "nombre" => "numeric123"
        ]);
        
        $registromal->assertStatus(302);
    
        $registrobien = $this->post(route('division.guardar'), [
            "codigo" => "ABC123",
            "nombre" => "Ejemplo de nombre",
        ]);
        
        $registrobien->assertStatus(302);
    }
    
}
    
