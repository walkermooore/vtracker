<div class="p-6 bg-slate-900 min-h-screen text-slate-100">
    <div class="max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold mb-8 text-emerald-400 font-mono uppercase tracking-widest">Audit Trail Timeline</h2>

        <div class="relative border-l border-slate-700 ml-4 space-y-10">
            @foreach($logs as $log)
                <div class="relative pl-10">
                    <!-- Dot -->
                    <div class="absolute -left-2 mt-1.5 w-4 h-4 rounded-full border-4 border-slate-900 @if($log->action === 'created') bg-emerald-500 @elseif($log->action === 'updated') bg-blue-500 @else bg-red-500 @endif"></div>
                    
                    <div class="bg-slate-800 border border-slate-700 rounded-lg p-5 shadow-xl">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-xs font-mono uppercase tracking-tighter text-slate-400">
                                {{ $log->created_at->format('Y-m-d H:i:s') }}
                            </span>
                            <span class="px-2 py-1 text-[10px] font-mono font-bold rounded uppercase @if($log->action === 'created') bg-emerald-900/50 text-emerald-400 border border-emerald-500/30 @elseif($log->action === 'updated') bg-blue-900/50 text-blue-400 border border-blue-500/30 @else bg-red-900/50 text-red-400 border border-red-500/30 @endif">
                                {{ $log->action }}
                            </span>
                        </div>

                        <div class="mb-4">
                            <span class="text-sm font-semibold text-white">Operator:</span>
                            <span class="text-sm text-emerald-400 font-mono">{{ $log->user->name ?? 'System/Anonymous' }}</span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @if($log->old_values)
                                <div>
                                    <label class="block text-[10px] font-mono text-slate-500 uppercase mb-2">Pre-State</label>
                                    <pre class="bg-slate-900 p-3 rounded text-[11px] font-mono text-red-400 overflow-x-auto border border-slate-700">{{ json_encode($log->old_values, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                                </div>
                            @endif
                            
                            @if($log->new_values)
                                <div>
                                    <label class="block text-[10px] font-mono text-slate-500 uppercase mb-2">Post-State</label>
                                    <pre class="bg-slate-900 p-3 rounded text-[11px] font-mono text-emerald-400 overflow-x-auto border border-slate-700">{{ json_encode($log->new_values, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $logs->links() }}
        </div>
    </div>
</div>
