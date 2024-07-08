<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testStoreValidData()
    {
        // cliente mock
        $data = [
            'name' => 'Carla',
            'email' => 'carla@teste.com',
            'phone' => '1234567890',
            'birth_date' => '1990-01-01',
            'observations' => 'Descrições do cliente',
        ];

        // Envia a requisição POST para a rota 'clients.store'
        $response = $this->post(route('clients.store'), $data);

        // Verifica se o cliente foi criado no banco
        $this->assertDatabaseHas('clients', [
            'name' => 'Carla',
            'email' => 'carla@teste.com',
            'phone' => '1234567890',
            'birth_date' => '1990-01-01',
            'observations' => 'Descrições do cliente',
        ]);

        // Verifica se houve um redirecionamento para a rota 'newclient'
        $response->assertRedirect(route('newclient'));

        // Verifica se a sessão tem a mensagem de sucesso
        $response->assertSessionHas('success', 'Cliente registrado com sucesso!');
    }

    public function testStoreInvalidData()
    {
        // Mock faltando o campo nome
        $data = [
            'email' => 'carla@teste.com',
            'phone' => '1234567890',
            'birth_date' => '1990-01-01',
            'observations' => 'Descrições do cliente',
        ];

        // Envia a requisição POST para a rota 'clients.store'
        $response = $this->post(route('clients.store'), $data);

        // Verifica se o cliente não foi criado no banco
        $this->assertDatabaseMissing('clients', [
            'email' => 'carla@teste.com',
        ]);

        // Verifica se houve um redirecionamento de volta
        $response->assertStatus(302);

        // Verifica se a sessão tem erros (validations)
        $response->assertSessionHasErrors(['name']);
    }
}
