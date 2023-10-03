<aside class="main-sidebar sidebar-light-primary elevation-4" style="max-width: 500px" >
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url() ?>assets/backend/dist/img/ready-stock.png" alt="SWA logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-dark">SWA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" >
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url() ?>assets/backend/dist/img/admin-logo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
      <!-- Administrator -->
          <a href="#" class="d-block"><?php echo $this->session->userdata('login_class'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo base_url() ?>admin" class="nav-link <?php if($page_name=='dashboard') echo 'active'; ?>">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <?php
           # if($this->session->userdata('login_class') == 'admin'):
          ?>

          <li class="nav-item has-treeview  <?php if($page_name=='file_maintenance') echo 'menu-open'; ?>">
            <a href="#" class="nav-link <?php if($page_name=='file_maintenance') echo 'active'; ?>">
              <i class="nav-icon fa fa-folder"></i>
              <p>
                File Maintenance
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/file_maintenance/subsidiary" class="nav-link  <?php if($page_s_name=='subsidiary') echo 'active'; ?>">
                  <i class="fa fa-building fa-xs nav-icon"></i>
                  <p style="font-size: 14.5px"> Subsidiary</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/file_maintenance/supplier" class="nav-link  <?php if($page_s_name=='supplier') echo 'active'; ?>">
                  <i class="fa fa-truck fa-xs nav-icon"></i>
                  <p style="font-size: 14.5px"> Supplier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/file_maintenance/user_filtering" class="nav-link  <?php if($page_s_name=='user_filtering') echo 'active'; ?>">
                  <i class="fa fa-address-card fa-xs nav-icon"></i>
                  <p style="font-size: 14.5px"> User Filtering</p>
                </a>
              </li>
              
            </ul>
          </li> 

          <?php   
          # endif;
          ?>

          <li class="nav-item has-treeview  <?php if($page_name=='stock_withdrawal_advice') echo 'menu-open'; ?>">
            <a href="#" class="nav-link <?php if($page_name=='stock_withdrawal_advice') echo 'active'; ?>">
              <i class="nav-icon fa fa-bar-chart"></i>
              <p>
                Stock Withdrawal Advice
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/stock_withdrawal_advice/swa_form" class="nav-link  <?php if($page_s_name=='swa_form') echo 'active'; ?>">
                  <i class="fa fa-file fa-xs nav-icon"></i>
                  <p style="font-size: 14.5px">Stock Withdrawal Advice Form</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/stock_withdrawal_advice/swa_mis_confirm" class="nav-link  <?php if($page_s_name=='swa_mis_confirm') echo 'active'; ?>">
                  <i class="fa fa-check-square-o fa-xs nav-icon"></i>
                  <p style="font-size: 14.5px">SWA Confirmation - MIS</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/stock_withdrawal_advice/promo_execution" class="nav-link <?php if($page_s_name=='promo_execution') echo 'active'; ?>">
                  <i class="fa fa-bullhorn fa-xs nav-icon"></i>
                  <p style="font-size: 14.5px">Promo Execution Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/stock_withdrawal_advice/swa_accounting_confirm" class="nav-link  <?php if($page_s_name=='swa_accounting_confirm') echo 'active'; ?>">
                  <i class="fa fa-check-square fa-xs nav-icon"></i>
                  <p style="font-size: 14.5px"  >SWA Confirmation - Accounting</p>
                </a>
              </li>
            </ul>

          </li>

          <li class="nav-item has-treeview  <?php if($page_name=='system_manager') echo 'menu-open'; ?>">
            <a href="#" class="nav-link <?php if($page_name=='system_manager') echo 'active'; ?>">
              <i class="nav-icon fa fa-duotone fa-user"></i>
              <p>
                System Manager
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/system_manager/user_type" class="nav-link  <?php if($page_s_name=='user_type') echo 'active'; ?>">
                  <i class="fa fa-file fa-xs nav-icon"></i>
                  <p style="font-size: 14.5px">User Type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/system_manager/users" class="nav-link <?php if($page_s_name=='users') echo 'active'; ?>">
                  <i class="fa fa-user-circle fa-xs nav-icon"></i>
                  <p style="font-size: 14.5px">System User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/management/users" class="nav-link <?php #if($page_s_name=='') echo 'active'; ?>">
                  <i class="fa fa-bars fa-xs nav-icon"></i>
                  <p style="font-size: 14.5px">User Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/management/settings" class="nav-link  <?php #if($page_s_name=='') echo 'active'; ?>">
                  <i class="fa fa-cog fa-xs nav-icon"></i>
                  <p style="font-size: 14.5px">Menu Settings</p>
                </a>
              </li>
            </ul>

          </li>

          <li class="nav-item has-treeview  <?php if($page_name=='system_utilities') echo 'menu-open'; ?>">
            <a href="#" class="nav-link <?php if($page_name=='system_utilities') echo 'active'; ?>">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                System Utilities
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/system_utilities/system_wallpaper" class="nav-link  <?php if($page_s_name=='system_wallpaper') echo 'active'; ?>">
                  <i class="fa fa-image fa-xs nav-icon"></i>
                  <p style="font-size: 14.5px">System Wallpaper</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url() ?>admin/management/term" class="nav-link  <?php if($page_s_name=='term') echo 'active'; ?>">
                  <i class="fa fa-info-circle fa-xs nav-icon"></i>
                  <p style="font-size: 14.5px">About the System</p>
                </a>
              </li>
            </ul>
          </li>

          
          
          <li class="nav-item">
            <a href="<?php echo base_url() ?>authe/logout" class="nav-link">
              <i class="nav-icon fa-xs fa fa-sign-out"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>