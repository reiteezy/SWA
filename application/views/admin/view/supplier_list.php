<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-inbox bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Supplier</h5>
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
                        <li class="breadcrumb-item"><a href="#!">Supplier</a>
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
                                    <h5>Supplier List</h5>
                                </div>
                                <div class="card-block" style="text-align: right;">
                                    <button type="button" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#addSupModal"><i class="feather icon-plus"></i>Add New
                                        Supplier</button>
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
                              foreach ($suppliers as $supplier):
                              ?>
                                                <tr>
                                                    <!-- <td></td> -->
                                                    <td><?php echo $supplier->CODE; ?></td>
                                                    <td><?php echo $supplier->NAME; ?></td>
                                                    <td><a href="#!"><i
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

                            <!--  -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="styleSelector">
        </div>
    </div>
</div>
<!------------------------ SUPPLIER MODAL------------------>
<div class="modal fade" id="addSupModal" tabindex="-1" role="dialog">
    <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Supplier</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form role="form" id="supplierForm" method="POST" action="<?php echo base_url() ?>SupplierController/new_supplier" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label"> Code</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="sup_code" id="sup_code" placeholder="Enter code">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label"> Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sup_name" name="sup_name"
                                    placeholder="Enter name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label"> Address</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sup_add" name="sup_add"
                                    placeholder="Enter address">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label">Contact Person</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sup_contact" name="sup_contact"
                                    placeholder="Enter contact person">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sup_phoneno" name="sup_phoneno"
                                    placeholder="Enter phone number">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label">Telex Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sup_telno" name="sup_telno"
                                    placeholder="Enter telex number">
                            </div>
                        </div>
                        <span id="validationMessage" class="messages" style="color: red"></span>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="supplierSaveButton">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!------------------------ END OF ADD SUPPLIER MODAL------------------>
<script>
$(document).ready(function() {
    var supplierForm = $('#supplierForm');
    var supplierSaveButton = $('#supplierSaveButton');
    var validationMessage = $('#validationMessage');

    supplierSaveButton.on('click', function() {
        var codeInput = $('[name="sup_code"]');
        var supplierNameInput = $('[name="sup_name"]');
        var addressInput = $('[name="sup_add"]');
        var contactPersonInput = $('[name="sup_contact"]');
        var phoneNoInput = $('[name="sup_phoneno"]');
        var telexInput = $('[name="sup_telno"]');

        if (codeInput.val().trim() === '' || supplierNameInput.val().trim() === '' || addressInput.val()
            .trim() === '' || contactPersonInput.val().trim() === '' || phoneNoInput.val().trim() === '' || telexInput.val().trim() === ''
            ) {
            validationMessage.text('Please fill in all required fields.');
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
        }).then(function(result) {
            if (result.isConfirmed) {
                $.ajax({
                    url: supplierForm.attr('action'),
                    type: supplierForm.attr('method'),
                    data: new FormData(supplierForm[0]),
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
        }).then(function(result) {
            if (result.isConfirmed) {
                // Send AJAX request for delete operation
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
                        }).then(function() {
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