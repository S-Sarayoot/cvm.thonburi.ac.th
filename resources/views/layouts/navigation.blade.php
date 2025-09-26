<nav x-data="{ open: false }" class="sticky top-0 bg-white z-50 shadow-md mb-2">
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
                <button class="md:ml-3 flex items-center" @click="window.location.href='/'">
                        <img src="{{asset('/images/logo.png')}}" alt="CVM Logo" class="max-md:size-8 size-10 md:ml-3">
                        <div class="md:ml-4 ml-2">
                            <!-- name website -->
                            <h1 class="text-[#8a438f] max-md:text-xl text-2xl text-start font-bold">CVM - Thonburi Vocational College</h1>
                            <h2 class="text-base max-md:hidden font-semibold text-start text-[#511655]">ระบบคลังปัญญาอาชีวศึกษา สาขาวิชาวิจิตรศิลป์</h2>
                        </div>
                </button>
            </div>
           <div class="max-md:hidden">
                <form class="max-w-sm min-w-[200px]">
                    <div class="relative flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="absolute w-5 h-5 top-1.5 left-3 text-slate-600">
                            <path fill-rule="evenodd"
                                d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                clip-rule="evenodd" />
                        </svg>
                        <input
                            class="ml-2 w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md pl-7 py-1 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-md focus:shadow"
                            placeholder="serch" />
                        <button
                            class="rounded-md bg-[#8a438f] py-1 px-2 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg hover:bg-purple-700 ml-2"
                            type="submit">
                            Search
                        </button>
                    </div>
                </form>
           </div>
        </div>       
        <div class="flex flex-col  bg-white rounded-br-lg shadow-md hover:shadow-xl fixed " x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-2">
            <ul>
                <li class="px-12 py-4 cursor-pointer flex items-center md:hidden">
                        <form class="max-w-sm min-w-[200px]">
                            <div class="relative flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="absolute w-5 h-5 top-1.5 left-3 text-slate-600">
                                    <path fill-rule="evenodd"
                                        d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <input
                                    class="ml-2 w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md pl-7 py-1 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-md focus:shadow"
                                    placeholder="serch" />
                                <button
                                    class="rounded-md bg-[#8a438f] py-1 px-2 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg hover:bg-purple-700 ml-2"
                                    type="submit">
                                    Search
                                </button>
                            </div>
                        </form>
                </li>
                <li class="px-12 text-center py-4 hover:bg-[#8a438f]/20 cursor-pointer text-sm flex items-center" @click="{{ route('welcome') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="size-6 mr-1" viewBox="0 0 24 24">
                        <path
                            d="M 12 2 A 1 1 0 0 0 11.289062 2.296875 L 1.203125 11.097656 A 0.5 0.5 0 0 0 1 11.5 A 0.5 0.5 0 0 0 1.5 12 L 4 12 L 4 20 C 4 20.552 4.448 21 5 21 L 9 21 C 9.552 21 10 20.552 10 20 L 10 14 L 14 14 L 14 20 C 14 20.552 14.448 21 15 21 L 19 21 C 19.552 21 20 20.552 20 20 L 20 12 L 22.5 12 A 0.5 0.5 0 0 0 23 11.5 A 0.5 0.5 0 0 0 22.796875 11.097656 L 12.716797 2.3027344 A 1 1 0 0 0 12.710938 2.296875 A 1 1 0 0 0 12 2 z">
                        </path>
                    </svg>
                        หน้าแรก
                </li>
                <li class="px-12 text-center py-4 hover:bg-[#8a438f]/20 cursor-pointer rounded-tr-lg text-sm flex items-center"
                    @click="window.location.href='{{ route('login') }}'">
                    <img class="size-6 mr-1" src="https://img.icons8.com/ios-glyphs/30/login-rounded-right--v1.png"
                    alt="login-rounded-right--v1" />
                    เข้าสู่ระบบ
                </li>
                <a href="https://www.facebook.com/profile.php?id=61576289300532" target="_blank" rel="noopener">
                    <li class="px-12 text-center py-4 hover:bg-[#8a438f]/20 text-[#039be5] flex items-center cursor-pointer text-sm" @click="{{ route('welcome') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="size-6 mr-1" viewBox="0 0 48 48">
                            <path fill="#039be5" d="M24 5A19 19 0 1 0 24 43A19 19 0 1 0 24 5Z"></path>
                            <path fill="#fff"
                                d="M26.572,29.036h4.917l0.772-4.995h-5.69v-2.73c0-2.075,0.678-3.915,2.619-3.915h3.119v-4.359c-0.548-0.074-1.707-0.236-3.897-0.236c-4.573,0-7.254,2.415-7.254,7.917v3.323h-4.701v4.995h4.701v13.729C22.089,42.905,23.032,43,24,43c0.875,0,1.729-0.08,2.572-0.194V29.036z">
                            </path>
                        </svg>
                        Facebook
                    </li>
                </a>
                <a href="https://www.tiktok.com/@thonburi1938?_t=8rP8x1Ydr2m&_r=1&fbclid=IwY2xjawJ2tSZleHRuA2FlbQIxMABicmlkETAzU1lMNmhiblNJdG5yMWlTAR4R0HYJX6QKtBEZIpa5wtEov_pszgCw1yOhrZl2S8-j0EG1Vg35iDMcmHzEng_aem_1g4K386Nvh_pkbsvCsnHBw"
                    target="_blank" rel="noopener">
                    <li class="px-12 text-center py-4 text-[#5b3a5b] flex items-center hover:bg-[#8a438f]/20 cursor-pointer text-sm" @click="{{ route('welcome') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="size-6 mr-1" viewBox="0 0 30 30">
                            <path
                                d="M24,4H6C4.895,4,4,4.895,4,6v18c0,1.105,0.895,2,2,2h18c1.105,0,2-0.895,2-2V6C26,4.895,25.104,4,24,4z M22.689,13.474 c-0.13,0.012-0.261,0.02-0.393,0.02c-1.495,0-2.809-0.768-3.574-1.931c0,3.049,0,6.519,0,6.577c0,2.685-2.177,4.861-4.861,4.861 C11.177,23,9,20.823,9,18.139c0-2.685,2.177-4.861,4.861-4.861c0.102,0,0.201,0.009,0.3,0.015v2.396c-0.1-0.012-0.197-0.03-0.3-0.03 c-1.37,0-2.481,1.111-2.481,2.481s1.11,2.481,2.481,2.481c1.371,0,2.581-1.08,2.581-2.45c0-0.055,0.024-11.17,0.024-11.17h2.289 c0.215,2.047,1.868,3.663,3.934,3.811V13.474z">
                            </path>
                        </svg>
                        Tiktok
                    </li>
                </a>
                <a href="https://www.youtube.com/@%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%8A%E0%B8%B2%E0%B8%AA%E0%B8%B1%E0%B8%A1%E0%B8%9E%E0%B8%B1%E0%B8%99%E0%B8%98%E0%B9%8C%E0%B8%AD%E0%B8%B2%E0%B8%8A%E0%B8%B5%E0%B8%A7%E0%B8%B0%E0%B8%98%E0%B8%99%E0%B8%AF"
                     target="_blank" rel="noopener">
                    <li class="px-12 text-center py-4 hover:bg-[#8a438f]/20 text-red-600 flex items-center cursor-pointer rounded-br-lg" @click="{{ route('welcome') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="size-6 mr-1" viewBox="0 0 48 48">
                            <path fill="#FF3D00"
                                d="M43.2,33.9c-0.4,2.1-2.1,3.7-4.2,4c-3.3,0.5-8.8,1.1-15,1.1c-6.1,0-11.6-0.6-15-1.1c-2.1-0.3-3.8-1.9-4.2-4C4.4,31.6,4,28.2,4,24c0-4.2,0.4-7.6,0.8-9.9c0.4-2.1,2.1-3.7,4.2-4C12.3,9.6,17.8,9,24,9c6.2,0,11.6,0.6,15,1.1c2.1,0.3,3.8,1.9,4.2,4c0.4,2.3,0.9,5.7,0.9,9.9C44,28.2,43.6,31.6,43.2,33.9z">
                            </path>
                            <path fill="#FFF" d="M20 31L20 17 32 24z"></path>
                        </svg>
                        Youtube
                    </li>
                </a>
            </ul>
        </div>
        
    </div>
</nav>
