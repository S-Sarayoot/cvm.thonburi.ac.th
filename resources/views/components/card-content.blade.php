@props([
    'id' => null,
    'title' => '',
    'description' => '',
    'category' => null,
    'srcImage' => '',
    'views' => 0,
    'author' => 'ไม่ทราบผู้เผยแพร่',
    'published_at' => null,
])
 
<a href="repository/{{ $id }}">
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col hover:scale-[1.03] transition border border-gray-100 relative">
        <img src="{{ asset($srcImage == '' ? 'https://coffective.com/wp-content/uploads/2018/06/default-featured-image.png.jpg' : $srcImage) }}" alt="{{$category}}" class="w-full h-48 object-cover">
        @if ($category != null)
            <span class="absolute top-4 left-4 bg-[#891f71] text-white text-xs font-bold px-3 py-1 rounded-full shadow">★ {{$category }}</span>
        @endif
        <div class="p-4 flex-1 flex flex-col">
                <span class="flex items-center gap-1 text-blue-600 text-xs">{{ $author }}</span>
            <div class="font-bold text-lg text-gray-800 mb-2 line-clamp-1   ">{{$title}}</div>
            <div class="text-gray-500 text-sm mb-2 line-clamp-3">{{$description}}</div>
            <div class="flex justify-between items-center gap-4 mt-auto">
                <span class="flex items-center gap-1 text-blue-600 text-xs"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>{{$views}}</span>
                <span class="flex items-center gap-1 text-blue-600 text-xs">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" class="fill-blue-600 w-4 h-4"><path d="M320-400q-17 0-28.5-11.5T280-440q0-17 11.5-28.5T320-480q17 0 28.5 11.5T360-440q0 17-11.5 28.5T320-400Zm160 0q-17 0-28.5-11.5T440-440q0-17 11.5-28.5T480-480q17 0 28.5 11.5T520-440q0 17-11.5 28.5T480-400Zm160 0q-17 0-28.5-11.5T600-440q0-17 11.5-28.5T640-480q17 0 28.5 11.5T680-440q0 17-11.5 28.5T640-400ZM200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Z"/></svg>
                    {{$published_at}}
                </span>
                <!-- <button class="text-gray-400 hover:text-gray-600"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></button> -->
            </div>
        </div>
    </div>
</a>