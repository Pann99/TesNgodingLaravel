<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('tasks.index') }}"
                class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-gray-100 transition text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <h1 class="text-2xl font-bold text-gray-800">Edit Tugas</h1>
        </div>
    </x-slot>

    <div class="max-w-2xl">
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
            <form method="POST" action="{{ route('tasks.update', $task) }}" class="space-y-5">
                @csrf
                @method('PATCH')

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Judul Tugas <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title" value="{{ old('title', $task->title) }}"
                        placeholder="Minimal 5 karakter"
                        class="w-full px-4 py-2.5 border @error('title') border-red-400 bg-red-50 @else border-gray-200 @enderror rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent transition" />
                    @error('title')
                        <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Deskripsi <span class="text-red-500">*</span>
                    </label>
                    <textarea name="description" rows="4"
                        placeholder="Deskripsi tugas..."
                        class="w-full px-4 py-2.5 border @error('description') border-red-400 bg-red-50 @else border-gray-200 @enderror rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent transition resize-none">{{ old('description', $task->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Tanggal <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="task_date" value="{{ old('task_date', $task->task_date) }}"
                        class="w-full px-4 py-2.5 border @error('task_date') border-red-400 bg-red-50 @else border-gray-200 @enderror rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent transition" />
                    @error('task_date')
                        <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <select name="status"
                        class="w-full px-4 py-2.5 border @error('status') border-red-400 bg-red-50 @else border-gray-200 @enderror rounded-xl text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent transition">
                        <option value="">-- Pilih Status --</option>
                        <option value="Belum dikerjakan" {{ old('status', $task->status) == 'Belum dikerjakan' ? 'selected' : '' }}>Belum dikerjakan</option>
                        <option value="Sedang dikerjakan" {{ old('status', $task->status) == 'Sedang dikerjakan' ? 'selected' : '' }}>Sedang dikerjakan</option>
                        <option value="Selesai" {{ old('status', $task->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit"
                        class="bg-amber-500 hover:bg-amber-600 text-white px-6 py-2.5 rounded-xl text-sm font-medium transition">
                        Update Tugas
                    </button>
                    <a href="{{ route('tasks.index') }}"
                        class="bg-gray-100 hover:bg-gray-200 text-gray-600 px-6 py-2.5 rounded-xl text-sm font-medium transition">
                        Batal
                    </a>
                </div>

            </form>
        </div>
    </div>

</x-app-layout>