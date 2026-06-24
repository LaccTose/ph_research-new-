<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('รายงานการให้บริการคลินิกพิเศษรับส่งต่อ') }}
        </h2>
    </x-slot>
    
    <div class="py-2">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="flex flex-col gap-4 p-6 md:flex-row">
                <div class="flex gap-4 p-6">
                    <a href="{{ route('smc_report.dashboard') }}"
                        class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
                        Dashboard
                    </a>
                    <a href="{{ route('smc_report.create') }}"
                        class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
                        เพิ่มรายงานใหม่
                    </a>
                </div>
            </div>
                
            <table class="w-full text-sm text-center text-gray-700 border-collapse">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-4 py-3 border">ลำดับ</th>
                        <th class="px-4 py-3 border">รายการบันทึกรายงาน</th>
                        <th class="px-4 py-3 border">ผู้รายงาน</th>
                        <th class="px-4 py-3 border">วันที่บันทึก</th>
                        <th class="px-4 py-3 border">เวลา</th>
                        {{--<th class="px-4 py-3 border">ดาวน์โหลด</th>--}}
                        <th class="px-4 py-3 border">แก้ไข</th>
                        <th class="px-4 py-3 border">ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reports as $index => $report)
                    <tr class="hover:bg-gray-50 border-b">
                        <td class="p-4 text-center">{{ $index + 1 }}</td>
                        <td class="p-4 font-semibold text-green-700">{{ $report->smc }}</td>
                        <td class="p-4">{{ \Carbon\Carbon::parse($report->service_date)->format('d/m/Y') }}</td>
                        {{--<td class="p-4 text-center">{{ number_format($report->allUserPeople) }}</td>--}}
                        <td class="p-4 text-gray-500 text-xs">
                            {{ $report->created_at->format('d/m/Y H:i') }} น.
                        </td>
                        <td class="p-4">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('smc_report.pdf', $report->id) }}" class="p-1 text-blue-600 hover:text-blue-800" title="ดาวน์โหลด PDF">
                                    PDF
                                </a>
                                
                                <a href="{{ route('smc_report.edit', $report->id) }}" class="p-1 text-yellow-600 hover:text-yellow-800" title="แก้ไข">
                                    แก้ไข
                                </a>

                                <form action="{{ route('smc_report.destroy', $report->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1 text-red-600 hover:text-red-800" 
                                            onclick="return confirm('ย้ายรายงานนี้ไปที่ถังขยะใช่หรือไม่?')">
                                            ลบ
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach           
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
  {{--
        
  --}}