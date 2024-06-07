<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-inbox bg-c-blue"></i>
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
                                    <h5>SWA List</h5>
                                    <button type="button" class="btn btn-primary waves-effect md-trigger" data-bs-toggle="modal" data-bs-target="#swaFormModal">Add New SWA</button>

                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table id="scr-vtr-dynamic" class="table table-hover m-b-0">
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
        <div id="styleSelector">
        </div>
    </div>
</div>
<!--------------------------- SWA MODAL-------------------------->
<div class="modal fade" id="swaFormModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Stock Withdrawal Advice Form</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-12">
                            <form role="form" method="POST" action="" enctype="multipart/form-data" id="swaForm">
                                <!-- <div class="card-body"> -->
                                <!-- <div class="form-group"> -->
                                <div class="mb-3 row">
                                    <label class="form-label col-sm-2 col-form-label">From</label>
                                    <?php  
                                                $location = $this->db->get('location_tbl')->result_array();
                                                ?>
                                    <div class="col-sm-5">
                                        <select class="form-control hide-select" name="loc" id="loc"
                                            onchange="handleLocChange()">
                                            <option value="" hidden selected></option>
                                            <?php  foreach ($location as $loc): ?>
                                            <option><?php echo $loc['LOCATION'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" id="otherDetails" name="otherDetails" class="form-control"
                                            placeholder="Others, please specify" style="display: none;">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="form-label col-sm-2 col-form-label">Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" id="document_date" name="document_date" class="form-control">
                                    </div>
                                </div>
                                <!-- </div> -->
                                <!-- <div class="form-group"> -->


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

                                function handleLocChange() {
                                    var locSelect = document.getElementById("loc");
                                    var otherDetailsInput = document.getElementById(
                                        "otherDetails");

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
                                <div class="mb-3 row">
                                    <input type="hidden" id="sub_id" name="sub_id">
                                    <label class="form-label col-sm-2 col-form-label">To</label>
                                    <!-- <span style="color: red;">*</span> -->
                                    <!-- <span style="font-style: italic;"> (Click to select
                                            subsidiary)</span> -->
                                    <div class="col-sm-5">
                                        <div class="input-group">
                                            <input type="text" class="form-control" data-bs-toggle="modal"
                                                data-bs-target="#assignSubsidiaryModal" readonly="readonly" id="sub_code"
                                                name="sub_code" placeholder="Subsidiary" data-bs-toggle="tooltip"
                                                title="Search for subsidiary" style="cursor: pointer;">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" readonly="readonly" id="sub_descript" name="sub_descript"
                                            class="form-control">
                                    </div>
                                </div>

                                <!-- </div> -->
                                <div class="text-right" style="text-align: right;">
                                    <button class="btn btn-sm btn-dark btn-flat" type="button" onclick="addItem();"
                                        data-bs-toggle="tooltip" title="Add row"
                                        style="color: #000; background-color: transparent; border-color: #fff;">
                                        <i class="nav-icon fa fa-plus"></i></button>
                                </div>
                                <span style="font-style: italic;">Enter the item code or
                                    barcode</span><span style="color: red;">*</span>
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
                                                <td style="padding: 2px;">
                                                    <input class="form-control item-code-input" type="text"
                                                        name="datas[<?php echo $data;?>][code]" autocomplete="off"
                                                        style="text-align: center; border-color: #4c4c4c; border: none;">
                                                </td>
                                                <td style="padding: 2px;">
                                                    <select class="form-control custom-arrow"
                                                        name="datas[<?php echo $data; ?>][unit]" style="border: none;"
                                                        id="datas[<?php echo $data; ?>][unit]">
                                                        <option value="" hidden selected>
                                                        </option>
                                                    </select>
                                                </td>
                                                <td style="padding: 2px;">
                                                    <input class="form-control" type="text"
                                                        name="datas[<?php echo $data; ?>][qty]" autocomplete="off"
                                                        oninput="calculateTotalAmt(this)"
                                                        style="text-align: center; border-color: #4c4c4c; border: none;">
                                                </td>
                                                <td style="padding: 2px;">
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
                                                <td style="padding: 2px;">
                                                    <input class="form-control" type="text"
                                                        id="datas[<?php echo $data; ?>][unit_cost]"
                                                        name="datas[<?php echo $data; ?>][unit_cost]" autocomplete="off"
                                                        oninput="calculateTotalAmt(this)"
                                                        style="text-align: center; border-color: #4c4c4c; border: none;">
                                                </td>

                                                <td style="padding: 2px;">
                                                    <input class="form-control" type="text"
                                                        name="datas[<?php echo $data; ?>][amt]" value="" readonly
                                                        autocomplete="off"
                                                        style=" text-align: center; border-color: #4c4c4c; border: none; background-color: transparent;">
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <script>
                                            function calculateTotalAmt(inputField) {
                                                var rowIndex = inputField.closest("tr")
                                                    .rowIndex - 1;
                                                var qtyInput = document.getElementsByName(
                                                    "datas[" +
                                                    rowIndex +
                                                    "][qty]")[0];
                                                var unitCostInput = document.getElementsByName(
                                                    "datas[" + rowIndex +
                                                    "][unit_cost]")[0];
                                                var amtInput = document.getElementsByName(
                                                    "datas[" +
                                                    rowIndex +
                                                    "][amt]")[0];

                                                var qty = parseFloat(qtyInput.value) || 0;
                                                var unitCost = parseFloat(unitCostInput
                                                    .value) || 0;

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
                                                    var amtInput = document.getElementsByName(
                                                        "datas[" +
                                                        i + "][amt]")[
                                                        0];
                                                    var amtValue = parseFloat(amtInput.value) ||
                                                        0;
                                                    totalSum += amtValue;
                                                }
                                                document.getElementById("total").value =
                                                    totalSum
                                                    .toFixed(2);
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
                                        data + "][unit]' style='border: none;' id='datas[" +
                                        data +
                                        "][unit]'>" +
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
                                            '#tbody tr:last-child .form-control:last-child'
                                        );
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
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-12">
                                            <label>Supplier Name </label><span style="color: red;">*</span><span
                                                style="font-style: italic;"> (Click to
                                                select supplier)</span>
                                            <input type="hidden" id="sup_id" name="sup_id">
                                            <div class="input-group">
                                                <input type="text" class="form-control" data-bs-toggle="modal"
                                                    data-bs-target="#assignSupplierModal" id="sup_code" name="sup_code"
                                                    placeholder="Supplier" readonly="readonly" data-bs-toggle="tooltip"
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
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#assignSignatoriesModal">Signatories</button>
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#assignPromoDetailsModal">Promo
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
                                                class="btn btn-sm btn-secondary" data-bs-toggle="tooltip"
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
                <button type="button" class="btn btn-default waves-effect " data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light ">Save changes</button>
            </div>
        </div>
    </div>
</div>

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
                    url: '<?php echo base_url() ?>admin/get_item',
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

                                if (!latestPrices[uom] || startingDate > latestPrices[uom]
                                    .startingDate) {
                                    latestPrices[uom] = {
                                        unitPrice: unitPrice,
                                        startingDate: startingDate,
                                        item: item
                                    };
                                }
                            }

                            var uomOptions = Object.keys(latestPrices);
                            console.log("Unique UOM Types with Latest Prices:", uomOptions);

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
                                    'data-price': latestPrices[uom]
                                        .unitPrice.toFixed(2)
                                }));
                            });

                            var selectedItem = latestPrices[uomOptions[0]].item;
                            var itemCode = selectedItem['Item No_'];
                            var itemBarCode = selectedItem['Barcode No_'];
                            var itemDescription = selectedItem['Description'];

                            $("#datas\\[" + row + "\\]\\[item_code\\]").val(itemCode);
                            $("#datas\\[" + row + "\\]\\[barcode\\]").val(itemBarCode);
                            $("#datas\\[" + row + "\\]\\[descript\\]").val(itemDescription);
                            $("#datas\\[" + row + "\\]\\[unit_cost\\]").val('');

                            dropdown.off('change').on('change', function() {
                                var selectedUOM = $(this).val();
                                if (selectedUOM) {
                                    var selectedPrice = $(this).find(
                                        'option:selected').data('price');
                                    $("#datas\\[" + row + "\\]\\[unit_cost\\]").val(
                                        selectedPrice);
                                } else {
                                    $("#datas\\[" + row + "\\]\\[unit_cost\\]").val(
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
            url: '<?php echo base_url() ?>admin/new_swa',
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
                var pdfUrl = '<?php echo base_url() ?>admin/printSwa/' + recordId;
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
<div class="modal fade" id="assignSubsidiaryModal" tabindex="-1" role="dialog"
    aria-labelledby="assignSubsidiaryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg  " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><img class="" src="<?= base_url('assets/backend/img/icons/subsidiary.png'); ?>"
                        style="width: 20px; margin-right: 10px; ">Subsidiary</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?php echo base_url() ?>#" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- <div class="form-group">
                        <input type="text" class="form-control" id="searchSubsidiary" placeholder="Search Subsidiary">
                    </div> -->
                    <div class="table-wrapper">
                    <table id="subsidiary-select-tbl" class="table table-hover m-b-0">
                            <thead style="text-align: center; background-color: #abd5c5">
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
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" data-bs-dismiss="modal" class="btn btn-secondary"
                        style="width: 100px;">Close</button>
                </div>
        </div>
    </div>
</div>
<script>
//MODAL-----------------------------------------
$(document).on('shown.bs.modal', '#modal', function() {
    $($.fn.dataTable.tables(true)).DataTable()
        .columns.adjust()
        .responsive.recalc()
        .scroller.measure();
});
$(document).ready(function() {
    $("#assignSubsidiaryModal").on("click", function() {
        $('#modal').modal('show');
    });

    $("#searchSubsidiary").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $(".subsidiary-checkbox").on("change", function() {
        if ($(this).is(":checked")) {
            updateModalValues($(this));
            $(".subsidiary-checkbox").not(this).prop('checked', false);
            $('#modal').modal('hide');
        } else {
            resetModalValues();
        }
    });

    $(".select-subsidiary").click(function(event) {
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
<div class="modal fade" id="assignSupplierModal" tabindex="-1" role="dialog" aria-labelledby="assignSupplierModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><img class="" src="<?= base_url('assets/backend/img/icons/supplier.png'); ?>"
                        style="width: 20px; margin-right: 10px; ">Supplier</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?php echo base_url() ?>#" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- <div class="form-group">
                        <input type="text" class="form-control" id="searchSupplier" placeholder="Search Supplier">
                    </div> -->
                    <div class="table-wrapper">
                        <table class="table table-hover" id="table3" style="width: 100%">
                            <thead style="text-align: center; background-color: #ede3d8">
                                <tr>
                                    <th>#</th>
                                    <th>Code</th>
                                    <th>Supplier Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="myTable1">
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
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" data-bs-dismiss="modal" class="btn btn-secondary"
                        style="width: 100px;">Close</button>
                </div>
        </div>
    </div>
</div>
<script>
</script>
<!--------------------------     SIGNATORIES MODAL     ---------------------------------------->
<div class="modal fade" id="assignSignatoriesModal" tabindex="-1" role="dialog"
    aria-labelledby="assignSignatoriesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md  " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignSignatoriesModalLabel"><img class=""
                        src="<?= base_url('assets/backend/img/icons/signatories.png'); ?>"
                        style="width: 20px; margin-right: 10px;">Signatories</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Requested by</label>
                    <input autocomplete="on" value="<?php ?>" type="text" name="req_by" id="req_by" class="form-control"
                        placeholder="Requested by">
                    <label></label>
                    <input autocomplete="on" type="date" value="<?php  ?>" name="req_date" id="req_date"
                        class="form-control" placeholder="Date">
                </div>
                <div class="form-group">
                    <label>Reviewed by</label>
                    <input autocomplete="on" value="<?php ?>" type="text" name="rev_by" id="rev_by" class="form-control"
                        placeholder="Reviewed by">
                    <label></label>
                    <input autocomplete="on" type="date" value="<?php  ?>" name="rev_date" id="rev_date"
                        class="form-control" placeholder="Date">
                </div>
                <div class="form-group">
                    <label>Approved by</label>
                    <input autocomplete="on" value="<?php ?>" type="text" name="app_by" id="app_by" class="form-control"
                        placeholder="Approved by">
                    <label></label>
                    <input autocomplete="on" type="date" value="<?php  ?>" name="app_date" id="app_date"
                        class="form-control" placeholder="Date">
                </div>
                <div class="form-group">
                    <label>Released by</label>
                    <input autocomplete="on" value="<?php ?>" type="text" name="rel_by" id="rel_by" class="form-control"
                        placeholder="Released by">
                    <label></label>
                    <input autocomplete="on" type="date" value="<?php  ?>" name="rel_date" id="rel_date"
                        class="form-control" placeholder="Date">
                </div>
                <div class="form-group">
                    <label>Received by</label>
                    <input autocomplete="on" value="<?php ?>" type="text" name="rec_by" id="rec_by" class="form-control"
                        placeholder="Received by">
                    <label></label>
                    <input autocomplete="on" type="date" value="<?php  ?>" name="rec_date" id="rec_date"
                        class="form-control" placeholder="Date">
                </div>
                <div class="modal-footer">
                    <button type="button" id="saveSignatoriesValues" data-bs-dismiss="modal" class="btn btn-success"
                        style="width: 100px;"><img src="<?php echo base_url('')?>assets/backend/img/icons/save.png"
                            style="width: 15px; margin-right: 10px;">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--------------------------------------   PROMO DETAIL MODAL  ---------------------------------------->
<div class="modal fade" id="assignPromoDetailsModal" tabindex="-1" role="dialog"
    aria-labelledby="assignPromoDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md  " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignPromoDetailsModalLabel"><img class=""
                        src="<?= base_url('assets/backend/img/icons/promo.png'); ?>"
                        style="width: 20px; margin-right: 10px; ">Promo Details</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- <form role="form" method="POST" action="<?php #echo base_url() ?>#" enctype="multipart/form-data" > -->
            <div class="card-body">
                <div class="form-group">
                    <label>Promo Title</label>
                    <input autocomplete="on" value="<?php ?>" type="text" name="promo_title" id="promo_title"
                        class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Promo Mechanics</label>
                    <textarea autocomplete="on" value="<?php ?>" type="text" name="promo_mechanics" id="promo_mechanics"
                        class="form-control" placeholder=""></textarea>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Promo Period</label>
                            <input autocomplete="off" value="<?php ?>" type="date" name="promo_start" id="promo_start"
                                class="form-control" placeholder="from">
                        </div>
                        <div class="col-md-6">
                            <label>&nbsp;</label>
                            <input autocomplete="off" value="<?php ?>" type="date" name="promo_end" id="promo_end"
                                class="form-control" placeholder="to">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="savePDValues" data-bs-dismiss="modal" class="btn btn-success"
                        style="width: 100px;"><img src="<?php echo base_url('')?>assets/backend/img/icons/save.png"
                            style="width: 15px; margin-right: 10px;">Save</button>
                </div>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>
<!-- reports modal -->
<div class="modal fade" id="viewReportsModal" tabindex="-1" role="dialog" aria-labelledby="viewReportsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl  " role="document" style="max-width: 100%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><img class="" src="<?= base_url('assets/backend/img/icons/swareport.png'); ?>"
                        style="width: 20px; margin-right: 10px; ">Stock Withdrawal Advice Report</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?php echo base_url() ?>#" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 0; margin: 20px;">
                    <div class="row">
                        <div class="col-sm-3 my-1">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                    style="width: 100px; border: 1px solid #000" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"><i class="fa fa-filter"></i>
                                    Filter
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" id="showAll" onclick="showAll()" value="Show all">Show
                                        all</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" id="filterByDate" value="Filter by date"
                                        onclick="handleDateFilterChange()">Filter by date</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 my-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" id="startLabel"
                                        style="font-size: .6rem; width: 50px; display: none;">FROM</div>
                                </div>
                                <input type="text" class="form-control" id="min" name="min" style="display: none;"
                                    placeholder="MM/DD/YYYY">
                            </div>
                        </div>
                        <div class="col-sm-3 my-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" id="endLabel"
                                        style="font-size: .6rem; width: 50px; display: none;">TO</div>
                                </div>
                                <input type="text" class="form-control" id="max" id="max" style="display: none;"
                                    placeholder="MM/DD/YYYY">
                            </div>
                        </div>
                        <div class="col-sm-3 my-1">
                            <button type="button" class="btn btn-info" id="goButton" style="display: none;">Go</button>
                        </div>
                    </div>

                    <hr>
                    <div class="table-wrapper">
                        <table class="table table-hover table-bordered" id="table4" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="width: 1%">SWA#</th>
                                    <th style="text-align: center;">DATE</th>
                                    <th style="text-align: left;">SUPPLIER</th>
                                    <th style="text-align: left;">MODE</th>
                                    <th style="text-align: center;">FROM</th>
                                    <th style="text-align: center;">TO</th>
                                    <th style="text-align: left;">PURPOSE</th>
                                    <th style="text-align: center;">SWA-AMOUNT</th>
                                    <th style="text-align: center;">CM #</th>
                                    <th style="text-align: center;">DATE</th>
                                    <th style="text-align: center;">AMOUNT</th>
                                    <th style="border-right: 0; text-align: right;">PAYMENTS</th>
                                    <th style="border-left: 0; border-right: 0; text-align: center;">FROM</th>
                                    <th style="border-left: 0; text-align: left;">SUPPLIER</th>
                                    <th style="text-align: center;">BALANCE</th>
                                    <th style="text-align: center;">REMARKS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($swa_datas as $data): ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $data->SWA_ID; ?></td>
                                    <td style="text-align: center;"><?php echo date("m/j/Y", strtotime($data->DOCUMENT_DATE)); ?></td>
                                    <td style="text-align: left;"><?php echo $data->NAME; ?></td>
                                    <td style="text-align: left;"><?php echo $data->SWA_ACCOUNTING_INSTRUCT; ?></td>
                                    <td style="text-align: center;"><?php echo $data->LOCATION; ?></td>
                                    <td style="text-align: center;"><?php echo $data->SUB_CODE; ?></td>
                                    <td style="text-align: left;"><?php echo $data->SWA_REMARK; ?></td>
                                    <td style="text-align: center;"><?php echo $data->SWA_TOTAL; ?></td>
                                    <td style="text-align: center;"><?php echo $data->SWA_TRANS_NO1; ?></td>
                                    <td style="text-align: center;"><?php echo $data->SWA_TRANS_NO1_DATE; ?></td>
                                    <td style="text-align: center;"><?php echo $data->SWA_TRANS_NO1_AMOUNT; ?></td>
                                    <td style="text-align: left;"><?php echo $data->SWA_CRFCV_NO; ?></td>
                                    <td style="text-align: center;"><?php echo $data->SWA_CRFCV_DATE; ?></td>
                                    <td style="text-align: center;"><?php echo $data->SWA_CRFCV_AMOUNT; ?></td>
                                    <td style="text-align: center;"></td>
                                    <td style="text-align: center;"></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" onclick="PrintOnlyTable()" class="btn btn-primary">Print Table</button>
                    <button type="button" onclick="ExportToCSV()" class="btn btn-success">Export to CSV</button> -->
                    <button type="button" data-bs-dismiss="modal" class="btn btn-secondary"
                        style="width: 100px;">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function handleDateFilterChange() {
    var filterByDate = $("#filterByDate").attr("value");
    var datePickerStart = $("#min");
    var startLabel = $("#startLabel");
    var datePickerEnd = $("#max");
    var endLabel = $("#endLabel");
    var goButton = $("#goButton");

    if (filterByDate === "Filter by date") {
        datePickerStart.show();
        startLabel.show();
        datePickerEnd.show();
        endLabel.show();
        goButton.show();
    } else {
        datePickerStart.hide();
        startLabel.hide();
        datePickerEnd.hide();
        endLabel.hide();
        goButton.hide();
        datePickerStart.val("");
        datePickerEnd.val("");
    }
}

function showAll() {
    var table = $('#table4').DataTable();
    DataTable.ext.search.pop();

    table.draw();
    var showAll = $("#showAll").attr("value");
    var datePickerStart = $("#min");
    var startLabel = $("#startLabel");
    var datePickerEnd = $("#max");
    var endLabel = $("#endLabel");
    var goButton = $("#goButton");

    if (showAll === "Show all") {
        datePickerStart.hide();
        startLabel.hide();
        datePickerEnd.hide();
        endLabel.hide();
        goButton.hide();

    }
}
$(document).ready(function() {
    var table = $('#table4').DataTable();
    var minDate, maxDate;
    $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
        var min = moment(minDate.val(), 'MM/DD/YYYY');
        var max = moment(maxDate.val(), 'MM/DD/YYYY');
        var date = moment(data[1], 'MM/DD/YYYY');

        // console.log('min:', min.format('MM/DD/YYYY'), 'max:', max.format('MM/DD/YYYY'), 'date:', date.format('MM/DD/YYYY'))

        if (
            (min.isValid() && max.isValid() && date.isBetween(min.format('MM/DD/YYYY'), max.format(
                'MM/DD/YYYY'), null, '[]')) ||
            (min.isValid() && !max.isValid() && date.isSameOrAfter(min)) ||
            (!min.isValid() && max.isValid() && date.isSameOrBefore(max)) ||
            (!min.isValid() && !max.isValid())
        ) {
            return true;
        }
        return false;
    });



    minDate = new DateTime('#min', {
        format: 'MM/DD/YYYY'
    });
    maxDate = new DateTime('#max', {
        format: 'MM/DD/YYYY'
    });

    $('#goButton').on('click', function() {
        table.draw();
    });
});
</script>

<script>
$(document).ready(function() {
    $(document).on('shown.bs.modal', '#modal', function() {
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust()
            .responsive.recalc()
            .scroller.measure();
    });

    $("#assignSupplierModal").on("click", function() {
        $('#modal').modal('show');
    });

    $("#searchSupplier").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable1 tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $(".supplier-checkbox").on("change", function() {
        $(".supplier-checkbox").not(this).prop("checked", false);
        if ($(this).is(":checked")) {
            updateSupplierModalValues($(this));
            $('#modal').modal('hide');
        } else {
            resetSupplierModalValues();
        }
    });

    $(".select-supplier").click(function() {
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
});

$(document).ready(function() {
    $('#savePDValues').on('click', function() {
        var promoTitleValue = $('#promo_title').val();
        var promoMechanicsValue = $('#promo_mechanics').val();
        var promoStartValue = $('#promo_start').val();
        var promoEndValue = $('#promo_end').val();
        $('#swaForm').append('<input type="hidden" name="promo_title" value="' + promoTitleValue +
            '">');
        $('#swaForm').append('<input type="hidden" name="promo_mechanics" value="' +
            promoMechanicsValue + '">');
        $('#swaForm').append('<input type="hidden" name="promo_start" value="' + promoStartValue +
            '">');
        $('#swaForm').append('<input type="hidden" name="promo_end" value="' + promoEndValue + '">');
        $('#assignPromoDetailsModal').modal('hide');
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
            $('#swaForm').append('<input type="hidden" name="req_by" value="' + reqByValue + '">');
        }
        if (reqDateValue && reqByValue) {
            $('#swaForm').append('<input type="hidden" name="req_date" value="' + reqDateValue + '">');
        }
        if (revByValue) {
            $('#swaForm').append('<input type="hidden" name="rev_by" value="' + revByValue + '">');
        }
        if (revDateValue && revByValue) {
            $('#swaForm').append('<input type="hidden" name="rev_date" value="' + revDateValue + '">');
        }
        if (appByValue) {
            $('#swaForm').append('<input type="hidden" name="app_by" value="' + appByValue + '">');
        }
        if (appDateValue && appByValue) {
            $('#swaForm').append('<input type="hidden" name="app_date" value="' + appDateValue + '">');
        }
        if (relByValue) {
            $('#swaForm').append('<input type="hidden" name="rel_by" value="' + relByValue + '">');
        }
        if (relDateValue && relByValue) {
            $('#swaForm').append('<input type="hidden" name="rel_date" value="' + relDateValue + '">');
        }
        if (recByValue) {
            $('#swaForm').append('<input type="hidden" name="rec_by" value="' + recByValue + '">');
        }
        if (recDateValue && recByValue) {
            $('#swaForm').append('<input type="hidden" name="rec_date" value="' + recDateValue + '">');
        }
    });
});
</script>