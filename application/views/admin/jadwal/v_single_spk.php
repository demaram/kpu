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
        <link href="<?=base_url()?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
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
                    <h3 class="page-title"> <?=$heading1?></h3>

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
                                    <a href="<?=base_url()?>admin">PK</a>
                                    <i class="fa fa-angle-right"></i>
                              </li>
                              <li>
                                   <a href="<?=base_url()?>admin/view/<?=$id_pk?>">SPK</a>
                                   <i class="fa fa-angle-right"></i>
                             </li>
                             <li>
                                 <span>View SPK</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <style media="screen">
                    .pk-label{
                         margin-top:-5px;
                         font-size: 15px;
                    }
                    </style>
                   <!--Mulai CONTENT-->
                   <div class="row">
                   <div class="col-md-12 ">
                     <!-- BEGIN SAMPLE FORM PORTLET-->
                     <div class="portlet light ">
                          <div class="portlet-title">
                              <div class="caption ">
                                  <span class="caption-subject bold uppercase"><?=$heading1?></span>
                              </div>
                          </div>
                            <?php
                            if(isset($data_pk))
                            {
                                 foreach ($data_pk as $pk ) {
                                 }
                            }
                            if(isset($data_spk))
                            {
                                 foreach ($data_spk as $spk ) {
                                 }
                            }
                           ?>
                          <div class="portlet-body form">
                              <?php echo validation_errors(); ?>

                              <?=form_open('admin/'.$action , array('class' => 'form-horizontal form-bordered', 'enctype' =>'multipart/form-data')); ?>
                                  <div class="form-body">
                                       <?php if (!empty($row->no_pk_vendor)): ?>


                                       <div class="form-group">
                                           <label class="col-md-2 control-label pk-label"><b>No. PK Client</b></label>
                                           <div class="col-md-4">
                                                   <?=isset($pk->no_pk_vendor) ? $pk->no_pk_vendor : ''?>

                                              </div>
                                       </div><?php endif; ?>


                                       <div class="form-group">
                                           <label class="col-md-2 control-label pk-label"><b>No. PK KPU</b></label>
                                           <div class="col-md-6">
                                                    <?=isset($pk->no_kpu) ? $pk->no_kpu : ''?>
                                              </div>
                                        </div>



                                         <div class="form-group">
                                            <label class="col-md-2 control-label pk-label"><b>No SPK</b></label>
                                            <div class="col-md-6">
                                                     <?=isset($spk->no_spk) ? $spk->no_spk : ''?>
                                               </div>
                                         </div>

                                         <div class="form-group">
                                            <label class="col-md-2 control-label pk-label"><b>Vendor</b></label>
                                            <div class="col-md-6">
                                                     <?=isset($spk->vendor) ? $spk->vendor : ''?>
                                               </div>
                                         </div>

                                         <div class="form-group">
                                            <label class="col-md-2 control-label pk-label"><b>Range Waktu</b></label>
                                            <div class="col-md-6">
                                                     <?=isset($spk->start) ? $spk->start : ''?> -  <?=isset($spk->end) ? $spk->end : ''?>
                                               </div>
                                         </div>

                                         <div class="form-group">
                                            <label class="col-md-2 control-label pk-label"><b>Jumlah Personil</b></label>
                                            <div class="col-md-6">
                                                     <?=isset($spk->jumlah_personil) ? $spk->jumlah_personil : ''?>
                                               </div>
                                         </div>

                                         <div class="form-group">
                                            <label class="col-md-2 control-label pk-label"><b>PIC</b></label>
                                            <div class="col-md-6">
                                                     <?=isset($spk->pic) ? $spk->pic : ''?>
                                               </div>
                                         </div>
                                  </div>
                              </form>
                          </div>
                     </div>
                </div>
                </div>
                    <!--AKHIR CONTENT-->
                    <?php if ($action == 'upd_history'): ?>


                    <!--MULAI HISTORI-->
                    <div class="row">
                   <div class="col-md-12">
                      <!-- BEGIN EXAMPLE TABLE PORTLET-->
                      <div class="portlet light ">
                           <div class="portlet-title">
                               <div class="caption font-dark">
                                   <span class="caption-subject bold uppercase"><?=$heading2?></span>
                               </div>
                           </div>

                               <style media="screen">
                               .table thead tr th {
                                    font-size: 13px;
                                    font-weight: 600;
                               }.table tbody tr td {
                                    font-size: 13px;
                                    font-weight: 400;
                               }
                               </style>
                               <div class="table-toolbar">
                                   <div class="row">
                                       <div class="col-md-6">
                                          <div class="btn-group">
                                               <a href="<?=base_url()?>spk/add/<?=$id_pk?>" id="sample_editable_1_new" class="btn sbold green"> Add New
                                                   <i class="fa fa-plus"></i>
                                              </a>
                                          </div>
                                       </div>
                                   </div>
                               </div>
                               <table class="table table-striped table-bordered table-hover order-column dataTable" id="table1" >
                                   <thead >
                                       <tr >
                                          <th> No </th>
                                          <th> Keterangan </th>
                                          <th> No. SPK </th>
                                          <th> Client </th>
                                          <th> Start </th>
                                          <th> End </th>
                                          <th> Jml Personil </th>
                                          <th> PIC </th>
                                          <th> Act </th>

                                       </tr>
                                   </thead>
                                   <tbody>
                                        <?php
                                        $no = 1;

                                       foreach ($data2 as $row ): ?>
                                       <tr class="odd gradeX">

                                          <td> <?=$no?>  </td>
                                          <td> <?=$row->keterangan?>  </td>
                                          <td> <?=$row->no_spk?>  </td>
                                          <td> <?=$row->vendor?>  </td>
                                          <td> <?=date('d M Y',strtotime($row->start))?> </td>
                                          <td> <?=date('d M Y',strtotime($row->end))?> </td>
                                          <td> <?=$row->jumlah_personil?> Orang</td>
                                          <td> <?=$row->pic?> </td>
                                          <td class="center">
                                               <div class="btn-group">
                                                   <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                       <i class="fa fa-angle-down"></i> Act
                                                   </button>
                                                   <ul class="dropdown-menu" role="menu">
                                                        <li>
                                                           <a href="<?=base_url()?>Spk/view/<?=$row->id_pk?>/<?=$row->id_spk?>">
                                                              <i class="icon-eye"></i>View</a>
                                                       </li>
                                                       <li>
                                                           <a href="<?=base_url()?>Spk/edit/<?=$row->id_pk?>/<?=$row->id_spk?>">
                                                              <i class="icon-pencil"></i>Edit</a>
                                                       </li>
                                                       <li>
                                                          <a href="<?=base_url()?>Spk/delete/<?=$row->id_spk?>/<?=$row->id_pk?>" class="yakin">
                                                             <i class="icon-trash"></i>Delete</a>
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
                    <!--AKHIR HOSTORI-->
                      <?php endif; ?>


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
