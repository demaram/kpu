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
                    <h3 class="page-title"> <?=$heading1         ?>
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
                                   <a href="<?=base_url()?>histori">Histori SPK</a>
                                   <i class="fa fa-angle-right"></i>
                             </li>

                             <li>
                                 <span>Lihat Histori</span>
                             </li>
                        </ul>

                    </div>
                    <!-- END PAGE HEADER-->
                    <!--Mulai CONTENT-->

                    <div class="row">
                    <div class="col-md-12 ">
                      <!-- BEGIN SAMPLE FORM PORTLET-->
                      <div class="portlet light ">
                           <div class="portlet-title">
                               <div class="caption ">
                                   <span class="caption-subject bold uppercase"><?=$heading2?></span>
                               </div>
                           </div>
                             <?php
                             if(isset($data_pk))
                             {
                                  foreach ($data_pk as $row ) {
                                  }
                             }

                            ?>

                            <style media="screen">
                            .pk-label{
                                 margin-top:-5px;
                                 font-size: 15px;
                            }
                            </style>
                           <div class="portlet-body form">
                               <?php echo validation_errors(); ?>

                               <?=form_open('admin/' , array('class' => 'form-horizontal form-bordered', 'enctype' =>'multipart/form-data')); ?>
                                   <div class="form-body">
                                        <?php if (!empty($row->no_pk_vendor)): ?>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label pk-label" style=""><b>No. PK Vendor</b></label>
                                            <div class="col-md-4">
                                                <?=isset($row->no_pk_vendor) ? $row->no_pk_vendor : ''?>
                                            </div>
                                        </div>
                                        <?php endif; ?>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label pk-label" ><b>No. PK KPU</b></label>
                                            <div class="col-md-6">
                                                     <?=isset($row->no_kpu) ? $row->no_kpu : ''?>
                                               </div>
                                         </div>





                                   </div>
                               </form>
                           </div>
                      </div>
                 </div>
                 </div>
                     <!--AKHIR CONTENT-->

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
                                         <th> Status </th>
                                         <th> Perpanjangan Dari</th>
                                         <th> Tanggal berakhir </th>
                                         <th> Keterangan </th>
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
                                         <td> <?=$row->status == '1' ? '<span class="label label-sm label-success">Aktif</span>' : '<span class="label label-sm label-danger"> Tidak Aktif</span>'?>  </td>
                                         <td>  <?=isset($row2->no_spk) ? $row2->no_spk : '<span class="label label-sm label-primary">(Awal)</span>'?> </td>
                                         <td> <?=$row->end?> </td>
                                         <td> <?=$row->keterangan?> </td>

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
