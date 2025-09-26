    @props([
    'title' => '',
    'active' => null,
    'categories' => null,
    'mockupData' => null
])
    @php
    @endphp

    <div class="max-w-7xl mx-auto px-6 md:px-4 mt-8">
        <div class="flex flex-col lg:flex-row justify-between">
            <h2 class="text-xl font-bold text-[#8a438f] mb-4">{{ $title }}</h2>
            @if ($categories != null)
                <div class="flex items-center gap-2">
                    <div class="flex flex-wrap gap-2  overflow-auto">
                        @foreach ($categories as $cat)
                            <button 
                            onclick="window.location.href='?category={{$cat}}'" 
                            class="px-3 py-1.5 text-sm rounded-md border 
                                <?= $cat === $active
            ? 'bg-purple-600 text-white border-purple-600'
            : 'text-gray-700 border-gray-300 hover:bg-purple-50' ?>
                            ">
                            {{$cat}}
                            </button>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
            @if (empty($mockupData))
            <div class="md:col-span-2 lg:col-span-3 text-center flex flex-col justify-center items-center text-gray-500">
                <p >ไม่มีข้อมูล</p>
            </div>
            @endif
            @foreach ($mockupData as $data)
                @if ($active === 'ทั้งหมด' || $data['category'] == $active)
                    <x-card-content 
                        :id="$data['id']"
                        :title="$data['title']"
                        :description="$data['description']"
                        :category="$data['category']"
                        :views="$data['views']"
                        :author="$data['author']"
                        :published_at="$data['published_at']"
                        :srcImage="$data['srcImage']"
                    />
                @endif
            @endforeach
        </div>
        <div class="flex justify-end items-center mt-6">
                <button class="group cursor-pointer border inline-flex border-[#8a438f] px-4 py-2 text-xs text-[#8a438f] rounded-full shadow-md transition-transform duration-300 hover:bg-[#8a438f] hover:text-white hover:-translate-y-1">
                    READ MORE
                    <span class="pl-2 transition-transform transform duration-300 group-hover:translate-x-2">>></span>
                </button>
        </div>
    </div>