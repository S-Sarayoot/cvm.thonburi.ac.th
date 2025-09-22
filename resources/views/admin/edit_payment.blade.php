{{-- filepath: resources/views/admin/edit_payment.blade.php --}}
<x-app-layout>

    <div class="py-12 bg-gradient-to-br from-[#ffe3f0] via-white to-gray-100 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <form action="{{ route('admin.payments.update', $payment->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div class="relative my-8">
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="w-full border-t border-[#db337f]"></div>
                        </div>
                        <div class="relative flex justify-start">
                            <span class="bg-white pr-3 text-xl font-extrabold text-[#db337f] tracking-wide">Edit Payment</span>
                        </div>
                    </div>
                    <div>
                        <label for="amount" class="block font-medium mb-1 text-[#db337f]">Amount ($)</label>
                        <input type="number" step="0.01" name="amount" id="amount" value="{{ old('amount', $payment->amount) }}" min="0"
                            class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
                    </div>
                    <div>
                        <label for="paid_at" class="block font-medium mb-1 text-[#db337f]">Paid at</label>
                        <input type="date" name="paid_at" id="paid_at" value="{{ old('paid_at', $payment->paid_at) }}"
                            class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="submit" class="px-4 py-2 bg-[#db337f] text-white rounded-lg hover:bg-[#b72c6a] shadow transition">Update Payment</button>
                        <a href="{{ route('admin.users.investment', $payment->user_id) }}" class="px-4 py-2 bg-gray-200 text-[#db337f] rounded-lg hover:bg-gray-300 shadow transition">Cancel</a>
                    </div>
                </form>
                @if ($errors->any())
                    <div class="mt-6">
                        <div class="bg-[#ffe3f0] border border-[#db337f] text-[#db337f] px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>