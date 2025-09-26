<section class="p-6 sm:p-8 rounded-2xl shadow-lg border border-blue-700/40 
    bg-gradient-to-br from-gray-900 via-blue-900 to-gray-800 
    backdrop-blur-md hover:shadow-blue-500/30 transition">

    <header>
        <h2 class="text-lg font-semibold text-blue-300">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6 text-white">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-blue-200"/>
            <x-text-input 
                id="name" 
                name="name" 
                type="text" 
                class="mt-1 block w-full rounded-lg bg-gray-800/70 border border-blue-700/40 
                       text-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                :value="old('name', $user->name)" 
                required autofocus autocomplete="name"
                placeholder="Enter your name" />
            <x-input-error class="mt-2 text-red-400" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-blue-200"/>
            <x-text-input 
                id="email" 
                name="email" 
                type="email" 
                class="mt-1 block w-full rounded-lg bg-gray-800/70 border border-blue-700/40 
                       text-white placeholder-gray-500 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                :value="old('email', $user->email)" 
                required autocomplete="username"
                placeholder="Enter your email" />
            <x-input-error class="mt-2 text-red-400" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-300">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" 
                            class="underline text-sm text-blue-400 hover:text-blue-300 rounded-md 
                                   focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Save -->
        <div class="flex items-center gap-4">
            <x-primary-button class="bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-500 transition">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
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
