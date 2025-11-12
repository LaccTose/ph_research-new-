<!-- resources/views/bookings/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('แบบบันทึกข้อมูลการจัดประชุม/ การจัดกิจกรรม/ การจัดงาน สำนักอนามัย กรุงเทพมหานคร') }}
        </h2>
    </x-slot>

    <div class="container py-2 mx-auto">
        <div class="max-w-4xl p-8 mx-auto bg-white rounded-lg shadow-md">
            <form action="{{ route('bookings.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- 2.1 ชื่อเรื่อง -->
                <div>
                    <label class="block mb-1 font-medium text-gray-700">ชื่อเรื่องการประชุม/กิจกรรม</label>
                    <input type="text" name="title" required
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- 2.2 วันที่และเวลา -->
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

                <!-- 2.3 ประธาน -->
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

                <!-- 2.4 กลุ่มเป้าหมาย -->
                <div>
                    <label class="block mb-2 font-medium text-gray-700">กลุ่มเป้าหมาย</label>
                    <div class="grid grid-cols-1 gap-2 md:grid-cols-2">
                        @foreach (['ผู้อำนวยการสำนักงาน/กอง', 'ผู้อำนวยการศูนย์บริการสาธารณสุข', 'แพทย์', 'ทันตแพทย์', 'นายสัตวแพทย์', 'เภสัชกร', 'พยาบาลวิชาชีพ', 'นักวิชาการสาธารณสุข', 'นักวิชาการสุขาภิบาล', 'นักสังคมสงเคราะห์', 'นักรังสีการแพทย์', 'นักจิตวิทยา', 'อื่นๆ'] as $target)
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="targets[]" value="{{ $target }}"
                                    class="text-blue-500 rounded">
                                <span>{{ $target }}</span>

                                @if ($target === 'อื่นๆ')
                                    <input type="text" name="target_other" placeholder="โปรดระบุ"
                                        class="w-60 border-gray-300 rounded-md shadow-sm text-sm focus:ring-blue-500 focus:border-blue-500">
                                @endif
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- 2.5 จำนวนผู้เข้าร่วม -->
                <div>
                    <label class="block mb-1 font-medium text-gray-700">จำนวนผู้เข้าร่วม</label>
                    <input type="number" name="participants" min="1"
                        class="w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <!-- 2.6 ส่วนราชการ -->
                <div>
                    <label class="block mb-1 font-medium text-gray-700">ส่วนราชการ</label>
                    <input type="text" name="department" class="w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <!-- 2.7 ผู้ประสานงาน -->
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

                <div class="flex items-center justify-between mt-4">
                    <a href="{{ route('calendar.index') }}"
                        class="flex items-center text-blue-600 hover:text-blue-500 font-medium">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"
                            fill="currentColor">
                            <path
                                d="M73.4 297.4C60.9 309.9 60.9 330.2 73.4 342.7L233.4 502.7C245.9 515.2 266.2 515.2 278.7 502.7C291.2 490.2 291.2 469.9 278.7 457.4L173.3 352L544 352C561.7 352 576 337.7 576 320C576 302.3 561.7 288 544 288L173.3 288L278.7 182.6C291.2 170.1 291.2 149.8 278.7 137.3C266.2 124.8 245.9 124.8 233.4 137.3L73.4 297.3z" />
                        </svg>
                        <span class="ms-2">ย้อนกลับ</span>
                    </a>
                    <!-- ปุ่ม บันทึก / ยกเลิก -->
                    <div class="flex gap-3">
                        <button type=""
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-500">บันทึก</button>
                        <button type="reset"
                            class="px-4 py-2 bg-gray-300 text-black rounded hover:bg-gray-200">ยกเลิก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    
    {{--@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/3.3.5/css/datepicker.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/3.3.5/js/datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/3.3.5/js/i18n/datepicker.th.min.js"></script>
<script>
new AirDatepicker('#start_date', {
    language: 'th',
    dateFormat: 'yyyy-mm-dd',
    altField: '#start_date',
    altFormat: 'd M yyyy', 
    onRenderCell: function (date, cellType) {
    }
});
</script>
@endpush--}}
</x-app-layout>
