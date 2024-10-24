<!------------------------ SUBSIDIARY MODAL------------------>

<div class="modal fade" id="addSubModal" tabindex="-1" role="dialog">
    <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Subsidiary</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form role="form" id="subForm" method="post"
                        action="<?php echo base_url() ?>SubsidiaryController/new_subsidiary"
                        enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label"> Code</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="sub_code" id="sub_code"
                                    placeholder="Enter code">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label"> Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="sub_descript" id="sub_descript"
                                    placeholder="Enter description">

                            </div>

                        </div>
                        <span id="validationMessage" class="messages" style="color: red"></span>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect waves-light custom-btn-db"
                    id="saveButton">Save</button>
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!------------------------ END OF ADD SUBSIDIARY MODAL------------------>
<!------------------------ EDIT SUBSIDIARY MODAL------------------>

<div class="modal fade" id="editSubsidiaryModal" tabindex="-1" role="dialog">
    <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Subsidiary</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form role="form" id="subEditForm" method="post" enctype="multipart/form-data" action="">
                        <input type="hidden" id="sub_id" name="sub_id" value="">
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label">Code</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="update_subcode" id="sub_editcode"
                                    placeholder="Enter code">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label">Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="update_subdescript" id="sub_editdescript"
                                    placeholder="Enter description">
                            </div>
                        </div>
                        <span id="validationMessage" class="messages" style="color: red"></span>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect waves-light custom-btn-db"
                    id="saveEditButton">Update</button>
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!------------------------ END OF EDIT SUBSIDIARY MODAL------------------>