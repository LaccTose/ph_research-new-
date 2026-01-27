<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('การรายงานภาพรวม') }}
        </h2>
                    {{--<a href="{{ route('umsc_report.index') }}"
                        class="px-4 py-2 text-green-700">
                        ศูนย์สนับสนุนบริการสุขภาพเวชศาสตร์เขตเมือง (UMSC)
                    </a>
                    <a href="{{ route('smc_report.index') }}"
                        class="px-4 py-2 text-green-700">
                        คลินิกพิเศษรับส่งต่อ
                    </a>--}}

    </x-slot>

    <div class="py-2">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                {{ __('บันทึกรายงาน') }}
                <div class="grid gap-4 mt-4 sm:grid-cols-1 lg:grid-cols-2">

                <div class="p-4">
                    <a href="{{ route('umsc_report.index') }}"
                        class="block max-w-sm p-6 text-lg text-center text-green-700 border rounded-md shadow-xs hover:bg-gray-50 bg-neutral-primary-soft border-default rounded-base hover:bg-neutral-secondary-medium">
                        ศูนย์สนับสนุนบริการสุขภาพเวชศาสตร์เขตเมือง (UMSC)
                    </a>
                </div>

                <div class="p-4">
                    <a href="{{ route('smc_report.index') }}"
                        class="block max-w-sm p-6 text-lg text-center text-green-700 border rounded-md shadow-xs hover:bg-gray-50 bg-neutral-primary-soft border-default rounded-base hover:bg-neutral-secondary-medium">
                        คลินิกพิเศษรับส่งต่อ
                    </a>
                </div>

                <div class="p-4">
                    <a href="{{ route('pcu_report.index') }}"
                        class="block max-w-sm p-6 text-lg text-center text-green-700 border rounded-md shadow-xs hover:bg-gray-50 bg-neutral-primary-soft border-default rounded-base hover:bg-neutral-secondary-medium">
                        ศูนย์แพทย์ชุมชนเมือง
                    </a>
                </div>

                <div class="p-4">
                    <a href="{{ route('phcp_report.index') }}"
                        class="block max-w-sm p-6 text-lg text-center text-green-700 border rounded-md shadow-xs hover:bg-gray-50 bg-neutral-primary-soft border-default rounded-base hover:bg-neutral-secondary-medium">
                        ศูนย์บริการสาธารณสุขพลัส (ศบส.พลัส)
                    </a>
                </div>

                {{--<div class="p-4">
                    <a href="{{ route('umsc_report.index') }}"
                        class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
                        ศูนย์สนับสนุนบริการสุขภาพเวชศาสตร์เขตเมือง (UMSC)
                    </a>
                </div>

                <div class="p-4">
                    <a href="{{ route('smc_report.index') }}"
                        class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
                        คลินิกพิเศษรับส่งต่อ
                    </a>
                </div>

                <div class="p-4">
                    <a href="{{ route('pcu_report.index') }}"
                        class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
                        ศูนย์แพทย์ชุมชนเมือง
                    </a>
                </div>

                <div class="p-4">
                    <a href="{{ route('phcp_report.index') }}"
                        class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
                        ศูนย์บริการสาธารณสุขพลัส (ศบส.พลัส) 
                    </a>
                </div>--}}
                </div>
            </div>

</x-app-layout>
