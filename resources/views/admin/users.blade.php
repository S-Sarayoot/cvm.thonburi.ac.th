<x-app-layout>

    <div class="py-12 bg-gradient-to-br from-[#000000] via-[#1a1a1a] to-[#db337f] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <h3 class="font-bold text-xl text-[#db337f]">User Management</h3>
                <div>
                    <a href="{{ route('admin.users.create')}}" class="px-4 py-2 bg-[#db337f] text-white rounded hover:bg-[#b72c6a] text-sm shadow transition">Create User</a>
                    <a href="{{ route('admin') }}" class="px-4 py-2 bg-gray-200 text-[#db337f] rounded hover:bg-gray-300 text-sm shadow">
                        Back to Dashboard
                    </a>
                </div>
            </div>
            @if (session('success'))
                <div id="success-alert" class="mb-4 px-4 py-3 rounded bg-[#ffe3f0] text-[#db337f] border border-[#db337f] flex justify-between items-center shadow">
                    <span>{{ session('success') }}</span>
                    <button type="button" onclick="document.getElementById('success-alert').style.display='none'" class="ml-4 text-[#db337f] hover:text-red-600 font-bold text-xl leading-none">&times;</button>
                </div>
                <script>
                    setTimeout(function() {
                        const alert = document.getElementById('success-alert');
                        if (alert) alert.style.display = 'none';
                    }, 10000);
                </script>
            @endif
            <div class="bg-white p-6 rounded-xl shadow-lg overflow-x-auto w-full">
                <table id="usersTable" class="min-w-full text-left  rounded-xl overflow-hidden">
                    <thead>
                        <tr class="bg-[#db337f] text-white">
                            <th class="py-3 px-4 font-semibold">Name</th>
                            <th class="py-3 px-4 font-semibold">Email</th>
                            <th class="py-3 px-4 font-semibold text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
        <div class="bg-white rounded-lg p-6 w-full max-w-sm shadow-lg border border-[#db337f]">
            <h3 class="font-bold text-lg mb-2 text-[#db337f]">Confirm Delete</h3>
            <p class="mb-4 text-sm">Type <span class="font-bold text-[#db337f]">confirm</span> to confirm deletion of this user</p>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <input type="text" id="confirmText" name="confirmText" class="border border-[#db337f] rounded px-3 py-2 w-full mb-3 focus:ring focus:ring-[#db337f]" placeholder="Type confirm">
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="hideDeleteModal()" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-[#db337f] text-white rounded hover:bg-[#b72c6a]" id="deleteBtn" disabled>Delete</button>
                </div>
            </form>
        </div>
    </div>
   
   
    @push('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.users') }}',
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                pageLength: 25,
                lengthMenu: [25, 50, 100, 200],
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    paginate: {
                        previous: "Previous",
                        next: "Next"
                    },
                    zeroRecords: "No matching records found"
                }
            });
        });

        let deleteUserId = null;

        function showDeleteModal(id) {
            deleteUserId = id;
            document.getElementById('deleteForm').action = '{{ url('admin/users') }}/' + id;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('confirmText').value = '';
            document.getElementById('deleteBtn').disabled = true;
        }

        function hideDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        document.getElementById('confirmText').addEventListener('input', function() {
            document.getElementById('deleteBtn').disabled = this.value.trim().toLowerCase() !== 'confirm';
        });
    </script>
    
    @endpush
</x-app-layout>