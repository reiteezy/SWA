<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-inbox bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Promo Execution Report</h5>
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
                        <li class="breadcrumb-item"><a href="#!">New PER</a>
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
                                    <h5>New PER</h5>
                                </div>
                                <div class="card-block">
                                <div class="row" style="margin-top: 20px;">
                        <div class="col-md-12" style="padding-left: 30px; padding-right: 30px;">
                            <form role="form" id="perForm" method="POST" action="" enctype="multipart/form-data"
                                style="margin-right: 1em; margin-left: 1em;">
                                <!-- <div class="card-body"> -->
                                <!-- <div class="form-group"> -->
                                <div class="row">
                                    <div class="col-md-3 col-xs-12">
                                        <label>Subsidiary</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="sub_code" name="sub_code"
                                                readonly="readonly" placeholder="Subsidiary"
                                                style="border-radius: 0px;">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="text" readonly="readonly" id="sub_descript" name="sub_descript"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label>Control No.</label>
                                        <input type="text" readonly="readonly" id="control_no" name="control_no"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <label>Promo Title</label>
                                        <input type="text" readonly="readonly" id="promo_title" name="promo_title"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label for="document_date" style="cursor: pointer;">Date</label>
                                        <input type="date" id="document_date" name="document_date" class="form-control">
                                    </div>
                                </div>
                                <script>
                                function getDate() {
                                    var today = new Date();
                                    document.getElementById("document_date").value = today.getFullYear() + '-' + ('0' +
                                        (today
                                            .getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
                                }
                                window.onload = function() {
                                    getDate();
                                };
                                </script>
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <label>Mechanics</label>
                                        <input autocomplete="off" type="text" readonly="readonly" id="mechanics"
                                            name="mechanics" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label>SWA Series No.</label>
                                        <div style="position: relative;">
                                            <input autocomplete="off" type="text" id="swa_series_no"
                                                name="swa_series_no" class="form-control">
                                            <div class="swaDropdown" id="swaDropdown"
                                                style="position: absolute; width: 100%; max-height: 200px; overflow-y: auto; border: 1px solid #d1d3e2; background-color: #F5F5F5; display: none; z-index: 999;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-xs-12">
                                        <label>Promo Period</label>
                                        <input type="date" readonly="readonly" id="promo_start" name="promo_start"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="date" readonly="readonly" value="" id="promo_end" name="promo_end"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label>MIS Ref. No. 1</label>
                                        <input autocomplete="off" readonly="readonly" type="text" id="mis_ref_1"
                                            name="mis_ref_1" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-xs-12">
                                        <label>Sponsor</label>
                                        <input type="text" readonly="readonly" value="" id="sup_code" name="sup_code"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label>MIS Ref. No. 2</label>
                                        <input autocomplete="off" readonly="readonly" type="text" id="mis_ref_2"
                                            name="mis_ref_2" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xs-12" style="margin-top: -15px;">
                                        <label>&nbsp;</label>
                                        <input autocomplete="off" readonly="readonly" type="text" id="sup_name"
                                            name="sup_name" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label>MIS Ref. No. 3</label>
                                        <input autocomplete="off" readonly="readonly" type="text" id="mis_ref_3"
                                            name="mis_ref_3" class="form-control">
                                    </div>
                                </div>
                                <hr class="rounded">
                                <span style="font-style: italic">Enter actual execution quantity value</span><span
                                    style="color: red">*</span>
                                <table class="table table-bordered table-per" id="perTable" style="width: 100%;">
                                    <thead style="position: sticky; top: 0; text-align: center">
                                        <tr>
                                            <!-- <th>#</th> -->
                                            <th style="width: 14%;">Quantity</th>
                                            <th style="width: 14%;">Unit</th>
                                            <th style="width: 40%;">Item Description
                                            </th>
                                            <th style="width: 14%;">Actual Execution
                                                Quantity</th>
                                            <th style="width: 14%;">Declaration of
                                                Un-used
                                                Allocation</th>

                                        </tr>
                                    </thead>
                                    <tbody id="tbody">

                                    </tbody>
                                </table>

                                <hr class="rounded">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <label>Promo Execution Summary</label>
                                            <textarea autocomplete="on" type="text" id="per_summary" name="per_summary"
                                                class="form-control"></textarea>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <label>Post-promo Remarks</label>
                                            <textarea autocomplete="on" type="text" id="post_promo_remarks"
                                                name="post_promo_remarks" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 text-left">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#assignSignatoriesModal"
                                                style="width: 150px; background-color: #3f9aad !important; border: none;">Signatories</button>
                                        </div>
                                        <div class="col-md-6 text-right">

                                            <input type="reset" value="Clear" id="clearForm"
                                                style="width: 150px; margin-right: 8px;"
                                                class="btn btn-sm btn-secondary" data-toggle="tooltip"
                                                title="Clear form">
                                            <button type="button" class="btn btn-sm btn-success" id="saveButton"
                                                style="width: 150px;"><img
                                                    src="<?php echo base_url('')?>assets/backend/img/icons/save.png"
                                                    style="width: 15px; margin-right: 10px;">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var clearForm = document.getElementById('clearForm');
                                clearForm.addEventListener('click', function() {
                                    event.preventDefault();
                                    checkIfEmpty();
                                });

                                function checkIfEmpty() {
                                    var form = document.getElementById('perForm');
                                    var formData = new FormData(form);

                                    var isFormEmpty = Array.from(formData.values()).every(value => value ===
                                        '');

                                    if (isFormEmpty) {
                                        Swal.fire({
                                            title: 'Form is already empty!',
                                            icon: 'info',
                                            confirmButtonColor: '#3085d6',
                                            confirmButtonText: 'Ok'
                                        });
                                    } else {
                                        confirmReset();
                                    }
                                }

                                function confirmReset() {
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: 'This will reset all text!',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Yes, reset it!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            document.getElementById('perForm').reset();
                                            clearTable();
                                        }
                                    });
                                }
                            });
                            </script>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
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