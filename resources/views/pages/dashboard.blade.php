<div class="row">
    @foreach($data['data']['total'] as $row)

    <div class="col-xl-3 col-sm-6">
        <div class="card social-widget">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2">
                        <div class="social-icons"><img src="{{Cache::get('img_url').'/'.$row['total_icon']}}"
                                height="50" alt="icon">
                        </div>
                        <span class="f-w-600">{{$row['total_title_1']}}</span>
                    </div>
                    <span class="font-success f-12 d-xxl-block d-xl-none">{{$row['total_transaction_count']}}</span>
                </div>
                <div class="social-content">
                    <div>
                        <h5 class="mb-1">
                            {{$row['total_amount']}}
                        </h5>
                        <span class="f-light">{{$row['total_title_2']}}</span>
                    </div>
                    <div class="social-chart">
                        <div id="radial-facebook" style="min-height: 96.4px;">
                            <div id="apexchartsmn2r6amt"
                                class="apexcharts-canvas apexchartsmn2r6amt apexcharts-theme-light"
                                style="width: 150px; height: 96.4px;"><svg id="SvgjsSvg2335" width="150" height="96.4"
                                    xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                    class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                    style="background: transparent;">
                                    <g id="SvgjsG2337" class="apexcharts-inner apexcharts-graphical"
                                        transform="translate(23, 0)">
                                        <defs id="SvgjsDefs2336">
                                            <clipPath id="gridRectMaskmn2r6amt">
                                                <rect id="SvgjsRect2339" width="112" height="130" x="-3" y="-1" rx="0"
                                                    ry="0" opacity="1" stroke-width="0" stroke="none"
                                                    stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                            <clipPath id="forecastMaskmn2r6amt"></clipPath>
                                            <clipPath id="nonForecastMaskmn2r6amt"></clipPath>
                                            <clipPath id="gridRectMarkerMaskmn2r6amt">
                                                <rect id="SvgjsRect2340" width="110" height="132" x="-2" y="-2" rx="0"
                                                    ry="0" opacity="1" stroke-width="0" stroke="none"
                                                    stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                            <filter id="SvgjsFilter2353" filterUnits="userSpaceOnUse" width="200%"
                                                height="200%" x="-50%" y="-50%">
                                                <feFlood id="SvgjsFeFlood2354" flood-color="var(--theme-default)"
                                                    flood-opacity="0.35" result="SvgjsFeFlood2354Out"
                                                    in="SourceGraphic">
                                                </feFlood>
                                                <feComposite id="SvgjsFeComposite2355" in="SvgjsFeFlood2354Out"
                                                    in2="SourceAlpha" operator="in" result="SvgjsFeComposite2355Out">
                                                </feComposite>
                                                <feOffset id="SvgjsFeOffset2356" dx="0" dy="3"
                                                    result="SvgjsFeOffset2356Out" in="SvgjsFeComposite2355Out">
                                                </feOffset>
                                                <feGaussianBlur id="SvgjsFeGaussianBlur2357" stdDeviation="10 "
                                                    result="SvgjsFeGaussianBlur2357Out" in="SvgjsFeOffset2356Out">
                                                </feGaussianBlur>
                                                <feMerge id="SvgjsFeMerge2358" result="SvgjsFeMerge2358Out"
                                                    in="SourceGraphic">
                                                    <feMergeNode id="SvgjsFeMergeNode2359"
                                                        in="SvgjsFeGaussianBlur2357Out"></feMergeNode>
                                                    <feMergeNode id="SvgjsFeMergeNode2360" in="[object Arguments]">
                                                    </feMergeNode>
                                                </feMerge>
                                                <feBlend id="SvgjsFeBlend2361" in="SourceGraphic"
                                                    in2="SvgjsFeMerge2358Out" mode="normal"
                                                    result="SvgjsFeBlend2361Out"></feBlend>
                                            </filter>
                                        </defs>
                                        <g id="SvgjsG2341" class="apexcharts-radialbar">
                                            <g id="SvgjsG2342">
                                                <g id="SvgjsG2343" class="apexcharts-tracks">
                                                    <g id="SvgjsG2344"
                                                        class="apexcharts-radialbar-track apexcharts-track" rel="1">
                                                        <path id="apexcharts-radialbarTrack-0"
                                                            d="M 53 22.704878048780486 A 30.295121951219514 30.295121951219514 0 1 1 52.99471250377342 22.704878510201578"
                                                            fill="none" fill-opacity="1" stroke="rgba(242,242,242,0.85)"
                                                            stroke-opacity="1" stroke-linecap="round"
                                                            stroke-width="1.7648780487804883" stroke-dasharray="0"
                                                            class="apexcharts-radialbar-area"
                                                            data:pathOrig="M 53 22.704878048780486 A 30.295121951219514 30.295121951219514 0 1 1 52.99471250377342 22.704878510201578">
                                                        </path>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG2346">
                                                    <g id="SvgjsG2351"
                                                        class="apexcharts-series apexcharts-radial-series"
                                                        seriesName="series-1" rel="1" data:realIndex="0">
                                                        <path id="SvgjsPath2352"
                                                            d="M 53 22.704878048780486 A 30.295121951219514 30.295121951219514 0 1 1 23.26148476682089 47.2194182156779"
                                                            fill="none" fill-opacity="0.85"
                                                            stroke="var(--theme-default)" stroke-opacity="1"
                                                            stroke-linecap="round" stroke-width="2.941463414634147"
                                                            stroke-dasharray="0"
                                                            class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                            data:angle="281" data:value="78"
                                                            filter="url(#SvgjsFilter2353)" index="0" j="0"
                                                            data:pathOrig="M 53 22.704878048780486 A 30.295121951219514 30.295121951219514 0 1 1 23.26148476682089 47.2194182156779">
                                                        </path>
                                                    </g>
                                                    <circle id="SvgjsCircle2347" r="24.41268292682927" cx="53" cy="53"
                                                        class="apexcharts-radialbar-hollow" fill="transparent"></circle>
                                                    <g id="SvgjsG2348" class="apexcharts-datalabels-group"
                                                        transform="translate(0, 0) scale(1)" style="opacity: 1;">
                                                        <text id="SvgjsText2349"
                                                            font-family="Helvetica, Arial, sans-serif" x="53" y="53"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="16px" font-weight="600"
                                                            fill="var(--theme-default)"
                                                            class="apexcharts-text apexcharts-datalabel-label"
                                                            style="font-family: Helvetica, Arial, sans-serif;">series-1</text><text
                                                            id="SvgjsText2350"
                                                            font-family="Helvetica, Arial, sans-serif" x="53" y="59"
                                                            text-anchor="middle" dominant-baseline="auto"
                                                            font-size="14px" font-weight="400"
                                                            fill="var(--body-font-color)"
                                                            class="apexcharts-text apexcharts-datalabel-value"
                                                            style="font-family: Helvetica, Arial, sans-serif;">{{$row['total_percentage']}}</text>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>

                                    </g>
                                    <g id="SvgjsG2338" class="apexcharts-annotations"></g>
                                </svg>
                                <div class="apexcharts-legend"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endforeach
</div>




<!-- walletTotal -->


<div class="row">
    <div class="col-xl-9 col-md-12 proorder-md-4">
        <div class="card">
            <div class="card-header card-no-border pb-0">
                <div class="header-top">
                    <h4>Wallet Total</h4>
                    <div class="dropdown icon-dropdown">
                        <!-- <button class="btn dropdown-toggle" id="userdropdown1" type="button"
                                     data-bs-toggle="dropdown" aria-expanded="false"><i
                                         class="icon-more-alt"></i></button> -->
                        <!-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown1"><a
                                     class="dropdown-item" href="#">Weekly</a><a class="dropdown-item"
                                     href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div> -->
                    </div>
                </div>
            </div>
            <div class="card-body pt-0 assignments-table px-0">
                <div class="table-responsive theme-scrollbar">
                    <table class="table display" id="assignments-table" style="width:100%">
                        <thead>
                            <tr>

                                <th>Sno </th>
                                <th>Role Name</th>
                                <th>User Count </th>
                                <th>Total Balance</th>
                                <th>Total V Balance</th>
                                <th>Total Cashback</th>
                                <th>Total Credit Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($data['data']['walletTotal']))
                            @foreach(@$data['data']['walletTotal'] as $row)
                            <tr>

                                <td> <span>{{$row['role_id']}}</span></td>
                                <td> <span>{{$row['role_name']}}</span></td>
                                <td> <span>{{$row['user_count']}}</span></td>
                                <td> <span>{{$row['total_balance']}}</span></td>
                                <td> <span>{{$row['total_v_balance']}}</span></td>
                                <td> <span>{{$row['total_cashback']}}</span></td>
                                <td> <span>{{$row['total_credit_balance']}}</span></td>


                            </tr>
                            @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-12 proorder-md-5">
        <div class="row">








            <div class="col-xl-12 col-sm-12">
                <div class="card">
                    <div class="card-body student-4">
                        <div class="d-flex gap-2 align-items-end">
                            <div class="flex-grow-1">
                                <h2>{{@$data['data']['mainWalletBalance']}}</h2>
                                <p class="mb-0 text-truncate">WalletBalance</p>
                                <div class="d-flex student-arrow text-truncate">
                                    <p class="mb-0 up-arrow bg-light-danger"><i class="icon-arrow-down font-danger"></i>
                                    </p>
                                    <span class="f-w-500 font-danger">- 15.02%</span>than last 5 Month
                                </div>
                            </div>
                            <div class="flex-shrink-0"><img
                                    src="{{asset('/ui')}}/assets/images/dashboard-4/icon/invoice.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-12 col-sm-12">
                <div class="card">
                    <div class="card-body student-4">
                        <div class="d-flex gap-2 align-items-end">
                            <div class="flex-grow-1">
                                <h2>{{@$data['data']['pendingWalletRequests']}}</h2>
                                <p class="mb-0 text-truncate">WalletRequests</p>
                                <div class="d-flex student-arrow text-truncate">
                                    <p class="mb-0 up-arrow bg-light-danger"><i class="icon-arrow-down font-danger"></i>
                                    </p>
                                    <span class="f-w-500 font-danger">- 15.02%</span>than last 5 Month
                                </div>
                            </div>
                            <div class="flex-shrink-0"><img
                                    src="{{asset('/ui')}}/assets/images/dashboard-4/icon/invoice.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="{{asset('/ui')}}/assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('/ui')}}/assets/js/datatable/datatables/datatable.custom.js"></script>
<script src="{{asset('/ui')}}/assets/js/datatable/datatables/datatable.custom1.js"></script>
<script>
var xValues = <?=json_encode(@$data['data']['monthlyReport']['months'])?>;
var yValues = <?=json_encode(@$data['data']['monthlyReport']['values'])?>;
var barColors = ["red", "green", "blue", "orange", "brown", "purple", "yellow", "pink", "gray", "cyan", "lime",
    "indigo"
];


new Chart("myChart", {
    type: "bar",
    data: {
        labels: xValues,
        datasets: [{
            backgroundColor: barColors,
            data: yValues
        }]
    },
    options: {
        legend: {
            display: false
        },
        title: {
            display: true,
            text: "Monthly Report"
        }
    }
});
</script>