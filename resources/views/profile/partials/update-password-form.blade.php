<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label class="block font-medium mb-1 text-[#db337f]" for="update_password_current_password">Current Password</label>
            <input type="password" name="current_password" id="update_password_current_password"
                    class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]" required>            
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <label class="block font-medium mb-1 text-[#db337f]" for="update_password_password">New Password</label>
            <div class="relative">
                <input type="password" name="password" id="update_password_password"
                    class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]" required>
                <button type="button" onclick="togglePassword('update_password_password', this)" class="absolute right-2 top-2 text-[#db337f]">
                    <svg width="20" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="#db337f" stroke="currentColor">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1 10c0-3.9 3.1-7 7-7s7 3.1 7 7h-1c0-3.3-2.7-6-6-6s-6 2.7-6 6H1zm4 0c0-1.7 1.3-3 3-3s3 1.3 3 3-1.3 3-3 3-3-1.3-3-3zm1 0c0 1.1.9 2 2 2s2-.9 2-2-.9-2-2-2-2 .9-2 2z"/>
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>
        <div>
            <label class="block font-medium mb-1 text-[#db337f]" for="update_password_password_confirmation">Confirm New Password</label>
            <div class="relative">
                <input type="password" name="password_confirmation" id="update_password_password_confirmation"
                    class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]" required>
                <button type="button" onclick="togglePassword('update_password_password_confirmation')" class="absolute right-2 top-2 text-[#db337f]">
                    <svg width="20" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="#db337f" stroke="currentColor">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1 10c0-3.9 3.1-7 7-7s7 3.1 7 7h-1c0-3.3-2.7-6-6-6s-6 2.7-6 6H1zm4 0c0-1.7 1.3-3 3-3s3 1.3 3 3-1.3 3-3 3-3-1.3-3-3zm1 0c0 1.1.9 2 2 2s2-.9 2-2-.9-2-2-2-2 .9-2 2z"/>
                    </svg>
                </button>
            </div>
            
            <div id="pw-match-msg" class="text-red-600 text-sm mt-1" style="display:none;"></div>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="px-4 py-2 bg-[#db337f] text-white rounded-lg hover:bg-[#b72c6a]">Save</button>
            {{-- <x-primary-button>{{ __('Save') }}</x-primary-button> --}}

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 10000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
        {{--
        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
        --}}
    </form>
    @push('scripts')
    <script>
        function togglePassword(id, btn) {
            const input = document.getElementById(id);
            input.type = input.type === 'password' ? 'text' : 'password';
        }

        // เช็ค password กับ confirm password แบบ real-time
        const pw = document.getElementById('update_password_password');
        const cpw = document.getElementById('update_password_password_confirmation');
        const msg = document.getElementById('pw-match-msg');

        function checkPasswordMatch() {
            if (pw.value && cpw.value && pw.value !== cpw.value) {
                msg.textContent = 'Password and Confirm Password do not match';
                msg.style.display = 'block';
            } else {
                msg.textContent = '';
                msg.style.display = 'none';
            }
        }

        pw.addEventListener('input', checkPasswordMatch);
        cpw.addEventListener('input', checkPasswordMatch);
    </script>
    @endpush
</section>
