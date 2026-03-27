<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('ปฏิทินการจัดประชุม/ การจัดกิจกรรม/ การจัดงาน สำนักอนามัย กรุงเทพมหานคร') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">

    <style>
        [x-cloak] {
            display: none;
        }
    </style>

    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
            class="fixed z-50 p-4 mb-4 text-sm text-green-800 bg-green-100 border border-green-200 rounded-lg shadow-md top-5 right-5"
            role="alert">
            <div class="flex items-center">
                <span class="mr-2 font-bold">สำเร็จ!</span> {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="antialiased font-soa-chingcha">
        <div x-data="app()" x-init="initDate()" x-cloak>
            <div class="container py-2 mx-auto">
                <div class="flex flex-col md:flex-row md:items-stretch gap-3 md:gap-1.5">

                    <div class="flex flex-col w-full md:w-1/4 md:h-auto">
                        <div class="h-full p-4">
                            <div id="dropdown" class="flex flex-col flex-1 p-4 bg-white rounded-lg shadow">
                                <h6 class="mb-3 text-base font-bold text-center text-gray-900 dark:text-white">
                                    กลุ่มเป้าหมาย
                                </h6>
                                <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                                    <li class="flex items-center">
                                        <input id="group_1" type="checkbox" value="ผู้อำนวยการสำนักงาน/กอง"
                                            x-model="selectedGroup"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="group_1"
                                            class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                            ผู้อำนวยการสำนักงาน/กอง
                                        </label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="group_2" type="checkbox" value="ผู้อำนวยการศูนย์บริการสาธารณสุข"
                                            x-model="selectedGroup"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="group_2"
                                            class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                            ผู้อำนวยการศูนย์บริการสาธารณสุข
                                        </label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="group_3" type="checkbox" value="แพทย์" x-model="selectedGroup"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="group_3"
                                            class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                            แพทย์
                                        </label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="group_4" type="checkbox" value="ทันตแพทย์" x-model="selectedGroup"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 text-primary-600 focus:ring-primary-600 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="group_4"
                                            class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                            ทันตแพทย์
                                        </label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="group_5" type="checkbox" value="นายสัตวแพทย์"
                                            x-model="selectedGroup"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 text-primary-600 focus:ring-primary-600 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="group_5"
                                            class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                            นายสัตวแพทย์
                                        </label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="group_6" type="checkbox" value="เภสัชกร" x-model="selectedGroup"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 text-primary-600 focus:ring-primary-600 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="group_6"
                                            class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                            เภสัชกร
                                        </label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="group_7" type="checkbox" value="พยาบาลวิชาชีพ"
                                            x-model="selectedGroup"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 text-primary-600 focus:ring-primary-600 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="group_7"
                                            class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                            พยาบาลวิชาชีพ
                                        </label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="group_8" type="checkbox" value="นักวิชาการสาธารณสุข"
                                            x-model="selectedGroup"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 text-primary-600 focus:ring-primary-600 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="group_8"
                                            class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                            นักวิชาการสาธารณสุข
                                        </label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="group_9" type="checkbox" value="นักวิชาการสุขาภิบาล"
                                            x-model="selectedGroup"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 text-primary-600 focus:ring-primary-600 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="group_9"
                                            class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                            นักวิชาการสุขาภิบาล
                                        </label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="group_10" type="checkbox" value="นักสังคมสงเคราะห์"
                                            x-model="selectedGroup"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 text-primary-600 focus:ring-primary-600 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="group_10"
                                            class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                            นักสังคมสงเคราะห์
                                        </label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="group_11" type="checkbox" value="นักรังสีการแพทย์"
                                            x-model="selectedGroup"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 text-primary-600 focus:ring-primary-600 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="group_11"
                                            class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                            นักรังสีการแพทย์
                                        </label>
                                    </li>
                                    <li class="flex items-center">
                                        <input id="group_12" type="checkbox" value="นักจิตวิทยา"
                                            x-model="selectedGroup"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 text-primary-600 focus:ring-primary-600 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-1 dark:bg-gray-600 dark:border-gray-500" />
                                        <label for="group_12"
                                            class="ml-2 text-sm font-medium text-gray-800 dark:text-gray-100">
                                            นักจิตวิทยา
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="flex flex-col mt-4">
                                <a href="{{ route('booking.create') }}"
                                    class="w-full py-2 font-semibold text-center text-white bg-green-600 border rounded-lg shadow-sm md:w-full hover:bg-green-700">เพิ่มการจอง
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="flex-1 p-4">
                        <div class="h-full overflow-hidden bg-white rounded-lg shadow">
                            <div class="flex items-center justify-between px-6 py-2 border-b">
                                <div class="flex items-center space-x-2 text-lg">
                                    <button type="button" x-show="view === 'calendar'"
                                        class="px-4 py-2 text-lg font-semibold text-gray-700 bg-gray-100 border border-gray-300 rounded hover:bg-gray-200"
                                        @click="goToToday()">วันนี้
                                    </button>
                                    <button type="button" x-show="view === 'calendar'"
                                        class="px-4 py-2 text-lg font-semibold text-gray-700 bg-gray-100 border border-gray-300 rounded hover:bg-gray-200"
                                        @click="view = 'list'">รายการ
                                    </button>
                                    <button type="button" x-show="view === 'list'"
                                        class="px-4 py-2 text-lg font-semibold text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-100"
                                        @click="view = 'calendar'">กลับไปปฏิทิน
                                    </button>
                                </div>

                                <div class="mt-4 mb-4 text-center">
                                    <h2 x-text="month_names[month] + ' ' + displayYear"
                                        class="text-3xl font-black tracking-wide text-green-700 uppercase"></h2>
                                </div>

                                <div class="px-1 border rounded-lg" style="padding-top: 2px;">
                                    <button type="button" class="p-1 rounded-lg hover:bg-gray-200"
                                        @click="prevMonth()">
                                        <svg class="w-6 h-6 text-gray-500" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7" />
                                        </svg>
                                    </button>
                                    <div class="inline-flex h-6 border-r"></div>
                                    <button type="button" class="p-1 rounded-lg hover:bg-gray-200"
                                        @click="nextMonth()">
                                        <svg class="w-6 h-6 text-gray-500" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div x-show="view === 'calendar'">
                                <div class="flex flex-wrap border-l">
                                    <template x-for="day in days">
                                        <div style="width: 14.28%"
                                            class="grid justify-center h-10 font-bold text-gray-700 bg-gray-100 border-b border-r place-items-center">
                                            <span x-text="day"></span>
                                        </div>
                                    </template>
                                </div>

                                <div class="flex flex-wrap border-l">
                                    <template x-for="day in blankdays">
                                        <div style="width: 14.28%; height: 120px"
                                            class="px-4 pt-2 border-b border-r bg-gray-50/50">
                                            <div x-text="day.date" class="text-gray-300"></div>
                                        </div>
                                    </template>

                                    <template x-for="(day, index) in no_of_days" :key="index">
                                        <div style="width: 14.28%; height: 120px"
                                            class="relative px-4 pt-2 border-b border-r">
                                            <div @click="showEventModal(day.date, day.monthOffset)" x-text="day.date"
                                                class="inline-flex items-center justify-center w-6 h-6 leading-none text-center transition duration-100 ease-in-out rounded-full cursor-pointer"
                                                :class="{
                                                    'bg-red-400 text-white': isToday(day.date, day.isCurrentMonth),
                                                    'text-gray-700 hover:bg-blue-200': day.isCurrentMonth && !isToday(
                                                        day.date, day.isCurrentMonth),
                                                    'text-gray-400': !day.isCurrentMonth
                                                }">
                                            </div>

                                            <!--calendar event-->
                                            <div style="height: 80px;" class="mt-1 overflow-y-auto">
                                                <template
                                                    x-for="event in getFilteredBookings(year, month + day.monthOffset, day.date)"
                                                    :key="event.id">
                                                    <div class="px-2 py-1 mt-1 text-xs text-white truncate bg-green-600 rounded cursor-pointer"
                                                        @click="showEventDetail(event)">
                                                        <!--<span x-text="new Date(event.start_at).toLocaleTimeString('th-TH', {hour:'2-digit', minute:'2-digit'})"></span>-->
                                                        <!--<span
                                                            x-text="event.start_at ? new Date(event.start_at).toLocaleDateString('th-TH') : ''"></span>-->
                                                        <span x-text="event.title"></span>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </template>
                                    <!--ใหม่-->
                                    {{--<template x-for="day in no_of_days">
                                                    <div style="width: 14.28%; height: 120px" class="relative px-4 pt-2 border-b border-r">
                                                        <div x-text="day.date" class="inline-flex items-center justify-center w-6 h-6 rounded-full"
                                                            :class="isToday(day.date, day.isCurrentMonth) ?
                                                                'bg-red-500 text-white' : (day.isCurrentMonth ?
                                                                    'text-gray-700' : 'text-gray-300')">
                                                        </div>
                                                        <div class="mt-1 overflow-y-auto" style="height: 80px;">
                                                            <template x-for="event in getFilteredBookings(year, month + day.monthOffset, day.date)">
                                                                <div class="px-2 py-1 mt-1 text-[10px] text-white bg-green-600 rounded cursor-pointer truncate" @click="showEventDetail(event)">
                                                                    <span x-text="new Date(event.start_at).toLocaleTimeString('th-TH', {hour:'2-digit', minute:'2-digit'})"></span>
                                                                    <span x-text="event.title"></span>
                                                                </div>
                                                            </template>
                                                        </div>
                                                    </div>
                                                </template>--}}
                                    <!--ใหม่-->
                                </div>
                            </div>
                            <!-- List View -->
                            <div x-show="view === 'list'" class="p-6">
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-500">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                            <tr>
                                                <th class="px-4 py-3">วันที่เริ่ม</th>
                                                <th class="px-4 py-3">วันที่สิ้นสุด</th>
                                                <th class="px-4 py-3">เวลาเริ่ม</th>
                                                <th class="px-4 py-3">เวลาสิ้นสุด</th>
                                                <th class="px-4 py-3">ชื่อเรื่อง</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template x-for="event in getMonthBookings()" :key="event.id">
                                                <tr class="bg-white border-b cursor-pointer hover:bg-gray-50"
                                                    @click="showEventDetail(event)">
                                                    <td class="px-4 py-3 font-medium text-gray-900"
                                                        x-text="new Date(event.start_at).toLocaleDateString('th-TH')">
                                                    </td>
                                                    <td class="px-4 py-3 font-medium text-gray-900"
                                                        x-text="new Date(event.end_at).toLocaleDateString('th-TH')">
                                                    </td>
                                                    <td class="px-4 py-3"
                                                        x-text="new Date(event.start_at).toLocaleTimeString('th-TH', {hour:'2-digit', minute:'2-digit'})">
                                                    </td>
                                                    <td class="px-4 py-3"
                                                        x-text="new Date(event.end_at).toLocaleTimeString('th-TH', {hour:'2-digit', minute:'2-digit'})">
                                                    </td>
                                                    <td class="px-4 py-3" x-text="event.title"></td>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>
                                    <template x-if="getMonthBookings().length === 0">
                                        <div class="py-10 text-center text-gray-500">-- ไม่พบรายการ --</div>
                                    </template>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- 1 -->
            <div style="background-color: rgba(0, 0, 0, 0.8)"
                class="fixed inset-0 z-50 flex items-center justify-center" x-show="openEventModal" x-cloak>
                <div class="relative left-0 right-0 max-w-xl p-4 mx-auto mt-24 overflow-hidden ">
                    <div @click="openEventModal = false">
                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z" />
                        </svg>
                    </div>

                    <div class="block w-full p-8 overflow-hidden bg-white rounded-lg shadow">
                        <h2 class="pb-2 mb-6 text-2xl font-bold text-gray-800 border-b">
                            รายละเอียดข้อมูลการจัดประชุม/การจัดกิจกรรม/การจัดงาน สำนักอนามัย กรุงเทพมหานคร</h2>

                        <div class="mb-4">
                            <label
                                class="block mb-1 text-sm font-bold tracking-wide text-gray-800">ชื่อเรื่องการจัดประชุม/การจัดกิจกรรม/การจัดงาน</label>
                            <input
                                class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-100 border rounded-lg appearance-none focus:outline-none"
                                type="text" x-model="event_title" readonly>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1 text-sm font-bold tracking-wide text-gray-800">วันที่เริ่มจัด</label>
                            <input
                                class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-100 border rounded-lg appearance-none focus:outline-none"
                                type="text" x-model="event_date" readonly>
                        </div>
                        <div class="mb-4">
                            <label class="block mb-1 text-sm font-bold tracking-wide text-gray-800">วันที่สิ้นสุด</label>
                            <input
                                class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-100 border rounded-lg appearance-none focus:outline-none"
                                type="text" x-model="" readonly>
                        </div>
                        <div class="mb-4">
                            <label class="block mb-1 text-sm font-bold tracking-wide text-gray-800">เวลาเริ่มต้น</label>
                            <input
                                class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-100 border rounded-lg appearance-none focus:outline-none"
                                type="text" x-model="" readonly>
                        </div>
                        <div class="mb-4">
                            <label class="block mb-1 text-sm font-bold tracking-wide text-gray-800">เวลาสิ้นสุด</label>
                            <input
                                class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-100 border rounded-lg appearance-none focus:outline-none"
                                type="text" x-model="" readonly>
                        </div>

                        <div class="mb-4">
                            <label
                                class="block mb-1 text-sm font-bold tracking-wide text-gray-800">รายละเอียดเพิ่มเติม</label>
                            <textarea
                                class="w-full px-4 py-2 leading-tight text-gray-700 bg-gray-100 border rounded-lg appearance-none focus:outline-none"
                                x-model="event_description" rows="3" readonly></textarea>
                        </div>

                        <div class="flex items-center justify-between pt-6 mt-8 border-t">
                            <div>
                                @if(auth()->user() && auth()->user()->is_admin) 
                                    <div class="flex gap-2">
                                        <button type="button" onclick="editBooking()" 
                                            class="px-4 py-2 text-white transition bg-yellow-500 rounded-lg shadow-sm hover:bg-yellow-600">
                                            แก้ไข
                                        </button>
                                        <form id="deleteForm" method="POST" onsubmit="return confirm('ยืนยันการลบการจองนี้?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                class="px-4 py-2 text-white transition bg-red-500 rounded-lg shadow-sm hover:bg-red-600">
                                                ลบการจอง
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>

                            <div class="mt-8 text-right">
                                <button type="button"
                                    class="px-4 py-2 mr-2 font-semibold text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-100"
                                    @click="openEventModal = false">
                                    ปิดหน้าต่าง
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2 -->
            <div style=" background-color: rgba(0, 0, 0, 0.8)" class="fixed inset-0 z-40 w-full h-full"
                x-show.transition.opacity="openMonthListModal" x-cloak>
                <div class="relative flex flex-col max-w-4xl p-4 mx-auto mt-16 bg-white rounded-lg shadow-xl"
                    @click.away="openMonthListModal = false" style="height: 80vh;">

                    <div class="flex items-center justify-between pb-3 mb-4 border-b">
                        <h2 class="text-2xl font-bold text-gray-800">
                            รายการกิจกรรมประจำเดือน <span x-text="month_names[month] + ' ' + displayYear"></span>
                        </h2>
                        <button @click="openMonthListModal = false"
                            class="text-3xl text-gray-500 hover:text-gray-800">&times;</button>
                    </div>

                    <div class="flex-1 overflow-y-auto">
                        <template x-if="getMonthBookings().length > 0">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">วันที่</th>
                                        <th scope="col" class="px-4 py-3">เวลา</th>
                                        <th scope="col" class="px-4 py-3">ชื่อเรื่อง</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-for="event in getMonthBookings()" :key="event.id">
                                        <tr class="bg-white border-b cursor-pointer hover:bg-gray-50"
                                            @click="openMonthListModal = false; showEventDetail(event)">
                                            <td class="px-4 py-3 font-medium text-gray-900"
                                                x-text="new Date(event.start_at).toLocaleDateString('th-TH', {day:'2-digit', month:'2-digit', year:'numeric'})">
                                            </td>
                                            <td class="px-4 py-3"
                                                x-text="new Date(event.start_at).toLocaleTimeString('th-TH', {hour:'2-digit', minute:'2-digit'})">
                                            </td>
                                            <td class="px-4 py-3" x-text="event.title"></td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </template>
                        <template x-if="getMonthBookings().length === 0">
                            <div class="py-10 text-center text-gray-600">
                                -- ไม่พบรายการกิจกรรมในเดือนนี้ --
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // กำหนดค่าคงที่ไว้นอก app function เพื่อประหยัด memory
            const MONTH_NAMES = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม',
                'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
            ];
            const DAYS = ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'];

            function app() {
                return {
                    view: 'calendar',
                    month_names: MONTH_NAMES,
                    days: DAYS,
                    month: 0,
                    year: 0,
                    displayYear: '', // ปี พ.ศ.
                    no_of_days: [],
                    blankdays: [],
                    selectedGroup: [], // เก็บกลุ่มเป้าหมายที่เลือก
                    bookings: @json($bookings), // ข้อมูลจาก Database

                    // ตัวแปรสำหรับ Modal รายละเอียด
                    openEventModal: false,
                    selectedEvent: null,
                    event_title: '',
                    event_date: '',
                    event_description: '',

                    // ตัวแปรสำหรับ Modal รายชื่อกิจกรรมประจำเดือน
                    openMonthListModal: false,
                    bookings: @json($bookings ?? []), // แก้ตรงนี้ด้วย: ถ้าไม่มีข้อมูลให้เป็น array ว่างป้องกัน Error

                    initDate() {
                        // 1. เช็คความปลอดภัย (ป้องกันหน้า Create พัง)
                        // เช็คว่าถ้าไม่มี bookings ส่งมาจาก PHP (ซึ่งหน้า Create มักจะไม่มี) ให้หยุดทำงาน
                        if (typeof this.bookings === 'undefined' || this.bookings === null) {
                            console.log('Skipping Calendar Init: No bookings data');
                            return;
                        }

                        // 2. ตั้งค่าวันที่ปัจจุบัน
                        let today = new Date();
                        this.month = today.getMonth();
                        this.year = today.getFullYear();
                        this.displayYear = this.year + 543;

                        // --- จุดสำคัญที่ต้องเพิ่ม ---
                        // กำหนดค่า booking_date เริ่มต้นเป็นวันนี้ เพื่อไม่ให้ฟังก์ชัน split('-') พัง
                        let d = String(today.getDate()).padStart(2, '0');
                        let m = String(today.getMonth() + 1).padStart(2, '0');
                        let y = today.getFullYear();
                        this.booking_date = `${y}-${m}-${d}`;
                        // -----------------------

                        // 3. รันคำนวณจำนวนวันในปฏิทิน
                        this.getNoOfDays();
                    },

                    goToToday() {
                        const today = new Date();
                        this.month = today.getMonth();
                        this.year = today.getFullYear();
                        this.displayYear = this.year + 543;
                        this.getNoOfDays();
                    },

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

                    // ฟังก์ชันตรวจว่าเป็นวันวันนี้จริงหรือไม่
                    isToday(dayDate, isCurrentMonth) {
                        if (!isCurrentMonth) return false;
                        const today = new Date();
                        const d = new Date(this.year, this.month, dayDate);
                        return today.toDateString() === d.toDateString();
                    },

                    // ฟังก์ชันดึงรายการกิจกรรมประจำเดือนนี้ (ใช้สำหรับปุ่ม 'รายการ')
                    getMonthBookings() {
                        return this.bookings.filter(booking => {
                            if (!booking || !booking.start_at) return; // เพิ่มบรรทัดนี้เพื่อหยุดการทำงานถ้าไม่มีข้อมูล
                            const bDate = new Date(booking.start_at);
                            return bDate.getMonth() === this.month && bDate.getFullYear() === this.year;
                        }).sort((a, b) => {
                            // เรียงลำดับตามวันที่และเวลา
                            /*return new Date(a.start_at) - new Date(b.start_at);*/
                            return (new Date(a.start_at || 0)) - (new Date(b.start_at || 0));
                        });
                    },

                    getFilteredBookings(year, month, day) {
                        // 1. สร้างป้ายวันที่สำหรับช่องปฏิทินนั้นๆ (ต้องมีเพื่อให้วาดวันออก)
                        const checkDateStr = new Date(year, month, day).toDateString();

                        // 2. กรองข้อมูล
                        return this.bookings.filter(booking => {
                            if (!booking || !booking.start_at) return false;

                            const bookingDateStr = new Date(booking.start_at).toDateString();
                            const isSameDate = bookingDateStr === checkDateStr;

                            // เช็คกลุ่มเป้าหมาย
                            const matchesGroup = this.selectedGroup.length === 0 ||
                                this.selectedGroup.includes(booking.target_group);

                            return isSameDate && matchesGroup;
                        }).sort((a, b) => {
                            return new Date(a.start_at) - new Date(b.start_at);
                        });
                    },

                    // ฟังก์ชันแสดง Pop-up รายละเอียดกิจกรรม
                    showEventDetail(event) {
                        this.selectedEvent = event;
                        this.event_title = event.title;

                        // ฟอร์แมตวันที่แบบไทย
                        this.event_date = new Date(event.start_at).toLocaleDateString('th-TH', {
                            day: 'numeric',
                            month: 'long',
                            year: 'numeric'
                        });

                        this.event_description = event.description || 'ไม่พบรายละเอียดเพิ่มเติม';
                        this.openEventModal = true;
                    },

                    getNoOfDays() {
                        // จำนวนวันของเดือนปัจจุบัน
                        let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();
                        // วันแรกของเดือนคือวันอะไรในสัปดาห์ (0=อาทิตย์, 6=เสาร์)
                        let firstDayOfMonth = new Date(this.year, this.month, 1).getDay();
                        // จำนวนวันของเดือนก่อนหน้า
                        let prevMonthLastDay = new Date(this.year, this.month, 0).getDate();

                        // วันที่ของเดือนก่อนหน้า (ใช้เติมช่องว่าง)
                        let blankdaysArray = [];
                        for (let i = firstDayOfMonth - 1; i >= 0; i--) {
                            blankdaysArray.push({
                                date: prevMonthLastDay - i,
                                isCurrentMonth: false,
                                monthOffset: -1 // บอกว่านี่คือเดือนก่อนหน้า
                            });
                        }

                        // วันที่ของเดือนปัจจุบัน
                        let daysArray = [];
                        for (let i = 1; i <= daysInMonth; i++) {
                            daysArray.push({
                                date: i,
                                isCurrentMonth: true,
                                monthOffset: 0 // บอกว่านี่คือเดือนปัจจุบัน
                            });
                        }

                        // คำนวณว่าต้องเติมเดือนถัดไปกี่วันให้ครบ 6 แถว (42 ช่อง)
                        const totalCells = 42;
                        let remainingCells = totalCells - (blankdaysArray.length + daysArray.length);
                        let nextMonthDays = [];
                        for (let i = 1; i <= remainingCells; i++) {
                            daysArray.push({ // ใส่ต่อท้าย daysArray เดิมไปเลยเพื่อความง่าย
                                date: i,
                                isCurrentMonth: false,
                                monthOffset: 1 // บอกว่านี่คือเดือนถัดไป
                            });
                        }

                        this.blankdays = blankdaysArray;
                        this.no_of_days = daysArray; // รวมทั้งเดือนปัจจุบันและถัดไป
                    },
                }
            }
        </script>
    </div>
</x-app-layout>
