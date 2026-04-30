<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h3 class="text-lg font-bold mb-6 border-b pb-2">Registro Global de Auditoria</h3>

                <!-- Removi a div da linha vertical que estava causando o problema -->
                <ul class="divide-y divide-gray-100">
                    @foreach($logs as $log)
                        <li class="py-4">
                            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 shadow-sm">
                                <div class="flex justify-between items-start">
                                    <div class="flex items-center space-x-3">
                                        <!-- Ícone pequeno e quadrado para indicar log -->
                                        <div class="flex-shrink-0 w-8 h-8 rounded bg-indigo-600 flex items-center justify-center shadow-sm">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                                            </svg>
                                        </div>

                                        <p class="text-sm font-bold text-gray-800">
                                            {{ $log->user->name }}
                                            <span class="font-normal text-gray-600">alterou a vulnerabilidade</span>
                                            <span class="text-indigo-700">"{{ $log->vulnerability->title }}"</span>
                                        </p>
                                    </div>
                                    <span class="text-xs text-gray-400 whitespace-nowrap ml-4">{{ $log->created_at->diffForHumans() }}</span>
                                </div>

                                <!-- Conteúdo alinhado -->
                                <div class="mt-3 sm:ml-11">
                                    <p class="text-xs text-gray-500 italic bg-white p-2 rounded border border-gray-100 mb-3">
                                        "{{ $log->comment_text }}"
                                    </p>

                                    <div class="flex flex-wrap items-center gap-3 text-xs font-mono">
                                        <span class="px-2 py-1 bg-red-50 text-red-700 rounded border border-red-100">DE: {{ strtoupper($log->old_status) }}</span>
                                        <svg class="w-4 h-4 text-gray-400 hidden sm:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                        <span class="px-2 py-1 bg-green-50 text-green-700 rounded border border-green-100">PARA: {{ strtoupper($log->new_status) }}</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <div class="mt-8">
                    {{ $logs->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
