    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <h3 class="animated fadeInLeft">Data All Customer Type</h3>
                        <p class="animated fadeInDown">
                            <a href="<?= base_url('dashboard');?>">CSIS</a> <span class="fa-angle-right fa"></span> Data All Customer Type
                        </p>
                    </div>
                    <div class="col-md-6">
                        <ul style="float:right;">
                          <li class="time">
                            <h1 class="animated fadeInLeft" align="center" style="font-size: 25px;">21:00</h1>
                            <p class="animated fadeInRight">Sat,October 1st 2029</p>
                          </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <?= $this->session->flashdata('info'); ?>

        <div class="col-md-12 top-20 padding-0">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <button class="btn btn-primary btn-xs collapsed" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <span data-toggle="tooltip" data-placement="right" title="Collapse for Action">Show</span>
                        </button>
                        <div style="height: 0px;" aria-expanded="false" class="collapse" id="collapseExample">
                            <div class="well">
                                <!--<div class="col-md-9">-->
                                <button type="button" class="btn btn-sm btn-raised btn-primary" data-toggle="modal" data-target="#modal_form">
                                  <i class="fa fa-plus"> Add</i>
                                </button>
                                <!--</div>
                                <button type="button" class="btn  btn-sm btn-raised btn-primary" data-toggle="modal" data-target="#login-modal">
                                  <i class="fa fa-file-excel-o"> Import</i>
                                </button>
                                <a href="<?php //echo base_url('customer/excelfiles'); ?>">
                                    <button type="button" class="btn  btn-sm btn-raised btn-primary">
                                        <i class="fa fa-file-excel-o"> Export</i>
                                    </button>
                                </a>-->
                                
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="responsive-table">
                            <table id="datatables-example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 10px;" align="center" >No.</th>
                                    <th>Name Type</th>
                                    <th>Timestamp Insert</th>
                                    <th>Last Timestamp Update</th>
                                    <th style="width: 160px;" align="center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                        foreach ($customer_type as $v):
                                ?>
                                <tr>
                                    <td align="center"><?= $no; ?></td>
                                    <td><?php echo $v->cust_type_name; ?></td>
                                    <td><?php echo $v->cust_type_insert; ?></td>
                                    <td><?php echo $v->cust_type_update; ?></td>
                                    <td>
                                        <a href="<?= base_url();?>customer_type/update/<?= $v->cust_type_id ?>" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-pencil"></i></a> 
                                        <a href="javascript:if(confirm('Are you sure to delete this data???')){document.location='<?= base_url();?>customer_type/process_delete/<?= $v->cust_type_id; ?>';}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                                    $no++;
                                    endforeach;
                                ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>

    <!-- Add Data Customer -->
    <!-- Modal -->
    <div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Form Input Customer Type</h4>
                </div>
                
                <?= form_open('customer_type/process_insert'); ?>
                <?= validation_errors(); ?>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="">Customer Type Name</label>
                            <input name="cust_type_name" placeholder="Type Name" class="form-control" type="text" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" >Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

                <?= form_close(); ?>

            </div>
        </div>
    </div>
    <!-- End Add Data Customer -->

  <!-- End Bootstrap modal -->

  <!-- Import Data GSM -->
    <!-- Modal -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="loginmodal-container">
                <h1>Import File Excel</h1><br>

                <?php  echo form_open_multipart('customer/do_upload') . "\n"; ?>
                    <input type="file" id="file_upload" name="userfile" /><br>
                    <input type="submit" name="login" class="login loginmodal-submit" value="Upload">
                <?php echo form_close(); ?>
                
            </div>
        </div>
    </div>
    <!-- End Import Data GSM -->
