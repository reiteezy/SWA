<!------------------------ USER TYPE MODAL------------------>

<div class="modal fade" id="addTypeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New User Type</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form role="form" id="classForm" method="POST" action="<?php echo base_url() ?>ClassController/new_type" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label"> Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="user_class" id="user_class"
                                    placeholder="Enter class name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label"> Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="user_descript" name="user_descript"
                                    placeholder="Enter description">
                            </div>
                        </div>
                        <span id="validationMessage" class="messages" style="color: red"></span>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="classSaveButton">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!------------------------ END OF ADD USER TYPE MODAL------------------>
<!------------------------ EDIT USER TYPE MODAL------------------>

<div class="modal fade" id="editClassModal" tabindex="-1" role="dialog">
    <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User Type</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                <form role="form" id="classEditForm" method="post" enctype="multipart/form-data" action="">
                <input type="hidden" id="class_id" name="class_id" value="">
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label"> Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="update_userclass" id="user_editclass"
                                    placeholder="Enter class name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label"> Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="update_userdescript" id="user_editdescript"
                                    placeholder="Enter description">
                            </div>
                        </div>
                        <span id="validationMessage" class="messages" style="color: red"></span>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="saveEditButton">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!------------------------ END OF EDIT USER TYPE MODAL------------------>
