<link rel="stylesheet" type="text/css"
    href="<?= base_url('assets/'); ?>bower_components/sweetalert/css/sweetalert2.css">
<div class="loader-bg">
    <div class="loader-bar"></div>
</div>

<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <!-- First Navbar -->
        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">
                <div class="navbar-logo" style="width: 150px;">
                    <a href="index.html">
                        <!-- <img class="img-fluid" src="<?php echo base_url();?>assets/assets/images/logo.png" alt="Theme-Logo" /> -->
                        <span style="margin-left: 50px;">SWA</span>
                    </a>
                </div>
                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li class="header-search">
                            <div class="main-search morphsearch-search">
                                <div class="input-group">
                                    <span class="input-group-text search-close">
                                        <i class="feather icon-x input-group-text"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Enter Keyword">
                                    <span class="input-group-text search-btn">
                                        <i class="feather icon-search input-group-text"></i>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                <i class="full-screen feather icon-maximize"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="feather icon-home"></i> 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($menu=='uswa') ? 'active' : '';?>" id="swa" href="<?php echo base_url('swacontroller/uswa_list')?>">STOCK
                                WITHDRAWAL ADVICE</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($menu=='umis') ? 'active' : '';?>" id="mis" href="<?php echo base_url('swacontroller/umis')?>">MIS CONFIRMATION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($menu=='uper') ? 'active' : '';?>" id="per" href="<?php echo base_url('swacontroller/uper_list')?>">PROMO EXECUTION REPORT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($menu=='uacctg') ? 'active' : '';?>" id="acctg" href="<?php echo base_url('swacontroller/uacctg')?>">ACCOUNTING CONFIRMATION</a>
                        </li>
                    </ul>

                    <ul class="nav-right">
                        <li>
                            <a href="#">
                                <i class="feather icon-info"></i> 
                            </a>
                        </li>
                        <li class="header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="feather icon-bell"></i>
                                    <!-- <span class="badge bg-c-red">5</span> -->
                                </div>
                                <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn"
                                    data-dropdown-out="fadeOut">
                                    <li>
                                        <h6>Notifications</h6>
                                        <label class="form-label label label-danger">New</label>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <img class="img-radius"
                                                    src="<?php echo base_url();?>assets/assets/images/avatar-4.jpg"
                                                    alt="Generic placeholder image">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="notification-user">John Doe</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                                    elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="user-profile header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-bs-toggle="dropdown">
                                    <!-- <span
                                        style="margin-right: 10px;"><?php echo $this->session->userdata('login_empname'); ?></span> -->
                                    <?php $emp_img = $this->session->userdata('login_image'); ?>
                                    <img src="http://172.16.161.34:8080/hrms<?php echo substr($emp_img, 2); ?>"
                                        alt="user image" class="img-radius">
                                    <i class="feather icon-chevron-down"></i>
                                </div>
                                <ul class="show-notification profile-notification dropdown-menu"
                                    data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <li>
                                        <a href="#">
                                            <i class="feather icon-user"></i> Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" id="logoutButton">
                                            <i class="feather icon-log-out"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>



<script type="text/javascript" src="<?= base_url('assets/'); ?>bower_components/jquery/js/jquery.min.js">
</script>
<script type="text/javascript" src="<?= base_url('assets/'); ?>bower_components/sweetalert/js/sweetalert2.min.js">
</script>
<script>
$(document).ready(function() {
    var logoutButton = $('#logoutButton');

    logoutButton.on('click', function(event) {
        console.log("button clicked");
        event.preventDefault();
        confirmLogout();
    });

    function confirmLogout() {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will be logged out.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, log out!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?php echo base_url() ?>LoginController/logout';
            }
        });
    }


function updateClock() {
    const now = new Date();

    const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    const months = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    const dayName = days[now.getDay()];
    const day = now.getDate().toString().padStart(2, '0');
    const month = months[now.getMonth()];
    const year = now.getFullYear();

    let hours = now.getHours();
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');
    const period = hours >= 12 ? 'PM' : 'AM';

    hours = hours % 12;
    hours = hours ? hours : 12;

    const formattedDate = `${dayName}, ${day} ${month} ${year}`;
    const formattedTime = `${hours}:${minutes} ${period}`;

    document.getElementById('digital-clock').innerHTML = `${formattedDate}&nbsp;&nbsp;&nbsp;${formattedTime}`;
}

setInterval(updateClock, 1000);
updateClock();
});
</script>