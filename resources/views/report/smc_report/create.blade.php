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
                    แบบบันทึกรายงานผู้รับบริการคลินิกพิเศษรับส่งต่อ
                </h1>
                <p class="mt-2 text-lg text-green-700">
                    
                </p>
            </div>

            <!-- Form -->
            <form id="umscForm" novalidate>
                <!-- Section 1: ข้อมูลทั่วไป -->
                <fieldset class="p-6 mb-8 bg-white border-t-4 border-green-700 rounded-lg shadow-sm">
                    <legend class="px-4 text-xl font-bold text-green-800">ข้อมูลทั่วไป</legend>
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                        <div>
                            <label for="smc" class="block mb-1 text-sm text-gray-700">
                                คลินิกพิเศษ <span class="text-red-500">*</span>
                            </label>
                            <select id="smc" name="smc" required
                                class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">
                                @foreach ([
                                        '-- ตัวเลือก --',
                                        'ARV (Start)',
                                        'กุมารเวชกรรม',
                                        'จักษุวิทยา',
                                        'ผิวหนัง',
                                        'พัฒนาการเด็ก',
                                        'แพทย์แผนไทย',
                                        'สูตินรีเวชกรรม',
                                        'หู คอ จมูก',
                                        'อายุรศาสตร์ต่อมไร้ท่อและเมตาบอลิสม',
                                        'อายุรศาสตร์ทั่วไป',
                                        'อายุรศาสตร์โรคหัวใจ'
                                    ] as $dept)
                                        <option value="{{ $dept }}">{{ $dept }}</option>
                                @endforeach
                            </select>
                        </div>

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

                
               <!-- Section 2: จำนวนผู้รับบริการ -->
                <fieldset class="p-6 mb-8 bg-white border-t-4 border-green-700 rounded-lg shadow-sm">
                    <legend class="px-4 text-xl font-bold text-green-800">จำนวนผู้รับบริการ</legend>
                    
                    <div class="mt-4 space-y-4">
                        <div class="flex flex-col">
                            <label for="allUser" class="block mb-1 text-sm text-gray-700">1. จำนวนผู้รับบริการคลินิกพิเศษ Walk In
                                <p class="mt-1 text-xs text-gray-500">(ผู้ป่วยที่เดินทางเข้ามารับการรักษาที่คลินิกพิเศษเอง)</p>
                            </label>
                            <div class="flex">
                                <input type="number" id="allUser" name="allUser" min="0" value="0"
                                    class="w-full p-2 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600 input-small lg:w-1/2">
                                
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <label for="healthConsultPeople" class="block mb-1 text-sm text-gray-700">
                                2. จำนวนผู้รับบริการคลินิกพิเศษ Refer In
                                <p class="mt-1 text-xs text-gray-500">(ผู้ป่วยที่รับการส่งต่อมาจาก ศบส. หรือสถานพยาบาลอื่น)</p>
                            </label>
                            <div class="flex">
                                <input type="number" id="healthConsultPeople" name="healthConsultPeople" min="0"
                                    class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm lg:w-1/2 sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <label for="serviceAdvicePeople" class="block mb-1 text-sm text-gray-700">
                                จำแนกตามหน่วยบริการ</label>
                            <div class="flex">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <label for="appointmentPeople" class="block mb-1 text-sm text-gray-700">
                                3. จำนวนผู้รับบริการผ่านระบบ Teleconsult ทั้งหมด</label>
                            <div class="flex">
                                <input type="number" id="appointmentPeople" name="appointmentPeople" min="0"
                                    class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm lg:w-1/2 sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div class="flex flex-col">
                                <label class="block mb-1 text-sm text-gray-700">
                                    Teleconsult ระหว่างศบส. กับ ศบส.
                                    <p class="mt-1 text-xs text-gray-500">(ให้คำปรึกษา ศบส. อื่น)</p>
                                </label>
                                <input
                                    type="number"
                                    name="tele_smc_to_smc"
                                    min="0"
                                    class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน"
                                >
                            </div>

                            <div class="flex flex-col">
                                <label class="block mb-1 text-sm text-gray-700">
                                    Teleconsult ระหว่างศบส. กับ รพ.
                                    <p class="mt-1 text-xs text-gray-500">(รับคำปรึกษาจาก รพ.)</p>
                                </label>
                                <input
                                    type="number"
                                    name="tele_smc_to_hospital"
                                    min="0"
                                    class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน"
                                >
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label for="homeVisitPeople" class="block mb-1 text-sm text-gray-700">
                                4. จำนวนผู้รับบริการที่ต้องส่งรักษาต่อ รพ. (Refer Out)</label>
                            <div class="flex">
                                <input type="number" id="homeVisitPeople" name="homeVisitPeople" min="0"
                                    class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm lg:w-1/2 sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <label for="disabilityCertPeople" class="block mb-1 text-sm text-gray-700 underline">
                                รายละเอียดการส่งรักษาต่อ รพ.</label>
                            
                        </div>
  
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div class="flex flex-col">
                                <label class="block mb-1 text-sm text-gray-700">
                                    ผู้ป่วย Walk In
                                </label>
                                <input
                                    type="number" name="tele_smc_to_smc" min="0"
                                    class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                            </div>

                            <div class="flex flex-col">
                                <label class="block mb-1 text-sm text-gray-700">
                                    ผู้ป่วยที่รับการส่งต่อจาก ศบส. (Refer In)
                                </label>
                                <input
                                    type="number" name="tele_smc_to_hospital" min="0" 
                                    class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label for="serviceAdvicePeople" class="block mb-1 text-sm text-gray-700">
                                จำแนกตามหน่วยบริการ</label>
                            <div class="flex">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                            
                        
                        
                    </div>
                </fieldset>

                <div class="flex items-center justify-between mt-4">
                    <a href="{{ route('umsc_report.create') }}"
                        class="flex items-center font-medium text-green-700 hover:text-green-800">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"
                            fill="currentColor">
                            <path
                                d="M73.4 297.4C60.9 309.9 60.9 330.2 73.4 342.7L233.4 502.7C245.9 515.2 266.2 515.2 278.7 502.7C291.2 490.2 291.2 469.9 278.7 457.4L173.3 352L544 352C561.7 352 576 337.7 576 320C576 302.3 561.7 288 544 288L173.3 288L278.7 182.6C291.2 170.1 291.2 149.8 278.7 137.3C266.2 124.8 245.9 124.8 233.4 137.3L73.4 297.3z" />
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
