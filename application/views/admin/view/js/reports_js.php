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
        if ($.fn.DataTable.isDataTable('#report-table')) {
        // Destroy the existing DataTable instance
        $('#report-table').DataTable().clear().destroy();
    }
        var dataTable_mis = $('#report-table').DataTable({
        processing: true,
        serverSide: true,
        searching: true,
        autoWidth: true,
        lengthChange: false,
        ordering: false,
        ajax: {
            url: "<?php echo base_url(); ?>SwaController/get_daterange_data",
            type: "POST",
            data: function(d) {
                d.start = d.start || 0;
                d.length = d.length || 10;
                d.start_date = startDate;
                d.end_date = endDate;
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
                data: 'SWA_ACCOUNTING_INSTRUCT'
            },
            {
                data: 'LOCATION'
            },
            {
                data: 'SUB_CODE'
            },
            {
                data: 'SWA_REMARK'
            },
            {
                data: 'SWA_TOTAL'
            },
            {
                data: 'SWA_TRANS_NO1'
            },
            {
                data: 'SWA_TRANS_NO1_DATE'
            },
            {
                data: 'SWA_TRANS_NO1_AMOUNT'
            },
            {
                data: 'SWA_CRFCV_NO'
            },
            {
                data: 'SWA_CRFCV_DATE'
            },
            {
                data: 'SWA_CRFCV_AMOUNT'
            },
            {
                data: null,
                orderable: false,
                render: function(data, type, row) {
                    return ``;
                }
            },
            
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

    }

    $('#generate-pdf-btn').on('click', function() {
        $('.generate-loader').show();
        setTimeout(generatePDF);
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