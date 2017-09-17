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
                    <h3 class="page-title"> Histori SPK
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
                                <span>Histori SPK</span>
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


                              <table class="table table-striped table-bordered table-hover order-column dataTable" id="table1" >
                                  <thead >
                                      <tr >
                                         <th width="7%">  No </th>
                                         <th> Perihal </th>
                                         <th> No SPK </th>
                                         <th> Perpanjangan Dari</th>
                                         <th> Tanggal berakhir </th>
                                         <th> Keterangan </th>
                                         <th> Action </th>
                                      </tr>
                                  </thead>
                                  <tbody>


                                       <?php

                                       $no = 1;

                                      foreach ($data as $row ){
                                           $histori = $this->db->query("SELECT * FROM spk where id_spk = '$row->id_histori' ")->result();
                                           foreach($histori as $row2){}

                                           ?>
                                      <tr class="odd gradeX">

                                         <td>  <?=$no?>  </td>
                                         <td> <?=$row->perihal?>  </td>
                                         <td> <?=$row->no_spk?> </td>
                                         <td>  <?=isset($row2->no_spk) ? '<span class="label label-sm label-info">'.$row2->no_spk.'</span>' : '<span class="label label-sm label-primary">(baru)</span>'?> </td>
                                         <td> <?=$row->end?> </td>
                                         <td> <?=$row->keterangan?> </td>
                                         <td class="center">
                                              <div class="btn-group">
                                                  <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                      <i class="fa fa-angle-down"></i> Act
                                                  </button>
                                                  <ul class="dropdown-menu" role="menu">
                                                      <li>
                                                          <a href="<?=base_url()?>histori/view/<?=$row->id_histori?>/<?=$row->id_spk?>/<?=$row->id_pk?>">
                                                             <i class="icon-eye"></i>View Histori</a>
                                                      </li>
                                                      <li>
                                                          <a href="<?=base_url()?>histori/delete/<?=$row->id_spk?>">
                                                             <i class="icon-trash"></i>Delete</a>
                                                      </li>


                                                  </ul>
                                              </div>
                                         </td>
                                      </tr>
                                      <?php $no++; } ?>


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
     $('.dataTable').DataTable();

     $(".alert").delay(5000).hide(1000);
});



</script>
</html>
