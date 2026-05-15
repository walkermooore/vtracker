<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Total Assets Card -->
    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xs font-mono uppercase tracking-widest text-gray-400">Inventory Status</h3>
            <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
            </svg>
        </div>
        <div class="flex items-baseline">
            <span class="text-4xl font-mono font-bold text-gray-900">{{ $totalAssets }}</span>
            <span class="ml-2 text-xs font-mono text-emerald-500">TOTAL ASSETS</span>
        </div>
    </div>

    <!-- Critical Vulnerabilities Card -->
    <div class="bg-white border border-red-200 rounded-lg p-6 shadow-sm relative overflow-hidden">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xs font-mono uppercase tracking-widest text-gray-400">Risk Exposure</h3>
            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
        </div>
        <div class="flex items-baseline">
            <span class="text-4xl font-mono font-bold text-red-600">{{ $openCriticalVulns }}</span>
            <span class="ml-2 text-xs font-mono text-red-400">CRITICAL VULNS</span>
        </div>
        <div class="absolute bottom-0 right-0 w-16 h-16 bg-red-500/5 -mb-4 -mr-4 rounded-full"></div>
    </div>

    <!-- Compromised Assets Card -->
    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xs font-mono uppercase tracking-widest text-gray-400">Impact Assessment</h3>
            <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
            </svg>
        </div>
        <div class="flex items-baseline">
            <span class="text-4xl font-mono font-bold text-gray-900">{{ $compromisedAssets }}</span>
            <span class="ml-2 text-xs font-mono text-orange-500">ASSETS AT RISK</span>
        </div>
    </div>
</div>
