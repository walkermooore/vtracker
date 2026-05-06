<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Vulnerability;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $severityCounts = \App\Models\Vulnerability::select('severity', \DB::raw('count(*) as total'))
            ->groupBy('severity')
            ->pluck('total', 'severity')
            ->all();

        $chartData = [
            'Low'      => $severityCounts['low'] ?? 0,
            'Medium'   => $severityCounts['medium'] ?? 0,
            'High'     => $severityCounts['high'] ?? 0,
            'Critical' => $severityCounts['critical'] ?? 0,
        ];

        $stats = [
            'total_assets'   => \App\Models\Asset::count(),
            'total_vulns'    => \App\Models\Vulnerability::count(),
            'critical_vulns' => $chartData['Critical'],
            'resolved_vulns' => \App\Models\Vulnerability::where('status', 'resolved')->count(),
        ];

        // BUSCA OS TOP 5 ATIVOS EM RISCO
        $topAssets = \App\Models\Asset::withCount(['vulnerabilities as critical_count' => function($query) {
            $query->where('severity', 'critical');
        }])
            ->orderBy('critical_count', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact('stats', 'chartData', 'topAssets'));
    }
}
