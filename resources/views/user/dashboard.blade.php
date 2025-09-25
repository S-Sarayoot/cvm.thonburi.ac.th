<x-user-layout>
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

        @push('scripts')
            <script>
                function loadStatementTable() {
                    let month = document.getElementById('month-input').value;
                    fetch("{{ route('dashboard.statement') }}?month=" + month)
                        .then(response => response.text())
                        .then(html => {
                            document.getElementById('statement-table').innerHTML = html;
                        });
                }

                document.getElementById('statement-search-form').addEventListener('submit', function(e) {
                    e.preventDefault();
                    loadStatementTable();
                });

                // โหลด statement table ครั้งแรกเมื่อหน้าเว็บโหลด
                window.addEventListener('DOMContentLoaded', function() {
                    loadStatementTable();
                });
            </script>
        @endpush
</x-user-layout>
