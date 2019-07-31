@extends('layouts.master')

@section('title')
    Dashboard | Wayste of Bridge360
@endsection

@section('subTitle')
    <a class="navbar-brand" href="/dashboard"><h4>DASHBOARD</h4></a>
@endsection

@section('content')

    <div class="content">
        <div class="card">
            <div class="card-header">
                <!-- <h5 class="card-category">Global Sales</h5> -->
                <h4 class="card-title"><strong>USERS</strong></h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header" style="padding-top: 0px;"></div>
                            <div class="card-body"  style="padding-bottom: 0px;">
                                 <div class="card-block  p-20"> <!-- bg-white -->
                                    <button type="button" class="btn btn-round btn-icon btn-floating btn-lg btn-warning">
                                        <i class="fas fa-user-tag"></i>
                                    </button>
                                    <span class="ml-15 ">Household</span>
                                    <div class="content-text text-center mb-0">
                                        <i class="text-danger icon wb-triangle-up font-size-20"></i>
                                        <span class=""><h1>{{ $currentMonthCountHousehold}}</h1></span>
                                        <p class="blue-grey-400 font-weight-100 m-0"><strong>
                                            @if($householdpercentage > 0)
                                            +
                                            @endif
                                            {{ $householdpercentage }}
                                            % From previous month </strong></p>
                                        <p style="font-size: 14px;">Total registered household : {{ $totalhouseholdCount}}</p>

                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <span>
                                        <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse" style="padding-bottom: 0px;">
                                            <div class="card card-plain ">
                                                <div class="card-header float-right" role="tab" id="headingOne">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        <i class="now-ui-icons arrows-1_minimal-down"></i>
                                                    </a>
                                                </div>

                                              <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="card-body">
                                                    <br>

                                                      <div class="progress-container progress-warning">
                                                        <span class="progress-badge">Home Owner</span>
                                                        <div class="progress">
                                                          <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $householdHomeOwnerpercentage }}%;">
                                                            <span class="progress-value">@if($householdHomeOwnerpercentage > 0) + @endif {{ $householdHomeOwnerpercentage }}% ( {{ $currentMonthHomeOwnerCount }} ) Total: {{ $totalHomeOwnerCount }}</span>
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="progress-container progress-success">
                                                        <span class="progress-badge">Business Owner</span>
                                                        <div class="progress">
                                                          <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $householdBusinessOwnerpercentage }}%;">
                                                            <span class="progress-value"> @if($householdBusinessOwnerpercentage > 0) + @endif {{ $householdBusinessOwnerpercentage }}% ( {{ $currentMonthBusinessOwnerCount }} ) Total: {{ $totalBusinessOwnerCount }}</span>
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="progress-container progress-info">
                                                        <span class="progress-badge">MRF</span>
                                                        <div class="progress">
                                                          <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $householdMRFpercentage }}%;">
                                                            <span class="progress-value"> @if($householdMRFpercentage > 0) + @endif {{ $householdMRFpercentage }}% ( {{ $currentMonthMRFCount }} ) Total: {{ $totalMRFCount }}</span>
                                                          </div>
                                                        </div>
                                                    </div>

                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </span>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <div class="card-header" style="padding-top: 0px;"></div>
                            <div class="card-body" style="padding-bottom: 0px;">
                                <div class="card-block bg-white p-20">
                                    <button type="button" class="btn btn-round btn-icon btn-floating btn-lg btn-success">
                                        <i class="fas fa-dolly"></i>
                                    </button>
                                    <span class="ml-15 ">Collectors</span>
                                    <div class="content-text text-center mb-0">
                                        <i class="text-danger icon wb-triangle-up font-size-20"></i>
                                        <span class=""><h1>{{ $currentMonthCountCollector }}</h1></span>
                                        <p class="blue-grey-400 font-weight-100 m-0"><strong>
                                            @if($collectorpercentage > 0)
                                            +
                                            @endif
                                            {{ $collectorpercentage }}
                                            % From previous month </strong></p>
                                        <p style="font-size: 14px;">Total registered collector : {{ $totalCollectorCount}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <span>
                                        <div id="accordion2" role="tablist" aria-multiselectable="true" class="card-collapse" style="padding-bottom: 0px;">
                                            <div class="card card-plain">
                                                <div class="card-header float-right" role="tab" id="headingOne">
                                                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapseCollector" aria-expanded="true" aria-controls="collapseOne">
                                                        <i class="now-ui-icons arrows-1_minimal-down"></i>
                                                    </a>
                                                </div>

                                              <div id="collapseCollector" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="card-body">
                                                    <br>

                                                      <div class="progress-container progress-warning">
                                                        <span class="progress-badge">Eco-Aide</span>
                                                        <div class="progress">
                                                          <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $collectorEcoAidepercentage }}%;">
                                                            <span class="progress-value">@if($collectorEcoAidepercentage > 0) + @endif {{ $collectorEcoAidepercentage }}% ( {{ $currentMonthEcoAideCount }} ) Total: {{ $totalEcoAideCount }}</span>
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="progress-container progress-success">
                                                        <span class="progress-badge">Truck Hauler</span>
                                                        <div class="progress">
                                                          <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $collectorTruckHaulerpercentage }}%;">
                                                            <span class="progress-value">@if($collectorTruckHaulerpercentage > 0) + @endif {{ $collectorTruckHaulerpercentage }}% ( {{ $currentMonthTruckHaulerCount }} ) Total: {{ $totalTruckHaulerCount }}</span>
                                                          </div>
                                                        </div>
                                                      </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="padding-bottom: 0px;" >
                            <div class="card-header" style="padding-top: 0px;"></div>
                            <div class="card-body" style="padding-bottom: 0px;">
                                <div class="card-block bg-white p-20" >
                                    <button type="button" class="btn btn-round btn-icon btn-floating btn-lg btn-info">
                                         <i class="fas fa-user-cog"></i>
                                    </button>
                                    <span class="ml-15 ">Company Admins</span>
                                    <div class="content-text text-center mb-0">
                                        <i class="text-danger icon wb-triangle-up font-size-20"></i>
                                        <span class=""><h1>{{ $currentMonthCountCompAdmins }}</h1></span>
                                        <p class="blue-grey-400 font-weight-100 m-0"><strong>
                                            @if( $companyAdminpercentage > 0)
                                            +
                                            @endif
                                            {{ $companyAdminpercentage }}
                                            % From previous month </strong></p>
                                        <p style="font-size: 14px;">Total registered collector : {{ $totalCompAdminsCount}}</p>
                                    </div>


                                </div>
                            </div>
                            <div class="card-footer">
                                <span>
                                        <div id="accordion3" role="tablist" aria-multiselectable="true" class="card-collapse" style="padding-bottom: 0px;">
                                            <div class="card card-plain" >
                                                <div class="card-header float-right" role="tab" id="headingOne">
                                                    <a data-toggle="collapse" data-parent="#accordion3" href="#collapseAdmin" aria-expanded="true" aria-controls="collapseOne">
                                                        <i class="now-ui-icons arrows-1_minimal-down"></i>
                                                    </a>
                                                </div>

                                              <div id="collapseAdmin" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="card-body">
                                                    <br>
                                                    <p> Nothing to show.</p>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card">
                       <div class="card-body" style="background-color: rgba(30, 130, 76, 1); color: white; padding: 50px;">
                            <canvas id="myChart" width="200" height="50"></canvas>
                       </div>
                </div>
            </div>
        </div>

        <div class="">
            <div class="card">
                <div class="card-header" style="padding-top: 0px;">
                <h4 class="card-title"><strong>REQUESTS</strong></h4>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <!-- <canvas id="myChart" width="200" height="50"></canvas> -->
                                <div class="card  text-white bg-primary ">
                                    <!-- <div class="card-header">Header</div> -->
                                    <div class="card-body">

                                            <button type="button" class="btn btn-round btn-icon btn-floating btn-lg btn-warning">
                                                <i class="fas fa-handshake"></i>
                                            </button>
                                            <span class="ml-15 ">Daily Requests</span>
                                            <div class="content-text text-center mb-0">
                                                <i class="text-danger icon wb-triangle-up font-size-20"></i>
                                                <span class=""><h1>{{ $todayCountRequests }}</h1></span>
                                                <p class="blue-grey-400 font-weight-100 m-0"><strong>
                                                    @if($requestsPercentage > 0)
                                                    +
                                                    @endif
                                                    {{ $requestsPercentage }}
                                                    % From previous day </strong></p>
                                                <p style="font-size: 14px;">Total completed requests : {{ $totalRequestsCount}}</p>
                                            </div>
                                            <br>

                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="card  text-white bg-info ">
                                    <div class="card-header">
                                        <button type="button" class="btn btn-round btn-icon btn-floating btn-lg btn-neutral">
                                            <i class="fas fa-chart-line"></i>
                                        </button>
                                        Monthly Requests Stats
                                    </div>
                                    <div class="card-body">
                                        <!-- <h5 class="card-title">Primary card title</h5> -->
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <canvas id="myChart2" width="200" height="54"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>

<div class="">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><strong>WASTES</strong></h4>
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


        <div>

        </div>


    </div>
@endsection

@section('scripts')


<script src="../js/dashboardUserChart.js"></script>
<script src="../js/dashboardRequestsChart.js"></script>
<script src="../js/dashboardWasteChart.js"></script>



<!-- Plugins -->

<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<!-- <script src="../assets2/js/plugins/bootstrap-switch.js"></script> -->

<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<!-- <script src="../assets2/js/plugins/nouislider.min.js" type="text/javascript"></script> -->


<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<!-- <script src="../assets2/js/now-ui-kit.js?v=1.2.0" type="text/javascript"></script> -->
@endsection
