<nav x-data="{ open: false }" class="bg-white shadow mx-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Top bar -->
        <div class="flex justify-between items-center py-4">
            <!-- Hamburger (mobile) -->
            <div class="flex items-center">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-[#8a438f] hover:bg-[#f3eaf6] focus:outline-none transition">
                    <svg class="h-7 w-7" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- Social icons -->
            <div class="flex gap-4 items-center">
                <a href="https://www.facebook.com/thonburivocationalcollege" class="text-blue-600" target="_blank" rel="noopener">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="32"
                    height="32"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    >
                    <path d="M18 2a1 1 0 0 1 .993 .883l.007 .117v4a1 1 0 0 1 -.883 .993l-.117 .007h-3v1h3a1 1 0 0 1 .991 1.131l-.02 .112l-1 4a1 1 0 0 1 -.858 .75l-.113 .007h-2v6a1 1 0 0 1 -.883 .993l-.117 .007h-4a1 1 0 0 1 -.993 -.883l-.007 -.117v-6h-2a1 1 0 0 1 -.993 -.883l-.007 -.117v-4a1 1 0 0 1 .883 -.993l.117 -.007h2v-1a6 6 0 0 1 5.775 -5.996l.225 -.004h3z" />
                    </svg>

                </a>
                <a href="https://www.tiktok.com/@thonburi1938?_t=8rP8x1Ydr2m&_r=1&fbclid=IwY2xjawJ2tSZleHRuA2FlbQIxMABicmlkETAzU1lMNmhiblNJdG5yMWlTAR4R0HYJX6QKtBEZIpa5wtEov_pszgCw1yOhrZl2S8-j0EG1Vg35iDMcmHzEng_aem_1g4K386Nvh_pkbsvCsnHBw" class="text-[#5b3a5b]" target="_blank" rel="noopener">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="32"
                    height="32"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    >
                    <path d="M16.083 2h-4.083a1 1 0 0 0 -1 1v11.5a1.5 1.5 0 1 1 -2.519 -1.1l.12 -.1a1 1 0 0 0 .399 -.8v-4.326a1 1 0 0 0 -1.23 -.974a7.5 7.5 0 0 0 1.73 14.8l.243 -.005a7.5 7.5 0 0 0 7.257 -7.495v-2.7l.311 .153c1.122 .53 2.333 .868 3.59 .993a1 1 0 0 0 1.099 -.996v-4.033a1 1 0 0 0 -.834 -.986a5.005 5.005 0 0 1 -4.097 -4.096a1 1 0 0 0 -.986 -.835z" />
                    </svg>
                </a>
                <a href="https://www.youtube.com/@%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%8A%E0%B8%B2%E0%B8%AA%E0%B8%B1%E0%B8%A1%E0%B8%9E%E0%B8%B1%E0%B8%99%E0%B8%98%E0%B9%8C%E0%B8%AD%E0%B8%B2%E0%B8%8A%E0%B8%B5%E0%B8%A7%E0%B8%B0%E0%B8%98%E0%B8%99%E0%B8%AF" class="text-red-600"  target="_blank" rel="noopener">  
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="32"
                    height="32"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    >
                    <path d="M18 3a5 5 0 0 1 5 5v8a5 5 0 0 1 -5 5h-12a5 5 0 0 1 -5 -5v-8a5 5 0 0 1 5 -5zm-9 6v6a1 1 0 0 0 1.514 .857l5 -3a1 1 0 0 0 0 -1.714l-5 -3a1 1 0 0 0 -1.514 .857z" />
                    </svg>
                </a>
            </div>
        </div>
        <!-- Logo & Title -->
        <div class="flex flex-col items-center py-2">
            <div class="flex items-center justify-center">
                {{-- <img src="{{ asset('images/FMH_Brandmark_TRANSPARENT-100x100.png') }}" alt="Logo" class="h-20 w-20 rounded-full mr-4"> --}}
                
                <div>
                    <div class="text-5xl font-extrabold tracking-wide" style="color:#8a438f">CVM - Thonburi Vocational College</div>
                    <div class="border-b-4 w-32 mx-auto mt-2" style="border-color:#891f71"></div>
                    <div class="text-lg font-bold mt-2" style="color:#5b3a5b">ศูนย์บริหารเครือข่ายการผลิตและพัฒนากำลังคนอาชีวศึกษา</div>
                </div>
            </div>
        </div>
        <!-- Navigation Pills -->
        <div class="flex justify-center mt-6 pb-8">
            <div class="flex gap-2 bg-white px-2 py-2">
                <a href="#" class="px-6 py-2 rounded-full font-bold text-[#8a438f] bg-white shadow hover:bg-[#f3eaf6] transition border-b-4" style="border-color:#891f71">HOME</a>
                <a href="#" class="px-6 py-2 rounded-full font-bold text-[#5b3a5b] hover:bg-[#f3eaf6] transition">NEWS</a>
                <a href="#" class="px-6 py-2 rounded-full font-bold text-[#891f71] hover:bg-[#f3eaf6] transition">FIX IT CENTER</a>
                <a href="#" class="px-6 py-2 rounded-full font-bold text-[#740f65] hover:bg-[#f3eaf6] transition">EXCELLENT</a>
                <a href="#" class="px-6 py-2 rounded-full font-bold text-[#5d1d5a] hover:bg-[#f3eaf6] transition">COURSE</a>
                <a href="#" class="px-6 py-2 rounded-full font-bold text-[#8a438f] hover:bg-[#f3eaf6] transition">TRAINING</a>
                <a href="#" class="px-6 py-2 rounded-full font-bold text-[#5b3a5b] hover:bg-[#f3eaf6] transition">PARTICIPATION</a>
                <a href="#" class="px-6 py-2 rounded-full font-bold text-[#891f71] hover:bg-[#f3eaf6] transition">HONOR</a>
            </div>
        </div>
    </div>
</nav>
