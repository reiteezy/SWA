<!--------------------------- PER MODAL-------------------------->
<div class="modal fade" id="perFormModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h4 class="modal-title">Promo Execution Report Form</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div> -->
            <div class="row form-header text-center mt-4">
                <div class="col-11">
                    <h4 style="font-weight: bold;">Promo Execution Report Form</h4>
                </div>
                <div class="col-1">
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <form class="perForm" role="form" id="perForm" method="POST" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-12">

                                <!-- <div class="card-body"> -->
                                <!-- <div class="form-group"> -->
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <label class="sm-label">SWA Series No.</label>
                                        <div style="position: relative;">
                                            <input autocomplete="off" type="text" id="swa_series_no"
                                                name="swa_series_no" class="form-control">
                                            <div class="swaDropdown" id="swaDropdown"
                                                style="position: absolute; width: 100%; max-height: 200px; overflow-y: auto; border: 1px solid #d1d3e2; background-color: #F5F5F5; display: none; z-index: 999;">
                                            </div>
                                        </div>
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

                                <div class="row" style="margin-top: 5px;">
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
                                        <label for="document_date" style="cursor: pointer;"
                                            class="sm-label">Date</label>
                                        <input type="date" id="document_date" name="document_date" class="form-control">
                                    </div>
                                </div>

                                <div class="row" style="margin-top: -12px;">
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
                                        <label class="sm-label">MIS Ref. No. 1</label>
                                        <input autocomplete="off" readonly="readonly" type="text" id="mis_ref_1"
                                            name="mis_ref_1" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 5px;">
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
                                        <label class="sm-label">MIS Ref. No. 2</label>
                                        <input autocomplete="off" readonly="readonly" type="text" id="mis_ref_2"
                                            name="mis_ref_2" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 5px;">
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
                                        <label class="sm-label">MIS Ref. No. 3</label>
                                        <input autocomplete="off" readonly="readonly" type="text" id="mis_ref_3"
                                            name="mis_ref_3" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 5px;">
                                    <div class="col-md-3 col-xs-12">
                                        <label class="sm-label">Sponsor</label>
                                        <input type="text" readonly="readonly" value="" id="sup_code" name="sup_code"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input autocomplete="off" readonly="readonly" type="text" id="sup_name"
                                            name="sup_name" class="form-control">
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" class="form-control">
                                    </div>
                                </div>
                                <hr class="rounded">
                                <span style="font-style: italic">Enter actual execution quantity
                                    value</span><span style="color: red">*</span>
                                <table class="table table-bordered table-per" id="perTable" style="width: 100%;">
                                    <thead style="position: sticky; top: 0; text-align: center">
                                        <tr style="background-color: #6b95b0;">
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

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-start">
                        <button type="button" class="btn btn-info waves-effect waves-light me-2 custom-btn-db"
                            data-toggle="modal" data-target="#assignSignatoriesModal">Signatories</button>
                        <!-- <input type="reset" value="Clear" id="clearForm"
                            class="btn btn-secondary waves-effect waves-light me-2" data-toggle="tooltip"
                            title="Clear form"> -->
                    </div>
                    <div class="ms-auto">
                        <button type="button" class="btn btn-default waves-effect me-2"
                            data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light custom-btn-db"
                            id="saveButton">Save
                            changes</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<!------------------------ END OF PER MODAL------------------>
<!---------------------------  VIEW PER MODAL-------------------------->
<div class="modal fade" id="viewPerFormModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h4 class="modal-title">Promo Execution Report Form</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div> -->
            <div class="row form-header text-center mt-4">
                <div class="col-11">
                    <h4 style="font-weight: bold;">Promo Execution Report Form</h4>
                </div>
                <div class="col-1">
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="" role="form" id="" method="POST" action="" enctype="multipart/form-data">
                                <!-- <div class="card-body"> -->
                                <!-- <div class="form-group"> -->
                                <div class="row">
                                    <div class="col-md-3 col-xs-12">
                                        <label class="sm-label">Subsidiary</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="view_per_subcode" name=""
                                                readonly="readonly" placeholder="Subsidiary">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="text" readonly="readonly" id="view_per_subdescript" name=""
                                            class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label class="sm-label">Control No.</label>
                                        <input type="text" readonly="readonly" id="view_per_controlno" name=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="margin-top: -15px;">
                                    <div class="col-md-6 col-xs-12">
                                        <label class="sm-label">Promo Title</label>
                                        <input type="text" readonly="readonly" id="view_per_promotitle" name=""
                                            class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label for="document_date" style="cursor: pointer;"
                                            class="sm-label">Date</label>
                                        <input type="date" id="view_document_date" name="" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <label class="sm-label">Mechanics</label>
                                        <input autocomplete="off" type="text" readonly="readonly" id="vie_per_mechanics"
                                            name="" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label class="sm-label">SWA Series No.</label>
                                        <input autocomplete="off" type="text" id="view_swa_series_no" name=""
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-xs-12">
                                        <label class="sm-label">Promo Period</label>
                                        <input type="date" readonly="readonly" id="view_promo_start" name=""
                                            class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="date" readonly="readonly" value="" id="view_promo_end" name=""
                                            class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label class="sm-label">MIS Ref. No. 1</label>
                                        <input autocomplete="off" readonly="readonly" type="text" id="view_mis_ref_1"
                                            name="" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 col-xs-12">
                                        <label class="sm-label">Sponsor</label>
                                        <input type="text" readonly="readonly" value="" id="view_sup_code" name=""
                                            class="form-control">
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label class="sm-label">MIS Ref. No. 2</label>
                                        <input autocomplete="off" readonly="readonly" type="text" id="view_mis_ref_2"
                                            name="" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input autocomplete="off" readonly="readonly" type="text" id="view_sup_name"
                                            name="sup_name" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label>&nbsp;</label>
                                        <input type="hidden" class="form-control">
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <label class="sm-label">MIS Ref. No. 3</label>
                                        <input autocomplete="off" readonly="readonly" type="text" id="view_mis_ref_3"
                                            name="" class="form-control">
                                    </div>
                                </div>
                                <hr class="rounded">
                                <span style="color: red">*</span><span style="font-style: italic">Enter actual execution
                                    quantity
                                    value</span>
                                <table class="table table-bordered table-per" id="viewPerTable" style="width: 100%;">
                                    <thead style="position: sticky; top: 0; text-align: center">
                                        <tr style="background-color: #6b95b0;">
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
                                    <tbody id="tbody-view">

                                    </tbody>
                                </table>

                                <hr class="rounded">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <label class="sm-label">Promo Execution Summary</label>
                                            <textarea autocomplete="on" type="text" id="view_per_summary" name=""
                                                class="form-control"></textarea>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <label class="sm-label">Post-promo Remarks</label>
                                            <textarea autocomplete="on" type="text" id="View_post_promo_remarks" name=""
                                                class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-start">
                    <button type="button"
                        class="btn btn-info waves-effect waves-light me-2 custom-btn-db viewSignatoriesButton"
                        data-toggle="modal" data-target="#viewSignatoriesModal">Signatories</button>
                    <!-- <input type="reset" value="Clear" id="clearForm"
                        class="btn btn-secondary waves-effect waves-light me-2" data-toggle="tooltip"
                        title="Clear form"> -->
                </div>
                <div class="ms-auto">
                    <a id="printLink" href="" target="_blank">
                        <button type="button"
                            class="btn btn-info waves-effect waves-light me-2 custom-btn-db printView">
                            Print</button>
                    </a>
                    <button type="button" class="btn btn-default waves-effect me-2" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary waves-effect waves-light" id="">Save
                        changes</button> -->
                </div>
            </div>

            </form>
        </div>
    </div>
</div>
<!-----------------END OF VIEW PER FORM MODAL----------------------->
<!--------------------------     SIGNATORIES MODAL     ---------------------------------------->

<div class="modal fade" id="assignSignatoriesModal" tabindex="-1" role="dialog">
    <div class="modal-dialog-centered modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Signatories</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form role="form" method="POST" action="<?php echo base_url() ?>#" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label class="sm-label">Submitted by</label>
                                <input autocomplete="on" value="<?php ?>" type="text" id="sub_by" name="sub_by"
                                    class="form-control" placeholder="Submitted by" style="margin-bottom: -10px">
                                <label></label>
                                <input autocomplete="on" type="date" value="<?php  ?>" id="sub_date" name="sub_date"
                                    class="form-control" placeholder="Date">
                            </div>
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label class="sm-label">Reviewed by</label>
                                <input autocomplete="on" value="<?php ?>" type="text" id="rev_by" name="rev_by"
                                    class="form-control" placeholder="Reviewed by" style="margin-bottom: -10px">
                                <label></label>
                                <input autocomplete="on" type="date" value="<?php  ?>" id="rev_date" name="rev_date"
                                    class="form-control" placeholder="Date">
                            </div>
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label class="sm-label">Audited by</label>
                                <input autocomplete="on" value="<?php ?>" type="text" id="audit_by" name="audit_by"
                                    class="form-control" placeholder="Audited by" style="margin-bottom: -10px">
                                <label></label>
                                <input autocomplete="on" type="date" value="<?php  ?>" id="audit_date" name="audit_date"
                                    class="form-control" placeholder="Date">
                            </div>
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label class="sm-label">Noted by</label>
                                <input autocomplete="on" value="<?php ?>" type="text" id="note_by" name="note_by"
                                    class="form-control" placeholder="Noted by" style="margin-bottom: -10px">
                                <label></label>
                                <input autocomplete="on" type="date" value="<?php  ?>" id="note_date" name="note_date"
                                    class="form-control" placeholder="Date">
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal"
                                    class="btn btn-primary waves-effect waves-light custom-btn-db"
                                    id="saveSignatoriesValues">Save
                                    changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--------------------------    VIEW SIGNATORIES MODAL     ---------------------------------------->
<div class="modal fade" id="viewSignatoriesModal" tabindex="-1" role="dialog">
    <div class="modal-dialog-centered modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Signatories</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form role="form" method="POST" action="<?php echo base_url() ?>#" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label class="sm-label">Submitted by</label>
                                <input autocomplete="on" value="<?php ?>" type="text" id="view_sub_by" name=""
                                    class="form-control" placeholder="Submitted by" style="margin-bottom: -10px">
                                <label></label>
                                <input autocomplete="on" type="date" value="<?php  ?>" id="view_sub_date" name=""
                                    class="form-control" placeholder="Date">
                            </div>
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label class="sm-label">Reviewed by</label>
                                <input autocomplete="on" value="<?php ?>" type="text" id="view_rev_by" name=""
                                    class="form-control" placeholder="Reviewed by" style="margin-bottom: -10px">
                                <label></label>
                                <input autocomplete="on" type="date" value="<?php  ?>" id="view_rev_date" name=""
                                    class="form-control" placeholder="Date">
                            </div>
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label class="sm-label">Audited by</label>
                                <input autocomplete="on" value="<?php ?>" type="text" id="view_audit_by" name=""
                                    class="form-control" placeholder="Audited by" style="margin-bottom: -10px">
                                <label></label>
                                <input autocomplete="on" type="date" value="<?php  ?>" id="view_audit_date" name=""
                                    class="form-control" placeholder="Date">
                            </div>
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label class="sm-label">Noted by</label>
                                <input autocomplete="on" value="<?php ?>" type="text" id="view_note_by" name=""
                                    class="form-control" placeholder="Noted by" style="margin-bottom: -10px">
                                <label></label>
                                <input autocomplete="on" type="date" value="<?php  ?>" id="view_note_date" name=""
                                    class="form-control" placeholder="Date">
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal"
                                    class="btn btn-default waves-effect waves-light" id="">Close
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>