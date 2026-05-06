<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard de Segurança') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-blue-500">
                    <div class="text-sm text-gray-500 uppercase font-bold">Total de Ativos</div>
                    <div class="text-3xl font-bold">{{ $stats['total_assets'] ?? 1 }}</div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-indigo-500">
                    <div class="text-sm text-gray-500 uppercase font-bold">Vulnerabilidades</div>
                    <div class="text-3xl font-bold">{{ $stats['total_vulns'] ?? 4 }}</div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-red-600">
                    <div class="text-sm text-gray-500 uppercase font-bold text-red-600">Críticas</div>
                    <div class="text-3xl font-bold text-red-600">{{ $stats['critical_vulns'] ?? 2 }}</div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-green-500">
                    <div class="text-sm text-gray-500 uppercase font-bold text-green-600">Resolvidas</div>
                    <div class="text-3xl font-bold text-green-600">{{ $stats['resolved_vulns'] ?? 1 }}</div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="font-bold text-lg mb-6 text-gray-700 border-b pb-2">Distribuição de Riscos por Severidade</h3>
                    <div id="severityChart" style="min-height: 350px;"></div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="font-bold text-lg mb-6 text-gray-700 border-b pb-2">Ativos com Maior Exposição (Críticas)</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                            <tr>
                                <th class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ativo</th>
                                <th class="px-4 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Qtd. Críticas</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @isset($topAssets)
                                @forelse($topAssets as $asset)
                                    <tr>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm">
                                            <div class="font-bold text-gray-900">{{ $asset->name }}</div>
                                            <div class="text-gray-500 text-xs">{{ $asset->url_or_ip }}</div>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-center">
                                                <span class="px-3 py-1 text-xs font-bold rounded-full bg-red-100 text-red-800">
                                                    {{ $asset->critical_count }}
                                                </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="px-4 py-4 text-center text-gray-500 text-sm">Nenhum ativo com risco crítico.</td>
                                    </tr>
                                @endforelse
                            @else
                                <tr>
                                    <td colspan="2" class="px-4 py-4 text-center text-gray-500 text-sm">Aguardando dados do Controller...</td>
                                </tr>
                            @endisset
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('livewire:navigated', function () {
                // Verifica se o gráfico já existe para não duplicar na navegação SPA
                if (window.severityChartInstance) {
                    window.severityChartInstance.destroy();
                }

                const options = {
                    series: [{
                        name: 'Vulnerabilidades',
                        data: [
                            {{ $chartData['Low'] ?? 0 }},
                            {{ $chartData['Medium'] ?? 0 }},
                            {{ $chartData['High'] ?? 0 }},
                            {{ $chartData['Critical'] ?? 2 }}
                        ]
                    }],
                    chart: {
                        height: 350,
                        type: 'bar',
                        toolbar: { show: false }
                    },
                    colors: ['#10b981', '#f59e0b', '#ef4444', '#7f1d1d'],
                    plotOptions: {
                        bar: {
                            columnWidth: '45%',
                            distributed: true,
                            borderRadius: 6,
                        }
                    },
                    dataLabels: { enabled: false },
                    legend: { show: false },
                    xaxis: {
                        categories: ['Baixa', 'Média', 'Alta', 'Crítica'],
                        labels: { style: { fontWeight: 'bold' } }
                    },
                    yaxis: {
                        title: { text: 'Quantidade de Falhas' },
                        labels: { formatter: function (val) { return val.toFixed(0); } }
                    }
                };

                window.severityChartInstance = new ApexCharts(document.querySelector("#severityChart"), options);
                window.severityChartInstance.render();
            });
        </script>
    @endpush
</x-app-layout>
