<!-- resources/views/bookings/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('ระบบบันทึกข้อมูลการจัดประชุม/ การจัดกิจกรรม/ การจัดงาน') }}
        </h2>
    </x-slot>

    <div class="container py-2 mx-auto">
        <div class="p-6 mx-auto bg-white shadow-lg max-w-7xl sm:p-8 rounded-2xl">

             <div class="mb-8 text-center">
                <h1 class="text-2xl font-bold text-green-800 sm:text-2xl md:text-3xl">
                    ระบบบันทึกข้อมูลการประชุม/การจัดกิจกรรม/การจัดงาน
                </h1>
                <p class="mt-2 text-lg text-green-700">
                    สำนักอนามัย กรุงเทพมหานคร
                </p>
            </div>
            
            <form action="{{ route('booking.store') }}" method="POST" class="space-y-6">

                @csrf
                
                <fieldset class="p-6 mb-8 bg-white border-t-4 border-green-700 rounded-lg shadow-sm">
                    <legend class="px-4 text-xl font-bold text-green-800">หัวข้อการประชุม/การจัดกิจกรรม/การจัดงาน</legend>
                    <!-- 2.1 ชื่อเรื่อง -->
                    <div>
                        <label class="block mb-1 text-sm text-gray-700">ชื่อเรื่องการประชุม/การจัดกิจกรรม/การจัดงาน</label>
                        <input type="text" name="title" required
                            class="w-full text-sm text-gray-700 border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">
                    </div>
                </fieldset>
                
                <fieldset class="p-6 mb-8 bg-white border-t-4 border-green-700 rounded-lg shadow-sm">
                    <legend class="px-4 text-xl font-bold text-green-800">วัน-เวลาเริ่มต้นและสิ้นสุดกำหนดการ</legend>
                    <!-- 2.2 วันที่และเวลา -->
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
                        <div>
                            <label class="block mb-1 text-sm text-gray-700">วันที่เริ่มต้น</label>
                            <input type="date" name="start_date" required
                                class="w-full text-sm text-gray-700 border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">
                        </div>
                        <div>
                            <label class="block mb-1 text-sm text-gray-700">วันที่สิ้นสุด</label>
                            <input type="date" name="end_date" required
                                class="w-full text-sm text-gray-700 border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">
                        </div>
                        <div>
                            <label class="block mb-1 text-sm text-gray-700">เวลาเริ่ม</label>
                            <input type="time" name="start_time" required
                                class="w-full text-sm text-gray-700 border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">
                        </div>
                        <div>
                            <label class="block mb-1 text-sm text-gray-700">เวลาสิ้นสุด</label>
                            <input type="time" name="end_time" required
                                class="w-full text-sm text-gray-700 border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">
                        </div>
                    </div>
                </fieldset>

                <fieldset class="p-6 mb-8 bg-white border-t-4 border-green-700 rounded-lg shadow-sm">
                    <legend class="px-4 text-xl font-bold text-green-800">ข้อมูลประธาน</legend>
                <!-- 2.3 ประธาน -->
                    <div class="space-y-2">
                        <!-- label เต็มแถว -->
                        <label class="block text-sm text-gray-700">ประธาน</label>

                        <!-- grid 3 คอลัมน์ -->
                        <div class="grid grid-cols-1 gap-4 text-sm md:grid-cols-3">
                            
                            <!-- Select (คอลัมน์ที่ 1) -->
                            <select name="chairman_type" 
                                    class="w-full text-sm text-gray-600 border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">
                                <option value="ผู้ว่าราชการกรุงเทพมหานคร">ผู้ว่าราชการกรุงเทพมหานคร</option>
                                <option value="อื่นๆ">อื่นๆ</option>
                            </select>

                            <!-- Input ชื่อ–สกุลประธาน (คอลัมน์ที่ 2) -->
                            <input type="text" name="chairman_name" placeholder="ชื่อ-สกุลประธาน"
                                class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">

                            <!-- Input ตำแหน่งประธาน (คอลัมน์ที่ 3) -->
                            <input type="text" name="chairman_position" placeholder="ตำแหน่งประธาน"
                                class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">
                        </div>
                    </div>
                </fieldset>

                <fieldset class="p-6 mb-8 bg-white border-t-4 border-green-700 rounded-lg shadow-sm">
                    <legend class="px-4 text-xl font-bold text-green-800">กลุ่มเป้าหมายและจำนวนผู้เข้าร่วม</legend>
                    <!-- 2.4 กลุ่มเป้าหมาย -->
                    <div>
                        <label class="block mb-2 text-sm text-gray-700">กลุ่มเป้าหมาย</label>
                        <div class="grid grid-cols-1 gap-2 mt-3 text-sm text-gray-700 md:grid-cols-2">
                            @foreach (['ผู้อำนวยการสำนักงาน/กอง', 'ผู้อำนวยการศูนย์บริการสาธารณสุข', 'แพทย์', 'ทันตแพทย์', 'นายสัตวแพทย์', 'เภสัชกร', 'พยาบาลวิชาชีพ', 'นักวิชาการสาธารณสุข', 'นักวิชาการสุขาภิบาล', 'นักสังคมสงเคราะห์', 'นักรังสีการแพทย์', 'นักจิตวิทยา', 'อื่นๆ'] as $target)
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="targets[]" value="{{ $target }}"
                                        class="w-4 h-4 text-green-600 border-gray-300 rounded bg-gray-50 focus:ring-primary-500 focus:ring-1 dark:bg-gray-600 dark:border-gray-500"/>
                                    <span>{{ $target }}</span>

                                    @if ($target === 'อื่นๆ')
                                        <input type="text" name="target_other" placeholder="โปรดระบุ..."
                                            class="text-sm border-gray-300 rounded-md shadow-sm w-60 focus:ring-green-600 focus:border-green-600">
                                    @endif
                                </label>
                            @endforeach
                        </div>
                    </div>

                <!-- 2.5 จำนวนผู้เข้าร่วม -->
                <div class="grid grid-cols-1 gap-2 mt-6 md:grid-cols-2">
                    <div>
                        <label class="block mb-1 text-sm text-gray-700">จำนวนผู้เข้าร่วม</label>
                        <input type="number" name="participants" min="1"
                            class="w-full text-sm text-gray-700 border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">
                    </div>

                    <!-- 2.6 ส่วนราชการ -->
                    <div>
                        <label class="block mb-1 text-sm text-gray-700">ส่วนราชการ</label>
                        <input type="text" name="department" class="w-full text-sm text-gray-700 border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">
                    </div>
                </div>
            </fieldset>

           <!-- 2.7 ผู้ประสานงาน -->
            <fieldset class="p-6 mb-8 bg-white border-t-4 border-green-700 rounded-lg shadow-sm">
                <legend class="px-4 text-xl font-bold text-green-800">ข้อมูลผู้ประสานงาน</legend>
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                        <div>
                            <label for="coordinatorName" class="block mb-1 text-sm text-gray-700">
                                ชื่อ-สกุล <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="coordinatorName" name="coordinatorName"
                                class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600"
                                placeholder="ชื่อ-สกุล">
                        </div>
                        <div>
                            <label for="coordinatorPosition" class="block mb-1 text-sm text-gray-700">
                                ตำแหน่ง <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="coordinatorPosition" name="coordinatorPosition"
                                class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600" placeholder="ตำแหน่ง">
                        </div>

                        <div>
                            <label class="text-sm text-gray-700">
                                เบอร์โทรศัพท์ <span class="text-red-500">*</span></label>
                            <input type="tel" id="coordinatorPhone" name="coordinatorPhone" maxlength="12"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\d{2})(\d{4})(\d{0,4}).*/, '$1-$2-$3')" class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600" placeholder="00-0000-0000">
                        </div>

                    </div>
            </fieldset>

                <div class="flex items-center justify-between mt-4">
                    <a href="{{ route('calendar.index') }}"
                        class="flex items-center font-medium text-green-700 hover:text-green-800">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"
                            fill="currentColor">
                            <path
                                d="M73.4 297.4C60.9 309.9 60.9 330.2 73.4 342.7L233.4 502.7C245.9 515.2 266.2 515.2 278.7 502.7C291.2 490.2 291.2 469.9 278.7 457.4L173.3 352L544 352C561.7 352 576 337.7 576 320C576 302.3 561.7 288 544 288L173.3 288L278.7 182.6C291.2 170.1 291.2 149.8 278.7 137.3C266.2 124.8 245.9 124.8 233.4 137.3L73.4 297.3z" />
                        </svg>
                        <span class="ms-2">ย้อนกลับ</span>
                    </a>
                    <!-- ปุ่ม บันทึก / ยกเลิก -->
                    <div class="flex gap-3">
                        <button type="submit"
                            class="px-4 py-2 text-white bg-green-700 rounded hover:bg-green-800">บันทึก</button>
                        <button type="reset"
                            class="px-4 py-2 text-gray-700 bg-gray-300 rounded hover:bg-gray-400">ยกเลิก</button>
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
