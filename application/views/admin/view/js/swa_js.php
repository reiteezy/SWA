<script>
function getDate() {
    var today = new Date();
    $("#document_date").val(today.getFullYear() + '-' +
        ('0' + (today.getMonth() + 1)).slice(-2) + '-' +
        ('0' + today.getDate()).slice(-2));
}
$(document).ready(function() {
    getDate();
});

function handleLocChange() {
    var locSelect = $("#loc");
    var otherDetailsInput = $("#otherDetails");

    if (locSelect.val() === "Others") {
        otherDetailsInput.css({
            display: "block",
            marginTop: "-25px"
        });
    } else {
        otherDetailsInput.css({
            display: "none",
            marginTop: ""
        }).val("");
    }
}
</script>
<script>
function calculateTotalAmt(inputField) {
    var rowIndex = $(inputField).closest("tr").index();
    var qtyInput = $("input[name='datas[" + rowIndex + "][qty]']");
    var unitCostInput = $("input[name='datas[" + rowIndex +
        "][unit_cost]']");
    var amtInput = $("input[name='datas[" + rowIndex + "][amt]']");

    var qty = parseFloat(qtyInput.val()) || 0;
    var unitCost = parseFloat(unitCostInput.val()) || 0;

    if (qty && unitCost) {
        var total = qty * unitCost;
        amtInput.val(total.toFixed(2));
    } else {
        amtInput.val("");
    }
    calculateGrandTotal();
}

function calculateGrandTotal() {
    var totalSum = 0;

    $("input[name*='[amt]']").each(function() {
        var amtValue = parseFloat($(this).val()) || 0;
        totalSum += amtValue;
    });

    $("#total").val(totalSum.toFixed(2));
}

var data = 7;

function addItem() {
    data++;
    var html = "<tr data-row='" + data + "' style='box-shadow: none;'>";
    html +=
        "<td><input class='form-control item-code-input' type='text' autocomplete='off' name='datas[" +
        data +
        "][code]' style='border-color: #4c4c4c; text-align: center; border: none; box-shadow: none;'></td>";
    html +=
        "<td><select class='form-control custom-arrow' name='datas[" +
        data + "][unit]' style='border: none; font-weight: bold; box-shadow: none;' id='datas[" +
        data +
        "][unit]'>" +
        "<option value='' hidden selected></option>" +
        "</select></td>";
    html +=
        "<td><input class='form-control' type='text' autocomplete='off' name='datas[" +
        data +
        "][qty]' oninput='calculateTotalAmt(this)' style='border-color: #4c4c4c; text-align: center; border: none; box-shadow: none;'></td>";
    html +=
        "<td><input class='form-control' type='hidden' autocomplete='off' name='datas[" +
        data +
        "][barcode]' id='datas[" +
        data +
        "][barcode]'><input class='form-control' type='hidden' autocomplete='off' name='datas[" +
        data +
        "][item_code]' id='datas[" +
        data +
        "][item_code]'><input class='form-control item-description' type='text' autocomplete='off' id='datas[" +
        data +
        "][descript]' name='datas[" +
        data +
        "][descript]' style='border-color: #4c4c4c; text-align: center; border: none; box-shadow: none;'></td>";
    html +=
        "<td><input class='form-control' type='text' autocomplete='off' id='datas[" +
        data +
        "][unit_cost]' name='datas[" +
        data +
        "][unit_cost]' oninput='calculateTotalAmt(this)' style='border-color: #4c4c4c; text-align: center; border: none; box-shadow: none;'></td>";
    html +=
        "<td><input class='form-control' type='text' readonly autocomplete='off' id='datas[" +
        data +
        "][amt]' name='datas[" +
        data +
        "][amt]' style='border-color: #4c4c4c; text-align: center; border: none; background-color: transparent; box-shadow: none;'></td>";
    html += "</tr>";

    var newRow = $("#tbody").append(html).find('tr:last');

}

addItem();
$(document).on('keydown', function(e) {
    if (e.key === 'Tab') {
        // e.preventDefault(); 
        var lastInput = $('#tbody tr:last-child .form-control:last-child');
        if (lastInput.is(':focus')) {
            addItem();
        }
    }
});

$(document).ready(function() {
    $('#clearForm').on('click', function(event) {
        event.preventDefault();
        checkIfEmpty();
    });

    function checkIfEmpty() {
        var form = $('#swaForm')[0];
        var formData = new FormData(form);
        var isFormEmpty = Array.from(formData.values()).every(value => value === '');

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
        }).then((result) => {
            if (result.isConfirmed) {
                $('#swaForm')[0].reset(); // Convert to jQuery object
            }
        });
    }
});


$(document).ready(function() {
    $(document).on("keypress", ".item-code-input", function(event) {
        if (event.which === 13) {
            var row = $(this).closest("tr").attr("data-row");
            var item_input = $(this).val().trim();
            var dataToSend = {};

            if (item_input.length > 0) {
                dataToSend = {
                    'item_input': item_input
                };

                $.ajax({
                    url: '<?php echo base_url() ?>SwaController/get_item_code',
                    type: 'POST',
                    data: dataToSend,
                    success: function(response) {
                        var itemData = response.barcodes;
                        console.log("Item Data:", itemData);

                        if (itemData.length === 0) {
                            showItemNotFoundAlert();
                        } else {
                            var latestPrices = {};

                            for (var i = 0; i < itemData.length; i++) {
                                var item = itemData[i];
                                var uom = item['Unit of Measure Code'];
                                var unitPrice = parseFloat(item['MaxUnitPrice']);
                                var startingDate = new Date(item['LatestDate']);

                                if (!latestPrices[uom] || startingDate >
                                    latestPrices[
                                        uom]
                                    .startingDate) {
                                    latestPrices[uom] = {
                                        unitPrice: unitPrice,
                                        startingDate: startingDate,
                                        item: item
                                    };
                                }
                            }

                            var uomOptions = Object.keys(latestPrices);
                            console.log("Unique UOM Types with Latest Prices:",
                                uomOptions);

                            var dropdown = $("#datas\\[" + row + "\\]\\[unit\\]");
                            dropdown.empty();
                            dropdown.append($('<option>', {
                                value: '',
                                text: 'Select UOM',
                                selected: true,
                                hidden: true
                            }));

                            uomOptions.forEach(function(uom) {
                                dropdown.append($('<option>', {
                                    value: uom,
                                    text: uom,
                                    'data-price': latestPrices[
                                            uom]
                                        .unitPrice.toFixed(2)
                                }));
                            });

                            var selectedItem = latestPrices[uomOptions[0]].item;
                            var itemCode = selectedItem['Item No_'];
                            var itemBarCode = selectedItem['Barcode No_'];
                            var itemDescription = selectedItem['Description'];

                            $("#datas\\[" + row + "\\]\\[item_code\\]").val(
                                itemCode);
                            $("#datas\\[" + row + "\\]\\[barcode\\]").val(
                                itemBarCode);
                            $("#datas\\[" + row + "\\]\\[descript\\]").val(
                                itemDescription);
                            $("#datas\\[" + row + "\\]\\[unit_cost\\]").val('');

                            dropdown.off('change').on('change', function() {
                                var selectedUOM = $(this).val();
                                if (selectedUOM) {
                                    var selectedPrice = $(this).find(
                                        'option:selected').data('price');
                                    $("#datas\\[" + row +
                                            "\\]\\[unit_cost\\]")
                                        .val(
                                            selectedPrice);
                                } else {
                                    $("#datas\\[" + row +
                                            "\\]\\[unit_cost\\]")
                                        .val(
                                            '');
                                }
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        showItemNotFoundAlert();
                        console.error("AJAX Error:", error);
                        console.log("Response:", xhr.responseText);
                    }
                });
            } else {
                showItemNotFoundAlert();
                $("#datas\\[" + row + "\\]\\[item_code\\]").val('');
                $("#datas\\[" + row + "\\]\\[barcode\\]").val('');
                $("#datas\\[" + row + "\\]\\[descript\\]").val('');
                $("#datas\\[" + row + "\\]\\[unit_cost\\]").val('');
            }
        }
    });


    function showItemNotFoundAlert() {
        // console.log("showItemNotFoundAlert() function called");
        Swal.fire({
            title: 'Item not found',
            text: 'No item found for the entered code or barcode',
            icon: 'info',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        });
    }

    $(document).on("keypress", ".vendor-code-input", function(event) {
        if (event.which === 13) {
            var vendor_input = $(this).val().trim().toLowerCase();
            var dataToSend = {};

            if (vendor_input.length > 0) {
                dataToSend = {
                    'vendor_input': vendor_input
                };

                $.ajax({
                    url: '<?php echo base_url() ?>SwaController/get_vendor',
                    type: 'POST',
                    data: dataToSend,
                    success: function(response) {

                        console.log("Response:", response);
                        var vendorData = response.vendors;
                        console.log("Item Data:", vendorData);

                        if (vendorData.length === 0) {
                            showVendorNotFoundAlert();
                        } else {

                            for (var i = 0; i < vendorData.length; i++) {
                                var vendor = vendorData[i];
                                var vendorNo = vendor['No_'];
                                var vendorName = vendor['Name'];
                            }

                            $("#sup_code").val(vendorNo);
                            $("#sup_name").val(vendorName);

                        }
                    },
                    error: function(xhr, status, error) {
                        showItemNotFoundAlert();
                        console.error("AJAX Error:", error);
                        console.log("Response:", xhr.responseText);
                    }
                });
            } else {
                showVendorNotFoundAlert();
                $("#sup_code").val('');
                $("#sup_name").val('');
            }
        }
    });

    function showVendorNotFoundAlert() {
        // console.log("showItemNotFoundAlert() function called");
        Swal.fire({
            title: 'Vendor not found',
            text: 'No vendor found for the entered vendor code',
            icon: 'info',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        });
    }

    var saveButton = document.getElementById('saveButton');
    var swaForm = document.getElementById('swaForm');

    saveButton.addEventListener('click', function() {
        event.preventDefault();
        checkIfFormEmpty();
    });

    function checkIfFormEmpty() {
        var formData = new FormData(swaForm);
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

    function saveFormData() {
        var formData = new FormData(swaForm);
        $.ajax({
            url: '<?php echo base_url() ?>SwaController/new_swa',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                if (response.status === 'success') {
                    showSuccessAlert(response.message, response.swaId);
                } else {
                    showErrorAlert(response.message);
                }
            },
            error: function(error) {
                console.error(error);
                showErrorAlert('Error saving data!');
            }
        });
    }

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
                var pdfUrl = '<?php echo base_url() ?>SwaController/printSwa/' + recordId + '?copies=' + numberOfCopies;
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

    function showErrorAlert(message) {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: message,
            // timer: 2000,
            // showConfirmButton: false,
        }).then(() => {
            location.reload();
        });
    }

    function getCurrentDate() {
        const now = new Date();
        const year = now.getFullYear();
        let month = (now.getMonth() + 1).toString().padStart(2, "0");
        let day = now.getDate().toString().padStart(2, "0");
        return `${year}-${month}-${day}`;
    }

    const dateInputs = {
        "req_date": getCurrentDate(),
        "rev_date": getCurrentDate(),
        "app_date": getCurrentDate(),
        "rel_date": getCurrentDate(),
        "rec_date": getCurrentDate()
    };

    for (const inputId in dateInputs) {
        if (dateInputs.hasOwnProperty(inputId)) {
            const inputElement = document.getElementById(inputId);
            if (inputElement) {
                inputElement.value = dateInputs[inputId];
            }
        }
    }
});
</script>

<script>
//MODAL-----------------------------------------

$(document).ready(function() {

    $('#subsidiary-select-table').DataTable({
        lengthChange: false,
        language: {
            search: '',
            searchPlaceholder: 'Search...'
        }
    });
    $(document).on('change', '.subsidiary-checkbox', function() {
        if ($(this).is(":checked")) {
            updateModalValues($(this));
            $(".subsidiary-checkbox").not(this).prop('checked', false);
        } else {
            resetModalValues();
        }
    }); -
    $(document).on('click', '.select-subsidiary', function() {
        if (!$(event.target).is(":checkbox")) {
            var checkbox = $(this).find('.subsidiary-checkbox');
            checkbox.prop('checked', !checkbox.prop('checked')).change();
        }
    });

    function updateModalValues(checkbox) {
        var selectedId = checkbox.val();
        var selectedCode = checkbox.closest("tr").find("td:nth-child(2)").text();
        var selectedDescription = checkbox.closest("tr").find("td:nth-child(3)").text();

        $("#sub_id").val(selectedId);
        $("#sub_code").val(selectedCode);
        $("#sub_descript").val(selectedDescription);
    }

    function resetModalValues() {
        $("#sub_id").val("");
        $("#sub_code").val("");
        $("#sub_descript").val("");
    }
});
</script>

<script>
$(document).ready(function() {
    $(document).on('click', '.viewSwaButton', function() {

        var swaId = $(this).data('swa-id');

        $.ajax({
            url: '<?php echo base_url() ?>SwaController/view_swa_form/' + swaId,
            type: 'GET',
            data: {
                'swa_id': swaId
            },
            success: function(response) {
                var response = JSON.parse(response);
                var swaData = response.data;
                console.log(swaData);

                var fields = {
                    'SWA_ID': 'view_controlno',
                    'SUB_CODE': 'view_subcode',
                    'DESCRIPTION': 'view_subdescript',
                    'DOCUMENT_DATE': 'view_docdate',
                    'SUP_CODE': 'view_supcode',
                    'SUP_NAME': 'view_supname',
                    'LOCATION': 'view_loc',
                    'SWA_TOTAL': 'view_swatotal',
                    'SWA_ACCOUNTING_INSTRUCT': 'view_accounting_instruct',
                    'SWA_REMARK': 'view_remark',
                    'SWA_PER_NO': 'view_perno',
                    'SWA_CRFCV_NO': 'view_crfcvno'
                };
                console.log(swaData.SWA_CRFCV_NO);
                $.each(fields, function(key, value) {

                    var fieldValue = swaData[key];
                    if (key === 'SWA_TOTAL') {
                        fieldValue = parseFloat(fieldValue).toFixed(2);
                    }

                    $("#" + value).val(fieldValue);
                });
                if (swaData.SWA_TRANS_NO3) {
                    $('#view_transno').val(swaData.SWA_TRANS_NO3);
                } else if (swaData.SWA_TRANS_NO2) {
                    $('#view_transno').val(swaData.SWA_TRANS_NO2);
                } else {
                    $('#view_transno').val(swaData.SWA_TRANS_NO1);
                }

                $(document).on('click', '.viewSignatoriesButton', function() {
                    populateSignatories(swaId);
                });

                $(document).on('click', '.viewPromoButton', function() {
                    populatePromoDetails(swaId);
                });

                $('#printLink').attr('href',
                    '<?php echo base_url() ?>SwaController/printSwa/' + swaId);

                $('.printView').click(function() {
                    $('#printLink')[0]
                .click();
                });

                populateTable(swaId);
            },
            error: function(error) {
                console.error("Error:", error);
            }
        });


    });

    function populateSignatories(swaId) {
        $.ajax({
            url: '<?php echo base_url() ?>SwaController/get_swa_signatories/' + swaId,
            type: 'GET',
            data: {
                'swa_id': swaId
            },
            success: function(response) {
                var response = JSON.parse(response);
                var signatoriesData = response.data;
                console.log(signatoriesData);

                var fields = {
                    'SWA_REQUEST_BY': 'vew_reqby',
                    'SWA_REQUEST_BY_DATE': 'vew_reqdate',
                    'SWA_REVIEW_BY': 'view_revby',
                    'SWA_REVIEW_BY_DATE': 'view_revdate',
                    'SWA_APPROVE_BY': 'view_appby',
                    'SWA_APPROVE_BY_DATE': 'view_appdate',
                    'SWA_RELEASE_BY': 'view_relby',
                    'SWA_RELEASE_BY_DATE': 'view_reldate',
                    'SWA_RECEIVE_BY': 'view_recby',
                    'SWA_RECEIVE_BY_DATE': 'view_recdate'
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

    function populatePromoDetails(swaId) {

        $.ajax({
            url: '<?php echo base_url() ?>SwaController/get_promo/' + swaId,
            type: 'GET',
            data: {
                'swa_id': swaId
            },
            success: function(response) {
                var response = JSON.parse(response);
                var promoData = response.data;
                console.log(promoData);

                var fields = {
                    'SWA_PROMO_TITLE': 'view_promotitle',
                    'SWA_PROMO_MECHANICS': 'view_promomechanics',
                    'SWA_PROMO_START': 'view_promostart',
                    'SWA_PROMO_END': 'view_promoend'
                };

                $.each(fields, function(key, value) {
                    $("#" + value).val(promoData[key]);
                });
            },
            error: function(error) {
                console.error("Error:", error);
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
                console.log(swaDetailsData);
                $("#tbodyview").html("");

                for (var i = 0; i < swaDetailsData.length; i++) {
                    // console.log("Item total in should be:", swaDetailsData[i].SWA_ITEM_CODE);
                    var newRow = $('<tr>');
                    newRow.append(
                        '<td>' + swaDetailsData[
                            i].SWA_QUANTITY +
                        '</td>'
                    );
                    newRow.append(
                        '<td>' + swaDetailsData[
                            i].SWA_UNIT +
                        '</td>'
                    );
                    newRow.append(
                        '<td>' + swaDetailsData[
                            i].SWA_ITEM_CODE +
                        ' ' + swaDetailsData[
                            i].SWA_DESCRIPTION +
                        '</td>'
                    );
                    newRow.append(
                        '<td>' + swaDetailsData[
                            i].SWA_UNIT_COST +
                        '</td>'
                    );
                    newRow.append(
                        '<td>' + swaDetailsData[
                            i].SWA_AMOUNT +
                        '</td></tr>'
                    );

                    $("#tbodyview").append(newRow);
                }
            },
            error: function(error) {
                console.error("Error fetching swa_details_tbl:", error);
            }
        });
    }

    // $(document).on('change', '.supplier-checkbox', function() {
    //     $(".supplier-checkbox").not(this).prop("checked", false);
    //     if ($(this).is(":checked")) {
    //         updateSupplierModalValues($(this));
    //     } else {
    //         resetSupplierModalValues();
    //     }
    // });

    // $(document).on('click', '.select-supplier', function() {
    //     if (!$(event.target).is(":checkbox")) {
    //         var checkbox = $(this).find('.supplier-checkbox');
    //         checkbox.prop('checked', !checkbox.prop('checked')).change();
    //     }
    // });

    // function updateSupplierModalValues(checkbox) {
    //     var selectedId = checkbox.val();
    //     var selectedCode = checkbox.closest("tr").find("td:nth-child(2)").text();
    //     var selectedSupplierName = checkbox.closest("tr").find("td:nth-child(3)").text();

    //     $("#sup_id").val(selectedId);
    //     $("#sup_code").val(selectedCode);
    //     $("#sup_name").val(selectedSupplierName);
    // }

    // function resetSupplierModalValues() {
    //     $("#sup_id").val("");
    //     $("#sup_code").val("");
    //     $("#sup_name").val("");
    // }

    $('#savePDValues').on('click', function() {
        var promoTitleValue = $('#promo_title').val();
        var promoMechanicsValue = $('#promo_mechanics').val();
        var promoStartValue = $('#promo_start').val();
        var promoEndValue = $('#promo_end').val();
        $('#swaForm').append('<input type="hidden" name="promo_title" value="' +
            promoTitleValue +
            '">');
        $('#swaForm').append('<input type="hidden" name="promo_mechanics" value="' +
            promoMechanicsValue + '">');
        $('#swaForm').append('<input type="hidden" name="promo_start" value="' +
            promoStartValue +
            '">');
        $('#swaForm').append('<input type="hidden" name="promo_end" value="' +
            promoEndValue + '">');
    });

    $('#saveSignatoriesValues').on('click', function() {
        var reqByValue = $('#req_by').val();
        var reqDateValue = $('#req_date').val();
        var revByValue = $('#rev_by').val();
        var revDateValue = $('#rev_date').val();
        var appByValue = $('#app_by').val();
        var appDateValue = $('#app_date').val();
        var relByValue = $('#rel_by').val();
        var relDateValue = $('#rel_date').val();
        var recByValue = $('#rec_by').val();
        var recDateValue = $('#rec_date').val();

        if (reqByValue) {
            $('#swaForm').append('<input type="hidden" name="req_by" value="' +
                reqByValue +
                '">');
        }
        if (reqDateValue && reqByValue) {
            $('#swaForm').append('<input type="hidden" name="req_date" value="' +
                reqDateValue + '">');
        }
        if (revByValue) {
            $('#swaForm').append('<input type="hidden" name="rev_by" value="' +
                revByValue +
                '">');
        }
        if (revDateValue && revByValue) {
            $('#swaForm').append('<input type="hidden" name="rev_date" value="' +
                revDateValue + '">');
        }
        if (appByValue) {
            $('#swaForm').append('<input type="hidden" name="app_by" value="' +
                appByValue +
                '">');
        }
        if (appDateValue && appByValue) {
            $('#swaForm').append('<input type="hidden" name="app_date" value="' +
                appDateValue + '">');
        }
        if (relByValue) {
            $('#swaForm').append('<input type="hidden" name="rel_by" value="' +
                relByValue +
                '">');
        }
        if (relDateValue && relByValue) {
            $('#swaForm').append('<input type="hidden" name="rel_date" value="' +
                relDateValue + '">');
        }
        if (recByValue) {
            $('#swaForm').append('<input type="hidden" name="rec_by" value="' +
                recByValue +
                '">');
        }
        if (recDateValue && recByValue) {
            $('#swaForm').append('<input type="hidden" name="rec_date" value="' +
                recDateValue + '">');
        }
    });
    $('#swatable').DataTable({
        lengthChange: false,
        language: {
            search: '',
            searchPlaceholder: 'Search...'
        },
        ordering: false
    });
    $('#supplier-select-table').DataTable({
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
</script>