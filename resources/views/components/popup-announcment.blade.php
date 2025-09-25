<div x-data="{ open: open }" x-show="open"
    class="fixed inset-0 bg-black/50 flex items-center justify-center z-50" x-cloak>

    <div class="max-w-xl text-center relative">
        <button @click="open = false" class="absolute top-2 bg-white/40 px-2 rounded-md right-2 text-white hover:text-red-500 text-xl font-bold">
            ✕
        </button>
        <!-- ปุ่มปิด -->

        {{ $slot }}
    </div>
</div>