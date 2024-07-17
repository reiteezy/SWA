<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-user bg-c-yellow"></i>
                    <div class="d-inline">
                        <h5>User Type</h5>
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
                        <li class="breadcrumb-item"><a href="#!">User Type List</a>
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
                                        data-target="#addTypeModal"><i class="feather icon-plus"></i>Add New User
                                        Type</button>
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table class="table table-hover m-b-0 sub-table" id="classtable">
                                            <thead>
                                                <tr>
                                                    <th>Class</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                              foreach ($classes as $class):
                              ?>
                                                <tr>
                                                    <td><?php echo $class->CLASS; ?></td>
                                                    <td><?php echo $class->DESCRIPTION; ?></td>
                                                    <td><button type="button" class="editClassButton action-btn-c-green" title="edit"
                                                            data-class-id="<?php echo $class->CID; ?>"
                                                            data-class-code="<?php echo $class->CLASS; ?>"
                                                            data-class-descript="<?php echo $class->DESCRIPTION; ?>"
                                                            data-toggle="modal" data-target="#editClassModal">
                                                            <i class="icon feather icon-edit f-w-600 f-16 m-r-15"
                                                                style="color: #fff"></i><span
                                                                style="color: #fff; font-size: 13px; margin-left: -8px;">Update</span>
                                                        </button>
                                                        <button type="button" class="deleteButton action-btn-c-red"
                                                            data-delete-url="<?php echo base_url() ?>ClassController/del_type/<?php echo $class->CID; ?>"><i
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
<!------------------------ USER TYPE MODAL------------------>

<div class="modal fade" id="addTypeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New User Type</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form role="form" id="classForm" method="POST" action="<?php echo base_url() ?>ClassController/new_type" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label"> Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="user_class" id="user_class"
                                    placeholder="Enter class name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label"> Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="user_descript" name="user_descript"
                                    placeholder="Enter description">
                            </div>
                        </div>
                        <span id="validationMessage" class="messages" style="color: red"></span>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="classSaveButton">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!------------------------ END OF ADD USER TYPE MODAL------------------>
<!------------------------ EDIT USER TYPE MODAL------------------>

<div class="modal fade" id="editClassModal" tabindex="-1" role="dialog">
    <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User Type</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                <form role="form" id="classEditForm" method="post" enctype="multipart/form-data" action="">
                <input type="hidden" id="class_id" name="class_id" value="">
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label"> Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="update_userclass" id="user_editclass"
                                    placeholder="Enter class name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label"> Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="update_userdescript" id="user_editdescript"
                                    placeholder="Enter description">
                            </div>
                        </div>
                        <span id="validationMessage" class="messages" style="color: red"></span>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="saveEditButton">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!------------------------ END OF EDIT USER TYPE MODAL------------------>

<script>
$(document).ready(function() {
    var classForm = $('#classForm');
    var classSaveButton = $('#classSaveButton');
    var initialClassValue = $('[name="user_class"]').val();
    var initialDescriptionValue = $('[name="user_descript"]').val();

    classSaveButton.on('click', function() {
        var classInput = $('[name="user_class"]');
        var descriptionInput = $('[name="user_descript"]');
        var validationMessage = $('#validationMessage');

        if (classInput.val().trim() === '' || descriptionInput.val().trim() === '') {
            validationMessage.text('Please fill in all required fields.');
            return;
        }

        // Check if values have changed
        if (classInput.val() === initialClassValue && descriptionInput.val() ===
            initialDescriptionValue) {
            // Display a Swal message for no changes
            Swal.fire({
                title: 'No changes made',
                text: 'You haven\'t made any changes.',
                icon: 'info',
            });
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
                // Submit the form using AJAX
                $.ajax({
                    url: classForm.attr('action'),
                    type: classForm.attr('method'),
                    data: new FormData(classForm[0]),
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

    $(document).on('click', '.editClassButton', function() {
        // Get the data attributes from the clicked button
        var classId = $(this).data('class-id');
        var classCode = $(this).data('class-code');
        var classDescript = $(this).data('class-descript');
        // Populate the modal form fields with the data
        
        console.log(classId);
        console.log(classDescript);
        $('#class_id').val(classId);
        $('#user_editclass').val(classCode);
        $('#user_editdescript').val(classDescript);
    });

    // Optionally, handle the save button click if you need to perform validation or AJAX submit
    var saveEditButton = $('#saveEditButton');
    var classEditForm = $('#classEditForm');
    var formChanged = false;

    var formInputs = classEditForm.find('input, textarea, select');
    formInputs.on('input', function() {
        formChanged = true;
    });

    saveEditButton.on('click', function() {
        var classId = $('#class_id').val();
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
                    url: "<?php echo base_url(); ?>ClassController/edit_type/" +
                        classId,
                    type: classEditForm.attr('method'),
                    data: new FormData(classEditForm[0]),
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
                                '<?php echo base_url() ?>ClassController/class_list';
                        });
                    },
                    error: function(error) {
                        console.log("Error: " + error);
                    }
                });
            }
        });
    });

    $('.deleteButton').on('click', function() {
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
});

$(document).ready(function() {
            $('#classtable').DataTable({
                lengthChange: false,
                language: {
                    search: '',
                    searchPlaceholder: 'Search...'
                }
            });
        });


        $('.dataTables_filter input[type="search"]').css({
            'width': '300px',
            'margin-right': '10px',
            'padding': '5px',
            'box-sizing': 'border-box'
        });
</script>