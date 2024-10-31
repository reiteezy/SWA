<!------------------------ ADD SUPPLIER MODAL------------------>
<div class="modal fade" id="addSupModal" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Supplier</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                    <form role="form" id="supplierForm" method="POST"
                        action="<?php echo base_url() ?>SupplierController/new_supplier" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label"> Code</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="sup_code" id="sup_code"
                                    placeholder="Enter code">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label"> Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sup_name" name="sup_name"
                                    placeholder="Enter name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label"> Address</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sup_add" name="sup_add"
                                    placeholder="Enter address">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label">Contact Person</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sup_contact" name="sup_contact"
                                    placeholder="Enter contact person">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sup_phoneno" name="sup_phoneno"
                                    placeholder="Enter phone number">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label">Telex Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sup_telno" name="sup_telno"
                                    placeholder="Enter telex number">
                            </div>
                        </div>
                        <span id="validationMessage" class="messages" style="color: red"></span>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="supplierSaveButton">Save
                    changes</button>
            </div>
        </div>
    </div>
</div>

<!------------------------ END OF ADD SUPPLIER MODAL------------------>
<!------------------------ UPDATE SUPPLIER MODAL------------------>
<div class="modal fade" id="editSupplierModal" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog-centered modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Supplier</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-block">
                <form role="form" id="supEditForm" method="post" enctype="multipart/form-data" action="">
                <input type="hidden" id="sup_id" name="sup_id" value="">
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label"> Code</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="update_supcode" id="sup_editcode"
                                    placeholder="Enter code">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label"> Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="update_supname" id="sup_editname"
                                    placeholder="Enter name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label"> Address</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="update_supaddress" id="sup_editaddress"
                                    placeholder="Enter address">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label">Contact Person</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="update_supcontact" id="sup_editcontact" 
                                    placeholder="Enter contact person">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="update_supphoneno" id="sup_editphoneno" 
                                    placeholder="Enter phone number">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-label col-sm-2 col-form-label sm-label">Telex Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="update_suptelno" id="sup_edittelno" 
                                    placeholder="Enter telex number">
                            </div>
                        </div>
                        <span id="validationMessage" class="messages" style="color: red"></span>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="saveEditButton">Update</button>
            </div>
        </div>
    </div>
</div>

<!------------------------ END OF UPDATE SUPPLIER MODAL------------------>