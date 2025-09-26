<section class="space-y-6">
    <header>
        <h2 class="text-lg font-semibold text-blue-300">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-300">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <!-- Tombol buka modal -->
    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-4 py-2 rounded-lg bg-gradient-to-r from-red-700 via-red-800 to-red-900 
               text-white font-semibold shadow-md hover:shadow-red-500/40 
               hover:scale-105 transition duration-300"
    >
        {{ __('Delete Account') }}
    </button>

    <!-- Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}"
              class="p-6 bg-gradient-to-br from-gray-900 via-blue-900 to-gray-800 
                     text-white backdrop-blur-md rounded-xl shadow-2xl border border-blue-600">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold text-red-400">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-2 text-sm text-gray-300">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 bg-gray-100 text-black rounded-lg 
                           border border-gray-400 focus:ring-2 focus:ring-red-500"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-400" />
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <button type="button"
                        x-on:click="$dispatch('close')"
                        class="px-4 py-2 rounded-lg bg-gray-600 text-white font-medium 
                               hover:bg-gray-500 transition duration-200">
                    {{ __('Cancel') }}
                </button>

                <button type="submit"
                        class="px-4 py-2 rounded-lg bg-gradient-to-r from-red-700 to-red-900 
                               text-white font-semibold shadow-md hover:shadow-red-500/40 
                               hover:scale-105 transition duration-300">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
