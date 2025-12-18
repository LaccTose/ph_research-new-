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
                <div class="grid sm:grid-cols-1 lg:grid-cols-2 gap-4 mt-4">

                <div class="p-4">
                    <a href="{{ route('umsc_report.index') }}"
                        class="w-full text-lg text-green-700 rounded-md hover:bg-gray-50  hover:text-green-500 bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base shadow-xs hover:bg-neutral-secondary-medium text-center">
                        ศูนย์สนับสนุนบริการสุขภาพเวชศาสตร์เขตเมือง (UMSC)
                    </a>
                </div>

                <div class="p-4">
                    <a href="{{ route('smc_report.index') }}"
                        class="text-lg text-green-700 rounded-md hover:bg-gray-50 bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base 
                        shadow-xs hover:bg-neutral-secondary-medium text-center">
                        คลินิกพิเศษรับส่งต่อ
                    </a>
                </div>

                <div class="p-4">
                    <a href="{{ route('pcu_report.index') }}"
                        class="text-lg text-green-700 rounded-md hover:bg-gray-50 bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base 
                        shadow-xs hover:bg-neutral-secondary-medium text-center">
                        ศูนย์แพทย์ชุมชนเมือง
                    </a>
                </div>

                <div class="p-4">
                    <a href="{{ route('phcp_report.index') }}"
                        class="text-lg text-green-700 rounded-md hover:bg-gray-50 bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base 
                        shadow-xs hover:bg-neutral-secondary-medium text-center">
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
