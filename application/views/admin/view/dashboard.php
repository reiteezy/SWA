<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-yellow"></i>
                    <div class="d-inline">
                        <h5><?= ($this->session->userdata('login_class')=='ADMIN') ? 'Admin ':'' ; ?>Dashboard</h5>
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
                        <li class="breadcrumb-item"><a href="#!">Dashboard</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">

                    <div class="row">
                    <?php if ($this->session->userdata('priv_users') == 1): ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="card ticket-card">
                                <div class="card-body">
                                    <p class="m-b-30 bg-c-red lbl-card"><i class="feather icon-users"></i> Total Users
                                    </p>
                                    <div class="text-center">
                                        <h2 class="m-b-0 d-inline-block text-c-red"> <?php $userCount = $this->db->count_all('users_tbl'); echo $userCount; ?></h2>
                                        <p class="m-b-0 d-inline-block">Users</p>
                                        <p class="m-b-0 m-t-15"><i
                                                class="fas fa-caret-down m-r-10 f-18 text-c-red"></i>From
                                            Previous Month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if ($this->session->userdata('priv_sub') == 1): ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="card ticket-card">
                                <div class="card-body">
                                    <p class="m-b-30 bg-c-blue lbl-card"><i class="fa fa-building"></i> Total Subsidiary
                                    </p>
                                    <div class="text-center">
                                        <h2 class="m-b-0 d-inline-block text-c-blue"> <?php $subsidiaryCount = $this->db->count_all('sub_tbl'); echo $subsidiaryCount; ?></h2>
                                        <p class="m-b-0 d-inline-block">Subsidiaries</p>
                                        <p class="m-b-0 m-t-15"><i
                                                class="fas fa-caret-up m-r-10 f-18 text-c-blue"></i>From
                                            Previous Month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if ($this->session->userdata('priv_swa') == 1): ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="card ticket-card">
                                <div class="card-body">
                                    <p class="m-b-30 bg-c-green lbl-card"><i class="feather icon-file"></i> Total SWA</p>
                                    <div class="text-center">
                                        <h2 class="m-b-0 d-inline-block text-c-green"><?php $swaCount = $this->db->count_all('swa_tbl'); echo $swaCount; ?></h2>
                                        <p class="m-b-0 d-inline-block">Stock Withdrawal Advise</p>
                                        <p class="m-b-0 m-t-15"><i
                                                class="fas fa-caret-up m-r-10 f-18 text-c-green"></i>From
                                            Previous Month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if ($this->session->userdata('priv_per') == 1): ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="card ticket-card">
                                <div class="card-body">
                                    <p class="m-b-30 bg-c-yellow lbl-card"><i class="feather icon-file-text"></i> Total PER
                                    </p>
                                    <div class="text-center">
                                        <h2 class="m-b-0 d-inline-block text-c-yellow"> <?php $perCount = $this->db->count_all('per_tbl'); echo $perCount; ?></h2>
                                        <p class="m-b-0 d-inline-block">Promo Execution Report</p>
                                        <p class="m-b-0 m-t-15"><i
                                                class="fas fa-caret-up m-r-10 f-18 text-c-yellow"></i>From Previous
                                            Month
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>
                    <div class="col-xl-12 col-md-12">
                        <div class="card latest-update-card">
                            <div class="card-header">
                                <h5>Welcome <?= $this->session->userdata('login_empname'); ?></h5>

                            </div>
                            <div class="card-block" style="height: 200px;">
                                <div class="latest-update-box"
                                    style="display: flex; justify-content: center; align-items: center; height: 100%;">
                                    <img src="<?= base_url('assets/assets/images/dashboardimg.jpg') ?>"
                                        alt="Dashboard Image" width="280" height="190">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <?php if ($this->session->userdata('priv_users') == 1): ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-red">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Total Users</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">
                                                <?php $userCount = $this->db->count_all('users_tbl'); echo $userCount; ?>
                                            </h3>
                                        </div>
                                        <div class="col-auto"> -->
                                            <!-- <i class="fas fa-money-bill-alt text-c-red f-18"></i> -->
                                        <!-- </div>
                                    </div> -->
                                    <!-- <p class="m-b-0 text-white"><span class="label label-danger m-r-10"></span></p> -->
                                <!-- </div>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if ($this->session->userdata('priv_sub') == 1): ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-blue">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Total Subsidiary</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">
                                                <?php $subsidiaryCount = $this->db->count_all('sub_tbl'); echo $subsidiaryCount; ?>
                                            </h3>
                                        </div>
                                        <div class="col-auto"> -->
                                            <!-- <i class="fas fa-database text-c-blue f-18"></i> -->
                                        <!-- </div>
                                    </div> -->
                                    <!-- <p class="m-b-0 text-white"><span class="label label-primary m-r-10"></span></p> -->
                                <!-- </div> -->
                            <!-- </div>
                        </div>
                        <?php endif ?>
                        <?php if ($this->session->userdata('priv_swa') == 1): ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-yellow">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Total SWA</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">
                                                <?php $swaCount = $this->db->count_all('swa_tbl'); echo $swaCount; ?>
                                            </h3>
                                        </div>
                                        <div class="col-auto"> -->
                                            <!-- <i class="fas fa-tags text-c-yellow f-18"></i> -->
                                        <!-- </div>
                                    </div> -->
                                    <!-- <p class="m-b-0 text-white"><span class="label label-warning m-r-10"></span></p> -->
                                <!-- </div>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if ($this->session->userdata('priv_per') == 1): ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-green">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Total PER</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">
                                                <?php $perCount = $this->db->count_all('per_tbl'); echo $perCount; ?>
                                            </h3>
                                        </div>
                                        <div class="col-auto"> -->
                                            <!-- <i class="fas fa-database text-c-green f-18"></i> -->
                                        <!-- </div>
                                    </div> -->
                                    <!-- <p class="m-b-0 text-white"><span class="label label-primary m-r-10"></span></p> -->
                                <!-- </div>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if ($this->session->userdata('priv_swamis') == 1): ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-green">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Pending MIS</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">
                                                <?php $this->db->where('SWA_TRANS_NO1', NULL); $misCount = $this->db->count_all_results('swa_tbl');  echo $misCount; ?>
                                            </h3>
                                        </div>
                                        <div class="col-auto"> -->
                                            <!-- <i class="fas fa-database text-c-green f-18"></i> -->
                                        <!-- </div>
                                    </div> -->
                                    <!-- <p class="m-b-0 text-white"><span class="label label-primary m-r-10"></span></p> -->
                                <!-- </div>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if ($this->session->userdata('priv_swaacctg') == 1): ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="card prod-p-card card-yellow">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Pending Accounting</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">
                                                <?php $this->db->where('SWA_CRFCV_NO', NULL); $acctgCount = $this->db->count_all_results('swa_tbl');  echo $acctgCount; ?>
                                            </h3>
                                        </div>
                                        <div class="col-auto"> -->
                                            <!-- <i class="fas fa-database text-c-yellow f-18"></i> -->
                                        <!-- </div>
                                    </div> -->
                                    <!-- <p class="m-b-0 text-white"><span class="label label-primary m-r-10"></span></p> -->
                                <!-- </div>
                            </div>
                        </div>
                        <?php endif ?> -->

                        <!-- 
                        <div class="col-xl-4 col-md-12">
                            <div class="card comp-card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-b-25">Impressions</h6>
                                            <h3 class="f-w-700 text-c-blue">1,563</h3>
                                            <p class="m-b-0">May 23 - June 01 (2017)</p>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-eye bg-c-blue"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card comp-card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-b-25">Goal</h6>
                                            <h3 class="f-w-700 text-c-green">30,564</h3>
                                            <p class="m-b-0">May 23 - June 01 (2017)</p>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-bullseye bg-c-green"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card comp-card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-b-25">Impact</h6>
                                            <h3 class="f-w-700 text-c-yellow">42.6%</h3>
                                            <p class="m-b-0">May 23 - June 01 (2017)</p>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hand-paper bg-c-yellow"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- 
                        <div class="col-xl-4 col-md-6">
                            <div class="card o-hidden">
                                <div class="card-header">
                                    <h5>Total Leads</h5>
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="text-muted m-b-5">Overall</p>
                                            <h6>68.52%</h6>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-muted m-b-5">Monthly</p>
                                            <h6>28.90%</h6>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-muted m-b-5">Day</p>
                                            <h6>13.50%</h6>
                                        </div>
                                    </div>
                                </div>
                                <div id="sal-income" style="height:100px"></div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card o-hidden">
                                <div class="card-header">
                                    <h5>Total Vendors</h5>
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="text-muted m-b-5">Overall</p>
                                            <h6>68.52%</h6>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-muted m-b-5">Monthly</p>
                                            <h6>28.90%</h6>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-muted m-b-5">Day</p>
                                            <h6>13.50%</h6>
                                        </div>
                                    </div>
                                </div>
                                <div id="rent-income" style="height:100px"></div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-12">
                            <div class="card o-hidden">
                                <div class="card-header">
                                    <h5>Invoice Generate</h5>
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="text-muted m-b-5">Overall</p>
                                            <h6>68.52%</h6>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-muted m-b-5">Monthly</p>
                                            <h6>28.90%</h6>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-muted m-b-5">Day</p>
                                            <h6>13.50%</h6>
                                        </div>
                                    </div>
                                </div>
                                <div id="income-analysis" style="height:100px"></div>
                            </div>
                        </div> -->


                        <!-- <div class="col-xl-8 col-md-12">
                            <div class="card latest-update-card">
                                <div class="card-header">
                                    <h5>Latest Activity</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li class="first-opt"><i
                                                    class="feather icon-chevron-left open-card-option"></i></li>
                                            <li><i class="feather icon-maximize full-card"></i></li>
                                            <li><i class="feather icon-minus minimize-card"></i></li>
                                            <li><i class="feather icon-refresh-cw reload-card"></i></li>
                                            <li><i class="feather icon-trash close-card"></i></li>
                                            <li><i class="feather icon-chevron-left open-card-option"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="latest-update-box">
                                        <div class="row p-t-20 p-b-30">
                                            <div class="col-auto text-end update-meta">
                                                <i class="feather icon-sunrise bg-c-blue update-icon"></i>
                                            </div>
                                            <div class="col">
                                                <h6></h6>
                                                <p class="text-muted m-b-15"></p> -->
                                                <!-- <img src="../files/assets/images/mega-menu/01.jpg" alt
                                                    class="img-fluid img-100 m-r-15 m-b-10">
                                                <img src="../files/assets/images/mega-menu/03.jpg" alt
                                                    class="img-fluid img-100 m-r-15 m-b-10"> -->
                                            <!-- </div>
                                        </div>
                                        <div class="row p-b-30">
                                            <div class="col-auto text-end update-meta">
                                                <i class="feather icon-file-text bg-c-blue update-icon"></i>
                                            </div>
                                            <div class="col">
                                                <h6></h6>
                                                <p class="text-muted m-b-0"></p>
                                            </div>
                                        </div>
                                        <div class="row p-b-30">
                                            <div class="col-auto text-end update-meta">
                                                <i class="feather icon-map-pin bg-c-blue update-icon"></i>
                                            </div>
                                            <div class="col">
                                                <h6></h6>
                                                <p class="text-muted m-b-15"><span> <a href="#!"
                                                            class="text-c-blue"></a> </span></p>
                                                <div id="markers-map" style="height:245px;width:100%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <a href="#!" class=" b-b-primary text-primary">View all Activity</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script>
$(document).ready(function() {
    function load_newadded() {
        $.ajax({
            url: '<?php echo base_url('NotificationController/get_unread_notifications'); ?>',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#notification-list').empty();
                if (data.length > 0) {
                    $('#notification-count').text(data.length);
                    $.each(data, function(i, notification) {
                        $('#notification-list').append(
                            '<li>' +
                            '<div class="d-flex">' +
                            '<div class="flex-grow-1">' +
                            '<h5 class="notification-user">' + notification
                            .header + '</h5>' +
                            '<p class="notification-msg">' + notification
                            .message +
                            '<label class="form-label label label-danger">New</label></p>' +
                            '<span class="notification-time">' + notification
                            .created_at + '</span>' +
                            '</div>' +
                            '</div>' +
                            '</li>'
                        );
                    });
                } else {
                    $('#notification-count').text(0);
                    $('#notification-list').append(
                        '<li>' +
                        '<div class="d-flex">' +
                        '<div class="flex-grow-1">' +
                        '<h5 class="notification-user">No new notifications</h5>' +
                        '</div>' +
                        '</div>' +
                        '</li>'
                    );
                }
            }
        });
    }

    load_newadded();

    setInterval(load_notifications, 30000);
});
</script> -->