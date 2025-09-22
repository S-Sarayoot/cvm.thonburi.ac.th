{{-- filepath: resources/views/admin/edit_investment.blade.php --}}
<x-app-layout>
    

    <div class="py-12 bg-gradient-to-br from-[#ffe3f0] via-white to-gray-100 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <form action="{{ route('admin.investments.update', $investment->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div class="relative my-8">
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="w-full border-t border-[#db337f]"></div>
                        </div>
                        <div class="relative flex justify-start">
                            <span class="bg-white pr-3 text-xl font-extrabold text-[#db337f] tracking-wide">Edit Investment</span>
                        </div>
                    </div>
                    <div>
                        <label for="shares" class="block font-medium mb-1 text-[#db337f]">Shares</label>
                        <input type="number" name="shares" id="shares" value="{{ old('shares', $investment->shares) }}" min="0"
                            class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
                    </div>
                    <div>
                        <label for="price" class="block font-medium mb-1 text-[#db337f]">Price per Share ($)</label>
                        <input type="number" step="0.0001" name="price" id="price" value="{{ old('price', $investment->price) }}" min="0.0001"
                            class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
                    </div>
                    <div>
                        <label for="invested_at" class="block font-medium mb-1 text-[#db337f]">Invested at</label>
                        <input type="date" name="invested_at" id="invested_at" value="{{ old('invested_at', $investment->invested_at) }}"
                            class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
                    </div>
                    <div class="flex items-center gap-4">
                        <div>
                            <input type="radio" name="benefit_type" id="no_benefit" value="none" @if($investment->annual_benefit == 0 && $investment->complimentary == 0) checked @endif>
                            <label for="no_benefit" class="font-medium text-[#db337f]">None</label>
                        </div>
                        <div>
                            <input type="radio" name="benefit_type" id="annual_benefit" value="annual" @if($investment->annual_benefit == 1 && $investment->complimentary == 0) checked @endif>
                            <label for="annual_benefit" class="font-medium text-[#db337f]">Annual Benefit</label>
                        </div>
                        <div>
                            <input type="radio" name="benefit_type" id="complimentary" value="complimentary" @if($investment->complimentary == 1 && $investment->annual_benefit == 0) checked @endif>
                            <label for="complimentary" class="font-medium text-[#db337f]">Complimentary</label>
                        </div>
                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="submit" class="px-4 py-2 bg-[#db337f] text-white rounded-lg hover:bg-[#b72c6a] shadow transition">Update Investment</button>
                        <a href="{{ route('admin.users.investment', $investment->user_id) }}" class="px-4 py-2 bg-gray-200 text-[#db337f] rounded-lg hover:bg-gray-300 shadow transition">Cancel</a>
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