<section class="p-6 sm:p-8 rounded-2xl shadow-lg border border-blue-700/40 
    bg-gradient-to-br from-gray-900 via-blue-900 to-gray-800 
    backdrop-blur-md hover:shadow-blue-500/30 transition">

    <header>
        <h2 class="text-lg font-semibold text-blue-300">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6 text-white">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="text-blue-200"/>
            <x-text-input 
                id="update_password_current_password" 
                name="current_password" 
                type="password" 
                class="mt-1 block w-full rounded-lg bg-gray-800/70 border border-blue-700/40 
                       text-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                autocomplete="current-password" 
                placeholder="••••••••" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-red-400" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" class="text-blue-200"/>
            <x-text-input 
                id="update_password_password" 
                name="password" 
                type="password" 
                class="mt-1 block w-full rounded-lg bg-gray-800/70 border border-blue-700/40 
                       text-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                autocomplete="new-password" 
                placeholder="••••••••" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red-400" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="text-blue-200"/>
            <x-text-input 
                id="update_password_password_confirmation" 
                name="password_confirmation" 
                type="password" 
                class="mt-1 block w-full rounded-lg bg-gray-800/70 border border-blue-700/40 
                       text-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                autocomplete="new-password" 
                placeholder="••••••••" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-red-400" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-500 transition">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
