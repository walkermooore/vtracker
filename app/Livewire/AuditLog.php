<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\VulnerabilityLog;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class AuditLog extends Component
{
    use WithPagination; // Uso paginação para garantir que o sistema escale mesmo com milhares de registros.

    public function render()
    {
        return view('livewire.audit-log', [
            // Recupero os logs de auditoria trazendo os relacionamentos de Usuário e Vulnerabilidade (Eager Loading).
            // Isso permite que eu veja quem alterou qual falha em uma única linha do tempo.
            'logs' => VulnerabilityLog::with(['user', 'vulnerability'])
                ->latest()
                ->paginate(15) // Limito a 15 por página para manter a UI limpa.
        ]);
    }
}
