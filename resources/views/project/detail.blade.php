    
<x-guest-layout>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 max-w-7xl mx-auto px-4 py-8 ">
                <section class="lg:col-span-2 bg-blue-300">
                        <h2>กำลังทำ</h2>
                </section>

                <section class="bg-rose-300">
                        <div class="min-h-[10rem] p-6 bg-gradient-to-br from-[#8a438f] to-[#5b3a5b] rounded-2xl shadow-xl overflow-hidden flex flex-col border border-gray-100">
                                <h3 class="text-lg text-white">ความรู้ที่น่าสนใจในหมวดเดียวกัน</h3>
                                <div class="flex flex-col gap-2">
                                        <div class="relative flex bg-white">
                                                <div class="w-[30%]">
                                                        <img src={{asset("images/knowledge_repository/1.jpg")}} alt="">
                                                </div>

                                                <div class="flex flex-col gap-2 w-[70%] p-2">
                                                        <span class="min-w-[1rem] bg-[#891f71] text-white text-xs font-bold px-3 py-1 rounded-full shadow">category</span>
                                                        <h3 class="text-base font-medium">Podcast: ศิลปะกับปรัชญา</h3>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </section>
        </div>
</x-guest-layout>