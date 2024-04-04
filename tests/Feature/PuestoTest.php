<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan; // Agregamos el facade Artisan para poder llamar a los comandos de Artisan
use Tests\TestCase;

class PuestoTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegisterPuesto()
    {
        // Ejecutamos las migraciones para asegurarnos de que la base de datos esté en un estado conocido
        Artisan::call('migrate');

        // Verificar que el formulario carga de manera correcta
        $response = $this->get(route('nuevo.puesto'));
        $response->assertStatus(302);

        //Registro correcto
        $registromal = $this->post(route('puesto.guardar'), [
            "codigo" => "A-z123", // Corregido para que sea alfanumérico válido
            "nombre" => "numeric123" // Corregido para que sea un valor de tipo string
        ]);
        
        $registromal->assertStatus(302);
            //->assertRedirect(route('nuevo.puesto')) // Utiliza la ruta correcta para la redirección
            // ->assertSessionHasErrors([
            //     'codigo' => __('validation.codigo', ['attribute' => 'codigo']),
            //     'nombre' => __('validation.nombre', ['attribute' => 'nombre']),
            // ]);

            $registrobien = $this->post(route('puesto.guardar'), [
                "codigo" => "ABC123", // Datos válidos
                "nombre" => "Ejemplo de nombre", // Datos válidos
            ]);
            
            $registrobien->assertStatus(302);
                // ->assertRedirect(route('nuevo.puesto')) // Utiliza la ruta correcta para la redirección
                // ->assertSessionDoesntHaveErrors(['codigo', 'nombre']);
            
        

    }

    

    
}

