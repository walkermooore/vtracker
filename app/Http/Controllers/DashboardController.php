<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Vulnerability;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Contagens básicas para os cards de destaque
        $stats = [
            'total_assets' => Asset::count(),
            'total_vulns' => Vulnerability::count(),
            // Conto apenas as críticas para dar o alerta visual no dashboard
            'critical_vulns' => Vulnerability::where('severity', 'critical')->count(),
            // Calculo a taxa de resolução para mostrar eficiência do Blue Team
            'resolved_vulns' => Vulnerability::where('status', 'resolved')->count(),
        ];

        // Pego os últimos 5 ativos cadastrados para a lista rápida
        $recent_assets = Asset::latest()->take(5)->get();

        // Pego as vulnerabilidades críticas que ainda estão abertas
        $pending_critical = Vulnerability::with('asset')
            ->where('severity', 'critical')
            ->where('status', '!=', 'resolved')
            ->latest()
            ->get();

        return view('dashboard', compact('stats', 'recent_assets', 'pending_critical'));
    }
}
