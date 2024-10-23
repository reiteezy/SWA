<link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>assets/css/flatpickr.min.css">
<script type="text/javascript" src="<?= base_url('assets/'); ?>assets/js/flatpickr.min.js"></script>



<script>
$(document).ready(function() {
    var vendorFilter = ''; // Initialize vendorFilter
    fetchTableData(null, null);
    $("#filter_vendor_code").on("input", function() {
        var vendorCode = $("#filter_vendor_code").val();

        $.ajax({
            url: '<?php echo base_url('SwaController/get_nesa_vendor')?>',
            type: 'POST',
            data: {
                vendor_code: vendorCode
            },
            success: function(response) {
                var jObj = JSON.parse(response);
                console.log(jObj);

                $("#dropdown").html("");

                if (vendorCode.length > 0) {
                    for (var c = 0; c < jObj.length; c++) {
                        var vcode = jObj[c].sup_code;
                        var option = $('<div>')
                            .addClass('dropdown-item')
                            .css('cursor', 'pointer')
                            .text(vcode)
                            .click((function(vcode) {
                                return function() {
                                    // vendorCode = vcode;
                                    $("#filter_vendor_code").val(
                                        vcode);
                                    $("#dropdown").hide();
                                    vendorFilter = vcode;
                                    fetchTableData(start ? start
                                        .format('YYYY-MM-DD') :
                                        null, end ? end.format(
                                            'YYYY-MM-DD') : null
                                    );
                                    console.log(vendorFilter);
                                };
                            })(vcode));

                        $("#dropdown").append(option);
                    }

                    $("#dropdown").show();
                } else {
                    $("#dropdown").hide();
                    vendorFilter = "";
                    $("#filter_vendor_code").val("");
                    fetchTableData(null,
                        null); // Reload table without filtering
                }

            }
        });
    });
    // Function to toggle the PDF button visibility

    var start = null;
    var end = null;

    // Initialize the date range picker
    $('input[name="datefilter"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });
    // Apply selected date range
    $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format(
            'MM/DD/YYYY'));
        start = picker.startDate; // Update start date
        end = picker.endDate; // Update end date
        fetchTableData(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
    });

    // Cancel date range selection
    $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
        start = null; // Reset start date
        end = null; // Reset end date
        fetchTableData(null, null); // Reload table without date filter
    });

    // Function to fetch table data
    function fetchTableData(startDate, endDate) {
        if ($.fn.DataTable.isDataTable('#nesaTable')) {
            $('#nesaTable').DataTable().clear()
                .destroy(); // Clear and destroy the DataTable instance
        }

        var dataTable_nesa = $('#nesaTable').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            lengthChange: false,
            ordering: false,
            select: {
                style: 'multi   ',
                selector: 'td:first-child'
            },
            ajax: {
                url: "<?php echo base_url(); ?>SwaController/get_nesa_list",
                type: "POST",
                data: function(d) {
                    d.start = d.start || 0;
                    d.length = d.length || 10;
                    d.start_date = startDate;
                    d.end_date = endDate;
                    d.vendor_filter = vendorFilter;
                }
            },
            columns: [{
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: DataTable.render.select()
                },
                {
                    data: 'nesa_id'
                },
                {
                    data: 'location'
                },
                {
                    data: 'sup_code'
                },
                {
                    data: 'sup_name'
                },
                {
                    data: 'course_of_action'
                },
                {
                    data: 'document_date'
                },
                {
                    data: null,
                    orderable: false,
                    render: function(data, type, row) {
                        if (row.course_of_action == 'Buy One Take One') {
                            return `
                                <button type="button" class="viewNesaButton btn waves-effect waves-light btn-primary custom-btn-db"
                                title="View" data-nesa-id="${row.nesa_id}"
                                data-toggle="modal" data-target="#viewNesaFormModal"><i class="icofont icofont-folder-open" style="padding-left: 5px;"></i> </button>
                                <button type="button" class="createSwaButton btn waves-effect waves-light btn-primary custom-btn-db"
                                title="Create SWA" data-nesa-id="${row.nesa_id}"
                                data-toggle="modal" data-target="#swaFormModal"><i class="icofont icofont-file-alt" style="padding-left: 5px;"></i> </button>
                               
                                `;
                        } else {
                            return `
                                <button type="button" class="viewNesaButton btn waves-effect waves-light btn-primary custom-btn-db"
                                title="View" data-nesa-id="${row.nesa_id}"
                                data-toggle="modal" data-target="#viewNesaFormModal"><i class="icofont icofont-folder-open" style="padding-left: 5px;"></i> </button>
                                <button type="button" class=" btn waves-effect waves-light btn-primary custom-btn-db"
                                title="Create SCS" data-nesa-id="${row.nesa_id}"
                                data-toggle="modal" data-target="#"><i class="icofont icofont-file-alt" style="padding-left: 5px;"></i> </button>
                               
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
                // info: ""
                // infoEmpty: "",
                // infoFiltered: ""
            }
        });

        function togglePdfButton() {
            var selectedRows = dataTable_nesa.rows({
                selected: true
            }).count();
            if (selectedRows > 0) {
                $('#generatePdfButton').show();
            } else {
                $('#generatePdfButton').hide();
            }
        }

        dataTable_nesa.on('select deselect', function() {
            togglePdfButton();
        });
        togglePdfButton();

        $('#generatePdfButton').on('click', function() {
            var selectedData = [];

            // Get data for selected rows
            dataTable_nesa.rows({
                selected: true
            }).every(function() {
                selectedData.push(this.data());
            });

            if (selectedData.length > 0) {
                $.ajax({
                    url: "<?php echo base_url(); ?>SwaController/generate_pdf",
                    type: "POST",
                    data: {
                        rows: JSON.stringify(selectedData)
                    }, // Send selected data as a JSON string
                    success: function(response) {
                        // Assuming the response includes a PDF blob, create a link to download
                        var blob = new Blob([response], {
                            type: 'application/pdf'
                        });
                        var link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = 'Selected_Data.pdf';
                        link.click();
                    },
                    error: function(xhr, status, error) {
                        console.error("PDF generation error: ", error);
                        alert("Error generating PDF: " + error); // Notify user
                    }
                });
            } else {
                alert("Please select at least one row.");
            }
        });


    }


    $('.dataTables_filter input[type="search"]').css({
        'width': '300px',
        'margin-right': '10px',
        'padding': '5px',
        'box-sizing': 'border-box'
    });


    flatpickr(".datePicker", {
        dateFormat: "Y-m-d",
        allowInput: true
    });



    $(document).on("keypress", ".item-code-input", function(event) {
        console.log('yawa');
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
                                var unitPrice = parseFloat(item[
                                    'MaxUnitPrice']);
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

                            var dropdown = $("#datas\\[" + row +
                                "\\]\\[unit\\]");
                            dropdown.empty();
                            dropdown.append($('<option>', {
                                value: '',
                                text: '',
                                selected: true,
                                hidden: true
                            }));

                            uomOptions.forEach(function(uom) {
                                dropdown.append($('<option>', {
                                    value: uom,
                                    text: uom,
                                    'data-price': latestPrices[
                                            uom]
                                        .unitPrice.toFixed(
                                            2)
                                }));
                            });

                            var selectedItem = latestPrices[uomOptions[0]].item;
                            var itemCode = selectedItem['Item No_'];
                            // var itemBarCode = selectedItem['Barcode No_'];
                            var itemDescription = selectedItem['Description'];
                            console.log(itemDescription);
                            $("#datas\\[" + row + "\\]\\[item_code\\]").val(
                                itemCode);
                            // $("#datas\\[" + row + "\\]\\[barcode\\]").val(
                            //     itemBarCode);
                            $("#datas\\[" + row + "\\]\\[item_descript\\]").val(
                                itemDescription);
                            $("#datas\\[" + row + "\\]\\[unit_cost\\]").val('');

                            dropdown.off('change').on('change', function() {
                                var selectedUOM = $(this).val();
                                if (selectedUOM) {
                                    var selectedPrice = $(this).find(
                                        'option:selected').data(
                                        'price');
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
                // $("#datas\\[" + row + "\\]\\[barcode\\]").val('');
                $("#datas\\[" + row + "\\]\\[item_descript\\]").val('');
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

    $('#saveSignatoriesValues').on('click', function() {
        var sub_by = $('#sub_by').val();
        var sub_date = $('#sub_date').val();
        var sub_time = $('#sub_time').val();
        var check_by = $('#check_by').val();
        var check_date = $('#check_date').val();
        var check_time = $('#check_time').val();
        var rev_by = $('#rev_by').val();
        var rev_date = $('#rev_date').val();
        var rev_time = $('#rev_time').val();
        var app_by = $('#app_by').val();
        var app_date = $('#app_date').val();
        var app_time = $('#app_time').val();
        var rec_by = $('#rec_by').val();
        var rec_date = $('#rec_date').val();
        var rec_time = $('#rec_time').val();

        if (sub_by) {
            $('#nesaForm').append('<input type="hidden" name="sub_by" value="' +
                sub_by +
                '">');
        }
        if (sub_by && sub_date) {
            $('#nesaForm').append('<input type="hidden" name="sub_date" value="' +
                sub_date + '">');
        }
        if (sub_by && sub_date && sub_time) {
            $('#nesaForm').append('<input type="hidden" name="sub_time" value="' +
                sub_time + '">');
        }
        if (check_by) {
            $('#nesaForm').append('<input type="hidden" name="check_by" value="' +
                check_by +
                '">');
        }
        if (check_by && check_date) {
            $('#nesaForm').append('<input type="hidden" name="check_date" value="' +
                check_date + '">');
        }
        if (check_by && check_date && check_time) {
            $('#nesaForm').append('<input type="hidden" name="check_time" value="' +
                check_time + '">');
        }
        if (rev_by) {
            $('#nesaForm').append('<input type="hidden" name="rev_by" value="' +
                rev_by +
                '">');
        }
        if (rev_by && rev_date) {
            $('#nesaForm').append('<input type="hidden" name="rev_date" value="' +
                rev_date + '">');
        }
        if (rev_by && rev_date && rev_time) {
            $('#nesaForm').append('<input type="hidden" name="rev_time" value="' +
                rev_time + '">');
        }
        if (app_by) {
            $('#nesaForm').append('<input type="hidden" name="app_by" value="' +
                app_by +
                '">');
        }
        if (app_by && app_date) {
            $('#nesaForm').append('<input type="hidden" name="app_date" value="' +
                app_date + '">');
        }
        if (app_by && app_date && app_time) {
            $('#nesaForm').append('<input type="hidden" name="app_time" value="' +
                app_time + '">');
        }
        if (rec_by) {
            $('#nesaForm').append('<input type="hidden" name="rec_by" value="' +
                rec_by +
                '">');
        }
        if (rec_by && rec_date) {
            $('#nesaForm').append('<input type="hidden" name="rec_date" value="' +
                rec_date + '">');
        }
        if (rec_by && rec_date && rec_time) {
            $('#nesaForm').append('<input type="hidden" name="rec_time" value="' +
                rec_time + '">');
        }
    });


    var saveButton = document.getElementById('saveButton');
    var nesaForm = document.getElementById('nesaForm');

    saveButton.addEventListener('click', function() {
        event.preventDefault();
        checkIfFormEmpty();
    });

    function checkIfFormEmpty() {
        var formData = new FormData(nesaForm);
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
        var formData = new FormData(nesaForm);
        $.ajax({
            url: '<?php echo base_url() ?>SwaController/new_nesa',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                if (response.status === 'success') {
                    showSuccessAlert(response.message, response.nesaId);
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
            // showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok'
        }).then((result) => {
            if (result.isConfirmed) {

                $('#nesaForm')[0].reset();
                // clearTable();
                $('#sub_by').val('');
                $('#sub_date').val('');
                $('#sub_time').val('');
                $('#check_by').val('');
                $('#check_date').val('');
                $('#check_time').val('');
                $('#rev_by').val('');
                $('#rev_date').val('');
                $('#rev_time').val('');
                $('#app_by').val('');
                $('#app_date').val('');
                $('#app_time').val('');
                $('#rec_by').val('');
                $('#rec_date').val('');
                $('#rec_time').val('');
                // dataTable_nesa.ajax.reload();
                fetchTableData(null, null);

            } else {
                $('#nesaForm')[0].reset();
                // clearTable();
                $('#sub_by').val('');
                $('#sub_date').val('');
                $('#sub_time').val('');
                $('#check_by').val('');
                $('#check_date').val('');
                $('#check_time').val('');
                $('#rev_by').val('');
                $('#rev_date').val('');
                $('#rev_time').val('');
                $('#app_by').val('');
                $('#app_date').val('');
                $('#app_time').val('');
                $('#rec_by').val('');
                $('#rec_date').val('');
                $('#rec_time').val('');
                // dataTable_nesa.ajax.reload();
                fetchTableData(null, null);
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

    function getCurrentTime() {
        const now = new Date();
        let hours = now.getHours().toString().padStart(2, "0");
        let minutes = now.getMinutes().toString().padStart(2, "0");
        let seconds = now.getSeconds().toString().padStart(2, "0");
        return `${hours}:${minutes}:${seconds}`;
    }

    // Set date inputs
    const dateInputs = {
        "sub_date": getCurrentDate(),
        "check_date": getCurrentDate(),
        "rev_date": getCurrentDate(),
        "app_date": getCurrentDate(),
        "rec_date": getCurrentDate(),
        "swa_document_date": getCurrentDate(),
        "nesa_date": getCurrentDate(),
        "swa_req_date": getCurrentDate(),
        "swa_rev_date": getCurrentDate(),
        "swa_app_date": getCurrentDate(),
        "swa_rec_date": getCurrentDate(),
        "swa_rel_date": getCurrentDate(),

    };

    $.each(dateInputs, function(inputId, dateValue) {
        $("#" + inputId).val(dateValue);
    });

    // Set time inputs
    const timeInputs = {
        "sub_time": getCurrentTime(),
        "check_time": getCurrentTime(),
        "rev_time": getCurrentTime(),
        "app_time": getCurrentTime(),
        "rec_time": getCurrentTime()
    };

    $.each(timeInputs, function(inputId, timeValue) {
        $("#" + inputId).val(timeValue);
    });

    //--------------------------------------------------------------------------VIEWING NESA 
    $(document).on('click', '.viewNesaButton', function() {

        var nesaId = $(this).data('nesa-id');

        $.ajax({
            url: '<?php echo base_url() ?>SwaController/view_nesa_form/' + nesaId,
            type: 'GET',
            data: {
                'nesa_id': nesaId
            },
            success: function(response) {
                var response = JSON.parse(response);
                var nesaData = response.data;
                console.log(nesaData);

                var fields = {
                    'nesa_id': 'view_nesa_id',
                    'location': 'view_location',
                    'document_date': 'view_document_date',
                    'course_of_action': 'view_coa',
                    'sup_code': 'view_sup_code',
                    'sup_name': 'view_sup_name'
                };
                $.each(fields, function(key, value) {

                    var fieldValue = nesaData[key];
                    $("#" + value).val(fieldValue);
                });


                // $(document).on('click', '.viewSignatoriesButton', function() {
                populateSignatories(nesaId);
                // });
                populateTable(nesaId);
            },
            error: function(error) {
                console.error("Error:", error);
            }
        });


    });

    function populateSignatories(nesaId) {
        $.ajax({
            url: '<?php echo base_url() ?>SwaController/get_nesa_signatories/' + nesaId,
            type: 'GET',
            data: {
                'nesa_id': nesaId
            },
            success: function(response) {
                var response = JSON.parse(response);
                var signatoriesData = response.data;
                console.log(signatoriesData);

                var fields = {
                    'sub_by': 'view_sub_by',
                    'sub_date': 'view_sub_date',
                    'sub_time': 'view_sub_time',
                    'check_by': 'view_check_by',
                    'check_date': 'view_check_date',
                    'check_time': 'view_check_time',
                    'rev_by': 'view_rev_by',
                    'rev_date': 'view_rev_date',
                    'rev_time': 'view_rev_time',
                    'app_by': 'view_app_by',
                    'app_date': 'view_app_date',
                    'app_time': 'view_app_time',
                    'rec_by': 'view_rec_by',
                    'rec_date': 'view_rec_date',
                    'rec_time': 'view_rec_time'
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

    function populateTable(nesaId) {
        $.ajax({
            url: '<?php echo base_url() ?>SwaController/get_nesa_details/' + nesaId,
            type: 'GET',
            data: {
                'nesa_id': nesaId
            },
            success: function(response) {
                var response = JSON.parse(response);
                var nesaDetailsData = response.data;
                console.log(nesaDetailsData);
                $("#tbodyview").html("");

                for (var i = 0; i < nesaDetailsData.length; i++) {
                    var newRow = $('<tr>');
                    newRow.append(
                        '<td>' + nesaDetailsData[
                            i].item_code +
                        '</td>'
                    );
                    newRow.append(
                        '<td>' + nesaDetailsData[
                            i].item_descript +
                        '</td>'
                    );
                    newRow.append(
                        '<td>' + nesaDetailsData[
                            i].uom +
                        '</td>'
                    );
                    newRow.append(
                        '<td>' + nesaDetailsData[
                            i].qty +
                        '</td>'
                    );
                    newRow.append(
                        '<td>' + nesaDetailsData[
                            i].expiry +
                        '</td></tr>'
                    );

                    $("#tbodyview").append(newRow);
                }
            },
            error: function(error) {
                console.error("Error fetching nesa_details_tbl:", error);
            }
        });
    }

    $(document).on('click', '.createSwaButton', function() {

        var nesaId = $(this).data('nesa-id');

        $.ajax({
            url: '<?php echo base_url() ?>SwaController/view_nesa_form/' + nesaId,
            type: 'GET',
            data: {
                'nesa_id': nesaId
            },
            success: function(response) {
                var response = JSON.parse(response);
                var nesaData = response.data;
                console.log(nesaData);

                var fields = {
                    // 'nesa_id': 'view_nesa_id',
                    'location': 'loc',
                    // 'document_date': 'view_document_date',
                    'sup_code': 'swa_sup_code',
                    'sup_name': 'swa_sup_name',
                    'course_of_action': 'remark'
                };
                $.each(fields, function(key, value) {

                    var fieldValue = nesaData[key];
                    $("#" + value).val(fieldValue);
                });

                populateSwaDetailsTable(nesaId);
            },
            error: function(error) {
                console.error("Error:", error);
            }
        });
    });

    function populateSwaDetailsTable(nesaId) {
        $.ajax({
            url: '<?php echo base_url() ?>SwaController/get_nesa_details/' + nesaId,
            type: 'GET',
            data: {
                'nesa_id': nesaId
            },
            success: function(response) {
                var response = JSON.parse(response);
                var nesaDetailsData = response.data;
                console.log(nesaDetailsData);
                $("#tbody_swa").html("");
                var totalSum = 0;
                for (var i = 0; i < nesaDetailsData.length; i++) {
                    var newRow = $('<tr>');
                    newRow.append(
                        '<td><input class="form-control nesa-input-td" type="text" name="datas[' +
                        i +
                        '][item_code]" value="' + nesaDetailsData[i].item_code +
                        '" style=""></td>'
                    );
                    newRow.append(
                        '<td><input class="form-control nesa-input-td" type="text" name="datas[' +
                        i +
                        '][uom]" value="' + nesaDetailsData[i].uom +
                        '" style=""></td>'
                    );
                    newRow.append(
                        '<td><input class="form-control nesa-input-td" type="text" name="datas[' +
                        i +
                        '][qty]" value="' + nesaDetailsData[i].qty +
                        '" style=""></td>'
                    );
                    newRow.append(
                        '<td><input class="form-control nesa-input-td" type="text" name="datas[' +
                        i +
                        '][item_descript]" value="' + nesaDetailsData[i]
                        .item_descript +
                        '" style=""></td>'
                    );
                    newRow.append(
                        '<td><input class="form-control nesa-input-td" type="text" name="datas[' +
                        i +
                        '][unit_cost]" value="' + (nesaDetailsData[i].unit_cost
                            .replace(
                                /\d(?=(\d{3})+\.)/g, '$&,')) +
                        '" style=""></td>'
                    );
                    var tot_amount = nesaDetailsData[
                        i].qty * nesaDetailsData[
                        i].unit_cost
                    newRow.append(
                        '<td><input class="form-control nesa-input-td" type="text" name="datas[' +
                        i +
                        '][total_amount]" value="' + (tot_amount.toFixed(2).replace(
                            /\d(?=(\d{3})+\.)/g, '$&,')) +
                        '" style=""></td>'
                    );


                    totalSum += tot_amount;


                    $("#tbody_swa").append(newRow);
                }
                $("#total").val(totalSum.toFixed(2).replace(/\d(?=(\d{3})+\.)/g,
                    '$&,'));
            },
            error: function(error) {
                console.error("Error fetching nesa_details_tbl:", error);
            }
        });
    }



});








$(document).ready(function() {


    function clearSwaTable() {
        $("#tbody_swa").html("");
    }

    $('#clearSwaForm').on('click', function(event) {
        event.preventDefault();
        checkIfEmptySwaForm();
    });

    function checkIfEmptySwaForm() {
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
            confirmResetSwaForm();
        }
    }

    function confirmResetSwaForm() {
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
                $('#swaForm')[0].reset();
                clearSwaTable();
            }
        });
    }


    var saveSwaButton = document.getElementById('saveSwaButton');
    var swaForm = document.getElementById('swaForm');

    saveSwaButton.addEventListener('click', function() {
        event.preventDefault();
        checkIfSwaFormEmpty();
    });

    function checkIfSwaFormEmpty() {
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

            showSwaConfirmation();
        }
    }

    function showSwaConfirmation() {
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
                saveSwaFormData();
            }
        });
    }

    function saveSwaFormData() {
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
                    showSwaSuccessAlert(response.message, response.swaId);
                } else {
                    showSwaErrorAlert(response.message);
                }
            },
            error: function(error) {
                console.error(error);
                showSwaErrorAlert('Error saving data!');
            }
        });
    }

    function showSwaSuccessAlert(message, recordId) {
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
                var pdfUrl = '<?php echo base_url() ?>SwaController/printSwa/' + recordId +
                    '?copies=' +
                    numberOfCopies;
                var printWindow = window.open(pdfUrl, '_blank');

                $('#swaForm')[0].reset();
                clearSwaTable();
                $('#swa_req_by').val('');
                $('#swa_req_date').val('');
                $('#swa_rev_by').val('');
                $('#swa_rev_date').val('');
                $('#swa_app_by').val('');
                $('#swa_app_date').val('');
                $('#swa_rel_by').val('');
                $('#swa_rel_date').val('');
                $('#swa_rec_by').val('');
                $('#swa_rec_date').val('');
                $('#promo_title').val('');
                $('#promo_mechanics').val('');
                $('#promo_start').val('');
                $('#promo_end').val('');
                dataTable_swa.ajax.reload();
                printWindow.onload = function() {
                    printWindow.print();
                };
            } else {
                $('#swaForm')[0].reset();
                clearSwaTable();
                $('#swa_req_by').val('');
                $('#swa_req_date').val('');
                $('#swa_rev_by').val('');
                $('#swa_rev_date').val('');
                $('#swa_app_by').val('');
                $('#swa_app_date').val('');
                $('#swa_rel_by').val('');
                $('#swa_rel_date').val('');
                $('#swa_rec_by').val('');
                $('#swa_rec_date').val('');
                $('#promo_title').val('');
                $('#promo_mechanics').val('');
                $('#promo_start').val('');
                $('#promo_end').val('');
                dataTable_swa.ajax.reload();
            }
        });
    }

    function showSwaErrorAlert(message) {
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

    function getSwaSignatoriesCurrentDate() {
        const now = new Date();
        const year = now.getFullYear();
        let month = (now.getMonth() + 1).toString().padStart(2, "0");
        let day = now.getDate().toString().padStart(2, "0");
        return `${year}-${month}-${day}`;
    }

    const swaDateInputs = {
        "req_date": getSwaSignatoriesCurrentDate(),
        "rev_date": getSwaSignatoriesCurrentDate(),
        "app_date": getSwaSignatoriesCurrentDate(),
        "rel_date": getSwaSignatoriesCurrentDate(),
        "rec_date": getSwaSignatoriesCurrentDate()
    };

    for (const inputId in swaDateInputs) {
        if (swaDateInputs.hasOwnProperty(inputId)) {
            const inputElement = document.getElementById(inputId);
            if (inputElement) {
                inputElement.value = swaDateInputs[inputId];
            }
        }
    }


    $('#subsidiary-select-table').DataTable({
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

    $('#saveSwaPDValues').on('click', function() {
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

    $('#saveSwaSignatoriesValues').on('click', function() {
        var reqByValue = $('#swa_req_by').val();
        var reqDateValue = $('#swa_req_date').val();
        var revByValue = $('#swa_rev_by').val();
        var revDateValue = $('#swa_rev_date').val();
        var appByValue = $('#swa_app_by').val();
        var appDateValue = $('#swa_app_date').val();
        var relByValue = $('#swa_rel_by').val();
        var relDateValue = $('#swa_rel_date').val();
        var recByValue = $('#swa_rec_by').val();
        var recDateValue = $('#swa_rec_date').val();

        if (reqByValue) {
            $('#swaForm').append('<input type="hidden" name="swa_req_by" value="' +
                reqByValue +
                '">');
        }
        if (reqDateValue && reqByValue) {
            $('#swaForm').append('<input type="hidden" name="swa_req_date" value="' +
                reqDateValue + '">');
        }
        if (revByValue) {
            $('#swaForm').append('<input type="hidden" name="swa_rev_by" value="' +
                revByValue +
                '">');
        }
        if (revDateValue && revByValue) {
            $('#swaForm').append('<input type="hidden" name="swa_rev_date" value="' +
                revDateValue + '">');
        }
        if (appByValue) {
            $('#swaForm').append('<input type="hidden" name="swa_app_by" value="' +
                appByValue +
                '">');
        }
        if (appDateValue && appByValue) {
            $('#swaForm').append('<input type="hidden" name="swa_app_date" value="' +
                appDateValue + '">');
        }
        if (relByValue) {
            $('#swaForm').append('<input type="hidden" name="swa_rel_by" value="' +
                relByValue +
                '">');
        }
        if (relDateValue && relByValue) {
            $('#swaForm').append('<input type="hidden" name="swa_rel_date" value="' +
                relDateValue + '">');
        }
        if (recByValue) {
            $('#swaForm').append('<input type="hidden" name="swa_rec_by" value="' +
                recByValue +
                '">');
        }
        if (recDateValue && recByValue) {
            $('#swaForm').append('<input type="hidden" name="swa_rec_date" value="' +
                recDateValue + '">');
        }
    });


    // $('#supplier-select-table').DataTable({
    //     lengthChange: false,
    //     language: {
    //         search: '',
    //         searchPlaceholder: 'Search...'
    //     },
    //     ordering: false
    // });


});
</script>