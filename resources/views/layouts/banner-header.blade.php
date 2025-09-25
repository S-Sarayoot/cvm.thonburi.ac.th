@php
$navMenu = [
    ['name' => 'หน้าแรก', 'url' => '/'],
    ['name' => 'ประชาสัมพันธ์', 'url' => '/news'],
    ['name' => 'คลังปัญญา', 'url' => '/repository'],
    ['name' => 'โครงการ', 'url' => '/project'],
    ['name' => 'ผลงานของนักศึกษา', 'url' => '/Showcase',],
    ['name' => 'เกี่ยวกับสาขา', 'url' => '/about'],
];
@endphp
<img x-data="{ active: 'หน้าแรก' }" src="{{asset('images/coverPage.png')}}" class="w-full md:max-w-[90%] shadow-xl max-h-3xl mx-auto md:rounded-xl">

<div class="flex md:justify-center mt-5 md:mt-8 pb-5 w-full overflow-x-auto whitespace-nowrap"
    x-data="{ active: 'หน้าแรก' }">
    <div class="flex gap-4 bg-white max-md:px-4 px-2 py-2">
        @foreach ($navMenu as $item)
            <a href="{{ asset($item['url']) }}" @click="active = '{{ $item['name'] }}'"
                class="relative px-3 py-2 font-bold  hover:text-[#8a438f] transition"
                :class="active === '{{ $item['name'] }}' ? 'text-[#8a438f] -translate-y-1' : 'text-gray-600'">

                        {{ $item['name'] }}

                        <span class="absolute left-0 -bottom-1 h-[3px] bg-[#8a438f] rounded-full w-full transform scale-x-0 origin-center transition-transform duration-300"
                                :class="window.location.pathname === '{{ $item['url'] }}' ? 'scale-x-100' : ''"></span>
                    </a>
        @endforeach
    </div>
</div>