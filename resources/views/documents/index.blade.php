<x-app-layout>
     <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('เอกสารและคู่มือ') }}
        </h2>
    </x-slot>

   <div class="py-2">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="max-w-xl">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{--<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Monthly Sales Report</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/echarts@5.4.2/dist/echarts.min.js"></script>
    </head>
    <body class="bg-white">
        <div class="max-w-3xl mx-auto">
            <article class="overflow-hidden">
                <div class="bg-white rounded-b-md">
                    <div class="p-9">
                        <div class="space-y-6 text-slate-700">
                            <img class="object-cover h-12" src="https://assets.doczilla.app/examples/invoice-example-logo.png"
                                 alt="Company Logo">
                            <p class="text-xl font-extrabold tracking-tight font-body">
                                Monthly Sales Report: <span>{{ number }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="px-9">
                        <div class="flex flex-col mx-0 mt-8">
                            <table class="min-w-full divide-y divide-slate-500">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-normal text-slate-700 sm:pl-6 md:pl-0">
                                            Month
                                        </th>
                                        <th scope="col"
                                            class="hidden py-3.5 px-3 text-right text-sm font-normal text-slate-700 sm:table-cell">
                                            Sales ($)
                                        </th>
                                        <th scope="col"
                                            class="py-3.5 pl-3 pr-4 text-right text-sm font-normal text-slate-700 sm:pr-6 md:pr-0">
                                            Growth (%)
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{#each sales}}
                                        <tr class="border-b border-slate-200">
                                            <td class="py-4 pl-4 pr-3 text-sm sm:pl-6 md:pl-0">
                                                <div class="font-medium text-slate-700">{{label}}</div>
                                            </td>

                                            <td class="hidden px-3 py-4 text-sm text-right text-slate-500 sm:table-cell">
                                                ${{sales}}
                                            </td>

                                            <td class="py-4 pl-3 pr-4 text-sm text-right text-slate-500 sm:pr-6 md:pr-0">
                                                {{#if growth}}
                                                    {{growth}}%
                                                {{else}}
                                                    -
                                                {{/if}}
                                            </td>
                                        </tr>
                                    {{/each}}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th scope="row" colspan="2"
                                            class="hidden pt-6 pl-6 pr-3 text-sm font-normal text-right text-slate-700 sm:table-cell md:pl-0">
                                            Total Sales
                                        </th>
                                        <td class="pt-6 pl-3 pr-4 text-sm font-normal text-right text-slate-700 sm:pr-6 md:pr-0">
                                            ${{ totalSales }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="p-9">
                        <h2 class="text-2xl font-extrabold text-slate-700">Sales Growth Chart</h2>
                        <div id="salesChart" style="width: 100%; height: 300px"></div>
                    </div>

                    <div class="px-9">
                        <div class="border-t border-slate-200">
                            <div class="text-sm pt-4 font-light text-slate-700">
                                <p>
                                    This sales report provides an overview of our monthly performance from
                                    {{#each sales}}
                                        {{#if @first}}
                                            {{label}}
                                        {{/if}}
                                        {{#if @last}}
                                            to {{label}}.
                                        {{/if}}
                                    {{/each}}
                                    The consistent growth in sales demonstrates the effectiveness of our strategies and the
                                    dedication of our team. We look forward to maintaining this positive trend in the coming months.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>

        <script>
            var myChart = echarts.init(document.getElementById('salesChart'), null, { renderer: 'svg' })

            myChart.setOption({
                animation: false,
                tooltip: {
                    trigger: 'axis',
                    formatter: function(params) {
                        return params[0].name + '<br/>' +
                               params[0].seriesName + ': $' + params[0].value.toLocaleString()
                    }
                },
                xAxis: {{{json chartData.xAxis}}},
                yAxis: {
                    type: 'value',
                    axisLabel: {
                        formatter: '${value}'
                    }
                },
                series: {{{json chartData.series}}}
            })
        </script>
    </body>
</html>--}}