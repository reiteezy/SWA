<script>
$(document).ready(function() {
    var supplierForm = $('#supplierForm');
    var supplierSaveButton = $('#supplierSaveButton');
    var validationMessage = $('#validationMessage');

    supplierSaveButton.on('click', function() {
        var codeInput = $('[name="sup_code"]');
        var supplierNameInput = $('[name="sup_name"]');
        var addressInput = $('[name="sup_add"]');
        var contactPersonInput = $('[name="sup_contact"]');
        var phoneNoInput = $('[name="sup_phoneno"]');
        var telexInput = $('[name="sup_telno"]');

        if (codeInput.val().trim() === '' || supplierNameInput.val().trim() === '' || addressInput.val()
            .trim() === '' || contactPersonInput.val().trim() === '' || phoneNoInput.val().trim() ===
            '' || telexInput.val().trim() === ''
        ) {
            validationMessage.text('Please fill in all required fields.');
            return;
        }

        validationMessage.text('');

        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to save this data?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then(function(result) {
            if (result.isConfirmed) {
                $.ajax({
                    url: supplierForm.attr('action'),
                    type: supplierForm.attr('method'),
                    data: new FormData(supplierForm[0]),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log("Response:", response);
                        var responseData = response;

                        Swal.fire({
                            title: responseData.status === 'success' ?
                                'Success' : 'Error',
                            text: responseData.message,
                            icon: responseData.status === 'success' ?
                                'success' : 'error'
                        }).then(function() {
                            location.reload(true);
                        });
                    },
                    error: function(error) {
                        console.log("Error: " + error);
                    }
                });
            }
        });
    });

    $(document).on('click', '.editSupplierButton', function() {

        var supplierId = $(this).data('sup-id');
        var supplierCode = $(this).data('sup-code');
        var supplierName = $(this).data('sup-name');
        var supplierAddress = $(this).data('sup-address');
        var supplierContact = $(this).data('sup-contact');
        var supplierPhoneno = $(this).data('sup-phoneno');
        var supplierTelno = $(this).data('sup-telno');

        $('#sup_id').val(supplierId);
        $('#sup_editcode').val(supplierCode);
        $('#sup_editname').val(supplierName);
        $('#sup_editaddress').val(supplierAddress);
        $('#sup_editcontact').val(supplierContact);
        $('#sup_editphoneno').val(supplierPhoneno);
        $('#sup_edittelno').val(supplierTelno);
    });

    // Optionally, handle the save button click if you need to perform validation or AJAX submit
    var saveEditButton = $('#saveEditButton');
    var supEditForm = $('#supEditForm');
    var formChanged = false;

    var formInputs = supEditForm.find('input, textarea, select');
    formInputs.on('input', function() {
        formChanged = true;
    });

    saveEditButton.on('click', function() {
        var supplierId = $('#sup_id').val();
        console.log(supplierId);
        if (!formChanged) {
            Swal.fire({
                title: 'No Changes Made',
                text: 'There are no changes to save.',
                icon: 'info'
            });
            return;
        }

        Swal.fire({
            title: 'Confirm Changes',
            text: 'Are you sure you want to save these changes?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then(function(result) {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?php echo base_url(); ?>SupplierController/edit_supplier/" +
                    supplierId,
                    type: supEditForm.attr('method'),
                    data: new FormData(supEditForm[0]),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log("Response:", response);
                        var responseData = response;

                        Swal.fire({
                            title: responseData.status === 'success' ?
                                'Success' : 'Error',
                            text: responseData.message,
                            icon: responseData.status === 'success' ?
                                'success' : 'error'
                        }).then(function() {
                            window.location.href =
                                '<?php echo base_url() ?>SupplierController/supplier';
                        });
                    },
                    error: function(error) {
                        console.log("Error: " + error);
                    }
                });
            }
        });
    });


    $('.deleteButton').on('click', function() {
        var deleteUrl = $(this).data('delete-url');

        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to delete this data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then(function(result) {
            if (result.isConfirmed) {
                // Send AJAX request for delete operation
                $.ajax({
                    url: deleteUrl,
                    type: 'GET',
                    success: function(response) {
                        console.log("Response:", response);
                        var responseData = response;

                        Swal.fire({
                            title: responseData.status === 'success' ?
                                'Success' : 'Error',
                            text: responseData.message,
                            icon: responseData.status === 'success' ?
                                'success' : 'error'
                        }).then(function() {
                            location.reload(true);
                        });
                    },
                    error: function(error) {
                        console.log("Error: " + error);
                    }
                });
            }
        });
    });
});
$(document).ready(function() {
    $('#suptable').DataTable({
        lengthChange: false,
        language: {
            search: '',
            searchPlaceholder: ' Search...'
        }
    });
});


$('.dataTables_filter input[type="search"]').css({
    'width': '300px',
    'margin-right': '10px',
    'padding': '5px',
    'box-sizing': 'border-box'
});
</script>