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
                <h4 class="card-title"><strong>COMPANY & LGUs</strong></h4>
                <div class="card-body">

                    <div class="card card-nav-tabs card-plain">
                        <div class="card-header card-header-danger">
                            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#Company" data-toggle="tab">Company</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#LGU" data-toggle="tab">LGUs</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="float-right">
                            <button type="button" class="btn btn-sm btn-default" style="font-size: 10px;" data-toggle="modal" data-target="#addSectorModal"><i class="now-ui-icons ui-1_simple-add"></i> Add Sector</button>
                        </div>


                        </div><div class="card-body ">
                            <div class="tab-content">
                                <div class="tab-pane active" id="Company">

                                <div class="table-responsive" style="font-size: 10px;">
                                    <table class="table table-sm display hover" style="width:100%;" name="sectorscompanyTable" id="sectorscompanyTable">
                                        <thead class=" text-primary" style="color: green !important; font-size: 8px;">
                                            <th style="width: 5%;"><strong> </strong></th>
                                            <th class="" style="text-align: center;" ><strong> Name</strong></th>
                                            <th class="" style="text-align: center;" ><strong> Location</strong></th>
                                            <th class="" style="text-align: center;" ><strong> Action</strong></th>
                                            <!-- <th class="text-center"><strong>Action</strong></th> -->
                                        </thead>

                                        <tbody>
                                            @foreach($sectors_lgu as $index => $row)
                                                <tr>
                                                    <td>{{ $index +1 }}</td>
                                                    <td style="text-align: left;">{{ $row->sector_name }}</td>
                                                    <td style="text-align: left;">{{ $row->sector_location }}</td>
                                                    <td nowrap="nowrap" style="text-align: center;">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <span data-toggle="modal" data-target="#viewInfoSector">
                                                            <button id="{{ $row->id }}" type="button" class="btn btn-sm btn-success view_data_sector " data-toggle="tooltip" data-placement="top" title="See more details"><i class="fas fa-eye"></i></button>
                                                        </span>
                                                        <span data-toggle="modal" data-target="#sectorEditModal">
                                                            <button id="{{ $row->id }}" type="button" class="btn btn-sm btn-success editbtnsector"  data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></button>
                                                        </span>
                                                        <span data-toggle="modal" data-target="#deleteSectorModal">
                                                            <button id="{{ $row->id }}" type="button" class="btn btn-sm btn-success mainDeleteSectorBtn"  data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
                                                        </span>
                                                    </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                </div>
                                <div class="tab-pane" id="LGU">

                                    <div class="table-responsive" style="font-size: 10px;">
                                        <table class="table table-sm display" style="width:100%;" name="sectorsTable" id="sectorsTable">
                                            <thead class="text-primary" style="color: green !important; font-size: 8px;">
                                                <th style=""><strong> </strong></th>
                                                <th style="" ><strong> Name</strong></th>
                                                <th style="" ><strong> Location</strong></th>
                                                <th style="" ><strong> Action</strong></th>
                                                <!-- <th class="text-center"><strong>Action</strong></th> -->
                                            </thead>

                                            <tbody>
                                                <?php  $index_pota = 1; ?>
                                                @foreach($sectors_private_sectors as $index_shit => $row)
                                                    <tr>
                                                        <td>{{ $index_pota }}</td>
                                                        <td style="text-align: left;">{{ $row->sector_name }}</td>
                                                        <td style="text-align: left;">{{ $row->sector_location }}</td>
                                                        <td style="text-align: center;">
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <span data-toggle="modal" data-target="#viewInfoSector">
                                                                <button id="{{ $row->id }}" type="button" class="btn btn-sm btn-success view_data_sector " data-toggle="tooltip" data-placement="top" title="See more details"><i class="fas fa-eye"></i></button>
                                                            </span>
                                                            <span data-toggle="modal" data-target="#sectorEditModal">
                                                                <button id="{{ $row->id }}" type="button" class="btn btn-sm btn-success editbtnsector"  data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></button>
                                                            </span>
                                                            <span data-toggle="modal" data-target="#deleteSectorModal">
                                                                <button id="{{ $row->id }}" type="button" class="btn btn-sm btn-success mainDeleteSectorBtn"  data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
                                                            </span>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                    <?php $index_pota++; ?>
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
    </div>


<!-- Add Sector Modal -->
<div class="modal fade" id="addSectorModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" style="color: green;">
            <h5 class="modal-title" id=""><i class="now-ui-icons ui-1_simple-add"></i> Add Sector</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: green !important;">&times;</span>
            </button>
        </div>
        <form id="addSectorForm" method="POST" action="{{ route('sectorAdd') }}">
        {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group has-success">
                    <label>Name</label>
                    <input name="new_sector_name" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Address</label>
                    <input name="new_sector_location" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group has-success">
                    <label>Type</label>
                    <select class="form-control" name="new_sector_type">
                        <option value="LGU">LGU</option>
                        <option value="Private Sector">Private Sector</option>
                    </select>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-success">Add Sector</button>
            </div>

            </div>
        </form>

        </div>
    </div>
</div>
<!-- End of ADD Sector Modal -->

<!-- view sector info modal -->
<div id="viewInfoSector" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="color: green;">
                    <h5 class="modal-title" id=""><strong>Full Details</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color: gray;" >&times;</span>
                        </button>
                </div>
                <div class="modal-body" style="font-size: 10px;" >
                    <form>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label"><strong>Name</strong></label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="sector_name_modal">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label"><strong>Address</strong></label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="sector_location_modal">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label"><strong>Sector Type</strong></label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="sector_type_modal">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label"><strong>Number of Admins</strong></label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="sector_number_of_admins_modal">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label"><strong>Number of Collectors</strong></label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="sector_number_of_collector_modal">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Eco-Aide</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="sector_number_of_collector_ea_modal">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Truck-Hauler</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="sector_number_of_collector_th_modal">
                            </div>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
    </div>
</div>
<!-- end of view sector info modal -->

<!-- Edit Sector Modal -->
<div class="modal fade" id="sectorEditModal" tabindex="-1" role="dialog" aria-labelledby="" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header" style="color: green;">
            <h5 class="modal-title" id=""><i class="fas fa-edit"></i> Edit Sector Info</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: green !important;">&times;</span>
            </button>
        </div>
        <form id="editSectorForm" method="post" action="{{ route('sectorEditSave') }}">
        {{ csrf_field() }}
            <div class="modal-body">

                <input class="form-control" type="hidden" name="edit_sector_id" id="edit_sector_id">

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"><strong>Name</strong></label>
                    <div class="col-sm-10">
                    <input type="text"  class="form-control-plaintext" name="edit_sector_name_modal" id="edit_sector_name_modal">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"><strong>Address</strong></label>
                    <div class="col-sm-10">
                    <input type="text"  class="form-control-plaintext" name="edit_sector_location_modal" id="edit_sector_location_modal">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"><strong>Type</strong></label>
                    <div class="col-sm-10">
                    <select type="text"  class="form-control-plaintext" name="edit_sector_type_modal" id="edit_sector_type_modal">
                        <option value="LGU">LGU</option>
                        <option value="Private Sector">Private Sector</option>
                    </select>
                    </div>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-success">Update Sector Info</button>
            </div>

            </div>
        </form>

        </div>
    </div>
</div>
<!-- End of edit Sector Modal -->

<!-- Delete Sector Modal -->
<div class="modal fade" id="deleteSectorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form id="deleteSectorForm" method="post" action="{{ route('deleteSector') }}">
        {{ csrf_field() }}
            <div class="modal-header" style="color: green;">
                <h5 class="modal-title" id=""><i class="fas fa-edit"></i>Delete</h5>
                <button style="color: white;" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this sector?</p>
                <input class="form-control" type="hidden"  name="sectoIdToDelete" id="sectoIdToDelete">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" name="deactivateBtn" class="btn btn-danger">Yes</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- End of delete Sector Modal -->

@endsection

@section('scripts')
<script type="text/javascript">

    $(document).ready(function() {
        $('table.display').DataTable({
            colReorder: true
        });
    });
    // $(document).ready(function() {
    //     $('#sectorsTable').DataTable({
    //         colReorder: true
    //     });
    // });

    $(document).ready(function() {



    $('#addSectorForm').on('submit', function(e){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "sectorAdd",
            data: form_data,
            success: function (response){
                console.log(response);
                $('#addSectorModal').modal('hide');
                alert('Data saved.');
                location.reload();
            },
            error: function(error){
                console.log(error);
                alert('Data not save.');
            }
        });
    });

    $('.view_data_sector').click(function(){
        event.preventDefault();
        var sector_id = $(this).attr("id");
        $.ajax({
            url:"{{ route('sectorInfo') }}",
            method:"get",
            data:{sector_id:sector_id},
            dataType:"json",
            success:function(data){
                $('#sector_name_modal').val(data.sector.sector_name);
                $('#sector_location_modal').val(data.sector.sector_location);
                $('#sector_type_modal').val(data.sector.sector_type);
                $('#sector_number_of_admins_modal').val(data.numberOfAdmins);
                $('#sector_number_of_collector_modal').val(data.numberOfCollectors);
                $('#sector_number_of_collector_th_modal').val(data.numberOfCollectorsEA);
                $('#sector_number_of_collector_ea_modal').val(data.numberOfCollectorsTH);
                $('#viewInfoSector').appendTo('body').modal('show');
                console.log(data);
            }
        });
    });

    $('.editbtnsector').click(function(){
        event.preventDefault();
        var edit_sector_id = $(this).attr("id");
        console.log(edit_sector_id);

        $.ajax({
            url:"{{ route('sectorEdit') }}",
            method:"get",
            data:{edit_sector_id:edit_sector_id},
            dataType:"json",
            success:function(data){
                    $('#sectorEditModal').find('#edit_sector_id').val(edit_sector_id);
                    $('#sectorEditModal').find('#edit_sector_name_modal').val(data.sector_name);
                    $('#sectorEditModal').find('#edit_sector_location_modal').val(data.sector_location);
                    $('#sectorEditModal').find('#edit_sector_type_modal').val(data.sector_type);
                    $('#sectorEditModal').appendTo('body').modal('show');
                    console.log(data);

            },error:function(xhr,status,error){
                var err = eval('('+xhr.responseText+')');
                alert(err.message);
            }
        });
    });


    $('#editSectorForm').on('submit', function(){
        event.preventDefault();
        var form_data = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "sectorEditSave",
            data: form_data,
            success: function (response){
                console.log(response);
                $('#sectorEditModal').modal('hide');
                location.reload();
                alert('Changes has been saved.');

            },
            error: function(error){
                console.log(error);
                alert('Something went wrong while updating the details.');
            }
        });
    });

    $('.mainDeleteSectorBtn').click(function(){
        var user_account_id = $(this).attr("id");

        $('#sectoIdToDelete').val(user_account_id);
        $('#deleteSectorModal').appendTo('body').modal('show');
    });

    $('#deleteSectorForm').on('submit', function(e){
        event.preventDefault();
        var form_data = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "deleteSector",
            data: form_data,
            success: function (response){
                console.log(response);
                $('#deleteSectorModal').modal('hide');
                alert('Changes has been saved.');
                location.reload();
            },
            error: function(error){
                console.log(error);
                alert('Something went wrong while updating the details.');
            }
        });
    });

});
</script>

@endsection
