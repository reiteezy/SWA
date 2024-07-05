<div class="pcoded-main-container">
    <div class="pcoded-wrapper">

        <nav class="pcoded-navbar">
            <div class="nav-list">
                <div class="pcoded-inner-navbar main-menu">
                    <div class="pcoded-navigation-label">Dashboard</div>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="<?php echo ($menu=='dashboard') ? 'active' : '';?>">
                            <a href="<?php echo base_url() ?>AdminController/dash" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-home"></i>
                                </span>
                                <span class="pcoded-mtext">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                    <div class="pcoded-navigation-label">File Maintenance</div>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu <?php echo ($menu=='Subsidiary') ? 'active pcoded-trigger' : '';?>">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                <span class="pcoded-mtext">Subsidiary</span>
                                <span class="pcoded-badge label label-info ">NEW</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="<?php echo ($menu == 'Subsidiary') ? 'active' : '' ;?>">
                                    <a href="<?php echo base_url() ?>SubsidiaryController/subsidiary"
                                        class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Subsidiary List</span>
                                        <span class="pcoded-badge label label-info ">NEW</span>
                                    </a>
                                </li>
                                <!-- <li class>
                                    <a href="<?php echo base_url() ?>SubsidiaryController/add_subsidiary" class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Add New Subsidiary</span>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="pcoded-hasmenu <?php echo ($menu=='Supplier') ? 'active pcoded-trigger' : '';?>">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="fa fa-truck"></i></span>
                                <span class="pcoded-mtext">Supplier</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="<?php echo ($menu == 'Supplier') ? 'active' : '' ;?>">
                                    <a href="<?php echo base_url() ?>SupplierController/supplier"
                                        class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Supplier List</span>
                                        <span class="pcoded-badge label label-warning">NEW</span>
                                    </a>
                                </li>
                                <!-- <li class>
                                    <a href="<?php echo base_url() ?>SupplierController/add_supplier"
                                        class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Add New Supplier</span>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <li class>
                            <a href="navbar-light.html" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-menu"></i>
                                </span>
                                <span class="pcoded-mtext">User Filtering</span>
                            </a>
                        </li>
                    </ul>
                    <div class="pcoded-navigation-label">Stock Withdrawal Advice</div>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu <?php echo ($menu=='Swa') ? 'active pcoded-trigger' : ''; ?>">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                <span class="pcoded-mtext">SWA Form</span>
                                <span class="pcoded-badge label label-info ">NEW</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="<?php echo ($menu=='Swa') ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url() ?>SwaController/swa_list"
                                        class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">SWA List</span>
                                        <span class="pcoded-badge label label-info ">NEW</span>
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
                        <li class="<?php echo ($menu=='swa_mis') ? 'active' : '';?>">
                            <a href="<?php echo base_url() ?>SwaController/swa_mis" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-menu"></i>
                                </span>
                                <span class="pcoded-mtext">SWA MIS</span>
                            </a>
                        </li>
                        <li class="pcoded-hasmenu <?php echo ($menu=='per') ? 'active pcoded-trigger' : ''; ?>">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                <span class="pcoded-mtext">Promo Execution Report</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="<?php echo ($menu=='per') ? 'active' : ''; ?>">
                                    <a href="<?php echo base_url() ?>SwaController/per_list"
                                        class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">PER List</span>
                                        <span class="pcoded-badge label label-info ">NEW</span>
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
                        <li class="<?php echo ($menu=='swa_accounting') ? 'active' : '';?>">
                            <a href="<?php echo base_url() ?>SwaController/swa_accounting"
                                class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-menu"></i>
                                </span>
                                <span class="pcoded-mtext">SWA Accounting</span>
                            </a>
                        </li>
                        <li class="<?php echo ($menu=='swa_reports') ? 'active' : '';?>">
                            <a href="<?php echo base_url() ?>SwaController/view_swa_reports"
                                class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-menu"></i>
                                </span>
                                <span class="pcoded-mtext">Generate Report</span>
                            </a>
                        </li>
                    </ul>
                    <div class="pcoded-navigation-label">System Manager</div>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class="pcoded-hasmenu <?php echo ($menu=='Type') ? 'active pcoded-trigger' : ''; ?>">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-clipboard"></i>
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
                                <!-- <li class=" ">
                                    <a href="<?php echo base_url() ?>ClassController/add_class"
                                        class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Add New User Type</span>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="pcoded-hasmenu <?php echo ($menu=='Users') ? 'active pcoded-trigger' : ''; ?>">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-clipboard"></i>
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
                                <!-- <li class=" ">
                                    <a href="<?php echo base_url() ?>UserController/add_user_page"
                                        class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Add New User</span>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="<?php echo ($menu=='User_menu') ? 'active' : ''; ?>">
                            <a href="<?php echo base_url() ?>AdminController/view_privilege" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-menu"></i>
                                </span>
                                <span class="pcoded-mtext">User Menu</span>
                            </a>
                        </li>

                    </ul>
                    <div class="pcoded-navigation-label">System Utilities</div>
                    <ul class="pcoded-item pcoded-left-item">
                        <li class>
                            <a href="navbar-light.html" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-menu"></i>
                                </span>
                                <span class="pcoded-mtext">Wallpaper</span>
                            </a>
                        </li>
                        <li class>
                            <a href="navbar-light.html" class="waves-effect waves-dark">
                                <span class="pcoded-micon">
                                    <i class="feather icon-menu"></i>
                                </span>
                                <span class="pcoded-mtext">About</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>