<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-inbox bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Edit Subsidiary</h5>
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
                        <li class="breadcrumb-item"><a href="#!">Edit</a>
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


                            <div class="card">
                                <div class="card-header">
                                </div>
                                <div class="card-block">
                                    <form role="form" id="subsidiaryForm" method="POST"
                                        action="<?php echo base_url() ?>SubsidiaryController/edit_subsidiary/<?php echo $sub_id; ?>"
                                        enctype="multipart/form-data">
                                        <div class="mb-3 row">
                                            <input value="<?php echo $sub_id?>" type="hidden" name="sub_id"
                                                class="form-control">
                                            <label class="form-label col-sm-2 col-form-label">Subsidiary Code</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control"
                                                    value="<?php echo $sub_data->CODE; ?>" name="sub_code">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2 col-form-label">Subsidiary
                                                Description</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control"
                                                    value="<?php echo $sub_data->DESCRIPTION; ?>" name="sub_descript"
                                                    placeholder="Enter description">
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="form-label col-sm-2"></label>
                                            <div class="col-sm-10">
                                                <button type="button" class="btn btn-primary m-b-0"
                                                    id="saveButton">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var saveButton = document.getElementById('saveButton');
    var subsidiaryForm = document.getElementById('subsidiaryForm');
    var formChanged = false;

    var formInputs = subsidiaryForm.querySelectorAll('input, textarea, select');
    formInputs.forEach(function(input) {
        input.addEventListener('input', function() {
            formChanged = true;
        });
    });

    saveButton.addEventListener('click', function() {
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
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: subsidiaryForm.action,
                    type: subsidiaryForm.method,
                    data: new FormData(subsidiaryForm),
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
});
</script>