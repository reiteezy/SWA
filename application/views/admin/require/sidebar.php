<div class="pcoded-main-container">
    <div class="pcoded-wrapper">

        <nav class="pcoded-navbar">
            <div class="nav-list">
                <div class="pcoded-inner-navbar main-menu">
                    <!-- <div class="pcoded-navigation-label">Dashboard</div> -->
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="<?php echo ($menu=='dashboard') ? 'active' : '';?>">
                            <a href="<?php echo base_url() ?>AdminController/index" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-home"></i>
                                </span>
                                <span class="pcoded-mtext">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                    <?php #if ($this->session->userdata('priv_utilities') == 1): ?>
                    <div class="pcoded-navigation-label">Near Expiry Stock Advise</div>
                    <ul class="pcoded-item pcoded-left-item">
                        <?php #if ($this->session->userdata('priv_utilities') == 1 && $this->session->userdata('priv_as') == 1): ?>
                        <li class="<?php echo ($menu=='nesa') ? 'active' : ''; ?>">
                            <a href="<?php echo base_url() ?>SwaController/nesa_list" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-file"></i>
                                </span>
                                <span class="pcoded-mtext">NESA Form</span>
                            </a>
                        </li>
                        <?php #endif ?>
                    </ul>
                    <?php #endif; ?>
                    <?php if ($this->session->userdata('priv_swa') == 1): ?>
                    <div class="pcoded-navigation-label">Stock Withdrawal Advise</div>
                    <ul class="pcoded-item pcoded-left-item">
                        <?php if (($this->session->userdata('priv_swa') == 1 && $this->session->userdata('priv_swaf') == 1 )||($this->session->userdata('priv_swa') == 1 && $this->session->userdata('priv_swavo') == 1 )): ?>
                        <li class="pcoded-hasmenu <?php echo ($menu=='Swa') ? 'active pcoded-trigger' : ''; ?>">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="feather icon-file"></i></span>
                                <span class="pcoded-mtext">SWA Form</span>
                                <!-- <span class="pcoded-badge label label-info ">NEW</span> -->
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="<?php echo ($menu=='Swa') ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url() ?>SwaController/swa_list"
                                        class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">SWA List</span>
                                        <!-- <span class="pcoded-badge label label-info ">NEW</span> -->
                                    </a>
                                </li>
                                <!-- <li class>
                                    <a href="<?php echo base_url() ?>SwaController/swa_form"
                                        class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">New SWA</span>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <?php endif ?>
                        <?php if ($this->session->userdata('priv_swa') == 1 && $this->session->userdata('priv_swamis') == 1): ?>
                        <li class="<?php echo ($menu=='swa_mis') ? 'active' : '';?>">
                            <a href="<?php echo base_url() ?>SwaController/swa_mis" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-check"></i>
                                </span>
                                <span class="pcoded-mtext">SWA MIS</span>
                            </a>
                        </li>
                        <?php endif ?>
                        <?php if (($this->session->userdata('priv_swa') == 1 && $this->session->userdata('priv_per') == 1) || ($this->session->userdata('priv_swa') == 1 && $this->session->userdata('priv_pervo') == 1)): ?>
                        <li class="pcoded-hasmenu <?php echo ($menu=='per') ? 'active pcoded-trigger' : ''; ?>">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="feather icon-file-text"></i></span>
                                <span class="pcoded-mtext">Promo Execution Report</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="<?php echo ($menu=='per') ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url() ?>SwaController/per_list"
                                        class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">PER List</span>
                                        <!-- <span class="pcoded-badge label label-info ">NEW</span> -->
                                    </a>
                                </li>
                                <!-- <li class>
                                    <a href="<?php echo base_url() ?>SwaController/per_form"
                                        class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">New PER</span>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <?php endif ?>
                        <?php if ($this->session->userdata('priv_swa') == 1 && $this->session->userdata('priv_swaacctg') == 1): ?>
                        <li class="<?php echo ($menu=='swa_accounting') ? 'active' : '';?>">
                            <a href="<?php echo base_url() ?>SwaController/swa_accounting"
                                class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-check"></i>
                                </span>
                                <span class="pcoded-mtext">SWA Accounting</span>
                            </a>
                        </li>
                        <?php endif ?>
                        <?php if ($this->session->userdata('priv_swa') == 1 && $this->session->userdata('priv_reports') == 1): ?>
                        <li class="<?php echo ($menu=='swa_reports') ? 'active' : '';?>">
                            <a href="<?php echo base_url() ?>SwaController/view_swa_reports"
                                class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-flag"></i>
                                </span>
                                <span class="pcoded-mtext">Generate Report</span>
                            </a>
                        </li>

                        <?php endif ?>
                    </ul>
                    <?php endif; ?>
                    <?php if ($this->session->userdata('priv_sm') == 1): ?>
                    <div class="pcoded-navigation-label">System Manager</div>
                    <ul class="pcoded-item pcoded-left-item">
                    <?php if ($this->session->userdata('priv_sm') == 1 && $this->session->userdata('priv_sub') == 1): ?>
                        <li class="pcoded-hasmenu <?php echo ($menu=='Subsidiary') ? 'active pcoded-trigger' : '';?>">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-building"></i></span>
                                <span class="pcoded-mtext">Subsidiary</span>
                                <!-- <span class="pcoded-badge label label-info ">NEW</span> -->
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="<?php echo ($menu == 'Subsidiary') ? 'active' : '' ;?>">
                                    <a href="<?php echo base_url() ?>SubsidiaryController/subsidiary"
                                        class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Subsidiary List</span>
                                        <!-- <span class="pcoded-badge label label-info ">NEW</span> -->
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php endif ?>
                        <?php #if ($this->session->userdata('priv_sm') == 1 && $this->session->userdata('priv_sup') == 1): ?>
                        <!-- <li class="pcoded-hasmenu <?php #echo ($menu=='Supplier') ? 'active pcoded-trigger' : '';?>">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-truck"></i></span>
                                <span class="pcoded-mtext">Supplier</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="<?php #echo ($menu == 'Supplier') ? 'active' : '' ;?>">
                                    <a href="<?php #echo base_url() ?>SupplierController/supplier"
                                        class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Supplier List</span> -->
                                        <!-- <span class="pcoded-badge label label-warn ing">NEW</span> -->
                                    <!-- </a>
                                </li> -->
                            <!-- </ul>
                        </li> -->
                        <?php #endif ?>
                        <?php if ($this->session->userdata('priv_sm') == 1 && $this->session->userdata('priv_uf') == 1): ?>
                        <!-- <li class="<?php echo ($menu == 'user filter') ? 'active' : '' ;?>">
                            <a href="<?php echo base_url() ?>UserController/user_filter_view" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-filter"></i>
                                </span>
                                <span class="pcoded-mtext">User Filtering</span>
                            </a>
                        </li> -->
                        <?php endif ?>
                        <!-- <?php if ($this->session->userdata('priv_sm') == 1 && $this->session->userdata('priv_ut') == 1): ?>
                        <li class="pcoded-hasmenu <?php echo ($menu=='Type') ? 'active pcoded-trigger' : ''; ?>">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-user"></i>
                                </span>
                                <span class="pcoded-mtext">User Type</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="<?php echo ($menu=='Type') ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url() ?>ClassController/class_list"
                                        class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">User Type List</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php endif ?> -->
                        <?php if ($this->session->userdata('priv_sm') == 1 && $this->session->userdata('priv_users') == 1): ?>
                        <li class="pcoded-hasmenu <?php echo ($menu=='Users') ? 'active pcoded-trigger' : ''; ?>">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-users"></i>
                                </span>
                                <span class="pcoded-mtext">System Users</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="<?php echo ($menu=='Users') ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url() ?>UserController/users"
                                        class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Users List</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php endif ?>
                        <?php if ($this->session->userdata('priv_sm') == 1 && $this->session->userdata('priv_um') == 1): ?>
                        <li class="<?php echo ($menu=='User_menu') ? 'active' : ''; ?>">
                            <a href="<?php echo base_url() ?>AdminController/view_privilege"
                                class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-user-check"></i>
                                </span>
                                <span class="pcoded-mtext">User Menu</span>
                            </a>
                        </li>
                        <?php endif ?>
                    </ul>
                    <?php endif; ?>
                    <?php if ($this->session->userdata('priv_utilities') == 1): ?>
                    <div class="pcoded-navigation-label">System Utilities</div>
                    <ul class="pcoded-item pcoded-left-item">
                        <?php if ($this->session->userdata('priv_utilities') == 1 && $this->session->userdata('priv_sw') == 1): ?>
                        <!-- <li class>
                            <a href="navbar-light.html" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-image    "></i>
                                </span>
                                <span class="pcoded-mtext">Wallpaper</span>
                            </a>
                        </li> -->
                        <?php endif ?>
                        <?php if ($this->session->userdata('priv_utilities') == 1 && $this->session->userdata('priv_as') == 1): ?>
                        <li class="<?php echo ($menu=='about') ? 'active' : ''; ?>">
                            <a href="<?php echo base_url() ?>AdminController/about_page" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-info"></i>
                                </span>
                                <span class="pcoded-mtext">About</span>
                            </a>
                        </li>
                        <?php endif ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </nav>