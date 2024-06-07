<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-inbox bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Subsidiary</h5>
                        <span>Stock Withdrawal Advice System</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url() ?>AdminController/dash"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Subsidiary</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">


                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>Subsidiary List</h5>
                                </div>
                                <div class="card-block" style="text-align: right;">
                                    <button type="button" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#addSubModal"><i class="feather icon-plus"></i>Add New
                                        Subsidiary</button>
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table id="scr-vtr-dynamic" class="table table-hover m-b-0 sub-table">
                                            <thead>
                                                <tr>
                                                    <!-- <th></th> -->
                                                    <th>Code</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                              foreach ($subsidiaries as $subsidiary):
                              ?>
                                                <tr>
                                                    <!-- <td></td> -->
                                                    <td><?php echo $subsidiary->CODE; ?></td>
                                                    <td><?php echo $subsidiary->DESCRIPTION; ?></td>
                                                    <td><a class="editSubsidiaryButton" title="edit"
                                                            data-sub-id="<?php echo $subsidiary->ID; ?>"
                                                            data-sub-code="<?php echo $subsidiary->CODE; ?>"
                                                            data-sub-descript="<?php echo $subsidiary->DESCRIPTION; ?>"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editSubsidiaryModal"><i
                                                                class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-blue"></i></a><a
                                                            href="#!"><i
                                                                class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>

                                                    </td>
                                                </tr>
                                                <?php  
                              endforeach;
                              ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="styleSelector">
        </div>
    </div>
</div>
<!------------------------ SUBSIDIARY MODAL------------------>

<div class="modal fade" id="addSubModal" tabindex="-1" role="dialog">
    <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Subsidiary</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form role="form" id="subForm" method="post"
                        action="<?php echo base_url() ?>SubsidiaryController/new_subsidiary"
                        enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label"> Code</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="sub_code" id="sub_code"
                                    placeholder="Enter code">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label"> Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sub_descript" name="sub_descript"
                                    placeholder="Enter description">

                            </div>

                        </div>
                        <span id="validationMessage" class="messages" style="color: red"></span>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="saveButton">Save
                    changes</button>
            </div>
        </div>
    </div>
</div>
<!------------------------ END OF ADD SUBSIDIARY MODAL------------------>
<!------------------------ EDIT SUBSIDIARY MODAL------------------>

<div class="modal fade" id="editSubsidiaryModal" tabindex="-1" role="dialog">
    <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Subsidiary</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form role="form" id="subEditForm" method="post" enctype="multipart/form-data"
                        action="">
                        <input type="hidden" id="sub_id" name="sub_id" value="">
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label"> Code</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value=""
                                    name="sub_code" id="sub_code" placeholder="Enter code">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label"> Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value=""
                                    id="sub_descript" name="sub_descript" placeholder="Enter description">

                            </div>

                        </div>
                        <span id="validationMessage" class="messages" style="color: red"></span>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="saveEditButton">Save
                    changes</button>
            </div>
        </div>
    </div>
</div>
<!------------------------ END OF EDIT SUBSIDIARY MODAL------------------>
<script>
$(document).ready(function() {
    var subForm = $('#subForm');
    var saveButton = $('#saveButton');
    var validationMessage = $('#validationMessage');

    saveButton.click(function() {
        var codeInput = $('[name="sub_code"]');
        var descriptInput = $('[name="sub_descript"]');

        if (codeInput.val().trim() === '' || descriptInput.val().trim() === '') {
            validationMessage.text('Please fill in all fields.');
            return;
        }
        validationMessage.text('');

        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to save this data?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: subForm.attr('action'),
                    type: subForm.attr('method'),
                    data: new FormData(subForm[0]),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log("Response:", response);
                        var responseData = response;

                        Swal.fire({
                            title: responseData.status === 'success' ?
                                'Success' : 'Error',
                            text: responseData.message,
                            icon: responseData.status === 'success' ?
                                'success' : 'error'
                        }).then(() => {
                            location.reload(true);
                        });
                    },
                    error: function(error) {
                        console.log("Error: " + error);
                    }
                });
            }
        });
    });

    $('.editSubsidiaryButton').on('click', function() {
        // Get the data attributes from the clicked button
        var subsidiaryId = $(this).data('sub-id');
        var subsidiaryCode = $(this).data('sub-code');
        var subsidiaryDescription = $(this).data('sub-descript');
        // Populate the modal form fields with the data
        $('#sub_id').val(subsidiaryId);
        $('#sub_code').val(subsidiaryCode);
        $('#sub_descript').val(subsidiaryDescription);

    });

    // Optionally, handle the save button click if you need to perform validation or AJAX submit
    var saveEditButton = $('#saveEditButton');
    var subEditForm = $('#subEditForm');
    var formChanged = false;

    var formInputs = subForm.find('input, textarea, select');
    formInputs.on('input', function() {
        formChanged = true;
    });

    saveEditButton.on('click', function() {
        if (!formChanged) {
            Swal.fire({
                title: 'No Changes Made',
                text: 'There are no changes to save.',
                icon: 'info'
            });
            return;
        }

        Swal.fire({
            title: 'Confirm Changes',
            text: 'Are you sure you want to save these changes?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then(function(result) {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?php echo base_url(); ?>SubsidiaryController/edit_subsidiary/" + subsidiaryId,
                    type: subForm.attr('method'),
                    data: new FormData(subForm[0]),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log("Response:", response);
                        var responseData = response;

                        Swal.fire({
                            title: responseData.status === 'success' ?
                                'Success' : 'Error',
                            text: responseData.message,
                            icon: responseData.status === 'success' ?
                                'success' : 'error'
                        }).then(function() {
                            // window.location.href =
                            //     '<?php echo base_url() ?>subsidiary/view_subsidiary';
                        });
                    },
                    error: function(error) {
                        console.log("Error: " + error);
                    }
                });
            }
        });
    });

    $('.deleteButton').click(function() {
        var deleteUrl = $(this).data('delete-url');

        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to delete this data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: deleteUrl,
                    type: 'GET',
                    success: function(response) {
                        console.log("Response:", response);
                        var responseData = response;

                        Swal.fire({
                            title: responseData.status ===
                                'success' ? 'Success' : 'Error',
                            text: responseData.message,
                            icon: responseData.status ===
                                'success' ? 'success' : 'error'
                        }).then(() => {
                            location.reload(true);
                        });
                    },
                    error: function(error) {
                        console.log("Error: " + error);
                    }
                });
            }
        });
    });
});


</script>