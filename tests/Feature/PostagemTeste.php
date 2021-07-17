<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostagemTeste extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function teste_admin_postagens_index(){
        //Testa se a página de postagens está acessivel e se possui a informação 'postagens'
        $this->get('/admin/postagens')->assertStatus(200);
        $this->get('/admin/postagens')->assertViewHas('postagens');
    }

    public function teste_admin_postagens_create(){
        //Testa se a página de postagens está acessivel e se possui a informação 'postagens'
    }
}
