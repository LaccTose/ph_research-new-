<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('ระบบบันทึกข้อมูลรายงานการให้บริการ') }}
        </h2>
    </x-slot>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/style.css">

    <div class="py-6 bg-green-50">
        <div class="p-6 mx-auto bg-white shadow-lg max-w-7xl sm:p-8 rounded-2xl">
            <!-- Header -->
            <div class="mb-8 text-center">
                <h1 class="text-2xl font-bold text-green-800 sm:text-2xl md:text-3xl">
                    แบบบันทึกรายงานผู้รับบริการคลินิกพิเศษรับส่งต่อ
                </h1>
            </div>

            <!-- Form -->
            <form id="smcForm" novalidate>
                <!-- Section 1: ข้อมูลทั่วไป -->
                <fieldset class="p-6 mb-8 bg-white border-t-4 border-green-700 rounded-lg shadow-sm">
                    <legend class="px-4 text-xl font-bold text-green-800">ข้อมูลทั่วไป</legend>
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
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
                                    'อายุรศาสตร์ต่อมไร้ท่อและเมแทบอลิซึม', 
                                    'อายุรศาสตร์ทั่วไป', 
                                    'อายุรศาสตร์โรคหัวใจ'
                                ] as $dept)
                                    <option value="{{ $dept }}">{{ $dept }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- เดิม
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
                        </div>--}}

                        {{-- ใหม่ --}}
                        <div class="mb-4">
                            <label for="month_year" class="block mb-1 text-sm text-gray-700">
                                เลือกเดือนและปี <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" id="month_year" name="month_year" required
                                    placeholder="คลิกเพื่อเลือกเดือนและปี"
                                    class="w-full text-sm text-gray-700 border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">
                            </div>
                        </div>

                    </div>
                </fieldset>

                <!-- Section 2: จำนวนผู้รับบริการ -->
                <fieldset class="p-6 mb-8 bg-white border-t-4 border-green-700 rounded-lg shadow-sm ">
                    <legend class="px-4 text-xl font-bold text-green-800">จำนวนผู้รับบริการ</legend>
                    <div class="mt-4 space-y-4">
                        <div class="flex flex-col">
                            <label for="allUser" class="block mb-1 text-sm text-gray-700">1.
                                จำนวนผู้รับบริการคลินิกพิเศษ Walk In
                                <p class="mt-1 text-xs text-gray-500">
                                    (ผู้ป่วยที่เดินทางเข้ามารับการรักษาที่คลินิกพิเศษเอง)</p>
                            </label>
                            <div class="flex">
                                <input type="number" id="allUser" name="allUser"
                                    class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600 input-small lg:w-1/2"
                                    placeholder="ครั้ง">
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <label for="healthConsultPeople" class="block mb-1 text-sm text-gray-700">
                                2. จำนวนผู้รับบริการคลินิกพิเศษ Refer In
                                <p class="mt-1 text-xs text-gray-500">(ผู้ป่วยที่รับการส่งต่อมาจาก
                                    ศบส.หรือสถานพยาบาลอื่น)</p>
                            </label>
                            <div class="flex">
                                <input type="number" id="healthConsultPeople" name="healthConsultPeople" min="0"
                                    class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm lg:w-1/2 sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <label for="serviceAdvicePeople" class="block mb-1 text-sm text-gray-700">
                                จำแนกตามหน่วยบริการ
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="ระบุชื่อสถานพยาบาล">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <label for="appointmentPeople" class="block mb-1 text-sm text-gray-700">
                                3. จำนวนผู้รับบริการผ่านระบบ Teleconsult ทั้งหมด
                            </label>
                            <div class="flex">
                                <input type="number" id="appointmentPeople" name="appointmentPeople" min="0"
                                    class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm lg:w-1/2 sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-2 md:grid-cols-2">
                            <div class="flex flex-col">
                                <label class="block mb-1 text-sm text-gray-700">
                                    Teleconsult ระหว่างศบส. กับ ศบส.
                                    <p class="mt-1 text-xs text-gray-500">(ให้คำปรึกษา ศบส. อื่น)</p>
                                </label>
                                <input type="number" name="tele_smc_to_smc" min="0"
                                    class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>

                            <div class="flex flex-col">
                                <label class="block mb-1 text-sm text-gray-700">
                                    Teleconsult ระหว่างศบส. กับ รพ.
                                    <p class="mt-1 text-xs text-gray-500">(รับคำปรึกษาจาก รพ.)</p>
                                </label>
                                <input type="number" name="tele_smc_to_hospital" min="0"
                                    class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label for="homeVisitPeople" class="block mb-1 text-sm text-gray-700">
                                4. จำนวนผู้รับบริการที่ต้องส่งรักษาต่อ รพ. (Refer Out)
                            </label>
                            <div class="flex">
                                <input type="number" id="homeVisitPeople" name="homeVisitPeople" min="0"
                                    class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm lg:w-1/2 sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <label for="disabilityCertPeople" class="block mt-3 text-sm text-gray-700 underline">
                                รายละเอียดการส่งรักษาต่อ รพ.
                            </label>
                        </div>
                        <div class="grid grid-cols-1 gap-2 md:grid-cols-2">
                            <div class="flex flex-col">
                                <label class="block mb-1 text-sm text-gray-700">
                                    ผู้ป่วย Walk In
                                </label>
                                <input type="number" name="tele_smc_to_smc" min="0"
                                    class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                            </div>
                            <div class="flex flex-col">
                                <label class="block mb-1 text-sm text-gray-700">
                                    ผู้ป่วยที่รับการส่งต่อจาก ศบส. (Refer In)
                                </label>
                                <input type="number" name="tele_smc_to_hospital" min="0"
                                    class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <label for="serviceAdvicePeople" class="block mb-1 text-sm text-gray-700">
                                จำแนกตามหน่วยบริการ
                            </label>
                            <div class="flex gap-2">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople"
                                    min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="ระบุชื่อสถานพยาบาล">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople"
                                    min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div>
                            <label for="smc" class="block mb-1 text-sm text-gray-700">
                                คลินิกพิเศษ <span class="text-red-500">*</span>
                            </label>
                            <select id="smc" name="smc" required
                                class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">
                                @foreach ([
                                    '-- ตัวเลือก --',
                                    'ศูนย์บริการสาธารณสุข 1 สะพานมอญ',
                                    'ศูนย์บริการสาธารณสุข 2 วัดมักกะสัน',
                                    'ศูนย์บริการสาธารณสุข 3 บางซื่อ',
                                    'ศูนย์บริการสาธารณสุข 4 ดินแดง',
                                    'ศูนย์บริการสาธารณสุข 5 จุฬาลงกรณ์',
                                    'ศูนย์บริการสาธารณสุข 6 สโมสรวัฒนธรรมหญิง',
                                    'ศูนย์บริการสาธารณสุข 7 บุญมีปุรุราชรังสรรค์',
                                    'ศูนย์บริการสาธารณสุข 8 บุญรอด รุ่งเรือง',
                                    'ศูนย์บริการสาธารณสุข 9 ประชาธิปไตย',
                                    'ศูนย์บริการสาธารณสุข 10 สุขุมวิท',
                                    'ศูนย์บริการสาธารณสุข 11 ประดิพัทธ์',
                                    'ศูนย์บริการสาธารณสุข 12 จันทร์เที่ยง เนตรวิเศษ',
                                    'ศูนย์บริการสาธารณสุข 13 ไมตรีวานิช',
                                    'ศูนย์บริการสาธารณสุข 14 แก้ว สีบุญเรือง',
                                    'ศูนย์บริการสาธารณสุข 15 ลาดพร้าว',
                                    'ศูนย์บริการสาธารณสุข 16 ลุมพินี',
                                    'ศูนย์บริการสาธารณสุข 17 ประชานิเวศน์',
                                    'ศูนย์บริการสาธารณสุข 18 มงคล-วอน วังตาล',
                                    'ศูนย์บริการสาธารณสุข 19 วงศ์สว่าง',
                                    'ศูนย์บริการสาธารณสุข 20 ป้อมปราบศัตรูพ่าย',
                                    'ศูนย์บริการสาธารณสุข 21 วัดธาตุทอง',
                                    'ศูนย์บริการสาธารณสุข 22 วัดปากบ่อ',
                                    'ศูนย์บริการสาธารณสุข 23 สี่พระยา',
                                    'ศูนย์บริการสาธารณสุข 24 บางเขน',
                                    'ศูนย์บริการสาธารณสุข 25 ห้วยขวาง',
                                    'ศูนย์บริการสาธารณสุข 26 เจ้าคุณพระประยุรวงศ์',
                                    'ศูนย์บริการสาธารณสุข 27 จันทร์ฉิมไพบูลย์',
                                    'ศูนย์บริการสาธารณสุข 28 กรุงธนบุรี',
                                    'ศูนย์บริการสาธารณสุข 29 ช่วง นุชเนตร',
                                    'ศูนย์บริการสาธารณสุข 30 วัดเจ้าอาม',
                                    'ศูนย์บริการสาธารณสุข 31 เอิบ-จิตร ทังสุบุตร',
                                    'ศูนย์บริการสาธารณสุข 32 มาริษ ตินตมุสิก',
                                    'ศูนย์บริการสาธารณสุข 33 วัดหงส์รัตนาราม',
                                    'ศูนย์บริการสาธารณสุข 34 โพธิ์ศรี',
                                    'ศูนย์บริการสาธารณสุข 35 หัวหมาก',
                                    'ศูนย์บริการสาธารณสุข 36 บุคคโล',
                                    'ศูนย์บริการสาธารณสุข 37 ประสงค์-สุดสาคร',
                                    'ศูนย์บริการสาธารณสุข 38 จี๊ด-ทองคำบำเพ็ญ',
                                    'ศูนย์บริการสาธารณสุข 39 ราษฎร์บูรณะ',
                                    'ศูนย์บริการสาธารณสุข 40 บางแค',
                                    'ศูนย์บริการสาธารณสุข 41 คลองเตย',
                                    'ศูนย์บริการสาธารณสุข 42 ถนอม ทองสิมา',
                                    'ศูนย์บริการสาธารณสุข 43 มีนบุรี',
                                    'ศูนย์บริการสาธารณสุข 44 ลำผักชี หนองจอก',
                                    'ศูนย์บริการสาธารณสุข 45 ร่มเกล้า ลาดกระบัง',
                                    'ศูนย์บริการสาธารณสุข 46 กันตารัติอุทิศ',
                                    'ศูนย์บริการสาธารณสุข 47 คลองขวาง',
                                    'ศูนย์บริการสาธารณสุข 48 นาควัชระ อุทิศ',
                                    'ศูนย์บริการสาธารณสุข 49 วัดชัยพฤกษมาลา',
                                    'ศูนย์บริการสาธารณสุข 50 บึงกุ่ม',
                                    'ศูนย์บริการสาธารณสุข 51 จตุจักร',
                                    'ศูนย์บริการสาธารณสุข 52 สามเสนนอก',
                                    'ศูนย์บริการสาธารณสุข 53 ทุ่งสองห้อง',
                                    'ศูนย์บริการสาธารณสุข 54 ทัศน์เอี่ยม',
                                    'ศูนย์บริการสาธารณสุข 55 เตชะสัมพันธ์',
                                    'ศูนย์บริการสาธารณสุข 56 ทับเจริญ',
                                    'ศูนย์บริการสาธารณสุข 57 บุญเรือง ล้ำเลิศ',
                                    'ศูนย์บริการสาธารณสุข 58 ล้อม-พิมเสน ฟักอุดม',
                                    'ศูนย์บริการสาธารณสุข 59 ทุ่งครุ',
                                    'ศูนย์บริการสาธารณสุข 60 รสสุคนธ์ มโนชญากร',
                                    'ศูนย์บริการสาธารณสุข 61 สังวาลย์ ทัสนารมย์',
                                    'ศูนย์บริการสาธารณสุข 62 ตวงรัชฎ์ ศศะนาวิน',
                                    'ศูนย์บริการสาธารณสุข 63 สมาคมแต้จิ๋วแห่งประเทศไทย',
                                    'ศูนย์บริการสาธารณสุข 64 คลองสามวา',
                                    'ศูนย์บริการสาธารณสุข 65 รักษาศุข บางบอน',
                                    'ศูนย์บริการสาธารณสุข 66 ตำหนักพระแม่กวนอิม',
                                    'ศูนย์บริการสาธารณสุข 67 ทวีวัฒนา',
                                    'ศูนย์บริการสาธารณสุข 68 สะพานสูง',
                                    'ศูนย์บริการสาธารณสุข 69 คันนายาว',
                                    'โรงพยาบาลกลาง',
                                    'โรงพยาบาลตากสิน',
                                    'โรงพยาบาลเจริญกรุงประชารักษ์',
                                    'โรงพยาบาลหลวงพ่อทวีศักดิ์ ชุตินฺธโร อุทิศ',
                                    'โรงพยาบาลเวชการุณย์รัศมิ์',
                                    'โรงพยาบาลนคราภิบาล',
                                    'โรงพยาบาลราชพิพัฒน์',
                                    'โรงพยาบาลสิรินธร',
                                    'โรงพยาบาลผู้สูงอายุบางขุนเทียน',
                                    'โรงพยาบาลรัตนประชารักษ์',
                                    'โรงพยาบาลบางนากรุงเทพมหานคร',
                                    'ศูนย์บริการการแพทย์ฉุกเฉิน กรุงเทพมหานคร (ศูนย์เอราวัณ)',
                                    'โรงพยาบาลวชิรโรงพยาบาล คณะแพทยศาสตร์วชิรพยาบาล มหาวิทยาลัยนวมินทราธิราช',
                                    'โรงพยาบาลเลิดสิน',
                                    'โรงพยาบาลราชวิถี',
                                    'โรงพยาบาลพระมงกุฎเกล้า',
                                    'โรงพยาบาลภูมิพลอดุลยเดช',
                                    'โรงพยาบาลศิริราช',
                                    'โรงพยาบาลจุฬาลงกรณ์',
                                    'สถาบันสุขภาพเด็กแห่งชาติมหาราชินี',
                                    'โรงพยาบาลรามาธิบดี',
                                    'สถาบันราชานุกูล',
                                    'โรงพยาบาลยุวประสาทไวทโยปถัมภ์',
                                    'โรงพยาบาลพระนั่งเกล้า',
                                    'โรงพยาบาลเมตตาประชารักษ์ (วัดไร่ขิง)',
                                    'โรงพยาบาลบุรีรัมย์',
                                    'โรงพยาบาลเปาโล เกษตร',
                                    'โรงพยาบาลเปาโล โชคชัย 4',
                                    'โรงพยาบาลเกษมราษฏร์ บางแค',
                                    'โรงพยาบาลเกษมราษฏร์ รามคำแหง',
                                    'โรงพยาบาลกล้วยน้ำไท',
                                    'โรงพยาบาลมงกุฏวัฒนะ',
                                    'โรงพยาบาลส่งเสริมสุขภาพตำบลบางกระเจ้า',
                                    'โรงพยาบาลส่งเสริมสุขภาพตำบลหินโงม',
                                    'Swing คลินิก',
                                    'คลินิกเวชกรรมกล้วยน้ำไท',
                                    'คลินิกเวชกรรมอารีรักษ์',
                                    'พริบตาคลินิก',
                                ] as $dept)
                                    <option value="{{ $dept }}">{{ $dept }}</option>
                                @endforeach
                            </select>
                        </div>
                </fieldset>

                <!-- footer -->
                <div class="flex items-center justify-between mt-4">
                    <a href="{{ route('smc_report.index') }}"
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

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/th.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- @push('scripts')
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
    @endpush --}}

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // ตั้งค่า Month Picker สำหรับ SMC Report
                const dateConfig = {
                    
                }
                flatpickr("#month_year", {
                    locale: 'th',
                    altInput: true,
                    altFormat: "F Y",
                    dateFormat: "Y-m",
                    disableMobile: "true",
                    plugins: [
                        new monthSelectPlugin({
                            shorthand: false,
                            dateFormat: "Y-m", 
                            altFormat: "F Y",  
                            theme: "light"
                        })
                    ],
                    onReady: function(selectedDates, dateStr, instance) {
                        const container = document.createElement('div');
                        container.className = "p-2 border-t border-gray-200 bg-gray-50 text-right";
                
                        const clearBtn = document.createElement('button');
                        clearBtn.innerHTML = "ล้างค่า";
                        clearBtn.className = "text-xs font-bold text-red-500 px-2 py-1";
                        clearBtn.type = "button";
                        clearBtn.onclick = () => { instance.clear(); instance.close(); };

                        container.appendChild(clearBtn);
                        instance.calendarContainer.appendChild(container);

                            if (instance.altInput && selectedDates.length > 0) {
                            const yearBE = selectedDates[0].getFullYear() + 543;
                            instance.altInput.value = instance.altInput.value.replace(selectedDates[0].getFullYear(), yearBE);
                        }
                    },
                    onValueUpdate: function(selectedDates, dateStr, instance) {
                        if (instance.altInput && selectedDates.length > 0) {
                        const yearBE = selectedDates[0].getFullYear() + 543;
                        instance.altInput.value = instance.altInput.value.replace(selectedDates[0].getFullYear(), yearBE);
                        }
                    }
                });
            });

            let monthYearPickr = flatpickr("#month_year",{
                ...dateConfig,
               onChange: function(selectedDates, dateStr, instance) {
                    if (endDatePicker && selectedDates.length > 0) {
                        endDatePicker.set("minDate", selectedDates[0]); // [cite: 136]
                    }
                } 
            });

            new TomSelect("#smc", {
                maxItems: 1,
                create: false,
                openOnFocus: true, // เปิดลิสต์ทันทีเมื่อ focus
                placeholder: "ระบุ"
            });

            // ตั้งค่าปีเริ่มต้นเป็น พ.ศ. ปัจจุบัน
            document.getElementById('year').value = new Date().getFullYear() + 543;

            // ตัวอย่าง SweetAlert เมื่อบันทึก
            document.getElementById('smcForm').addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'บันทึกข้อมูลสำเร็จ!',
                    text: 'ข้อมูลถูกส่งเรียบร้อยแล้ว',
                    icon: 'success',
                    confirmButtonText: 'ตกลง'
                });
            });

        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('menu').classList.toggle('hidden');
        });

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
    @endpush

</x-app-layout>
