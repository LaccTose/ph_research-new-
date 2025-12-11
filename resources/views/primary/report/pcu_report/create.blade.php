<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('ระบบบันทึกข้อมูลรายงานการให้บริการ') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-green-50">
        <div class="p-6 mx-auto bg-white shadow-lg max-w-7xl sm:p-8 rounded-2xl">

            <!-- Header -->
            <div class="mb-8 text-center">
                <h1 class="text-2xl font-bold text-green-800 sm:text-2xl md:text-3xl">
                    แบบบันทึกรายงานการรับบริการศูนย์แพทย์ชุมชนเมือง
                </h1>
                <p class="mt-2 text-lg text-green-700">
                    
                </p>
            </div>

            <!-- Form -->
            <form id="umscForm" novalidate>
                <!-- Section 1: ข้อมูลทั่วไป -->
                <fieldset class="p-6 mb-8 bg-white border-t-4 border-green-700 rounded-lg shadow-sm">
                    <legend class="px-4 text-xl font-bold text-green-800">ข้อมูลทั่วไป</legend>
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-4">

                        <div>
                            <label for="month" class="block mb-1 text-sm text-gray-700">
                                เดือน <span class="text-red-500">*</span>
                            </label>
                            <select id="month" name="month" required
                                class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">
                                @php
                                    $months = [
                                        'มกราคม',
                                        'กุมภาพันธ์',
                                        'มีนาคม',
                                        'เมษายน',
                                        'พฤษภาคม',
                                        'มิถุนายน',
                                        'กรกฎาคม',
                                        'สิงหาคม',
                                        'กันยายน',
                                        'ตุลาคม',
                                        'พฤศจิกายน',
                                        'ธันวาคม',
                                    ];
                                @endphp
                                @foreach ($months as $m)
                                    <option value="{{ $m }}">{{ $m }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="year" class="block mb-1 text-sm text-gray-700">ปี (พ.ศ.) <span
                                    class="text-red-500">*</span></label>
                            <input type="number" id="year" name="year" required
                                class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md focus:ring-green-600 focus:border-green-600" value="{{ date('Y') + 543 }}">
                        </div>
                    </div>
                </fieldset>

                
               <!-- Section 2: การตรวจโรคทั่วไป -->
                <fieldset class="p-6 mb-8 bg-white border-t-4 border-green-700 rounded-lg shadow-sm ">
                    <legend class="px-4 text-xl font-bold text-green-800">การตรวจโรคทั่วไป (OPD)</legend>
                    
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-x-6 gap-y-4">
                        <div class="col-span-1">
                            <label for="TotalPeople" class="block mb-1 text-sm text-gray-700">
                                ผู้รับบริการทั้งหมด
                            </label>
                            <div class="flex space-x-2">
                                <input type="number" id="allUser" name="allUser" min="0" value="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600"
                                    readonly>
                                <input type="number" id="allUserTimes" name="allUserTimes" min="0" value="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600"
                                    readonly>
                            </div>
                        </div>

                        <div class="col-span-1">
                            <label for="GeneralMedicalExam" class="block mb-1 text-sm text-gray-700">
                                ตรวจโรคทั่วไป
                            </label>
                            <div class="flex gap-2">
                                <input type="number" id="GeneralMedicalExam" name="GeneralMedicalExam" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="GeneralMedicalExam" name="GeneralMedicalExam" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="col-span-1">
                            <label for="DischargedHome" class="block mb-1 text-sm text-gray-700">
                                จำหน่ายกลับบ้าน
                            </label>
                            <div class="flex gap-2">
                                <input type="number" id="DischargedHome" name="DischargedHome" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm line-sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="DischargedHome" name="DischargedHome" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm line-sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="col-span-1">
                            <label for="Referred" class="block mb-1 text-sm text-gray-700">
                                ส่งต่อเพื่อรับการรักษาเพิ่มเติม
                            </label>
                            <div class="flex gap-2">
                                <input type="number" id="Referred" name="Referred" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm line-sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="Referred" name="Referred" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm line-sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>
                            
                        <div class="col-span-1">
                            <label for="ReferredDetails" class="block mb-1 text-sm text-gray-700">
                                รายละเอียดการส่งต่อ
                            </label>
                            <div class="relative w-full min-w-[200px]">
                                <textarea class="h-full min-h-[100px] w-full resize-none border-gray-300 px-3 py-2 text-sm text-gray-700 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600" 
                                placeholder="รายละเอียดการส่งต่อเพิ่มเติม" id="RefferedDetails">{{ trim(old('referral_details')) }}</textarea>
                            </div>
                        </div>

                    </div>
                </fieldset>
                    
                <fieldset class="p-6 mb-8 bg-white border-t-4 border-green-700 rounded-lg shadow-sm ">
                    <legend class="px-4 text-xl font-bold text-green-800">การส่งเสริมสุขภาพ / ป้องกันโรค</legend>
                    
                    <div class="mt-4 space-y-4">
                        <div class="flex flex-col">
                            <label for="vaccination" class="block mb-1 text-sm text-gray-700">
                                ฉีดวัคซีน (PP)
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="vaccination" name="vaccination" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="vaccination" name="vaccination" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label for="AntenatalCare" class="block mb-1 text-sm text-gray-700">
                                ฝากครรภ์ (PP)
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="AntenatalCare" name="AntenatalCare" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="AntenatalCare" name="AntenatalCare" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label for="FamilyPlanning" class="block mb-1 text-sm text-gray-700">
                                วางแผนครบครัว (PP)
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="FamilyPlanning" name="FamilyPlanning" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="FamilyPlanning" name="FamilyPlanning" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>
                    </div>
                </fieldset>

                <div class="flex items-center justify-between mt-4">
                    <a href="{{ route('smc_report.index') }}"
                        class="flex items-center font-medium text-green-700 hover:text-green-800">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"
                            fill="currentColor">
                            <path d="M73.4 297.4C60.9 309.9 60.9 330.2 73.4 342.7L233.4 502.7C245.9 515.2 266.2 515.2 278.7 502.7C291.2 490.2 291.2 469.9 278.7 457.4L173.3 352L544 352C561.7 352 576 337.7 576 320C576 302.3 561.7 288 544 288L173.3 288L278.7 182.6C291.2 170.1 291.2 149.8 278.7 137.3C266.2 124.8 245.9 124.8 233.4 137.3L73.4 297.3z" />
                        </svg>
                        <span class="ms-2">ย้อนกลับ</span>
                    </a>
                    <div class="flex gap-3">
                        <button type="submit"
                            class="px-4 py-2 text-white transition bg-green-700 rounded hover:bg-green-800">
                            บันทึก
                        </button>
                        <button type="reset"
                            class="px-4 py-2 text-gray-700 transition bg-gray-300 rounded hover:bg-gray-400">
                            ยกเลิก
                    </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

   {{--@push('scripts')
    <script>
        document.addEventListener("livewire:load", function() {
            new TomSelect("#smc", {
                create: false,
                openOnFocus: true,          // เปิดลิสต์ทั้งหมดเมื่อ focus
                searchField: ["text"],      // ใช้ข้อความใน option สำหรับค้นหา
                diacritics: false,           // ไม่ตัดสระ/สัญลักษณ์
                maxItems: 1,
                placeholder: "ระบุสถานพยาบาล..."
            });
        });    
    </script>
    @endpush--}}

    @push('script')
    <script>
        new TomSelect("#smc", {
            maxItems: 1,
            create: false,
            openOnFocus: true,          // เปิดลิสต์ทันทีเมื่อ focus
            placeholder: "ระบุ"
        });
    </script>
    @endpush


    <!-- JS ส่วนล่าง -->
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            // ตั้งค่าปีเริ่มต้นเป็น พ.ศ. ปัจจุบัน
            document.getElementById('year').value = new Date().getFullYear() + 543;

            // ตัวอย่าง SweetAlert เมื่อบันทึก
            document.getElementById('umscForm').addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'บันทึกข้อมูลสำเร็จ!',
                    text: 'ข้อมูลถูกส่งเรียบร้อยแล้ว',
                    icon: 'success',
                    confirmButtonText: 'ตกลง'
                });
            });
        </script>
    @endpush

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('menu').classList.toggle('hidden');
        });
    </script>

    <script>
        function sumPeople() {
            let total = 0;
            document.querySelectorAll('.sum-source-people').forEach(el => {
                total += parseInt(el.value || 0);
            });
            document.getElementById('allUser').value = total;
        }

        function sumTimes() {
            let total = 0;
            document.querySelectorAll('.sum-source-times').forEach(el => {
                total += parseInt(el.value || 0);
            });
            document.getElementById('allUserTimes').value = total;
        }

        document.querySelectorAll('.sum-source-people').forEach(el => {
            el.addEventListener('input', sumPeople);
        });
        document.querySelectorAll('.sum-source-times').forEach(el => {
            el.addEventListener('input', sumTimes);
        });
    </script>

    <script>
        function sumPeople() {
            let total = 0;
            document.querySelectorAll('.line-sum-source-people').forEach(el => {
                total += parseInt(el.value || 0);
            });
            document.getElementById('lineOATotalPeople').value = total;
        }

        function sumTimes() {
            let total = 0;
            document.querySelectorAll('.line-sum-source-times').forEach(el => {
                total += parseInt(el.value || 0);
            });
            document.getElementById('lineOATotalTimes').value = total;
        }

        document.querySelectorAll('.line-sum-source-people').forEach(el => {
            el.addEventListener('input', sumPeople);
        });

        document.querySelectorAll('.line-sum-source-times').forEach(el => {
            el.addEventListener('input', sumTimes);
        });
    </script>

</x-app-layout>


