<script>

// function handleLocChange() {
//     var locSelect = $("#loc");
//     var otherDetailsInput = $("#otherDetails");

//     if (locSelect.val() === "Others") {
//         otherDetailsInput.css({
//             display: "block",
//             marginTop: "-25px"
//         });
//     } else {
//         otherDetailsInput.css({
//             display: "none",
//             marginTop: ""
//         }).val("");
//     }
// }
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
                        fieldValue = (parseFloat(fieldValue).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
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

                // $(document).on('click', '.viewSignatoriesButton', function() {
                populateSwaSignatories(swaId);
                // });

                // $(document).on('click', '.viewPromoButton', function() {
                populateSwaPromoDetails(swaId);
                // });

                $('#printLink').attr('href',
                    '<?php echo base_url() ?>SwaController/printSwa/' + swaId);

                $('.printView').click(function() {
                    $('#printLink')[0]
                        .click();
                });

                populateSwaTable(swaId);
            },
            error: function(error) {
                console.error("Error:", error);
            }
        });


    });

    function populateSwaSignatories(swaId) {
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

    function populateSwaPromoDetails(swaId) {

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

    function populateSwaTable(swaId) {
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
                $("#tbodyview_swa").html("");

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
                        '<td>' + (swaDetailsData[
                            i].SWA_UNIT_COST.replace(/\d(?=(\d{3})+\.)/g, '$&,')) +
                        '</td>'
                    );
                    newRow.append(
                        '<td>' + (swaDetailsData[
                            i].SWA_AMOUNT.replace(/\d(?=(\d{3})+\.)/g, '$&,')) +
                        '</td></tr>'
                    );

                    $("#tbodyview_swa").append(newRow);
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

   
    function reload_table() {
        dataTable_swa.ajax.reload();
    }

    var dataTable_swa = $('#swatable').DataTable({
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
                data: 'SUP_NAME'
            },
            {
                data: null,
                orderable: false,
                render: function(data, type, row) {
                    return `  
                           <button type="button" class="viewSwaButton  btn waves-effect waves-light btn-primary custom-btn-db"
                            title="View" data-swa-id="${row.SWA_ID}"
                            data-toggle="modal" data-target="#viewSwaFormModal"
                            title="View"><i class="icofont icofont-folder-open" style="padding-left: 5px;"></i></button>
                            
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