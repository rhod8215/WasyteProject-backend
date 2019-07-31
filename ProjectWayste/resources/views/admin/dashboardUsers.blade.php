@extends('layouts.master')

@section('title')
    Dashboard | Wayste of Bridge360
@endsection

@section('subTitle')
    <a class="navbar-brand" href="/dashboard/users"><h4>USERS</h4></a>
@endsection

@section('content')

<div class="content">
        <div class="card">
            <div class="card-header">
                <!--<h4 class="card-title"><strong>USERS</strong></h4>-->
            </div>

            <div class="card-body">
                <div class="card card-nav-tabs card-plain">
                    <div class="card-header card-header-danger">
                        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#Household" data-toggle="tab">Household</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#Collector" data-toggle="tab">Collector</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#Admin" data-toggle="tab">Admin</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="tab-content text-center">

                            <div class="tab-pane active" id="Household">
                                <div class="float-right">
                                    <button type="button" class="btn btn-sm btn-default" style="font-size: 10px;" data-toggle="modal" data-target="#addHouseholdModal"><i class="now-ui-icons ui-1_simple-add"></i> Add Household</button>
                                </div>
                                <div class="table-responsive" style="font-size: 10px;">
                                    <table class="table display" name="householdTable" id="householdTable">
                                        <thead class=" text-primary" style=" color: green !important;">
                                            <th class="" style="width: 50%; text-align: left;"><strong> Name</strong></th>
                                            <th class="" style="width: 25%; text-align: left;" ><strong> Household Type</strong></th>
                                            <th class="" style="width: 25%; text-align: center;" ><strong>Action</strong></th>
                                        </thead>

                                        <tbody>
                                            @foreach($households as $row)
                                                <tr>
                                                    <td style="text-align: left;">{{ $row->firstname }} {{ $row->lastname }}</td>
                                                    @if($row->type == 'HO')
                                                        <td style="text-align: left;">House Owner</td>
                                                    @elseif(($row->type == 'BO'))
                                                        <td style="text-align: left;">Business Owner</td>
                                                    @else
                                                        <td style="text-align: left;">Material Recovery Facility</td>
                                                    @endif
                                                    <td style="text-align: center;">
                                                        <span data-toggle="modal" data-target="#viewInfo">
                                                            <button id="{{ $row->id }}" type="button" class="btn btn-sm btn-info view_data " data-toggle="tooltip" data-placement="top" title="See more details"><i class="fas fa-eye"></i></button>
                                                        </span>
                                                        @if($row->active_status == 'active')
                                                            <span data-toggle="modal" data-target="#deactivateModal">
                                                                <button id="{{ $row->users_id }}" type="button" id=""class="btn btn-sm btn-danger mainDeactivateBtn" data-toggle="tooltip" data-placement="top" title="Deactivate User"><i class="fas fa-user-slash"></i></button>
                                                            </span>
                                                        @else
                                                            <span data-toggle="modal" data-target="#activateModal">
                                                                <button id="{{ $row->users_id }}" type="button" id="" class="btn btn-sm btn-success mainActivateBtn" data-toggle="tooltip" data-placement="top" title="Activate User"><i class="fas fa-universal-access"></i></button>
                                                            </span>
                                                        @endif
                                                        <span data-toggle="modal" data-target="#householdEditModal">
                                                            <button id="{{ $row->id }}" type="button" class="btn btn-sm btn-primary editbtn"  data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></button>
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="Collector">
                                <div class="float-right">
                                    <button type="button" class="btn btn-sm btn-default" style="font-size: 10px;" data-toggle="modal" data-target="#addCollectorModal"><i class="now-ui-icons ui-1_simple-add"></i> Add Collector</button>
                                </div>
                                <div class="table-responsive" style="font-size: 10px;">
                                    <table class="table display" name="collectorTable" id="collectorTable">
                                        <thead class=" text-primary" style="color: green !important;">
                                            <th class="" style="width: 25%; text-align: left;"><strong> Name</strong></th>
                                            <th class="" style="width: 15%; text-align: left;"><strong> Collector Type</strong></th>
                                            <th class="" style="width: 20%; text-align: left;"><strong>Date Signed-Up</strong> </th>
                                            <th class="" style="width: 20%; text-align: center;"><strong>Action</strong> </th>
                                            <th class="" style="width: 20%; text-align: center;"><strong>Status</strong> </th>
                                        </thead>

                                        <tbody>
                                            @foreach($collectors as $row)
                                                <tr>
                                                    <td style="text-align: left;">{{ $row->firstname }} {{ $row->lastname }}</td>
                                                    @if($row->type == 'ecoAide')
                                                        <td style="text-align: left;">Eco-Aide</td>
                                                    @else
                                                        <td style="text-align: left;">Truck Hauler</td>
                                                    @endif
                                                    <td style="text-align: left;">{{ $row->created_at }}</td>
                                                    <td style="text-align: center;">
                                                        <span data-toggle="modal" data-target="#viewInfoColl">
                                                            <button id="{{ $row->id }}" type="button" class="btn btn-sm btn-info view_data_coll " data-toggle="tooltip" data-placement="top" title="See more details"><i class="fas fa-eye"></i></button>
                                                        </span>
                                                        @if($row->active_status == 'active')
                                                            <span data-toggle="modal" data-target="#deactivateModal">
                                                                <button id="{{ $row->users_id }}" type="button" id=""class="btn btn-sm btn-danger mainDeactivateBtn" data-toggle="tooltip" data-placement="top" title="Deactivate User"><i class="fas fa-user-slash"></i></button>
                                                            </span>
                                                        @else
                                                            <span data-toggle="modal" data-target="#activateModal">
                                                                <button id="{{ $row->users_id }}" type="button" id="" class="btn btn-sm btn-success mainActivateBtn" data-toggle="tooltip" data-placement="top" title="Activate User"><i class="fas fa-universal-access"></i></button>
                                                            </span>
                                                        @endif
                                                        <span data-toggle="modal" data-target="#collectorEditModal">
                                                            <button id="{{ $row->id }}" type="button" class="btn btn-sm btn-primary editbtncoll"  data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></button>
                                                        </span>
                                                    </td>
                                                    @if($row->sign_up_status == 'Approved')
                                                        <td style="text-align: center;"><span class="badge badge-success">{{ $row->sign_up_status }}</span></td>
                                                    @elseif($row->sign_up_status == 'Disapproved')
                                                        <td style="text-align: center;"><span class="badge badge-danger">{{ $row->sign_up_status }}</span></td>
                                                    @else
                                                        <td style="text-align: center;"><span class="badge badge-warning">{{ $row->sign_up_status }}</span></td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" id="Admin">
                                <div class="float-right">
                                    <button type="button" class="btn btn-sm btn-default" style="font-size: 10px;" data-toggle="modal" data-target="#addAdminModal"><i class="now-ui-icons ui-1_simple-add"></i> Add Admin</button>
                                </div>
                                <div class="table-responsive" style="font-size: 10px;">
                                    <table class="table display" name="adminTable" id="adminTable">
                                        <thead class=" text-primary" style="color: green !important;">
                                            <th class="" style="width: 25%; text-align: left;"><strong> Name</strong></th>
                                            <th class="" style="width: 20%; text-align: left;"><strong> Email/Username</strong></th>
                                            <th class="" style="width: 25%; text-align: left;"><strong> Company/LGU</strong></th>
                                            <th class="" style="width: 15%; text-align: left;"><strong> Type</strong></th>
                                            <th class="" style="width: 15%; text-align: center;"><strong>Action</strong></th>
                                        </thead>

                                        <tbody>
                                            @foreach($admin as $row)
                                                <tr>
                                                    <td style="text-align: left;">{{ $row->firstname }} {{ $row->lastname }}</td>
                                                    <td style="text-align: left;">{{ $row->email }}</td>
                                                    <td style="text-align: left;">{{ $row->sector_name }}</td>
                                                    @if($row->type == 'superAdmin')
                                                        <td style="text-align: left;"> Super Admin</td>
                                                    @else
                                                        <td style="text-align: left;"> Admin</td>
                                                    @endif

                                                    <td style="text-align: center;">
                                                        @if($row->active_status == 'active')
                                                            <span data-toggle="modal" data-target="#deactivateModal">
                                                                <button id="{{ $row->users_id }}" type="button" id=""class="btn btn-sm btn-danger mainDeactivateBtn" data-toggle="tooltip" data-placement="top" title="Deactivate User"><i class="fas fa-user-slash"></i></button>
                                                            </span>
                                                        @else
                                                            <span data-toggle="modal" data-target="#activateModal">
                                                                <button id="{{ $row->users_id }}" type="button" id="" class="btn btn-sm btn-success mainActivateBtn" data-toggle="tooltip" data-placement="top" title="Activate User"><i class="fas fa-universal-access"></i></button>
                                                            </span>
                                                        @endif
                                                        <span data-toggle="modal" data-target="#adminEditModal">
                                                            <button id="{{ $row->id }}" type="button" class="btn btn-sm btn-primary editbtnadmin"  data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></button>
                                                        </span>
                                                    </td>
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


<!-- Add Household Modal -->
<div class="modal fade" id="addHouseholdModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" style="color: green;">
            <h5 class="modal-title" id=""><i class="now-ui-icons ui-1_simple-add"></i>Add Household</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: green !important;">&times;</span>
            </button>
        </div>
        <form id="addForm" method="POST" action="{{ route('householdAdd')}}">
        {{ csrf_field() }}
            <div class="modal-body">


                <div class="form-group has-success">
                    <label>Firstname</label>
                    <input name="firstname" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Lastname</label>
                    <input name="lastname" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Address</label>
                    <input name="address" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Phone Number</label>
                    <input name="phone_number" type="number" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Type</label>
                    <select class="form-control" name="type">
                        <option value="HO">Home Owner</option>
                        <option value="BO">Business Owner</option>
                        <option value="MRF">Material Recovery Facilitaty</option>
                    </select>
                </div>
                <div class="form-group has-success">
                    <label>Username/Email</label>
                    <input name="username" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Password</label>
                    <input name="password" type="text" class="form-control" placeholder="">
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-success">Add Household</button>
            </div>

            </div>
        </form>

        </div>
    </div>
</div>
<!-- End of ADD Household Modal -->

<!-- Edit Household Modal -->
<div class="modal fade" id="householdEditModal" tabindex="-1" role="dialog" aria-labelledby="" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" style="color: green;">
            <h5 class="modal-title" id=""><i class="fas fa-edit"></i> Edit Household Info/Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: green !important;">&times;</span>
            </button>
        </div>
        <form id="editForm" method="post" action="{{ route('householdEditSave') }}">
        {{ csrf_field() }}
            <div class="modal-body">

                <input class="form-control" type="hidden" name="household_id" id="household_id">

                <input class="form-control" type="hidden" name="users_id" id="users_id">

                <div class="form-group">
                    <label>Firstname</label>
                    <input name="firstname" id="firstname" value="" class="form-control">
                </div>
                <div class="form-group has-success">
                    <label>Lastname</label>
                    <input name="lastname" id="lastname123" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Address</label>
                    <input name="address" id="address" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Phone Number</label>
                    <input name="phone_number" id="phone_number" type="number" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Type</label>
                    <select class="form-control" name="type" id="type">
                        <option value="HO">Home Owner</option>
                        <option value="BO">Business Owner</option>
                        <option value="MRF">Material Recovery Facilitaty</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input name="email" id="email" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" id="password" type="text" class="form-control"  placeholder="">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-success">Update Household Info</button>
            </div>

            </div>
        </form>

        </div>
    </div>
</div>
<!-- End of edit Household Modal -->

<!-- Activate Household Modal -->
<div class="modal fade" id="activateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form id="activateForm" method="post" action="{{ route('activateUserAcct') }}">
        {{ csrf_field() }}
            <div class="modal-header" style="color: green;">
                <h5 class="modal-title" id=""><i class="fas fa-edit"></i>Activate account</h5>
                <button style="color: white;" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to re-activate this account?</p>
                <input class="form-control" type="hidden"  name="idToActivate" id="idToActivate" >
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" name="activateBtn" class="btn btn-danger">Yes</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- End of activate Household Modal -->

<!-- Deactivate Household Modal -->
<div class="modal fade" id="deactivateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form id="deactivateForm" method="post" action="{{ route('deactivateUserAcct') }}">
        {{ csrf_field() }}
            <div class="modal-header" style="color: green;">
                <h5 class="modal-title" id=""><i class="fas fa-edit"></i>Deactivate Account</h5>
                <button style="color: white;" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to deactivate this account?</p>
                <input class="form-control" type="hidden"  name="idToDeactivate" id="idToDeactivate">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" name="deactivateBtn" class="btn btn-danger">Yes</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- End of deactivate Household Modal -->

<!-- view household info modal -->
<div id="viewInfo" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="color: green;">
                    <h5 class="modal-title" id=""><strong>Full Details</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color: white;" >&times;</span>
                        </button>
                </div>
                <div class="modal-body" style="font-size: 10px;" >
                    <form>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="name2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email/Username</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="email2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="address2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="phone_number2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Household Type</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="type2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Active Status </label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="active_status2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Password </label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="password2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Transactions </label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="">
                            </div>
                        </div>
                    </form>

                    <div id="otherInfo">

                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
    </div>
</div>
<!-- end of view household info modal -->


<!-- Add Collector Modal -->
<div class="modal fade" id="addCollectorModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" style="color: green;">
            <h5 class="modal-title" id=""><i class="now-ui-icons ui-1_simple-add"></i>Add Collector</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: green !important;">&times;</span>
            </button>
        </div>
        <form id="addForm2" method="POST" action="{{ route('collectorAdd') }}" >
        {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group has-success">
                    <label>Firstname</label>
                    <input name="firstname3" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Lastname</label>
                    <input name="lastname3" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Address</label>
                    <input name="address3" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Phone Number</label>
                    <input name="phone_number3" type="number" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Type</label>
                    <select class="form-control" name="type3">
                        <option value="truckHauler">Truck Hauler</option>
                        <option value="ecoAide">Eco-Aide</option>
                    </select>
                </div>
                <div class="form-group has-success">
                    <label>Username/Email</label>
                    <input name="username3" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Password</label>
                    <input name="password3" type="text" class="form-control" placeholder="">
                </div>

                <div class="form-group has-success">
                    <label>Business Name</label>
                    <select class="form-control" name="sector3">
                        @foreach($allBusinessName as $row)
                            <option value="{{ $row->id }}">{{ $row->sector_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-success">Add Household</button>
            </div>

            </div>
        </form>

        </div>
    </div>
</div>
<!-- End of ADD collector Modal -->

<!-- view collector info modal -->
<div id="viewInfoColl" class="modal fade " role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="color: green;">
                    <h5 class="modal-title" id=""><strong>Collector Details</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color: white;" >&times;</span>
                        </button>
                </div>
                <div class="modal-body" style="font-size: 10px;" >
                    <form>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="namecoll">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email/Username</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="emailcoll">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="addresscoll">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="phone_numbercoll">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Household Type</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="typecoll">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Active Status </label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="active_statuscoll">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Business/LGU Name </label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="business_namecoll">
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Password </label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="passwordcoll">
                            </div>
                        </div> -->
                        <!-- <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Transactions </label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="">
                            </div>
                        </div> -->
                    </form>

                    <div id="otherInfo">

                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
    </div>
</div>
<!-- end of view info modal -->

<!-- Edit collector Modal -->
<div class="modal fade" id="collectorEditModal" tabindex="-1" role="dialog" aria-labelledby="" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" style="color: green;">
            <h5 class="modal-title" id=""><i class="fas fa-edit"></i> Edit Collector Info/Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: green !important;">&times;</span>
            </button>
        </div>
        <form id="editFormColl" method="post" action="{{ route('collectorEditSave') }}">
        {{ csrf_field() }}
            <div class="modal-body">

                <input class="form-control" type="hidden" name="collector_id" id="collector_id">

                <input class="form-control" type="hidden" name="users_id" id="users_id_coll">

                <div class="form-group">
                    <label>Firstname</label>
                    <input name="firstname" id="firstname_coll" value="" class="form-control">
                </div>
                <div class="form-group has-success">
                    <label>Lastname</label>
                    <input name="lastname" id="lastname_coll" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Address</label>
                    <input name="address" id="address_coll" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Phone Number</label>
                    <input name="phone_number" id="phone_number_coll" type="number" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Type</label>
                    <select class="form-control" name="type" id="type_coll">
                        <option value="truckHauler">Truck Hauler</option>
                        <option value="ecoAide">Eco-Aide</option>
                    </select>
                </div>
                <div class="form-group has-success">
                    <label>Business Name</label>
                    <select class="form-control" name="edit_coll_sector" id="edit_coll_sector" required>
                        <option value="">None</option>
                        @foreach($allBusinessName as $row)
                            <option value="{{ $row->id }}">{{ $row->sector_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input name="email" id="email_coll" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password_coll" id="" type="text" class="form-control"  placeholder="">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-success">Update Household Info</button>
            </div>

            </div>
        </form>

        </div>
    </div>
</div>
<!-- End of Edit collector Modal -->

<!-- Edit Admin Modal -->
<div class="modal fade" id="adminEditModal" tabindex="-1" role="dialog" aria-labelledby="" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" style="color: green;">
            <h5 class="modal-title" id=""><i class="fas fa-edit"></i> Edit Admin Info/Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: green !important;">&times;</span>
            </button>
        </div>
        <form id="editFormAdmin" method="post" action="{{ route('adminEditSave') }}">
        {{ csrf_field() }}
            <div class="modal-body">

                <input class="form-control" type="hidden" name="admin_id" id="admin_id">

                <input class="form-control" type="hidden" name="users_id" id="users_id_admin">

                <div class="form-group">
                    <label>Firstname</label>
                    <input name="firstname" id="firstname_admin" value="" class="form-control">
                </div>
                <div class="form-group has-success">
                    <label>Lastname</label>
                    <input name="lastname" id="lastname_admin" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Phone Number</label>
                    <input name="edit_phone_number" id="phone_number_admin" type="number" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input name="email" id="email_admin" type="text" class="form-control" placeholder="">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input name="password" id="" type="text" class="form-control"  placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Type</label>
                    <select class="form-control" name="edit_admin_type" id="edit_admin_type">
                        <option value="admin">Admin</option>
                        <option value="superAdmin">Super Admin</option>
                    </select>
                </div>

                <div class="form-group has-success">
                    <label>Business Name</label>
                    <select class="form-control" name="edit_admin_sector" id="edit_admin_sector">
                        <option value="">None</option>
                        @foreach($allBusinessName as $row)
                            <option value="{{ $row->id }}">{{ $row->sector_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-success">Update Admin Info</button>
            </div>

            </div>
        </form>

        </div>
    </div>
</div>
<!-- End of Edit collector Modal -->


<!-- Add Admin Modal -->
<div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" style="color: green;">
            <h5 class="modal-title" id=""><i class="now-ui-icons ui-1_simple-add"></i>Add Admin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: green !important;">&times;</span>
            </button>
        </div>
        <form id="addForm3" method="POST" action="{{ route('adminAdd') }}" >
        {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group has-success">
                    <label>Firstname</label>
                    <input name="firstname4" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Lastname</label>
                    <input name="lastname4" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Phone Number</label>
                    <input name="phone_number4" type="number" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Type</label>
                    <select class="form-control" name="new_admin_type">
                        <option value="admin">Admin</option>
                        <option value="superAdmin">Super Admin</option>
                    </select>
                </div>
                <div class="form-group has-success">
                    <label>Username/Email</label>
                    <input name="username4" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Password</label>
                    <input name="password4" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Business Name</label>
                    <select class="form-control" name="admin_sector">
                        <option value="">None</option>
                        @foreach($allBusinessName as $row)
                            <option value="{{ $row->id }}">{{ $row->sector_name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-success">Add Admin</button>
            </div>

            </div>
        </form>

        </div>
    </div>
</div>
<!-- End of ADD collector Modal -->

@endsection

@section('scripts')

<!--
<script type="text/javascript">
    $(document).ready(function (){

    });
</script> -->

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

<script type="text/javascript">

$(document).ready(function() {

    $('.editbtn').click(function(){
        event.preventDefault();
        var household_id = $(this).attr("id");
        console.log(household_id);

        $.ajax({
            url:"{{ route('householdEdit') }}",
            method:"get",
            data:{household_id:household_id},
            dataType:"json",
            success:function(data){
                    $('#householdEditModal').find('#household_id').val(household_id);
                    $('#householdEditModal').find('#users_id').val(data.users_id);
                    $('#householdEditModal').find('#firstname').val(data.firstname);
                    $('#lastname123').val(data.lastname);
                    $('#address').val(data.address);
                    $('#phone_number').val(data.phone_number);
                    $('#email').val(data.email);
                    $('#passwordRemovethis').val(data.password);
                    $('#householdEditModal').appendTo('body').modal('show');
                    console.log(data);

            },error:function(xhr,status,error){
                var err = eval('('+xhr.responseText+')');
                alert(err.message);
            }
        });
    });


    $('#editForm').on('submit', function(){
        event.preventDefault();
        var form_data = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "householdEditSave",
            data: form_data,
            success: function (response){
                console.log(response);
                $('#householdEditModal').modal('hide');
                alert('Changes has been saved.');
                // location.reload();
            },
            error: function(error){
                console.log(error);
                alert('Something went wrong while updating the details.');
            }
        });
    });


    $('#addForm').on('submit', function(e){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "householdAdd",
            data: form_data,
            success: function (response){
                console.log(response);
                $('#addHouseholdModal').modal('hide');
                alert('Data saved.');
                location.reload();
            },
            error: function(error){
                console.log(error);
                alert('Data not save.');
            }
        });
    });

    $('#addForm2').on('submit', function(e){
        event.preventDefault();
        var form_data_coll = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "collectorAdd",
            data: form_data_coll,
            success: function (response){
                console.log(response);
                $('#addCollectorModal').modal('hide');
                alert('Data saved.');
                location.reload();
            },
            error: function(error){
                console.log(error);
                console.log(form_data_coll);
                alert('Data not save.');
            }
        });
    });


    $('#addForm3').on('submit', function(e){
        event.preventDefault();
        var form_data_admin = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "adminAdd",
            data: form_data_admin,
            success: function (response){
                console.log(response);
                $('#addAdminModal').modal('hide');
                alert('Data saved.');
                location.reload();
            },
            error: function(error){
                console.log(error);
                console.log(form_data_admin);
                alert('Data not save.');
            }
        });
    });


    $('.mainDeactivateBtn').click(function(){
        var user_account_id = $(this).attr("id");

        $('#idToDeactivate').val(user_account_id);
        $('#deactivateModal').appendTo('body').modal('show');
    });

    $('.mainActivateBtn').click(function(){
        var user_account_id = $(this).attr("id");

        $('#idToActivate').val(user_account_id);
        $('#ActivateModal').appendTo('body').modal('show');
    });

    $('#activateForm').on('submit', function(e){
        event.preventDefault();
        var form_data = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "activateUserAcct",
            data: form_data,
            success: function (response){
                console.log(response);
                $('#activateModal').modal('hide');
                alert('Changes has been saved.');
                location.reload();
            },
            error: function(error){
                console.log(error);
                alert('Something went wrong while updating the details.');
            }
        });
    });

    $('#deactivateForm').on('submit', function(e){
        event.preventDefault();
        var form_data = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "deactivateUserAcct",
            data: form_data,
            success: function (response){
                console.log(response);
                $('#deactivateModal').modal('hide');
                alert('Changes has been saved.');
                location.reload();
            },
            error: function(error){
                console.log(error);
                alert('Something went wrong while updating the details.');
            }
        });
    });


    $('.view_data').click(function(){
        event.preventDefault();
        var household_id = $(this).attr("id");
        $.ajax({
            url:"{{ route('householdInfo') }}",
            method:"get",
            data:{household_id:household_id},
            dataType:"json",
            success:function(data){
                // $('#hiddenKeme').val(data.firstname);
                $('#name2').val(data.firstname);
                // $('#lastname2').val(data.lastname);
                $('#address2').val(data.address);
                $('#phone_number2').val(data.phone_number);
                $('#type2').val(data.type);
                $('#email2').val(data.email);
                $('#active_status2').val(data.active_status);
                $('#password2').val(data.password);
                $('#viewInfo2').appendTo('body').modal('show');
                console.log(data);
            }
        });
    });

    $('.view_data_coll').click(function(){
        event.preventDefault();
        var collector_id = $(this).attr("id");
        $.ajax({
            url:"{{ route('collectorInfo') }}",
            method:"get",
            data:{collector_id:collector_id},
            dataType:"json",
            success:function(data){
                $('#namecoll').val(data.firstname);
                $('#addresscoll').val(data.address);
                $('#phone_numbercoll').val(data.phone_number);
                $('#typecoll').val(data.type);
                $('#emailcoll').val(data.email);
                $('#active_statuscoll').val(data.active_status);
                $('#passwordcoll').val(data.password);
                $('#business_namecoll').val(data.sector_name);
                $('#viewInfoColl').appendTo('body').modal('show');
                console.log(data);
            }
        });
    });


    $('.editbtncoll').click(function(){
        event.preventDefault();
        var collector_id = $(this).attr("id");
        console.log(collector_id);

        $.ajax({
            url:"{{ route('collectorEdit') }}",
            method:"get",
            data:{collector_id:collector_id},
            dataType:"json",
            success:function(data){
                    $('#collector_id').val(collector_id);
                    $('#users_id_coll').val(data.users_id);
                    $('#firstname_coll').val(data.firstname);
                    $('#lastname_coll').val(data.lastname);
                    $('#address_coll').val(data.address);
                    $('#phone_number_coll').val(data.phone_number);
                    $('#email_coll').val(data.email);
                    $('#password_coll').val(data.password);
                    $('#edit_coll_sector').val(data.sector_name);
                    $('#collectorEditModal').appendTo('body').modal('show');
                    console.log(data);

            },error:function(xhr,status,error){
                var err = eval('('+xhr.responseText+')');
                alert(err.message);
            }
        });
    });


    $('#editFormColl').on('submit', function(){
        event.preventDefault();
        var form_edit_data = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "collectorEditSave",
            data: form_edit_data,
            success: function (response){
                console.log(response);
                $('#collectorEditModal').modal('hide');
                alert('Changes has been saved.');
                location.reload();
            },
            error: function(error){
                console.log(error);
                alert('Something went wrong while updating the details.');
            }
        });
    });

    $('.editbtnadmin').click(function(){
        event.preventDefault();
        var admin_id = $(this).attr("id");
        console.log(admin_id);

        $.ajax({
            url:"{{ route('adminEdit') }}",
            method:"get",
            data:{admin_id:admin_id},
            dataType:"json",
            success:function(data){
                    $('#admin_id').val(admin_id);
                    $('#users_id_admin').val(data.users_id);
                    $('#firstname_admin').val(data.firstname);
                    $('#lastname_admin').val(data.lastname);
                    $('#email_admin').val(data.email);
                    $('#password_admin').val(data.password);
                    $('#phone_number_admin').val(data.phone_number);
                    $('#edit_admin_type').val(data.type);
                    $('#edit_admin_sector').val(data.sector_name);
                    $('#adminEditModal').appendTo('body').modal('show');
                    console.log(data);

            },error:function(xhr,status,error){
                var err = eval('('+xhr.responseText+')');
                alert(err.message);
            }
        });
    });


    $('#editFormAdmin').on('submit', function(){
        event.preventDefault();
        var form_edit_data = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "adminEditSave",
            data: form_edit_data,
            success: function (response){
                console.log(response);
                $('#adminEditModal').modal('hide');
                alert('Changes has been saved.');
                location.reload();
            },
            error: function(error){
                console.log(error);
                alert('Something went wrong while updating the details.');
            }
        });
    });
    $('table.display').DataTable({
    "info":     false,
    dom: 'Bfrtip',
        "scrollY": "280px",
        "scrollCollapse": true,
        "scrollX": false,
        buttons: [{
            extend: 'collection',
            text: 'Action',
            buttons: [ {
                extend: 'pdfHtml5',
                text: 'Export as PDF',
                orientation: 'landscape',
                pageSize: 'LEGAL'
                },

                {
                extend: 'csv', text: 'Export as CSV'
                },

                {
                extend: 'print', text: 'Print Table'
                }]
        }]
    });


//    $('#collectorTable').DataTable({
//    "info":     false,
//    dom: 'Bfrtip',
//        "scrollY": "280px",
//        "scrollCollapse": true,
//        "scrollX": false,
//        buttons: [{
//            extend: 'collection',
//            text: 'Action',
//            buttons: [ {
//                extend: 'pdfHtml5',
//                text: 'Export as PDF',
//                orientation: 'landscape',
//                pageSize: 'LEGAL'
//                },
//
//                {
//                extend: 'csv', text: 'Export as CSV'
//                },
//
//                {
//                extend: 'print', text: 'Print Table'
//                }]
//        }]
//    });


//    $('#householdTable').DataTable({
//    "info":     false,
//    dom: 'Bfrtip',
//        "scrollY": "280px",
//        "scrollCollapse": true,
//        "scrollX": false,
//        buttons: [{
//            extend: 'collection',
//            text: 'Action',
//            buttons: [ {
//                extend: 'pdfHtml5',
//                text: 'Export as PDF',
//                orientation: 'landscape',
//                pageSize: 'LEGAL'
//                },
//
//                {
//                extend: 'csv', text: 'Export as CSV'
//                },
//
//                {
//                extend: 'print', text: 'Print Table'
//                }]
//        }]
//    });
//
//
//
//
//    $('#adminTablet').DataTable({
//    "info":     false,
//    dom: 'Bfrtip',
//        "scrollY": "280px",
//        "scrollCollapse": true,
//        "scrollX": false,
//        buttons: [{
//            extend: 'collection',
//            text: 'Action',
//            buttons: [ {
//                extend: 'pdfHtml5',
//                text: 'Export as PDF',
//                orientation: 'landscape',
//                pageSize: 'LEGAL'
//                },
//
//                {
//                extend: 'csv', text: 'Export as CSV'
//                },
//
//                {
//                extend: 'print', text: 'Print Table'
//                }]
//        }]
//    });


});
</script>
<!-- Plugins -->

<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="../assets2/js/plugins/bootstrap-switch.js"></script>

<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets2/js/plugins/nouislider.min.js" type="text/javascript"></script>

<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets2/js/now-ui-kit.js?v=1.2.0" type="text/javascript"></script>
@endsection
