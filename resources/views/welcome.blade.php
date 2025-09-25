<x-guest-layout>
    @php
$navMenu = [
    ['name' => 'หน้าแรก'],
    ['name' => 'ประชาสัมพันธ์'],
    ['name' => 'คลังปัญญา'],
    ['name' => 'โครงการ'],
    ['name' => 'ผลงานของนักศึกษา'],
    ['name' => 'เกี่ยวกับสาขา'],
];
    @endphp

    <div 
    x-data="{
        active: localStorage.getItem('activeTab') || 'หน้าแรก'
    }"
    x-init="$watch('active', value => localStorage.setItem('activeTab', value))"
    class="w-full"
>


        <!-- Banner -->
        <img src="{{ asset('images/banner.png') }}" 
             class="w-full md:max-w-[90%] shadow-xl max-h-3xl mx-auto md:rounded-xl">

        <!-- เมนู -->
        <div class="flex md:justify-center mt-5 md:mt-8 pb-5 w-full overflow-x-auto whitespace-nowrap">
            <div class="flex gap-4 bg-white max-md:px-4 px-2 py-2">
                @foreach ($navMenu as $item)
                    <a @click.prevent="active = '{{ $item['name'] }}'"
                       class="relative px-3 py-2 font-bold hover:text-[#8a438f] transition cursor-pointer"
                       :class="active === '{{ $item['name'] }}' ? 'text-[#8a438f] -translate-y-1' : 'text-gray-600'">

                        {{ $item['name'] }}

                        <span
                            class="absolute left-0 -bottom-1 h-[3px] bg-[#8a438f] rounded-full w-full transform scale-x-0 origin-center transition-transform duration-300"
                            :class="active === '{{ $item['name'] }}' ? 'scale-x-100' : ''"></span>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Content -->
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div x-show="active === 'หน้าแรก'" x-cloak>
                @include('components.content-welcome')
            </div>
            <div x-show="active === 'ประชาสัมพันธ์'" x-cloak>
                @include('components.content-announcment')
            </div>
            <div x-show="active === 'โครงการ'" x-cloak>
                @include('components.content-project')
            </div>
        </div>

    </div>
</x-guest-layout>
