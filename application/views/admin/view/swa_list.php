<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-file bg-c-yellow"></i>
                    <div class="d-inline">
                        <h5>Stock Withdrawal Advice</h5>
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
                        <li class="breadcrumb-item"><a href="#!">SWA List</a>
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
                                <?php if ($this->session->userdata('priv_swaf') == 1 && $this->session->userdata('priv_swavo') == 0): ?>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#swaFormModal"><i class="feather icon-plus"></i>Add New
                                        SWA</button>
                                        <?php endif; ?>
                                    <!-- <h5>SWA List</h5> -->
                                </div>

                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table id="swatable" class="table table-hover m-b-0">
                                            <thead>
                                                <tr>
                                                    <!-- <th></th> -->
                                                    <th>Control Number</th>
                                                    <th>Document Date</th>
                                                    <th>Supplier Name</th>
                                                    <th>MIS Status</th>
                                                    <th>Accounting Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                              foreach ($swa_datas as $data):
                              ?>
                                                <tr>
                                                    <!-- <td></td> -->
                                                    <td><?php echo $data->SWA_ID; ?></td>
                                                    <td><?php echo $data->DOCUMENT_DATE; ?></td>
                                                    <td><?php echo $data->NAME; ?></td>
                                                    <td> <?php  if($data->SWA_MIS_STATUS == 'cancelled'){ ?>
                                                        <label class="user-status form-label badge badge-inverse-danger"
                                                            data-user-id="<?php echo $data->SWA_ID?>">Cancelled</label>
                                                        <?php } else { ?>
                                                        <label
                                                            class="user-status form-label badge badge-inverse-warning"
                                                            data-user-id="<?php echo $data->SWA_ID?>">Pending</label>
                                                        <?php } ?>
                                                    </td>
                                                    <td> <?php  if($data->SWA_ACCTG_STATUS == 'pending'){ ?>
                                                        <label class="user-status form-label badge badge-inverse-danger"
                                                            data-user-id="<?php echo $data->SWA_ID?>">Pending</label>
                                                        <?php } else { ?>
                                                        <label
                                                            class="user-status form-label badge badge-inverse-success"
                                                            data-user-id="<?php echo $data->SWA_ID?>">Received</label>
                                                        <?php } ?>
                                                    </td>
                                                    <td><button type="button" class="viewSwaButton action-btn-c-blue" title="View"
                                                            data-swa-id="<?php echo $data->SWA_ID?>" data-toggle="modal"
                                                            data-target="#viewSwaFormModal" title="View"><i
                                                                class="icon feather icon-eye f-w-600 f-16 m-r-15"
                                                                style="color: #fff"></i><span
                                                                style="color: #fff; font-size: 13px; margin-left: -8px;">View</span></button>

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
                        </div>
                        <!-- -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--------------------------- SWA MODAL-------------------------->
<div class="modal fade" id="swaFormModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Stock Withdrawal Advice Form</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-12">
                            <form role="form" method="POST" action="" enctype="multipart/form-data" id="swaForm">
                                <!-- <div class="card-body"> -->
                                <!-- <div class="form-group"> -->
                                <div class="row">
                                    <div class="col-md-4 col-xs-12">
                                        <label class="sm-label">From</label>
                                        <div class="input-group">
                                            <?php  
                                    $location = $this->db->get('location_tbl')->result_array();
                                    ?>
                                            <select class="form-control hide-select" name="loc" id="loc"
                                                onchange="handleLocChange()">
                                                <option value="" hidden selected></option>
                                                <?php  foreach ($location as $loc): ?>
                                                <option><?php echo $loc['LOCATION'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" autocomplete="off" class="form-control">
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <label class="sm-label">Control No.</label>
                                        <input type="text" readonly="readonly" id="control_no" name="control_no"
                                            class="form-control">
                                    </div>
                                </div>
                                <!-- </div> -->
                                <!-- <div class="form-group"> -->
                                <div class="row">
                                    <div class="col-md-4 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="text" id="otherDetails" name="otherDetails" class="form-control"
                                            placeholder="Others, please specify" style="display: none;">
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" autocomplete="off" class="form-control">
                                    </div>
                                    <div class="col-md-4 col-xs-12" style="margin-top: -15px;">
                                        <label class="sm-label">Date</label>
                                        <input type="date" id="document_date" name="document_date" class="form-control">
                                    </div>

                                </div>
                                <script>
                                function getDate() {
                                    var today = new Date();
                                    document.getElementById("document_date").value = today.getFullYear() + '-' + (
                                        '0' +
                                        (today
                                            .getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-
                                        2);
                                }
                                window.onload = function() {
                                    getDate();
                                };

                                function handleLocChange() {
                                    var locSelect = document.getElementById("loc");
                                    var otherDetailsInput = document.getElementById("otherDetails");

                                    if (locSelect.value === "Others") {
                                        otherDetailsInput.style.display = "block";
                                        otherDetailsInput.style.marginTop = "-25px";
                                    } else {
                                        otherDetailsInput.style.display = "none";
                                        otherDetailsInput.value = "";
                                    }
                                }
                                </script>
                                <!-- </div> -->
                                <!-- <div class="form-group"> -->
                                <div class="row">
                                    <div class="col-md-4 col-xs-12" style="margin-top: -5px;">
                                        <label class="sm-label">To</label>
                                        <input type="hidden" id="sub_id" name="sub_id">
                                        <div class="input-group">
                                            <input type="text" class="form-control" data-toggle="modal"
                                                data-target="#assignSubsidiaryModal" readonly="readonly" id="sub_code"
                                                name="sub_code" placeholder="Select subsidiary"
                                                title="Search for subsidiary" style="cursor: pointer;">
                                        </div>
                                    </div>
                                    <!-- <script>
                                    $(document).ready(function() {
                                        $(".subsidiary-input").on("click", function() {
                                            $(".assign-subsidiary-btn").trigger("click");
                                        });
                                    });
                                    </script> -->
                                    <div class="col-md-4 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" readonly="readonly" class="form-control">
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <label class="sm-label">Trans No.</label>
                                        <input type="text" id="trans_no" name="trans_no" class="form-control"
                                            readonly="readonly">
                                    </div>
                                </div>
                                <!-- </div>
                                  <div class="form-group"> -->
                                <div class="row">
                                    <div class="col-md-4 col-xs-12" style="margin-top: -25px;">
                                        <label>&nbsp;</label>
                                        <input type="text" readonly="readonly" id="sub_descript" name="sub_descript"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-2 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" readonly="readonly" class="form-control">
                                    </div>
                                    <div class="col-md-2 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" readonly="readonly" class="form-control">
                                    </div>
                                    <div class="col-md-2 col-xs-12" style="margin-top: -12px;">
                                        <label class="sm-label">Per No.</label>
                                        <input type="text" readonly="readonly" id="per_no" name="per_no"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-2 col-xs-12" style="margin-top: -12px; margin-bottom: 10px;">
                                        <label class="sm-label">CRF/CV No.</label>
                                        <input autocomplete="off" readonly="readonly" type="text" id="crfcv_no"
                                            name="crfcv_no" class="form-control">
                                    </div>
                                    <!-- </div> -->
                                    <div class="row" style="padding-top: 20px;">
                                        <div class="col">
                                            <span style="font-style: italic;">Enter the item code or
                                                barcode</span>
                                        </div>
                                        <div class="col-auto text-end">
                                            <button class="btn btn-sm btn-dark btn-flat" type="button"
                                                onclick="addItem();" data-bs-toggle="tooltip" title="Add row"
                                                style="color: #000; background-color: transparent; border-color: #fff;">
                                                <i class="nav-icon fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="tableContainer" style="height: 388px; overflow: auto;">
                                        <table class="table table-bordered" id="" style="width: 100%;">
                                            <thead style="position: sticky; top: 0;">
                                                <tr
                                                    style="text-align: center; border: 1px solid white; background-color: #6b95b0;">
                                                    <th style="width: 15%;">Code</th>
                                                    <th style="width: 12%;">Unit</th>
                                                    <th style="width: 10%;">Quantity</th>
                                                    <th style="width: 39%;">Description</th>
                                                    <th style="width: 12%;">Cost Per Unit</th>
                                                    <th style="width: 12%;">Amount</th>
                                                    <!-- <th style="></th> -->
                                                </tr>
                                            </thead>
                                            <tbody id="tbody" style="overflow-y: auto; max-height: 410px;">
                                                <?php for ($data = 0; $data < 8; $data++) { ?>
                                                <tr data-row="<?php echo $data; ?>"
                                                    style="transition: background-color 0.3s ease; cursor: pointer; background-color: #e3f1fe !important;">
                                                    <td>
                                                        <input class="form-control item-code-input" type="text"
                                                            name="datas[<?php echo $data;?>][code]" autocomplete="off"
                                                            style="text-align: center; border-color: #4c4c4c; border: none;">
                                                    </td>
                                                    <td>
                                                        <select class="form-control custom-arrow"
                                                            name="datas[<?php echo $data; ?>][unit]"
                                                            style="border: none;"
                                                            id="datas[<?php echo $data; ?>][unit]">
                                                            <option value="" hidden selected>
                                                            </option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                            name="datas[<?php echo $data; ?>][qty]" autocomplete="off"
                                                            oninput="calculateTotalAmt(this)"
                                                            style="text-align: center; border-color: #4c4c4c; border: none;">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="hidden"
                                                            name="datas[<?php echo $data;?>][barcode]"
                                                            autocomplete="off" id="datas[<?php echo $data;?>][barcode]">
                                                        <input class="form-control" type="hidden"
                                                            name="datas[<?php echo $data;?>][item_code]"
                                                            autocomplete="off"
                                                            id="datas[<?php echo $data;?>][item_code]">
                                                        <input class="form-control" type="text"
                                                            id="datas[<?php echo $data; ?>][descript]"
                                                            name="datas[<?php echo $data; ?>][descript]"
                                                            autocomplete="off"
                                                            style="text-align: center; border-color: #4c4c4c; border: none;">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                            id="datas[<?php echo $data; ?>][unit_cost]"
                                                            name="datas[<?php echo $data; ?>][unit_cost]"
                                                            autocomplete="off" oninput="calculateTotalAmt(this)"
                                                            style="text-align: center; border-color: #4c4c4c; border: none;">
                                                    </td>

                                                    <td>
                                                        <input class="form-control" type="text"
                                                            name="datas[<?php echo $data; ?>][amt]" value="" readonly
                                                            autocomplete="off"
                                                            style=" text-align: center; border-color: #4c4c4c; border: none; background-color: transparent;">
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <script>
                                    function calculateTotalAmt(inputField) {
                                        var rowIndex = $(inputField).closest("tr").index();
                                        var qtyInput = $("input[name='datas[" + rowIndex + "][qty]']");
                                        var unitCostInput = $("input[name='datas[" + rowIndex +
                                            "][unit_cost]']");
                                        var amtInput = $("input[name='datas[" + rowIndex + "][amt]']");

                                        var qty = parseFloat(qtyInput.val()) || 0;
                                        var unitCost = parseFloat(unitCostInput.val()) || 0;

                                        if (qty && unitCost) {
                                            var total = qty * unitCost;
                                            amtInput.val(total.toFixed(2));
                                        } else {
                                            amtInput.val("");
                                        }
                                        calculateGrandTotal();
                                    }

                                    function calculateGrandTotal() {
                                        var totalSum = 0;

                                        $("input[name*='[amt]']").each(function() {
                                            var amtValue = parseFloat($(this).val()) || 0;
                                            totalSum += amtValue;
                                        });

                                        $("#total").val(totalSum.toFixed(2));
                                    }

                                    var data = 7;

                                    function addItem() {
                                        data++;
                                        var html = "<tr data-row='" + data + "' style='background-color: #e3f1fe;'>";
                                        html +=
                                            "<td><input class='form-control item-code-input' type='text' autocomplete='off' name='datas[" +
                                            data +
                                            "][code]' style='border-color: #4c4c4c; text-align: center; border: none;'></td>";
                                        html +=
                                            "<td><select class='form-control custom-arrow' name='datas[" +
                                            data + "][unit]' style='border: none; font-weight: bold;' id='datas[" +
                                            data +
                                            "][unit]'>" +
                                            "<option value='' hidden selected></option>" +
                                            "</select></td>";
                                        html +=
                                            "<td><input class='form-control' type='text' autocomplete='off' name='datas[" +
                                            data +
                                            "][qty]' oninput='calculateTotalAmt(this)' style='border-color: #4c4c4c; text-align: center; border: none;'></td>";
                                        html +=
                                            "<td><input class='form-control' type='hidden' autocomplete='off' name='datas[" +
                                            data +
                                            "][barcode]' id='datas[" +
                                            data +
                                            "][barcode]'><input class='form-control' type='hidden' autocomplete='off' name='datas[" +
                                            data +
                                            "][item_code]' id='datas[" +
                                            data +
                                            "][item_code]'><input class='form-control item-description' type='text' autocomplete='off' id='datas[" +
                                            data +
                                            "][descript]' name='datas[" +
                                            data +
                                            "][descript]' style='border-color: #4c4c4c; text-align: center; border: none;'></td>";
                                        html +=
                                            "<td><input class='form-control' type='text' autocomplete='off' id='datas[" +
                                            data +
                                            "][unit_cost]' name='datas[" +
                                            data +
                                            "][unit_cost]' oninput='calculateTotalAmt(this)' style='border-color: #4c4c4c; text-align: center; border: none;'></td>";
                                        html +=
                                            "<td><input class='form-control' type='text' readonly autocomplete='off' id='datas[" +
                                            data +
                                            "][amt]' name='datas[" +
                                            data +
                                            "][amt]' style='border-color: #4c4c4c; text-align: center; border: none; background-color: transparent;'></td>";
                                        html += "</tr>";


                                        var newRow = $("#tbody").append(html).find('tr:last');

                                    }

                                    addItem();
                                    document.addEventListener('keydown', function(e) {
                                        if (e.key === 'Tab') {
                                            // e.preventDefault();
                                            var lastInput = document.querySelector(
                                                '#tbody tr:last-child .form-control:last-child'
                                            );
                                            if (lastInput === document.activeElement) {
                                                addItem();
                                            }
                                        }
                                    });
                                    </script>
                                    <div class="form-group text-right">
                                        <div class="row justify-content-end">
                                            <div class="col-md-3 col-xs-12">
                                                <label for="total" style="display: inline-block; margin-right: 15px;"
                                                    class="sm-label">Total</label>
                                                <input type="text" readonly="readonly" id="total" name="total"
                                                    class="form-control"
                                                    style="width: 70%; display: inline-block; text-align: center; color: blue !important;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-12">
                                                <label class="sm-label">Supplier Name</label>
                                                <input type="hidden" id="sup_id" name="sup_id">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" data-toggle="modal"
                                                        data-target="#assignSupplierModal" id="sup_code" name="sup_code"
                                                        placeholder="Select supplier" readonly="readonly"
                                                        title="Search for supplier" style="cursor: pointer;">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12">
                                                <label>&nbsp;</label>
                                                <input type="text" readonly="readonly" id="sup_name" name="sup_name"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-12" style="margin-top: -30px;">
                                                <label class="sm-label">Accounting Instruction</label>
                                                <textarea autocomplete="on" type="text" name="acct_instruct"
                                                    id="acct_instruct" class="form-control" placeholder=""></textarea>
                                            </div>
                                            <div class="col-md-6 col-xs-12" style="margin-top: -30px;">
                                                <label class="sm-label">Remarks</label>
                                                <textarea autocomplete="on" type="text" name="remark" id="remark"
                                                    class="form-control" placeholder=""></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var clearForm = document.getElementById('clearForm');
                                        clearForm.addEventListener('click', function() {
                                            event.preventDefault();
                                            checkIfEmpty();
                                        });

                                        function checkIfEmpty() {
                                            var form = document.getElementById('swaForm');
                                            var formData = new FormData(form);
                                            var isFormEmpty = Array.from(formData.values())
                                                .every(
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
                                                    document.getElementById('swaForm')
                                                        .reset();
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
                        <button type="button" class="btn btn-info waves-effect waves-light me-2" data-toggle="modal"
                            data-target="#assignSignatoriesModal">Signatories</button>
                        <button type="button" class="btn btn-info waves-effect waves-light me-2" data-toggle="modal"
                            data-target="#assignPromoDetailsModal">Promo Details</button>
                        <input type="reset" value="Clear" id="clearForm"
                            class="btn btn-secondary waves-effect waves-light me-2" data-toggle="tooltip"
                            title="Clear form">
                    </div>
                    <div class="ms-auto">
                        <button type="button" class="btn btn-default waves-effect me-2"
                            data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success waves-effect waves-light" id="saveButton">Save
                            changes</button>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>

</div>
<!-- ------------------- END OF SWA MODAL ------------------------>
<!----------------------VIEW SWA MODAL------------------------------>
<div class="modal fade" id="viewSwaFormModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Stock Withdrawal Advice Form</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">

                    <div class="row">
                        <div class="col-md-12">
                            <form role="form" method="POST" action="" enctype="multipart/form-data" id="swaForm">
                                <!-- <div class="card-body"> -->
                                <!-- <div class="form-group"> -->
                                <div class="row">
                                    <div class="col-md-4 col-xs-12">
                                        <label class="sm-label">From</label><span style="color: red;">*</span>
                                        <input type="text" readonly="readonly" id="view_loc" class="form-control">
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" autocomplete="off" class="form-control">
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <label class="sm-label">Control No.</label>
                                        <input type="text" readonly="readonly" id="view_controlno" class="form-control">
                                    </div>
                                </div>
                                <!-- </div> -->
                                <!-- <div class="form-group"> -->
                                <div class="row">
                                    <div class="col-md-4 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="text" id="" name="" class="form-control"
                                            placeholder="Others, please specify" style="display: none;">
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" autocomplete="off" class="form-control">
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <label class="sm-label">Date</label>
                                        <input type="date" id="view_docdate" name="" class="form-control">
                                    </div>

                                </div>

                                <!-- </div> -->
                                <!-- <div class="form-group"> -->
                                <div class="row">
                                    <div class="col-md-4 col-xs-12" style="margin-top: -5px;">
                                        <label class="sm-label">To</label>
                                        <input type="hidden" id="sub_id" name="sub_id">
                                        <div class="input-group">
                                            <input type="text" readonly="readonly" id="view_subcode" name=""
                                                class="form-control">
                                        </div>
                                    </div>
                                    <!-- <script>
                                    $(document).ready(function() {
                                        $(".subsidiary-input").on("click", function() {
                                            $(".assign-subsidiary-btn").trigger("click");
                                        });
                                    });
                                    </script> -->
                                    <div class="col-md-4 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" readonly="readonly" class="form-control">
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <label class="sm-label">Trans No.</label>
                                        <input type="text" id="view_transno" name="" class="form-control"
                                            readonly="readonly">
                                    </div>
                                </div>
                                <!-- </div>
                                  <div class="form-group"> -->
                                <div class="row">
                                    <div class="col-md-4 col-xs-12" style="margin-top: -25px;">
                                        <label>&nbsp;</label>
                                        <input type="text" readonly="readonly" id="view_subdescript" name=""
                                            class="form-control">
                                    </div>
                                    <div class="col-md-2 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" readonly="readonly" class="form-control">
                                    </div>
                                    <div class="col-md-2 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" readonly="readonly" class="form-control">
                                    </div>
                                    <div class="col-md-2 col-xs-12" style="margin-top: -12px;">
                                        <label class="sm-label">Per No.</label>
                                        <input type="text" readonly="readonly" id="view_perno" name=""
                                            class="form-control">
                                    </div>
                                    <div class="col-md-2 col-xs-12" style="margin-top: -12px; margin-bottom: 10px;">
                                        <label class="sm-label">CRF/CV No.</label>
                                        <input autocomplete="off" readonly="readonly" type="text" id="view_crfcvno"
                                            name="crfcv_no" class="form-control">
                                    </div>
                                </div>
                                <div class="tableContainer" style="height: auto; overflow: auto;">
                                    <table class="table table-bordered" id="" style="width: 100%;">
                                        <thead style="position: sticky; top: 0;">
                                            <tr
                                                style="text-align: center; border: 1px solid white; background-color: #6b95b0;">
                                                <th style="width: 15%">Quantity</th>
                                                <th style="width: 10%">Unit</th>
                                                <th>Description</th>
                                                <th style="width: 15%">Cost Per Unit</th>
                                                <th style="width: 15%">Amount</th>
                                                <!-- <th style="></th> -->
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyview" style="overflow-y: auto; max-height: 410px;">


                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group text-right">
                                    <div class="row">
                                        <div class="col-md-9 col-xs-12">
                                            <input type="hidden" id="" name="">
                                        </div>
                                        <div class="col-md-3 col-xs-12">
                                            <label for="total" style="display: inline-block; margin-right: 15px;"
                                                class="sm-label">Total</label>
                                            <input type="text" readonly="readonly" id="view_swatotal" name=""
                                                class="form-control"
                                                style="width: 56%; display: inline-block; text-align: center; color: blue !important;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-12">
                                            <label class="sm-label">Supplier Name </label><span
                                                style="color: red;">*</span>
                                            <input type="hidden" id="sup_id" name="sup_id">
                                            <div class="input-group">
                                                <input type="text" readonly="readonly" id="view_supcode" name=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <label>&nbsp;</label>
                                            <input type="text" readonly="readonly" id="view_supname" name=""
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12" style="margin-top: -30px;">
                                            <label class="sm-label">Accounting Instruction</label>
                                            <textarea autocomplete="on" type="text" id="view_accounting_instruct"
                                                class="form-control" placeholder=""></textarea>
                                        </div>
                                        <div class="col-md-6 col-xs-12" style="margin-top: -30px;">
                                            <label class="sm-label">Remarks</label>
                                            <textarea autocomplete="on" type="text" id="view_remark"
                                                class="form-control" placeholder=""></textarea>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-start">
                        <button type="button" class="btn btn-info waves-effect waves-light me-2 viewSignatoriesButton"
                            data-toggle="modal" data-target="#viewSignatoriesModal">Signatories</button>
                        <button type="button" class="btn btn-info waves-effect waves-light me-2 viewPromoButton"
                            data-toggle="modal" data-target="#viewPromoDetailsModal">Promo Details</button>
                        <!-- <input type="reset" value="Clear" id="clearForm"
                            class="btn btn-secondary waves-effect waves-light me-2" data-toggle="tooltip"
                            title="Clear form"> -->
                    </div>
                    <div class="ms-auto">
                        <button type="button" class="btn btn-default waves-effect me-2"
                            data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-success waves-effect waves-light" id="">Save
                            changes</button> -->
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!----------END OF VIEW SWA MODAL----------------->

</script>

<!------------------------ END OF SWA MODAL------------------>
<script>
document.addEventListener('DOMContentLoaded', function() {
    $(document).on("keypress", ".item-code-input", function(event) {
        if (event.which === 13) {
            var row = $(this).closest("tr").attr("data-row");
            var item_input = $(this).val().trim();
            var dataToSend = {};

            if (item_input.length > 0) {
                dataToSend = {
                    'item_input': item_input
                };

                $.ajax({
                    url: '<?php echo base_url() ?>AdminController/get_item',
                    type: 'POST',
                    data: dataToSend,
                    success: function(response) {
                        var itemData = response.barcodes;
                        console.log("Item Data:", itemData);

                        if (itemData.length === 0) {
                            showItemNotFoundAlert();
                        } else {
                            var latestPrices = {};

                            for (var i = 0; i < itemData.length; i++) {
                                var item = itemData[i];
                                var uom = item['Unit of Measure Code'];
                                var unitPrice = parseFloat(item['MaxUnitPrice']);
                                var startingDate = new Date(item['LatestDate']);

                                if (!latestPrices[uom] || startingDate >
                                    latestPrices[
                                        uom]
                                    .startingDate) {
                                    latestPrices[uom] = {
                                        unitPrice: unitPrice,
                                        startingDate: startingDate,
                                        item: item
                                    };
                                }
                            }

                            var uomOptions = Object.keys(latestPrices);
                            console.log("Unique UOM Types with Latest Prices:",
                                uomOptions);

                            var dropdown = $("#datas\\[" + row + "\\]\\[unit\\]");
                            dropdown.empty();
                            dropdown.append($('<option>', {
                                value: '',
                                text: 'Select UOM',
                                selected: true,
                                hidden: true
                            }));

                            uomOptions.forEach(function(uom) {
                                dropdown.append($('<option>', {
                                    value: uom,
                                    text: uom,
                                    'data-price': latestPrices[
                                            uom]
                                        .unitPrice.toFixed(2)
                                }));
                            });

                            var selectedItem = latestPrices[uomOptions[0]].item;
                            var itemCode = selectedItem['Item No_'];
                            var itemBarCode = selectedItem['Barcode No_'];
                            var itemDescription = selectedItem['Description'];

                            $("#datas\\[" + row + "\\]\\[item_code\\]").val(
                                itemCode);
                            $("#datas\\[" + row + "\\]\\[barcode\\]").val(
                                itemBarCode);
                            $("#datas\\[" + row + "\\]\\[descript\\]").val(
                                itemDescription);
                            $("#datas\\[" + row + "\\]\\[unit_cost\\]").val('');

                            dropdown.off('change').on('change', function() {
                                var selectedUOM = $(this).val();
                                if (selectedUOM) {
                                    var selectedPrice = $(this).find(
                                        'option:selected').data('price');
                                    $("#datas\\[" + row +
                                            "\\]\\[unit_cost\\]")
                                        .val(
                                            selectedPrice);
                                } else {
                                    $("#datas\\[" + row +
                                            "\\]\\[unit_cost\\]")
                                        .val(
                                            '');
                                }
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        showItemNotFoundAlert();
                        console.error("AJAX Error:", error);
                        console.log("Response:", xhr.responseText);
                    }
                });
            } else {
                showItemNotFoundAlert();
                $("#datas\\[" + row + "\\]\\[item_code\\]").val('');
                $("#datas\\[" + row + "\\]\\[barcode\\]").val('');
                $("#datas\\[" + row + "\\]\\[descript\\]").val('');
                $("#datas\\[" + row + "\\]\\[unit_cost\\]").val('');
            }
        }
    });


    function showItemNotFoundAlert() {
        // console.log("showItemNotFoundAlert() function called");
        Swal.fire({
            title: 'Item not found',
            text: 'No item found for the entered code or barcode',
            icon: 'info',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        });
    }

    var saveButton = document.getElementById('saveButton');
    var swaForm = document.getElementById('swaForm');

    saveButton.addEventListener('click', function() {
        event.preventDefault();
        checkIfFormEmpty();
    });

    function checkIfFormEmpty() {
        var formData = new FormData(swaForm);
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
        var formData = new FormData(swaForm);
        $.ajax({
            url: '<?php echo base_url() ?>SwaController/new_swa',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                if (response.status === 'success') {
                    showSuccessAlert(response.message, response.swaId);
                } else {
                    showErrorAlert(response.message);
                }
            },
            error: function(error) {
                console.error(error);
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
                var pdfUrl = '<?php echo base_url() ?>SwaController/printSwa/' + recordId;
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
            location.reload();
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
        "req_date": getCurrentDate(),
        "rev_date": getCurrentDate(),
        "app_date": getCurrentDate(),
        "rel_date": getCurrentDate(),
        "rec_date": getCurrentDate()
    };

    for (const inputId in dateInputs) {
        if (dateInputs.hasOwnProperty(inputId)) {
            const inputElement = document.getElementById(inputId);
            if (inputElement) {
                inputElement.value = dateInputs[inputId];
            }
        }
    }
});
</script>
<!----------------------------------------      SUBSIDIARY MODAL         ------------------------------------>
<div class="modal fade" id="assignSubsidiaryModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Subsidiary</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form role="form" method="POST" action="" enctype="multipart/form-data" id="swaForm">
                        <!-- <div class="form-group">
                        <input type="text" class="form-control" id="searchSubsidiary" placeholder="Search Subsidiary">
                    </div> -->
                        <div class="table-responsive">
                            <table id="subsidiary-select-table" class="table table-hover m-b-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php  
                                    $count = 1;
                                    $this->db->order_by('creation_date', 'ASC');
                                    $subsidiary = $this->db->get('sub_tbl')->result_array();
                                    foreach ($subsidiary as $row):
                                    ?>
                                    <tr class="select-subsidiary">
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $row['CODE']; ?></td>
                                        <td><?php echo $row['DESCRIPTION']; ?></td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="subsidiary-checkbox"
                                                    value="<?php echo $row['ID']; ?>"
                                                    id="subsidiary_<?php echo $row['ID']; ?>">
                                                <label class="form-check-label"
                                                    for="subsidiary_<?php echo $row['ID']; ?>"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php  
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
//MODAL-----------------------------------------

$(document).ready(function() {

    $('#subsidiary-select-table').DataTable({
        lengthChange: false,
        language: {
            search: '',
            searchPlaceholder: 'Search...'
        }
    });
    $(document).on('change', '.subsidiary-checkbox', function() {
        if ($(this).is(":checked")) {
            updateModalValues($(this));
            $(".subsidiary-checkbox").not(this).prop('checked', false);
        } else {
            resetModalValues();
        }
    }); -
    $(document).on('click', '.select-subsidiary', function() {
        if (!$(event.target).is(":checkbox")) {
            var checkbox = $(this).find('.subsidiary-checkbox');
            checkbox.prop('checked', !checkbox.prop('checked')).change();
        }
    });

    function updateModalValues(checkbox) {
        var selectedId = checkbox.val();
        var selectedCode = checkbox.closest("tr").find("td:nth-child(2)").text();
        var selectedDescription = checkbox.closest("tr").find("td:nth-child(3)").text();

        $("#sub_id").val(selectedId);
        $("#sub_code").val(selectedCode);
        $("#sub_descript").val(selectedDescription);
    }

    function resetModalValues() {
        $("#sub_id").val("");
        $("#sub_code").val("");
        $("#sub_descript").val("");
    }
});
</script>
<!-- -------------------------------     SUPPLIER MODAL     --------------------------------------  -->
<div class="modal fade" id="assignSupplierModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Supplier</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form method="POST" action="<?php echo base_url() ?>#" enctype="multipart/form-data">
                        <!-- <div class="form-group">
                        <input type="text" class="form-control" id="searchSupplier" placeholder="Search Supplier">
                    </div> -->
                        <div class="table-responsive">
                            <table class="table table-hover m-b-0" id="supplier-select-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Supplier Name</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                    $count = 1;
                                    $this->db->order_by('creation_date', 'ASC');
                                    $supplier = $this->db->get('sup_tbl')->result_array();
                                    foreach ($supplier as $row):
                                    ?>
                                    <tr class="select-supplier">
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $row['CODE']; ?></td>
                                        <td><?php echo $row['NAME']; ?></td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input supplier-checkbox"
                                                    value="<?php echo $row['ID']; ?>"
                                                    id="supplier_<?php echo $row['ID']; ?>">
                                                <label class="form-check-label"
                                                    for="supplier_<?php echo $row['ID']; ?>"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php  
                                    endforeach;
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--------------------------     SIGNATORIES MODAL     ---------------------------------------->
<div class="modal fade" id="assignSignatoriesModal" tabindex="-1" role="dialog"
    aria-labelledby="assignSignatoriesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="assignSignatoriesModalLabel">Signatories</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <div class="form-group">
                        <label class="sm-label">Requested by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="req_by" id="req_by"
                            class="form-control" placeholder="Requested by">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="req_date" id="req_date"
                            class="form-control" placeholder="Date">
                    </div>
                    <div class="form-group">
                        <label class="sm-label">Reviewed by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="rev_by" id="rev_by"
                            class="form-control" placeholder="Reviewed by">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="rev_date" id="rev_date"
                            class="form-control" placeholder="Date">
                    </div>
                    <div class="form-group">
                        <label class="sm-label">Approved by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="app_by" id="app_by"
                            class="form-control" placeholder="Approved by">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="app_date" id="app_date"
                            class="form-control" placeholder="Date">
                    </div>
                    <div class="form-group">
                        <label class="sm-label">Released by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="rel_by" id="rel_by"
                            class="form-control" placeholder="Released by">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="rel_date" id="rel_date"
                            class="form-control" placeholder="Date">
                    </div>
                    <div class="form-group">
                        <label class="sm-label">Received by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="rec_by" id="rec_by"
                            class="form-control" placeholder="Received by">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="rec_date" id="rec_date"
                            class="form-control" placeholder="Date">
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="saveSignatoriesValues" data-dismiss="modal" class="btn btn-success"
                            style="width: 100px;">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--------------------------     SIGNATORIES MODAL     ---------------------------------------->
<div class="modal fade" id="viewSignatoriesModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Signatories</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <div class="form-group">
                        <label class="sm-label">Requested by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="" id="vew_reqby"
                            class="form-control" placeholder="Requested by">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="" id="view_reqdate"
                            class="form-control" placeholder="Date">
                    </div>
                    <div class="form-group">
                        <label class="sm-label">Reviewed by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="" id="view_revby"
                            class="form-control" placeholder="Reviewed by">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="" id="view_revdate"
                            class="form-control" placeholder="Date">
                    </div>
                    <div class="form-group">
                        <label class="sm-label">Approved by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="" id="view_appby"
                            class="form-control" placeholder="Approved by">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="" id="view_appdate"
                            class="form-control" placeholder="Date">
                    </div>
                    <div class="form-group">
                        <label class="sm-label">Released by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="" id="view_relby"
                            class="form-control" placeholder="Released by">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="" id="view_reldate"
                            class="form-control" placeholder="Date">
                    </div>
                    <div class="form-group">
                        <label class="sm-label">Received by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="" id="view_recby"
                            class="form-control" placeholder="Received by">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="" id="view_recdate"
                            class="form-control" placeholder="Date">
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="" data-dismiss="modal"
                            class="btn btn-default waves-effect">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------   PROMO DETAIL MODAL  ---------------------------------------->
<div class="modal fade" id="assignPromoDetailsModal" tabindex="-1" role="dialog"
    aria-labelledby="assignPromoDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="assignPromoDetailsModalLabel">Promo Details</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <div class="form-group">
                        <label class="sm-label">Promo Title</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="promo_title" id="promo_title"
                            class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label class="sm-label">Promo Mechanics</label>
                        <textarea autocomplete="on" value="<?php ?>" type="text" name="promo_mechanics"
                            id="promo_mechanics" class="form-control" placeholder=""></textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="sm-label">Promo Period</label>
                                <input autocomplete="off" value="<?php ?>" type="date" name="promo_start"
                                    id="promo_start" class="form-control" placeholder="from">
                            </div>
                            <div class="col-md-6">
                                <label>&nbsp;</label>
                                <input autocomplete="off" value="<?php ?>" type="date" name="promo_end" id="promo_end"
                                    class="form-control" placeholder="to">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="savePDValues" data-dismiss="modal" class="btn btn-success"
                            style="width: 100px;">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--------------------------------------   VIEW PROMO DETAIL MODAL  ---------------------------------------->
<div class="modal fade" id="viewPromoDetailsModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="">Promo Details</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <div class="form-group">
                        <label class="sm-label">Promo Title</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="" id="view_promotitle"
                            class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label class="sm-label">Promo Mechanics</label>
                        <textarea autocomplete="on" value="<?php ?>" type="text" name="" id="view_promomechanics"
                            class="form-control" placeholder=""></textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="sm-label">Promo Period</label>
                                <input autocomplete="off" value="<?php ?>" type="date" name="" id="view_promostart"
                                    class="form-control" placeholder="from">
                            </div>
                            <div class="col-md-6">
                                <label>&nbsp;</label>
                                <input autocomplete="off" value="<?php ?>" type="date" name="" id="view_promoend"
                                    class="form-control" placeholder="to">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="" data-dismiss="modal"
                            class="btn btn-default waves-effect">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $(document).on('click', '.viewSwaButton', function() {

        var swaId = $(this).data('swa-id');

        $.ajax({
            url: '<?php echo base_url() ?>SwaController/view_swa_form/' + swaId,
            type: 'GET',
            data: {
                'swa_id': swaId
            },
            success: function(response) {
                var response = JSON.parse(response);
                var swaData = response.data;
                console.log(swaData);

                var fields = {
                    'SWA_ID': 'view_controlno',
                    'SUB_CODE': 'view_subcode',
                    'DESCRIPTION': 'view_subdescript',
                    'DOCUMENT_DATE': 'view_docdate',
                    'SUP_CODE': 'view_supcode',
                    'NAME': 'view_supname',
                    'LOCATION': 'view_loc',
                    'SWA_TOTAL': 'view_swatotal',
                    'SWA_ACCOUNTING_INSTRUCT': 'view_accounting_instruct',
                    'SWA_REMARK': 'view_remark',
                    'SWA_PER_NO': 'view_perno',
                    'SWA_CRFCV_NO': 'view_crfcvno'
                };
                console.log(swaData.SWA_CRFCV_NO);
                $.each(fields, function(key, value) {

                    var fieldValue = swaData[key];
                    if (key === 'SWA_TOTAL') {
                        fieldValue = parseFloat(fieldValue).toFixed(2);
                    }

                    $("#" + value).val(fieldValue);
                });
                if (swaData.SWA_TRANS_NO3) {
                    $('#view_transno').val(swaData.SWA_TRANS_NO3);
                } else if (swaData.SWA_TRANS_NO2) {
                    $('#view_transno').val(swaData.SWA_TRANS_NO2);
                } else {
                    $('#view_transno').val(swaData.SWA_TRANS_NO1);
                }

                $(document).on('click', '.viewSignatoriesButton', function() {
                    populateSignatories(swaId);
                });

                $(document).on('click', '.viewPromoButton', function() {
                    populatePromoDetails(swaId);
                });

                populateTable(swaId);
            },
            error: function(error) {
                console.error("Error:", error);
            }
        });


    });

    function populateSignatories(swaId) {
        $.ajax({
            url: '<?php echo base_url() ?>SwaController/get_swa_signatories/' + swaId,
            type: 'GET',
            data: {
                'swa_id': swaId
            },
            success: function(response) {
                var response = JSON.parse(response);
                var signatoriesData = response.data;
                console.log(signatoriesData);

                var fields = {
                    'SWA_REQUEST_BY': 'vew_reqby',
                    'SWA_REQUEST_BY_DATE': 'vew_reqdate',
                    'SWA_REVIEW_BY': 'view_revby',
                    'SWA_REVIEW_BY_DATE': 'view_revdate',
                    'SWA_APPROVE_BY': 'view_appby',
                    'SWA_APPROVE_BY_DATE': 'view_appdate',
                    'SWA_RELEASE_BY': 'view_relby',
                    'SWA_RELEASE_BY_DATE': 'view_reldate',
                    'SWA_RECEIVE_BY': 'view_recby',
                    'SWA_RECEIVE_BY_DATE': 'view_recdate'
                };

                $.each(fields, function(key, value) {
                    $("#" + value).val(signatoriesData[key]);
                });
            },
            error: function(error) {
                console.error("Error:", error);
            }
        });
    }

    function populatePromoDetails(swaId) {

        $.ajax({
            url: '<?php echo base_url() ?>SwaController/get_promo/' + swaId,
            type: 'GET',
            data: {
                'swa_id': swaId
            },
            success: function(response) {
                var response = JSON.parse(response);
                var promoData = response.data;
                console.log(promoData);

                var fields = {
                    'SWA_PROMO_TITLE': 'view_promotitle',
                    'SWA_PROMO_MECHANICS': 'view_promomechanics',
                    'SWA_PROMO_START': 'view_promostart',
                    'SWA_PROMO_END': 'view_promoend'
                };

                $.each(fields, function(key, value) {
                    $("#" + value).val(promoData[key]);
                });
            },
            error: function(error) {
                console.error("Error:", error);
            }
        });

    }

    function populateTable(swaId) {
        $.ajax({
            url: '<?php echo base_url() ?>SwaController/get_swa_details/' + swaId,
            type: 'GET',
            data: {
                'swa_id': swaId
            },
            success: function(response) {
                var response = JSON.parse(response);
                var swaDetailsData = response.data;
                console.log(swaDetailsData);
                $("#tbodyview").html("");

                for (var i = 0; i < swaDetailsData.length; i++) {
                    console.log("Item total in should be:", swaDetailsData[i].SWA_ITEM_CODE);
                    var newRow = $('<tr style="text-align: left; background-color: #e3f1fe;">');
                    newRow.append(
                        '<td><input class="form-control" type="text" value="' + swaDetailsData[
                            i].SWA_QUANTITY +
                        '" style="border-color: #4c4c4c; border: none;" ></td>'
                    );
                    newRow.append(
                        '<td><input class="form-control" type="text" value="' + swaDetailsData[
                            i].SWA_UNIT +
                        '" style="border-color: #4c4c4c; border: none;"></td>'
                    );
                    newRow.append(
                        '<td><input class="form-control" type="text" value="' + swaDetailsData[
                            i].SWA_ITEM_CODE +
                        ' ' + swaDetailsData[
                            i].SWA_DESCRIPTION +
                        '" style="border-color: #4c4c4c; border: none;" ></td>'
                    );
                    newRow.append(
                        '<td><input class="form-control" type="text" value="' + swaDetailsData[
                            i].SWA_UNIT_COST +
                        '" style="border-color: #4c4c4c; border: none;" ></td>'
                    );
                    newRow.append(
                        '<td><input class="form-control" type="text" value="' + swaDetailsData[
                            i].SWA_AMOUNT +
                        '" style="border-color: #4c4c4c; border: none;" ></td></tr>'
                    );

                    $("#tbodyview").append(newRow);
                }
            },
            error: function(error) {
                console.error("Error fetching swa_details_tbl:", error);
            }
        });
    }

    $(document).on('change', '.supplier-checkbox', function() {
        $(".supplier-checkbox").not(this).prop("checked", false);
        if ($(this).is(":checked")) {
            updateSupplierModalValues($(this));
        } else {
            resetSupplierModalValues();
        }
    });

    $(document).on('click', '.select-supplier', function() {
        if (!$(event.target).is(":checkbox")) {
            var checkbox = $(this).find('.supplier-checkbox');
            checkbox.prop('checked', !checkbox.prop('checked')).change();
        }
    });

    function updateSupplierModalValues(checkbox) {
        var selectedId = checkbox.val();
        var selectedCode = checkbox.closest("tr").find("td:nth-child(2)").text();
        var selectedSupplierName = checkbox.closest("tr").find("td:nth-child(3)").text();

        $("#sup_id").val(selectedId);
        $("#sup_code").val(selectedCode);
        $("#sup_name").val(selectedSupplierName);
    }

    function resetSupplierModalValues() {
        $("#sup_id").val("");
        $("#sup_code").val("");
        $("#sup_name").val("");
    }

    $('#savePDValues').on('click', function() {
        var promoTitleValue = $('#promo_title').val();
        var promoMechanicsValue = $('#promo_mechanics').val();
        var promoStartValue = $('#promo_start').val();
        var promoEndValue = $('#promo_end').val();
        $('#swaForm').append('<input type="hidden" name="promo_title" value="' +
            promoTitleValue +
            '">');
        $('#swaForm').append('<input type="hidden" name="promo_mechanics" value="' +
            promoMechanicsValue + '">');
        $('#swaForm').append('<input type="hidden" name="promo_start" value="' +
            promoStartValue +
            '">');
        $('#swaForm').append('<input type="hidden" name="promo_end" value="' +
            promoEndValue + '">');
    });

    $('#saveSignatoriesValues').on('click', function() {
        var reqByValue = $('#req_by').val();
        var reqDateValue = $('#req_date').val();
        var revByValue = $('#rev_by').val();
        var revDateValue = $('#rev_date').val();
        var appByValue = $('#app_by').val();
        var appDateValue = $('#app_date').val();
        var relByValue = $('#rel_by').val();
        var relDateValue = $('#rel_date').val();
        var recByValue = $('#rec_by').val();
        var recDateValue = $('#rec_date').val();

        if (reqByValue) {
            $('#swaForm').append('<input type="hidden" name="req_by" value="' +
                reqByValue +
                '">');
        }
        if (reqDateValue && reqByValue) {
            $('#swaForm').append('<input type="hidden" name="req_date" value="' +
                reqDateValue + '">');
        }
        if (revByValue) {
            $('#swaForm').append('<input type="hidden" name="rev_by" value="' +
                revByValue +
                '">');
        }
        if (revDateValue && revByValue) {
            $('#swaForm').append('<input type="hidden" name="rev_date" value="' +
                revDateValue + '">');
        }
        if (appByValue) {
            $('#swaForm').append('<input type="hidden" name="app_by" value="' +
                appByValue +
                '">');
        }
        if (appDateValue && appByValue) {
            $('#swaForm').append('<input type="hidden" name="app_date" value="' +
                appDateValue + '">');
        }
        if (relByValue) {
            $('#swaForm').append('<input type="hidden" name="rel_by" value="' +
                relByValue +
                '">');
        }
        if (relDateValue && relByValue) {
            $('#swaForm').append('<input type="hidden" name="rel_date" value="' +
                relDateValue + '">');
        }
        if (recByValue) {
            $('#swaForm').append('<input type="hidden" name="rec_by" value="' +
                recByValue +
                '">');
        }
        if (recDateValue && recByValue) {
            $('#swaForm').append('<input type="hidden" name="rec_date" value="' +
                recDateValue + '">');
        }
    });
    $('#swatable').DataTable({
        lengthChange: false,
        language: {
            search: '',
            searchPlaceholder: 'Search...'
        }
    });
    $('#supplier-select-table').DataTable({
        lengthChange: false,
        language: {
            search: '',
            searchPlaceholder: 'Search...'
        }
    });

    $('.dataTables_filter input[type="search"]').css({
        'width': '300px',
        'margin-right': '10px',
        'padding': '5px',
        'box-sizing': 'border-box'
    });
});
</script>