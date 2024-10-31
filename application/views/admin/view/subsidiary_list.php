<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-building bg-c-yellow"></i>
                    <div class="d-inline">
                        <h5>Subsidiary</h5>
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
                        <li class="breadcrumb-item"><a href="#!">Subsidiary</a>
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
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-auto">
                                            <button type="button" class="btn btn-primary custom-btn-db"
                                                data-toggle="modal" data-target="#addSubModal"><i
                                                    class="feather icon-plus"></i>Add New
                                                Subsidiary</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="card table-card">
                                <div class="card-block">
                                    <div class="table-responsive">
                                        <table id="subtable" class="table table-hover m-b-0" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Description</th>
                                                    <th style="width: 15%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- <?php
                              #foreach ($subsidiaries as $subsidiary):
                              ?>
                                                <tr>
                                                    <td><?php #echo $subsidiary['CODE']; ?></td>
                                                    <td><?php #echo $subsidiary['DESCRIPTION']; ?></td>
                                                    <td>
                                                        <button type="button" class="editSubsidiaryButton btn waves-effect waves-light btn-primary btn-icon" style="border:none; background-color: #02838d;" title="edit"
                                                            data-sub-id="<?php #echo $subsidiary['ID']; ?>"
                                                            data-sub-code="<?php #echo $subsidiary['CODE']; ?>"
                                                            data-sub-descript="<?php #echo $subsidiary['DESCRIPTION']; ?>"
                                                            data-toggle="modal" data-target="#editSubsidiaryModal">
                                                            <i class="icofont icofont-edit" style="padding-left: 5px;"></i>
                                                        </button>
                                                        <button type="button" class="deleteButton btn waves-effect waves-light btn-primary btn-icon" title="Delete" style="border:none; background-color: #f0533a;"
                                                            data-delete-url="<?php #echo base_url() ?>SubsidiaryController/del_subsidiary/<?php #echo $subsidiary['ID']; ?>"><i class="icofont icofont-ui-delete" style="padding-left: 5px;"></i>
                                                  
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php  
                              #endforeach;
                              ?> -->
                                            </tbody>
                                        </table>
                                    </div>
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
<!-- <a href="#" data-toggle="modal"
data-target="#addSubModal" class="float">
<i class="fa fa-plus my-float"></i>
</a> -->