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
                        <li class="breadcrumb-item"><a href="#!">PER List</a>
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
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#perFormModal"><i class="feather icon-plus"></i>Add New
                                        PER</button>
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table id="pertable" class="table table-hover m-b-0">
                                            <thead>
                                                <tr>
                                                    <!-- <th></th> -->
                                                    <th>Control Number</th>
                                                    <th>Document Date</th>
                                                    <th>Subsidiary</th>
                                                    <th>Promo Tittle</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                              foreach ($per_datas as $data):
                              ?>
                                                <tr>
                                                    <!-- <td></td> -->
                                                    <td><?php echo $data->PER_ID; ?></td>
                                                    <td><?php echo $data->DOCUMENT_DATE; ?></td>
                                                    <td><?php echo $data->SUB_DESCRIPT; ?></td>
                                                    <td><?php echo $data->PER_PROMO_TITLE; ?></td>
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

                            <!-- -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--------------------------- PER MODAL-------------------------->
<div class="modal fade" id="perFormModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Promo Execution Report Form</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="perForm" role="form" id="perForm" method="POST" action=""
                                enctype="multipart/form-data">
                                <!-- <div class="card-body"> -->
                                <!-- <div class="form-group"> -->
                                <div class="row">
                                    <div class="col-md-3 col-xs-12">
                                        <label class="sm-label">Subsidiary</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="sub_code" name="sub_code"
                                                readonly="readonly" placeholder="Subsidiary">
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
                                        <label class="sm-label">Control No.</label>
                                        <input type="text" readonly="readonly" id="control_no" name="control_no"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="margin-top: -15px;">
                                    <div class="col-md-6 col-xs-12">
                                        <label class="sm-label">Promo Title</label>
                                        <input type="text" readonly="readonly" id="promo_title" name="promo_title"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label for="document_date" style="cursor: pointer;"
                                            class="sm-label">Date</label>
                                        <input type="date" id="document_date" name="document_date" class="form-control">
                                    </div>
                                </div>
                                <script>
                                function getDate() {
                                    var today = new Date();
                                    document.getElementById("document_date").value = today
                                        .getFullYear() + '-' + ('0' +
                                            (today
                                                .getMonth() + 1)).slice(-2) + '-' + ('0' + today
                                            .getDate()).slice(-2);
                                }
                                window.onload = function() {
                                    getDate();
                                };
                                </script>
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <label class="sm-label">Mechanics</label>
                                        <input autocomplete="off" type="text" readonly="readonly" id="mechanics"
                                            name="mechanics" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label class="sm-label">SWA Series No.</label>
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
                                        <label class="sm-label">Promo Period</label>
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
                                        <label class="sm-label">MIS Ref. No. 1</label>
                                        <input autocomplete="off" readonly="readonly" type="text" id="mis_ref_1"
                                            name="mis_ref_1" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-xs-12">
                                        <label class="sm-label">Sponsor</label>
                                        <input type="text" readonly="readonly" value="" id="sup_code" name="sup_code"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label class="sm-label">MIS Ref. No. 2</label>
                                        <input autocomplete="off" readonly="readonly" type="text" id="mis_ref_2"
                                            name="mis_ref_2" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input autocomplete="off" readonly="readonly" type="text" id="sup_name"
                                            name="sup_name" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label class="sm-label">MIS Ref. No. 3</label>
                                        <input autocomplete="off" readonly="readonly" type="text" id="mis_ref_3"
                                            name="mis_ref_3" class="form-control">
                                    </div>
                                </div>
                                <hr class="rounded">
                                <span style="font-style: italic">Enter actual execution quantity
                                    value</span><span style="color: red">*</span>
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
                                            <label class="sm-label">Promo Execution Summary</label>
                                            <textarea autocomplete="on" type="text" id="per_summary" name="per_summary"
                                                class="form-control"></textarea>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <label class="sm-label">Post-promo Remarks</label>
                                            <textarea autocomplete="on" type="text" id="post_promo_remarks"
                                                name="post_promo_remarks" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                $('#assignSignatoriesModal').click(function() {
                                    // Code to open the second modal
                                    event.stopPropagation();
                                    $('#perFormModal').focus();
                                });
                                document.addEventListener('DOMContentLoaded', function() {
                                    var clearForm = document.getElementById('clearForm');
                                    clearForm.addEventListener('click', function() {
                                        event.preventDefault();
                                        checkIfEmpty();
                                    });

                                    function checkIfEmpty() {
                                        var form = document.getElementById('perForm');
                                        var formData = new FormData(form);

                                        var isFormEmpty = Array.from(formData.values()).every(
                                            value => value ===
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
            <div class="modal-footer">
                <div class="d-flex justify-content-start">
                    <button type="button" class="btn btn-info waves-effect waves-light me-2" data-bs-toggle="modal"
                        data-bs-target="#assignSignatoriesModal">Signatories</button>
                    <input type="reset" value="Clear" id="clearForm" class="btn btn-secondary waves-effect waves-light me-2" data-toggle="tooltip"
                        title="Clear form">
                </div>
                <div class="ms-auto">
                    <button type="button" class="btn btn-default waves-effect me-2" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light" id="saveButton">Save
                        changes</button>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>

<!------------------------ END OF PER MODAL------------------>
<!--------------------------     SIGNATORIES MODAL     ---------------------------------------->

<div class="modal fade" id="assignSignatoriesModal" tabindex="-1" role="dialog">
    <div class="modal-dialog-centered modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Signatories</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form role="form" method="POST" action="<?php echo base_url() ?>#" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="sm-label">Submitted by</label>
                                <input autocomplete="on" value="<?php ?>" type="text" id="sub_by" name="sub_by"
                                    class="form-control" placeholder="Submitted by">
                                <label></label>
                                <input autocomplete="on" type="date" value="<?php  ?>" id="sub_date" name="sub_date"
                                    class="form-control" placeholder="Date">
                            </div>
                            <div class="form-group">
                                <label class="sm-label">Reviewed by</label>
                                <input autocomplete="on" value="<?php ?>" type="text" id="rev_by" name="rev_by"
                                    class="form-control" placeholder="Reviewed by">
                                <label></label>
                                <input autocomplete="on" type="date" value="<?php  ?>" id="rev_date" name="rev_date"
                                    class="form-control" placeholder="Date">
                            </div>
                            <div class="form-group">
                                <label class="sm-label">Audited by</label>
                                <input autocomplete="on" value="<?php ?>" type="text" id="audit_by" name="audit_by"
                                    class="form-control" placeholder="Audited by">
                                <label></label>
                                <input autocomplete="on" type="date" value="<?php  ?>" id="audit_date" name="audit_date"
                                    class="form-control" placeholder="Date">
                            </div>
                            <div class="form-group">
                                <label class="sm-label">Noted by</label>
                                <input autocomplete="on" value="<?php ?>" type="text" id="note_by" name="note_by"
                                    class="form-control" placeholder="Noted by">
                                <label></label>
                                <input autocomplete="on" type="date" value="<?php  ?>" id="note_date" name="note_date"
                                    class="form-control" placeholder="Date">
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-bs-dismiss="modal"
                                    class="btn btn-primary waves-effect waves-light" id="saveSignatoriesValues">Save
                                    changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $("#swa_series_no").on("input", function() {
        var swa_series_no = $(this).val().trim();

        if (swa_series_no.length > 0) {
            $.ajax({
                url: '<?php echo base_url() ?>SwaController/get_swa_per',
                type: 'GET',
                data: {
                    'swa_series_no': swa_series_no
                },
                success: function(response) {
                    var response = JSON.parse(response);
                    var swaData = response.data;
                    console.log(swaData);
                    $("#swaDropdown").html("");
                    var uniqueSWAIds = [];
                    for (var c = 0; c < swaData.length; c++) {
                        var swaId = swaData[c].SWA_ID;
                        if (swaId.startsWith(swa_series_no)) {
                            if (!uniqueSWAIds.includes(swaId)) {
                                uniqueSWAIds.push(swaId);

                                var subCode = swaData[c].SUB_CODE;
                                var subDescription = swaData[c].DESCRIPTION;
                                var supCode = swaData[c].SUP_CODE;
                                var supName = swaData[c].NAME;
                                var promoTitle = swaData[c].SWA_PROMO_TITLE;
                                var promoMechanics = swaData[c].SWA_PROMO_MECHANICS;
                                var promoStart = swaData[c].SWA_PROMO_START;
                                var promoEnd = swaData[c].SWA_PROMO_END;
                                var swaTrans1 = swaData[c].SWA_TRANS_NO1;
                                var swaTrans2 = swaData[c].SWA_TRANS_NO2;
                                var swaTrans3 = swaData[c].SWA_TRANS_NO3;
                                console.log(promoTitle);
                                var option = $('<div>')
                                    .addClass('dropdown-item')
                                    .css('cursor', 'pointer')
                                    .text(swaId)
                                    .click((function(swaId, subCode, subDescription,
                                        promoTitle, supCode, supName,
                                        promoMechanics, promoStart,
                                        promoEnd,
                                        swaTrans1, swaTrans2, swaTrans3) {
                                        return function() {
                                            $("#control_no").val(swaId);
                                            $("#swa_series_no").val(
                                                swaId);
                                            $("#sub_code").val(subCode);
                                            $("#sub_descript").val(
                                                subDescription);
                                            $("#sup_code").val(supCode);
                                            $("#sup_name").val(supName);
                                            $("#promo_title").val(
                                                promoTitle);
                                            $("#mechanics").val(
                                                promoMechanics);
                                            $("#promo_start").val(
                                                promoStart);
                                            $("#promo_end").val(
                                                promoEnd);
                                            $("#mis_ref_1").val(
                                                swaTrans1);
                                            $("#mis_ref_2").val(
                                                swaTrans2);
                                            $("#mis_ref_3").val(
                                                swaTrans3);
                                            populateTable(swaId);
                                            $("#swaDropdown").hide();
                                        };
                                    })(swaId, subCode, subDescription,
                                        promoTitle,
                                        supCode, supName,
                                        promoMechanics, promoStart, promoEnd,
                                        swaTrans1,
                                        swaTrans2, swaTrans3));

                                $("#swaDropdown").append(option);
                            }
                        }
                    }
                    $("#swaDropdown").show();
                },
                error: function(error) {
                    console.error("Error:", error);
                }
            });
        } else {
            $("#control_no").val('');
            $("#swa_series_no").val('');
            $("#sub_code").val('');
            $("#sub_descript").val('');
            $("#sup_code").val('');
            $("#sup_name").val('');
            $("#promo_title").val('');
            $("#mechanics").val('');
            $("#promo_start").val('');
            $("#promo_end").val('');
            $("#mis_ref_1").val('');
            $("#mis_ref_2").val('');
            $("#mis_ref_3").val('');
            clearTable();
            $("#swaDropdown").hide();
        }
    });

    function populateTable(swaId) {
        $.ajax({
            url: '<?php echo base_url() ?>SwaController/get_swa_per_details',
            type: 'GET',
            data: {
                'swa_id': swaId
            },
            success: function(response) {
                var response = JSON.parse(response);
                var swaDetailsData = response.data;

                $("#tbody").html("");

                for (var i = 0; i < swaDetailsData.length; i++) {
                    var newRow = $('<tr>');
                    newRow.append(
                        '<td><input class="form-control" type="text" name="datas[' + i +
                        '][qty]" value="' + swaDetailsData[i].SWA_QUANTITY +
                        '" style="text-align: center; border-color: #4c4c4c; border: none; padding: 1px !important;"></td>'
                    );
                    newRow.append(
                        '<td><input class="form-control" type="text" name="datas[' + i +
                        '][unit]" value="' + swaDetailsData[i].SWA_UNIT +
                        '" style="text-align: center; border-color: #4c4c4c; border: none; padding: 1px !important;"></td>'
                    );
                    newRow.append(
                        '<td><input class="form-control" type="text" name="datas[' + i +
                        '][descript]" value="' + swaDetailsData[i].SWA_DESCRIPTION +
                        '" style="text-align: center; border-color: #4c4c4c; border: none; padding: 1px !important;" ></td>'
                    );
                    newRow.append(
                        '<td><input class="form-control" type="text" name="datas[' + i +
                        '][actual_qty]" style="text-align: center; border-color: #4c4c4c; border: none; padding: 1px !important;" oninput="calculateDifferenceAmt(this)"></td>'
                    );
                    newRow.append(
                        '<td><input class="form-control" type="text" name="datas[' + i +
                        '][unused_alloc]" value="" style="text-align: center; border-color: #4c4c4c; border: none; padding: 1px !important;"></td>'
                    );


                    $("#tbody").append(newRow);
                }
            },
            error: function(error) {
                console.error("Error fetching swa_details_tbl:", error);
            }
        });
    }

    function calculateDifferenceAmt(inputField) {
        var rowIndex = inputField.closest("tr").rowIndex - 1;
        var qtyValue = document.getElementsByName("datas[" + rowIndex +
            "][qty]")[0];
        var actualQtyInput = document.getElementsByName("datas[" + rowIndex +
            "][actual_qty]")[0];
        var unusedValue = document.getElementsByName("datas[" + rowIndex +
            "][unused_alloc]")[0];

        var qty = parseFloat(qtyValue.value) || 0;
        var actualQty = parseFloat(actualQtyInput.value) || 0;

        if (actualQty) {
            var unused = qty - actualQty;
            unusedValue.value = unused.toFixed(2);

        } else {
            unusedValue.value = "";
        }
    }

    function clearTable() {
        $("#tbody").html("");
    }

    var saveButton = document.getElementById('saveButton');
    var perForm = document.getElementById('perForm');

    saveButton.addEventListener('click', function() {
        event.preventDefault();
        checkIfFormEmpty();
    });

    function checkIfFormEmpty() {
        var formData = new FormData(perForm);

        var isFormEmpty = Array.from(formData.values()).every(value => value === '');

        if (isFormEmpty) {
            Swal.fire({
                title: 'Form is empty!',
                icon: 'info',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok'
            });
        } else {
            showConfirmation();
        }
    }

    function showConfirmation() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You are about to save the data.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, save it!'
        }).then((result) => {
            if (result.isConfirmed) {
                saveFormData();
            }
        });
    }


    function saveFormData() {
        var formData = new FormData(perForm);

        $.ajax({
            url: '<?php echo base_url() ?>SwaController/new_per',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status === 'success') {
                    showSuccessAlert(response.message, response.perId);
                } else {
                    showErrorAlert(response.message);
                }
            },
            error: function(error) {
                showErrorAlert('Error saving data!');
            }
        });
    }

    function showSuccessAlert(message, recordId) {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: message,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Print',
            cancelButtonText: 'Not Now'
        }).then((result) => {
            if (result.isConfirmed) {
                var pdfUrl = '<?php echo base_url() ?>SwaController/printPer/' + recordId;
                var printWindow = window.open(pdfUrl, '_blank');

                location.reload();
                printWindow.onload = function() {
                    printWindow.print();
                };
            } else {
                location.reload();
            }
        });
    }


    function showErrorAlert(message) {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: message,
            // timer: 2000,
            // showConfirmButton: false,
        }).then(() => {
            // location.reload();
        });
    }

    function getCurrentDate() {
        const now = new Date();
        const year = now.getFullYear();
        let month = (now.getMonth() + 1).toString().padStart(2, "0");
        let day = now.getDate().toString().padStart(2, "0");
        return `${year}-${month}-${day}`;
    }

    const dateInputs = {
        "sub_date": getCurrentDate(),
        "rev_date": getCurrentDate(),
        "audit_date": getCurrentDate(),
        "note_date": getCurrentDate()
    };

    for (const inputId in dateInputs) {
        if (dateInputs.hasOwnProperty(inputId)) {
            const inputElement = document.getElementById(inputId);
            if (inputElement) {
                inputElement.value = dateInputs[inputId];
            }
        }
    }



    $('#saveSignatoriesValues').on('click', function() {
        var subByValue = $('#sub_by').val();
        var subDateValue = $('#sub_date').val();
        var revByValue = $('#rev_by').val();
        var revDateValue = $('#rev_date').val();
        var auditByValue = $('#audit_by').val();
        var auditDateValue = $('#audit_date').val();
        var noteByValue = $('#note_by').val();
        var noteDateValue = $('#note_date').val();

        if (subByValue) {
            $('#perForm').append('<input type="hidden" name="sub_by" value="' + subByValue +
                '">');
        }
        if (subByValue && subDateValue) {
            $('#perForm').append('<input type="hidden" name="sub_date" value="' + subDateValue +
                '">');
        }
        if (revByValue) {
            $('#perForm').append('<input type="hidden" name="rev_by" value="' + revByValue +
                '">');
        }
        if (revByValue && revDateValue) {
            $('#perForm').append('<input type="hidden" name="rev_date" value="' + revDateValue +
                '">');
        }
        if (auditByValue) {
            $('#perForm').append('<input type="hidden" name="audit_by" value="' + auditByValue +
                '">');
        }
        if (auditByValue && auditDateValue) {
            $('#perForm').append('<input type="hidden" name="audit_date" value="' +
                auditDateValue + '">');
        }
        if (noteByValue) {
            $('#perForm').append('<input type="hidden" name="note_by" value="' + noteByValue +
                '">');
        }
        if (noteByValue && noteDateValue) {
            $('#perForm').append('<input type="hidden" name="note_date" value="' +
                noteDateValue + '">');
        }
    });
});
$(document).ready(function() {
    $(document).on('input', 'input[name*="[actual_qty]"]', function() {
        calculateDifferenceAmt($(this));
    });
});

function calculateDifferenceAmt(inputField) {
    var rowIndex = inputField.closest("tr").index();
    var qtyValue = $('input[name="datas[' + rowIndex + '][qty]"]').val();
    var actualQtyInput = inputField.val();
    var unusedValue = $('input[name="datas[' + rowIndex + '][unused_alloc]"]');

    var qty = parseFloat(qtyValue) || 0;
    var actualQty = parseFloat(actualQtyInput) || 0;

    if (actualQty) {
        var unused = qty - actualQty;
        unusedValue.val(unused.toFixed(2));
    } else {
        unusedValue.val("");
    }
}

$(document).ready(function() {
    $('#pertable').DataTable({
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