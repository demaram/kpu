<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title><?=$title?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <?php $this->load->view('admin/__template/header'); ?>
    </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
           <?php $this->load->view('admin/__template/navbar'); ?>

        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <?php $this->load->view('admin/__template/sidebar');?>
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                      <?php $this->load->view('admin/__template/option');?>
                    <h3 class="page-title"> Dashboard
                    </h3>

                    <?php if (!empty($this->session->flashdata('success'))): ?>
                    <div class="alert alert-success costum-alerts">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true" name="button"></button>
                         <?=$this->session->flashdata('success');?>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($this->session->flashdata('error'))): ?>
                    <div class="alert alert-danger costum-alerts">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true" name="button"></button>
                         <?=$this->session->flashdata('error');?>
                    </div>
                    <?php endif; ?>

                    <div class="page-bar">
                         <ul class="page-breadcrumb">
                              <li>
                                     <i class="icon-home"></i>
                                     <a href="<?=base_url()?>admin">Home</a>
                                     <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>PK</span>
                            </li>
                        </ul>

                    </div>
                    <!-- END PAGE HEADER-->
                   <!--Mulai CONTENT-->
                   <div class="row">
                  <div class="col-md-12">
                     <!-- BEGIN EXAMPLE TABLE PORTLET-->
                     <div class="portlet light ">
                          <div class="portlet-title">
                              <div class="caption font-dark">
                                  <span class="caption-subject bold uppercase"><?=$heading1?></span>
                              </div>
                          </div>
                          <div class="portlet-body">
                              <div class="table-toolbar">
                                  <div class="row">
                                      <div class="col-md-6">
                                         <div class="btn-group">
                                              <a href="<?=base_url()?>admin/add" id="sample_editable_1_new" class="btn sbold green"> Add New
                                                  <i class="fa fa-plus"></i>
                                             </a>
                                         </div>
                                         <div class="btn-group">
                                              <a href="<?=base_url()?>admin/exportExcel" id="sample_editable_2_new" class="btn sbold green-jungle">Export Excel
                                                  <i class="fa fa-file-excel-o"></i>
                                             </a>
                                         </div>
                                      </div>
                                  </div>
                              </div>

                              <table class="table table-striped table-bordered table-hover order-column dataTable" id="table1" >
                                  <thead >
                                      <tr >
                                         <th width="7%">  No </th>
                                         <th> No. PK Client </th>
                                         <th> No. PK KPU</th>
                                         <th> Action </th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                       <?php
                                       $no = 1;

                                      foreach ($data as $row ): ?>
                                      <tr class="odd gradeX">

                                         <td>   <?=$no?>  </td>

                                         <td><a href="<?=base_url()?>admin/view/<?=$row->id_pk?>"> <?=$row->no_pk_vendor?></a> </td>
                                         <td>  <?=$row->no_kpu?>  </td>
                                         <td class="center">
                                              <div class="btn-group">
                                                  <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                      <i class="fa fa-angle-down"></i> Act
                                                  </button>
                                                  <ul class="dropdown-menu" role="menu">
                                                      <li>
                                                          <a href="<?=base_url()?>admin/view/<?=$row->id_pk?>">
                                                             <i class="icon-eye"></i> SPK</a>
                                                      </li>
                                                      <li>
                                                          <a href="<?=base_url()?>admin/edit/<?=$row->id_pk?>">
                                                             <i class="icon-pencil"></i> Edit</a>
                                                      </li>
                                                      <li>
                                                          <a href="<?=base_url()?>admin/delete/<?=$row->id_pk?>" class="yakin">
                                                             <i class="icon-trash"></i> Delete</a>
                                                      </li>

                                                  </ul>
                                              </div>
                                         </td>
                                      </tr>
                                      <?php $no++; endforeach; ?>


                                  </tbody>
                              </table>
                          </div>
                     </div>
                     <!-- END EXAMPLE TABLE PORTLET-->
                  </div>
              </div>


                    <!--AKHIR CONTENT-->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->

        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php $this->load->view("admin/__template/footer"); ?>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>
<script type="text/javascript">
$(document).ready(function(){
     $('.dataTable').DataTable({
          "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
        "iDisplayLength": 25
     });

     $(".alert").delay(5000).hide(1000);
});


</script>
</html>
