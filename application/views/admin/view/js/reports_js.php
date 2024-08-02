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

                setTimeout(function() {
                    var tbody = $('#report-table tbody');
                    tbody.empty();
                    console.log(response);
                    response.data.forEach(function(row) {
                        tbody.append(
                            '<tr>' +
                            '<td>' + (row.SWA_ID || '') + '</td>' +
                            '<td>' + (row.DOCUMENT_DATE || '') + '</td>' +
                            '<td>' + (row.SUP_NAME || '') + '</td>' +
                            '<td>' + (row.SWA_ACCOUNTING_INSTRUCT || '') +'</td>' +
                            '<td>' + (row.LOCATION || '') + '</td>' +
                            '<td>' + (row.SUB_CODE || '') + '</td>' +
                            '<td>' + (row.SWA_REMARK || '') + '</td>' +
                            '<td>' + (row.SWA_TOTAL || '') + '</td>' +
                            '<td>' + (row.SWA_TRANS_NO1 || '') + '</td>' +
                            '<td>' + (row.SWA_TRANS_NO1_DATE || '') + '</td>' +
                            '<td>' + (row.SWA_TRANS_NO1_AMOUNT || '') + '</td>' +
                            '<td>' + (row.SWA_CRFCV_NO || '') + '</td>' +
                            '<td>' + (row.SWA_CRFCV_DATE || '') + '</td>' +
                            '<td>' + (row.SWA_CRFCV_AMOUNT || '') + '</td>' +
                            '<td></td>' +
                            '</tr>'
                        );
                    });
                    $('.report-loader').hide();
                });
            },
            error: function() {
                // var elapsedTime = Date.now() - startTime;
                // var remainingTime = loaderMinimumTime - elapsedTime;
                setTimeout(function() {
                    $('.report-loader').hide();
                    alert('Failed to fetch data.');
                });
            }
        });
    }

    $('#generate-pdf-btn').on('click', function() {
        $('.generate-loader').show();
        setTimeout(generatePDF, 5000);
    });

    // $('#generate-excel-btn').on('click', function() {
    //     generateExcel();
    // });

    function generatePDF() {
        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF({
            orientation: 'landscape',
            unit: 'mm',
            format: 'legal'
        });
        const table = $('#report-table');

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

        doc.autoTable({
            head: [headers],
            body: data,
            theme: 'plain',
            styles: {
                fontSize: 8,
                cellPadding: 3,
                lineColor: [0, 0, 0],
                lineWidth: 0.1
            },
            tableLineColor: [0, 0, 0],
            margin: {
                top: 10
            },
        });

        const pdfDataUrl = doc.output('datauristring');

        const iframe = document.createElement('iframe');
        iframe.style.width = '100%';
        iframe.style.height = '500px';
        iframe.src = pdfDataUrl;

        const pdfContainer = document.getElementById('pdf-container');
        pdfContainer.innerHTML = '';
        pdfContainer.appendChild(iframe);
        $('.generate-loader').hide();
    }

    // function generateExcel() {
    //     const table = document.getElementById('report-table');
    //     const workbook = XLSX.utils.table_to_book(table, {
    //         sheet: "Sheet1"
    //     });
    //     XLSX.writeFile(workbook, 'report.xlsx');
    // }

    // $('#report-table').DataTable({
    //     lengthChange: false,
    //     language: {
    //         search: '',
    //         searchPlaceholder: 'Search...'
    //     }
    // });
});
</script>