<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-building bg-c-yellow"></i>
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
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#addSubModal"><i class="feather icon-plus"></i>Add New
                                        Subsidiary</button>
                                    <!-- <h5>Subsidiary List</h5> -->
                                </div>
                                <!-- <div class="card-block" style="padding-top: 50px;">
                                </div> -->
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table id="subtable" class="table table-hover m-b-0">
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
                                                    <td><button type="button" class="editSubsidiaryButton action-btn-c-green" title="edit"
                                                            data-sub-id="<?php echo $subsidiary->ID; ?>"
                                                            data-sub-code="<?php echo $subsidiary->CODE; ?>"
                                                            data-sub-descript="<?php echo $subsidiary->DESCRIPTION; ?>"
                                                            data-toggle="modal" data-target="#editSubsidiaryModal">
                                                            <i class="icon feather icon-edit f-w-600 f-16 m-r-15"
                                                                style="color: #fff"></i><span
                                                                style="color: #fff; font-size: 13px; margin-left: -8px;">Update</span>
                                                        </button>
                                                        <button type="button" class="deleteButton action-btn-c-red"
                                                            data-delete-url="<?php echo base_url() ?>SubsidiaryController/del_subsidiary/<?php echo $subsidiary->ID; ?>"><i
                                                                class="feather icon-trash-2 f-w-600 f-16 m-r-15"
                                                                style="color: #fff"></i><span
                                                                style="color: #fff; font-size: 13px; margin-left: -8px;">Delete</span>
                                                        </button>
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
    </div>
</div>
<!------------------------ SUBSIDIARY MODAL------------------>

<div class="modal fade" id="addSubModal" tabindex="-1" role="dialog">
    <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Subsidiary</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form role="form" id="subForm" method="post"
                        action="<?php echo base_url() ?>SubsidiaryController/new_subsidiary"
                        enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label"> Code</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="sub_code" id="sub_code"
                                    placeholder="Enter code">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label"> Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="sub_descript" id="sub_descript"
                                    placeholder="Enter description">

                            </div>

                        </div>
                        <span id="validationMessage" class="messages" style="color: red"></span>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="saveButton">Save</button>
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
                <h4 class="modal-title">Update Subsidiary</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form role="form" id="subEditForm" method="post" enctype="multipart/form-data" action="">
                        <input type="hidden" id="sub_id" name="sub_id" value="">
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label">Code</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="update_subcode" id="sub_editcode"
                                    placeholder="Enter code">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label">Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="update_subdescript" id="sub_editdescript" 
                                    placeholder="Enter description">
                            </div>
                        </div>
                        <span id="validationMessage" class="messages" style="color: red"></span>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light"
                    id="saveEditButton">Update</button>
            </div>
        </div>
    </div>
</div>
<!------------------------ END OF EDIT SUBSIDIARY MODAL------------------>
<script>
$(document).ready(function() {
    var table = $('#subtable').DataTable({
        lengthChange: false,
        paging: true,
        info: true,
        language: {
            search: '',
            searchPlaceholder: 'Search...'
        }
    });
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

                        // Accessing nested properties
                        if (response.status === 'success') {
                            var newData = response.data;
                            var newId = newData.insert_id;
                            var newCode = newData.data.CODE;
                            var newDescription = newData.data.DESCRIPTION;

                            console.log("New ID:", newId);
                            console.log("New Code:", newCode);
                            console.log("New Description:", newDescription);

                            // Add the new row to the table
                            var newRow = table.row.add([
                                newCode,
                                newDescription,
                                '<a class="editSubsidiaryButton action-btn-c-green" title="edit" data-sub-id="' +
                                newId + '" data-sub-code="' + newCode +
                                '" data-sub-descript="' + newDescription +
                                '" data-toggle="modal" data-target="#editSubsidiaryModal">' +
                                '<i class="icon feather icon-edit f-w-600 f-16 m-r-15" style="color: #fff"></i><span style="color: #fff; font-size: 13px; margin-left: -8px;">Update</span></a>' +
                                '<a type="button" href="#!" class="deleteButton action-btn-c-red" data-delete-url="<?php echo base_url() ?>SubsidiaryController/del_subsidiary/' +
                                newId + '">' +
                                '<i class="feather icon-trash-2 f-w-600 f-16 m-r-15" style="color: #fff"></i><span style="color: #fff; font-size: 13px; margin-left: -8px;">Delete</span></a>'
                            ]).draw(false).node();
                            // Move to the first page and redraw the table
                            table.page('first').draw(false);

                            // Highlight the new row
                            $(newRow).addClass('highlight-row');

                            // Remove highlight after a short period
                            setTimeout(function() {
                                $(newRow).removeClass('highlight-row');
                            }, 10000);

                            $('#sub_code').val('');
                            $('#sub_descript').val('');

                            Swal.fire({
                                title: 'Success',
                                text: response.message,
                                icon: 'success'
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: response.message,
                                icon: 'error'
                            });
                        }
                    },
                    error: function(error) {
                        console.log("Error: " + error);
                    }
                });
            }
        });
    });

    $(document).on('click', '.editSubsidiaryButton', function() {
        // Get the data attributes from the clicked button
        var subsidiaryId = $(this).data('sub-id');
        var subsidiaryCode = $(this).data('sub-code');
        var subsidiaryDescription = $(this).data('sub-descript');
        console.log(subsidiaryCode);
        // Populate the modal form fields with the data
        $('#sub_id').val(subsidiaryId);
        $('#sub_editcode').val(subsidiaryCode);
        $('#sub_editdescript').val(subsidiaryDescription);
    });

    // Optionally, handle the save button click if you need to perform validation or AJAX submit
    var saveEditButton = $('#saveEditButton');
    var subEditForm = $('#subEditForm');
    var formChanged = false;

    var formInputs = subEditForm.find('input, textarea, select');
    formInputs.on('input', function() {
        formChanged = true;
    });

    saveEditButton.on('click', function() {
        var subsidiaryId = $('#sub_id').val();
        console.log(subsidiaryId);
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
                    url: "<?php echo base_url(); ?>SubsidiaryController/edit_subsidiary/" +
                        subsidiaryId,
                    type: subEditForm.attr('method'),
                    data: new FormData(subEditForm[0]),
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
                            window.location.href =
                                '<?php echo base_url() ?>SubsidiaryController/subsidiary';
                        });
                    },
                    error: function(error) {
                        console.log("Error: " + error);
                    }
                });
            }
        });
    });

    $(document).on('click', '.deleteButton', function() {
        var deleteUrl = $(this).data('delete-url');
        var row = $(this).closest('tr');

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
                        if (responseData.status === 'success') {
                            row.remove(); // Remove the row from the table

                            Swal.fire({
                                title: 'Success',
                                text: response.message,
                                icon: 'success'
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: response.message,
                                icon: 'error'
                            });
                        }
                    },
                    error: function(error) {
                        console.log("Error: " + error);
                    }
                });
            }
        });
    });
});

$('.dataTables_filter input[type="search"]').css({
    'width': '300px',
    'margin-right': '10px',
    'padding': '5px',
    'box-sizing': 'border-box'
});
</script>