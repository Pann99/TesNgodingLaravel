<x-guest-layout>
<div class="min-h-screen flex bg-gradient-to-br from-blue-400 via-blue-500 to-blue-700">

    <!-- Card -->
    <div class="w-full bg-white flex" style="min-height: 100vh; ">
        <!-- LEFT: Slider Panel -->
        <div class="hidden lg:flex lg:w-1/2 bg-blue-600 flex-col p-10 relative overflow-hidden">

            <!-- Logo -->
            <div class="flex items-center gap-2 mb-auto">
                <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                    </svg>
                </div>
                <span class="text-white font-bold text-lg">TaskApp</span>
            </div>

            <!-- Slides -->
            <div class="flex-1 flex items-center justify-center">
                <div class="relative w-full">

                    <!-- Slide 1 -->
                    <div class="slide flex flex-col items-center text-center" data-slide="0">
                        <svg viewBox="0 0 220 180" class="w-48 mb-6" xmlns="http://www.w3.org/2000/svg">
                            <!-- Background blobs -->
                            <ellipse cx="110" cy="110" rx="90" ry="55" fill="#3B82F6" opacity="0.4"/>
                            <ellipse cx="90" cy="100" rx="70" ry="40" fill="#60A5FA" opacity="0.3"/>
                            <!-- Clipboard -->
                            <rect x="60" y="20" width="100" height="130" rx="8" fill="white" opacity="0.95"/>
                            <rect x="85" y="12" width="50" height="16" rx="8" fill="#BFDBFE"/>
                            <!-- Lines -->
                            <rect x="75" y="50" width="70" height="6" rx="3" fill="#BFDBFE"/>
                            <rect x="75" y="65" width="55" height="6" rx="3" fill="#BFDBFE"/>
                            <rect x="75" y="80" width="65" height="6" rx="3" fill="#BFDBFE"/>
                            <!-- Checks -->
                            <circle cx="72" cy="100" r="8" fill="#3B82F6"/>
                            <path d="M68 100 l3 3 5-5" stroke="white" stroke-width="2" fill="none" stroke-linecap="round"/>
                            <rect x="85" y="96" width="50" height="6" rx="3" fill="#BFDBFE"/>
                            <circle cx="72" cy="118" r="8" fill="#EF4444" opacity="0.7"/>
                            <path d="M69 115 l6 6 M75 115 l-6 6" stroke="white" stroke-width="2" fill="none" stroke-linecap="round"/>
                            <rect x="85" y="114" width="40" height="6" rx="3" fill="#BFDBFE"/>
                            <!-- Pencil -->
                            <rect x="145" y="110" width="10" height="35" rx="3" fill="#FCD34D" transform="rotate(-30 145 110)"/>
                            <polygon points="145,140 152,138 148,148" fill="#F59E0B"/>
                            <!-- Dots -->
                            <circle cx="35" cy="60" r="4" fill="white" opacity="0.5"/>
                            <circle cx="185" cy="80" r="6" fill="white" opacity="0.3"/>
                            <circle cx="170" cy="40" r="3" fill="white" opacity="0.4"/>
                            <text x="155" y="48" fill="white" font-size="14" opacity="0.6">+</text>
                            <text x="30" y="110" fill="white" font-size="14" opacity="0.6">+</text>
                        </svg>
                        <h2 class="text-white text-2xl font-bold mb-2">Welcome!</h2>
                        <p class="text-blue-200 text-sm leading-relaxed">Catat semua tugasmu dan<br/>pantau progressnya dengan mudah.</p>
                    </div>

                    <!-- Slide 2 -->
                    <div class="slide hidden flex-col items-center text-center" data-slide="1">
                        <svg viewBox="0 0 220 180" class="w-48 mb-6" xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="110" cy="115" rx="85" ry="50" fill="#3B82F6" opacity="0.4"/>
                            <!-- Calendar -->
                            <rect x="45" y="30" width="110" height="110" rx="10" fill="white" opacity="0.95"/>
                            <rect x="45" y="30" width="110" height="28" rx="10" fill="#2563EB"/>
                            <rect x="45" y="48" width="110" height="10" rx="0" fill="#2563EB"/>
                            <circle cx="75" cy="22" r="6" fill="#BFDBFE"/>
                            <circle cx="145" cy="22" r="6" fill="#BFDBFE"/>
                            <rect x="72" y="16" width="3" height="12" rx="1.5" fill="#60A5FA"/>
                            <rect x="142" y="16" width="3" height="12" rx="1.5" fill="#60A5FA"/>
                            <!-- Grid -->
                            @php $cols = [60,80,100,120,140]; $rows = [75,95,115]; @endphp
                            @foreach($rows as $r)
                                @foreach($cols as $c)
                                    <rect x="{{ $c }}" y="{{ $r }}" width="14" height="12" rx="3" fill="#DBEAFE"/>
                                @endforeach
                            @endforeach
                            <!-- Highlights -->
                            <rect x="100" y="75" width="14" height="12" rx="3" fill="#3B82F6"/>
                            <rect x="120" y="95" width="14" height="12" rx="3" fill="#3B82F6"/>
                            <rect x="60" y="115" width="14" height="12" rx="3" fill="#10B981"/>
                            <!-- Compass -->
                            <circle cx="158" cy="130" r="22" fill="#1D4ED8"/>
                            <circle cx="158" cy="130" r="18" fill="#2563EB"/>
                            <polygon points="158,115 162,130 158,125 154,130" fill="white"/>
                            <polygon points="158,145 154,130 158,135 162,130" fill="#93C5FD"/>
                            <circle cx="35" cy="55" r="4" fill="white" opacity="0.5"/>
                            <text x="170" y="45" fill="white" font-size="14" opacity="0.5">+</text>
                            <text x="30" y="120" fill="white" font-size="12" opacity="0.4">○</text>
                        </svg>
                        <h2 class="text-white text-2xl font-bold mb-2">Atur Jadwalmu!</h2>
                        <p class="text-blue-200 text-sm leading-relaxed">Filter dan kelola tugas<br/>berdasarkan tanggal dan status.</p>
                    </div>

                    <!-- Slide 3 -->
                    <div class="slide hidden flex-col items-center text-center" data-slide="2">
                        <svg viewBox="0 0 220 180" class="w-48 mb-6" xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="110" cy="115" rx="85" ry="50" fill="#3B82F6" opacity="0.4"/>
                            <!-- Target -->
                            <circle cx="110" cy="90" r="65" fill="#2563EB" opacity="0.3"/>
                            <circle cx="110" cy="90" r="50" fill="#2563EB" opacity="0.4"/>
                            <circle cx="110" cy="90" r="35" fill="#2563EB" opacity="0.6"/>
                            <circle cx="110" cy="90" r="20" fill="#1D4ED8"/>
                            <circle cx="110" cy="90" r="8" fill="white"/>
                            <!-- Arrow -->
                            <line x1="160" y1="40" x2="118" y2="88" stroke="white" stroke-width="3" stroke-linecap="round"/>
                            <polygon points="160,40 148,44 156,52" fill="white"/>
                            <!-- Blobs -->
                            <ellipse cx="85" cy="105" rx="30" ry="12" fill="#60A5FA" opacity="0.5"/>
                            <ellipse cx="130" cy="118" rx="25" ry="10" fill="#93C5FD" opacity="0.4"/>
                            <text x="35" y="70" fill="white" font-size="14" opacity="0.5">+</text>
                            <text x="170" y="120" fill="white" font-size="14" opacity="0.4">+</text>
                            <circle cx="40" cy="110" r="5" fill="white" opacity="0.3"/>
                            <circle cx="180" cy="55" r="4" fill="white" opacity="0.4"/>
                        </svg>
                        <h2 class="text-white text-2xl font-bold mb-2">Capai Targetmu!</h2>
                        <p class="text-blue-200 text-sm leading-relaxed">Dashboard lengkap untuk memantau<br/>semua pencapaian tugasmu.</p>
                    </div>

                </div>
            </div>

            <!-- Dot Indicators -->
            <div class="flex justify-center gap-2 mt-6">
                <button class="dot w-3 h-3 rounded-full bg-white transition-all" data-dot="0"></button>
                <button class="dot w-2 h-2 rounded-full bg-white opacity-40 transition-all mt-0.5" data-dot="1"></button>
                <button class="dot w-2 h-2 rounded-full bg-white opacity-40 transition-all mt-0.5" data-dot="2"></button>
            </div>

        </div>

        <!-- RIGHT: Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-10">
            <div class="w-full max-w-sm">

                <h2 class="text-3xl font-bold text-blue-600 mb-1">Log In</h2>
                <p class="text-gray-400 text-sm mb-6">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-blue-500 font-semibold hover:underline">Buat akun</a>
                </p>

                @if (session('status'))
                    <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <!-- Email -->
                    <div class="relative">
                        <input type="email" name="email" value="{{ old('email') }}"
                            required autofocus autocomplete="username"
                            placeholder="Email"
                            class="w-full px-4 py-3 pr-10 border-b @error('email') border-red-400 @else border-gray-200 @enderror text-gray-700 text-sm focus:outline-none focus:border-blue-500 transition bg-transparent"/>
                        <svg class="absolute right-2 top-3 w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="relative">
                        <input type="password" name="password" id="login-password"
                            required autocomplete="current-password"
                            placeholder="Password"
                            class="w-full px-4 py-3 pr-10 border-b @error('password') border-red-400 @else border-gray-200 @enderror text-gray-700 text-sm focus:outline-none focus:border-blue-500 transition bg-transparent"/>
                        <button type="button" onclick="togglePass('login-password','eye-login')"
                            class="absolute right-2 top-3 text-gray-300 hover:text-gray-500 transition">
                            <svg id="eye-login" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember + Sign In -->
                    <div class="flex items-center justify-between pt-2">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-2.5 rounded-lg transition text-sm">
                            Sign in
                        </button>
                        <div class="flex items-center gap-2">
                            <input type="checkbox" name="remember" id="remember"
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded">
                            <label for="remember" class="text-xs text-gray-500">Ingat saya</label>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

<script>
// Toggle password visibility
function togglePass(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    const isHidden = input.type === 'password';
    input.type = isHidden ? 'text' : 'password';
    icon.innerHTML = isHidden
        ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>`
        : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>`;
}

// Slider
let current = 0;
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');

function goTo(n) {
    slides[current].classList.add('hidden');
    slides[current].classList.remove('flex');
    dots[current].classList.add('opacity-40');
    dots[current].classList.remove('w-3', 'h-3');
    dots[current].classList.add('w-2', 'h-2', 'mt-0.5');

    current = n;

    slides[current].classList.remove('hidden');
    slides[current].classList.add('flex');
    dots[current].classList.remove('opacity-40', 'w-2', 'h-2', 'mt-0.5');
    dots[current].classList.add('w-3', 'h-3');
}

dots.forEach(dot => {
    dot.addEventListener('click', () => goTo(parseInt(dot.dataset.dot)));
});

// Auto slide every 3 seconds
setInterval(() => goTo((current + 1) % slides.length), 3000);
</script>
</x-guest-layout>