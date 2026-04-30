<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel de Controle de Segurança') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Cards de Estatísticas -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="bg-white p-6 rounded-lg shadow border-l-4 border-blue-500">
                    <p class="text-sm text-gray-500 uppercase font-bold">Total de Ativos</p>
                    <p class="text-2xl font-black text-gray-800">{{ $stats['total_assets'] }}</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow border-l-4 border-indigo-500">
                    <p class="text-sm text-gray-500 uppercase font-bold">Vulnerabilidades</p>
                    <p class="text-2xl font-black text-gray-800">{{ $stats['total_vulns'] }}</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow border-l-4 border-red-500">
                    <p class="text-sm text-gray-500 uppercase font-bold">Críticas Ativas</p>
                    <p class="text-2xl font-black text-red-600">{{ $stats['critical_vulns'] }}</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow border-l-4 border-green-500">
                    <p class="text-sm text-gray-500 uppercase font-bold">Resolvidas</p>
                    <p class="text-2xl font-black text-green-600">{{ $stats['resolved_vulns'] }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Alertas de Riscos Críticos -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="font-bold text-lg mb-4 text-red-700">Atenção Crítica Necessária</h3>
                    <div class="space-y-3">
                        @forelse($pending_critical as $vuln)
                            <div class="flex justify-between items-center p-3 bg-red-50 rounded border border-red-100">
                                <div>
                                    <p class="font-bold text-red-900">{{ $vuln->title }}</p>
                                    <p class="text-xs text-red-700">Ativo: {{ $vuln->asset->name }}</p>
                                </div>
                                <a href="{{ route('vulnerabilities.show', $vuln->id) }}" class="text-xs bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700">Ver Falha</a>
                            </div>
                        @empty
                            <p class="text-gray-500 text-sm">Nenhum risco crítico pendente no momento.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Últimos Ativos Cadastrados -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="font-bold text-lg mb-4 text-gray-700">Ativos Adicionados Recentemente</h3>
                    <ul class="divide-y divide-gray-100">
                        @foreach($recent_assets as $asset)
                            <li class="py-3 flex justify-between">
                                <span class="text-sm font-medium text-gray-900">{{ $asset->name }}</span>
                                <span class="text-xs text-gray-500">{{ $asset->created_at->diffForHumans() }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
