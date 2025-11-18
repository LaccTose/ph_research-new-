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
                    ระบบบันทึกข้อมูลรายงานการให้บริการ
                </h1>
                <p class="mt-2 text-lg text-green-700">
                    ศูนย์สนับสนุนบริการสุขภาพเวชศาสตร์เขตเมือง (Urban Medicine Service Center : UMSC)
                </p>
            </div>

            <!-- Form -->
            <form id="umscForm" novalidate>
                <!-- Section 1: ข้อมูลทั่วไป -->
                <fieldset class="p-6 mb-8 bg-white border-t-4 border-green-700 rounded-lg shadow-sm">
                    <legend class="px-4 text-xl font-bold text-green-800">ข้อมูลทั่วไป</legend>
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                        <div>
                            <label for="healthCenter" class="block mb-1 text-sm text-gray-700">
                                ศูนย์บริการสาธารณสุข <span class="text-red-500">*</span>
                            </label>
                            <select id="healthCenter" name="healthCenter" required
                                class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600">
                                @for ($i = 1; $i <= 69; $i++)
                                    <option value="{{ $i }}">ศูนย์บริการสาธารณสุข {{ $i }}
                                    </option>
                                @endfor
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

                <!-- Section 2: ตัวอย่างข้อมูล -->
                <fieldset class="p-6 mb-8 bg-white border-t-4 border-green-700 rounded-lg shadow-sm">
                    <legend class="px-4 text-xl font-bold text-green-800">ตัวอย่างข้อมูลการให้บริการ</legend>
                    <p class="px-4 mb-5 text-xs text-gray-500">(จำนวนการให้บริการ ดังนี้ จุดให้บริการ UMSC
                        ในศูนย์บริการสาธารณสุข, Facebok, โทรศัพท์ เป็นต้น)
                        <span class="text-red-500 ">"ยกเว้นช่องทาง Line OA"</span>
                    </p>

                    <div class="grid grid-cols-1 gap-6 mt-4 md:grid-cols-2 lg:grid-cols-3 ">
                        <div class="col-span-1">
                            <label for="allUser" class="block mb-1 text-sm text-gray-700">ผู้รับบริการทั้งหมด</label>
                            <div class="flex gap-2">
                                <input type="number" id="allUser" name="allUser" min="0" value="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600" readonly>
                                <input type="number" id="allUserTimes" name="allUserTimes" min="0"
                                    value="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600" readonly>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="healthConsultPeople" class="block mb-1 text-sm text-gray-700">
                                1.การให้คำปรึกษาปัญหาสุขภาพ และการให้ข้อมูลสุขภาพฯ</label>
                            <div class="flex gap-2">
                                <input type="number" id="healthConsultPeople" name="healthConsultPeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="healthConsultTimes" name="healthConsultTimes" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="serviceAdvicePeople" class="block mb-1 text-sm text-gray-700">
                                2.การให้คำแนะนำบริการของศูนย์บริการสาธารณสุข</label>
                            <div class="flex gap-2">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="serviceAdvicePeople" name="serviceAdvicePeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="appointmentPeople" class="block mb-1 text-sm text-gray-700">
                                3.การนัดหมายบริการสุขภาพ</label>
                            <div class="flex gap-2">
                                <input type="number" id="appointmentPeople" name="appointmentPeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="appointmentPeople" name="appointmentPeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="referralCoordPeople" class="block mb-1 text-sm text-gray-700">
                                4.การประสานส่งต่อผู้ป่วย</label>
                            <div class="flex gap-2">
                                <input type="number" id="referralCoordPeople" name="referralCoordPeople"
                                    min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="referralCoordPeople" name="referralCoordPeople"
                                    min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="homeVisitPeople" class="block mb-1 text-sm text-gray-700">
                                5.การประสานการให้บริการเยี่ยมบ้าน</label>
                            <div class="flex gap-2">
                                <input type="number" id="homeVisitPeople" name="homeVisitPeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="homeVisitPeople" name="homeVisitPeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="disabilityCertPeople" class="block mb-1 text-sm text-gray-700">
                                6.การออกเอกสารรับรองความพิการทางการเคลื่อนไหวหรือทางร่างกาย</label>
                            <div class="flex gap-2">
                                <input type="number" id="healthConsultPeople" name="healthConsultPeople"
                                    min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="disabilityCertPeople" name="disabilityCertPeople"
                                    min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="supportRequestPeople" class="block mb-1 text-sm text-gray-700">
                                7.การขอรับการสนับสนุนอุปกรณ์ช่วยเหลือทางการเคลื่อนไหว/วัสดุทางการแพทย์และสาธารณสุข</label>
                            <div class="flex gap-2">
                                <input type="number" id="supportRequestPeople" name="supportRequestPeople"
                                    min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="supportRequestPeople" name="supportRequestPeople"
                                    min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="telehealthPeople" class="block mb-1 text-sm text-gray-700">
                                8.Telehealth</label>
                            <div class="flex gap-2">
                                <input type="number" id="telehealthPeople" name="telehealthPeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="telehealthPeople" name="telehealthPeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="othersPeople" class="block mb-1 text-sm text-gray-700">
                                9. อื่นๆ</label>
                            <div class="flex gap-2 mb-2">
                                <input type="number" id="othersPeople" name="othersPeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="othersTimes" name="othersTimes"min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                            <input type="text" id="othersSpecify" name="othersSpecify"
                                class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600"
                                placeholder="โปรดระบุ...">
                        </div>
                    </div>
                </fieldset>

                <!-- Section 3 -->
                <fieldset class="p-6 mb-8 bg-white border-t-4 border-green-700 rounded-lg shadow-sm">
                    <legend class="px-2 text-xl font-bold text-green-800">ข้อมูลการให้บริการผ่าน LINE Official Account
                        (LINE OA)</legend>
                    <p class="px-4 mb-5 text-sm text-gray-500">(จำนวนการให้บริการเฉพาะ LINE Official Account)</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-4">
                        <!-- LINE OA Total Users (Auto-calculated) -->
                        <div class="col-span-1">
                            <label for="lineOATotalPeople"
                                class="block mb-1 text-sm text-gray-700">ผู้รับบริการทั้งหมด (LINE
                                OA)</label>
                            <div class="flex space-x-2">
                                <input type="number" id="lineOATotalPeople" name="lineOATotalPeople" min="0"
                                    value="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600" readonly>
                                <input type="number" id="lineOATotalTimes" name="lineOATotalTimes" min="0"
                                    value="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600" readonly>
                            </div>
                        </div>

                        <!--1.lineOAhealthConsult-->
                        <div class="col-span-1">
                            <label for="lineOAhealthConsultPeople"
                                class="block mb-1 text-sm text-gray-700">1.
                                การให้คำปรึกษาปัญหาสุขภาพ และการให้ข้อมูลสุขภาพฯ</label>
                            <div class="flex gap-2">
                                <input type="number" id="lineOAhealthConsultPeople" name="lineOAhealthConsultPeople"
                                    min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm line-sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="lineOAhealthConsultTimes" name="lineOAhealthConsultTimes"
                                    min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm line-sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <!--2.lineOAserviceAdvice-->
                        <div class="col-span-1">
                            <label for="lineOAserviceAdvicePeople"
                                class="block mb-1 text-sm text-gray-700">2.
                                การให้คำแนะนำบริการของศูนย์บริการสาธารณสุข</label>
                            <div class="flex gap-2">
                                <input type="number" id="lineOAserviceAdvicePeople" name="lineOAserviceAdvicePeople"
                                    min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm line-sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="lineOAserviceAdviceTimes" name="lineOAserviceAdviceTimes"
                                    min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm line-sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <!--3.lineOAappointment-->
                        <div class="col-span-1">
                            <label for="lineOAappointmentPeople"
                                class="block mb-1 text-sm text-gray-700">3.
                                การนัดหมายบริการสุขภาพ</label>
                            <div class="flex gap-2">
                                <input type="number" id="lineOAappointmentPeople" name="lineOAappointmentPeople"
                                    min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm line-sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="lineOAappointmentTimes" name="lineOAappointmentTimes"
                                    min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm line-sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <!--4.lineOAreferralCoord-->
                        <div class="col-span-1">
                            <label for="lineOAreferralCoordPeople"
                                class="block mb-1 text-sm text-gray-700">4.
                                การประสานการส่งต่อผู้ป่วย</label>
                            <div class="flex gap-2">
                                <input type="number" id="lineOAreferralCoordPeople" name="lineOAreferralCoordPeople"
                                    min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm line-sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="lineOAreferralCoordTimes" name="lineOAreferralCoordTimes"
                                    min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm line-sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <!--5.lineOAhomeVisit-->
                        <div class="col-span-1">
                            <label for="lineOAhomeVisitPeople" class="block mb-1 text-sm text-gray-700">5.
                                การประสานการให้บริการเยี่ยมบ้าน</label>
                            <div class="flex gap-2">
                                <input type="number" id="lineOAhomeVisitPeople" name="lineOAhomeVisitPeople"
                                    min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm line-sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="lineOAhomeVisitTimes" name="lineOAhomeVisitTimes"
                                    min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm line-sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <!--6.lineOAdisabilityCert-->
                        <div class="col-span-1">
                            <label for="lineOAdisabilityCertPeople"
                                class="block mb-1 text-sm text-gray-700">6.
                                การออกเอกสารรับรองความพิการทางการเคลื่อนไหวหรือทางร่างกาย</label>
                            <div class="flex gap-2">
                                <input type="number" id="lineOAdisabilityCertPeople"
                                    name="lineOAdisabilityCertPeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm line-sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="lineOAdisabilityCertTimes" name="lineOAdisabilityCertTimes"
                                    min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm line-sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <!--7.lineOAsupportRequest-->
                        <div class="col-span-1">
                            <label for="lineOAsupportRequestPeople"
                                class="block mb-1 text-sm text-gray-700">7.
                                การขอรับการสนับสนุนอุปกรณ์ช่วยเหลือทางการเคลื่อนไหว/
                                วัสดุอุปกรณ์ทางการแพทย์และสาธารณสุข</label>
                            <div class="flex gap-2">
                                <input type="number" id="lineOAsupportRequestPeople"
                                    name="lineOAsupportRequestPeople" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm line-sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="lineOAsupportRequestTimes" name="lineOAsupportRequestTimes"
                                    min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm line-sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <!--8.lineOATelehealth-->
                        <div class="col-span-1">
                            <label for="lineOAtelehealthPeople"
                                class="block mb-1 text-sm text-gray-700">8.
                                Telehealth</label>
                            <div class="flex gap-2">
                                <input type="number" id="lineOAtelehealthPeople" name="lineOAtelehealthPeople"
                                    min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm line-sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="lineOAtelehealthTimes" name="lineOAtelehealthTimes"
                                    min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm line-sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                        </div>

                        <!--9.lineOAOther-->
                        <div class="col-span-1">
                            <label for="lineOAothersPeople" class="block mb-1 text-sm text-gray-700">9.
                                อื่น
                                ๆ</label>
                            <div class="flex gap-2 mb-2">
                                <input type="number" id="lineOAothersPeople" name="lineOAothersPeople"
                                    min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm line-sum-source-people focus:ring-green-600 focus:border-green-600"
                                    placeholder="คน">
                                <input type="number" id="lineOAothersTimes" name="lineOAothersTimes" min="0"
                                    class="w-1/2 p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm line-sum-source-times focus:ring-green-600 focus:border-green-600"
                                    placeholder="ครั้ง">
                            </div>
                            <input type="text" id="lineOAothersSpecify" name="lineOAothersSpecify"
                                class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600"
                                placeholder="โปรดระบุ...">
                        </div>

                        <!--lineOAResponse-->
                        <div class="col-span-1">
                            <label for="lineOAResponse"
                                class="block mb-1 text-xs font-bold text-red-500">จำนวนการตอบกลับภายใน 30 นาที</label>
                            <input type="number" id="lineOAResponse" name="lineOAResponse" min="0"
                                class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600" placeholder="ครั้ง">
                        </div>
                    </div>
                </fieldset>

                <!-- Section 3: ผู้รายงาน -->
                <fieldset class="p-6 mb-8 bg-white border-t-4 border-green-700 rounded-lg shadow-sm">
                    <legend class="px-4 text-xl font-bold text-green-800">ข้อมูลผู้รายงาน</legend>
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                        <div>
                            <label for="reporterName" class="block mb-1 text-sm text-gray-700">
                                ชื่อ-สกุล <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="reporterName" name="reporterName"
                                class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600"
                                placeholder="ชื่อ-สกุล">
                        </div>
                        <div>
                            <label for="reporterPosition" class="block mb-1 text-sm text-gray-700">
                                ตำแหน่ง <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="reporterPosition" name="reporterPosition"
                                class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600" placeholder="ตำแหน่ง">
                        </div>

                        <div>
                            <label class="text-sm text-gray-700">
                                เบอร์โทรศัพท์ <span class="text-red-500">*</span></label>
                            <input type="tel" id="reporterPhone" name="reporterPhone" maxlength="12"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\d{2})(\d{4})(\d{0,4}).*/, '$1-$2-$3')" class="w-full p-2 text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-green-600 focus:border-green-600" placeholder="00-0000-0000">
                        </div>

                    </div>
                </fieldset>

                <div class="flex items-center justify-between mt-4">
                    <a href="{{ route('report.index') }}"
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

