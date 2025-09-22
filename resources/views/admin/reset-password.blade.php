<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-[#db337f] leading-tight flex items-center gap-2">
            ADMIN
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-[#ffe3f0] via-white to-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="mb-6 font-bold text-xl text-[#db337f]">Reset User Password {{ $user->name }}</h3>
            <div class="bg-white p-6 rounded-xl shadow-lg overflow-x-auto w-full">
                <form action="{{ route('admin.users.resetpassword', $user->id) }}" method="POST" class="space-y-6 max-w-lg mx-auto">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block font-medium mb-1 text-[#db337f]" for="password">New Password</label>
                        <div class="relative">
                            <input type="password" name="password" id="password"
                                class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]" required>
                            <button type="button" onclick="togglePassword('password', this)" class="absolute right-2 top-2 text-[#db337f]">
                                <svg width="20" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="#db337f" stroke="currentColor">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1 10c0-3.9 3.1-7 7-7s7 3.1 7 7h-1c0-3.3-2.7-6-6-6s-6 2.7-6 6H1zm4 0c0-1.7 1.3-3 3-3s3 1.3 3 3-1.3 3-3 3-3-1.3-3-3zm1 0c0 1.1.9 2 2 2s2-.9 2-2-.9-2-2-2-2 .9-2 2z"/>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="block font-medium mb-1 text-[#db337f]" for="password_confirmation">Confirm New Password</label>
                        <div class="relative">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]" required>
                            <button type="button" onclick="togglePassword('password_confirmation')" class="absolute right-2 top-2 text-[#db337f]">
                                <svg width="20" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="#db337f" stroke="currentColor">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1 10c0-3.9 3.1-7 7-7s7 3.1 7 7h-1c0-3.3-2.7-6-6-6s-6 2.7-6 6H1zm4 0c0-1.7 1.3-3 3-3s3 1.3 3 3-1.3 3-3 3-3-1.3-3-3zm1 0c0 1.1.9 2 2 2s2-.9 2-2-.9-2-2-2-2 .9-2 2z"/>
                                </svg>
                            </button>
                        </div>
                        
                        <div id="pw-match-msg" class="text-red-600 text-sm mt-1" style="display:none;"></div>
                        @error('password_confirmation')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.users') }}" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 text-[#db337f]">Cancel</a>
                        <button type="submit" class="px-4 py-2 bg-[#db337f] text-white rounded-lg hover:bg-[#b72c6a]">Reset Password</button>
                    </div>
                </form>
                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        function togglePassword(id, btn) {
            const input = document.getElementById(id);
            input.type = input.type === 'password' ? 'text' : 'password';
        }

        // เช็ค password กับ confirm password แบบ real-time
        const pw = document.getElementById('password');
        const cpw = document.getElementById('password_confirmation');
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
</x-app-layout>