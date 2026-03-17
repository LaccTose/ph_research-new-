<!-- resources/views/bookings/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('ระบบบันทึกข้อมูลการจัดประชุม/ การจัดกิจกรรม/ การจัดงาน') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .flatpickr-calendar {
            { font-family: 'Sarabun', sans-serif; } 
        }
        .flatpickr-day.selected { 
            background: #15803d !important; 
            border-color: #15803d !important; 
        }
        .flatpickr-day.flatpickr-disabled,
        .flatpickr-day.flatpickr-disabled:hover {
            color: #d1d5db;
            cursor: not-allowed !important;
            background: transparent !important;
            border-color: transparent !important;
        }

        .flatpickr-calendar {
            padding-bottom: 0 !important;
        }
        .flatpickr-innerContainer + div {
            margin-top: 5px;
        }
    </style>

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
                        <label class="block mb-1 text-sm text-gray-700">ชื่อเรื่องหัวข้อการประชุม/การจัดกิจกรรม/การจัดงาน 
                            <span class="text-red-500">*</span></label>
                        <input type="text" name="title" required placeholder="โปรดระบุชื่อกิจกรรมหรือหัวเรื่องการประชุม"
                            class="w-full text-sm text-gray-700 placeholder-gray-400 border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">
                    </div>
                </fieldset>
                
                <fieldset class="p-6 mb-8 bg-white border-t-4 border-green-700 rounded-lg shadow-sm">
                    <legend class="px-4 text-xl font-bold text-green-800">วัน-เวลาเริ่มต้นและสิ้นสุดกำหนดการ</legend>
                    <!-- 2.2 วันที่และเวลา -->
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
                        <div>
                            <label class="block mb-1 text-sm text-gray-700">วันที่เริ่มต้น <span class="text-red-500">*</span></label>
                            <input type="text" id="start_date" name="start_date" required placeholder="คลิกเพื่อเพิ่มวันที่เริ่มต้น"
                                class="w-full text-sm text-gray-700 placeholder-gray-400 border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">
                        </div>
                        <div>
                            <label class="block mb-1 text-sm text-gray-700">วันที่สิ้นสุด <span class="text-red-500">*</span></label>
                            <input type="text" id="end_date" name="end_date" required readonly placeholder="คลิกเพื่อเพิ่มวันที่สิ้นสุด"
                                class="w-full text-sm text-gray-700 placeholder-gray-400 border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">
                        </div>
                        <div>
                            <label class="block mb-1 text-sm text-gray-700">เวลาเริ่มต้น <span class="text-red-500">*</span></label>
                            <input type="text" id="start_time" name="start_time" required readonly placeholder="คลิกเพื่อเลือกเวลาเริ่มต้น"
                                class="w-full text-sm text-gray-700 placeholder-gray-400 border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">
                        </div>
                        <div>
                            <label class="block mb-1 text-sm text-gray-700">เวลาสิ้นสุด <span class="text-red-500">*</span></label>
                            <input type="text" id="end_time" name="end_time" required readonly placeholder="คลิกเพื่อเลือกเวลาสิ้นสุด"
                                class="w-full text-sm text-gray-700 placeholder-gray-400 border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">
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
                                class="w-full text-sm text-gray-700 placeholder-gray-400 border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">

                            <!-- Input ตำแหน่งประธาน (คอลัมน์ที่ 3) -->
                            <input type="text" name="chairman_position" placeholder="ตำแหน่งประธาน"
                                class="w-full text-sm text-gray-700 placeholder-gray-400 border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">
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
                                            class="text-sm placeholder-gray-400 border-gray-300 rounded-md shadow-sm w-60 focus:ring-green-600 focus:border-green-600">
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
                        <label class="block mb-1 text-sm text-gray-700">ส่วนราชการ <span class="text-red-500">*</span></label>
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
                                class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600" placeholder="ชื่อ-สกุล" required>
                        </div>
                        <div>
                            <label for="coordinatorPosition" class="block mb-1 text-sm text-gray-700">
                                ตำแหน่ง <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="coordinatorPosition" name="coordinatorPosition"
                                class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600" placeholder="ตำแหน่ง" required>
                        </div>

                        <div>
                            <label class="text-sm text-gray-700">
                                เบอร์โทรศัพท์ <span class="text-red-500">*</span></label>
                            <input type="tel" id="coordinatorPhone" name="coordinatorPhone" maxlength="12"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\d{2})(\d{4})(\d{0,4}).*/, '$1-$2-$3')" class="w-full p-2 text-sm text-gray-700 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600" placeholder="00-0000-0000" required>
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

    
 @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/th.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. ตั้งค่าพื้นฐาน
            const dateConfig = {
                locale: 'th',
                allowInput: true,
                altInput: true,
                altFormat: "j F Y",
                dateFormat: "Y-m-d",
                minDate: "today",

                formatDate: (date, format, locale) => {
                    const d = date.getDate();
                    const m = locale.months.longhand[date.getMonth()];
                    const y = date.getFullYear() + 543;
                    return `${d} ${m} ${y}`;
                },

                parseDate: (dateStr, format) => {
                    const parts = dateStr.split('/');
                    if (parts.length === 3) {
                       let day = parseInt(parts[0]);
                       let month = parseInt(parts[1]) - 1;
                       let year = parseInt(parts[2]);
                       
                       if(year > 2400){
                        year = year - 543;
                       }
                       return new Date(year, month, day);
                    }
                    return new Date(dateStr);
                },

                // ปุ่ม today และ clear
                onReady: function(selectedDates, dateStr, instance) {
                    const container = document.createElement('div');
                    // ใช้ Tailwind class จัดการความสวยงาม
                    container.className = "flex justify-between p-2 border-t border-gray-200 bg-gray-50";

                    const todayBtn = document.createElement('button');
                    todayBtn.innerHTML = "วันนี้";
                    todayBtn.className = "text-xs font-bold text-green-700 hover:text-green-800 px-2 py-1";
                    todayBtn.type = "button";
                    // แก้ไขจาก 0=> เป็น () =>
                    todayBtn.addEventListener("click", () => {
                        instance.setDate(new Date());
                        instance.close();
                    });

                    const clearBtn = document.createElement('button');
                    clearBtn.innerHTML = "ล้างค่า";
                    clearBtn.className = "text-xs font-bold text-red-500 hover:text-red-600 px-2 py-1";
                    clearBtn.type = "button";
                    // แก้ไขจาก 0=> เป็น () =>
                    clearBtn.addEventListener("click", () => {
                        instance.clear();
                        instance.close();
                    });

                    container.appendChild(clearBtn);
                    container.appendChild(todayBtn);
                    instance.calendarContainer.appendChild(container);
                }
            };
            
            // 2. ผูกกับ Element
            // ประกาศตัวแปรไว้ก่อนเพื่อให้ทั้งสองฝั่งอ้างอิงถึงกันได้
            let startDatePicker, endDatePicker;

            startDatePicker = flatpickr("#start_date", {
                ...dateConfig,
                onChange: function(selectedDates, dateStr, instance) {
                    if (endDatePicker) {
                        endDatePicker.set("minDate", dateStr);
                    }
                }
            });

            endDatePicker = flatpickr("#end_date", {
                ...dateConfig,
                onClose: function(selectedDates, dateStr, instance){
                    if (selectedDates.length === 0 && instance.input.value !== "") {
                        instance.clear();
                    }
                }
            });
            
            // 3. ตั้งค่าเวลา
            const timeConfig = {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                minuteIncrement: 1,
                allowInput: true
            };

            flatpickr("#start_time", timeConfig);
            flatpickr("#end_time", timeConfig);
        });
    </script>
@endpush

</x-app-layout>

