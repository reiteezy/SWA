<div class="modal fade" id="acctgConfirmModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Transaction Confirmation</h5>
                <button type="button"class="btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="sm-label" for="swa_id">SWA ID</label> <!-- to be replace with actual swa control number-->
                    <input type="text" id="swaId" name="swa_id" class="form-control" style="text-align: right;"
                        readonly="readonly">
                </div>
                <div class="form-group">
                    <label class="sm-label" for="crfcv_no">Transaction Number<span style="color: red;">*</span></label>
                    <input type="text" id="crfcvNo" name="crfcvNo" class="form-control">
                </div>
                <div class="form-group">
                    <label class="sm-label" for="crfcv_no">Date<span style="color: red;">*</span></label>
                    <input type="date" id="crfcvDate" name="crfcvDate" class="form-control">
                </div>
                <div class="form-group">
                    <label class="sm-label" for="crfcv_no">Amount<span style="color: red;">*</span></label>
                    <input type="text" id="crfcvAmount" name="crfcvAmount" class="form-control">
                    <div id="validationMessage" style="color: red;"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="save-acctg-tn">Submit</button>
            </div>
        </div>
    </div>
</div>