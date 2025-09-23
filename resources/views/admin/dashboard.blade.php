<x-admin-layout>
    <div class="flex min-h-screen bg-gray-50">
        {{-- Sidebar --}}
        @include('layouts-admin.sidebar')

        {{-- Main Content --}}
        <div class="flex-1 py-12 px-4 md:px-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h3 class="mb-6 font-bold text-xl text-[#c9a14a]">Admin Dashboard</h3>
                
                {{-- <!-- Summary Section -->
                <div class="bg-white p-6 rounded-xl shadow-lg mb-8">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                        <div>
                            <div class="text-sm text-gray-500">Total Users</div>
                            <div class="text-2xl font-bold text-[#db337f]">{{ $users->count() }}</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500">Total Investment</div>
                            <div class="text-2xl font-bold text-[#db337f]">{{ number_format($users->sum('total_investment'), 0) }} shares</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500">Total Sale</div>
                            <div class="text-2xl font-bold text-[#db337f]">{{ number_format($users->sum('total_sale'), 0) }} shares</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-500">Total Payment</div>
                            <div class="text-2xl font-bold text-[#db337f]">${{ number_format($users->sum('total_payment'), 2) }}</div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end mb-4 gap-2">

                    <form method="GET" action="{{ route('admin.users.findbymonth') }}" class="flex gap-2 justify-end ">
                        <span class="self-center text-[#c9a14a] font-bold">Find month range</span>
                        <input type="month" name="start_month" value="{{ request('start_month') }}" class="border border-[#db337f] rounded px-3 py-2 focus:ring focus:ring-[#db337f] focus:outline-none text-sm" placeholder="Start Month">
                        <span class="self-center text-[#c9a14a] font-bold">to</span>
                        <input type="month" name="end_month" value="{{ request('end_month') }}" class="border border-[#db337f] rounded px-3 py-2 focus:ring focus:ring-[#db337f] focus:outline-none text-sm" placeholder="End Month">
                        <button type="submit" class="px-4 py-2 bg-[#db337f] text-white rounded hover:bg-[#b72c6a] text-sm shadow">Find</button>
                    </form>

                    

                    <a href="{{ route('admin.users') }}" class="px-4 py-2 bg-gray-200 text-[#db337f] rounded hover:bg-gray-300 text-sm shadow">
                        User Management
                    </a>
                    
                    <a href="{{ route('admin.users.export', ['start_month' => request('start_month'), 'end_month' => request('end_month')]) }}" target="_blank" class="px-4 py-2 bg-[#db337f] text-white rounded hover:bg-[#b72c6a] text-sm shadow">
                        Export CSV
                    </a>
                    
                </div>

                <!-- Users Table -->
                @php
                    $chunkSize = 50;
                    $userChunks = $users->chunk($chunkSize);
                @endphp

                <div class="bg-white p-2 md:p-6 rounded-xl shadow-lg overflow-x-auto">
                    <table id="usersTable" class="min-w-full rounded-xl overflow-hidden text-xs md:text-base">
                        <thead class="bg-[#db337f] text-white">
                            <tr>
                                <th class="px-2 py-2 md:px-4">#</th>
                                <th class="px-2 py-2 md:px-4">Name</th>
                                <th class="px-2 py-2 md:px-4">Email</th>
                                <th class="px-2 py-2 md:px-4">Total Investment</th>
                                <th class="px-2 py-2 md:px-4">Total Sale</th>
                                <th class="px-2 py-2 md:px-4">Total Payment</th>
                            </tr>
                        </thead>
                        <tbody id="userTableBody">
                            @foreach($userChunks->first() as $i => $user)
                                <tr class="hover:bg-[#ffe3f0] transition">
                                    <td class="px-2 py-2 md:px-4">{{ $i + 1 }}</td>
                                    <td class="px-2 py-2 md:px-4">{{ $user->name }}</td>
                                    <td class="px-2 py-2 md:px-4">{{ $user->email }}</td>
                                    <td class="px-2 py-2 md:px-4 text-right">{{ number_format($user->total_investment, 0) ?? '0.00' }}</td>
                                    <td class="px-2 py-2 md:px-4 text-right">{{ number_format($user->total_sale, 0) ?? '0.00' }}</td>
                                    <td class="px-2 py-2 md:px-4 text-right">${{ number_format($user->total_payment, 2) ?? '0.00' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($userChunks->count() > 1)
                        <div class="flex justify-center mt-4">
                            <button id="loadMoreBtn" class="px-4 py-2 bg-[#db337f] text-white rounded hover:bg-[#b72c6a] shadow text-sm">
                                Load More
                            </button>
                        </div>
                    @endif
                </div> --}}
            </div>
        </div>
    </div>

    
    {{-- @push('scripts')
        <script>
            let userChunks = @json($userChunks->slice(1)->map->values()->map->all()->values());
            let currentIndex = 1;
            let rowCount = {{ $chunkSize }};
            document.getElementById('loadMoreBtn')?.addEventListener('click', function() {
                if (userChunks.length > 0) {
                    let tbody = document.getElementById('userTableBody');
                    let chunk = userChunks.shift();
                    chunk.forEach(function(user, idx) {
                        let tr = document.createElement('tr');
                        tr.className = 'hover:bg-[#ffe3f0] transition';
                        tr.innerHTML = `
                            <td class="px-4 py-2">${rowCount + idx + 1}</td>
                            <td class="px-4 py-2">${user.name}</td>
                            <td class="px-4 py-2">${user.email}</td>
                            <td class="px-4 py-2 text-right">${Number(user.total_investment ?? 0).toLocaleString('en-US', {minimumFractionDigits: 0, maximumFractionDigits: 2})}</td>
                            <td class="px-4 py-2 text-right">${Number(user.total_sale ?? 0).toLocaleString('en-US', {minimumFractionDigits: 0, maximumFractionDigits: 2})}</td>
                            <td class="px-4 py-2 text-right">$${Number(user.total_payment ?? 0).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>

                        `;
                        tbody.appendChild(tr);
                    });
                    rowCount += chunk.length;
                    if (userChunks.length === 0) {
                        this.style.display = 'none';
                    }
                }
            });
        </script>
    @endpush --}}
</x-admin-layout>