<?php

namespace App\Livewire;

use App\Models\Asset;
use App\Models\Vulnerability;
use Livewire\Component;

class SocDashboard extends Component
{
    public function render()
    {
        $totalAssets = Asset::count();
        
        $openCriticalVulns = Vulnerability::where('status', '!=', 'Mitigada')
            ->where(function ($query) {
                $query->where('cvss_score', '>=', 7.0);
            })
            ->count();

        $compromisedAssets = Asset::whereHas('vulnerabilities', function ($query) {
            $query->where('status', '!=', 'Mitigada');
        })->count();

        return view('livewire.soc-dashboard', [
            'totalAssets' => $totalAssets,
            'openCriticalVulns' => $openCriticalVulns,
            'compromisedAssets' => $compromisedAssets,
        ]);
    }
}
