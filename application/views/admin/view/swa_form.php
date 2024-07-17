<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-inbox bg-c-yellow"></i>
                    <div class="d-inline">
                        <h5>SWA Form</h5>
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
                        <li class="breadcrumb-item"><a href="#!">New SWA</a>
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
                                    <h5>New SWA</h5>
                                </div>
                                <div class="card-block">
                                <div class="row">
                        <div class="col-md-12">
                            <form role="form" method="POST" action="" enctype="multipart/form-data"
                                id="swaForm">
                                <!-- <div class="card-body"> -->
                                <!-- <div class="form-group"> -->
                                <div class="row">
                                    <div class="col-md-4 col-xs-12">
                                        <label>From</label><span style="color: red;">*</span>
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
                                        <label>Control No.</label>
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
                                            placeholder="Others, please specify"
                                            style="display: none;">
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" autocomplete="off" class="form-control">
                                    </div>
                                    <div class="col-md-4 col-xs-12">
                                        <label>Date</label>
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

                                function handleLocChange() {
                                    var locSelect = document.getElementById("loc");
                                    var otherDetailsInput = document.getElementById("otherDetails");

                                    if (locSelect.value === "Others") {
                                        otherDetailsInput.style.display = "block";
                                    } else {
                                        otherDetailsInput.style.display = "none";
                                        otherDetailsInput.value = "";
                                    }
                                }
                                </script>
                                <!-- </div> -->
                                <!-- <div class="form-group"> -->
                                <div class="row">
                                    <div class="col-md-4 col-xs-12">
                                        <label>To</label><span style="color: red;">*</span><span
                                            style="font-style: italic;"> (Click to select
                                            subsidiary)</span>
                                        <input type="hidden" id="sub_id" name="sub_id">
                                        <div class="input-group">
                                            <input type="text" class="form-control" data-toggle="modal"
                                                data-target="#assignSubsidiaryModal" readonly="readonly" id="sub_code"
                                                name="sub_code" placeholder="Subsidiary" data-toggle="tooltip"
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
                                        <label>Trans No.</label>
                                        <input type="text" id="trans_no" name="trans_no" class="form-control" disabled>
                                    </div>
                                </div>
                                <!-- </div>
                                  <div class="form-group"> -->
                                <div class="row">
                                    <div class="col-md-4 col-xs-12">
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
                                    <div class="col-md-2 col-xs-12">
                                        <label>Per No.</label>
                                        <input type="text" readonly="readonly" id="per_no" name="per_no"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-2 col-xs-12">
                                        <label>CRF/CV No.</label>
                                        <input autocomplete="off" readonly="readonly" type="text" id="crfcv_no"
                                            name="crfcv_no" class="form-control">
                                    </div>
                                </div>
                                <!-- </div> -->
                                <hr class="rounded">
                                <div class="text-right">
                                    <button class="btn btn-sm btn-dark btn-flat" type="button" onclick="addItem();"
                                        data-toggle="tooltip" title="Add row"
                                        style="color: #000; background-color: transparent; border-color: #fff;">
                                        <i class="nav-icon fa fa-plus"></i></button>
                                </div>
                                <span style="font-style: italic;">Enter the item code or barcode</span><span
                                    style="color: red;">*</span>
                                <div class="tableContainer" style="height: 400px; overflow: auto;">
                                    <table class="table table-bordered" id="" style="width: 100%;">
                                        <thead style="position: sticky; top: 0;">
                                            <tr
                                                style="text-align: center; border: 1px solid white; background-color: white;">
                                                <th style="width: 13%;">Code</th>
                                                <th style="width: 10%;">Unit</th>
                                                <th style="width: 10%;">Quantity</th>
                                                <th style="width: 44%;">Description</th>
                                                <th style="width: 13%;">Cost Per Unit</th>
                                                <th style="width: 13%;">Amount</th>
                                                <!-- <th style="></th> -->
                                            </tr>
                                        </thead>
                                        <tbody id="tbody" style="overflow-y: auto; max-height: 410px;">
                                            <?php for ($data = 0; $data < 8; $data++) { ?>
                                            <tr data-row="<?php echo $data; ?>"
                                                style="transition: background-color 0.3s ease; cursor: pointer;"
                                                onmouseover="this.style.backgroundColor='white';"
                                                onmouseout="this.style.backgroundColor='';">
                                                <td style="padding: 1px;">
                                                    <input class="form-control item-code-input" type="text"
                                                        name="datas[<?php echo $data;?>][code]" autocomplete="off"
                                                        style="text-align: center; border-color: #4c4c4c; border: none;">
                                                </td>
                                                <td style="padding: 1px;">
                                                    <select class="form-control custom-arrow"
                                                        name="datas[<?php echo $data; ?>][unit]" style="border: none;"
                                                        id="datas[<?php echo $data; ?>][unit]">
                                                        <option value="" hidden selected></option>
                                                    </select>
                                                </td>
                                                <td style="padding: 1px;">
                                                    <input class="form-control" type="text"
                                                        name="datas[<?php echo $data; ?>][qty]" autocomplete="off"
                                                        oninput="calculateTotalAmt(this)"
                                                        style="text-align: center; border-color: #4c4c4c; border: none;">
                                                </td>
                                                <td style="padding: 1px;">
                                                    <input class="form-control" type="hidden"
                                                        name="datas[<?php echo $data;?>][barcode]" autocomplete="off"
                                                        id="datas[<?php echo $data;?>][barcode]">
                                                    <input class="form-control" type="hidden"
                                                        name="datas[<?php echo $data;?>][item_code]" autocomplete="off"
                                                        id="datas[<?php echo $data;?>][item_code]">
                                                    <input class="form-control" type="text"
                                                        id="datas[<?php echo $data; ?>][descript]"
                                                        name="datas[<?php echo $data; ?>][descript]" autocomplete="off"
                                                        style="text-align: center; border-color: #4c4c4c; border: none;">
                                                </td>
                                                <td style="padding: 1px;">
                                                    <input class="form-control" type="text"
                                                        id="datas[<?php echo $data; ?>][unit_cost]"
                                                        name="datas[<?php echo $data; ?>][unit_cost]" autocomplete="off"
                                                        oninput="calculateTotalAmt(this)"
                                                        style="text-align: center; border-color: #4c4c4c; border: none;">
                                                </td>

                                                <td style="padding: 1px;">
                                                    <input class="form-control" type="text"
                                                        name="datas[<?php echo $data; ?>][amt]" value="" readonly
                                                        autocomplete="off"
                                                        style=" text-align: center; border-color: #4c4c4c; border: none; background-color: transparent;">
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <script>
                                            function calculateTotalAmt(inputField) {
                                                var rowIndex = inputField.closest("tr").rowIndex - 1;
                                                var qtyInput = document.getElementsByName("datas[" + rowIndex +
                                                    "][qty]")[0];
                                                var unitCostInput = document.getElementsByName("datas[" + rowIndex +
                                                    "][unit_cost]")[0];
                                                var amtInput = document.getElementsByName("datas[" + rowIndex +
                                                    "][amt]")[0];

                                                var qty = parseFloat(qtyInput.value) || 0;
                                                var unitCost = parseFloat(unitCostInput.value) || 0;

                                                if (qty && unitCost) {
                                                    var total = qty * unitCost;
                                                    amtInput.value = total.toFixed(2);

                                                    calculateGrandTotal();
                                                } else {
                                                    amtInput.value = "";
                                                    calculateGrandTotal();
                                                }
                                            }

                                            function calculateGrandTotal() {
                                                var totalSum = 0;

                                                for (var i = 0; i <= data; i++) {
                                                    var amtInput = document.getElementsByName("datas[" + i + "][amt]")[
                                                        0];
                                                    var amtValue = parseFloat(amtInput.value) || 0;
                                                    totalSum += amtValue;
                                                }
                                                document.getElementById("total").value = totalSum.toFixed(2);
                                            }
                                            </script>
                                        </tbody>
                                    </table>
                                </div>
                                <script>
                                var data = 7;

                                function addItem() {
                                    data++;
                                    var html = "<tr data-row='" + data + "'>";
                                    html +=
                                        "<td style='padding: 1px;'><input class='form-control item-code-input' type='text' autocomplete='off' name='datas[" +
                                        data +
                                        "][code]' style='border-color: #4c4c4c; text-align: center; center; border: none;'></td>";
                                    html +=
                                        "<td style='padding: 1px;'><select class='form-control custom-arrow' name='datas[" +
                                        data + "][unit]' style='border: none;' id='datas[" + data + "][unit]'>" +
                                        "<option value='' hidden selected></option>" +
                                        "</select></td>";
                                    html +=
                                        "<td style='padding: 1px;'><input class='form-control' type='text' autocomplete='off' name='datas[" +
                                        data +
                                        "][qty]' oninput='calculateTotalAmt(this)' style='border-color: #4c4c4c; text-align: center; center; border: none;'></td>";
                                    html +=
                                        "<td style='padding: 1px;'><input class='form-control' type='hidden' autocomplete='off' name='datas[" +
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
                                        "][descript]' style='border-color: #4c4c4c; text-align: center; center; border: none;'></td>";
                                    html +=
                                        "<td style='padding: 1px;'><input class='form-control' type='text' autocomplete='off' id='datas[" +
                                        data +
                                        "][unit_cost]' name='datas[" +
                                        data +
                                        "][unit_cost]' oninput='calculateTotalAmt(this)' style='border-color: #4c4c4c; text-align: center; center; border: none;'></td>";
                                    html +=
                                        "<td style='padding: 1px;'><input class='form-control' type='text' readonly autocomplete='off' name='datas[" +
                                        data +
                                        "][amt]' style='border-color: #4c4c4c; text-align: center; center; border: none; background-color: transparent;'></td>";
                                    html += "</tr>";


                                    var newRow = $("#tbody").append(html).find('tr:last');

                                }

                                addItem();
                                document.addEventListener('keydown', function(e) {
                                    if (e.key === 'Tab') {
                                        // e.preventDefault();
                                        var lastInput = document.querySelector(
                                            '#tbody tr:last-child .form-control:last-child');
                                        if (lastInput === document.activeElement) {
                                            addItem();
                                        }
                                    }
                                });
                                </script>
                                <div class="form-group text-right">
                                    <div class="row">
                                        <div class="col-md-9 col-xs-12">
                                            <input type="hidden" id="" name="">
                                        </div>
                                        <div class="col-md-3 col-xs-12">
                                            <label for="total"
                                                style="display: inline-block; margin-right: 15px;">Total</label>
                                            <input type="text" readonly="readonly" id="total" name="total"
                                                class="form-control"
                                                style="width: 56%; display: inline-block; text-align: center; color: blue !important;">
                                        </div>
                                    </div>
                                </div>
                                <hr class="rounded">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-12">
                                            <label>Supplier Name </label><span style="color: red;">*</span><span
                                                style="font-style: italic;"> (Click to
                                                select supplier)</span>
                                            <input type="hidden" id="sup_id" name="sup_id">
                                            <div class="input-group">
                                                <input type="text" class="form-control" data-toggle="modal"
                                                    data-target="#assignSupplierModal" id="sup_code" name="sup_code"
                                                    placeholder="Supplier" readonly="readonly" data-toggle="tooltip"
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
                                        <div class="col-md-6 col-xs-12">
                                            <label>Accounting Instruction</label>
                                            <textarea autocomplete="on" type="text" name="acct_instruct"
                                                id="acct_instruct" class="form-control" placeholder=""></textarea>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <label>Remarks</label>
                                            <textarea autocomplete="on" type="text" name="remark" id="remark"
                                                class="form-control" placeholder=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 text-left">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#assignSignatoriesModal">Signatories</button>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#assignPromoDetailsModal">Promo
                                                Details</button>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <!-- <a href="<?php #echo base_url() ?>admin/printPdf" target="_blank">
                                                <button type="button" id="swaPrintButton" class="btn btn-sm btn-info"
                                                    style="width: 150px; margin-right: 8px; font-size: 15px;">Print</button>
                                            </a> -->
                                            <!-- <script>
                                          document.addEventListener('DOMContentLoaded', function () {
                                              var swaPrintButton = document.getElementById('swaPrintButton');
                                              var swaForm = document.getElementById('swaForm');

                                              swaPrintButton.addEventListener('click', function () {
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
                                                      window.print();
                                                  }
                                              }
                                          });
                                      </script> -->
                                            <input type="reset" value="Clear" id="clearForm"
                                                class="btn btn-sm btn-secondary" data-toggle="tooltip"
                                                title="Clear form" style="width: 150px; margin-right: 8px;">
                                            <button type="button" id="saveButton" class="btn btn-sm btn-success"
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
                                    var form = document.getElementById('swaForm');
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
                                            document.getElementById('swaForm').reset();
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

                            <!-- -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>