@php
    $active = $_GET['category'] ?? 'ทั้งหมด';
    $categories = ['ทั้งหมด', 'วิดีทัศน์', 'บทความ', 'คลังภาพ', 'คลังเสียง'];
    $mockupData = [];
@endphp

<div class="max-w-7xl mx-auto">
    <x-list-showData title="ผลงานของนักศึกษา" :active="$active" :mockupData="$mockupData" />
</div>