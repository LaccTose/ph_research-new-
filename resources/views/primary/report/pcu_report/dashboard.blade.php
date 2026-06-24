<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('รายงานภาพรวมผู้รับบริการศูนย์แพทย์ชุมชนเมือง') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="flex gap-4 p-6">
                <a href="{{ route('pcu_report.index') }}"
                    class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
                    รายการบันทึกการให้บริการ
                </a>
            </div>
            <div class="grid gap-4 sm:grid-cols-1 lg:grid-cols-1">
                <div style="width: 100%; overflow: hidden;">
                    <iframe style="width: 100%; height: 700px; border: none;" 
                        src="https://lookerstudio.google.com/embed/reporting/68d07c75-9cfb-427d-9a0d-8e1ea1ebdf4d/page/page_12345" 
                        title="รายงานผู้รับบริการศูนย์แพทย์ชุมชนเมือง" allowfullscreen 
                        sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
