<x-app-layout>
    <div class="py-8 font-['Poppins'] bg-[#f5f8ff] min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold text-gray-800">Riwayat Log Pendaftaran</h1>
                <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-xl text-sm font-medium hover:bg-gray-50 transition shadow-sm">
                    Kembali ke Dashboard
                </a>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-8 space-y-6">
                <div class="border-b border-gray-100 pb-4">
                    <h2 class="text-lg font-bold text-gray-800">Ekstrakurikuler: {{ $registration->extracurricular->name ?? '-' }}</h2>
                    <p class="text-sm text-gray-500">Status Saat Ini: <span class="font-semibold text-indigo-600">{{ $registration->status }}</span></p>
                </div>

                <div class="space-y-4">
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-gray-400">Catatan Aktivitas / Log</h3>
                    
                    <div class="space-y-3">
                        @forelse($registration->logs ?? [] as $log)
                            <div class="p-4 rounded-xl bg-gray-50 border border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
                                <div>
                                    <p class="text-sm font-semibold text-gray-800">{{ $log->action }}</p>
                                    <p class="text-xs text-gray-500 mt-0.5">Admin: {{ $log->admin?->name ?? '-' }}</p>
                                </div>
                                <span class="text-xs text-gray-400 font-medium">{{ $log->created_at->format('d M Y, H:i') }}</span>
                            </div>
                        @empty
                            <p class="text-center text-gray-400 text-sm py-6">Belum ada catatan log untuk pendaftaran ini.</p>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>