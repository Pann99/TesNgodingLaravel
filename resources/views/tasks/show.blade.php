<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('tasks.index') }}"
                class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-gray-100 transition text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <h1 class="text-2xl font-bold text-gray-800">Detail Tugas</h1>
        </div>
    </x-slot>

    <div class="max-w-2xl">
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">

            @php
                $badge = match($task->status) {
                    'Selesai'           => 'bg-green-100 text-green-700',
                    'Sedang dikerjakan' => 'bg-amber-100 text-amber-700',
                    default             => 'bg-red-100 text-red-600',
                };
            @endphp

            <div class="mb-4">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold {{ $badge }}">
                    {{ $task->status }}
                </span>
            </div>

            <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $task->title }}</h2>

            <div class="flex items-center gap-2 text-sm text-gray-400 mb-6">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                {{ \Carbon\Carbon::parse($task->task_date)->format('d F Y') }}
            </div>

            <div class="bg-gray-50 rounded-xl p-4 mb-6">
                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-2">Deskripsi</p>
                <p class="text-gray-700 text-sm leading-relaxed">{{ $task->description }}</p>
            </div>

            <div class="flex items-center gap-4 text-xs text-gray-400 mb-6 border-t border-gray-100 pt-4">
                <span>Dibuat: {{ $task->created_at->format('d M Y, H:i') }}</span>
                <span>•</span>
                <span>Diperbarui: {{ $task->updated_at->format('d M Y, H:i') }}</span>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('tasks.edit', $task) }}"
                    class="flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit
                </a>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus tugas ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Hapus
                    </button>
                </form>
                <a href="{{ route('tasks.index') }}"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-600 px-5 py-2.5 rounded-xl text-sm font-medium transition">
                    Kembali
                </a>
            </div>

        </div>
    </div>

</x-app-layout>