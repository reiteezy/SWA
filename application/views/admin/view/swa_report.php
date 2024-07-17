<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-flag bg-c-yellow"></i>
                    <div class="d-inline">
                        <h5>Generate Report</h5>
                        <span>Stock Withdrawal Advice System</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url() ?>AdminController/dash"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Generate Report</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js">
        </script>
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="card table-card">
                                <!-- <div class="card-header">
                                    <h5>Generate Report</h5>
                                </div>  -->

                                <div class="card-block" style="padding-top: 50px; padding-bottom: 50px">
                                    <div class="row" style="margin-bottom: 5px;">
                                        <div class="col-auto">
                                            <div id="reportrange"
                                                style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 400x;">
                                                <i class="fa fa-calendar"></i>&nbsp;
                                                <span></span> <i class="fa fa-caret-down"></i>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="btn btn-primary" id="generate-btn">Generate</button>
                                        </div>
                                        <div class="col-auto">
                                            <div class="generate-loader"></div>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <div class="report-loader"></div>
                                        <table id="report-table" class="table table-hover table-bordered m-b-0">
                                            <thead>
                                                <tr>
                                                    <th style="width: 1%">SWA#</th>
                                                    <th style="text-align: center;">DATE</th>
                                                    <th style="text-align: left;">SUPPLIER</th>
                                                    <th style="text-align: left;">MODE</th>
                                                    <th style="text-align: center;">FROM</th>
                                                    <th style="text-align: center;">TO</th>
                                                    <th style="text-align: left;">PURPOSE</th>
                                                    <th style="text-align: center;">SWA-AMOUNT</th>
                                                    <th style="text-align: center;">CM #</th>
                                                    <th style="text-align: center;">DATE</th>
                                                    <th style="text-align: center;">AMOUNT</th>
                                                    <th style="border-right: 0; text-align: right;">PAYMENTS</th>
                                                    <th style="border-left: 0; border-right: 0; text-align: center;">
                                                        FROM</th>
                                                    <th style="border-left: 0; text-align: left;">SUPPLIER</th>
                                                    <th style="text-align: center;">BALANCE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Data will be loaded here -->
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- <div class="loader" id="loader"></div> -->
                                </div>
                            </div>
                            <!-- -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js">
</script>
<script type="text/javascript">
$(document).ready(function() {
    var start = moment();
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
            'MMMM D, YYYY'));
        fetchTableData(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment()
                .subtract(1, 'month').endOf('month')
            ]
        }
    }, cb);

    cb(start, end);

    function fetchTableData(startDate, endDate) {
        $('.report-loader').show();
        // var loaderMinimumTime = 2000; // 3 seconds
        // var startTime = Date.now();

        $.ajax({
            url: '<?= base_url("SwaController/get_daterange_data") ?>',
            method: 'POST',
            data: {
                start_date: startDate,
                end_date: endDate
            },
            success: function(response) {
                try {
                    response = JSON.parse(response);
                } catch (e) {
                    console.error('Invalid JSON response:', response);
                    alert('Failed to load data: Invalid JSON response.');
                    $('.report-loader').hide();
                    return;
                }

                // Calculate the elapsed time
                // var elapsedTime = Date.now() - startTime;
                // var remainingTime = loaderMinimumTime - elapsedTime;

                // Ensure the loader is shown for at least 3 seconds
                setTimeout(function() {
                    var tbody = $('#report-table tbody');
                    tbody.empty();
                    console.log(response);
                    response.data.forEach(function(row) {
                        tbody.append(
                            '<tr><td>' + row.SWA_ID + '</td><td>' + row
                            .DOCUMENT_DATE +
                            '</td><td>' + row.NAME + '</td><td>' + row
                            .SWA_ACCOUNTING_INSTRUCT +
                            '</td><td>' + row.LOCATION + '</td><td>' + row
                            .SUB_CODE +
                            '</td><td>' + row.SWA_REMARK + '</td><td>' + row
                            .SWA_TOTAL +
                            '</td><td>' + row.SWA_TRANS_NO1 + '</td><td>' + row
                            .SWA_TRANS_NO1_DATE +
                            '</td><td>' + row.SWA_TRANS_NO1_AMOUNT +
                            '</td><td>' + row.SWA_CRFCV_NO +
                            '</td><td>' + row.SWA_CRFCV_DATE + '</td><td>' + row
                            .SWA_CRFCV_AMOUNT +
                            '</td><td>' + '</td></tr>'
                        );
                    });
                    $('.report-loader').hide();
                }
                // , remainingTime > 0 ? remainingTime : 0
            );
            },
            error: function() {
                // var elapsedTime = Date.now() - startTime;
                // var remainingTime = loaderMinimumTime - elapsedTime;

                setTimeout(function() {
                    $('.report-loader').hide();
                    alert('Failed to fetch data.');
                }
                // , remainingTime > 0 ? remainingTime : 0
                );
            }
        });
    }


    $('#generate-btn').on('click', function() {
        // Show the loader
        $('.generate-loader').show();

        // Simulate PDF generation delay (replace with actual generatePDF() function if needed)
        setTimeout(generatePDF, 5000);
    });

    function generatePDF() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        const table = $('#report-table');

        // Prepare data for autoTable
        const headers = [];
        table.find('thead th').each(function() {
            headers.push($(this).text());
        });

        const data = [];
        table.find('tbody tr').each(function() {
            const row = [];
            $(this).find('td').each(function() {
                row.push($(this).text());
            });
            data.push(row);
        });

        // Add the table to the PDF
        doc.autoTable({
            head: [headers],
            body: data
        });

        // Save the PDF
        doc.save('report.pdf');

        // Hide the loader after PDF generation is complete
        $('.generate-loader').hide();
    }

    $('#report-table').DataTable({
        lengthChange: false,
        language: {
            search: '',
            searchPlaceholder: 'Search...'
        }
    });
});
</script>