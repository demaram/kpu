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
                                 <span><?=$heading2?></span>
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
                                   <span class="caption-subject bold uppercase"><?=$heading3?></span>
                               </div>
                           </div>
                             <?php
                             if(isset($data_pk))
                             {
                                  foreach ($data_pk as $row ) {
                                  }
                             }
                             if(isset($data_spk))
                             {
                                  foreach ($data_spk as $row2 ) {
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

                               <?=form_open('admin/'.$action , array('class' => 'form-horizontal form-bordered', 'enctype' =>'multipart/form-data')); ?>
                                   <div class="form-body">
                                        <?php if (!empty($row->no_pk_vendor)): ?>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label pk-label" style=""><b>No. PK Client</b></label>
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

                                         <?php if ($action == 'extends'): ?>
                                              <div class="form-group">
                                                  <label class="col-md-2 control-label pk-label" ><b>No. SPK Diperpanjang</b></label>
                                                  <div class="col-md-6">
                                                          <?=isset($row2->no_spk) ? $row2->no_spk : ''?>
                                                     </div>
                                              </div>
                                         <?php endif; ?>



                                   </div>
                               </form>
                           </div>
                      </div>
                 </div>
                 </div>
                     <!--AKHIR CONTENT-->
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

                   <!--Mulai CONTENT-->
                   <div class="row">
                   <div class="col-md-12 ">
                     <!-- BEGIN SAMPLE FORM PORTLET-->
                     <div class="portlet light ">
                          <div class="portlet-title">
                              <div class="caption">
                                  <span class="caption-subject bold uppercase"><?=$heading2?></span>
                              </div>
                          </div>

                          <?php
                          if(isset($data))
                          {
                               foreach ($data as $row ) {
                               }
                          } ?>


                          <div class="portlet-body form">
                              <?php echo validation_errors(); ?>

                              <?=form_open('Spk/'.$action , array('class' => 'form-horizontal', 'enctype' =>'multipart/form-data')); ?>
                                  <div class="form-body">
                                       <input type="text" name="id_pk" hidden value="<?=isset($id_pk) ? $id_pk : ''?>">
                                       <input type="text" name="id_histori" hidden value="<?=isset($row2->id_histori) ? $row2->id_histori : ''?>">
                                       <input type="text" name="id_spk" hidden value="<?=isset($row2->id_spk) ? $row2->id_spk : ''?><?=isset($row->id_spk) ? $row->id_spk : ''?>">

                                       <div class="form-group">
                                           <label class="col-md-2 control-label"><?=$action =='extends' ? 'Keterangan Perpanjangan SPK' : 'Keterangan'?></label>
                                           <div class="col-md-6">
                                                    <input type="text" class="form-control"  placeholder="Keterangan" name="keterangan" value="<?=isset($row->keterangan) ? $row->keterangan : ''?>">
                                                         <?=form_error('no_spk','<span class="label label-danger label-mini"> ','</span>');?>
                                              </div>
                                        </div>

                                       <div class="form-group">
                                           <label class="col-md-2 control-label"><?=$action=='extends' ? 'No SPK Baru' : 'No SPK'?></label>
                                           <div class="col-md-6">
                                                    <input type="text" class="form-control"  placeholder="Nomor SPK" name="no_spk" value="<?=isset($row->no_spk) ? $row->no_spk : ''?>">
                                                         <?=form_error('no_spk','<span class="label label-danger label-mini"> ','</span>');?>
                                              </div>
                                        </div>

                                       <div class="form-group">
                                            <label class="col-md-2 control-label">Client</label>
                                            <div class="col-md-6">
                                                     <input type="text" class="form-control"  placeholder="Nama Client" name="vendor" value="<?=isset($row->vendor) ? $row->vendor : ''?>">
                                                          <?=form_error('vendor','<span class="label label-danger label-mini"> ','</span>');?>
                                               </div>
                                       </div>


                                      <div class="form-group">
                                           <label class="col-md-2 control-label">Start -  End*</label>
                                           <div class="col-md-3">
                                                    <input type="text" required class="form-control daterange"  placeholder="Mulai Ditempatkan" name="time" value="<?=isset($row->start) && isset($row->end) ? date('m/d/Y',strtotime($row->start)) - date('m/d/Y',strtotime($row->end))  : ''?>">
                                                    <?=form_error('start','<span class="label label-danger label-mini"> ','</span>');?>
                                              </div>
                                      </div>

                                      <div class="form-group">
                                         <label class="col-md-2 control-label">Lokasi Penempatan </label>
                                         <div class="col-md-3">
                                                   <input type="text" class="form-control"  placeholder="Lokasi Penempatan" name="penempatan" value="<?=isset($row->penempatan) ? $row->penempatan : ''?>">
                                                   <?=form_error('penempatan','<span class="label label-danger label-mini"> ','</span>');?>
                                             </div>
                                     </div>

                                      <div class="form-group">
                                           <label class="col-md-2 control-label">Jumlah Personil </label>
                                           <div class="col-md-3">
                                                    <input type="text" class="form-control number"  placeholder="Jumlah Personil" name="jumlah_personil" value="<?=isset($row->jumlah_personil) ? $row->jumlah_personil : ''?>">
                                                    <?=form_error('jumlah_personil','<span class="label label-danger label-mini"> ','</span>');?>
                                              </div>
                                      </div>


                                      <div class="form-group">
                                          <label class="col-md-2 control-label">PIC</label>
                                          <div class="col-md-6">
                                                   <input type="text" class="form-control"  placeholder="Person In Charge" name="pic" value="<?=isset($row->pic) ? $row->pic : ''?>">
                                                        <?=form_error('pic','<span class="label label-danger label-mini"> ','</span>');?>
                                             </div>
                                     </div>

                                     <div class="form-group">
                                         <label class="col-md-2 control-label">Perihal</label>
                                         <div class="col-md-6">
                                                  <input type="text" class="form-control"  placeholder="Perihal" name="perihal" value="<?=isset($row->perihal) ? $row->perihal : ''?>">
                                                       <?=form_error('perihal','<span class="label label-danger label-mini"> ','</span>');?>
                                            </div>
                                      </div>


                                        <div class="form-group">
                                             <div class="col-md-offset-2 col-md-10">
                                                  <button type="submit" class="btn blue">Submit</button>
                                                  <button type="reset" class="btn green-jungle">Reset</button>
                                             </div>
                                       </div>
                                  </div>
                              </form>
                          </div>
                     </div>
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
<script src="<?=base_url()?>assets/plugins/daterangepicker/moment.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

<script type="text/javascript">
$(function() {
    $('.daterange').daterangepicker({
         locale: {
             format: 'YYYY/MM/DD'
          },
          <?php
               if (isset($row->start) AND isset($row->end)) {
                    echo "startDate : '".date('Y/m/d',strtotime($row->start))."',";
                    echo "endDate : '".date('Y/m/d',strtotime($row->end))."',";
               }
          ?>
    });

});
</script>
<script type="text/javascript">

  $(document).ready(function() {
    $(".number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});
</script>
<script type="text/javascript">
     $(document).ready(function(){
          $("#no_pk_vendor").change(function(){
            var no_pk_vendor = $("#no_pk_vendor").val();
             $.ajax({
                    type : "POST",
                    url : "<?=base_url();?>ajax/cek_permata",
                    data : "no_pk_vendor=" + no_pk_vendor,
                    success : function(data){
                         $("#pesan1").html(data);
                    }
             });
          });
     });
</script>
<script type="text/javascript">
     $(document).ready(function(){
          $("#no_kpu").change(function(){
            var no_kpu = $("#no_kpu").val();
             $.ajax({
                    type : "POST",
                    url : "<?=base_url();?>ajax/cek_kpu",
                    data : "no_kpu=" + no_kpu,
                    success : function(data){
                         $("#pesan2").html(data);
                    }
             });
          });
     });
</script>
</html>
