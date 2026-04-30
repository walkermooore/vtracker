<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h3 class="text-lg font-bold mb-6 border-b pb-2">Registro Global de Auditoria</h3>

                <div class="relative">
                    <!-- Linha vertical da Timeline -->
                    <div class="absolute border-l-2 border-gray-200 h-full left-4 sm:left-6"></div>

                    <ul class="space-y-8">
                        @foreach($logs as $log)
                            <li class="relative pl-12 sm:pl-16">
                                <!-- Ícone de Ação -->
                                <div class="absolute left-0 sm:left-2 w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center ring-4 ring-white">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                                    </svg>
                                </div>

                                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="text-sm font-bold text-gray-800">
                                                {{ $log->user->name }}
                                                <span class="font-normal text-gray-600">alterou a vulnerabilidade</span>
                                                "{{ $log->vulnerability->title }}"
                                            </p>
                                            <p class="text-xs text-gray-500 mt-1 italic">
                                                "{{ $log->comment_text }}"
                                            </p>
                                        </div>
                                        <span class="text-xs text-gray-400">{{ $log->created_at->diffForHumans() }}</span>
                                    </div>

                                    <div class="mt-2 flex space-x-4 text-xs">
                                        <span class="text-red-500 font-mono">De: {{ strtoupper($log->old_status) }}</span>
                                        <span class="text-gray-400">➔</span>
                                        <span class="text-green-600 font-mono">Para: {{ strtoupper($log->new_status) }}</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="mt-8">
                    {{ $logs->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
