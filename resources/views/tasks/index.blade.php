<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Tugas</h1>
            <a href="{{ route('tasks.create') }}"
                class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2.5 rounded-xl text-sm font-medium transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Tugas
            </a>
        </div>
    </x-slot>

    <!-- Alert -->
    @if(session('success'))
        <div class="mb-5 flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm">
            <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <!-- Search & Filter -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-4 mb-5">
        <form method="GET" action="{{ route('tasks.index') }}" class="flex flex-col sm:flex-row gap-3">
            <div class="relative flex-1">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari judul tugas..."
                    class="w-full pl-9 pr-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent" />
            </div>
            <select name="status"
                class="border border-gray-200 rounded-xl px-3 py-2.5 text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent">
                <option value="">Semua Status</option>
                <option value="Belum dikerjakan" {{ request('status') == 'Belum dikerjakan' ? 'selected' : '' }}>Belum dikerjakan</option>
                <option value="Sedang dikerjakan" {{ request('status') == 'Sedang dikerjakan' ? 'selected' : '' }}>Sedang dikerjakan</option>
                <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium transition">
                Cari
            </button>
            @if(request('search') || request('status'))
                <a href="{{ route('tasks.index') }}"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-600 px-5 py-2.5 rounded-xl text-sm font-medium transition text-center">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <table class="min-w-full">
            <thead>
                <tr class="border-b border-gray-100">
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">No</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Judul</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($tasks as $index => $task)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-sm text-gray-400">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">
                        <p class="text-sm font-semibold text-gray-800">{{ $task->title }}</p>
                        <p class="text-xs text-gray-400 mt-0.5 truncate max-w-xs">{{ $task->description }}</p>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        {{ \Carbon\Carbon::parse($task->task_date)->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4">
                        @php
                            $badge = match($task->status) {
                                'Selesai'           => 'bg-green-100 text-green-700',
                                'Sedang dikerjakan' => 'bg-amber-100 text-amber-700',
                                default             => 'bg-red-100 text-red-600',
                            };
                        @endphp
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium {{ $badge }}">
                            {{ $task->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('tasks.show', $task) }}"
                                class="text-blue-500 hover:text-blue-700 text-sm font-medium transition">Detail</a>
                            <a href="{{ route('tasks.edit', $task) }}"
                                class="text-amber-500 hover:text-amber-700 text-sm font-medium transition">Edit</a>
                            <button type="button"
                                onclick="openDeleteModal({{ $task->id }}, '{{ addslashes($task->title) }}')"
                                class="text-red-500 hover:text-red-700 text-sm font-medium transition">
                                Hapus
                            </button>
                            <!-- Hidden form untuk delete -->
                            <form id="delete-form-{{ $task->id }}"
                                action="{{ route('tasks.destroy', $task) }}" method="POST" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-16 text-center">
                        <div class="flex flex-col items-center gap-2">
                            <svg class="w-12 h-12 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            <p class="text-gray-400 text-sm">Belum ada tugas</p>
                            <a href="{{ route('tasks.create') }}" class="text-blue-500 text-sm hover:underline">Tambah sekarang</a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Delete Modal -->
    <div id="delete-modal" class="fixed inset-0 z-50 hidden items-center justify-center">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="closeDeleteModal()"></div>

        <!-- Modal Box -->
        <div class="relative bg-white rounded-2xl shadow-xl p-6 w-full max-w-sm mx-4 z-10">
            <!-- Icon -->
            <div class="w-14 h-14 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </div>

            <h3 class="text-lg font-bold text-gray-800 text-center mb-1">Hapus Tugas?</h3>
            <p class="text-sm text-gray-500 text-center mb-1">Kamu akan menghapus tugas:</p>
            <p id="modal-task-title" class="text-sm font-semibold text-gray-800 text-center mb-5 px-4"></p>
            <p class="text-xs text-gray-400 text-center mb-6">Tindakan ini tidak dapat dibatalkan.</p>

            <div class="flex gap-3">
                <button onclick="closeDeleteModal()"
                    class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 py-2.5 rounded-xl text-sm font-medium transition">
                    Batal
                </button>
                <button onclick="confirmDelete()"
                    class="flex-1 bg-red-500 hover:bg-red-600 text-white py-2.5 rounded-xl text-sm font-medium transition">
                    Ya, Hapus
                </button>
            </div>
        </div>
    </div>

    <script>
        let deleteTaskId = null;

        function openDeleteModal(id, title) {
            deleteTaskId = id;
            document.getElementById('modal-task-title').textContent = '"' + title + '"';
            const modal = document.getElementById('delete-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeDeleteModal() {
            deleteTaskId = null;
            const modal = document.getElementById('delete-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function confirmDelete() {
            if (deleteTaskId) {
                document.getElementById('delete-form-' + deleteTaskId).submit();
            }
        }

        // Tutup modal dengan tombol Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeDeleteModal();
        });
    </script>

</x-app-layout>