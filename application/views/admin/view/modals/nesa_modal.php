<!--------------------------- NESA MODAL-------------------------->
<div class="modal fade" id="nesaFormModal" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document" style="max-width: 1200px;">
        <div class="modal-content" style="">
            <!-- <div class="modal-header"> -->
            <!-- <h4 class="modal-title">Near Expiry Stock Advise (NESA)</h4> -->
            <div class="row form-header text-center mt-3">
                <div class="col-11" style="">
                    <h4 style="font-weight: bold;">Near Expiry Stock Advise (Nesa)</h4>
                    <p>SHOULD BE ISSUED 120 DAYS BEFORE PRODUCT EXPIRY</p>
                </div>
                <div class="col-1">
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>

            <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> -->
            <!-- </div> -->
            <div class="modal-body">
                <form role="form" method="POST" action="" enctype="multipart/form-data" id="nesaForm">
                    <div class="card-block m-3">
                        <!-- <div class="container mt-4"> -->
                        <div class="row mt-4">
                            <!-- Supplier -->
                            <div class="col-md-3">
                                <div class="form-group row align-items-center">
                                    <label for="supplier" class="col-md-6 col-form-label"
                                        style="font-weight: bold;">SUPPLIER CODE:</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control nesa-input vendor-code-input"
                                            id="sup_code" name="sup_code" placeholder="" value=""
                                            style="border: none; border-bottom: 1px solid #333333 !important; text-transform: uppercase;  margin-left: -20px;"
                                            autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                    <label for="" class="col-md-3 col-form-label"
                                        style="font-weight: bold; text-align: right; margin-left: -30px">SUPPLIER
                                        NAME:</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control nesa-input" id="sup_name" name="sup_name"
                                            placeholder="" value=""
                                            style="border: none; border-bottom: 1px solid #333333 !important; text-transform: uppercase;  margin-left: -10px;"
                                            autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group row align-items-center">
                                    <label for="location" class="col-md-2 col-form-label"
                                        style="font-weight: bold;">No:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control nesa-input" id="" placeholder="" value=""
                                            style="border: none; border-bottom: 1px solid #333333 !important; "
                                            readonly="readonly">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                    <label for="nesa_location" class="col-md-2 col-form-label"
                                        style="font-weight: bold;">LOCATION:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control nesa-input" id="nesa_location"
                                            name="nesa_location" placeholder="" value=""
                                            style="border: none; border-bottom: 1px solid #333333 !important; text-transform: uppercase;  margin-left: -10px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row align-items-center">
                                    <label for="" class="col-md-3 col-form-label"
                                        style="font-weight: bold;">&nbsp;</label>
                                    <div class="col-md-9">
                                        <input type="hidden" class="form-control" id="" placeholder="" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row align-items-center">
                                    <label for="nesa_date" class="col-md-2 col-form-label"
                                        style="font-weight: bold;">Date:</label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control nesa-input datePicker" id="nesa_date"
                                            name="nesa_date" placeholder="" value=""
                                            style="border: none; border-bottom: 1px solid #333333 !important; text-align: center; ">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tableContainer"
                            style="height: 380px; overflow: auto; border-top: 1px solid #333333; border-bottom: 1px solid #333333">
                            <table class="table table-bordered nesa-table" style="">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th style="">ITEM CODE</th>
                                        <th style="width: 40%;">ITEM DESCRIPTION</th>
                                        <th style="width: 10%;">UNIT</th>
                                        <th style="width: 10%;">QUANTITY</th>
                                        <th style="">EXPIRY</th>
                                        <!-- <th style="">COURSE OF ACTION</th> -->
                                    </tr>
                                </thead>
                                <tbody id="tbody" style="">
                                    <?php for ($data = 0; $data < 12; $data++) { ?>
                                    <tr data-row="<?php echo $data; ?>"
                                        style="transition: background-color 0.3s ease; cursor: pointer;">
                                        <td>
                                            <input class="form-control item-code-input nesa-input-td" type="text"
                                                name="datas[<?php echo $data;?>][item_code]"
                                                id="datas[<?php echo $data;?>][item_code]" autocomplete="off"
                                                style="text-align: center;">
                                        </td>
                                        <td>
                                            <input class="form-control nesa-input-td" type="text"
                                                name="datas[<?php echo $data;?>][item_descript]"
                                                id="datas[<?php echo $data;?>][item_descript]" autocomplete="off"
                                                style="text-align: center;">
                                        </td>
                                        <td>
                                            <select class="form-control custom-arrow nesa-input-td"
                                                name="datas[<?php echo $data; ?>][unit]" style="text-align: center;"
                                                id="datas[<?php echo $data; ?>][unit]">
                                                <option value="" hidden selected>
                                                </option>
                                            </select>
                                            <input class="form-control" type="hidden"
                                                id="datas[<?php echo $data; ?>][unit_cost]"
                                                name="datas[<?php echo $data; ?>][unit_cost]">
                                        </td>
                                        <td>
                                            <input class="form-control nesa-input-td" type="text"
                                                name="datas[<?php echo $data; ?>][qty]"
                                                id="datas[<?php echo $data; ?>][qty]" autocomplete="off"
                                                style="text-align: center;">
                                        </td>
                                        <td>
                                            <input class="form-control nesa-input-td datePicker" type="date"
                                                name="datas[<?php echo $data; ?>][expiry]" id="datePicker"
                                                autocomplete="off" style="text-align: center;">
                                        </td>
                                        <!-- <td>
                                        <input class="form-control nesa-input-td" type="text"
                                            name="datas[<?php echo $data; ?>][coa]"
                                            id="datas[<?php echo $data; ?>][coa]" autocomplete="off"
                                            style="text-align: center;">
                                    </td> -->
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                        <table class="table table-bordered nesa-table" style="width: 100%">
                            <tr>
                                <td style="text-align: center; width: 30%"><strong>COURSE OF ACTION</strong></td>
                                <td>
                                    <input class="form-control nesa-input-td" type="textarea" name="course_of_action"
                                        id="course_of_action" autocomplete="off" style="text-align: left;" readonly="readonly">
                                </td>
                            </tr>
                        </table>
                        <div class="row mt-4 mb-4">
                            <div class="col-md-3">
                                <button type="button" class="btn btn-primary waves-effect waves-light me-2"
                                    data-toggle="modal" data-target="#nesaSignatoriesModal"
                                    style="background: transparent; border: 1px solid #333333; color: black; width: 100%">Signatories</button>
                            </div>
                            <div class="col-md-9 d-flex justify-content-end">
                                <button type="button" class="btn btn-primary waves-effect waves-light" id="saveButton"
                                    style="background: transparent; border: 1px solid #333333; color: black;">Save
                                    Nesa</button>
                                <button type="button" class="btn btn-default waves-effect me-2"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- <div class="modal-footer" style="border: none;">
           
            </div> -->
        </div>
    </div>
</div>


<!--------------------------- END OF NESA MODAL-------------------------->

<!----- view nesa form modal------>

<div class="modal fade" id="viewNesaFormModal" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document" style="max-width: 1200px;">
        <div class="modal-content" style="">
            <!-- <div class="modal-header"> -->
            <!-- <h4 class="modal-title">Near Expiry Stock Advise (NESA)</h4> -->
            <div class="row form-header text-center mt-3">
                <div class="col-12">
                    <h4 style="font-weight: bold;">Near Expiry Stock Advise (Nesa)</h4>
                    <p>SHOULD BE ISSUED 120 DAYS BEFORE PRODUCT EXPIRY</p>
                </div>
            </div>

            <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> -->
            <!-- </div> -->
            <div class="modal-body">
                <form role="form" method="POST" action="" enctype="multipart/form-data" id="nesaForm">
                    <div class="card-block m-3">
                        <!-- <div class="container mt-4"> -->
                        <div class="row mt-4">
                            <!-- Supplier -->
                            <div class="col-md-3">
                                <div class="form-group row align-items-center">
                                    <label for="supplier" class="col-md-6 col-form-label"
                                        style="font-weight: bold;">SUPPLIER CODE:</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control nesa-input vendor-code-input"
                                            id="view_sup_code" name="" placeholder="" value=""
                                            style="border: none; border-bottom: 1px solid #333333 !important; text-transform: uppercase;  margin-left: -20px;"
                                            autocomplete="off" readonly="raedonly">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                    <label for="" class="col-md-3 col-form-label"
                                        style="font-weight: bold; text-align: right;">SUPPLIER NAME:</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control nesa-input" id="view_sup_name" name=""
                                            placeholder="" value=""
                                            style="border: none; border-bottom: 1px solid #333333 !important; text-transform: uppercase;  margin-left: -10px;"
                                            autocomplete="off" readonly="raedonly">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group row align-items-center">
                                    <label for="" class="col-md-2 col-form-label" style="font-weight: bold;">No:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control nesa-input" id="view_nesa_id"
                                            placeholder="" value=""
                                            style="border: none; border-bottom: 1px solid #333333 !important; "
                                            readonly="raedonly">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-md-6">
                                <div class="form-group row align-items-center">
                                    <label for="nesa_location" class="col-md-2 col-form-label"
                                        style="font-weight: bold;">LOCATION:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control nesa-input" id="view_location" name=""
                                            placeholder="" value=""
                                            style="border: none; border-bottom: 1px solid #333333 !important; text-transform: uppercase;   margin-left: -10px"
                                            readonly="raedonly">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row align-items-center">
                                    <label for="" class="col-md-3 col-form-label"
                                        style="font-weight: bold;">&nbsp;</label>
                                    <div class="col-md-9">
                                        <input type="hidden" class="form-control" id="" placeholder="" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row align-items-center">
                                    <label for="nesa_date" class="col-md-2 col-form-label"
                                        style="font-weight: bold;">Date:</label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control nesa-input" id="view_document_date"
                                            name="" placeholder="" value=""
                                            style="border: none; border-bottom: 1px solid #333333 !important; text-align: center;  "
                                            readonly="raedonly">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tableContainer"
                            style="height: auto; overflow: auto; border-top: 1px solid #333333; border-bottom: 1px solid #333333">
                            <table class="table table-bordered nesa-table" style="">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th style="">ITEM CODE</th>
                                        <th style="width: 40%;">ITEM DESCRIPTION</th>
                                        <th style="width: 10%;">UNIT</th>
                                        <th style="width: 10%;">QUANTITY</th>
                                        <th style="">EXPIRY</th>
                                        <!-- <th style="">COURSE OF ACTION</th> -->
                                    </tr>
                                </thead>
                                <tbody id="tbodyview" style="overflow-y: auto; max-height: 410px;">

                                </tbody>
                            </table>

                        </div>
                        <table class="table table-bordered nesa-table" style="width: 100%">
                            <tr>
                                <td style="text-align: center; width: 30%"><strong>COURSE OF ACTION</strong></td>
                                <td>
                                <select class="form-select nesa-input-td"  name="course_of_action"
                                        id="course_of_action" style="width: 100%">
                                        <option value="" hidden selected></option>
                                        <option value="Buy One Take One">Buy One Take One</option>
                                        <option value="Less 50%">Less 50%</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <div class="row mt-4 mb-4">
                            <div class="col-md-3">
                                <button type="button"
                                    class="viewSignatoriesButton btn btn-primary waves-effect waves-light me-2"
                                    data-toggle="modal" data-target="#viewNesaSignatoriesModal"
                                    style="background: transparent; border: 1px solid #333333; color: black; width: 100%">Signatories</button>
                            </div>
                            <div class="col-md-9 d-flex justify-content-end">
                                <!-- <button type="button" class="btn btn-primary waves-effect waves-light" id="saveButton"
                                    style="background: transparent; border: 1px solid #333333; color: black;">Save
                                    Nesa</button> -->
                                <button type="button" class="btn btn-default waves-effect me-2"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- <div class="modal-footer" style="border: none;">
           
            </div> -->
        </div>
    </div>
</div>
<!----- end of view nesa form modal --->


<!--------------------------     SIGNATORIES MODAL     ---------------------------------------->
<div class="modal fade" id="nesaSignatoriesModal" tabindex="-1" role="dialog"
    aria-labelledby="assignSignatoriesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header" style="border: none;">
                <!-- <h4 class="modal-title" id="assignSignatoriesModalLabel">Signatories</h4> -->
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label class="sm-label">Submitted by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="sub_by" id="sub_by"
                            class="form-control nesa-input-mb" placeholder="" style="">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="sub_date" id="sub_date"
                            class="form-control nesa-input-mb" placeholder="Date">
                        <label></label>
                        <input autocomplete="on" type="time" value="<?php  ?>" name="sub_time" id="sub_time"
                            class="form-control nesa-input-mb" placeholder="Time">
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label class="sm-label">Checked by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="check_by" id="check_by"
                            class="form-control nesa-input-mb" placeholder="" style="">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="check_date" id="check_date"
                            class="form-control nesa-input-mb" placeholder="Date">
                        <label></label>
                        <input autocomplete="on" type="time" value="<?php  ?>" name="check_time" id="check_time"
                            class="form-control nesa-input-mb" placeholder="Time">
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label class="sm-label">Reviewed by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="rev_by" id="rev_by"
                            class="form-control nesa-input-mb" placeholder="" style="">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="rev_date" id="rev_date"
                            class="form-control nesa-input-mb" placeholder="Date">
                        <label></label>
                        <input autocomplete="on" type="time" value="<?php  ?>" name="rev_time" id="rev_time"
                            class="form-control nesa-input-mb" placeholder="Time">
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label class="sm-label">Approved by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="app_by" id="app_by"
                            class="form-control nesa-input-mb" placeholder="" style="">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="app_date" id="app_date"
                            class="form-control nesa-input-mb" placeholder="Date">
                        <label></label>
                        <input autocomplete="on" type="time" value="<?php  ?>" name="app_time" id="app_time"
                            class="form-control nesa-input-mb" placeholder="Time">
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label class="sm-label">Received by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="rec_by" id="rec_by"
                            class="form-control nesa-input-mb" placeholder="" style="">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="rec_date" id="rec_date"
                            class="form-control nesa-input-mb" placeholder="Date">
                        <label></label>
                        <input autocomplete="on" type="time" value="<?php  ?>" name="rec_time" id="rec_time"
                            class="form-control nesa-input-mb" placeholder="Time">
                    </div>
                    <div class="modal-footer" style="border: none;">
                        <button type="button" id="saveSignatoriesValues" data-dismiss="modal"
                            class="btn btn-primary waves-effect waves-light"
                            style="background: transparent; border: 1px solid #333333; color: black;">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--------------------------     SIGNATORIES MODAL     ---------------------------------------->
<div class="modal fade" id="viewNesaSignatoriesModal" tabindex="-1" role="dialog"
    aria-labelledby="assignSignatoriesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header" style="border: none;">
                <!-- <h4 class="modal-title" id="assignSignatoriesModalLabel">Signatories</h4> -->
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label class="sm-label">Submitted by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="" id="view_sub_by"
                            class="form-control nesa-input-mb" placeholder="" style="">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="" id="view_sub_date"
                            class="form-control nesa-input-mb datePicker" placeholder="Date">
                        <label></label>
                        <input autocomplete="on" type="time" value="<?php  ?>" name="" id="view_sub_time"
                            class="form-control nesa-input-mb" placeholder="Time">
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label class="sm-label">Checked by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="" id="view_check_by"
                            class="form-control nesa-input-mb" placeholder="" style="">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="" id="view_check_date"
                            class="form-control nesa-input-mb datePicker" placeholder="Date">
                        <label></label>
                        <input autocomplete="on" type="time" value="<?php  ?>" name="" id="view_check_time"
                            class="form-control nesa-input-mb" placeholder="Time">
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label class="sm-label">Reviewed by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="" id="view_rev_by"
                            class="form-control nesa-input-mb" placeholder="" style="">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="" id="view_rev_date"
                            class="form-control nesa-input-mb datePicker" placeholder="Date">
                        <label></label>
                        <input autocomplete="on" type="time" value="<?php  ?>" name="" id="view_rev_time"
                            class="form-control nesa-input-mb" placeholder="Time">
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label class="sm-label">Approved by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="" id="view_app_by"
                            class="form-control nesa-input-mb" placeholder="" style="">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="" id="view_app_date"
                            class="form-control nesa-input-mb datePicker" placeholder="Date">
                        <label></label>
                        <input autocomplete="on" type="time" value="<?php  ?>" name="" id="view_app_time"
                            class="form-control nesa-input-mb" placeholder="Time">
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label class="sm-label">Received by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="" id="view_rec_by"
                            class="form-control nesa-input-mb" placeholder="" style="">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="" id="view_rec_date"
                            class="form-control nesa-input-mb datePicker" placeholder="Date">
                        <label></label>
                        <input autocomplete="on" type="time" value="<?php  ?>" name="" id="view_rec_time"
                            class="form-control nesa-input-mb" placeholder="Time">
                    </div>
                    <div class="modal-footer" style="border: none;">
                        <button type="button" id="" data-dismiss="modal"
                            class="btn btn-default waves-effect">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--------------------------- SWA MODAL-------------------------->
<div class="modal fade" id="swaFormModal" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document" style="max-width: 75%;">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h4 class="modal-title">Stock Withdrawal Advise Form</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div> -->
            <div class="row form-header text-center mt-4">
                <div class="col-11">
                    <h4 style="font-weight: bold;">Stock Withdrawal Advice (SWA)</h4>
                    <!-- <p>SHOULD BE ISSUED 120 DAYS BEFORE PRODUCT EXPIRY</p> -->
                </div>
                <div class="col-1">
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body" style="padding: 30px;">
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-12">
                            <form role="form" method="POST" action="" enctype="multipart/form-data" id="swaForm">
                                <!-- <div class="card-body"> -->
                                <!-- <div class="form-group"> -->
                                <div class="row">
                                    <div class="col-md-4 col-xs-12">
                                        <label class="sm-label">From</label>
                                        <input type="text" readonly="readonly" id="loc" name="loc" class="form-control">
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
                                    <div class="col-md-4 col-xs-12" style="">
                                        <label class="sm-label">Date</label>
                                        <input type="date" id="swa_document_date" name="document_date"
                                            class="form-control datePicker">
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
                                    <!-- <div class="row">
                                        <div class="col">
                                            <span style="color: red;">*</span><span style="font-style: italic;">Enter
                                                the item code or
                                                barcode</span>
                                        </div>
                                        <div class="col-auto text-end">
                                            <button class="btn btn-sm btn-dark btn-flat" type="button"
                                                onclick="addItem();" data-bs-toggle="tooltip" title="Add row"
                                                style="color: #000; background-color: transparent; border-color: #fff;">
                                                <i class="nav-icon fa fa-plus"></i></button>
                                        </div>
                                    </div> -->
                                    <div class="tableContainer" style="height: auto; overflow: auto;">
                                        <table class="table table-bordered" id="" style="width: 100%;">
                                            <thead>
                                                <tr style="text-align: center;">
                                                    <th style="width: 15%;">Code</th>
                                                    <th style="width: 12%;">Unit</th>
                                                    <th style="width: 10%;">Quantity</th>
                                                    <th style="width: 39%;">Description</th>
                                                    <th style="width: 12%;">Cost Per Unit</th>
                                                    <th style="width: 12%;">Amount</th>
                                                    <!-- <th style="></th> -->
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_swa" style="overflow-y: auto; max-height: 410px;">

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
                                                        id="swa_sup_code" name="swa_sup_code">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-12" style="margin-top: -58px;">
                                                <label>&nbsp;</label>
                                                <input type="text" readonly="readonly" id="swa_sup_name"
                                                    name="swa_sup_name" class="form-control">
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
                    <button type="button" class="btn btn-primary waves-effect waves-light me-2 custom-btn-db"
                        data-toggle="modal" data-target="#assignSwaSignatoriesModal">Signatories</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light me-2 custom-btn-db"
                        data-toggle="modal" data-target="#assignSwaPromoDetailsModal">Promo Details</button>
                    <!-- <input type="reset" value="Clear" id="clearSwaForm"
                        class="btn btn-default waves-effect waves-light me-2" data-toggle="tooltip" title="Clear form"> -->
                </div>
                <div class="ms-auto">
                    <button type="button" class="btn btn-success waves-effect waves-light custom-btn-db"
                        id="saveSwaButton">Save
                        changes</button>
                    <button type="button" class="btn btn-default waves-effect me-2" data-dismiss="modal">Close</button>

                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- ------------------- END OF SWA MODAL ------------------------>
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
                    <!-- <form role="form" method="POST" action="" enctype="multipart/form-data" id="signatories"> -->
                    <!-- <div class="form-group">
                        <input type="text" class="form-control" id="searchSubsidiary" placeholder="Search Subsidiary">
                    </div> -->
                    <div class="table-responsive">
                        <table id="subsidiary-select-table" class="table table-hover m-b-0" style="width: 100%;">
                            <thead>
                                <tr>
                                    <!-- <th>#</th> -->
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
                                    <!-- <td><?php echo $count++; ?></td> -->
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
                    <!-- </form> -->

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--------------------------     SIGNATORIES MODAL     ---------------------------------------->
<div class="modal fade" id="assignSwaSignatoriesModal" tabindex="-1" role="dialog"
    aria-labelledby="assignSignatoriesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="assignSignatoriesModalLabel">Signatories</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label class="sm-label">Requested by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="swa_req_by" id="swa_req_by"
                            class="form-control" placeholder="Requested by" style="margin-bottom: -10px">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="swa_req_date" id="swa_req_date"
                            class="form-control datePicker" placeholder="Date">
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label class="sm-label">Reviewed by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="swa_rev_by" id="swa_rev_by"
                            class="form-control" placeholder="Reviewed by" style="margin-bottom: -10px">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="swa_rev_date" id="swa_rev_date"
                            class="form-control datePicker" placeholder="Date">
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label class="sm-label">Approved by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="swa_app_by" id="swa_app_by"
                            class="form-control" placeholder="Approved by" style="margin-bottom: -10px">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="swa_app_date" id="swa_app_date"
                            class="form-control datePicker" placeholder="Date">
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label class="sm-label">Released by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="swa_rel_by" id="swa_rel_by"
                            class="form-control" placeholder="Released by" style="margin-bottom: -10px">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="swa_rel_date" id="swa_rel_date"
                            class="form-control datePicker" placeholder="Date">
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label class="sm-label">Received by</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="swa_rec_by" id="swa_rec_by"
                            class="form-control" placeholder="Received by" style="margin-bottom: -10px">
                        <label></label>
                        <input autocomplete="on" type="date" value="<?php  ?>" name="swa_rec_date" id="swa_rec_date"
                            class="form-control datePicker" placeholder="Date">
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="saveSwaSignatoriesValues" data-dismiss="modal" class="btn btn-success"
                            style="width: 100px;">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------   PROMO DETAIL MODAL  ---------------------------------------->
<div class="modal fade" id="assignSwaPromoDetailsModal" tabindex="-1" role="dialog"
    aria-labelledby="assignPromoDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="assignPromoDetailsModalLabel">Promo Details</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label class="sm-label">Promo Title</label>
                        <input autocomplete="on" value="<?php ?>" type="text" name="promo_title" id="promo_title"
                            class="form-control" placeholder="">
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label class="sm-label">Promo Mechanics</label>
                        <textarea autocomplete="on" value="<?php ?>" type="text" name="promo_mechanics"
                            id="promo_mechanics" class="form-control" placeholder=""></textarea>
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
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
                        <button type="button" id="saveSwaPDValues" data-dismiss="modal" class="btn btn-success"
                            style="width: 100px;">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>