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
                    แบบบันทึกรายงานผู้รับบริการ
                </h1>
                <p class="mt-2 text-xl text-green-700">
                    ศูนย์บริการสาธารณสุขพลัส (ศบส.พลัส) 
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
                                ศูนย์บริการสาธารณสุข <span class="text-red-500">*</span>
                            </label>
                            <select id="smc" name="smc" required
                                class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">
                                @foreach ([  
                                        'ศูนย์บริการสาธารณสุข 3 บางซื่อ',
                                        'ศูนย์บริการสาธารณสุข 19 วงศ์สว่าง',
                                        'ศูนย์บริการสาธารณสุข 29 ช่วง นุชเนตร',
                                        'ศูนย์บริการสาธารณสุข 34 โพธิ์ศรี',
                                        'ศูนย์บริการสาธารณสุข 38 จี๊ด-ทองคำบำเพ็ญ',
                                        'ศูนย์บริการสาธารณสุข 39 ราษฎร์บูรณะ',
                                        'ศูนย์บริการสาธารณสุข 41 คลองเตย',
                                        'ศูนย์บริการสาธารณสุข 45 ร่มเกล้า ลาดกระบัง',
                                        'ศูนย์บริการสาธารณสุข 46 กันตารัติอุทิศ',
                                        'ศูนย์บริการสาธารณสุข 47 คลองขวาง',
                                        'ศูนย์บริการสาธารณสุข 52 สามเสนนอก',
                                        'ศูนย์บริการสาธารณสุข 56 ทับเจริญ',
                                        'ศูนย์บริการสาธารณสุข 58 ล้อม-พิมเสน ฟักอุดม',
                                        'ศูนย์บริการสาธารณสุข 67 ทวีวัฒนา',
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

                
               <!-- Section 2:  -->
                <fieldset class="p-6 mb-8 bg-white border-t-4 border-green-700 rounded-lg shadow-sm ">
                    <legend class="px-4 text-xl font-bold text-green-800">การสังเกตอาการ</legend>
                    
                    <div class="mt-4 space-y-4">
                        <div class="flex flex-col">
                            <label for="serviceAdvicePeople" class="block mb-1 text-sm text-gray-700">
                                เวลาสังเกต
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                                    
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label for="serviceAdvicePeople" class="block mt-4 mb-1 text-base text-gray-700 underline">
                                อาการที่ต้อง Observe
                            </label>
                        </div>
                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                น้ำตาลสูง / น้ำตาลต่ำ
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                ความดันสูง / ต่ำ
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                คลื่นไส้อาเจียน
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>
                        
                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                ไข้ / ไอ / จาม / มีน้ำมูก / เจ็บคอ
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                ท้องเสีย / ถ่ายเหลว / ปวดท้อง
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                เวียนศีรษะ / มึนงง / หน้ามืด / ปวดศีรษะ / อ่อนเพลีย / เป็นลม
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                ปัสสาวะแสบขัด / ติดเชื้อทางเดินปัสสาวะ / อักเสบ
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                เหนื่อย / หอบ / ใจสั่น
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                เจ็บหน้าอก / หายใจไม่สะดวก / แน่นหน้าอก
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                แขน-ขาอ่อนแรง / ปากเบี้ยว
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                ผื่นคัน / บวมแดง / มีแผล
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                ให้ยาต่อเนื่อง / สังเกตอาการหลังฉีดยา
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                อาการอื่นๆ / ไม่ระบุ 
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>
                </fieldset>

                <fieldset class="p-6 mb-8 bg-white border-t-4 border-green-700 rounded-lg shadow-sm ">
                    <legend class="px-4 text-xl font-bold text-green-800">วินิจฉัยโรค</legend>
                    <div class="mt-4 space-y-4">
                        <div class="flex flex-col">
                            <label for="serviceAdvicePeople" class="block mb-1 text-sm text-gray-700">
                                (A-B) โรคติดเชื้อ
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                                    
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                (C-D) มะเร็งเนื้องอก โรคเลือด
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                (E) โรคต่อมไร้ท่อ
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                (F) ความผิดปกติทางจิตอพฤติกรรม
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>
                        
                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                (G) โรคระบบประสาท
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                (H) โรคของตา หู
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                (I) โรคระบบไหลเวียนโลหิต
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                (J) โรคระบบทางเดินหายใจ
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                (K) โรคระบบย่อยอาหาร
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                (L) โรคผิวหนังและเนือเยื่อใต้ผิวหนัง
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                (M) โรคระบบกล้ามเนื้อ
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                (N) โรคระบบสืบพันธุ์และทางเดินปสสาวะ
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                (O-P) การตั้งครรภ์ หลังคลอด ภาวะปริกำเนิด
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                (R) อาการ และอาการแสดง
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                (S-T-V-X-Y-Z) การบาดเจ็บ สาเหตุภายนอก
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                อื่นๆ
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>
                </fieldset>
                    
                <fieldset class="p-6 mb-8 bg-white border-t-4 border-green-700 rounded-lg shadow-sm ">
                    <legend class="px-4 text-xl font-bold text-green-800">การรักษา</legend>
                    
                    <div class="mt-4 space-y-4">
                        <div class="flex flex-col">
                            <label for="serviceAdvicePeople" class="block mb-1 text-base text-gray-700 underline">
                                จากศูนย์บริการสาธารณสุข
                            </label>
                        </div>
                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                ยากิน
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label for="serviceAdvicePeople" class="block mb-1 text-sm text-gray-700">
                                ยาฉีด (IM, RI, antibiotic)
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label for="serviceAdvicePeople" class="block mb-1 text-sm text-gray-700">
                                Drip ยา / ให้ IV
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label for="serviceAdvicePeople" class="block mb-1 text-sm text-gray-700">
                                พ่นยา
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label for="serviceAdvicePeople" class="block mt-4 text-base text-gray-700 underline">
                                จากโรงพยาบาล
                            </label>
                        </div>
                        <div class="flex flex-col">
                            <label class="block mb-1 text-sm text-gray-700">
                                ให้ IV
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label for="serviceAdvicePeople" class="block mb-1 text-sm text-gray-700">
                                Drip ยา
                            </label>
                            <div class="flex gap-2">
                                <input type="text" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>
                        
                        <div class="flex flex-col">
                            <label for="serviceAdvicePeople" class="block mt-4 text-base text-gray-700 underline">
                                สถานะ
                            </label>
                        </div>
                        <div class="grid grid-cols-1 gap-2 md:grid-cols-2">
                            <div class="flex flex-col">
                                <label class="block mb-1 text-sm text-gray-700">
                                    D/C
                                </label>
                                <input type="number" name="tele_smc_to_smc" min="0" 
                                    class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600" 
                                    placeholder="คน">
                            </div>

                            <div class="flex flex-col">
                                <label class="block mb-1 text-sm text-gray-700">
                                    Refer
                                </label>
                                <input  type="number" name="tele_smc_to_hospital" min="0" 
                                    class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600" 
                                    placeholder="คน">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label for="serviceAdvicePeople" class="block mt-4 mb-1 text-base text-gray-700 underline">
                                โรงพยาบาลรับการส่งต่อ
                            </label>
                        </div>
                        <div class="grid grid-cols-1 gap-2 md:grid-cols-2">
                            <div class="flex flex-col">
                                <label class="block mb-1 text-sm text-gray-700">
                                    สังกัดกรุงเทพมหานคร
                                </label>
                                <input type="number" name="tele_smc_to_smc" min="0" 
                                    class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600" 
                                    placeholder="คน">
                            </div>

                            <div class="flex flex-col">
                                <label class="block mb-1 text-sm text-gray-700">
                                    สังกัดกระทรวงสาธารณสุข
                                </label>
                                <input  type="number" name="tele_smc_to_hospital" min="0" 
                                    class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600" 
                                    placeholder="คน">
                            </div>
                            
                            <div class="flex flex-col">
                                <label class="block mb-1 text-sm text-gray-700">
                                    โรงพยาบาลเอกชน
                                </label>
                                <input type="number" name="tele_smc_to_smc" min="0" 
                                    class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600" 
                                    placeholder="คน">
                            </div>

                            <div class="flex flex-col">
                                <label class="block mb-1 text-sm text-gray-700">
                                    โรงเรียนแพทย์
                                </label>
                                <input type="number" name="tele_smc_to_hospital" min="0" 
                                    class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600" 
                                    placeholder="คน">
                            </div>

                            <div class="flex flex-col">
                                <label class="block mb-1 text-sm text-gray-700">
                                    อื่นๆ / ไม่ได้ระบุ
                                </label>
                                <input type="number" name="tele_smc_to_hospital" min="0" 
                                    class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600" 
                                    placeholder="คน">
                            </div>
                        </div>
                    </div>
                </fieldset>

                <div class="flex items-center justify-between mt-4">
                    <a href="{{ route('phcp_report.index') }}"
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
