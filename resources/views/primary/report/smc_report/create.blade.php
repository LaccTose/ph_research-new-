<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('บันทึกข้อมูลรายงานการให้บริการ') }}
        </h2>
    </x-slot>

    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/style.css">
        <style>
            .flatpickr-input[readonly] {
                width: 100% !important;
            }

            .flatpickr-wrapper {
                display: block !important;
                width: 100% !important;
            }
        </style>
    @endpush

    <div class="py-2">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="flex flex-col gap-4 p-6 md:flex-row">
                <div class="flex gap-4">
                    <a href="{{ route('smc_report.dashboard') }}"
                        class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
                        Dashboard
                    </a>
                    <a href="{{ route('smc_report.index') }}"
                        class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
                        รายงานการให้บริการ
                    </a>
                </div>
            </div>
        </div>

        <form id="smcForm" method="POST" action="{{ route('smc_report.store') }}"
            class="p-4 bg-white border-t-4 border-green-800 shadow-sm">
            @csrf
            <div class="p-6 text-gray-900">
                <!-- Header -->
                <div class="mb-8 text-center">
                    <h1 class="text-2xl font-bold text-green-800 sm:text-2xl md:text-3xl">
                        แบบบันทึกรายงานผู้รับบริการคลินิกพิเศษรับการส่งต่อ
                    </h1>
                </div>
            </div>
            <!-- Section 1: ข้อมูลทั่วไป -->
            <fieldset class="p-6 mb-8 bg-white border-t-4 border-green-700 rounded-lg shadow-sm">
                <legend class="px-4 text-xl font-bold text-green-800">ข้อมูลทั่วไป</legend>
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <div>
                        <label for="smc" class="block mb-1 text-sm text-gray-700">
                            คลินิกพิเศษ <span class="text-red-500">*</span>
                        </label>
                        <select id="smc" name="smc"
                            class="w-full p-2 text-sm text-gray-700 border rounded-md shadow-sm focus:ring-green-600 focus:border-green-600 
                            {{ $errors->has('smc') ? 'border-red-500' : 'border-gray-300' }}"
                            required>

                            <option value="" disabled {{ old('smc') ? '' : 'selected' }}>
                                -- เลือกคลินิกพิเศษ --
                            </option>

                            @foreach (['ARV (Start)', 'กุมารเวชกรรม', 'จักษุวิทยา', 'ผิวหนัง', 'พัฒนาการเด็ก', 'แพทย์แผนไทย', 'สูตินรีเวชกรรม', 'หู คอ จมูก', 'อายุรศาสตร์ต่อมไร้ท่อและเมแทบอลิซึม', 'อายุรศาสตร์ทั่วไป', 'อายุรศาสตร์โรคหัวใจ'] as $dept)
                                <option value="{{ $dept }}" {{ old('smc') == $dept ? 'selected' : '' }}>
                                    {{ $dept }}
                                </option>
                            @endforeach
                        </select>
                        @error('smc')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="month_year" class="block mb-1 text-sm text-gray-700">
                            เลือกเดือนและปี <span class="text-red-500">*</span>
                        </label>
                        <div class="relative w-full">
                            <input type="text" id="month_year" name="month_year"
                                placeholder="คลิกเพื่อเลือกเดือนและปี" value="{{ old('month_year') }}"
                                class="w-full p-2 text-sm text-gray-700 border rounded-md shadow-sm focus:ring-green-600 focus:border-green-600 
                                {{ $errors->has('month_year') ? 'border-red-500' : 'border-gray-300' }}"
                                required>
                            @error('month_year')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset class="p-6 mb-8 bg-white border-t-4 border-green-700 rounded-lg shadow-sm ">
                <legend class="px-4 text-xl font-bold text-green-800">จำนวนผู้รับบริการ</legend>
                <div class="mt-4 space-y-4">
                    <div class="flex flex-col">
                        <label for="smcWalkInCount" class="block mb-1 text-sm text-gray-700">
                            1. จำนวนผู้รับบริการคลินิกพิเศษ Walk In
                            <p class="mt-1 text-xs text-gray-500">
                                (ผู้ป่วยที่เดินทางเข้ามารับการรักษาที่คลินิกพิเศษเอง)</p>
                        </label>
                        <div class="flex">
                            <input type="number" id="smcWalkInCount" name="smcWalkInCount"
                                value="{{ old('smcWalkInCount', 0) }}"
                                class="w-full p-2 text-sm text-gray-700 border rounded-md shadow-sm 
                                {{ $errors->has('smcWalkInCount') ? 'border-red-500' : 'border-gray-300' }}
                                lg:w-1/2 focus:ring-green-600 focus:border-green-600"
                                placeholder="ครั้ง" min="0">
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <label for="smcReferInCount" class="block mb-1 text-sm text-gray-700">
                            2. จำนวนผู้รับบริการคลินิกพิเศษ Refer In
                            <p class="mt-1 text-xs text-gray-500">(ผู้ป่วยที่รับการส่งต่อมาจาก
                                ศบส.หรือสถานพยาบาลอื่น)</p>
                        </label>
                        <div class="flex">
                            <input type="number" inputmode="numeric" id="smcReferInCount" name="smcReferInCount"
                                value="{{ old('smcReferInCount', 0) }}"
                                class="w-full p-2 text-sm text-gray-700 border rounded-md shadow-sm 
                                {{ $errors->has('smcReferInCount') ? 'border-red-500' : 'border-gray-300' }}
                                lg:w-1/2 focus:ring-green-600 focus:border-green-600 bg-gray-100 "
                                placeholder="ครั้ง" min="0" readonly>
                        </div>
                    </div>

                    <div class="flex flex-col w-full">
                        <label class="block mb-1 text-sm text-gray-700">จำแนกตามหน่วยบริการ</label>

                        <div id="hospital-list" class="space-y-2">
                            <div class="flex items-start gap-2 hospital-row">
                                <div class="flex-1">
                                    <select name="smcReferInUnit[]" required
                                        class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">
                                        <option value="">-- ตัวเลือกสถานพยาบาล --</option>
                                        @foreach ([
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

                                <div class="w-1/2">
                                    <input type="number" id="smcReferInUnitCount[]" name="smcReferInUnitCount[]"
                                        value="{{ old('smcReferInUnitCount', 0) }}"
                                        class="w-full p-2 text-sm border rounded-md shadow-sm
                                    {{ $errors->has('smcReferInUnitCount') ? 'border-red-500' : 'border-gray-300' }}
                                    focus:ring-green-600 focus:border-green-600"
                                        placeholder="ครั้ง" min="0">

                                    @error('smcReferInUnitCount')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="button" onclick="removeRow(this)"
                                    class="p-2 text-red-500 hover:text-red-700 focus:outline-none btn-delete hidden"
                                    title="ลบแถวนี้ ">
                                    <i class="fa-solid fa-trash"></i>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>

                                <div class="flex items-center gap-1 flex-shrink-0 mt-0.5 min-w-[100px]">
                                    <button type="button" onclick="addRow()"
                                        class="flex items-center p-2 text-sm font-medium text-green-600 transition-colors rounded-md hover:bg-green-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4" />
                                        </svg>
                                        <span class="hidden ml-1 sm:inline">เพิ่มแถว</span>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <label for="teleconsultTotal" class="block mb-1 text-sm text-gray-700">
                            3. จำนวนผู้รับบริการผ่านระบบ Teleconsult ทั้งหมด
                        </label>
                        <div class="flex">
                            <input type="number" id="teleconsultTotal" name="teleconsultTotal"
                                value="{{ old('teleconsultTotal', 0) }}"
                                class="w-full p-2 text-sm text-gray-700 border rounded-md shadow-sm 
                                {{ $errors->has('teleconsultTotal') ? 'border-red-500' : 'border-gray-300' }}
                                lg:w-1/2 focus:ring-green-600 focus:border-green-600 bg-gray-100"
                                placeholder="ครั้ง" min="0" readonly>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="flex gap-2">
                            <div class="w-1/2">
                                <label for="teleconsultHcToHc" class="block mb-1 text-sm text-gray-700">
                                    Teleconsult ระหว่างศบส. กับ ศบส.
                                    <p class="mt-1 text-xs text-gray-500">(ให้คำปรึกษา ศบส. อื่น)</p>
                                </label>
                                <input type="number" id="teleconsultHcToHc" name="teleconsultHcToHc"
                                    value="{{ old('teleconsultHcToHc', 0) }}"
                                    class="w-full p-2 text-sm border rounded-md shadow-sm
                                    {{ $errors->has('teleconsultHcToHc') ? 'border-red-500' : 'border-gray-300' }}
                                    focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง" min="0">

                                @error('teleconsultHcToHc')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-1/2">
                                <label for="teleconsultHcToHosp" class="block mb-1 text-sm text-gray-700">
                                    Teleconsult ระหว่างศบส. กับ รพ.
                                    <p class="mt-1 text-xs text-gray-500">(รับคำปรึกษาจาก รพ.)</p>
                                </label>
                                <input type="number" id="teleconsultHcToHosp" name="teleconsultHcToHosp"
                                    value="{{ old('teleconsultHcToHosp', 0) }}"
                                    class="w-full p-2 text-sm border rounded-md shadow-sm
                                    {{ $errors->has('teleconsultHcToHosp') ? 'border-red-500' : 'border-gray-300' }}
                                    focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง" min="0">

                                @error('teleconsultHcToHosp')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <label for="referOutTotal" class="block mb-1 text-sm text-gray-700">
                            4. จำนวนผู้รับบริการที่ต้องส่งรักษาต่อ รพ. (Refer Out)
                        </label>
                        <div class="flex">
                            <input type="number" id="referOutTotal" name="referOutTotal"
                                value="{{ old('referOutTotal', 0) }}"
                                class="w-full p-2 text-sm text-gray-700 border rounded-md shadow-sm 
                                {{ $errors->has('referOutTotal') ? 'border-red-500' : 'border-gray-300' }}
                                lg:w-1/2 focus:ring-green-600 focus:border-green-600 bg-gray-100"
                                placeholder="ครั้ง" min="0" readonly>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <label for="referOutWalkIn" class="block mt-3 text-sm text-gray-700 underline">
                            รายละเอียดการส่งรักษาต่อ รพ.
                        </label>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex gap-2">
                            <div class="w-1/2">
                                <label for="referOutWalkIn" class="block mb-1 text-sm text-gray-700">
                                    ผู้ป่วย Walk In
                                </label>
                                <input type="number" id="referOutWalkIn" name="referOutWalkIn"
                                    value="{{ old('referOutWalkIn', 0) }}"
                                    class="w-full p-2 text-sm border rounded-md shadow-sm
                                    {{ $errors->has('referOutWalkIn') ? 'border-red-500' : 'border-gray-300' }}
                                    focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง" min="0">

                                @error('referOutWalkIn')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-1/2">
                                <label for="referOutFromHc" class="block mb-1 text-sm text-gray-700">
                                    ผู้ป่วยที่รับการส่งต่อจาก ศบส. (Refer In)
                                </label>
                                <input type="number" id="referOutFromHc" name="referOutFromHc"
                                    value="{{ old('referOutFromHc', 0) }}"
                                    class="w-full p-2 text-sm border rounded-md shadow-sm
                                    {{ $errors->has('referOutFromHc') ? 'border-red-500' : 'border-gray-300' }}
                                    focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง" min="0">

                                @error('referOutFromHc')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{--<div class="flex flex-col">
                        <label for="referOutHospName" class="block mb-1 text-sm text-gray-700">
                            จำแนกตามหน่วยบริการ
                        </label>

                        <div class="flex gap-2">
                            <div class="w-1/2">
                                <input type="text" id="referOutHospName" name="referOutHospName"
                                    value="{{ old('referOutHospName') }}"
                                    class="w-full p-2 text-sm border rounded-md shadow-sm
                                    {{ $errors->has('referOutHospName') ? 'border-red-500' : 'border-gray-300' }}
                                    focus:ring-green-600 focus:border-green-600"
                                    placeholder="ระบุชื่อสถานพยาบาล">

                                @error('referOutHospName')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-1/2">
                                <input type="number" id="referOutHospCount" name="referOutHospCount"
                                    value="{{ old('referOutHospCount', 0) }}"
                                    class="w-full p-2 text-sm border rounded-md shadow-sm
                                    {{ $errors->has('referOutHospCount') ? 'border-red-500' : 'border-gray-300' }}
                                    focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง" min="0">

                                @error('referOutHospCount')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>--}}

                     <div class="flex flex-col w-full">
                        <label class="block mb-1 text-sm text-gray-700">จำแนกตามหน่วยบริการ</label>

                        <div id="hospital-list" class="space-y-2">
                            <div class="flex items-start gap-2 hospital-row">
                                <div class="flex-1">
                                    <select name="smcReferInUnit[]" required
                                        class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">
                                        <option value="">-- ตัวเลือกสถานพยาบาล --</option>
                                        @foreach ([
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

                                <div class="w-1/2">
                                    <input type="number" id="smcReferInUnitCount[]" name="smcReferInUnitCount[]"
                                        value="{{ old('smcReferInUnitCount', 0) }}"
                                        class="w-full p-2 text-sm border rounded-md shadow-sm
                                    {{ $errors->has('smcReferInUnitCount') ? 'border-red-500' : 'border-gray-300' }}
                                    focus:ring-green-600 focus:border-green-600"
                                        placeholder="ครั้ง" min="0">

                                    @error('smcReferInUnitCount')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="button" onclick="removeRow(this)"
                                    class="p-2 text-red-500 hover:text-red-700 focus:outline-none btn-delete hidden"
                                    title="ลบแถวนี้ ">
                                    <i class="fa-solid fa-trash"></i>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>

                                <div class="flex items-center gap-1 flex-shrink-0 mt-0.5 min-w-[100px]">
                                    <button type="button" onclick="addRow()"
                                        class="flex items-center p-2 text-sm font-medium text-green-600 transition-colors rounded-md hover:bg-green-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4" />
                                        </svg>
                                        <span class="hidden ml-1 sm:inline">เพิ่มแถว</span>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
            </fieldset>

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
                    <button type="reset" id="btn-cancel"
                        class="px-4 py-2 text-gray-700 transition bg-gray-300 rounded hover:bg-gray-400">
                        ยกเลิก
                    </button>
                </div>
            </div>
        </form>
    </div>

    @push('scripts')
        <script src="https://npmcdn.com/flatpickr/dist/l10n/th.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                function formatThaiMonthYear(selectedDates, instance) {
                    if (instance.altInput && selectedDates && selectedDates.length > 0) {
                        const date = selectedDates[0];
                        const thaiMonths = [
                            "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
                            "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
                        ];

                        const month = thaiMonths[date.getMonth()];
                        const yearBE = date.getFullYear() + 543;
                        instance.altInput.value = `${month} ${yearBE}`;

                    } else if (instance.altInput) {
                        instance.altInput.value = ""; // กรณีล้างค่า
                    }
                }

                    flatpickr("#month_year", {
                        locale: 'th',
                        altInput: true,
                        static: true,
                        dateFormat: "Y-m",
                        disableMobile: true,
                        plugins: [
                            new monthSelectPlugin({
                                shorthand: false,
                                dateFormat: "Y-m",
                                altFormat: "F Y",
                                theme: "light"
                            })
                        ],

                    onReady: function(selectedDates, dateStr, instance) {

                        //ปุ่มล้างค่า
                        const container = document.createElement('div');
                        container.className = "p-2 border-t border-gray-200 bg-gray-50 text-right";
                        const clearBtn = document.createElement('button')
                        clearBtn.innerHTML = "ล้างค่า";
                        clearBtn.className = "text-xs font-bold text-red-500 px-2 py-1";
                        clearBtn.type = "button";

                        clearBtn.onclick = () => {
                            instance.clear();
                            instance.close();
                        };

                        container.appendChild(clearBtn);
                        instance.calendarContainer.appendChild(container);

                        //แสดงปีเป็นพ.ศ.ตั้งแต่โหลด
                        formatThaiMonthYear(selectedDates, instance);
                    },

                    onValueUpdate: function(selectedDates, dateStr, instance) {
                        formatThaiMonthYear(selectedDates, instance);
                    }

                });

                //auto-calculate total refer out
                const walkIn = document.getElementById('referOutWalkIn');
                const fromHc = document.getElementById('referOutFromHc');
                const total = document.getElementById('referOutTotal');
                const hospCount = document.getElementById('referOutHospCount');

                if (walkIn && fromHc && total && hospCount) {
                    const updateSum = () => {
                        total.value = (parseInt(walkIn.value) || 0) + (parseInt(fromHc.value) || 0) + (parseInt(
                            hospCount.value) || 0);
                    };
                    walkIn.addEventListener('input', updateSum);
                    fromHc.addEventListener('input', updateSum);
                    hospCount.addEventListener('input', updateSum);
                }

                const yearInput = document.getElementById('year');
                if (yearInput) {
                    yearInput.value = new Date().getFullYear() + 543;
                }

                const menuToggle = document.getElementById('menu-toggle');
                if (menuToggle) {
                    menuToggle.addEventListener('click', function() {
                        document.getElementById('menu').classList.toggle('hidden');
                    });
                }

                @if (session('success'))
                    Swal.fire({
                        title: 'สำเร็จ!',
                        text: '{{ session('success') }}',
                        icon: 'success'
                    });
                @endif

                const form = document.getElementById('smcForm');
                if (form) {
                    form.addEventListener('submit', function() {
                        const btn = this.querySelector('button[type="submit"]');
                        btn.disabled = true;
                        btn.innerText = 'กำลังบันทึก';
                        btn.classList.add('opacity-50', 'cursor-not-allowed');
                    });
                }

                const teleconsult = document.getElementById('teleconsultTotal');
                const teleHcToHc = document.getElementById('teleconsultHcToHc');
                const teleHcToHosp = document.getElementById('teleconsultHcToHosp');

                if (teleconsult && teleHcToHc && teleHcToHosp) {
                    const updateTeleconsultSum = () => {
                        teleconsult.value = (parseInt(teleHcToHc.value) || 0) + (parseInt(teleHcToHosp.value) || 0);
                    };
                    teleHcToHc.addEventListener('input', updateTeleconsultSum);
                    teleHcToHosp.addEventListener('input', updateTeleconsultSum);

                }
            });

            // ดักจับการเปลี่ยนค่าสถานพยาบาล (ห้ามเลือกซ้ำ)
            const hospitalContainer = document.getElementById('hospital-list');
            if (hospitalContainer) {
                hospitalContainer.addEventListener('change', function(e) {
                    // ตรวจสอบว่าตัวที่เปลี่ยนค่าคือ select ของสถานพยาบาลใช่ไหม
                    if (e.target && e.target.matches('[name="smcReferInUnit[]"]')) {
                        const currentSelect = e.target;
                        const selectedValue = currentSelect.value;

                        // ถ้าผู้ใช้เลือกกลับเป็นค่าว่าง ("-- ตัวเลือกสถานพยาบาล --") ไม่ต้องเช็ค
                        if (selectedValue === "") return;

                        // ดึง select ของสถานพยาบาลทั้งหมดที่มีอยู่ในหน้าเว็บตอนนี้มาตรวจสอบ
                        const allSelects = hospitalContainer.querySelectorAll('[name="smcReferInUnit[]"]');
                        let duplicateCount = 0;

                        allSelects.forEach(select => {
                            if (select.value === selectedValue) {
                                duplicateCount++;
                            }
                        });

                        // ถ้าเจอว่ามีค่านี้ถูกเลือกมากกว่า 1 ครั้ง (แสดงว่าซ้ำ)
                        if (duplicateCount > 1) {
                            // แจ้งเตือนด้วย SweetAlert
                            Swal.fire({
                                title: 'ไม่สามารถใช้ตัวเลือกนี้ได้',
                                text: `"${selectedValue}" ถูกใช้ไปแล้ว `,
                                icon: 'warning',
                                confirmButtonText: 'ตกลง',
                                confirmButtonColor: '#10B981'
                            });

                            // รีเซ็ต select ตัวที่เพิ่งเลือกซ้ำ ให้กลับไปเป็นค่าเริ่มต้นทันที
                            currentSelect.selectedIndex = 0;
                        }
                    }
                });
            }

            function updateReferInTotal() {
                let sum = 0;

                // เลือกเฉพาะช่องกรอกจำนวนที่อยู่ภายใต้ #hospital-list มารวมกัน
                const container = document.getElementById('hospital-list');
                if (container) {
                    container.querySelectorAll('[name="smcReferInUnitCount[]"]').forEach(input => {
                        sum += parseInt(input.value) || 0;
                    });
                }

                // นำผลรวมไปใส่ในช่องสีเทา (2. จำนวนผู้รับบริการคลินิกพิเศษ Refer In)
                const referInTotal = document.getElementById('smcReferInCount');
                if (referInTotal) {
                    referInTotal.value = sum;
                }
            }

            // 2. ใช้ Event Delegation ดักฟังการพิมพ์ที่ Container หลัก
                const hospitalList = document.getElementById('hospital-list');
                if (hospitalList) {
                    hospitalList.addEventListener('input', function(e) {
                        // ถ้าสิ่งที่ผู้ใช้กำลังพิมพ์อยู่ มี name ตรงกับช่องจำนวน ให้คำนวณใหม่ทันที
                        if (e.target && e.target.matches('[name="smcReferInUnitCount[]"]')) {
                            updateReferInTotal();
                        }
                    });
                }

            function addRow() {
                const container = document.getElementById('hospital-list');
                const rows = container.querySelectorAll('.hospital-row');
                const lastRow = rows[rows.length - 1];

                if (lastRow) {
                    const selectField = lastRow.querySelector('[name="smcReferInUnit[]"]');
                    const inputField = lastRow.querySelector('[name="smcReferInUnitCount[]"]');

                    if (selectField) selectField.classList.remove('border-red-500');
                    if (inputField) inputField.classList.remove('border-red-500');

                    let isSelectInvalid = selectField ? (selectField.selectedIndex === 0 || selectField.value.trim() === "") :
                        false;
                    const isInputInvalid = !inputField || inputField.value.trim() === "" || parseInt(inputField.value) <= 0;

                    if (isSelectInvalid || isInputInvalid) {
                        Swal.fire({
                            title: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                            icon: 'warning',
                            confirmButtonText: 'ตกลง',
                            confirmButtonColor: '#10B981'
                        });

                        if (isSelectInvalid && selectField) selectField.classList.add('border-red-500');
                        if (isInputInvalid && inputField) inputField.classList.add('border-red-500');

                        return;
                    }
                }

                // --- ส่วนของการ Clone แถวใหม่ ---
                const newRow = lastRow.cloneNode(true);

                newRow.querySelectorAll('input').forEach(input => {
                    input.value = '';
                    input.classList.remove('border-red-500');
                });

                newRow.querySelectorAll('select').forEach(select => {
                    select.selectedIndex = 0;
                    select.classList.remove('border-red-500');
                });

                //ปุ่มลบแสดงเมื่อ เพิ่มแถวที่ 2 เป็นต้นไปเท่านั้น
                const deleteBtn = newRow.querySelector('.btn-delete');
                if (deleteBtn) {
                    deleteBtn.classList.remove('hidden');
                }

                container.appendChild(newRow);
            }

            //Reset ฟอร์มและลบแถวเกินเมื่อยกเลิก
            const btnCancel = document.getElementById('btn-cancel');
            if (btnCancel) {
                btnCancel.addEventListener('click', function(e) {
                    // ดึงแถวสถานพยาบาลทั้งหมดมาตรวจสอบ
                    const container = document.getElementById('hospital-list');
                    if (container) {
                        const rows = container.querySelectorAll('.hospital-row');
                        
                        // วนลูปเริ่มลบตั้งแต่แถวที่ 2 เป็นต้นไป (อินเด็กซ์ที่ 1 ขึ้นไป)
                        for (let i = 1; i < rows.length; i++) {
                            rows[i].remove();
                        }
                    }

                    // ใช้ setTimeout หน่วงเวลาเสี้ยววินาที เพื่อรอให้เบราว์เซอร์เคลียร์ค่าใน Input สำเร็จก่อน
                    setTimeout(() => {
                        // สั่งให้คำนวณยอดรวมใหม่ (ยอดรวมในช่องสีเทาจะดีดกลับเป็น 0 อัตโนมัติ)
                        if (typeof updateReferInTotal === "function") {
                            updateReferInTotal();
                        }
                    }, 50); 
                });
            }

            function removeRow(btn) {
                const container = document.getElementById('hospital-list');
                const rows = container.querySelectorAll('.hospital-row');
                const currentRow = btn.closest('.hospital-row');

                if (rows.length > 1 && currentRow !== rows[0]) {
                    currentRow.remove();

                    //เรียกฟังก์ชันอัปเดตยอดรวม
                    if (typeof updateReferInTotal === "function") {
                        updateReferInTotal();
                    }
                }
            }
        </script>
    @endpush
</x-app-layout>
