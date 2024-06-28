<!-- <div class="main-body"> -->
<!-- <div class="page-wrapper">
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12"> -->

<div class="card table-card user-card">

    <div id="digital-clock" class="user-digital-clock"></div>
    <nav class="navbar second-navbar navbar-expand-lg navbar-light" style="background: transparent">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- <div class="collapse navbar-collapse" id="navbarNav"> -->
            <ul class="navbar-nav" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#acctglist" role="tab">STOCK
                        WITHDRAWAL ADVICE LIST</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#pedninglist" role="tab">VIEW PENDING</a>
                </li>
            </ul>

            <!-- </div> -->

        </div>
    </nav>

    <div class="floating-button">
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#swaFormModal">
            <i class="feather icon-plus"></i>
        </a>
    </div>
    <div class="tab-content tabs card-block">
        <div class="tab-pane active" id="acctglist" role="tabpanel">
            <div class="card-header">
                <h5>Stock Withdrawal Advice List</h5>
            </div>
            <div class="card-block">
                <div class="table-responsive">
                    <table class="table table-hover" id="acctgtable" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Control No.</th>
                                <th>Date</th>
                                <th>Origin</th>
                                <th>Destination</th>
                                <th>CRF/CV Number</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($noDataFound){ ?>
                            <tr>
                                <td colspan="7" class="dataTables_empty text-center">No records found</td>
                            </tr>
                            <?php } else { ?>
                            <?php  
                              $count = 1;
                             
                              foreach ($swa_datas as $data):
                              ?>
                            <tr>
                                <td style="width: 5%;"><?php echo $count++ ?></td>
                                <td style="width: 10%;"><?php echo $data->SWA_ID; ?></td>
                                <!-- to be changed to actual control number-->
                                <td style="width: 10%;"><?php echo date("F j, Y", strtotime($data->DOCUMENT_DATE)); ?>
                                </td>
                                <td><?php echo $data->LOCATION; ?></td>
                                <td><?php echo $data->DESCRIPTION; ?></td>
                                <td><?php echo $data->SWA_CRFCV_NO; ?></td>
                                <td>
                                    <?php if(!empty($data->SWA_CRFCV_NO)) { ?>
                                    <span class="badge badge-success acctg-status"
                                        sid="<?php echo $data->SWA_ID?>">Confirmed</span>
                                    <?php } else { ?>
                                    <span class="badge badge-warning acctg-status"
                                        sid="<?php echo $data->SWA_ID?>">Pending</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <button type="button" class="acctg-confirm-btn" title="Confirm"
                                        style="background: transparent; border: none;"
                                        data-swa-id="<?php echo $data->SWA_ID; ?>"
                                        data-control-no="<?php echo $data->SWA_CONTROL_NO; ?>"
                                        data-crfcv-no="<?php echo $data->SWA_CRFCV_NO; ?>" data-toggle="modal"
                                        data-target="#acctgConfirmModal"><img
                                            src="<?php echo base_url('')?>assets/backend/img/icons/confirm.png"
                                            alt="View" style="width: 20px;">
                                    </button>
                                </td>
                            </tr>
                            <?php  
                              endforeach;
                            }
                              ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="pedninglist" role="tabpanel">
            <div class="card-header">
                <h5>Stock Withdrawal Advice Form</h5>
            </div>
            <div class="card-block">
                <div class="table-responsive">
                    <table class="table table-hover" id="acctgpendingtable" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Control No.</th>
                                <th>Date</th>
                                <th>Origin</th>
                                <th>Destination</th>
                                <th>CRF/CV Number</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($noDataFound){ ?>
                            <tr>
                                <td colspan="7" class="dataTables_empty text-center">No records found</td>
                            </tr>
                            <?php } else { ?>
                            <?php  
                              $count = 1;
                             
                              foreach ($swa_datas as $data):
                              ?>
                            <tr>
                                <td style="width: 5%;"><?php echo $count++ ?></td>
                                <td style="width: 10%;"><?php echo $data->SWA_ID; ?></td>
                                <!-- to be changed to actual control number-->
                                <td style="width: 10%;"><?php echo date("F j, Y", strtotime($data->DOCUMENT_DATE)); ?>
                                </td>
                                <td><?php echo $data->LOCATION; ?></td>
                                <td><?php echo $data->DESCRIPTION; ?></td>
                                <td><?php echo $data->SWA_CRFCV_NO; ?></td>
                                <td>
                                    <?php if(!empty($data->SWA_CRFCV_NO)) { ?>
                                    <span class="badge badge-success acctg-status"
                                        sid="<?php echo $data->SWA_ID?>">Confirmed</span>
                                    <?php } else { ?>
                                    <span class="badge badge-warning acctg-status"
                                        sid="<?php echo $data->SWA_ID?>">Pending</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <button type="button" class="acctg-confirm-btn" title="Confirm"
                                        style="background: transparent; border: none;"
                                        data-swa-id="<?php echo $data->SWA_ID; ?>"
                                        data-control-no="<?php echo $data->SWA_CONTROL_NO; ?>"
                                        data-crfcv-no="<?php echo $data->SWA_CRFCV_NO; ?>" data-toggle="modal"
                                        data-target=""><img
                                            src="<?php echo base_url('')?>assets/backend/img/icons/confirm.png"
                                            alt="View" style="width: 20px;">
                                    </button>
                                </td>
                            </tr>
                            <?php  
                              endforeach;
                            }
                              ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="acctgConfirmModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Transaction Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    style="width: 120px;">Close</button>
                <button type="button" class="btn btn-success save-acctg-tn" style="width: 120px;"><img
                        src="<?php echo base_url('')?>assets/backend/img/icons/save.png"
                        style="width: 15px; margin-right: 10px;">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    var acctgStatusButtons = document.querySelectorAll('.acctg_status');
    acctgStatusButtons.forEach(function(button) {
        button.addEventListener('click', function() {

            var id = button.getAttribute('sid');
            var status = button.getAttribute('sstatus');
            console.log(status);
            Swal.fire({
                title: 'Change receive status?',
                text: 'Are you sure you want to change receive status?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
            }).then((result) => {
                if (result.isConfirmed) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST',
                        '<?php echo base_url() ?>SwaController/acctg_status_changed',
                        true);
                    xhr.setRequestHeader('Content-Type',
                        'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            var response = JSON.parse(xhr.responseText);

                            Swal.fire({
                                title: response.status === 'success' ?
                                    'Success' : 'Error',
                                text: response.message,
                                icon: response.status === 'success' ?
                                    'success' : 'error'
                            });

                            var newStatus = response.status === 'success' ? (
                                    status === 'confirmed' ? 'pending' : 'confirmed'
                                ) :
                                status;
                            var buttonText = newStatus === 'confirmed' ?
                                '<img src="<?php echo base_url('')?>assets/backend/img/icons/received.png" alt="Receive" style="width: 25px;">' :
                                '<img src="<?php echo base_url('')?>assets/backend/img/icons/received.png" alt="Receive" style="width: 25px;">';
                            button.innerHTML = buttonText;
                            button.setAttribute('sstatus', newStatus);
                            var statusElements = document.querySelectorAll(
                                '.acctg-status[sid="' + id + '"]');
                            var statusText = newStatus === 'confirmed' ?
                                'Confirmed' :
                                'Pending';
                            statusElements.forEach(function(element) {
                                element.innerHTML = statusText;
                                element.style.color = newStatus ===
                                    'confirmed' ?
                                    '#fff' : '#212529';
                                element.style.backgroundColor =
                                    newStatus ===
                                    'confirmed' ?
                                    '#28a745' : '#ffc107';

                            });
                        }
                    };
                    xhr.send('swa_id=' + id + '&acctg_status=' + status);
                }
            });
        });
    });


    $(document).on('click', '.acctg-confirm-btn', function() {
        console.log("clicked");
        var swaId = $(this).data("swa-id");
        $.ajax({
            url: '<?php echo base_url() ?>SwaController/confirm_view/' + swaId,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log('Data received:', data);
                $('#swaId').val(data.SWA_ID);
                // $('#crfcvNo').val(data.SWA_CRFCV_NO);

                // $('#acctgConfirmModal').modal('show');
            }
        });
    });

    $(".save-acctg-tn").on("click", function(event) {
        var crfcvNoInput = document.querySelector('[name="crfcvNo"]');
        var crfcvDateInput = document.querySelector('[name="crfcvDate"]');
        var crfcvAmountInput = document.querySelector('[name="crfcvAmount"]');
        var validationMessage = document.getElementById('validationMessage');
        if (crfcvNoInput.value.trim() === '' || crfcvDateInput.value.trim() === '' ||
            crfcvAmountInput.value.trim() === '') {
            validationMessage.textContent = 'Please fill in required fields.';
            return;
        }
        Swal.fire({
            title: 'Are you sure?',
            text: 'Do you want to save the changes?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                var swa_id = $('#swaId').val();
                var crfcv_no = $('input[name="crfcvNo"]').val();
                var crfcv_date = $('input[name="crfcvDate"]').val();
                var crfcv_amount = $('input[name="crfcvAmount"]').val();
                console.log(crfcv_no);
                $.ajax({
                    url: '<?php echo base_url() ?>SwaController/saveTransactNoAcctg',
                    type: "POST",
                    data: {
                        swa_id: swa_id,
                        crfcv_no: crfcv_no,
                        crfcv_date: crfcv_date,
                        crfcv_amount: crfcv_amount
                    },
                    success: function(response) {
                        console.log("Response: " + response);
                        var responseData = JSON.parse(response);
                        Swal.fire({
                            title: responseData.status === 'success' ?
                                'Success' : 'Error',
                            text: responseData.message,
                            icon: responseData.status === 'success' ?
                                'success' : 'error'
                        }).then(() => {
                            location.reload(true);
                        });

                        $("#acctgConfirmModal").modal("hide");
                    },
                    error: function(error) {
                        console.log("Error: " + error);
                        Swal.fire({
                            title: 'Error',
                            text: 'An error occurred while processing your request!',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    });

    $('#acctgtable').DataTable({
        lengthChange: false,
        language: {
            search: '',
            searchPlaceholder: 'Search...'
        }
    });

    $('#acctgpendingtable').DataTable({
        lengthChange: false,
        language: {
            search: '',
            searchPlaceholder: 'Search...'
        }
    });

    $('.dataTables_filter input[type="search"]').css({
        'width': '300px',
        'margin-right': '10px',
        'padding': '5px',
        'box-sizing': 'border-box'
    });
});
</script>