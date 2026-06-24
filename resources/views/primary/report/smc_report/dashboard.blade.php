<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('รายงานภาพรวมผู้รับบริการคลินิกพิเศษรับการส่งต่อ') }}
        </h2>
    </x-slot>
    
    <div class="py-2">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="flex gap-4 p-6">
                <a href="{{ route('smc_report.index') }}"
                    class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
                    จัดการข้อมูลการให้บริการ
                </a>
            </div>
            <div class="grid gap-4 sm:grid-cols-1 lg:grid-cols-1">
                <div style="width: 100%; overflow: hidden;">
                    <iframe style="width: 100%; height: 700px; border: none;"
                        src="https://lookerstudio.google.com/embed/reporting/6c865cbe-43fc-40d0-8560-86ee72a13c5e/page/page_12345"
                        title="รายงานผู้รับบริการคลินิกพิเศษรับการส่งต่อ" allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
