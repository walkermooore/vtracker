<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use App\Models\Asset;

// Definimos que este componente vai usar o layout principal do sistema (com o menu superior)
#[Layout('layouts.app')]
class AssetManager extends Component
{
    // Campos do formulário com regras de validação diretas (novidade do Livewire 3)
    #[Validate('required|string|min:3')]
    public $name = '';

    #[Validate('nullable|string')]
    public $url_or_ip = '';

    #[Validate('nullable|string')]
    public $description = '';

    // Função que será chamada ao clicar em "Salvar"
    public function save()
    {
        $this->validate(); // Roda as validações acima

        Asset::create([
            'name' => $this->name,
            'url_or_ip' => $this->url_or_ip,
            'description' => $this->description,
        ]);

        $this->reset(); // Limpa os campos do formulário

        session()->flash('message', 'Ativo cadastrado com sucesso!');
    }

    // Função que manda os dados para a tela
    public function render()
    {
        return view('livewire.asset-manager', [
            // Puxa todos os ativos do banco, ordenados pelo mais recente
            'assets' => Asset::latest()->get()
        ]);
    }
}
