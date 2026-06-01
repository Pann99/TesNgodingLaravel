<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Informasi akun kamu.") }}
        </p>
    </header>

    <div class="mt-6 space-y-6">

        <!-- Name: READ ONLY -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
            <div class="mt-1 block w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-700 cursor-not-allowed">
                {{ Auth::user()->name }}
            </div>
        </div>

        <!-- Email: READ ONLY -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <div class="mt-1 block w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-700 cursor-not-allowed">
                {{ Auth::user()->email }}
            </div>
        </div>

    </div>
</section>