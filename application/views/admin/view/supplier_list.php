<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-truck bg-c-yellow"></i>
                    <div class="d-inline">
                        <h5>Supplier</h5>
                        <span>Stock Withdrawal Advice System</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title breadcrumb-padding">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url() ?>AdminController/index"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Supplier</a>
                        </li>
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
                        <div class="col-sm-12">


                            <div class="card table-card">
                                <div class="card-header">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#addSupModal"><i class="feather icon-plus"></i>Add New
                                        Supplier</button>
                                </div>
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table id="suptable" class="table table-hover m-b-0 sub-table">
                                            <thead>
                                                <tr>
                                                    <!-- <th></th> -->
                                                    <th>Code</th>
                                                    <th>Description</th>
                                                    <th style="width: 15%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                              foreach ($suppliers as $supplier):
                              ?>
                                                <tr>
                                                    <!-- <td></td> -->
                                                    <td><?php echo $supplier->CODE; ?></td>
                                                    <td><?php echo $supplier->NAME; ?></td>
                                                    <td><button type="button" class="editSupplierButton action-btn-c-green" title="edit"
                                                            data-sup-id="<?php echo $supplier->ID; ?>"
                                                            data-sup-code="<?php echo $supplier->CODE; ?>"
                                                            data-sup-name="<?php echo $supplier->NAME; ?>"
                                                            data-sup-address="<?php echo $supplier->ADDRESS; ?>"
                                                            data-sup-contact="<?php echo $supplier->CONTACT_PERSON; ?>"
                                                            data-sup-phoneno="<?php echo $supplier->PHONE_NO; ?>"
                                                            data-sup-telno="<?php echo $supplier->TEL_NO; ?>"
                                                            data-toggle="modal" data-target="#editSupplierModal">
                                                            <i class="icon feather icon-edit f-w-600 f-16 m-r-15"
                                                                style="color: #fff"></i><span
                                                                style="color: #fff; font-size: 13px; margin-left: -8px;">Update</span>
                                                        </button>
                                                        <button type="button" class="deleteButton action-btn-c-red"
                                                            data-delete-url="<?php echo base_url() ?>SupplierController/del_supplier/<?php echo $supplier->ID; ?>"><i
                                                                class="feather icon-trash-2 f-w-600 f-16 m-r-15"
                                                                style="color: #fff"></i><span
                                                                style="color: #fff; font-size: 13px; margin-left: -8px;">Delete</span>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php  
                              endforeach;
                              ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!--  -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

