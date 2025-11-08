@extends('layouts.app')

@section('content')
<div class="min-h-screen py-10 bg-gray-50">
    <div class="max-w-4xl p-8 mx-auto bg-white rounded-lg shadow-md">
        <h1 class="mb-6 text-2xl font-bold text-blue-800">
            แบบฟอร์มบันทึกการจองประชุม/อบรม/กิจกรรม<br>
            สำนักอนามัย กรุงเทพมหานคร
        </h1>

        <form action="{{ route('bookings.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- 2.1 ชื่อเรื่อง --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">ชื่อเรื่องการประชุม/กิจกรรม</label>
                <input type="text" name="title" required
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- 2.2 วันที่และเวลา --}}
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <label class="block mb-1 font-medium text-gray-700">วันที่เริ่มต้น</label>
                    <input type="date" name="start_date" required
                        class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700">วันที่สิ้นสุด</label>
                    <input type="date" name="end_date" required
                        class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700">เวลาเริ่ม</label>
                    <input type="time" name="start_time" required
                        class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block mb-1 font-medium text-gray-700">เวลาสิ้นสุด</label>
                    <input type="time" name="end_time" required
                        class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
            </div>

            {{-- 2.3 ประธาน --}}
            <div class="space-y-2">
                <label class="block font-medium text-gray-700">ประธาน</label>
                <select name="chairman_type" class="w-full border-gray-300 rounded-md shadow-sm">
                    <option value="ผู้ว่าราชการกรุงเทพมหานคร">ผู้ว่าราชการกรุงเทพมหานคร</option>
                    <option value="อื่นๆ">อื่นๆ</option>
                </select>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <input type="text" name="chairman_name" placeholder="ชื่อ-สกุลประธาน"
                        class="w-full border-gray-300 rounded-md shadow-sm">
                    <input type="text" name="chairman_position" placeholder="ตำแหน่งประธาน"
                        class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
            </div>

            {{-- 2.4 กลุ่มเป้าหมาย --}}
            <div>
                <label class="block mb-2 font-medium text-gray-700">กลุ่มเป้าหมาย</label>
                <div class="grid grid-cols-1 gap-2 md:grid-cols-2">
                    @foreach ([
                        'ผู้อำนวยการสำนักงาน/กอง','ผู้อำนวยการศูนย์บริการสาธารณสุข',
                        'แพทย์','ทันตแพทย์','นายสัตวแพทย์','เภสัชกร','พยาบาลวิชาชีพ',
                        'นักวิชาการสาธารณสุข','นักวิชาการสุขาภิบาล','นักสังคมสงเคราะห์',
                        'นักรังสีการแพทย์','นักจิตวิทยา','อื่นๆ'
                    ] as $target)
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="targets[]" value="{{ $target }}" class="text-blue-500 rounded">
                            <span>{{ $target }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- 2.5 จำนวนผู้เข้าร่วม --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">จำนวนผู้เข้าร่วม (คน)</label>
                <input type="number" name="participants" min="1"
                    class="w-full border-gray-300 rounded-md shadow-sm">
            </div>

            {{-- 2.6 ส่วนราชการ --}}
            <div>
                <label class="block mb-1 font-medium text-gray-700">ส่วนราชการ</label>
                <input type="text" name="department" class="w-full border-gray-300 rounded-md shadow-sm">
            </div>

            {{-- 2.7 ผู้ประสานงาน --}}
            <div>
                <label class="block mb-2 font-medium text-gray-700">ผู้ประสานงาน</label>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    <input type="text" name="coordinator_name" placeholder="ชื่อ-สกุล"
                        class="border-gray-300 rounded-md shadow-sm">
                    <input type="text" name="coordinator_position" placeholder="ตำแหน่ง"
                        class="border-gray-300 rounded-md shadow-sm">
                    <input type="tel" name="coordinator_phone" placeholder="โทรศัพท์"
                        class="border-gray-300 rounded-md shadow-sm">
                </div>
            </div>

            {{-- Submit --}}
            <div class="text-right">
                <button type="submit"
                        class="px-6 py-2 text-white bg-blue-600 rounded-md shadow hover:bg-blue-700">
                    บันทึกข้อมูล
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
