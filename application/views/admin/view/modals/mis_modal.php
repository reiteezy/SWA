<div class="modal fade" id="misConfirmModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="assignSignatoriesModalLabel">Transaction Confirmation</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="sm-label" for="swa_id">SWA ID</label>
                    <input type="text" id="swaId" name="swa_id" class="form-control" style="text-align: right;"
                        readonly="readonly">
                </div>
                <div class="form-group">
                    <label class="sm-label" for="transactNo">Transaction Number<span style="color: red;">*</span></label>
                    <input type="text" id="transactNo" name="transactNo" class="form-control"
                        style="text-align: right;">
                </div>
                <div class="form-group">
                    <label class="sm-label" for="transactNo">Date<span style="color: red;">*</span></label>
                    <input type="date" id="transactDate" name="transactDate" class="form-control"
                        style="text-align: right;">
                </div>
                <div class="form-group">
                    <label class="sm-label" for="transactNo">Amount<span style="color: red;">*</span></label>
                    <input type="text" id="transactAmount" name="transactAmount" class="form-control"
                        style="text-align: right;">
                    <div id="validationMessageNo" style="color: red;"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light"
                    id="save-mis-tn">Submit</button>
            </div>
        </div>
    </div>
</div>