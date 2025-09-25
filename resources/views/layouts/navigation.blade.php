<nav x-data="{ open: false }">
    <div>
        <!-- Top bar -->
        <div class="max-md:px-1 px-8 flex justify-between items-center py-3">
            <div class="inline-flex items-center">
                <!-- Hamburger (mobile) -->
                <div class="flex items-center">
                    <button @click="open = ! open" class="inline-flex items-center justify-center py-2 px-2 rounded-md text-[#8a438f] hover:bg-[#f3eaf6] focus:outline-none transition">
                        <svg class="h-5 w-6 md:h-7 md:w-8" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <button class="ml-1 md:ml-3 flex items-center" @click="window.location.href='/cvm.thonburi.ac.th/public/'">
                        <img src="{{ asset('images/logo.png') }}" alt="CVM Logo" class="max-md:size-8 size-10 md:ml-3">
                        <div class="md:ml-4 ml-2">
                            <!-- name website -->
                            <h1 class="text-[#8a438f] max-md:text-xl text-2xl text-start font-bold">CVM - Thonburi Vocational College</h1>
                            <h2 class="text-base max-md:hidden font-semibold text-start text-[#511655]">ระบบคลังปัญญาอาชีวศึกษา สาขาวิชาวิจิตรศิลป์</h2>
                        </div>
                </button>
            </div>

            <!-- Social icons -->
            <div class="flex gap-4 items-center max-md:hidden">
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
        
    </div>
</nav>
