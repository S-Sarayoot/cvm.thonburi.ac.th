<x-popup-announcment>
    <div class="flex flex-col items-end">
        <img src="{{ asset('images/announcment.png') }}" alt="ประกาศ" class="w-full h-auto rounded-lg shadow-lg">
        <a href="#" class="group inline-flex px-6 py-3 w-fit my-2 rounded-lg 
        bg-gradient-to-r from-purple-700 to-[#891f71] text-white font-semibold 
                        transition-transform ease-in-out duration-300 shadow-lg hover:scale-[105%]
                        hover:from-[#891f71] hover:to-purple-700 hover:shadow-xl">
            ดูรายละเอียด
            <span class="ml-2 font-bold transform transition-transform duration-300 group-hover:translate-x-2">→</span>
        </a>
    </div>
   </x-popup-announcment>

                @include('components.content-announcment')
                @include('components.content-popular')

        <!-- Fix it center section -->
      
                <!-- ข่าวที่เกี่ยวข้อง -->
                    <div class="p-6 md:px-4 mt-6">
                        <div class="flex justify-between items-center mb-2">
                            <h2 class="text-lg text-[#8a438f] font-semibold my-4">เพิ่มใหม่ล่าสุด</h2>
                            <button class="group cursor-pointer border inline-flex border-[#8a438f] px-4 py-2 text-xs text-[#8a438f] rounded-full shadow-md transition-transform duration-300 hover:bg-[#8a438f] hover:text-white ">
                                READ MORE
                                <span class="pl-2 transition-transform transform duration-300 group-hover:translate-x-2">>></span>
                            </button>
                        </div>
                        <div class="bg-white rounded-xl border border-gray-100 p-2 divide-y divide-gray-200 shadow-lg shadow-[#8a438f]/20 ">
                            <!-- ข่าวที่เกี่ยวข้อง 1 -->
                            <div class="flex items-center gap-3 py-3 group cursor-pointer">
                                <img src="{{ asset('images/bg1.jpg') }}" alt="ข่าว" class="w-16 h-12 object-cover rounded-lg">
                                <div class="flex-1">
                                    <div class="font-bold text-gray-800 text-sm">ร่วมสร้างอนาคต เพื่อชุมชนที่ยั่งยืน</div>
                                    <div class="text-gray-400 text-xs flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-7 4h4" /></svg>18/08/2568/10:21:57 <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>0</div>
                                </div>
                                <a href="#" class="text-blue-500 hover:text-blue-700 mr-4 transition-tranform transform duration-300 group-hover:translate-x-1"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg></a>
                            </div>
                            <!-- ข่าวที่เกี่ยวข้อง 2 -->
                            <div class="flex items-center gap-3 py-3 group cursor-pointer">
                                <img src="{{ asset('images/434557222_950193557109591_3378711655233104696_n.jpg') }}" alt="ข่าว" class="w-16 h-12 object-cover rounded-lg">
                                <div class="flex-1">
                                    <div class="font-bold text-gray-800 text-sm">วท.สารภี ช่วยเหลือผู้ประสบภัยน้ำท่วม "น่าน"</div>
                                    <div class="text-gray-400 text-xs flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-7 4h4" /></svg>14/08/2568/16:44:53 <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>0</div>
                                </div>
                                <a href="#" class="text-blue-500 hover:text-blue-700 mr-4 transition-tranform transform duration-300 group-hover:translate-x-1"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg></a>
                            </div>
                            <!-- ข่าวที่เกี่ยวข้อง 3 -->
                            <div class="flex items-center gap-3 py-3 group cursor-pointer">
                                <img src="{{ asset('images/bg4.jpg') }}" alt="ข่าว" class="w-16 h-12 object-cover rounded-lg">
                                <div class="flex-1">
                                    <div class="font-bold text-gray-800 text-sm">ปัง !! วิทยากร อบรมการแปรรูปเห็ดเพิ่มมูลค่า</div>
                                    <div class="text-gray-400 text-xs flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-7 4h4" /></svg>16/08/2568/07:17:40 <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>0</div>
                                </div>
                                <a href="#" class="text-blue-500 hover:text-blue-700 mr-4 transition-tranform transform duration-300 group-hover:translate-x-1"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg></a>
                            </div>
                            <!-- ข่าวที่เกี่ยวข้อง 4 -->
                            <div class="flex items-center gap-3 py-3 group cursor-pointer">
                                <img src="{{ asset('images/badge1.jpg') }}" alt="ข่าว" class="w-16 h-12 object-cover rounded-lg">
                                <div class="flex-1">
                                    <div class="font-bold text-gray-800 text-sm">ปัง !! วิทยากร อบรมการแปรรูปเห็ดเพิ่มมูลค่า</div>
                                    <div class="text-gray-400 text-xs flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-7 4h4" /></svg>16/08/2568/07:17:40 <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>0</div>
                                </div>
                                <a href="#" class="text-blue-500 hover:text-blue-700 mr-4 transition-tranform transform duration-300 group-hover:translate-x-1"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg></a>
                            </div>
                        </div>
                    </div>
        <div>
            @include('components.content-project')
            @include('components.content-artwork')
        </div>


        <div class="max-w-7xl mx-auto px-4 py-8">
            <!-- ลิงก์ที่เป็นประโยชน์ -->
            <h2 class="text-xl font-bold text-gray-700 mb-4 ">ลิงก์ที่เป็นประโยชน์</h2>
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
        </div>
        <!-- ...existing code... -->

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