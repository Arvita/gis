@extends('layouts.backend')
@section('content')
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="activity"></i></div>
                            {{ __($title) }}
                        </h1>
                        <div class="page-header-subtitle">Sistem Informasi Geografis Tanaman Pangan Kabupaten Jember</div>
                    </div>
                  
                </div>
            </div>
        </div>
    </header>
    <div class="container mt-n10">
        <div class="row">
            <div class="col-xxl-3 col-lg-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Total Panen</div>
                                <div class="text-lg font-weight-bold">{{ $luaspanen }} Ha</div>
                            </div>
                            <img class="feather-xl text-white-50" src="{{ asset('admin') }}/assets/img/total_lahan.svg"/>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Report</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Total Panen Padi</div>
                                <div class="text-lg font-weight-bold">{{ $luaspadi }} Ha</div>
                            </div>
                            <img class="feather-xl text-white-50" src="{{ asset('admin') }}/assets/img/padi.svg"/>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Report</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Total Panen Kedelai</div>
                                <div class="text-lg font-weight-bold">{{ $luaskedelai }} Ha</div>
                            </div>
                            <img class="feather-xl text-white-50" src="{{ asset('admin') }}/assets/img/kedelai.svg"/>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Tasks</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Total Panen Jagung</div>
                                <div class="text-lg font-weight-bold">{{ $luasjagung }} Ha</div>
                            </div>
                            <img class="feather-xl text-white-50" src="{{ asset('admin') }}/assets/img/jagung.svg"/>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Requests</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-12 col-xl-12 mb-4">
                <div class="card card-header-actions h-100">
                    <div class="card-header">
                        Progress Panen
                    </div>
                    <div class="card-body">
                        <?php 
                            $padi = number_format( $luaspadi / $luaspanen * 100 , 2);
                            $kedelai = number_format($luaskedelai / $luaspanen * 100 ,2);
                            $jagung = number_format($luasjagung / $luaspanen * 100 ,2);
                        ?>
                        <h4 class="small">
                            Panen Padi
                            <span class="float-right font-weight-bold">{{ $padi}}%</span>
                        </h4>
                        <div class="progress mb-4"><div class="progress-bar bg-warning" role="progressbar" style="width:{{ $padi}}%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div></div>
                        <h4 class="small">
                            Panen Kedelai
                            <span class="float-right font-weight-bold">{{ $kedelai}} %</span>
                        </h4>
                        <div class="progress"><div class="progress-bar bg-success" role="progressbar" style="width: {{ $kedelai}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div></div>
                       <br>
                        <h4 class="small">
                           Panen Jagung
                            <span class="float-right font-weight-bold">{{ $jagung}}%</span>
                        </h4>
                        <div class="progress mb-4"><div class="progress-bar bg-danger" role="progressbar" style="width:{{ $jagung}}%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div></div>
                    </div>
                   
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-xxl-4 col-xl-6 mb-4">
                <div class="card card-header-actions h-100">
                    <div class="card-header">
                        10 Kecamatan Dengan Panen Tertinggi Padi
                    </div>
                    <div class="card-body">
                        <div class="timeline timeline-xs">
                            <!-- Timeline Item 1-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">27 min</div>
                                    <div class="timeline-item-marker-indicator bg-green"></div>
                                </div>
                                <div class="timeline-item-content">
                                    New order placed!
                                    <a class="font-weight-bold text-dark" href="#!">Order #2912</a>
                                    has been successfully placed.
                                </div>
                            </div>
                            <!-- Timeline Item 2-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">58 min</div>
                                    <div class="timeline-item-marker-indicator bg-blue"></div>
                                </div>
                                <div class="timeline-item-content">
                                    Your
                                    <a class="font-weight-bold text-dark" href="#!">weekly report</a>
                                    has been generated and is ready to view.
                                </div>
                            </div>
                            <!-- Timeline Item 3-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">2 hrs</div>
                                    <div class="timeline-item-marker-indicator bg-purple"></div>
                                </div>
                                <div class="timeline-item-content">
                                    New user
                                    <a class="font-weight-bold text-dark" href="#!">Valerie Luna</a>
                                    has registered
                                </div>
                            </div>
                            <!-- Timeline Item 4-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">1 day</div>
                                    <div class="timeline-item-marker-indicator bg-yellow"></div>
                                </div>
                                <div class="timeline-item-content">Server activity monitor alert</div>
                            </div>
                            <!-- Timeline Item 5-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">1 day</div>
                                    <div class="timeline-item-marker-indicator bg-green"></div>
                                </div>
                                <div class="timeline-item-content">
                                    New order placed!
                                    <a class="font-weight-bold text-dark" href="#!">Order #2911</a>
                                    has been successfully placed.
                                </div>
                            </div>
                            <!-- Timeline Item 6-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">1 day</div>
                                    <div class="timeline-item-marker-indicator bg-purple"></div>
                                </div>
                                <div class="timeline-item-content">
                                    Details for
                                    <a class="font-weight-bold text-dark" href="#!">Marketing and Planning Meeting</a>
                                    have been updated.
                                </div>
                            </div>
                            <!-- Timeline Item 7-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">2 days</div>
                                    <div class="timeline-item-marker-indicator bg-green"></div>
                                </div>
                                <div class="timeline-item-content">
                                    New order placed!
                                    <a class="font-weight-bold text-dark" href="#!">Order #2910</a>
                                    has been successfully placed.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-6 mb-4">
                <div class="card card-header-actions h-100">
                    <div class="card-header">
                        10 Kecamatan Dengan Panen Tertinggi Kedelai
                    </div>
                    <div class="card-body">
                        <div class="timeline timeline-xs">
                            <!-- Timeline Item 1-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">27 min</div>
                                    <div class="timeline-item-marker-indicator bg-green"></div>
                                </div>
                                <div class="timeline-item-content">
                                    New order placed!
                                    <a class="font-weight-bold text-dark" href="#!">Order #2912</a>
                                    has been successfully placed.
                                </div>
                            </div>
                            <!-- Timeline Item 2-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">58 min</div>
                                    <div class="timeline-item-marker-indicator bg-blue"></div>
                                </div>
                                <div class="timeline-item-content">
                                    Your
                                    <a class="font-weight-bold text-dark" href="#!">weekly report</a>
                                    has been generated and is ready to view.
                                </div>
                            </div>
                            <!-- Timeline Item 3-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">2 hrs</div>
                                    <div class="timeline-item-marker-indicator bg-purple"></div>
                                </div>
                                <div class="timeline-item-content">
                                    New user
                                    <a class="font-weight-bold text-dark" href="#!">Valerie Luna</a>
                                    has registered
                                </div>
                            </div>
                            <!-- Timeline Item 4-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">1 day</div>
                                    <div class="timeline-item-marker-indicator bg-yellow"></div>
                                </div>
                                <div class="timeline-item-content">Server activity monitor alert</div>
                            </div>
                            <!-- Timeline Item 5-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">1 day</div>
                                    <div class="timeline-item-marker-indicator bg-green"></div>
                                </div>
                                <div class="timeline-item-content">
                                    New order placed!
                                    <a class="font-weight-bold text-dark" href="#!">Order #2911</a>
                                    has been successfully placed.
                                </div>
                            </div>
                            <!-- Timeline Item 6-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">1 day</div>
                                    <div class="timeline-item-marker-indicator bg-purple"></div>
                                </div>
                                <div class="timeline-item-content">
                                    Details for
                                    <a class="font-weight-bold text-dark" href="#!">Marketing and Planning Meeting</a>
                                    have been updated.
                                </div>
                            </div>
                            <!-- Timeline Item 7-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">2 days</div>
                                    <div class="timeline-item-marker-indicator bg-green"></div>
                                </div>
                                <div class="timeline-item-content">
                                    New order placed!
                                    <a class="font-weight-bold text-dark" href="#!">Order #2910</a>
                                    has been successfully placed.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-6 mb-4">
                <div class="card card-header-actions h-100">
                    <div class="card-header">
                        10 Kecamatan Dengan Panen Tertinggi Jagung
                    </div>
                    <div class="card-body">
                        <div class="timeline timeline-xs">
                            <!-- Timeline Item 1-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">27 min</div>
                                    <div class="timeline-item-marker-indicator bg-green"></div>
                                </div>
                                <div class="timeline-item-content">
                                    New order placed!
                                    <a class="font-weight-bold text-dark" href="#!">Order #2912</a>
                                    has been successfully placed.
                                </div>
                            </div>
                            <!-- Timeline Item 2-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">58 min</div>
                                    <div class="timeline-item-marker-indicator bg-blue"></div>
                                </div>
                                <div class="timeline-item-content">
                                    Your
                                    <a class="font-weight-bold text-dark" href="#!">weekly report</a>
                                    has been generated and is ready to view.
                                </div>
                            </div>
                            <!-- Timeline Item 3-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">2 hrs</div>
                                    <div class="timeline-item-marker-indicator bg-purple"></div>
                                </div>
                                <div class="timeline-item-content">
                                    New user
                                    <a class="font-weight-bold text-dark" href="#!">Valerie Luna</a>
                                    has registered
                                </div>
                            </div>
                            <!-- Timeline Item 4-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">1 day</div>
                                    <div class="timeline-item-marker-indicator bg-yellow"></div>
                                </div>
                                <div class="timeline-item-content">Server activity monitor alert</div>
                            </div>
                            <!-- Timeline Item 5-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">1 day</div>
                                    <div class="timeline-item-marker-indicator bg-green"></div>
                                </div>
                                <div class="timeline-item-content">
                                    New order placed!
                                    <a class="font-weight-bold text-dark" href="#!">Order #2911</a>
                                    has been successfully placed.
                                </div>
                            </div>
                            <!-- Timeline Item 6-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">1 day</div>
                                    <div class="timeline-item-marker-indicator bg-purple"></div>
                                </div>
                                <div class="timeline-item-content">
                                    Details for
                                    <a class="font-weight-bold text-dark" href="#!">Marketing and Planning Meeting</a>
                                    have been updated.
                                </div>
                            </div>
                            <!-- Timeline Item 7-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">2 days</div>
                                    <div class="timeline-item-marker-indicator bg-green"></div>
                                </div>
                                <div class="timeline-item-content">
                                    New order placed!
                                    <a class="font-weight-bold text-dark" href="#!">Order #2910</a>
                                    has been successfully placed.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row">
            
            <div class="col-xxl-12 col-lg-12 col-md-12 mb-4">
                <!-- Pie chart with legend example-->
                <div class="card h-100">
                    <div class="card-header">Grafik Perbandingan</div>
                    <div class="card-body">
                        <div class="chart-pie mb-4"><canvas id="chart" width="100%" height="50"></canvas></div>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                <div class="mr-3">
                                    <i class="fas fa-circle fa-sm mr-1 text-warning"></i>
                                    Padi
                                </div>
                                <div class="font-weight-500 text-dark"><?= number_format($luaspadi !== 0 ?  $luaspadi / $luaspanen * 100 : 0 , 2) ?> %</div>
                            </div>
                            <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                <div class="mr-3">
                                    <i class="fas fa-circle fa-sm mr-1 text-danger"></i>
                                    Jagung
                                </div>
                                <div class="font-weight-500 text-dark"><?=number_format( $luasjagung !== 0 ?  $luasjagung / $luaspanen * 100 : 0 ,2) ?> %</div>
                            </div>
                            <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                <div class="mr-3">
                                    <i class="fas fa-circle fa-sm mr-1 text-green"></i>
                                   Kedelai
                                </div>
                                <div class="font-weight-500 text-dark"><?= number_format($luaskedelai !== 0 ?  $luaskedelai / $luaspanen * 100 : 0 ,2) ?> %</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div> 
    </div>
</main>
@endsection
@push('after-script')
<script>

var padi = {{ $luaspadi }} / {{ $luaspanen }} * 100;
var kedelai = {{ $luasjagung }} / {{ $luaspanen }} * 100;
var jagung = {{ $luaskedelai }} / {{ $luaspanen }} * 100;
    (Chart.defaults.global.defaultFontFamily = "Metropolis"),
'-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#858796";

// Pie Chart Example
var ctx = document.getElementById("chart");
var myPieChart = new Chart(ctx, {
    type: "doughnut",
    data: {
        labels: ["Padi", "Jagung", "Kedelai"],
        datasets: [{
            data: [padi, jagung,kedelai],
            backgroundColor: [
                "rgb(255, 165, 0)",
                "rgb(255, 0, 0)",
                "rgba(0, 172, 105, 1)",
            ],
            hoverBackgroundColor: [
                "rgb(255, 165, 0)",
                "rgb(255, 0, 0)",
                "rgba(0, 172, 105, 1)",
            ],
            hoverBorderColor: "rgba(234, 236, 244, 1)"
        }]
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: "#dddfeb",
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10
        },
        legend: {
            display: false
        },
        cutoutPercentage: 80
    }
});
</script>
@endpush