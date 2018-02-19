<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PublicacionesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */
    function prueba_publicaciones()
    {
    	$this->get('/publicaciones')
        ->assertStatus(200)
        ->assertSee('Publicidad');
    }
}
