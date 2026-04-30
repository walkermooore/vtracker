<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <!-- Feedback Visual: Uso a sessão do Laravel para exibir mensagens flash temporárias após ações de sucesso. -->
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif

        <!-- Layout Responsivo: Defini um grid de 1 coluna em mobile, mudando para 3 colunas em telas médias/grandes. -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- COLUNA ESQUERDA: Formulário de Cadastro (Ocupa 1/3 do espaço no desktop) -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4 border-b pb-2">Cadastrar Novo Ativo</h3>

                    <!-- Interceptação do Form: O wire:submit chama o método save() no backend PHP sem dar reload na página, garantindo fluidez de SPA. -->
                    <form wire:submit="save" class="space-y-4">

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nome do Sistema/Projeto</label>

                            <!-- Two-way Data Binding: O wire:model sincroniza este input com a propriedade $name do componente Livewire em tempo real. -->
                            <input type="text" id="name" wire:model="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">

                            <!-- Tratamento de Erros: Exibe os erros de validação disparados pelo backend logo abaixo do campo. -->
                            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="url_or_ip" class="block text-sm font-medium text-gray-700">URL ou IP (Opcional)</label>
                            <input type="text" id="url_or_ip" wire:model="url_or_ip" placeholder="ex: 192.168.0.1 ou api.exemplo.com" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Descrição Técnica</label>
                            <textarea id="description" wire:model="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                        </div>

                        <button type="submit" class="w-full border-2 border-indigo-600 text-indigo-600 hover:bg-indigo-600 hover:text-white font-bold py-2 px-4 rounded transition-colors duration-200">
                            Salvar Ativo
                        </button>
                    </form>
                </div>
            </div>

            <!-- COLUNA DIREITA: Lista de Ativos (Ocupa os 2/3 restantes do grid no desktop) -->
            <div class="md:col-span-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4 border-b pb-2">Ativos Monitorados</h3>

                    <!-- Tabela com scroll horizontal para evitar quebra de layout em dispositivos móveis. -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ativo</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">URL / IP</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">

                            <!-- Renderização Condicional: Utilizo o forelse do Blade pois ele itera sobre os dados e já trata o estado "vazio" da tabela de forma elegante. -->
                            @forelse ($assets as $asset)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="font-medium text-gray-900">{{ $asset->name }}</div>
                                        <!-- Truncate do Tailwind para evitar que descrições longas estiquem a tabela e quebrem a UI. -->
                                        <div class="text-sm text-gray-500 truncate max-w-xs">{{ $asset->description }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <!-- Fallback visual rápido usando operador ternário curto caso a URL/IP seja null. -->
                                        {{ $asset->url_or_ip ?: 'Não informado' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button class="text-indigo-600 hover:text-indigo-900">Detalhes</button>
                                    </td>
                                </tr>
                            @empty
                                <!-- Empty State: Melhora a UX do sistema guiando o usuário sobre a próxima ação quando não há dados. -->
                                <tr>
                                    <td colspan="3" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                        Nenhum ativo cadastrado ainda. Comece pelo formulário ao lado.
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
