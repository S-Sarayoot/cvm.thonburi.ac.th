<x-app-layout>

    <div class="py-12 bg-gradient-to-br from-[#ffe3f0] via-white to-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="mb-6 font-bold text-xl text-[#db337f]">Edit Profile's user</h3>
            <div class="bg-white p-6 rounded-xl shadow-lg overflow-x-auto w-full">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6 max-w-lg mx-auto">
                    @csrf
                    @method('PUT')
                    
                    <!-- Information detail section -->
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
                    
                    <!-- Information detail section -->
                    <div class="relative my-8">
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="w-full border-t border-[#db337f]"></div>
                        </div>
                        <div class="relative flex justify-start">
                            <span class="bg-white pr-3 text-base font-semibold text-[#db337f]">Personal Information</span>
                        </div>
                    </div>

                    <div>
                        <label class="block font-medium mb-1 text-[#db337f]" for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                            class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]" required>
                        @error('name')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-medium mb-1 text-[#db337f]" for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                            class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
                        @error('phone')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="block font-medium mb-1 text-[#db337f]" for="date_of_birth">Date of birth</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}"
                            class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]" placeholder="mm/dd/yyyy">
                        @error('date_of_birth')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="block font-medium mb-1 text-[#db337f]" for="street_address">Street address</label>
                        <input type="text" name="street_address" id="street_address" value="{{ old('street_address', $user->street_address) }}"
                            class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
                        @error('street_address')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="block font-medium mb-1 text-[#db337f]" for="street_address_2">Street address 2</label>
                        <input type="text" name="street_address_2" id="street_address_2" value="{{ old('street_address_2', $user->street_address_2) }}"
                            class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
                        @error('street_address_2')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="block font-medium mb-1 text-[#db337f]" for="town">Town</label>
                        <input type="text" name="town" id="town" value="{{ old('town', $user->town) }}"
                            class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
                        @error('town')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="block font-medium mb-1 text-[#db337f]" for="county">County</label>
                        <input type="text" name="county" id="county" value="{{ old('county', $user->county) }}"
                            class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
                        @error('county')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="block font-medium mb-1 text-[#db337f]" for="postcode">Postcode</label>
                        <input type="text" name="postcode" id="postcode" value="{{ old('postcode', $user->postcode) }}"
                            class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
                        @error('postcode')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="block font-medium mb-1 text-[#db337f]" for="country">Country</label>
                        <input type="text" name="country" id="country" value="{{ old('country', $user->country) }}"
                            class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
                        @error('country')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="hidden" name="reinvest_interest" value="0">
                        <input type="checkbox" name="reinvest_interest" id="reinvest_interest" value="1" {{ old('reinvest_interest', $user->reinvest_interest) ? 'checked' : '' }}
                            class="border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
                        <label class="block font-medium mb-1 text-[#db337f]" for="reinvest_interest">
                            Update interest preference<br>
                            <span class="text-sm font-normal">
                                <strong>Check</strong> to choose <span class="text-[#db337f]">Reinvest interest</span><br>
                                <strong>Uncheck</strong> to choose <span class="text-[#db337f]">Receive interest as cash</span>
                            </span>
                        </label>
                    </div>
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.users') }}" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 text-[#db337f]">Cancel</a>
                        <button type="submit" class="px-4 py-2 bg-[#db337f] text-white rounded-lg hover:bg-[#b72c6a]">Save</button>
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
        // สามารถเพิ่ม JS เพิ่มเติมได้
    </script>
    @endpush
</x-app-layout>