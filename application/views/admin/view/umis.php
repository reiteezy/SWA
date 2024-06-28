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
                    <a class="nav-link active" data-bs-toggle="tab" href="#mislist" role="tab">STOCK
                        WITHDRAWAL ADVICE LIST</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#pendinglist" role="tab">VIEW PENDING</a>
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
        <div class="tab-pane active" id="mislist" role="tabpanel">
            <div class="card-header">
                <h5>Stock Withdrawal Advice List</h5>
            </div>
            <div class="card-block">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="mistable">
                        <thead>
                            <tr>
                                <!-- <th>#</th> -->
                                <th>Control No.</th>
                                <th>Date</th>
                                <th>Origin</th>
                                <th>Destination</th>
                                <th>Transaction No. 1</th>
                                <th>Transaction No. 2</th>
                                <th>Transaction No. 3</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($noDataFound){ ?>
                            <tr>
                                <td colspan="9" class="dataTables_empty text-center">No records found</td>
                            </tr>
                            <?php } else { ?>
                            <?php  
                              foreach ($swa_datas as $data): 
                              ?>
                            <tr>
                                <!-- <td><?php #echo $count++; ?></td> -->
                                <td style="text-align: center;"><?php echo $data->SWA_ID; ?></td>
                                <td><?php echo date("F j, Y", strtotime($data->DOCUMENT_DATE)); ?></td>
                                <td><?php echo $data->LOCATION; ?></td>
                                <td><?php echo $data->DESCRIPTION; ?></td>
                                <td><?php echo $data->SWA_TRANS_NO1;?></td>
                                <td><?php echo $data->SWA_TRANS_NO2; ?></td>
                                <td><?php echo $data->SWA_TRANS_NO3; ?></td>
                                <td>
                                    <?php  if ($data->SWA_MIS_STATUS == 'cancelled') { ?>
                                    <span class="badge badge-danger mis-status"
                                        sid="<?php echo $data->SWA_ID?>">Cancelled</span>
                                    <?php } elseif ($data->SWA_MIS_STATUS == 'pending') { ?>
                                    <span class="badge badge-warning mis-status"
                                        sid="<?php echo $data->SWA_ID?>">Pending</span>
                                    <?php } elseif ($data->SWA_MIS_STATUS == 'confirmed') { ?>
                                    <span class="badge badge-warning mis-status"
                                        sid="<?php echo $data->SWA_ID?>">Confirmed</span>
                                    <?php }  ?>
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
        <div class="tab-pane" id="pendinglist" role="tabpanel">
            <div class="card-header">
                <h5>Stock Withdrawal Advice Form</h5>
            </div>
            <div class="card-block">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="mispendingtable">
                        <thead>
                            <tr>
                                <!-- <th>#</th> -->
                                <th>Control No.</th>
                                <th>Date</th>
                                <th>Origin</th>
                                <th>Destination</th>
                                <th>Transaction No. 1</th>
                                <th>Transaction No. 2</th>
                                <th>Transaction No. 3</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($noDataFound){ ?>
                            <tr>
                                <td colspan="9" class="dataTables_empty text-center">No records found</td>
                            </tr>
                            <?php } else { ?>
                            <?php  
                              $count = 1;
                              foreach ($swa_datas as $data): 
                              ?>
                            <tr>
                                <!-- <td><?php #echo $count++; ?></td> -->
                                <td style="text-align: center;"><?php echo $data->SWA_ID; ?></td>
                                <td><?php echo date("F j, Y", strtotime($data->DOCUMENT_DATE)); ?></td>
                                <td><?php echo $data->LOCATION; ?></td>
                                <td><?php echo $data->DESCRIPTION; ?></td>
                                <td><?php echo $data->SWA_TRANS_NO1;?></td>
                                <td><?php echo $data->SWA_TRANS_NO2; ?></td>
                                <td><?php echo $data->SWA_TRANS_NO3; ?></td>
                                <td>
                                    <?php  if ($data->SWA_MIS_STATUS == 'cancelled') { ?>
                                    <span class="badge badge-danger mis-status"
                                        sid="<?php echo $data->SWA_ID?>">Cancelled</span>
                                    <?php } elseif ($data->SWA_MIS_STATUS == 'pending') { ?>
                                    <span class="badge badge-warning mis-status"
                                        sid="<?php echo $data->SWA_ID?>">Pending</span>
                                    <?php } elseif ($data->SWA_MIS_STATUS == 'confirmed') { ?>
                                    <span class="badge badge-warning mis-status"
                                        sid="<?php echo $data->SWA_ID?>">Confirmed</span>
                                    <?php }  ?>
                                </td>
                                <td>
                                    <button class="btn waves-effect waves-light btn-danger btn-icon mis_status"
                                        id="<?php echo $data->SWA_ID; ?>" sid="<?php echo $data->SWA_ID; ?>"
                                        sstatus="<?php echo $data->SWA_MIS_STATUS; ?>" title="Receive"
                                        <?php echo !empty($data->SWA_TRANS_NO1) ? 'disabled' : ''; ?>
                                        style="cursor: pointer;"><i class="feather icon-slash"></i></button>
                                    <button class="btn waves-effect waves-light btn-success btn-icon mis-confirm-btn"
                                        data-swa-id="<?php echo $data->SWA_ID; ?>" data-toggle="modal" title="Confirm"
                                        data-target="#misConfirmModal" style="cursor: pointer;"><i
                                            class="feather icon-check"></i></button>
                                    <!-- <button type="button" class="mis_status" id="<?php #echo $data->SWA_ID?>"
                                        style="background: transparent; border: none;"
                                        sid="<?php #echo $data->SWA_ID; ?>"
                                        sstatus="<?php #echo  $data->SWA_MIS_STATUS ?>" title="Receive"><img
                                            src="<?php #echo base_url('')?>assets/backend/img/icons/received.png"
                                            alt="Receive" style="width: 25px;"></button>
                                    <button type="button" class="mis-confirm-btn"
                                        style="background: transparent; border: none;"
                                        data-swa-id="<?php #echo $data->SWA_ID; ?>" data-toggle="modal" title="Confirm"
                                        data-target="#misConfirmModal"><img
                                            src="<?php #echo base_url('')?>assets/backend/img/icons/confirm.png"
                                            alt="View" style="width: 20px;"></button> -->

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
<!-- -->
<!-- </div>
        </div>
    </div>
</div> -->

<div class="modal fade" id="misConfirmModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="">Transaction Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    style="width: 120px;">Close</button>
                <button type="button" class="btn btn-success save-mis-tn" style="width: 120px;"><img
                        src="<?php echo base_url('')?>assets/backend/img/icons/save.png"
                        style="width: 15px; margin-right: 10px;">Save</button>
                <!-- <button type="button" data-dismiss="modal" class="btn btn-primary">OK</button> -->
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    var misStatusButtons = document.querySelectorAll('.mis_status');
    misStatusButtons.forEach(function(button) {
        button.addEventListener('click', function() {

            var id = button.getAttribute('sid');
            var status = button.getAttribute('sstatus');
            console.log(status);
            Swal.fire({
                title: 'Change status?',
                text: 'Are you sure you want to change status?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
            }).then((result) => {
                if (result.isConfirmed) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST',
                        '<?php echo base_url() ?>SwaController/mis_status_changed',
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
                                status === 'cancelled' ? 'pending' : 'cancelled'
                            ) : status;

                            button.setAttribute('sstatus', newStatus);
                            var statusElements = document.querySelectorAll(
                                '.mis-status[sid="' + id + '"]');
                            var statusText = newStatus === 'cancelled' ?
                                'Cancelled' :
                                'Pending';
                            statusElements.forEach(function(element) {
                                element.innerHTML = statusText;
                                element.style.color = newStatus ===
                                    'cancelled' ?
                                    '#fff' : '#212529';
                                element.style.backgroundColor =
                                    newStatus ===
                                    'cancelled' ?
                                    '#DC3545' : '#ffc107';

                            });
                        }
                    };
                    xhr.send('swa_id=' + id + '&mis_status=' + status);
                }
            });
        });
    });


    $(document).on('click', '.mis-confirm-btn', function() {
        console.log("clicked");
        var swaId = $(this).data("swa-id");
        $.ajax({
            url: '<?php echo base_url() ?>SwaController/confirm_view/' + swaId,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // console.log('Data received:', data);
                $('#swaId').val(data.SWA_ID);
            }
        });
    });

    $(".save-mis-tn").on("click", function(event) {
        var transactNoInput = document.querySelector('[name="transactNo"]');
        var transactDateInput = document.querySelector('[name="transactDate"]');
        var transactAmountInput = document.querySelector('[name="transactAmount"]');
        var validationMessageNo = document.getElementById('validationMessageNo');
        if (transactNoInput.value.trim() === '' || transactDateInput.value.trim() === '' ||
            transactAmountInput.value.trim() === '') {
            validationMessageNo.textContent = 'Please fill in required fields.';
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
                var transactNo = $('input[name="transactNo"]').val();
                var transactDate = $('input[name="transactDate"]').val();
                var transactAmount = $('input[name="transactAmount"]').val();
                $.ajax({
                    url: '<?php echo base_url() ?>SwaController/saveTransactNoMis',
                    type: "POST",
                    data: {
                        swa_id: swa_id,
                        transactNo: transactNo,
                        transactDate: transactDate,
                        transactAmount: transactAmount
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

                        $("#swaConfirmModal").modal("hide");
                    },

                    error: function(xhr, status, error) {
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
});

$(document).ready(function() {
    $('#mistable').DataTable({
        //  pageLength: 15, 
        lengthChange: false,
        language: {
            search: '',
            searchPlaceholder: 'Search...'
        }
    });

    $('#mispendingtable').DataTable({
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