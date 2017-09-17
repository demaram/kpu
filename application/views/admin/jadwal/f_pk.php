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
                                  <span>Add Data</span>
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
                              <div class="caption">
                                  <span class="caption-subject bold uppercase"><?=$heading2?></span>
                              </div>
                          </div>
                            <?php
                            if(isset($data))
                            {
                                 foreach ($data as $row ) {
                                 }
                            }
                           ?>
                          <div class="portlet-body form">
                              <?php echo validation_errors(); ?>

                              <?=form_open('admin/'.$action , array('class' => 'form-horizontal', 'enctype' =>'multipart/form-data')); ?>
                                  <div class="form-body">
                                       <input type="text" name="id_pk" hidden value="<?=isset($row->id_pk) ? $row->id_pk : ''?>">

                                       <div class="form-group">
                                           <label class="col-md-2 control-label">No. PK Client*</label>
                                           <div class="col-md-6">
                                                   <input type="text" required class="form-control" <?=$action == 'upd_history'  ? 'disabled' : '' ?> id="no_pk_vendor"  placeholder="Nomor PK Client" name="no_pk_vendor" value="<?=isset($row->no_pk_vendor) ? $row->no_pk_vendor : ''?>"><span id="pesan1"></span>
                                                        <?=form_error('no_pk_vendor','<span class="label label-danger label-mini"> ','</span>');?>
                                              </div>

                                       </div>

                                       <div class="form-group">
                                           <label class="col-md-2 control-label">No. PK KPU</label>
                                           <div class="col-md-6">
                                                  <input type="text"  class="form-control"  <?=$action == 'upd_history' ? 'disabled' : '' ?> id="no_kpu" placeholder="Nomor PK KPU" name="no_kpu" value="<?=isset($row->no_kpu) ? $row->no_kpu : ''?>"><span id="pesan2"></span>
                                                       <?=form_error('no_kpu','<span class="label label-danger label-mini"> ','</span>');?>
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
                    <?php if ($action == 'upd_history'): ?>


                    <!--MULAI HISTORI-->
                    <div class="row">
                   <div class="col-md-12">
                      <!-- BEGIN EXAMPLE TABLE PORTLET-->
                      <div class="portlet light ">
                           <div class="portlet-title">
                               <div class="caption font-dark">
                                   <span class="caption-subject bold uppercase"><?=$heading1?></span>
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
                               <table class="table table-striped table-bordered table-hover order-column dataTable" id="table1" >
                                   <thead >
                                       <tr >
                                          <th> No </th>
                                          <th> No. SPK </th>
                                          <th> Client </th>
                                          <th> Penempatan </th>
                                          <th> Start </th>
                                          <th> End </th>
                                          <th> Jml Personil </th>
                                          <th> PIC </th>

                                       </tr>
                                   </thead>
                                   <tbody>
                                        <?php
                                        $no = 1;

                                       foreach ($data2 as $row ): ?>
                                       <tr class="odd gradeX">

                                          <td> <?=$no?>  </td>
                                          <td> <?=$row->no_spk?>  </td>
                                          <td> <?=$row->vendor?>  </td>
                                          <td> <?=$row->penempatan?> </td>
                                          <td> <?=date('d M Y',strtotime($row->start))?> </td>
                                          <td> <?=date('d M Y',strtotime($row->end))?> </td>
                                          <td> <?=$row->jumlah_personil?> Orang</td>
                                          <td> <?=$row->pic?> </td>

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

<script src="<?=base_url()?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script type="text/javascript">

$( function() {
    $( ".datepicker" ).datepicker({
          changeMonth: true,
          changeYear: true,
          yearRange: '2000:+0',
          dateFormat : 'd-m-Y'
    });
  });

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
