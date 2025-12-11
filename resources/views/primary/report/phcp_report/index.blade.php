<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('รายงานการให้บริการ') }}
        </h2>
    </x-slot>
    <div class="p-6">
        การดูแลรักษาและสังเกตอาการผู้ป่วยในศูนย์บริการสาธารณสุข (ศบส.พลัส)
       <p class="mt-4">
         <a href="{{ route('phcp_report.create') }}"
           class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
           + เพิ่มรายงานใหม่
        </a>
       </p>
    </div>
</x-app-layout>
