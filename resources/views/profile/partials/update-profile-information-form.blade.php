<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update', $user->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('put')  

        <!-- Account Information -->
        <div class="relative my-8">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="w-full border-t border-[#db337f]"></div>
            </div>
            <div class="relative flex justify-start">
                <span class="bg-white pr-3 text-base font-semibold text-[#db337f]">Account Information</span>
            </div>
        </div>

        <div>
            <label class="block font-medium mb-1 text-[#db337f]" for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]" required>
            @error('email')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Personal Information -->
        
        <div class="relative my-8">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="w-full border-t border-[#db337f]"></div>
            </div>
            <div class="relative flex justify-start">
                <span class="bg-white pr-3 text-base font-semibold text-[#db337f]">Personal Information</span>
            </div>
        </div>

        {{-- name --}}

        <div>
            <label class="block font-medium mb-1 text-[#db337f]" for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]" required>
            @error('name')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- phone --}}

        <div>
            <label class="block font-medium mb-1 text-[#db337f]" for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
            @error('phone')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- date_of_birth --}}
        <div>
            <label class="block font-medium mb-1 text-[#db337f]" for="date_of_birth">Date of birth</label>
            <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}"
                class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]" placeholder="mm/dd/yyyy">
            @error('date_of_birth')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>
        {{-- Address --}}
        <div>
            <label class="block font-medium mb-1 text-[#db337f]" for="address">Address</label>
            <input type="text" name="address" id="address" value="{{ old('address', $user->address) }}"
                class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
            @error('address')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- Province --}}
        
        <div>
            <label class="block font-medium mb-1 text-[#db337f]" for="province">Province</label>
            <input type="text" name="province" id="province" value="{{ old('province', $user->province) }}"
                class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
            @error('province')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>
        {{-- Zipcode --}}
        <div>
            <label class="block font-medium mb-1 text-[#db337f]" for="zipcode">Zipcode</label>
            <input type="text" name="zipcode" id="zipcode" value="{{ old('zipcode', $user->zipcode) }}"
                class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
            @error('zipcode')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>
        {{-- Department name --}}
        <div>
            <label class="block font-medium mb-1 text-[#db337f]" for="department_name">department_name</label>
            <input type="text" name="department_name" id="department_name" value="{{ old('department_name', $user->department_name) }}"
                class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
            @error('department_name')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="flex items-center gap-4">
            <button type="submit" class="px-4 py-2 bg-[#db337f] text-white rounded-lg hover:bg-[#b72c6a]">Save</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
        {{--
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
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
</section>
