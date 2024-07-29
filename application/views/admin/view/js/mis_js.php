
<script>
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
                    '<?php echo base_url() ?>SwaController/mis_status_changed', true);
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
                            status === 'cancelled' ? 'pending' : 'cancelled') : status;

                        button.setAttribute('sstatus', newStatus);
                        var statusElements = document.querySelectorAll(
                            '.mis-status[sid="' + id + '"]');
                        var statusText = newStatus === 'cancelled' ? 'Cancelled' :
                            'Pending';
                        statusElements.forEach(function(element) {
                            element.innerHTML = statusText;
                            element.style.color = newStatus === 'cancelled' ?
                                '#fff' : '#212529';
                            element.style.backgroundColor = newStatus ===
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

$(document).ready(function() {

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

    $("#save-mis-tn").on("click", function(event) {
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
    $('#mistable').DataTable({
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