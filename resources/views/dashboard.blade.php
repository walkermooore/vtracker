<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard de Segurança') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Grid de Cards de Estatísticas -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-blue-500">
                    <div class="text-sm text-gray-500 uppercase font-bold">Total de Ativos</div>
                    <div class="text-3xl font-bold">{{ $stats['total_assets'] }}</div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-indigo-500">
                    <div class="text-sm text-gray-500 uppercase font-bold">Vulnerabilidades</div>
                    <div class="text-3xl font-bold">{{ $stats['total_vulns'] }}</div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-red-600">
                    <div class="text-sm text-gray-500 uppercase font-bold">Críticas</div>
                    <div class="text-3xl font-bold text-red-600">{{ $stats['critical_vulns'] }}</div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-green-500">
                    <div class="text-sm text-gray-500 uppercase font-bold">Resolvidas</div>
                    <div class="text-3xl font-bold text-green-600">{{ $stats['resolved_vulns'] }}</div>
                </div>
            </div>

            <!-- Seção do Gráfico -->
            <div class="grid grid-cols-1 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="font-bold text-lg mb-6 text-gray-700 border-b pb-2">Distribuição de Riscos por Severidade</h3>

                    <div class="relative" style="height: 350px;">
                        <canvas id="severityChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Script do Gráfico -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('severityChart').getContext('2d');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Baixa', 'Média', 'Alta', 'Crítica'],
                    datasets: [{
                        label: 'Quantidade de Falhas',
                        data: [
                            {{ $chartData['Low'] }},
                            {{ $chartData['Medium'] }},
                            {{ $chartData['High'] }},
                            {{ $chartData['Critical'] }}
                        ],
                        backgroundColor: [
                            '#10b981', // Emerald 500 (Low)
                            '#f59e0b', // Amber 500 (Medium)
                            '#ef4444', // Red 500 (High)
                            '#7f1d1d'  // Red 900 (Critical)
                        ],
                        borderRadius: 6,
                        maxBarThickness: 100
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false // Esconde a legenda pois os eixos já explicam
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                color: '#6b7280'
                            },
                            grid: {
                                display: true,
                                drawBorder: false,
                                color: '#f3f4f6'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: '#374151',
                                font: {
                                    weight: 'bold'
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
