<x-admin-layout>
    <div class="h-full bg-white">
        {{-- Main Content --}}
        <div class="relative rounded-xl mb-8 overflow-hidden ">
            <img src="{{ asset('images/fineart-bg-1.png') }}" alt="Dashboard user"
                class="w-full h-100 object-cover rounded-xl" style="filter: brightness(0.7);">
            <div
                class="absolute md:left-16 md:top-64 bottom-4 left-4 text-white text-2xl md:text-3xl font-bold drop-shadow-lg transition-opacity duration-300 opacity-100">
                Welcome back<br>{{ Auth::user()->name }}!
            </div>
        </div>
</x-admin-layout>