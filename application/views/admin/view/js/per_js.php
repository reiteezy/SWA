<script>
$(document).ready(function() {
    function getDate() {
        var today = new Date();
        $('#document_date').val(today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + (
            '0' + today.getDate()).slice(-2));
    }

    $(window).on('load', function() {
        getDate();
    });

    $('#clearForm').on('click', function(event) {
        event.preventDefault();
        checkIfEmpty();
    });

    function checkIfEmpty() {
        var formData = $('#perForm').serializeArray();
        var isFormEmpty = formData.every(function(field) {
            return field.value === '';
        });

        if (isFormEmpty) {
            Swal.fire({
                title: 'Form is already empty!',
                icon: 'info',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok'
            });
        } else {
            confirmReset();
        }
    }

    function confirmReset() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'This will reset all text!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, reset it!'
        }).then(function(result) {
            if (result.isConfirmed) {
                $('#perForm')[0].reset();
                clearTable();
            }
        });
    }
});


$(document).ready(function() {
    $("#swa_series_no").on("input", function() {
        var swa_series_no = $(this).val().trim();

        if (swa_series_no.length > 0) {
            $.ajax({
                url: '<?php echo base_url() ?>SwaController/get_swa_per',
                type: 'GET',
                data: {
                    'swa_series_no': swa_series_no
                },
                success: function(response) {
                    var response = JSON.parse(response);
                    var swaData = response.data;
                    // console.log(swaData);
                    $("#swaDropdown").html("");
                    var uniqueSWAIds = [];
                    for (var c = 0; c < swaData.length; c++) {
                        var swaId = swaData[c].SWA_ID;
                        if (swaId.startsWith(swa_series_no)) {
                            if (!uniqueSWAIds.includes(swaId)) {
                                uniqueSWAIds.push(swaId);

                                var subCode = swaData[c].SUB_CODE;
                                var subDescription = swaData[c].DESCRIPTION;
                                var supCode = swaData[c].SUP_CODE;
                                var supName = swaData[c].SUP_NAME;
                                var promoTitle = swaData[c].SWA_PROMO_TITLE;
                                var promoMechanics = swaData[c].SWA_PROMO_MECHANICS;
                                var promoStart = swaData[c].SWA_PROMO_START;
                                var promoEnd = swaData[c].SWA_PROMO_END;
                                var swaTrans1 = swaData[c].SWA_TRANS_NO1;
                                var swaTrans2 = swaData[c].SWA_TRANS_NO2;
                                var swaTrans3 = swaData[c].SWA_TRANS_NO3;
                                // console.log(promoTitle);
                                var option = $('<div>')
                                    .addClass('dropdown-item')
                                    .css('cursor', 'pointer')
                                    .text(swaId)
                                    .click((function(swaId, subCode, subDescription,
                                        promoTitle, supCode, supName,
                                        promoMechanics, promoStart,
                                        promoEnd,
                                        swaTrans1, swaTrans2, swaTrans3) {
                                        return function() {
                                            $("#control_no").val(swaId);
                                            $("#swa_series_no").val(
                                                swaId);
                                            $("#sub_code").val(subCode);
                                            $("#sub_descript").val(
                                                subDescription);
                                            $("#sup_code").val(supCode);
                                            $("#sup_name").val(supName);
                                            $("#promo_title").val(
                                                promoTitle);
                                            $("#mechanics").val(
                                                promoMechanics);
                                            $("#promo_start").val(
                                                promoStart);
                                            $("#promo_end").val(
                                                promoEnd);
                                            $("#mis_ref_1").val(
                                                swaTrans1);
                                            $("#mis_ref_2").val(
                                                swaTrans2);
                                            $("#mis_ref_3").val(
                                                swaTrans3);
                                            populateTable(swaId);
                                            $("#swaDropdown").hide();
                                        };
                                    })(swaId, subCode, subDescription,
                                        promoTitle,
                                        supCode, supName,
                                        promoMechanics, promoStart, promoEnd,
                                        swaTrans1,
                                        swaTrans2, swaTrans3));

                                $("#swaDropdown").append(option);
                            }
                        }
                    }
                    $("#swaDropdown").show();
                },
                error: function(error) {
                    console.error("Error:", error);
                }
            });
        } else {
            $("#control_no").val('');
            $("#swa_series_no").val('');
            $("#sub_code").val('');
            $("#sub_descript").val('');
            $("#sup_code").val('');
            $("#sup_name").val('');
            $("#promo_title").val('');
            $("#mechanics").val('');
            $("#promo_start").val('');
            $("#promo_end").val('');
            $("#mis_ref_1").val('');
            $("#mis_ref_2").val('');
            $("#mis_ref_3").val('');
            clearTable();
            $("#swaDropdown").hide();
        }
    });

    $(document).on('click', '#viewPerButton', function() {
        console.log("clicked");
        var perId = $(this).data('per-id');

        $.ajax({
            url: '<?php echo base_url() ?>SwaController/view_per_form/' + perId,
            type: 'GET',
            data: {
                'per_id': perId
            },
            success: function(response) {
                var response = JSON.parse(response);
                var perData = response.data;
                // console.log(swaData);

                var fields = {
                    'PER_ID': 'view_per_controlno',
                    'SWA_ID': 'view_swa_series_no',
                    'SUB_CODE': 'view_per_subcode',
                    'SUB_DESCRIPT': 'view_per_subdescript',
                    'PER_SPONSOR_CODE': 'view_sup_code',
                    'PER_SPONSOR_NAME': 'view_sup_name',
                    'PER_PROMO_TITLE': 'view_per_promotitle',
                    'PER_MECHANICS': 'vie_per_mechanics',
                    'PROMO_START': 'view_promo_start',
                    'PROMO_END': 'view_promo_end',
                    'PER_MISREF_NO1': 'view_mis_ref_1',
                    'PER_MISREF_NO2': 'view_mis_ref_2',
                    'PER_MISREF_NO3': 'view_mis_ref_3',
                    'PER_SUMMARY': 'view_per_summary',
                    'PER_REMARK': 'View_post_promo_remarks',
                    'DOCUMENT_DATE': 'view_document_date'
                };
                // console.log(swaData.SWA_CRFCV_NO);
                $.each(fields, function(key, value) {

                    var fieldValue = perData[key];

                    $("#" + value).val(fieldValue);
                });

                $(document).on('click', '.viewSignatoriesButton', function() {
                    populateSignatories(perId);
                });

                $('#printLink').attr('href',
                    '<?php echo base_url() ?>SwaController/printPer/' + perId);

                $('.printView').click(function() {
                    $('#printLink')[0]
                .click();
                });

                populateViewTable(perId);
            },
            error: function(error) {
                console.error("Error:", error);
            }
        });

    });

    function populateSignatories(perId) {
        $.ajax({
            url: '<?php echo base_url() ?>SwaController/get_per_signatories/' + perId,
            type: 'GET',
            data: {
                'per_id': perId
            },
            success: function(response) {
                var response = JSON.parse(response);
                var signatoriesData = response.data;
                // console.log(signatoriesData);

                var fields = {
                    'PER_SUBMIT_BY': 'view_sub_by',
                    'PER_SUBMIT_BY_DATE': 'view_sub_date',
                    'PER_REVIEW_BY': 'view_rev_by',
                    'PER_REVIEW_BY_DATE': 'view_rev_date',
                    'PER_AUDIT_BY': 'view_audit_by',
                    'PER_AUDIT_BY_DATE': 'view_audit_date',
                    'PER_NOTE_BY': 'view_note_by',
                    'PER_NOTE_BY_DATE': 'view_note_date'
                };

                $.each(fields, function(key, value) {
                    $("#" + value).val(signatoriesData[key]);
                });
            },
            error: function(error) {
                console.error("Error:", error);
            }
        });
    }

    function populateViewTable(perId) {
        $.ajax({
            url: '<?php echo base_url() ?>SwaController/get_per_details/' + perId,
            type: 'GET',
            data: {
                'per_id': perId
            },
            success: function(response) {
                var response = JSON.parse(response);
                var perDetailsData = response.data;

                console.log(perDetailsData);
                $("#tbody-view").html("");
                for (var i = 0; i < perDetailsData.length; i++) {
                    var newRow = $('<tr>');
                    newRow.append(
                        '<td>' + perDetailsData[i].PER_QUANTITY +
                        '</td>'
                    );
                    newRow.append(
                        '<td>' + perDetailsData[i].PER_UNIT +
                        '</td>'
                    );
                    newRow.append(
                        '<td>' + perDetailsData[i].PER_ITEM_DESCRIPTION +
                        '</td>'
                    );
                    newRow.append(
                        '<td>' + perDetailsData[i].PER_ACTUAL_EXECUTE_QTY +
                        '</td>'
                    );
                    newRow.append(
                        '<td>' + perDetailsData[i].PER_UNUSED_ALLOCATION +
                        '</td>'
                    );
                    $("#tbody-view").append(newRow);
                }
            },
            error: function(error) {
                console.error("Error fetching swa_details_tbl:", error);
            }
        });
    }

    function populateTable(swaId) {
        $.ajax({
            url: '<?php echo base_url() ?>SwaController/get_swa_details/' + swaId,
            type: 'GET',
            data: {
                'swa_id': swaId
            },
            success: function(response) {
                var response = JSON.parse(response);
                var swaDetailsData = response.data;

                $("#tbody").html("");

                for (var i = 0; i < swaDetailsData.length; i++) {
                    var newRow = $('<tr>');
                    newRow.append(
                        '<td><input class="form-control" type="text" name="datas[' + i +
                        '][qty]" value="' + swaDetailsData[i].SWA_QUANTITY +
                        '" style="text-align: center; border-color: #4c4c4c; border: none; box-shadow: none;"></td>'
                    );
                    newRow.append(
                        '<td><input class="form-control" type="text" name="datas[' + i +
                        '][unit]" value="' + swaDetailsData[i].SWA_UNIT +
                        '" style="text-align: center; border-color: #4c4c4c; border: none; box-shadow: none;"></td>'
                    );
                    newRow.append(
                        '<td><input class="form-control" type="text" name="datas[' + i +
                        '][descript]" value="' + swaDetailsData[i].SWA_DESCRIPTION +
                        '" style="text-align: center; border-color: #4c4c4c; border: none; box-shadow: none;" ></td>'
                    );
                    newRow.append(
                        '<td><input class="form-control" type="text" name="datas[' + i +
                        '][actual_qty]" autocomplete="off" style="text-align: center; border-color: #4c4c4c; border: none; box-shadow: none;" oninput="calculateDifferenceAmt(this)"></td>'
                    );
                    newRow.append(
                        '<td><input class="form-control" type="text" name="datas[' + i +
                        '][unused_alloc]" autocomplete="off" value="" style="text-align: center; border-color: #4c4c4c; border: none; box-shadow: none;"></td>'
                    );


                    $("#tbody").append(newRow);
                }
            },
            error: function(error) {
                console.error("Error fetching swa_details_tbl:", error);
            }
        });
    }


    function clearTable() {
        $("#tbody").html("");
    }

    // Event listener for Save button
    $('#saveButton').on('click', function(event) {
        event.preventDefault();
        checkIfFormEmpty();
    });

    // Function to check if form is empty
    function checkIfFormEmpty() {
        var formData = new FormData($('#perForm')[0]);

        var isFormEmpty = Array.from(formData.values()).every(value => value === '');

        if (isFormEmpty) {
            Swal.fire({
                title: 'Form is empty!',
                icon: 'info',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok'
            });
        } else {
            showConfirmation();
        }
    }

    // Function to show confirmation dialog
    function showConfirmation() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You are about to save the data.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, save it!'
        }).then((result) => {
            if (result.isConfirmed) {
                saveFormData();
            }
        });
    }

    // Function to save form data via AJAX
    function saveFormData() {
        var formData = new FormData($('#perForm')[0]);

        $.ajax({
            url: '<?php echo base_url() ?>SwaController/new_per',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status === 'success') {
                    showSuccessAlert(response.message, response.perId);
                } else {
                    showErrorAlert(response.message);
                }
            },
            error: function(error) {
                showErrorAlert('Error saving data!');
            }
        });
    }

    // Function to show success alert
    function showSuccessAlert(message, recordId) {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: message,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Print',
            cancelButtonText: 'Not Now'
        }).then((result) => {
            if (result.isConfirmed) {
                var numberOfCopies = 3;
                var pdfUrl = '<?php echo base_url() ?>SwaController/printPer/' + recordId + '?copies=' + numberOfCopies;
                var printWindow = window.open(pdfUrl, '_blank');

                location.reload();
                printWindow.onload = function() {
                    printWindow.print();
                };
            } else {
                location.reload();
            }
        });
    }

    // Function to show error alert
    function showErrorAlert(message) {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: message,
        }).then(() => {
            // Optionally handle reload or other actions
        });
    }

    // Function to get current date in YYYY-MM-DD format
    function getCurrentDate() {
        const now = new Date();
        const year = now.getFullYear();
        let month = (now.getMonth() + 1).toString().padStart(2, "0");
        let day = now.getDate().toString().padStart(2, "0");
        return `${year}-${month}-${day}`;
    }

    // Object containing input IDs and default date values
    const dateInputs = {
        "sub_date": getCurrentDate(),
        "rev_date": getCurrentDate(),
        "audit_date": getCurrentDate(),
        "note_date": getCurrentDate()
    };

    // Set default dates for specified inputs
    for (const inputId in dateInputs) {
        if (dateInputs.hasOwnProperty(inputId)) {
            const inputValue = dateInputs[inputId];
            $('#' + inputId).val(inputValue);
        }
    }

    $(document).on('click', '#saveSignatoriesValues', function() {
        var subByValue = $('#sub_by').val();
        var subDateValue = $('#sub_date').val();
        var revByValue = $('#rev_by').val();
        var revDateValue = $('#rev_date').val();
        var auditByValue = $('#audit_by').val();
        var auditDateValue = $('#audit_date').val();
        var noteByValue = $('#note_by').val();
        var noteDateValue = $('#note_date').val();

        if (subByValue) {
            $('#perForm').append('<input type="hidden" name="sub_by" value="' + subByValue +
                '">');
        }
        if (subByValue && subDateValue) {
            $('#perForm').append('<input type="hidden" name="sub_date" value="' + subDateValue +
                '">');
        }
        if (revByValue) {
            $('#perForm').append('<input type="hidden" name="rev_by" value="' + revByValue +
                '">');
        }
        if (revByValue && revDateValue) {
            $('#perForm').append('<input type="hidden" name="rev_date" value="' + revDateValue +
                '">');
        }
        if (auditByValue) {
            $('#perForm').append('<input type="hidden" name="audit_by" value="' + auditByValue +
                '">');
        }
        if (auditByValue && auditDateValue) {
            $('#perForm').append('<input type="hidden" name="audit_date" value="' +
                auditDateValue + '">');
        }
        if (noteByValue) {
            $('#perForm').append('<input type="hidden" name="note_by" value="' + noteByValue +
                '">');
        }
        if (noteByValue && noteDateValue) {
            $('#perForm').append('<input type="hidden" name="note_date" value="' +
                noteDateValue + '">');
        }
    });

    $(document).on('input', 'input[name*="[actual_qty]"]', function() {
        calculateDifferenceAmt($(this));
    });




    $('#pertable').DataTable({
        lengthChange: false,
        language: {
            search: '',
            searchPlaceholder: 'Search...'
        },
        ordering: false
    });



    $('.dataTables_filter input[type="search"]').css({
        'width': '300px',
        'margin-right': '10px',
        'padding': '5px',
        'box-sizing': 'border-box'
    });
});

function calculateDifferenceAmt(inputField) {
    var $inputField = $(inputField); // Ensure inputField is a jQuery object
    var $row = $inputField.closest("tr"); // Get the closest <tr> element
    var rowIndex = $row.index(); // Get the index of the <tr> element

    var qtyValue = $('input[name="datas[' + rowIndex + '][qty]"]').val();
    var actualQtyInput = $inputField.val();
    var unusedValue = $('input[name="datas[' + rowIndex + '][unused_alloc]"]');

    var qty = parseFloat(qtyValue) || 0;
    var actualQty = parseFloat(actualQtyInput) || 0;

    if (actualQty) {
        var unused = qty - actualQty;
        unusedValue.val(unused.toFixed(2));
    } else {
        unusedValue.val("");
    }
}
</script>