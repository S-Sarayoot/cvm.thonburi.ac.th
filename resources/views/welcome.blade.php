<x-guest-layout>
    
    <!-- Slideshow -->
    <!-- @php 
        $media = [
            ['type' => 'image', 'src' => asset('images/376735713_807586581370290_6796713522220613_n.jpg'), 'title' => 'Hightlight'],
            ['type' => 'image', 'src' => asset('images/434557222_950193557109591_3378711655233104696_n.jpg'), 'title' => 'NEWS'],
            ['type' => 'image', 'src' => asset('images/492100975_1254160710046206_6786612580126185154_n.jpg'), 'title' => 'HONOR'],
            ['type' => 'image', 'src' => asset('images/501342751_122110225562876310_5305664896280807316_n.jpg'), 'title' => 'HONOR'],
        ];
    @endphp
    <section class="w-full flex justify-center mb-14">
            <div id="slideshow" class="w-full relative overflow-hidden rounded-3xl shadow-2xl bg-white border-2 border-indigo-100">
                @foreach($media as $index => $item)
                    <div class="slide {{ $index === 0 ? 'block' : 'hidden' }}" data-index="{{ $index }}">
                        @if($item['type'] === 'image')
                            <img src="{{ $item['src'] }}" alt="{{ $item['title'] }}" class="w-full h-[500px] object-cover rounded-3xl">
                        @endif
                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-gray-900/80 to-transparent text-white p-6 text-xl font-bold text-center rounded-b-3xl">{{ $item['title'] }}</div>
                    </div>
                @endforeach
                <button id="prevBtn" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-indigo-100 text-indigo-700 font-bold rounded-full px-4 py-3 shadow-lg transition">&#8592;</button>
                <button id="nextBtn" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-indigo-100 text-indigo-700 font-bold rounded-full px-4 py-3 shadow-lg transition">&#8594;</button>
            </div>
    </section> -->
   <x-popup-announcment wire:model="showPopup">
    <img src="{{ asset('images/announcment.png') }}" alt="ประกาศ" class="w-full h-auto mb-4 rounded-lg shadow-lg">
    <a href="#" class="px-6 py-3 rounded-lg bg-gradient-to-r from-purple-500 to-[#8a438f] text-white font-semibold hover:bg-purple-700 transition">
        ดูรายละเอียด
    </a>
   </x-popup-announcment>


    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- ข่าวเด่น -->
        <div class="flex items-center gap-2 mb-4">
            <span class="bg-[#8a438f] rounded-full p-2 text-white"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.364-6.364l-1.414 1.414M6.05 17.95l-1.414 1.414M17.95 17.95l-1.414-1.414M6.05 6.05L4.636 7.464" /></svg></span>
            <h2 class="text-2xl font-bold" style="color:#8a438f">ข่าวเด่น</h2>
            <div class="ml-auto flex gap-2">
                <button class="bg-gray-200 rounded p-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"><path d="M4 3a2 2 0 00-2 2v2a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm0 8a2 2 0 00-2 2v2a2 2 0 002 2h12a2 2 0 002-2v-2a2 2 0 00-2-2H4z" /></svg></button>
                <button class="bg-gray-200 rounded p-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"><path d="M4 3h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2V5a2 2 0 012-2zm0 8h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2a2 2 0 012-2z" /></svg></button>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- ข่าวเด่น 1 -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col hover:scale-[1.03] transition border border-gray-100 relative">
                <img src="{{ asset('images/376735713_807586581370290_6796713522220613_n.jpg') }}" alt="ข่าวเด่น" class="w-full h-48 object-cover">
                <span class="absolute top-4 left-4 bg-[#891f71] text-white text-xs font-bold px-3 py-1 rounded-full shadow">★ FEATURED</span>
                <div class="p-4 flex-1 flex flex-col">
                    <div class="font-bold text-lg text-gray-800 mb-2">เปิดโลกแห่งการเรียนรู้ด้านวิทยาศาสตร์และ...</div>
                    <div class="text-gray-500 text-sm mb-2">วันที่ 2 กันยายน 2568 ภายใต้การสนับสนุนของ ดร.ทรงวุฒิ เรือนไทย ผู้จำ...</div>
                    <div class="flex items-center gap-4 mt-auto">
                        <span class="flex items-center gap-1 text-blue-600 text-xs"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>2</span>
                        <button class="text-gray-400 hover:text-gray-600"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></button>
                    </div>
                </div>
            </div>
            <!-- ข่าวเด่น 2 -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col hover:scale-[1.03] transition border border-gray-100 relative">
                <img src="{{ asset('images/434557222_950193557109591_3378711655233104696_n.jpg') }}" alt="ข่าวเด่น" class="w-full h-48 object-cover">
                <div class="p-4 flex-1 flex flex-col">
                    <div class="font-bold text-lg text-gray-800 mb-2">อาชีวะอุบลฯ จัดโครงการ Day Camp และ...</div>
                    <div class="text-gray-500 text-sm mb-2">วันที่ 20 สิงหาคม 2568 วิทยาลัยอาชีวศึกษาอุบลราชธานี นำโดย นางสาวลาภกา...</div>
                    <div class="flex items-center gap-4 mt-auto">
                        <span class="flex items-center gap-1 text-blue-600 text-xs"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>1</span>
                        <button class="text-gray-400 hover:text-gray-600"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></button>
                    </div>
                </div>
            </div>
            <!-- ข่าวเด่น 3 -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col hover:scale-[1.03] transition border border-gray-100 relative">
                <img src="{{ asset('images/501342751_122110225562876310_5305664896280807316_n.jpg') }}" alt="ข่าวเด่น" class="w-full h-48 object-cover">
                <div class="p-4 flex-1 flex flex-col">
                    <div class="font-bold text-lg text-gray-800 mb-2">วันคล้ายวันสถาปนา สอศ. ครบรอบ 84 ปี</div>
                    <div class="text-gray-500 text-sm mb-2">วันอังคารที่ 19 สิงหาคม 2568 นายสุรศักดิ์ แก้วหีด ผู้อำนวยการวิทยา...</div>
                    <div class="flex items-center gap-4 mt-auto">
                        <span class="flex items-center gap-1 text-blue-600 text-xs"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>4</span>
                        <button class="text-gray-400 hover:text-gray-600"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center mb-8">
            <a href="#" class="bg-[#8a438f] hover:bg-[#5b3a5b] text-white font-bold px-8 py-3 rounded-full shadow flex items-center gap-2 text-lg"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-7 4h4" /></svg>ดูข่าวทั้งหมด <span class="ml-1">→</span></a>
        </div>

        <!-- Fix it center section -->
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="mb-8">
                <h1 class="text-4xl font-extrabold mb-2 tracking-tight" style="color:#891f71">Fix it center <span class="inline-block align-middle border-b-4" style="border-color:#5d1d5a;ml-2;width:8rem"></span></h1>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- ข่าวหลัก -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col border border-gray-100 relative">
                    <img src="{{ asset('images/bg6.jpg') }}" alt="Fix it center" class="w-full h-64 object-cover">
                    <div class="p-6 flex-1 flex flex-col">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="bg-[#5b3a5b] text-white text-xs font-bold px-3 py-1 rounded-full shadow">ข่าวหลัก</span>
                        </div>
                        <div class="font-bold text-xl text-gray-800 mb-2">กาญฯ นคร ร่วมฉลอง 84 ปีอาชีวศึกษา</div>
                        <div class="text-gray-500 text-sm mb-4">วิทยาลัยเทคนิคกาญจนาภิเษก มหานคร เข้าร่วมกิจกรรมเฉลิมฉลอง พร้อมจัดหน่วยบริการประชาชน Fix it Center เนื่องในโอกาสครบรอบปี...</div>
                        <div class="flex items-center gap-4 mt-auto">
                            <span class="flex items-center gap-1 text-blue-600 text-xs"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>44</span>
                            <span class="flex items-center gap-1 text-green-500 text-xs"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></span>
                        </div>
                    </div>
                </div>
                <!-- ข่าวที่เกี่ยวข้อง -->
                <div class="bg-gradient-to-br from-[#8a438f] to-[#5b3a5b] rounded-2xl shadow-xl overflow-hidden flex flex-col border border-gray-100 relative">
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="bg-white text-[#8a438f] rounded-lg"><span class="text-lg font-bold px-3 py-1 rounded-full shadow flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" /></svg>ข่าวที่เกี่ยวข้อง</span></span>
                            <span class="text-white text-sm">4 รายการ</span>
                            <button class="ml-auto text-white hover:text-gray-200"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v16m16-16v16" /></svg></button>
                        </div>
                        <div class="bg-white rounded-xl shadow p-2 divide-y divide-gray-200">
                            <!-- ข่าวที่เกี่ยวข้อง 1 -->
                            <div class="flex items-center gap-3 py-3">
                                <img src="{{ asset('images/bg1.jpg') }}" alt="ข่าว" class="w-16 h-12 object-cover rounded-lg">
                                <div class="flex-1">
                                    <div class="font-bold text-gray-800 text-sm">ร่วมสร้างอนาคต เพื่อชุมชนที่ยั่งยืน</div>
                                    <div class="text-gray-400 text-xs flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-7 4h4" /></svg>18/08/2568/10:21:57 <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>0</div>
                                </div>
                                <a href="#" class="text-blue-500 hover:text-blue-700"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg></a>
                            </div>
                            <!-- ข่าวที่เกี่ยวข้อง 2 -->
                            <div class="flex items-center gap-3 py-3">
                                <img src="{{ asset('images/434557222_950193557109591_3378711655233104696_n.jpg') }}" alt="ข่าว" class="w-16 h-12 object-cover rounded-lg">
                                <div class="flex-1">
                                    <div class="font-bold text-gray-800 text-sm">วท.สารภี ช่วยเหลือผู้ประสบภัยน้ำท่วม "น่าน"</div>
                                    <div class="text-gray-400 text-xs flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-7 4h4" /></svg>14/08/2568/16:44:53 <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>0</div>
                                </div>
                                <a href="#" class="text-blue-500 hover:text-blue-700"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg></a>
                            </div>
                            <!-- ข่าวที่เกี่ยวข้อง 3 -->
                            <div class="flex items-center gap-3 py-3">
                                <img src="{{ asset('images/bg4.jpg') }}" alt="ข่าว" class="w-16 h-12 object-cover rounded-lg">
                                <div class="flex-1">
                                    <div class="font-bold text-gray-800 text-sm">ปัง !! วิทยากร อบรมการแปรรูปเห็ดเพิ่มมูลค่า</div>
                                    <div class="text-gray-400 text-xs flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-7 4h4" /></svg>16/08/2568/07:17:40 <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>0</div>
                                </div>
                                <a href="#" class="text-blue-500 hover:text-blue-700"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg></a>
                            </div>
                            <!-- ข่าวที่เกี่ยวข้อง 4 -->
                            <div class="flex items-center gap-3 py-3">
                                <img src="{{ asset('images/badge1.jpg') }}" alt="ข่าว" class="w-16 h-12 object-cover rounded-lg">
                                <div class="flex-1">
                                    <div class="font-bold text-gray-800 text-sm">ปัง !! วิทยากร อบรมการแปรรูปเห็ดเพิ่มมูลค่า</div>
                                    <div class="text-gray-400 text-xs flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-7 4h4" /></svg>16/08/2568/07:17:40 <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>0</div>
                                </div>
                                <a href="#" class="text-blue-500 hover:text-blue-700"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg></a>
                            </div>
                        </div>
                        <div class="flex justify-center mt-4">

                            <a href="#" class="flex items-center bg-white font-bold px-8 py-3 rounded-full shadow gap-2 text-lg" style="color:#8a438f;border-color:#8a438f" class="font-bold px-8 py-3 rounded-full shadow flex items-center gap-2 text-lg border hover:bg-[#f3eaf6]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                                ดูข่าวเพิ่มเติม 
                                <span class="ml-1">→</span>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ข่าวล่าสุด -->
        <div class="flex items-center gap-2 mb-4">
            <span class="bg-[#5d1d5a] rounded-full p-2 text-white"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.364-6.364l-1.414 1.414M6.05 17.95l-1.414 1.414M17.95 17.95l-1.414-1.414M6.05 6.05L4.636 7.464" /></svg></span>
            <h2 class="text-xl font-bold" style="color:#5d1d5a">ข่าวล่าสุด</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- ข่าวล่าสุด 1 -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col hover:scale-[1.03] transition border border-gray-100 relative">
                <img src="{{ asset('images/bg1.jpg') }}" alt="ข่าวล่าสุด" class="w-full h-48 object-cover">
                <div class="p-4 flex-1 flex flex-col">
                    <div class="font-bold text-lg text-gray-800 mb-2">จิตอาสาช่วยผู้ประสบอุทกภัยจังหวัดน่าน</div>
                    <div class="text-gray-500 text-sm mb-2">กิจกรรมช่วยเหลือผู้ประสบภัยน้ำท่วมโดยนักศึกษาอาชีวะ</div>
                    <div class="flex items-center gap-4 mt-auto">
                        <span class="flex items-center gap-1 text-blue-600 text-xs"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>5</span>
                        <button class="text-gray-400 hover:text-gray-600"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></button>
                    </div>
                </div>
            </div>
            <!-- ข่าวล่าสุด 2 -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col hover:scale-[1.03] transition border border-gray-100 relative">
                <img src="{{ asset('images/bg2.jpg') }}" alt="ข่าวล่าสุด" class="w-full h-48 object-cover">
                <div class="p-4 flex-1 flex flex-col">
                    <div class="font-bold text-lg text-gray-800 mb-2">ร่วมสร้างอนาคต เพื่อชุมชนที่ยั่งยืน</div>
                    <div class="text-gray-500 text-sm mb-2">โครงการพัฒนาชุมชนโดยนักศึกษาอาชีวะ</div>
                    <div class="flex items-center gap-4 mt-auto">
                        <span class="flex items-center gap-1 text-blue-600 text-xs"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>3</span>
                        <button class="text-gray-400 hover:text-gray-600"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></button>
                    </div>
                </div>
            </div>
            <!-- ข่าวล่าสุด 3 -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col hover:scale-[1.03] transition border border-gray-100 relative">
                <img src="{{ asset('images/bg4.jpg') }}" alt="ข่าวล่าสุด" class="w-full h-48 object-cover">
                <div class="p-4 flex-1 flex flex-col">
                    <div class="font-bold text-lg text-gray-800 mb-2">ปัง !! วิทยากร อบรมการแปรรูปเห็ดเพิ่มมูลค่า</div>
                    <div class="text-gray-500 text-sm mb-2">อบรมการแปรรูปเห็ดเพื่อเพิ่มมูลค่าให้กับชุมชน</div>
                    <div class="flex items-center gap-4 mt-auto">
                        <span class="flex items-center gap-1 text-blue-600 text-xs"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>2</span>
                        <button class="text-gray-400 hover:text-gray-600"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center mb-8">
            <a href="#" class="bg-[#8a438f] hover:bg-[#5b3a5b] text-white font-bold px-8 py-3 rounded-full shadow flex items-center gap-2 text-lg"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-7 4h4" /></svg>ดูข่าวล่าสุด <span class="ml-1">→</span></a>
        </div>

        <!-- ข่าวที่เกี่ยวข้อง -->
        <div class="flex items-center gap-2 mb-4">
            <span class="bg-[#891f71] rounded-full p-2 text-white"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" /></svg></span>
            <h2 class="text-xl font-bold" style="color:#891f71">ข่าวที่เกี่ยวข้อง</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- ข่าวที่เกี่ยวข้อง 1 -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col hover:scale-[1.03] transition border border-gray-100 relative">
                <img src="{{ asset('images/bg6.jpg') }}" alt="ข่าวที่เกี่ยวข้อง" class="w-full h-48 object-cover">
                <div class="p-4 flex-1 flex flex-col">
                    <div class="font-bold text-lg text-gray-800 mb-2">เพราะการช่วยเหลือผู้อื่น คือ ภารกิจของเรา วก.ศร</div>
                    <div class="text-gray-500 text-sm mb-2">กิจกรรมช่วยเหลือผู้ประสบภัยน้ำท่วมโดยนักศึกษาอาชีวะ</div>
                    <div class="flex items-center gap-4 mt-auto">
                        <span class="flex items-center gap-1 text-pink-600 text-xs"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>2</span>
                        <button class="text-gray-400 hover:text-gray-600"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></button>
                    </div>
                </div>
            </div>
            <!-- ข่าวที่เกี่ยวข้อง 2 -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col hover:scale-[1.03] transition border border-gray-100 relative">
                <img src="{{ asset('images/badge1.jpg') }}" alt="ข่าวที่เกี่ยวข้อง" class="w-full h-48 object-cover">
                <div class="p-4 flex-1 flex flex-col">
                    <div class="font-bold text-lg text-gray-800 mb-2">วท.สารภี ช่วยเหลือผู้ประสบภัยน้ำท่วม "น่าน"</div>
                    <div class="text-gray-500 text-sm mb-2">กิจกรรมช่วยเหลือผู้ประสบภัยน้ำท่วมโดยนักศึกษาอาชีวะ</div>
                    <div class="flex items-center gap-4 mt-auto">
                        <span class="flex items-center gap-1 text-pink-600 text-xs"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>1</span>
                        <button class="text-gray-400 hover:text-gray-600"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></button>
                    </div>
                </div>
            </div>
            <!-- ข่าวที่เกี่ยวข้อง 3 -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col hover:scale-[1.03] transition border border-gray-100 relative">
                <img src="{{ asset('images/bg2.jpg') }}" alt="ข่าวที่เกี่ยวข้อง" class="w-full h-48 object-cover">
                <div class="p-4 flex-1 flex flex-col">
                    <div class="font-bold text-lg text-gray-800 mb-2">ปึ้ง เมนูพิเศษวันแม่ by อินทนิลจันท์</div>
                    <div class="text-gray-500 text-sm mb-2">กิจกรรมวันแม่โดยนักศึกษาอาชีวะ</div>
                    <div class="flex items-center gap-4 mt-auto">
                        <span class="flex items-center gap-1 text-pink-600 text-xs"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>3</span>
                        <button class="text-gray-400 hover:text-gray-600"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center mb-8">
            <a href="#" class="bg-[#8a438f] hover:bg-[#5b3a5b] text-white font-bold px-8 py-3 rounded-full shadow flex items-center gap-2 text-lg"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-7 4h4" /></svg>ดูข่าวที่เกี่ยวข้อง <span class="ml-1">→</span></a>
        </div>

        <!-- บทความที่เกี่ยวข้อง -->
        <div class="flex items-center gap-2 mb-4">
            <span class="bg-[#740f65] rounded-full p-2 text-white"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.364-6.364l-1.414 1.414M6.05 17.95l-1.414 1.414M17.95 17.95l-1.414-1.414M6.05 6.05L4.636 7.464" /></svg></span>
            <h2 class="text-xl font-bold" style="color:#740f65">บทความที่เกี่ยวข้อง</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- บทความ 1 -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col hover:scale-[1.03] transition border border-gray-100 relative">
                <img src="{{ asset('images/bg4.jpg') }}" alt="บทความ" class="w-full h-48 object-cover">
                <div class="p-4 flex-1 flex flex-col">
                    <div class="font-bold text-lg text-gray-800 mb-2">หลักสูตรระยะสั้น วท.สารภี ออกบริการตัดผมชาย ฟรี</div>
                    <div class="text-gray-500 text-sm mb-2">บริการตัดผมชายฟรีโดยนักศึกษาอาชีวะ</div>
                    <div class="flex items-center gap-4 mt-auto">
                        <span class="flex items-center gap-1 text-green-600 text-xs"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>2</span>
                        <button class="text-gray-400 hover:text-gray-600"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></button>
                    </div>
                </div>
            </div>
            <!-- บทความ 2 -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col hover:scale-[1.03] transition border border-gray-100 relative">
                <img src="{{ asset('images/bg5.jpg') }}" alt="บทความ" class="w-full h-48 object-cover">
                <div class="p-4 flex-1 flex flex-col">
                    <div class="font-bold text-lg text-gray-800 mb-2">วท.สารภี ประชุมวิพากษ์หลักสูตรภาษาจีนเชิงวิชาชีพ</div>
                    <div class="text-gray-500 text-sm mb-2">ประชุมวิพากษ์หลักสูตรภาษาจีนเชิงวิชาชีพ</div>
                    <div class="flex items-center gap-4 mt-auto">
                        <span class="flex items-center gap-1 text-green-600 text-xs"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>1</span>
                        <button class="text-gray-400 hover:text-gray-600"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></button>
                    </div>
                </div>
            </div>
            <!-- บทความ 3 -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col hover:scale-[1.03] transition border border-gray-100 relative">
                <img src="{{ asset('images/bg6.jpg') }}" alt="บทความ" class="w-full h-48 object-cover">
                <div class="p-4 flex-1 flex flex-col">
                    <div class="font-bold text-lg text-gray-800 mb-2">อาชีวะอุบลฯพัฒนาบุคลิกภาพอบรมลีลาศขั้นพื้นฐาน</div>
                    <div class="text-gray-500 text-sm mb-2">อบรมลีลาศขั้นพื้นฐานโดยนักศึกษาอาชีวะ</div>
                    <div class="flex items-center gap-4 mt-auto">
                        <span class="flex items-center gap-1 text-green-600 text-xs"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>3</span>
                        <button class="text-gray-400 hover:text-gray-600"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center mb-8">
            <a href="#" class="bg-[#8a438f] hover:bg-[#5b3a5b] text-white font-bold px-8 py-3 rounded-full shadow flex items-center gap-2 text-lg"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-7 4h4" /></svg>ดูบทความเพิ่มเติม <span class="ml-1">→</span></a>
        </div>

        <!-- วิดีโอเด่นๆ โมเดิร์น (Glassmorphism + Gradient + Floating Play) -->
        <!-- วิดีโอ Portfolio โมเดิร์น -->
        <!-- วิดีโอ Portfolio โมเดิร์น (วิดีโอแรกเด่น) -->
        <section class="w-full py-16 px-2 md:px-0 bg-gradient-to-br from-[#191024] via-[#2d183a] to-[#5b3a5b] rounded-3xl shadow-2xl mb-16">
            <div class="max-w-6xl mx-auto">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-10">
                    <div class="flex gap-8 items-center justify-center md:justify-start">
                        <div class="flex flex-col items-center">
                            <span class="bg-[#8a438f] rounded-full p-4 mb-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0 1 21 8.618v6.764a1 1 0 0 1-1.447.894L15 14M4 6v12" /></svg></span>
                            <span class="text-white font-bold text-lg">Video Editing</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <span class="bg-[#5b3a5b] rounded-full p-4 mb-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5v14l11-7z" /></svg></span>
                            <span class="text-white font-bold text-lg">Cameraman</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <span class="bg-[#891f71] rounded-full p-4 mb-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" /></svg></span>
                            <span class="text-white font-bold text-lg">Videography</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <span class="bg-[#740f65] rounded-full p-4 mb-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v2m0 14v2m9-9h-2M5 12H3" /></svg></span>
                            <span class="text-white font-bold text-lg">Branding</span>
                        </div>
                    </div>
                    <div class="text-right md:text-left">
                        <div class="text-4xl font-extrabold text-white mb-2">Our Portfolio</div>
                        <div class="text-2xl font-bold text-[#ffb86c] mb-2">Latest Work</div>
                        <div class="text-gray-300 text-lg">วิดีโอแนะนำกิจกรรมและความสำเร็จของวิทยาลัยอาชีวะธนบุรี</div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-8">
                    <!-- วิดีโอแรกเด่น (ใหญ่) -->
                    <div class="md:w-2/3 w-full relative group rounded-2xl overflow-hidden shadow-xl bg-[#231a2e]">
                        <img src="https://img.youtube.com/vi/bJjIMUF1gBc/maxresdefault.jpg" alt="CVM - Thonburi Vocational College" class="w-full h-[400px] object-cover group-hover:scale-105 transition duration-300">
                        <a href="https://www.youtube.com/watch?v=bJjIMUF1gBc" target="_blank" class="absolute inset-0 flex items-center justify-center">
                            <span class="bg-white/80 rounded-full p-7 shadow-lg border-2 border-[#8a438f] flex items-center justify-center group-hover:scale-110 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-[#8a438f]" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </span>
                        </a>
                        <div class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-[#231a2e] via-transparent to-transparent">
                            <div class="font-bold text-white text-2xl mb-2">CVM - Thonburi Vocational College</div>
                            <div class="text-gray-300 text-lg">วิดีโอแนะนำกิจกรรมและความสำเร็จของวิทยาลัยอาชีวะธนบุรี</div>
                        </div>
                    </div>
                    <!-- วิดีโออื่น (grid thumbnails) -->
                    <div class="md:w-1/3 w-full grid grid-cols-1 gap-8">
                        <div class="relative group rounded-2xl overflow-hidden shadow-xl bg-[#231a2e]">
                            <img src="https://img.youtube.com/vi/QwZT7T-TXT0/maxresdefault.jpg" alt="กิจกรรมเด่นประจำปี" class="w-full h-44 object-cover group-hover:scale-105 transition duration-300">
                            <a href="https://www.youtube.com/watch?v=QwZT7T-TXT0" target="_blank" class="absolute inset-0 flex items-center justify-center">
                                <span class="bg-white/80 rounded-full p-5 shadow-lg border-2 border-[#8a438f] flex items-center justify-center group-hover:scale-110 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-[#8a438f]" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </span>
                            </a>
                            <div class="absolute bottom-0 left-0 w-full p-4 bg-gradient-to-t from-[#231a2e] via-transparent to-transparent">
                                <div class="font-bold text-white text-lg mb-1">กิจกรรมเด่นประจำปี</div>
                                <div class="text-gray-300 text-base">ชมกิจกรรมล่าสุดของวิทยาลัย</div>
                            </div>
                        </div>
                        <div class="relative group rounded-2xl overflow-hidden shadow-xl bg-[#231a2e]">
                            <img src="https://img.youtube.com/vi/2Vv-BfVoq4g/maxresdefault.jpg" alt="รางวัลและความสำเร็จ" class="w-full h-44 object-cover group-hover:scale-105 transition duration-300">
                            <a href="https://www.youtube.com/watch?v=2Vv-BfVoq4g" target="_blank" class="absolute inset-0 flex items-center justify-center">
                                <span class="bg-white/80 rounded-full p-5 shadow-lg border-2 border-[#5b3a5b] flex items-center justify-center group-hover:scale-110 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-[#5b3a5b]" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </span>
                            </a>
                            <div class="absolute bottom-0 left-0 w-full p-4 bg-gradient-to-t from-[#231a2e] via-transparent to-transparent">
                                <div class="font-bold text-white text-lg mb-1">รางวัลและความสำเร็จ</div>
                                <div class="text-gray-300 text-base">รวมรางวัลที่ได้รับ</div>
                            </div>
                        </div>
                        <div class="relative group rounded-2xl overflow-hidden shadow-xl bg-[#231a2e]">
                            <img src="https://img.youtube.com/vi/3JZ_D3ELwOQ/maxresdefault.jpg" alt="บรรยากาศการเรียน" class="w-full h-44 object-cover group-hover:scale-105 transition duration-300">
                            <a href="https://www.youtube.com/watch?v=3JZ_D3ELwOQ" target="_blank" class="absolute inset-0 flex items-center justify-center">
                                <span class="bg-white/80 rounded-full p-5 shadow-lg border-2 border-[#891f71] flex items-center justify-center group-hover:scale-110 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-[#891f71]" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </span>
                            </a>
                            <div class="absolute bottom-0 left-0 w-full p-4 bg-gradient-to-t from-[#231a2e] via-transparent to-transparent">
                                <div class="font-bold text-white text-lg mb-1">บรรยากาศการเรียน</div>
                                <div class="text-gray-300 text-base">ดูบรรยากาศในรั้ววิทยาลัย</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-8">
                    <a href="https://www.youtube.com/@user-yt6qg2qg2g/videos" target="_blank" class="px-10 py-4 rounded-full font-bold bg-gradient-to-r from-[#ffb86c] to-[#8a438f] text-[#231a2e] shadow-lg hover:scale-105 transition text-lg">ดูวิดีโออื่นทั้งหมด</a>
                </div>
            </div>
        </section>
        <!-- ลิงก์ที่เป็นประโยชน์ -->
        <h2 class="text-xl font-bold text-gray-700 mb-4">ลิงก์ที่เป็นประโยชน์</h2>
        <div class="flex flex-wrap gap-4 mb-8">
            <a href="#" class="px-6 py-2 rounded-full bg-indigo-50 text-indigo-700 font-bold shadow hover:bg-indigo-100 transition">OVEC DASHBOARD</a>
            <a href="#" class="px-6 py-2 rounded-full bg-indigo-50 text-indigo-700 font-bold shadow hover:bg-indigo-100 transition">DVE</a>
            <a href="#" class="px-6 py-2 rounded-full bg-indigo-50 text-indigo-700 font-bold shadow hover:bg-indigo-100 transition">Fix it Center</a>
            <a href="#" class="px-6 py-2 rounded-full bg-indigo-50 text-indigo-700 font-bold shadow hover:bg-indigo-100 transition">M-OVEC</a>
        </div>

        <!-- ข้อมูลลิขสิทธิ์ -->
        <div class="bg-gray-900 text-white py-8 mt-8 rounded-xl text-center">
            <div class="mb-2 font-bold">ศูนย์กลางข่าวสารและข้อมูลสำคัญ</div>
            <div class="mb-2">© 2025 OVEC NEWS สงวนลิขสิทธิ์</div>
            <div class="mb-2">พัฒนาด้วย ❤️ เพื่อการศึกษาและการเรียนรู้</div>
            <div class="flex gap-4 mt-2 justify-center">
                <a href="#" class="text-blue-400 hover:text-blue-200"><i class="fab fa-facebook fa-lg"></i></a>
                <a href="#" class="text-red-400 hover:text-red-200"><i class="fab fa-youtube fa-lg"></i></a>
                <a href="#" class="text-black hover:text-gray-400"><i class="fab fa-twitter fa-lg"></i></a>
                <a href="#" class="text-green-400 hover:text-green-200"><i class="fas fa-globe fa-lg"></i></a>
            </div>
        </div>
        <!-- ...existing code... -->
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var overlay = document.getElementById('videoOverlay');
            var iframe = document.getElementById('featuredVideo');
            if (overlay && iframe) {
                overlay.addEventListener('click', function() {
                    overlay.style.display = 'none';
                    // Try to play video via YouTube API
                    try {
                        var player;
                        function onYouTubeIframeAPIReady() {
                            player = new YT.Player('featuredVideo');
                            player.playVideo();
                        }
                        if (typeof YT === 'undefined' || typeof YT.Player === 'undefined') {
                            var tag = document.createElement('script');
                            tag.src = "https://www.youtube.com/iframe_api";
                            var firstScriptTag = document.getElementsByTagName('script')[0];
                            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
                            window.onYouTubeIframeAPIReady = onYouTubeIframeAPIReady;
                        } else {
                            player = new YT.Player('featuredVideo');
                            player.playVideo();
                        }
                    } catch (e) {
                        // fallback: just hide overlay
                    }
                });
            }
        });
    </script>
</x-guest-layout>
