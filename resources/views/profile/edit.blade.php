<x-app-layout>
  

    <div class="py-12 bg-gradient-to-br from-[#000000] via-[#1a1a1a] to-[#db337f] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('status') === 'password-updated' || session('status') === 'profile-updated')
                <div id="success-alert" class="mb-4 px-4 py-3 rounded bg-[#ffe3f0] text-[#db337f] border border-[#db337f] flex justify-between items-center shadow">
                    <span>Saved</span>
                    <button type="button" onclick="document.getElementById('success-alert').style.display='none'" class="ml-4 text-[#db337f] hover:text-red-600 font-bold text-xl leading-none">&times;</button>
                </div>
                <script>
                    setTimeout(function() {
                        const alert = document.getElementById('success-alert');
                        if (alert) alert.style.display = 'none';
                    }, 10000);
                </script>
            @endif
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            {{-- 
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
             --}}
        </div>
    </div>
</x-app-layout>
