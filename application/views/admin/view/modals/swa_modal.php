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
                                    <div class="row">
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
                                                    style="transition: background-color 0.3s ease; cursor: pointer;">
                                                    <td>
                                                        <input class="form-control item-code-input" type="text"
                                                            name="datas[<?php echo $data;?>][code]" autocomplete="off"
                                                            style="text-align: center; border: none; box-shadow: none;">
                                                    </td>
                                                    <td>
                                                        <select class="form-control custom-arrow"
                                                            name="datas[<?php echo $data; ?>][unit]"
                                                            style="border: none; box-shadow: none;"
                                                            id="datas[<?php echo $data; ?>][unit]">
                                                            <option value="" hidden selected>
                                                            </option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                            name="datas[<?php echo $data; ?>][qty]" autocomplete="off"
                                                            oninput="calculateTotalAmt(this)"
                                                            style="text-align: center; border: none; box-shadow: none;">
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
                                                            style="text-align: center; border: none; box-shadow: none;">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                            id="datas[<?php echo $data; ?>][unit_cost]"
                                                            name="datas[<?php echo $data; ?>][unit_cost]"
                                                            autocomplete="off" oninput="calculateTotalAmt(this)"
                                                            style="text-align: center; border: none; box-shadow: none;">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                            name="datas[<?php echo $data; ?>][amt]" value="" readonly
                                                            autocomplete="off"
                                                            style=" text-align: center; border: none; background-color: transparent; box-shadow: none;">
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="form-group text-right">
                                        <div class="row justify-content-end">
                                            <div class="col-md-3 col-xs-12" style="margin-top: 10px;">
                                                <label for="total" style="display: inline-block; margin-right: 15px;"
                                                    class="sm-label">Total</label>
                                                <input type="text" readonly="readonly" id="total" name="total"
                                                    class="form-control"
                                                    style="width: 100%; display: inline-block; text-align: center; color: blue !important;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-12" style="margin-top: -58px;">
                                                <label class="sm-label">Supplier Name</label>
                                                <!-- <input type="hidden" id="sup_id" name="sup_id"> -->
                                                <div class="input-group">
                                                    <input type="text" class="form-control vendor-code-input"
                                                        id="sup_code" name="sup_code">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12" style="margin-top: -58px;">
                                                <label>&nbsp;</label>
                                                <input type="text" readonly="readonly" id="sup_name" name="sup_name"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-12" style="margin-top: -10px;">
                                                <label class="sm-label">Accounting Instruction</label>
                                                <textarea autocomplete="on" type="text" name="acct_instruct"
                                                    id="acct_instruct" class="form-control" placeholder=""></textarea>
                                            </div>
                                            <div class="col-md-6 col-xs-12" style="margin-top: -10px;">
                                                <label class="sm-label">Remarks</label>
                                                <textarea autocomplete="on" type="text" name="remark" id="remark"
                                                    class="form-control" placeholder=""></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-2"></div>
                        </div>
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
                    <button type="button" class="btn btn-default waves-effect me-2" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success waves-effect waves-light" id="saveButton">Save
                        changes</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- ------------------- END OF SWA MODAL ------------------------>
<!----------------------VIEW SWA MODAL------------------------------>
<div class="modal fade" id="viewSwaFormModal" tabindex="-1" role="dialog">
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
                                        <div class="col-md-3 col-xs-12" style="margin-top: 5px;">
                                            <label for="total" style="display: inline-block; margin-right: 15px;"
                                                class="sm-label">Total</label>
                                            <input type="text" readonly="readonly" id="view_swatotal" name=""
                                                class="form-control"
                                                style="width: 100%; display: inline-block; text-align: center; color: blue !important;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-12" style="margin-top: -58px;">
                                            <label class="sm-label">Supplier Name </label><span
                                                style="color: red;">*</span>
                                            <input type="hidden" id="sup_id" name="sup_id">
                                            <div class="input-group">
                                                <input type="text" readonly="readonly" id="view_supcode" name=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12" style="margin-top: -58px;">
                                            <label>&nbsp;</label>
                                            <input type="text" readonly="readonly" id="view_supname" name=""
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12" style="margin-top: -10px;">
                                            <label class="sm-label">Accounting Instruction</label>
                                            <textarea autocomplete="on" type="text" id="view_accounting_instruct"
                                                class="form-control" placeholder=""></textarea>
                                        </div>
                                        <div class="col-md-6 col-xs-12" style="margin-top: -10px;">
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