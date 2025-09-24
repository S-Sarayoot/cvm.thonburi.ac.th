<x-guest-layout>
    @php
    $active     =  $_GET['category'] ?? 'ทั้งหมด';
    $categories = ['ทั้งหมด','วิดีทัศน์','บทความ','คลังภาพ', 'คลังเสียง'];
    $mockupData = [
        ['id'=>1,'category'=>'คลังเสียง','title'=>'Podcast: ศิลปะกับปรัชญา','description'=>'บันทึกเสียงพูดคุยเรื่องศิลปะกับชีวิต','srcImage'=>'images/knowledge_repository/1.jpg','views'=>215,'author'=>'ดร.วิภา','published_at'=>'2025-01-12'],
        ['id'=>2,'category'=>'บทความ','title'=>'การวิจารณ์งานจิตรกรรมร่วมสมัย','description'=>'กรณีศึกษาผลงานนักศึกษาในนิทรรศิลป์','srcImage'=>'images/knowledge_repository/2.jpg','views'=>340,'author'=>'สมชาย ศิลป์สกุล','published_at'=>'2024-12-05'],
        ['id'=>3,'category'=>'วิดีทัศน์','title'=>'Workshop: เทคนิคสีน้ำ','description'=>'คลิปการสาธิตการใช้สีน้ำในงานจิตรกรรม','srcImage'=>'images/knowledge_repository/3.jpg','views'=>890,'author'=>'อ.กิตติ','published_at'=>'2025-02-01'],
        ['id'=>5,'category'=>'คลังภาพ','title'=>'[infographic] - ความรู้พื้นฐานของศิลปะ','description'=>'ความรู้พื้นฐานของศิลปะ','srcImage'=>'images/knowledge_repository/4.jpg','views'=>456,'author'=>'ผู้ดูแลระบบ คลังปัญญาอาชีวศึกษา สาขาวิชาวิจิตรศิลป์','published_at'=>'2024-11-20'],
        ['id'=>1,'category'=>'คลังเสียง','title'=>'Podcast: ศิลปะกับปรัชญา','description'=>'บันทึกเสียงพูดคุยเรื่องศิลปะกับชีวิต','srcImage'=>'images/knowledge_repository/1.jpg','views'=>215,'author'=>'ดร.วิภา','published_at'=>'2025-01-12'],
        ['id'=>2,'category'=>'บทความ','title'=>'การวิจารณ์งานจิตรกรรมร่วมสมัย','description'=>'กรณีศึกษาผลงานนักศึกษาในนิทรรศิลป์','srcImage'=>'images/knowledge_repository/2.jpg','views'=>340,'author'=>'สมชาย ศิลป์สกุล','published_at'=>'2024-12-05'],
        ['id'=>3,'category'=>'วิดีทัศน์','title'=>'Workshop: เทคนิคสีน้ำ','description'=>'คลิปการสาธิตการใช้สีน้ำในงานจิตรกรรม','srcImage'=>'images/knowledge_repository/3.jpg','views'=>890,'author'=>'อ.กิตติ','published_at'=>'2025-02-01'],
        ['id'=>5,'category'=>'คลังภาพ','title'=>'[infographic] - ความรู้พื้นฐานของศิลปะ','description'=>'ความรู้พื้นฐานของศิลปะ','srcImage'=>'images/knowledge_repository/4.jpg','views'=>456,'author'=>'ผู้ดูแลระบบ คลังปัญญาอาชีวศึกษา สาขาวิชาวิจิตรศิลป์','published_at'=>'2024-11-20'],
    ];
    @endphp

    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row justify-between">
            <h2 class="text-xl font-bold text-[#8a438f] mb-4">คลังปัญญา</h2>
            <div class="flex items-center gap-2">
                <div class="flex flex-wrap gap-2  overflow-auto">
                    @foreach ($categories as $cat )
                        <button 
                        onclick="window.location.href='?category={{$cat}}'" 
                        class="px-3 py-1.5 text-sm rounded-md border 
                            <?= $cat === $active 
                                ? 'bg-purple-600 text-white border-purple-600' 
                                : 'bg-white text-gray-700 border-gray-300 hover:bg-purple-50' ?>
                        ">
                        {{$cat}}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8 mt-4">
            @foreach ($mockupData as $data)
                @if ($active === 'ทั้งหมด' || $data['category'] == $active)
                    <x-card-content 
                        :id="$data['id']"
                        :title="$data['title']"
                        :description="$data['description']"
                        :category="$data['category']"
                        :views="$data['views']"
                        :author="$data['author']"
                        :published_at="$data['published_at']"
                        :srcImage="$data['srcImage']"
                    />
                @endif
            @endforeach
        </div>
    </div>

</x-guest-layout>
