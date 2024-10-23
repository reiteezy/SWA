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

    $("#save-acctg-tn").on("click", function(event) {
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
                        dataTable_accounting.ajax.reload();
                        $('input[name="crfcvNo"]').val('');
                        $('input[name="crfcvDate"]').val('');
                        $('input[name="crfcvAmount"]').val('');
                        console.log("Response: " + response);
                        var responseData = JSON.parse(response);
                        Swal.fire({
                            title: responseData.status === 'success' ?
                                'Success' : 'Error',
                            text: responseData.message,
                            icon: responseData.status === 'success' ?
                                'success' : 'error'
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

    function reload_table() {
        dataTable_accounting.ajax.reload();
}

    var dataTable_accounting = $('#acctgtable').DataTable({
        processing: true,
        serverSide: true,
        searching: true,
        lengthChange: false,
        ordering: false,
        ajax: {
            url: "<?php echo base_url(); ?>SwaController/get_swa_list",
            type: "POST",
            data: function(d) {
                d.start = d.start || 0;
                d.length = d.length || 10;
            }
        },
        columns: [{
                data: 'SWA_ID'
            },
            {
                data: 'DOCUMENT_DATE'
            },
            {
                data: 'LOCATION'
            },
            {
                data: 'DESCRIPTION'
            },
            {
                data: 'SWA_CRFCV_NO'
            },
            {
                data: null,
                orderable: false,
                render: function(data, type, row) {
                    if(row.SWA_CRFCV_NO == '' || row.SWA_CRFCV_NO == null){
                    return `
                                <button type="button" class="acctg-confirm-btn  btn waves-effect waves-light btn-primary custom-btn-db" 
                                data-swa-id="${row.SWA_ID}"
                                data-toggle="modal" 
                                title="Confirm"
                                data-target="#acctgConfirmModal">
                                <i class="icofont icofont-check" style="padding-left: 5px;"></i>
                                </button>
                            `;
                        } else {
                            return `
                                <button type="button" class="acctg-confirm-btn btn waves-effect waves-light btn-primary custom-btn-db" disabled
                                data-swa-id="${row.SWA_ID}" 
                                data-toggle="modal" 
                                title="Confirm" 
                                data-target="#acctgConfirmModal">
                                <i class="icofont icofont-check" style="padding-left: 5px;"></i>
                                </button>
                            `;
                        }
                }
            }
        ],
        paging: true,
        pagingType: "full_numbers",
        lengthMenu: [
            [10, 25, 50, 1000],
            [10, 25, 50, "Max"]
        ],
        pageLength: 10,
        language: {
            search: '',
            searchPlaceholder: ' Search...',
            processing: '<div class="table-loader"></div>'
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