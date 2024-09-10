<div class="modal fade" id="acctgConfirmModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Transaction Confirmation</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <span class="input-group-text addon-style">
                        <label class>SWA ID</label>
                    </span>
                    <input type="text" id="swaId" name="swa_id" class="form-control" readonly="readonly">
                </div>
                <div class="input-group">
                    <span class="input-group-text addon-style">
                        <label class>Transaction No.</label>
                    </span>
                    <input type="text" id="crfcvNo" name="crfcvNo" class="form-control">
                </div>
                <div class="input-group">
                    <span class="input-group-text addon-style">
                        <label class>Date</label>
                    </span>
                    <input type="date" id="crfcvDate" name="crfcvDate" class="form-control">
                </div>
                <div class="input-group">
                    <span class="input-group-text addon-style">
                        <label class>Amount</label>
                    </span>
                    <input type="text" id="crfcvAmount" name="crfcvAmount" class="form-control">
                    <div id="validationMessage" style="color: red;"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary waves-effect waves-light"
                    id="save-acctg-tn">Submit</button>
            </div>
        </div>
    </div>
</div>