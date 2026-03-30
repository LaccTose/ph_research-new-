<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="flex gap-4 p-6">
                <a href="{{ route('umsc_report.index') }}"
                    class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
                    รายงานการให้บริการ
                </a>
                <a href="{{ route('service.index') }}"
                    class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
                    การให้บริการ
                </a>
            </div>
            <div class="grid gap-4 sm:grid-cols-1 lg:grid-cols-1">
                <div style="width: 100%; overflow: hidden;">
                    <iframe style="width: 100%; height: 700px; border: none;"
                        src="https://lookerstudio.google.com/embed/reporting/0e771bec-d831-413a-9681-bf8ba9ae1c34/page/page_12345"
                        title="Dashboard รายงานศูนย์สนับสนุนบริการสุขภาพฯ" allowfullscreen
                        sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
