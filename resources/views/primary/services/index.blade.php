<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('การให้บริการ') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

            <!-- Header -->
            <div class="mb-8 text-center">
                <h1 class="text-2xl font-bold text-green-800 sm:text-2xl md:text-3xl">
                    ศูนย์สนับสนุนบริการสุขภาพเวชศาสตร์เขตเมือง
                </h1>
                <p class="mt-2 text-lg text-green-700">
                    (Urban Medicine Service Center : UMSC)
                </p>
            </div>
            {{-- <div class="search-box">
                <input type="text" id="searchInput" placeholder="พิมพ์ชื่อศูนย์บริการหรือเขตเพื่อค้นหา...">
            </div> --}}
            <div class="flex justify-center">
                <div class="w-full max-w-sm min-w-[200px] relative mb-6">
                    <div class="relative">
                        <input type="text" id="searchInput"
                            class="w-full py-2 pl-3 pr-10 text-base transition duration-300 bg-transparent border rounded-md shadow-sm placeholder:text-slate-400 text-slate-700 border-slate-200 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 focus:shadow"
                            placeholder="พิมพ์ชื่อศูนย์บริการหรือเขต" />
                        <button
                            class="absolute right-1 top-1 rounded bg-slate-800 p-1.5 border border-transparent text-center text-sm text-white transition-all shadow-sm hover:shadow focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="w-4 h-4">
                                <path fill-rule="evenodd"
                                    d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div id="container"></div>
            <footer></footer>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .service-page-header {
                text-align: center;
                margin-bottom: 30px;
            }

            .service-page-title {
                text-align: center;
                font-size: 22px;
                color: #333;
                margin: 0 0 5px 0;
            }

            .service-page-subtitle {
                text-align: center;
                font-size: 15px;
                color: #666;
                margin: 0 0 20px 0;
            }

            .search-box input[type="text"] {
                width: 60%;
                padding: 8px 10px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 8px;
            }

            .region-block {
                margin-bottom: 0px;
                padding-bottom: 0px;
                border-bottom: none 1px solid #ddd;
            }

            .region-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                cursor: pointer;
                padding: 4px 16px;

                background: #ffff;
                border: 1px solid #d9dcd9;
                border-radius: 6px;

                font-weight: 600;
                color: #127135;
                margin-top: 20px;
                margin-bottom: 20px;

                transition: background 0.2s, border-color 0.2s;
            }

            /* Hover */
            .region-header:hover {
                /*background: #127135;
                border-color: #16a34a;
                color: #ffff;*/
            }

            /* ไอคอนลูกศร */
            .region-header span {
                color: #127135;
                font-size: 14px;
                transition: transform 0.25s ease;
            }

            /* หมุนลูกศรตอนเปิด */
            .region-header.active span {
                color: #127135;
                transform: rotate(180deg);
            }

            .center-list {
                display: none;
                flex-wrap: wrap;
                gap: 30px;
                padding-left: 10px;
                margin-top: none;
                margin-bottom: 28px;
            }

            .center {
                background: rgb(248, 248, 248);
                border-radius: 12px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
                width: 320px;
                text-align: left;
                padding: 12px;
                transition: 0.3s;
                /*border: 1px solid #f2f2f2;*/
            }

            .center .title {
                font-size: 15px;
                font-weight: 600;
                margin-bottom: 8px;
                color: #222;
            }

            .center .sub {
                font-size: 13px;
                color: #555;
                margin-bottom: 12px;
            }

            .button-group {
                display: flex;
                gap: 10px;
            }

            .btn {
                border: none;
                padding: 6px 12px;
                border-radius: 6px;
                color: white;
                cursor: pointer;
                font-size: 14px;
                font-weight: 500;
                text-decoration: none;
                display: inline-block;
            }

            .btn-line {
                background-color: #00c300;
            }

            .btn-facebook {
                background-color: #1877f2;
            }

            .btn-line:hover {
                background-color: #00a500;
            }

            .btn-facebook:hover {
                background-color: #0d63d5;
            }

            footer {
                text-align: center;
                margin-top: 60px;
                color: #888;
                font-size: 13px;
            }

            @media (max-width: 640px) {
    .bg-green-50 {
        padding-top: 1px !important;
        padding-bottom: 8px !important;
    }
}

        </style>
    @endpush

    @push('scripts')
        <script>
            const centersData = [{
                    "ศบส": "ศูนย์บริการสาธารณสุข 1",
                    "ชื่อ": "สะพานมอญ",
                    "LINE": "https://line.me/ti/p/%40547djwdc",
                    "Facebook": "https://www.facebook.com/healthcenter1?locale=th_TH",
                    "เขต": "พระนคร",
                    "แขวง": "วังบูรพาภิรมย์"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 2",
                    "ชื่อ": "วัดมักกะสัน",
                    "LINE": "https://line.me/ti/p/%40559zjtlm",
                    "Facebook": "https://www.facebook.com/hc13647",
                    "เขต": "ราชเทวี",
                    "แขวง": "มักกะสัน"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 3",
                    "ชื่อ": "บางซื่อ",
                    "LINE": "https://line.me/ti/p/%40890afemn",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%82-3-%E0%B8%9A%E0%B8%B2%E0%B8%87%E0%B8%8B%E0%B8%B7%E0%B9%88%E0%B8%AD/61560131507957/?locale=th_TH",
                    "เขต": "บางซื่อ",
                    "แขวง": "บางซื่อ"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 4",
                    "ชื่อ": "ดินแดง",
                    "LINE": "https://line.me/ti/p/%40295soapn",
                    "Facebook": "https://www.facebook.com/HealthCenter4Dindang?locale=th_TH",
                    "เขต": "ดินแดง",
                    "แขวง": "ดินแดง"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 5",
                    "ชื่อ": "จุฬาลงกรณ์",
                    "LINE": "https://line.me/ti/p/%40705fpzqx",
                    "Facebook": "https://www.facebook.com/PublicHealthCenter5chula?locale=th_TH",
                    "เขต": "ปทุมวัน",
                    "แขวง": "วังใหม่"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 6",
                    "ชื่อ": "สโมสรวัฒนธรรมหญิง",
                    "LINE": "https://line.me/ti/p/%40468zxhyp",
                    "Facebook": "https://www.facebook.com/officialhealthcenter6?locale=th_TH",
                    "เขต": "ดุสิต",
                    "แขวง": "สี่แยกมหานาค"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 7",
                    "ชื่อ": "บุญมีปุรุราชรังสรรค์",
                    "LINE": "https://line.me/ti/p/%40sqn6707p",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%82-7-%E0%B8%9A%E0%B8%B8%E0%B8%8D%E0%B8%A1%E0%B8%B5-%E0%B8%9B%E0%B8%B8%E0%B8%A3%E0%B8%B8%E0%B8%A3%E0%B8%B2%E0%B8%8A%E0%B8%A3%E0%B8%B1%E0%B8%87%E0%B8%AA%E0%B8%A3%E0%B8%A3%E0%B8%84%E0%B9%8C/100064523180766/?locale=th_TH",
                    "เขต": "ยานนาวา",
                    "แขวง": "บางโพงพาง"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 8",
                    "ชื่อ": "บุญรอดรุ่งเรือง",
                    "LINE": "https://line.me/ti/p/%40472flbfs",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%82-8-%E0%B8%9A%E0%B8%B8%E0%B8%8D%E0%B8%A3%E0%B8%AD%E0%B8%94-%E0%B8%A3%E0%B8%B8%E0%B9%88%E0%B8%87%E0%B9%80%E0%B8%A3%E0%B8%B7%E0%B8%AD%E0%B8%87/100083493048736/",
                    "เขต": "บางนา",
                    "แขวง": "บางนาเหนือ"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 9",
                    "ชื่อ": "ประชาธิปไตย",
                    "LINE": "https://line.me/ti/p/%40532efgyv",
                    "Facebook": "https://www.facebook.com/healthcenternine",
                    "เขต": "พระนคร",
                    "แขวง": "บ้านพานถม"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 10",
                    "ชื่อ": "สุขุมวิท",
                    "LINE": "https://line.me/ti/p/%40146whbfw",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%82-%E0%B9%91%E0%B9%90-%E0%B8%AA%E0%B8%B8%E0%B8%82%E0%B8%B8%E0%B8%A1%E0%B8%A7%E0%B8%B4%E0%B8%97/100067923857929/",
                    "เขต": "คลองเตย",
                    "แขวง": "คลองตัน"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 11",
                    "ชื่อ": "ประดิพัทธ์",
                    "LINE": "https://page.line.me/fye3233o?openQrModal=true",
                    "Facebook": "https://www.facebook.com/healthcenter11",
                    "เขต": "พญาไท",
                    "แขวง": "สามเสนใน"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 12",
                    "ชื่อ": "จันทร์เที่ยง เนตรวิเศษ",
                    "LINE": "https://line.me/ti/p/%40042nlfml",
                    "Facebook": "https://www.facebook.com/healthcenter12",
                    "เขต": "บางคอแหลม",
                    "แขวง": "บางโคล่"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 13",
                    "ชื่อ": "ไมตรีวานิช",
                    "LINE": "https://line.me/ti/p/%40637ewgtu",
                    "Facebook": "https://www.facebook.com/hc013",
                    "เขต": "สัมพันธวงศ์",
                    "แขวง": "จักรวรรดิ"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 14",
                    "ชื่อ": "แก้ว สีบุญเรือง",
                    "LINE": "https://line.me/ti/p/%40539lmvqv",
                    "Facebook": "https://www.facebook.com/healthycenter14",
                    "เขต": "บางคอแหลม",
                    "แขวง": "วัดพระยาไกร"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 15",
                    "ชื่อ": "ลาดพร้าว",
                    "LINE": "https://line.me/ti/p/%40002weiyr",
                    "Facebook": "https://www.facebook.com/healthcenter15",
                    "เขต": "ห้วยขวาง",
                    "แขวง": "สามเสนนอก"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 16",
                    "ชื่อ": "ลุมพินี",
                    "LINE": "https://line.me/ti/p/%40evx1257l",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%82-16-%E0%B8%A5%E0%B8%B8%E0%B8%A1%E0%B8%9E%E0%B8%B4%E0%B8%99%E0%B8%B5/100069227859326/",
                    "เขต": "ปทุมวัน",
                    "แขวง": "ลุมพินี"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 17",
                    "ชื่อ": "ประชานิเวศน์",
                    "LINE": "https://line.me/ti/p/%40746jrkfs",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%82-17-%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%8A%E0%B8%B2%E0%B8%99%E0%B8%B4%E0%B9%80%E0%B8%A7%E0%B8%A8%E0%B8%99%E0%B9%8C/100075881063931/",
                    "เขต": "จตุจักร",
                    "แขวง": "ลาดยาว"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 18",
                    "ชื่อ": "มงคล-วอน วังตาล",
                    "LINE": "https://line.me/ti/p/%40386efkjj",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%82-18-%E0%B8%A1%E0%B8%87%E0%B8%84%E0%B8%A5-%E0%B8%A7%E0%B8%AD%E0%B8%99-%E0%B8%A7%E0%B8%B1%E0%B8%87%E0%B8%95%E0%B8%B2%E0%B8%A5/100057120173680/",
                    "เขต": "บางคอแหลม",
                    "แขวง": "บางโคล่"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 19",
                    "ชื่อ": "วงศ์สว่าง",
                    "LINE": "https://line.me/ti/p/%40204vpgkh",
                    "Facebook": "https://www.facebook.com/sbs.sib.kea.wngsswang/",
                    "เขต": "บางซื่อ",
                    "แขวง": "วงศ์สว่าง"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 20",
                    "ชื่อ": "ป้อมปราบศัตรูพ่าย",
                    "LINE": "https://line.me/ti/p/%40794lxlwd",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%82-20-%E0%B8%9B%E0%B9%89%E0%B8%AD%E0%B8%A1%E0%B8%9B%E0%B8%A3%E0%B8%B2%E0%B8%9A%E0%B8%A8%E0%B8%B1%E0%B8%95%E0%B8%A3%E0%B8%B9%E0%B8%9E%E0%B9%88%E0%B8%B2%E0%B8%A2-%E0%B8%AA%E0%B8%B3%E0%B8%99%E0%B8%B1%E0%B8%81%E0%B8%AD%E0%B8%99%E0%B8%B2%E0%B8%A1%E0%B8%B1%E0%B8%A2/100068953835339/",
                    "เขต": "ป้อมปราบศัตรูพ่าย",
                    "แขวง": "วัดโสมนัส"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 21",
                    "ชื่อ": "วัดธาตุทอง",
                    "LINE": "https://line.me/ti/p/%40900chgnr",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%82-21-%E0%B8%A7%E0%B8%B1%E0%B8%94%E0%B8%98%E0%B8%B2%E0%B8%95%E0%B8%B8%E0%B8%97%E0%B8%AD%E0%B8%87-%E0%B8%AA%E0%B8%B3%E0%B8%99%E0%B8%B1%E0%B8%81%E0%B8%AD%E0%B8%99%E0%B8%B2%E0%B8%A1%E0%B8%B1%E0%B8%A2/100041947854999/",
                    "เขต": "วัฒนา",
                    "แขวง": "พระโขนงเหนือ"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 22",
                    "ชื่อ": "วัดปากบ่อ",
                    "LINE": "https://line.me/ti/p/%40008dzgob",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%82-%E0%B9%92%E0%B9%92-%E0%B8%A7%E0%B8%B1%E0%B8%94%E0%B8%9B%E0%B8%B2%E0%B8%81%E0%B8%9A%E0%B9%88%E0%B8%AD/100063467653379/",
                    "เขต": "สวนหลวง",
                    "แขวง": "สวนหลวง"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 23",
                    "ชื่อ": "สี่พระยา",
                    "LINE": "https://page.line.me/sws7354n?openQrModal=true",
                    "Facebook": "https://www.facebook.com/hc023siphaya/",
                    "เขต": "บางรัก",
                    "แขวง": "สี่พระยา"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 24",
                    "ชื่อ": "บางเขน",
                    "LINE": "https://line.me/ti/p/%40284ilwpp",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%82-24-%E0%B8%9A%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%82%E0%B8%99-%E0%B8%AA%E0%B8%B3%E0%B8%99%E0%B8%B1%E0%B8%81%E0%B8%AD%E0%B8%99%E0%B8%B2%E0%B8%A1%E0%B8%B1%E0%B8%A2/100064489760468/",
                    "เขต": "จตุจักร",
                    "แขวง": "ลาดยาว"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 25",
                    "ชื่อ": "ห้วยขวาง",
                    "LINE": "https://line.me/ti/p/%40177njrvc",
                    "Facebook": "https://www.facebook.com/twentyfivebma",
                    "เขต": "ห้วยขวาง",
                    "แขวง": "ห้วยขวาง"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 26",
                    "ชื่อ": "เจ้าคุณพระประยุรวงศ์",
                    "LINE": "https://line.me/ti/p/%40720wehjb",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%82-26-%E0%B9%80%E0%B8%88%E0%B9%89%E0%B8%B2%E0%B8%84%E0%B8%B8%E0%B8%93%E0%B8%9E%E0%B8%A3%E0%B8%B0%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%A2%E0%B8%B8%E0%B8%A3%E0%B8%A7%E0%B8%87%E0%B8%A8%E0%B9%8C/100068827736074/",
                    "เขต": "ธนบุรี",
                    "แขวง": "วัดกัลยาณ์"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 27",
                    "ชื่อ": "จันทร์ฉิมไพบูลย์",
                    "LINE": "https://line.me/ti/p/%40198jzptg",
                    "Facebook": "https://www.facebook.com/healthcenter27",
                    "เขต": "ธนบุรี",
                    "แขวง": "บางยี่เรือ"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 28",
                    "ชื่อ": "กรุงธนบุรี",
                    "LINE": "https://line.me/ti/p/%40726wtyly",
                    "Facebook": "https://www.facebook.com/hc28bma",
                    "เขต": "คลองสาน",
                    "แขวง": "บางลำภูล่าง"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 29",
                    "ชื่อ": "ช่วง นุชเนตร",
                    "LINE": "https://page.line.me/stv4137h?openQrModal=true",
                    "Facebook": "https://www.facebook.com/healthcenter29",
                    "เขต": "จอมทอง",
                    "แขวง": "บางค้อ"
                },
                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 30",
                    "ชื่อ": "วัดเจ้าอาม",
                    "LINE": "https://line.me/ti/p/%40957kikxt",
                    "Facebook": "https://www.facebook.com/Healthcenter30",
                    "เขต": "บางกอกน้อย",
                    "แขวง": "บางขุนนนท์"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 31",
                    "ชื่อ": "เอิบ-จิตร ทังสุบุตร",
                    "LINE": "https://line.me/ti/p/%40679fhtcj",
                    "Facebook": "https://www.facebook.com/Publichealthcenter31",
                    "เขต": "บางพลัด",
                    "แขวง": "บางอ้อ"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 32",
                    "ชื่อ": "มาริษ ตินตมุสิก",
                    "LINE": "https://line.me/ti/p/%40822hmaec",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%82-32-%E0%B8%A1%E0%B8%B2%E0%B8%A3%E0%B8%B4%E0%B8%A9-%E0%B8%95%E0%B8%B4%E0%B8%99%E0%B8%95%E0%B8%A1%E0%B8%B8%E0%B8%AA%E0%B8%B4%E0%B8%81/100057067105412/",
                    "เขต": "พระโขนง",
                    "แขวง": "พระโขนงใต้"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 33",
                    "ชื่อ": "วัดหงส์รัตนาราม",
                    "LINE": "https://line.me/ti/p/%40pbw5067h",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%8233-%E0%B8%A7%E0%B8%B1%E0%B8%94%E0%B8%AB%E0%B8%87%E0%B8%AA%E0%B9%8C%E0%B8%A3%E0%B8%B1%E0%B8%95%E0%B8%99%E0%B8%B2%E0%B8%A3%E0%B8%B2%E0%B8%A1/100040080414100/?mibextid=ZbWKwL",
                    "เขต": "บางกอกใหญ่",
                    "แขวง": "วัดอรุณ"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 34",
                    "ชื่อ": " โพธิ์ศรี",
                    "LINE": "https://line.me/ti/p/%40221DFKSO",
                    "Facebook": "https://www.facebook.com/health34prosri",
                    "เขต": "พระโขนง",
                    "แขวง": "พระโขนงใต้"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 35",
                    "ชื่อ": "หัวหมาก",
                    "LINE": "https://line.me/ti/p/%40267yrlfk",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%82-35-%E0%B8%AB%E0%B8%B1%E0%B8%A7%E0%B8%AB%E0%B8%A1%E0%B8%B2%E0%B8%81/100069937638410/",
                    "เขต": "บางกะปิ",
                    "แขวง": "หัวหมาก"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 36",
                    "ชื่อ": "บุคคโล",
                    "LINE": "https://line.me/ti/p/%40136ktyfx",
                    "Facebook": "https://www.facebook.com/healthcenter36bukkhalo",
                    "เขต": "ธนบุรี",
                    "แขวง": "ดาวคะนอง"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 37",
                    "ชื่อ": "ประสงค์-สุดสาคร",
                    "LINE": "https://line.me/ti/p/%40786dmqdr",
                    "Facebook": "https://www.facebook.com/Healthcenter37",
                    "เขต": "สวนหลวง",
                    "แขวง": "สวนหลวง"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 38",
                    "ชื่อ": " จี๊ด-ทองคำบำเพ็ญ",
                    "LINE": "https://line.me/ti/p/%40443xnche",
                    "Facebook": "https://www.facebook.com/healthcenter38",
                    "เขต": "ดุสิต",
                    "แขวง": "ถนนนครไชยศรี"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 39",
                    "ชื่อ": "ราษฎร์บูรณะ",
                    "LINE": "https://line.me/ti/p/%40026tyiig",
                    "Facebook": "https://www.facebook.com/HealthCenter39Ratburana",
                    "เขต": "ราษฎร์บูรณะ",
                    "แขวง": "ราษฎร์บูรณะ"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 40",
                    "ชื่อ": "บางแค",
                    "LINE": "https://line.me/ti/p/%40371jcycx",
                    "Facebook": "https://www.facebook.com/publichealthcenter40bangkhaefanpage",
                    "เขต": "บางแค",
                    "แขวง": "บางแคเหนือ"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 41",
                    "ชื่อ": "คลองเตย",
                    "LINE": "https://line.me/ti/p/%40567islxs",
                    "Facebook": "https://www.facebook.com/health041?_rdr",
                    "เขต": "คลองเตย",
                    "แขวง": "คลองเตย"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 42",
                    "ชื่อ": "ถนอมทองสิมา",
                    "LINE": "https://line.me/ti/p/%40uze3485a",
                    "Facebook": "https://www.facebook.com/hc042/",
                    "เขต": "บางขุนเทียน",
                    "แขวง": "แสมดำ"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 43",
                    "ชื่อ": "มีนบุรี",
                    "LINE": "https://line.me/ti/p/%40953gedeh",
                    "Facebook": "https://www.facebook.com/publichealthcenter43minburi",
                    "เขต": "มีนบุรี",
                    "แขวง": "มีนบุรี"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 44",
                    "ชื่อ": "ลำผักชีหนองจอก",
                    "LINE": "https://line.me/ti/p/%40095npzxr",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%82%E0%B8%AA%E0%B8%B5%E0%B9%88%E0%B8%AA%E0%B8%B4%E0%B8%9A%E0%B8%AA%E0%B8%B5%E0%B9%88-%E0%B8%A5%E0%B8%B3%E0%B8%9C%E0%B8%B1%E0%B8%81%E0%B8%8A%E0%B8%B5-%E0%B8%AB%E0%B8%99%E0%B8%AD%E0%B8%87%E0%B8%88%E0%B8%AD%E0%B8%81/100057319694944/",
                    "เขต": "หนองจอก",
                    "แขวง": "ลำผักชี"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 45",
                    "ชื่อ": "ร่มเกล้าลาดกระบัง",
                    "LINE": "https://line.me/ti/p/%40114jtpnu",
                    "Facebook": "https://www.facebook.com/healthcenter045/",
                    "เขต": "ลาดกระบัง",
                    "แขวง": "คลองสองต้นนุ่น"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 46",
                    "ชื่อ": "กันตารัติอุทิศ",
                    "LINE": "https://line.me/ti/p/%40147atnjw",
                    "Facebook": "https://www.facebook.com/healthcenter46",
                    "เขต": "ลาดกระบัง",
                    "แขวง": "ลาดกระบัง"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 47",
                    "ชื่อ": "คลองขวาง",
                    "LINE": "https://line.me/ti/p/%40752lqxak",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%82-47/100077747240461/",
                    "เขต": "ภาษีเจริญ",
                    "แขวง": "คลองขวาง"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 48",
                    "ชื่อ": "นาควัชระอุทิศ",
                    "LINE": "https://line.me/ti/p/%40111mgtqe",
                    "Facebook": "https://www.facebook.com/@phc048",
                    "เขต": "หนองแขม",
                    "แขวง": "หนองแขม"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 49",
                    "ชื่อ": "วัดชัยพฤกษมาลา",
                    "LINE": "https://line.me/ti/p/%40630lsbxv",
                    "Facebook": "https://www.facebook.com/PHC49WatChaiyapruksamala/",
                    "เขต": "ตลิ่งชัน",
                    "แขวง": "ตลิ่งชัน"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 50",
                    "ชื่อ": " บึงกุ่ม",
                    "LINE": "https://line.me/ti/p/%40854fnoob",
                    "Facebook": "https://www.facebook.com/publichealthcenter50buengkum",
                    "เขต": "บึงกุ่ม",
                    "แขวง": "คลองกุ่ม"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 51",
                    "ชื่อ": "จตุจักร",
                    "LINE": "https://line.me/ti/p/%40092fbxgd",
                    "Facebook": "https://www.facebook.com/page.healthcenter51",
                    "เขต": "จตุจักร",
                    "แขวง": "จอมพล"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 52",
                    "ชื่อ": "สามเสนนอก",
                    "LINE": "https://line.me/ti/p/%40590dyufl",
                    "Facebook": "https://www.facebook.com/fiftytwobma",
                    "เขต": "ดินแดง",
                    "แขวง": "ดินแดง"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 53",
                    "ชื่อ": "ทุ่งสองห้อง",
                    "LINE": "https://line.me/ti/p/%40666qxtls",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%82-53-%E0%B8%97%E0%B8%B8%E0%B9%88%E0%B8%87%E0%B8%AA%E0%B8%AD%E0%B8%87%E0%B8%AB%E0%B9%89%E0%B8%AD%E0%B8%87/61562423395534/",
                    "เขต": "หลักสี่",
                    "แขวง": "ทุ่งสองห้อง"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 54",
                    "ชื่อ": "ทัศน์เอี่ยม",
                    "LINE": "https://line.me/ti/p/%40901mmmux",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%82-54-%E0%B8%97%E0%B8%B1%E0%B8%A8%E0%B8%99%E0%B9%8C%E0%B9%80%E0%B8%AD%E0%B8%B5%E0%B9%88%E0%B8%A2%E0%B8%A1-%E0%B9%80%E0%B8%9E%E0%B8%88%E0%B9%83%E0%B8%AB%E0%B8%A1%E0%B9%88/61560035460404/",
                    "เขต": "ทุ่งครุ",
                    "แขวง": "บางมด"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 55",
                    "ชื่อ": "เตชะสัมพันธ์",
                    "LINE": "https://line.me/ti/p/%40465vcpfm",
                    "Facebook": "https://www.facebook.com/hc55bk",
                    "เขต": "ยานนาวา",
                    "แขวง": "ช่องนนทรี"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 56",
                    "ชื่อ": "ทับเจริญ",
                    "LINE": "https://line.me/ti/p/%40815nskpt",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C-56-%E0%B8%97%E0%B8%B1%E0%B8%9A%E0%B9%80%E0%B8%88%E0%B8%A3%E0%B8%B4%E0%B8%8D/100063578649902/",
                    "เขต": "บึงกุ่ม",
                    "แขวง": "นวลจันทร์"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 57",
                    "ชื่อ": "บุญเรืองล้ำเลิศ",
                    "LINE": "https://line.me/ti/p/%40555lfrbg",
                    "Facebook": "https://www.facebook.com/healthcenter57",
                    "เขต": "ประเวศ",
                    "แขวง": "หนองบอน"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 58",
                    "ชื่อ": "ล้อม-พิมเสนฟักอุดม",
                    "LINE": "https://line.me/ti/p/%40613khvxp",
                    "Facebook": "https://www.facebook.com/p/%E0%B8%A8%E0%B8%9A%E0%B8%AA-%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%A1-%E0%B8%9E%E0%B8%B4%E0%B8%A1%E0%B9%80%E0%B8%AA%E0%B8%99-%E0%B8%9F%E0%B8%B1%E0%B8%81%E0%B8%AD%E0%B8%B8%E0%B8%94%E0%B8%A1-100062965194525/",
                    "เขต": "ราษฎร์บูรณะ",
                    "แขวง": "บางปะกอก"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 59",
                    "ชื่อ": "ทุ่งครุ",
                    "LINE": "https://line.me/ti/p/%40766nomyu",
                    "Facebook": "https://www.facebook.com/hc59bma",
                    "เขต": "ทุ่งครุ",
                    "แขวง": "ทุ่งครุ"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 60",
                    "ชื่อ": "รสสุคนธ์ มโนชญากร",
                    "LINE": "https://line.me/ti/p/%40988tifqd",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%82-60-%E0%B8%A3%E0%B8%AA%E0%B8%AA%E0%B8%B8%E0%B8%84%E0%B8%99%E0%B8%98%E0%B9%8C-%E0%B8%A1%E0%B9%82%E0%B8%99%E0%B8%8A%E0%B8%8D%E0%B8%B2%E0%B8%81%E0%B8%A3/100092345764633/",
                    "เขต": "ดอนเมือง",
                    "แขวง": "ดอนเมือง"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 61",
                    "ชื่อ": "สังวาลย์ทัสนารมย์",
                    "LINE": "https://line.me/ti/p/%40870puvbv",
                    "Facebook": "https://www.facebook.com/PHC061",
                    "เขต": "สายไหม",
                    "แขวง": "สายไหม"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 62",
                    "ชื่อ": "ตวงรัชฎ์ศศะนาวิน",
                    "LINE": "https://line.me/ti/p/%40pbv1683z",
                    "Facebook": "https://www.facebook.com/PublicHealthCenter62",
                    "เขต": "ภาษีเจริญ",
                    "แขวง": "บางหว้า"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 63",
                    "ชื่อ": "สมาคมแต้จิ๋วแห่งประเทศไทย",
                    "LINE": "https://line.me/ti/p/%40277uopxu",
                    "Facebook": "https://www.facebook.com/PublicHealthCenter63",
                    "เขต": "สาทร",
                    "แขวง": "ทุ่งวัดดอน"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 64",
                    "ชื่อ": "คลองสามวา",
                    "LINE": "https://line.me/ti/p/%40opp4976q",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%82-64-%E0%B8%84%E0%B8%A5%E0%B8%AD%E0%B8%87%E0%B8%AA%E0%B8%B2%E0%B8%A1%E0%B8%A7%E0%B8%B2-%E0%B8%AA%E0%B8%B3%E0%B8%99%E0%B8%B1%E0%B8%81%E0%B8%AD%E0%B8%99%E0%B8%B2%E0%B8%A1%E0%B8%B1%E0%B8%A2/100064393011915/",
                    "เขต": "คลองสามวา",
                    "แขวง": "บางชัน"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 65",
                    "ชื่อ": "รักษาศุขบางบอน",
                    "LINE": "https://page.line.me/791rrosx?openQrModal=true",
                    "Facebook": "https://www.facebook.com/hc65bangbon",
                    "เขต": "บางบอน",
                    "แขวง": "บางบอนใต้"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 66",
                    "ชื่อ": "ตำหนักพระแม่กวนอิม",
                    "LINE": "https://line.me/ti/p/%40960rdlye",
                    "Facebook": "https://www.facebook.com/healthcenter066",
                    "เขต": "ลาดพร้าว",
                    "แขวง": "ลาดพร้าว"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 67",
                    "ชื่อ": "ทวีวัฒนา",
                    "LINE": "https://line.me/ti/p/%40dxy3055c",
                    "Facebook": "https://www.facebook.com/HealthCenter067",
                    "เขต": "ทวีวัฒนา",
                    "แขวง": "ทวีวัฒนา"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 68",
                    "ชื่อ": "สะพานสูง",
                    "LINE": "https://page.line.me/cyx0072e?openQrModal=true",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%82-68-%E0%B8%AA%E0%B8%B0%E0%B8%9E%E0%B8%B2%E0%B8%99%E0%B8%AA%E0%B8%B9%E0%B8%87/100063498485404/",
                    "เขต": "สะพานสูง",
                    "แขวง": "สะพานสูง"
                },

                {
                    "ศบส": "ศูนย์บริการสาธารณสุข 69",
                    "ชื่อ": "คันนายาว",
                    "LINE": "https://line.me/ti/p/%40049qxrxk",
                    "Facebook": "https://www.facebook.com/people/%E0%B8%A8%E0%B8%B9%E0%B8%99%E0%B8%A2%E0%B9%8C%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B2%E0%B8%98%E0%B8%B2%E0%B8%A3%E0%B8%93%E0%B8%AA%E0%B8%B8%E0%B8%82-69-%E0%B8%84%E0%B8%B1%E0%B8%99%E0%B8%99%E0%B8%B2%E0%B8%A2%E0%B8%B2%E0%B8%A7/100057207769577/",
                    "เขต": "คันนายาว",
                    "แขวง": "คันนายาว"
                },
            ];

            const grouped = {};
            centersData.forEach(c => {
                if (!grouped[c.เขต]) grouped[c.เขต] = [];
                grouped[c.เขต].push(c);
            });

            const container = document.getElementById("container");

            for (let zone in grouped) {
                const regionBlock = document.createElement("div");
                regionBlock.className = "region-block";

                const header = document.createElement("div");
                header.className = "region-header";
                header.innerHTML = `เขต ${zone} <span>▼</span>`;
                regionBlock.appendChild(header);

                const centerList = document.createElement("div");
                centerList.className = "center-list";
                centerList.style.display = "flex"; // แสดงรายการตั้งแต่แรก

                grouped[zone].forEach(c => {
                    const center = document.createElement("div");
                    center.className = "center";

                    const title = document.createElement("div");
                    title.className = "title";
                    title.textContent = `${c.ศบส} ${c.ชื่อ}`;
                    center.appendChild(title);

                    const sub = document.createElement("div");
                    sub.className = "sub";
                    sub.textContent = `แขวง : ${c.แขวง} เขต : ${c.เขต}`;
                    center.appendChild(sub);

                    const btnGroup = document.createElement("div");
                    btnGroup.className = "button-group";

                    const btnLine = document.createElement("a");
                    btnLine.className = "btn btn-line";
                    btnLine.href = c.LINE;
                    btnLine.target = "_blank";
                    btnLine.textContent = "Line";

                    const btnFb = document.createElement("a");
                    btnFb.className = "btn btn-facebook";
                    btnFb.href = c.Facebook;
                    btnFb.target = "_blank";
                    btnFb.textContent = "Facebook";

                    btnGroup.appendChild(btnLine);
                    btnGroup.appendChild(btnFb);
                    center.appendChild(btnGroup);

                    centerList.appendChild(center);
                });

                regionBlock.appendChild(centerList);
                container.appendChild(regionBlock);

                header.addEventListener("click", () => {
                    centerList.style.display = centerList.style.display === "flex" ? "none" : "flex";
                    header.classList.toggle("active");
                });
            }

            const searchInput = document.getElementById("searchInput");
            searchInput.addEventListener("keyup", function() {
                const filter = searchInput.value.toLowerCase();
                const regionBlocks = document.querySelectorAll(".region-block");

                regionBlocks.forEach(block => {
                    const centers = block.querySelectorAll(".center");
                    let visibleCount = 0;

                    centers.forEach(center => {
                        const text = center.textContent.toLowerCase();
                        const match = text.includes(filter);
                        center.style.display = match ? "block" : "none";
                        if (match) visibleCount++;
                    });

                    block.style.display = visibleCount > 0 ? "block" : "none";
                });
            });
        </script>
    @endpush
</x-app-layout>
