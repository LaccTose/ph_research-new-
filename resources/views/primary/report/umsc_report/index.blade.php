<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('รายงานการให้บริการ') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="flex flex-col gap-4 p-6 md:flex-row">
                <div class="flex gap-4 p-6">
                    <a href="{{ route('dashboard.index') }}"
                        class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
                        Dashboard
                    </a>
                    <a href="{{ route('umsc_report.create') }}"
                        class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
                        เพิ่มรายงานใหม่
                    </a>
                    <a href="{{ route('service.index') }}"
                        class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
                        การให้บริการ
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
