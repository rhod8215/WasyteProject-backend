@extends('layouts.master')

@section('title')
    Dashboard | Wayste of Bridge360
@endsection

@section('subTitle')
    <a class="navbar-brand" href="/dashboard"><h4>DASHBOARD</h4></a>
@endsection

@section('content')
<style>
    .progress-container .progress {
    height: 10px;
    }
    .progress-container.progress-warning .progress-bar {
    background: #d1ec2d;
    }
    .progress-container.progress-warning .progress {
    background: rgba(186, 223, 75, 0.3);
    }
    .progress-container.progress-primary .progress-bar {
    background: #6405a1;
    }
    .progress-container.progress-primary .progress {
    background: rgba(145, 50, 249, 0.43);
    }
</style>

    <div class="content">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><strong>WASTES</strong></h4>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">WASTES TODAY</h4>
            </div>
            <div class="card-body" style="padding-left: 50px; padding-right: 50px; padding-bottom: 40px;">

                <!--<blockquote class="blockquote blockquote-info mb-0">-->
                <div class="progress-container progress-info">
                    <span class="progress-badge">Kitchen Wastes</span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $kitchenWasteWeighDailyPercentage }}%;">
                            <span class="progress-value"><h5>{{ $kitchenWasteWeighDailyPercentage }}% | {{ $kitchenWasteWeighDaily }} kg | {{ $kitchenWasteWeighDailyTon }} ton </h5></span>
                        </div>
                    </div>
                </div>

                <div class="progress-container progress-success">
                    <span class="progress-badge">Recyclable Wastes</span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $recWasteDailyPercentage }}%;">
                            <span class="progress-value"><h5>{{ $recWasteDailyPercentage }}% | {{ $recWasteWeighDaily }} kg | {{ $recWasteWeighDailyTon }} ton </h5></span>
                        </div>
                    </div>
                </div>

                <div class="progress-container progress-warning">
                    <span class="progress-badge" style="color: #d1ec2d;">Electronic Wastes</span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $electronicWasteWeighDailyPercentage }}%;">
                            <span class="progress-value"><h5>{{ $electronicWasteWeighDailyPercentage }}% | {{ $electronicWasteWeighDaily }} kg | {{ $electronicWasteWeighDailyTon }} ton </h5></span>
                        </div>
                    </div>
                </div>

                <div class="progress-container progress-primary">
                    <span class="progress-badge"style="color: #6405a1;" >Residual Wastes</span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $residualWasteWeighDailyPercentage }}%;">
                            <span class="progress-value"><h5>{{ $residualWasteWeighDailyPercentage }}% | {{ $residualWasteWeighDaily }} kg | {{ $residualWasteWeighDailyTon }} ton </h5></span>
                        </div>
                    </div>
                </div>

                <div class="progress-container progress-danger">
                    <span class="progress-badge">Hazardous Wastes</span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $hazardWasteWeighDailyPercentage }}%;">
                            <span class="progress-value"><h5>{{ $hazardWasteWeighDailyPercentage }}% | {{ $hazardWasteWeighDaily }} kg | {{ $hazardWasteWeighDailyTon }} ton </h5></span>
                        </div>
                    </div>
                </div>

                <div class="progress-container">
                    <span class="progress-badge">Bulk Waste</span>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $bulkWasteWeighDailyPercentage }}%;">
                            <span class="progress-value"><h5>{{ $bulkWasteWeighDailyPercentage }}% | {{ $bulkWasteWeighDaily }} kg | {{ $bulkWasteWeighDailyTon }} ton </h5></span>
                        </div>
                    </div>
                </div>







                    <!--</blockquote>-->
            </div>
        </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">TOTAL WASTES</h4>
                </div>

                <div class="card-body">
                    <div class="card-deck">
                        <div class="card text-white" style=" padding: 0px; background-color: #4169E1; color: white;" >
                            <div class="card-header"  style=" padding: 0px; padding-left: 10px; text-align: left;">

                                <button type="button" style="background-color: #191970; color: #4169E1;" class="btn btn-round btn-icon btn-floating btn-lg btn-warning">
                                    <i class="fas fa-utensils"></i>
                                </button>
                                <span class="ml-15 " style="font-size: 18px;">Kitchen Waste</span>
                            </div>
                            <div class="text-center " style=" padding-bottom: 0px; padding: 0px; background-color: #191970; color: #fff;">
                                <p class="card-text"><h2>{{ $kitchenWasteWeigh }} kg</h2></p>
                                <p class="card-text"><h5>{{ $kitchenWasteWeighTon }} ton</h5></p>
                            </div>
                        </div>
                        <div class="card text-white" style=" padding: 0px; background-color: #48d019; color: white;" >
                            <div class="card-header"  style=" padding: 0px; padding-left: 10px; text-align: left;">
                                <button type="button" style="background-color: #064815; color: #48d019;" class="btn btn-round btn-icon btn-floating btn-lg btn-warning">
                                    <i class="fas fa-recycle"></i>
                                </button>
                                <span class="ml-15 " style="font-size: 18px;">Recyclable Waste</span>
                            </div>
                            <div class="text-center " style=" padding-bottom: 0px; padding: 0px; background-color: #064815; color: #fff;">
                                <p class="card-text"><h2>{{ $recWasteWeigh }} kg</h2></p>
                                <p class="card-text"><h5>{{ $recWasteWeighTon }} ton</h5></p>
                            </div>
                        </div>
                        <div class="card text-white" style=" padding: 0px; background-color: #d1ec2d; color: white;" >
                            <div class="card-header"  style=" padding: 0px; padding-left: 10px; text-align: left;">
                                <button type="button" style="background-color: #6e7d13; color: #d1ec2d;" class="btn btn-round btn-icon btn-floating btn-lg btn-warning">
                                    <i class="fas fa-bolt"></i>
                                </button>
                                <span class="ml-15 " style="font-size: 18px;">Electronic Waste</span>
                            </div>
                            <div class="text-center " style=" padding-bottom: 0px; padding: 0px; background-color: #6e7d13; color: #fff;">
                                <p class="card-text"><h2>{{ $electronicWasteWeigh }} kg</h2></p>
                                <p class="card-text"><h5>{{ $electronicWasteWeighTon }} ton</h5></p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card-deck">
                        <div class="card text-white" style=" padding: 0px; background-color: #a11ef6; color: white;" >
                            <div class="card-header"  style=" padding: 0px; padding-left: 10px; text-align: left;">

                                <button type="button" style="background-color: #6405a1; color: #a11ef6;" class="btn btn-round btn-icon btn-floating btn-lg btn-warning">
                                    <i class="fas fa-dumpster"></i>
                                </button>
                                <span class="ml-15 " style="font-size: 18px;">Residual Waste</span>
                            </div>
                            <div class="text-center " style=" padding-bottom: 0px; padding: 0px; background-color: #6405a1; color: #fff;">
                                <p class="card-text"><h2>{{ $residualWasteWeigh }} kg</h2></p>
                                <p class="card-text"><h5>{{ $residualWasteWeighTon }} ton</h5></p>
                            </div>
                        </div>
                        <div class="card text-white" style=" padding: 0px; background-color: #e62437; color: white;" >
                            <div class="card-header"  style=" padding: 0px; padding-left: 10px; text-align: left;">
                                <button type="button" style="background-color: #700610; color: #e62437;" class="btn btn-round btn-icon btn-floating btn-lg btn-warning">
                                    <i class="fas fa-biohazard"></i>
                                </button>
                                <span class="ml-15 " style="font-size: 18px;">Hazardous Waste</span>
                            </div>
                            <div class="text-center " style=" padding-bottom: 0px; padding: 0px; background-color: #700610; color: #fff;">
                                <p class="card-text"><h2>{{ $hazardWasteWeigh }} kg</h2></p>
                                <p class="card-text"><h5>{{ $hazardWasteWeighTon }} ton</h5></p>
                            </div>
                        </div>
                        <div class="card text-white" style=" padding: 0px; background-color: #8b8282d6; color: white;" >
                            <div class="card-header"  style=" padding: 0px; padding-left: 10px; text-align: left;">
                                <button type="button" style="background-color: #3a3a36; color: #8b8282d6;" class="btn btn-round btn-icon btn-floating btn-lg btn-warning">
                                    <i class="fas fa-swatchbook"></i>
                                </button>
                                <span class="ml-15 " style="font-size: 18px;">Bulk Waste</span>
                            </div>
                            <div class="text-center " style=" padding-bottom: 0px; padding: 0px; background-color: #3a3a36; color: #fff;">
                                <p class="card-text"><h2>{{ $bulkWasteWeigh }} kg</h2></p>
                                <p class="card-text"><h5>{{ $bulkWasteWeighTon }} ton</h5></p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card  text-white bg-info ">
                        <div class="card-header">
                            <button type="button" class="btn btn-round btn-icon btn-floating btn-lg btn-neutral" style="background-color: #1c1c6b;">
                                <i class="fas fa-chart-line"></i>
                            </button>
                            Monthly Waste Stats
                        </div>
                        <div class="card-body">
                            <canvas id="myChart3" width="200" height="54"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('scripts')

<script src="../js/dashboardWasteChart.js"></script>



<!-- Plugins -->

<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<!-- <script src="../assets2/js/plugins/bootstrap-switch.js"></script> -->

<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<!-- <script src="../assets2/js/plugins/nouislider.min.js" type="text/javascript"></script> -->


<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<!-- <script src="../assets2/js/now-ui-kit.js?v=1.2.0" type="text/javascript"></script> -->
@endsection
