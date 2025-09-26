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
        <x-list-showData 
            title="คลังปัญญา"
            :active="$active" 
            :categories="$categories" 
            :mockupData="$mockupData"
        />
    </div>
