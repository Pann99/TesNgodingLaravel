<x-guest-layout>
<div class="min-h-screen flex bg-gradient-to-br from-blue-400 via-blue-500 to-blue-700">

    <div class="w-full bg-white flex" style="min-height: 100vh;">

        <!-- LEFT PANEL -->
        <div class="hidden lg:flex lg:w-1/2 bg-blue-600 flex-col p-10 relative overflow-hidden">

            <!-- Logo -->
            <div class="flex items-center gap-2 mb-auto">
                <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 11c0-3.866 3.134-7 7-7m-7 7c0 3.866-3.134 7-7 7m7-7v10m0-10V4"/>
                    </svg>
                </div>
                <span class="text-white font-bold text-lg">TaskApp</span>
            </div>

            <!-- Illustration -->
            <div class="flex-1 flex flex-col items-center justify-center text-center">
                <svg class="w-56 mb-8" fill="none" viewBox="0 0 200 200">
                    <circle cx="100" cy="100" r="70" fill="#3B82F6" opacity="0.3"/>
                    <rect x="65" y="70" width="70" height="50" rx="10" fill="white"/>
                    <path d="M80 70V55a20 20 0 0140 0v15" stroke="white" stroke-width="8"/>
                    <circle cx="100" cy="95" r="6" fill="#2563EB"/>
                </svg>

                <h2 class="text-white text-2xl font-bold mb-2">
                    Reset Password
                </h2>

                <p class="text-blue-200 text-sm leading-relaxed">
                    Masukkan email akun Anda untuk menerima<br>
                    link reset password.
                </p>
            </div>
        </div>

        <!-- RIGHT PANEL -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-10">
            <div class="w-full max-w-sm">

                <h2 class="text-3xl font-bold text-blue-600 mb-1">
                    Forgot Password
                </h2>

                <p class="text-gray-400 text-sm mb-6">
                    Ingat password Anda?
                    <a href="{{ route('login') }}"
                        class="text-blue-500 font-semibold hover:underline">
                        Kembali ke Login
                    </a>
                </p>

                <div class="mb-6 text-sm text-gray-500 leading-relaxed">
                    Masukkan alamat email yang terdaftar. Kami akan
                    mengirimkan link untuk membuat password baru.
                </div>

                <!-- Success Message -->
                @if (session('status'))
                    <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                    @csrf

                    <!-- Email -->
                    <div class="relative">
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            placeholder="Email"
                            class="w-full px-4 py-3 pr-10 border-b @error('email') border-red-400 @else border-gray-200 @enderror text-gray-700 text-sm focus:outline-none focus:border-blue-500 transition bg-transparent">

                        <svg class="absolute right-2 top-3 w-5 h-5 text-gray-300"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M16 12l-4 4-4-4m8-4l-4 4-4-4"/>
                        </svg>

                        @error('email')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Submit -->
                    <button
                        type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition">
                        Kirim Link Reset Password
                    </button>

                    <!-- Back -->
                    <div class="text-center">
                        <a href="{{ route('login') }}"
                            class="text-sm text-gray-500 hover:text-blue-600 hover:underline">
                            ← Kembali ke Login
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
</x-guest-layout>