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
                <h4 class="card-title"><strong>REQUESTS</strong></h4>

                <div class="card card-nav-tabs card-plain">
                    <div class="card-header card-header-danger">
                        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#successful" data-toggle="tab">Successful</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#unsuccessful" data-toggle="tab">Unsuccessful</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="tab-content text-center">
                            <div class="tab-pane active" id="successful">
                                <div class="table-responsive" style="font-size: 10px;">
                                    <table class="table table-bordered" name="transactionsTable" id="transactionsTable">
                                        <thead class=" text-primary" style="color: green !important; font-size: 8px;">
                                            <th><strong> </strong></th>
                                            <th class="" style="text-align: center;" ><strong> Waste Type</strong></th>
                                            <th class="" style="text-align: center;" ><strong> Collector</strong></th>
                                            <th class="" style="text-align: center;" ><strong> Household</strong></th>
                                            <th class="" style="text-align: center;" ><strong> Address Occured</strong></th>
                                            <th class="" style="text-align: center;" ><strong> Payment</strong></th>
                                            <th class="" style="text-align: center;" ><strong> Weigh</strong></th>
                                            <th class="" style="text-align: center;" ><strong> Time Requested</strong></th>
                                            <th class="" style="text-align: center;" ><strong> Time Accepted</strong></th>
                                            <th class="" style="text-align: center;" ><strong> Time Completed</strong></th>
                                            <!-- <th class="text-center"><strong>Action</strong></th> -->
                                        </thead>

                                        <tbody>
                                            @foreach($completedTransactions as $index => $row)
                                                <tr>
                                                    <td>{{ $index +1 }}</td>
                                                    <td>{{ $row->waste_name }}</td>
                                                    <td>{{ $row->collector_first_name }} {{ $row->collector_last_name }}</td>
                                                    <td>{{ $row->household_first_name }} {{ $row->household_last_name }}</td>
                                                    <td>{{ $row->collected_at }}</td>
                                                    <td>{{ $row->payment }}</td>
                                                    <td>{{ $row->weigh }}</td>
                                                    <td>{{ $row->time_requested }}</td>
                                                    <td>{{ $row->time_accepted }}</td>
                                                    <td>{{ $row->time_completed }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="unsuccessful">
                                <div class="table-responsive" style="font-size: 10px;">
                                    <table class="table table-bordered" name="transactionsTable2" id="transactionsTable2">
                                        <thead class=" text-primary" style="color: green !important; font-size: 8px;">
                                            <th><strong> </strong></th>
                                            <th class="" style="text-align: center;" ><strong> Waste Type</strong></th>
                                            <th class="" style="text-align: center;" ><strong> Collector</strong></th>
                                            <th class="" style="text-align: center;" ><strong> Household</strong></th>
                                            <th class="" style="text-align: center;" ><strong> Address Occured</strong></th>
                                            <th class="" style="text-align: center;" ><strong> Payment</strong></th>
                                            <th class="" style="text-align: center;" ><strong> Weigh</strong></th>
                                            <th class="" style="text-align: center;" ><strong> Time Requested</strong></th>
                                            <th class="" style="text-align: center;" ><strong> Time Accepted</strong></th>
                                            <th class="" style="text-align: center;" ><strong> Time Completed</strong></th>
                                            <!-- <th class="text-center"><strong>Action</strong></th> -->
                                        </thead>

                                        <tbody>
                                            @foreach($uncompletedTransactions as $index => $row)
                                                <tr>
                                                    <td>{{ $index +1 }}</td>
                                                    <td>{{ $row->waste_name }}</td>
                                                    <td>{{ $row->collector_first_name }} {{ $row->collector_last_name }}</td>
                                                    <td>{{ $row->household_first_name }} {{ $row->household_last_name }}</td>
                                                    <td>{{ $row->collected_at }}</td>
                                                    <td>{{ $row->payment }}</td>
                                                    <td>{{ $row->weigh }}</td>
                                                    <td>{{ $row->time_requested }}</td>
                                                    <td>{{ $row->time_accepted }}</td>
                                                    <td>{{ $row->time_completed }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#transactionsTable').DataTable({
        });
    });
    $(document).ready(function() {
        $('#transactionsTable2').DataTable({
        });
    });
</script>




@endsection
