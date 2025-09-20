<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" autocomplete="off">
        @csrf

        <!-- hidden dummy fields to trick browser autofill -->
        <input type="text" name="fakeuser" autocomplete="username" class="hidden">
        <input type="password" name="fakepassword" autocomplete="new-password" class="hidden">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full"
                          type="email"
                          name="email"
                          required
                          autofocus
                          autocomplete="off" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required
                          autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Ganti Remember Me -->
        <div class="block mt-4 text-sm text-gray-600">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Register here</a>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3 flex items-center justify-end mt-4">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
