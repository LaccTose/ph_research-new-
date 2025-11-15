<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('การรายงานภาพรวม') }}
        </h2>
    </x-slot>

    <div class="py-2">

        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                {{ __('Dashboard') }}

                <div class="p-6">
                    <a href="{{ route('report.index') }}"
                        class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
                        +++
                    </a>
                </div>

            </div>

</x-app-layout>
