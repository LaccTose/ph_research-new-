<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('ปฏิทินการจัดประชุม/ การจัดกิจกรรม/ การจัดงาน สำนักอนามัย กรุงเทพมหานคร') }}            
        </h2>
    </x-slot>

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <style>
        [x-cloak] {
            display: none;
        }
    </style>

    <div class="antialiased font-soa-chingcha">
        <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
            <div class="container py-2 mx-auto">
                <div class="flex items-stretch gap-1.5">
                <!-- <div class="mb-4 text-xl font-bold text-gray-800">
    			    Schedule Tasks
  			    </div> -->

                <!--filter-->
                <div class="w-1/4 md:h-full">
                    <div class="h-full p-4 font-sans">
                        <div id="dropdown" class="z-10 w-56 h-full p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                            <h6 class="mb-3 text-base font-bold text-center text-gray-900 dark:text-white">
                                กลุ่มเป้าหมาย
                            </h6>
                            <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                                <li class="flex items-center">
                                    <input id="apple" type="checkbox" value=""
                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500"/>

                                    <label for="apple" class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                            ผู้อำนวยการสำนักงาน/กอง
                                    </label>
                                </li>

                                <li class="flex items-center">
                                    <input id="fitbit" type="checkbox" value=""
                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-600 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500" />

                                    <label for="fitbit" class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                        ผู้อำนวยการศูนย์บริการสาธารณสุข
                                    </label>
                                </li>

                                <li class="flex items-center">
                                    <input id="fitbit" type="checkbox" value=""
                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-600 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500" />

                                    <label for="fitbit" class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                        แพทย์
                                    </label>
                                </li>

                                <li class="flex items-center">
                                    <input id="fitbit" type="checkbox" value=""
                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-600 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500" />

                                    <label for="fitbit" class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                        ทันตแพทย์
                                    </label>
                                </li>

                                <li class="flex items-center">
                                    <input id="fitbit" type="checkbox" value=""
                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-600 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500" />

                                    <label for="fitbit" class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                        นายสัตวแพทย์
                                    </label>
                                </li>

                                <li class="flex items-center">
                                    <input id="fitbit" type="checkbox" value=""
                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-600 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500" />

                                    <label for="fitbit" class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                        เภสัชกร
                                    </label>
                                </li>

                                <li class="flex items-center">
                                    <input id="fitbit" type="checkbox" value=""
                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-600 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500" />

                                    <label for="fitbit" class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                        พยาบาลวิชาชีพ
                                    </label>
                                </li>

                                <li class="flex items-center">
                                    <input id="fitbit" type="checkbox" value=""
                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-600 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500" />

                                    <label for="fitbit" class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                        นักวิชาการสาธารณสุข
                                    </label>
                                </li>

                                <li class="flex items-center">
                                    <input id="fitbit" type="checkbox" value=""
                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-600 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500" />

                                    <label for="fitbit" class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                        นักวิชาการสุขาภิบาล
                                    </label>
                                </li>

                                <li class="flex items-center">
                                    <input id="fitbit" type="checkbox" value=""
                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-600 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500" />

                                    <label for="fitbit" class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                        นักสังคมสงเคราะห์
                                    </label>
                                </li>

                                <li class="flex items-center">
                                    <input id="fitbit" type="checkbox" value=""
                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-600 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500" />

                                    <label for="fitbit" class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                        นักรังสีการแพทย์
                                    </label>
                                </li>

                                <li class="flex items-center">
                                    <input id="fitbit" type="checkbox" value=""
                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-600 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500" />

                                    <label for="fitbit" class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                        นักจิตวิทยา
                                    </label>
                                </li>
                        </div>
                    </div>
                    <div class="h-full p-4">
                        {{--<button type="button"
                            class="w-56 px-2 py-2 font-semibold text-white bg-green-700 border rounded-lg shadow-sm hover:bg-green-600"
                            @click="window.location.href='{{ route('bookings.create') }}'">
                            บันทึกข้อมูลการจัดประชุม
                        </button>--}}
                         <a href="{{ route('bookings.create') }}" 
                            class="w-56 px-16 py-3 font-semibold text-white bg-green-700 border rounded-lg shadow-sm hover:bg-green-600">เพิ่มการจอง</a>
                         <form action="{{ route('bookings.store') }}" method="POST">

                    </div>
                   
                </div>
                

            <!--button-->
                <div class="w-full md:w-3/4">
                    <div class="h-full overflow-hidden bg-white rounded-lg shadow">
                        <div class="flex items-center justify-between px-6 py-2 border-b">
                            <div class="text-lg">
                                <button type="button"
                                    class="px-4 py-2 font-semibold text-gray-700 bg-transparent border border-gray-200 rounded hover:bg-gray-200 hover:text-gray-500 hover:border-transparent"
                                    @click="goToToday()">วันนี้
                                </button>
                            </div>

                            <div class="mt-4 mb-4">
                                <span x-text="MONTH_NAMES[month]" class="text-3xl text-gray-700"></span>
                                <span x-text="displayYear" class="ml-1 text-3xl font-bold text-gray-700"></span>
                            </div>

                            <div class="px-1 border rounded-lg" style="padding-top: 2px;">
                                <button type="button"
                                    class="inline-flex p-1 leading-none transition duration-100 ease-in-out rounded-lg cursor-pointer hover:bg-gray-200"
                                    @click="prevMonth(); getNoOfDays()">
                                    <svg class="inline-flex w-6 h-6 leading-none text-gray-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <div class="inline-flex h-6 border-r"></div>
                                <button type="button"
                                    class="inline-flex items-center p-1 leading-none transition duration-100 ease-in-out rounded-lg cursor-pointer hover:bg-gray-200"
                                    @click="nextMonth(); getNoOfDays()">
                                    <svg class="inline-flex w-6 h-6 leading-none text-gray-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                            <div class="-mx-1 -mb-1" x-ignore>
                                <div class="flex flex-wrap border-t border-l">
                                    <template x-for="(day, index) in DAYS" :key="index">
                                        <div style="width: 14.28%"
                                            class="flex items-center justify-center h-8 font-bold text-gray-700 uppercase bg-gray-100 border-b border-r">


                                            <div>
                                                <span x-text="day" class="tracking-wide text-gray-600"></span>
                                            </div>
                                        </div>
                                    </template>
                                </div>


                                <div class="flex flex-wrap border-t border-l">
                                    <template x-for="day in blankdays">
                                        <div style="width: 14.28%; height: 120px"
                                            class="relative px-4 pt-2 text-center border-b border-r">
                                            <div x-text="day.date"
                                                class="flex items-center justify-center w-6 h-6 text-gray-400"></div>
                                        </div>
                                    </template>

                                    <template x-for="(day, index) in no_of_days" :key="index">
                                        <div style="width: 14.28%; height: 120px" class="relative px-4 pt-2 border-b border-r">
                                            <div @click="showEventModal(day.date)" x-text="day.date"
                                                class="inline-flex items-center justify-center w-6 h-6 leading-none text-center transition duration-100 ease-in-out rounded-full cursor-pointer"
                                                :class="{
                                                    'bg-red-400 text-white': isToday(day.date) && day.isCurrentMonth,
                                                    'text-gray-700 hover:bg-blue-200': day.isCurrentMonth && !isToday(day.date),
                                                    'text-gray-400': !day.isCurrentMonth
                                                }">
                                            </div>

                                            <div style="height: 80px;" class="mt-1 overflow-y-auto">
                                                <template
                                                    x-for="event in events.filter(e => new Date(e.event_date).toDateString() === new Date(year, month, day.date).toDateString())">
                                                    <div class="px-2 py-1 mt-1 overflow-hidden border rounded-lg"
                                                        :class="{
                                                            'border-blue-200 text-blue-800 bg-blue-100': event
                                                                .event_theme === 'blue',
                                                            'border-red-200 text-red-800 bg-red-100': event
                                                                .event_theme === 'red',
                                                            'border-yellow-200 text-yellow-800 bg-yellow-100': event
                                                                .event_theme === 'yellow',
                                                            'border-green-200 text-green-800 bg-green-100': event
                                                                .event_theme === 'green',
                                                            'border-purple-200 text-purple-800 bg-purple-100': event
                                                                .event_theme === 'purple'
                                                        }">
                                                        <p x-text="event.event_title" class="text-sm leading-tight truncate">
                                                        </p>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            {{-- <!--pop up-->
		    <div style=" background-color: rgba(0, 0, 0, 0.8)" class="fixed top-0 bottom-0 left-0 right-0 z-40 w-full h-full" x-show.transition.opacity="openEventModal">
			<div class="absolute relative left-0 right-0 max-w-xl p-4 mx-auto mt-24 overflow-hidden">
				<div class="absolute top-0 right-0 inline-flex items-center justify-center w-10 h-10 text-gray-500 bg-white rounded-full shadow cursor-pointer hover:text-gray-800"
					x-on:click="openEventModal = !openEventModal">
					<svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
						<path
							d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z" />
					</svg>
				</div>

				
				<div class="block w-full p-8 overflow-hidden bg-white rounded-lg shadow">
					
					<h2 class="pb-2 mb-6 text-2xl font-bold text-gray-800 border-b">บันทึกข้อมูลการจัดประชุม/การจัดกิจกรรม/การจัดงาน สำนักอนามัย กรุงเทพมหานคร</h2>
				 
					<div class="mb-4">
						<label class="block mb-1 text-sm font-bold tracking-wide text-gray-800">ชื่อเรื่องการจัดประชุม/การจัดกิจกรรม/การจัดงาน</label>
						<input class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded-lg appearance-none focus:outline-none focus:bg-white focus:border-blue-500" type="text" x-model="event_title">
					</div>

                    <!---->
					<div class="mb-4">
						<label class="block mb-1 text-sm font-bold tracking-wide text-gray-800">วันที่จัด</label>
						<input class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded-lg appearance-none focus:outline-none focus:bg-white focus:border-blue-500" type="text" x-model="event_date" readonly>
					</div>

                    <!---->
					<div class="inline-block w-64 mb-4">
						<label class="block mb-1 text-sm font-bold tracking-wide text-gray-800">Select a theme</label>
						<div class="relative">
							<select @change="event_theme = $event.target.value;" x-model="event_theme" class="block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-200 border-2 border-gray-200 rounded-lg appearance-none hover:border-gray-500 focus:outline-none focus:bg-white focus:border-blue-500">
									<template x-for="(theme, index) in themes">
										<option :value="theme.value" x-text="theme.label"></option>
									</template>
								
							</select>
							<div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
							<svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
							</div>
						</div>
					</div>
 
					<div class="mt-8 text-right">
						<button type="button" class="px-4 py-2 mr-2 font-semibold text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100" @click="openEventModal = !openEventModal">
							ยกเลิก
						</button>	
						<button type="button" class="px-4 py-2 font-semibold text-white bg-gray-800 border border-gray-700 rounded-lg shadow-sm hover:bg-gray-700" @click="addEvent()">
							บันทึก
						</button>	
					</div>
				</div>
			</div>
		    </div>
		    <!-- /Modal --> --}}
        </div>

        <script>
            const MONTH_NAMES = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม',
                'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
            ];
            const DAYS = ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'];

            function toISO(dateObj) {
                // คืนค่า yyyy-mm-dd จาก Date หรือจาก (y,m,d)
                const y = dateObj.getFullYear();
                let m = dateObj.getMonth() + 1;
                let d = dateObj.getDate();
                if (m < 10) m = '0' + m;
                if (d < 10) d = '0' + d;
                return `${y}-${m}-${d}`;
            }

            function app() {
                return {
                    month: '',
                    year: '',
                    displayYear: '',
                    no_of_days: [],
                    blankdays: [],
                    // DAYS constant ข้างบนใช้ใน template header
                    events: [
                        // เก็บเป็น ISO string (yyyy-mm-dd) เพื่อเปรียบเทียบง่าย
                        {
                            event_date: toISO(new Date(2020, 3, 1)),
                            event_title: "April Fool's Day",
                            event_theme: 'blue'
                        },
                        {
                            event_date: toISO(new Date(2020, 3, 10)),
                            event_title: "Birthday",
                            event_theme: 'red'
                        },
                        {
                            event_date: toISO(new Date(2020, 3, 16)),
                            event_title: "Upcoming Event",
                            event_theme: 'green'
                        }
                    ],
                    event_title: '',
                    event_date: '',
                    event_theme: 'blue',
                    themes: [{
                            value: "blue",
                            label: "Blue Theme"
                        },
                        {
                            value: "red",
                            label: "Red Theme"
                        },
                        {
                            value: "yellow",
                            label: "Yellow Theme"
                        },
                        {
                            value: "green",
                            label: "Green Theme"
                        },
                        {
                            value: "purple",
                            label: "Purple Theme"
                        }
                    ],
                    openEventModal: false,

                    goToToday() {
                        const today = new Date();
                        this.month = today.getMonth();
                        this.year = today.getFullYear();
                        this.getNoOfDays();
                    },

                    initDate() {
                        let today = new Date();
                        this.month = today.getMonth();
                        this.year = today.getFullYear();
                        this.displayYear = this.year + 543; // ถ้าต้องการพุทธศักราช
                        // this.datepickerValue = toISO(new Date(this.year, this.month, today.getDate())); // ถ้าจะใช้
                    },

                    // ปรับ prev/next ให้ยอมข้ามปี และอัพเดต displayYear เสมอ
                    prevMonth() {
                        this.month--;
                        if (this.month < 0) {
                            this.month = 11;
                            this.year--;
                        }
                        this.displayYear = this.year + 543;
                        this.getNoOfDays();
                    },

                    nextMonth() {
                        this.month++;
                        if (this.month > 11) {
                            this.month = 0;
                            this.year++;
                        }
                        this.displayYear = this.year + 543;
                        this.getNoOfDays();
                    },

                    // ตรวจว่าเป็นวันวันนี้จริงๆ (เปรียบเทียบทั้งปี/เดือน/วัน)
                    isToday(dayDate, dayIsCurrentMonth = true) {
                        // dayDate อาจจะเป็นตัวเลขวันที่ (1..31) หรือ ISO string
                        const today = new Date();
                        const todayIso = toISO(today);

                        let checkIso;
                        if (typeof dayDate === 'string') {
                            // assume ISO yyyy-mm-dd
                            checkIso = dayDate;
                        } else if (!dayIsCurrentMonth) {
                            // ถ้าเป็นช่องของ prev/next month ฟังก์ชันนี้มักจะไม่ถูกเรียกเพื่อ highlight
                            checkIso = '';
                        } else {
                            const d = new Date(this.year, this.month, dayDate);
                            checkIso = toISO(d);
                        }
                        return todayIso === checkIso;
                    },

                    showEventModal(date, monthOverride = null, yearOverride = null) {
                        // date รับได้เป็นตัวเลขหรือ ISO string
                        let iso;
                        if (typeof date === 'number') {
                            const m = monthOverride !== null ? monthOverride : this.month;
                            const y = yearOverride !== null ? yearOverride : this.year;
                            iso = toISO(new Date(y, m, date));
                        } else {
                            iso = date; // assume ISO
                        }
                        this.openEventModal = true;
                        this.event_date = iso; // เก็บเป็น yyyy-mm-dd
                    },

                    addEvent() {
                        if (this.event_title == '') return;

                        // เก็บ events แบบสม่ำเสมอ (ISO yyyy-mm-dd)
                        this.events.push({
                            event_date: this.event_date,
                            event_title: this.event_title,
                            event_theme: this.event_theme
                        });

                        // clear
                        this.event_title = '';
                        this.event_date = '';
                        this.event_theme = 'blue';
                        this.openEventModal = false;
                    },

                    getNoOfDays() {
                        // จำนวนนวันของเดือนปัจจุบัน
                        let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();
                        let firstDayOfMonth = new Date(this.year, this.month, 1).getDay();
                        let prevMonthDays = new Date(this.year, this.month, 0).getDate();

                        // วันที่ของเดือนก่อน (ใช้ในช่องว่าง)
                        let blankdaysArray = [];
                        for (let i = firstDayOfMonth - 1; i >= 0; i--) {
                            blankdaysArray.push({
                                date: prevMonthDays - i,
                                isCurrentMonth: false,
                                // เพื่อให้ template รู้เดือน/ปีของช่องนี้ (กรณีต้องการ showEventModal ด้วย)
                                monthOffset: -1
                            });
                        }

                        // วันที่ของเดือนปัจจุบัน
                        let daysArray = [];
                        for (let i = 1; i <= daysInMonth; i++) {
                            daysArray.push({
                                date: i,
                                isCurrentMonth: true,
                                monthOffset: 0
                            });
                        }

                        // เติมช่องของเดือนถัดไป
                        const totalCells = 42; // 6 แถว * 7 วัน
                        let nextMonthDays = [];
                        let remaining = totalCells - (blankdaysArray.length + daysArray.length);
                        for (let i = 1; i <= remaining; i++) {
                            nextMonthDays.push({
                                date: i,
                                isCurrentMonth: false,
                                monthOffset: +1
                            });
                        }

                        this.blankdays = blankdaysArray;
                        // เก็บ no_of_days เป็น object ของ current month + next month (เพื่อให้ template ใช้งานได้)
                        this.no_of_days = [...daysArray, ...nextMonthDays];
                    }
                }
            }
        </script>

    </div>
</x-app-layout>
