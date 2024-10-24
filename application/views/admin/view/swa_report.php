<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-flag bg-c-yellow"></i>
                    <div class="d-inline">
                        <h5>Generate Report</h5>
                        <span>Stock Withdrawal Advise System</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url() ?>AdminController/index"><i
                                    class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Generate Report</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        </script>

        </script>
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card table-card">
                                <div class="card-block" style="">
                                    <div class="row" style="">
                                        <div class="col-auto">
                                            <div id="reportrange"
                                                style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 400x;">
                                                <i class="fa fa-calendar"></i>&nbsp;
                                                <span></span> <i class="fa fa-caret-down"></i>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="btn btn-primary custom-btn-db" id="generate-pdf-btn"><i class="icofont icofont-file-pdf"></i> Generate PDF</button>
                                        </div>
                                        <!-- <div class="col-auto">
                                            <button class="btn btn-primary"
                                                style="background: #02838d; border: #02838d;"
                                                id="generate-excel-btn">Generate Excel</button>
                                        </div> -->
                                        <div class="col-auto">
                                            <div class="generate-loader"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card table-card">
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <div class="report-loader"></div>
                                        <table id="report-table" class="table table-hover m-b-0" style="width: 100%;">
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
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-body" id="pdf-container">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>