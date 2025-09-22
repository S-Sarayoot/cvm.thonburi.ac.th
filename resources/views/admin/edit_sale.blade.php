{{-- filepath: resources/views/admin/edit_sale.blade.php --}}
<x-app-layout>

    <div class="py-12 bg-gradient-to-br from-[#ffe3f0] via-white to-gray-100 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <form action="{{ route('admin.sales.update', $sale->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div class="relative my-8">
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="w-full border-t border-[#db337f]"></div>
                        </div>
                        <div class="relative flex justify-start">
                            <span class="bg-white pr-3 text-xl font-extrabold text-[#db337f] tracking-wide">Edit Sale</span>
                        </div>
                    </div>
                    <div>
                        <label for="shares" class="block font-medium mb-1 text-[#db337f]">Shares</label>
                        <input type="number" name="shares" id="shares" value="{{ old('shares', $sale->shares) }}" min="0"
                            class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
                    </div>
                    <div>
                        <label for="price" class="block font-medium mb-1 text-[#db337f]">Price ($)</label>
                        <input type="number" step="0.0001" name="price" id="price" value="{{ old('price', $sale->price) }}" min="0.0001"
                            class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
                    </div>
                    <div>
                        <label for="sold_at" class="block font-medium mb-1 text-[#db337f]">Sold at</label>
                        <input type="date" name="sold_at" id="sold_at" value="{{ old('sold_at', $sale->sold_at) }}"
                            class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="submit" class="px-4 py-2 bg-[#db337f] text-white rounded-lg hover:bg-[#b72c6a] shadow transition">Update Sale</button>
                        <a href="{{ route('admin.users.investment', $sale->user_id) }}" class="px-4 py-2 bg-gray-200 text-[#db337f] rounded-lg hover:bg-gray-300 shadow transition">Cancel</a>
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