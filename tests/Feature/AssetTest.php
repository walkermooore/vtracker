<?php

use App\Models\User;
use App\Models\Asset;
use Livewire\Livewire;
use App\Livewire\AssetManager;

it('displays the list of assets to authenticated users', function () {
    // Cria um usuário para poder logar
    $user = User::factory()->create();

    // Cria um Ativo real no banco de dados de teste
    $asset = Asset::factory()->create([
        'name' => 'Firewall Corporativo',
        'url_or_ip' => '192.168.1.1'
    ]);
    // Simula o usuário logando e acessando a rota de ativos
    $response = $this->actingAs($user)
        ->get('/assets');

    // 1. Verifica se a página carregou com sucesso
    $response->assertStatus(200);

    // 2. Verifica se o nome do ativo que criamos está visível na página
    $response->assertSee('Firewall Corporativo');

    // 3. Verifica se o IP aparece
    $response->assertSee('192.168.1.1');
});
it('redirects unauthenticated users to the login page', function () {
    // Tenta acessar sem logar
    $response = $this->get('/assets');

    // Espera ser mandado para a tela de login
    $response->assertRedirect('/login');
});
it('can create a new asset through the livewire component', function () {
    // ARRANGE
    // Cria um usuário para autenticação
    $user = User::factory()->create();

    // ACT & ASSERT
    // Inicia o teste do componente Livewire
    Livewire::actingAs($user)
        ->test(AssetManager::class)
        // Simula o preenchimento das propriedades (ajuste os nomes se forem diferentes no seu componente)
        ->set('name', 'Servidor de Produção 01')
        ->set('url_or_ip', '10.0.0.1')
        ->set('description', 'Servidor de alta criticidade')
        // Simula a chamada do método que salva os dados (ex: save, store, create)
        ->call('save')
        // Verifica se houve um redirecionamento ou se os campos foram limpos
        ->assertHasNoErrors();

    // Confere se o registro foi persistido no banco de dados
    $this->assertDatabaseHas('assets', [
        'name' => 'Servidor de Produção 01',
        'url_or_ip' => '10.0.0.1'
    ]);

});
it('fails validation if name is missing', function () {
    // ARRANGE
    $user = User::factory()->create();

    // ACT & ASSERT
    Livewire::actingAs($user)
        ->test(AssetManager::class)
        ->set('name', '') // Nome vazio
        ->call('save')
        ->assertHasErrors(['name' => 'required']); // Confirma se o sistema barrou
});
