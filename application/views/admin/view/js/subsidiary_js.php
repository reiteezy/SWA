<!-- <script type="text/javascript" src="<?= base_url('assets/'); ?>bower_components/jquery/js/jquery-3.7.1.min.js"></script> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script> -->
<!-- <script src="<?= base_url('assets/'); ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script> -->
<script>
$(document).ready(function() {
    
    var subForm = $('#subForm');
    var saveButton = $('#saveButton');
    var validationMessage = $('#validationMessage');

    saveButton.click(function() {
        var codeInput = $('[name="sub_code"]');
        var descriptInput = $('[name="sub_descript"]');

        if (codeInput.val().trim() === '' || descriptInput.val().trim() === '') {
            validationMessage.text('Please fill in all fields.');
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
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: subForm.attr('action'),
                    type: subForm.attr('method'),
                    data: new FormData(subForm[0]),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log("Response:", response);
                        var responseData = response;

                            dataTable_sub.ajax.reload();
                        Swal.fire({
                            title: responseData.status === 'success' ?
                                'Success' : 'Error',
                            text: responseData.message,
                            icon: responseData.status === 'success' ?
                                'success' : 'error'
                        }).then(() => {
                            $('[name="sub_code"]').val('');
                            $('[name="sub_descript"]').val('');
                            // $("#addSubModal").modal('hide');
                        });
                    },
                    error: function(error) {
                        Swal.fire('Error',
                            'There was a problem processing your request.',
                            'error');
                    }
                });
            }
        });
    });
    

    $(document).on('click', '.editSubsidiaryButton', function() {
        var subsidiaryId = $(this).data('sub-id');
        var subsidiaryCode = $(this).data('sub-code');
        var subsidiaryDescription = $(this).data('sub-descript');

        console.log(subsidiaryId);
        console.log(subsidiaryCode);
        console.log(subsidiaryDescription);
        $('#sub_id').val(subsidiaryId);
        $('#sub_editcode').val(subsidiaryCode);
        $('#sub_editdescript').val(subsidiaryDescription);
    });

    var saveEditButton = $('#saveEditButton');
    var subEditForm = $('#subEditForm');
    var formChanged = false;

    var formInputs = subEditForm.find('input, textarea, select');
    formInputs.on('input', function() {
        formChanged = true;
    });

    saveEditButton.on('click', function() {
        var subsidiaryId = $('#sub_id').val();
        console.log(subsidiaryId);
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
                    url: "<?php echo base_url(); ?>SubsidiaryController/edit_subsidiary/" +
                        subsidiaryId,
                    type: subEditForm.attr('method'),
                    data: new FormData(subEditForm[0]),
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
                           
                            dataTable_sub.ajax.reload();
                        });
                    },
                    error: function(error) {
                        console.log("Error: " + error);
                    }
                });
            }
        });
    });

    $(document).on('click', '.deleteButton', function() {
        var deleteUrl = $(this).data('delete-url');
console.log(deleteUrl);
        Swal.fire({
            title: 'Are you sure?',
            text: 'You want to delete this data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: deleteUrl,
                    type: 'GET',
                    success: function(response) {
                        console.log("Response:", response);
                        var responseData = response;

                            Swal.fire({
                            title: responseData.status ===
                                'success' ? 'Success' : 'Error',
                            text: responseData.message,
                            icon: responseData.status ===
                                'success' ? 'success' : 'error'
                        }).then(() => {
                            
                            dataTable_sub.ajax.reload();
                        });
                    },
                    error: function(error) {
                        console.log("Error: " + error);
                    }
                });
            }
        });
    });


var baseUrl = "<?php echo base_url(); ?>"
function reload_table() {
    dataTable_sub.ajax.reload();
}

    var dataTable_sub = $('#subtable').DataTable({
        processing: true,
        serverSide: true,
        searching: true,
        lengthChange: false,
        ordering: false,
        ajax: {
            url: "<?php echo base_url(); ?>SubsidiaryController/get_subsidiary_list",
            type: "POST",
            data: function(d) {
                d.start = d.start || 0;
                d.length = d.length || 10;
                // d.tab = getSelectedTab();
            }
        },
        columns: [{
                data: 'CODE'
            },
            {
                data: 'DESCRIPTION'
            },
            {
                data: null,
                orderable: false,
                render: function(data, type, row) {
                    return `  
                            <button type="button" class="editSubsidiaryButton btn waves-effect waves-light btn-primary custom-btn-db" style="" 
                            title="Edit" 
                            data-sub-id="${row.ID}" 
                            data-sub-code="${row.CODE}" 
                            data-sub-descript="${row.DESCRIPTION}" 
                            data-toggle="modal" 
                            data-target="#editSubsidiaryModal">
                            <i class="icofont icofont-edit-alt" style="padding-left: 5px;"></i>
                            </button>
                            <button type="button" class="deleteButton btn waves-effect waves-light btn-primary custom-btn-db" title="Delete" 
                            style="" 
                            data-delete-url="${baseUrl}SubsidiaryController/del_subsidiary/${row.ID}">
                            <i class="icofont icofont-ui-delete" style="padding-left: 5px;"></i>
                            </button>
                            
                          `;
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