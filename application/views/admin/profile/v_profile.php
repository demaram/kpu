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
        <link rel="stylesheet" href="<?=base_url()?>assets/css/profile.css">
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
                    <h3 class="page-title">User Profile
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

                    <?php if (!empty($this->session->flashdata('error_upload'))): ?>
                         <?php foreach ($this->session->flashdata('error_upload') as $error): ?>


                         <div class="alert alert-danger costum-alerts">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true" name="button"></button>
                              <?=$error?>
                         </div>
                         <?php endforeach; ?>
                    <?php endif; ?>

                    <div class="page-bar">
                         <ul class="page-breadcrumb">
                              <li>
                                     <i class="icon-home"></i>
                                     <a href="<?=base_url()?>admin">Home</a>
                                     <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Profile</span>
                            </li>
                        </ul>

                    </div>
                    <!-- END PAGE HEADER-->
                   <!--Mulai CONTENT-->
                   <div class="row">
                        <?php
                        if(isset($data))
                        {
                             foreach ($data as $row ) {
                             }
                        }
                       ?>
                        <div class="col-md-12">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            <div class="profile-sidebar">
                                <!-- PORTLET MAIN -->
                                <div class="portlet light profile-sidebar-portlet ">
                                    <!-- SIDEBAR USERPIC -->
                                    <div class="profile-userpic">
                                        <img src="<?=base_url()?>assets/img/<?=$row->photo?>" class="img-responsive" alt=""> </div>
                                    <!-- END SIDEBAR USERPIC -->
                                    <!-- SIDEBAR USER TITLE -->
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name"> <?=$row->first_name?> <?=$row->last_name?> </div>
                                        <div class="profile-usertitle-job"> <?=$row->occupation?> </div>
                                        <div class="profile-usertitle-name"> <?=$row->phone?> </div>
                                        <div class="profile-usertitle-name"> <?=$row->email?> </div>
                                    </div>
                                    <!-- END SIDEBAR USER TITLE -->



                                </div>
                                <!-- END PORTLET MAIN -->

                            </div>
                            <!-- END BEGIN PROFILE SIDEBAR -->
                            <!-- BEGIN PROFILE CONTENT -->
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light ">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <?php echo validation_errors(); ?>
                                                        <?=form_open('profile/update' , array('class' => 'form-horizontal form-bordered', 'enctype' =>'multipart/form-data')); ?>
                                                             <div class="form-group">
                                                                 <label class="control-label">Username</label>
                                                                 <input type="text" placeholder="<?=$row->username?>" class="form-control" name="username" value="<?=$row->username?>"/> </div>
                                                            <div class="form-group">
                                                                 <input type="hidden" name="id_user" value="<?=$row->id?>">
                                                                <label class="control-label">First Name</label>
                                                                <input type="text" placeholder="<?=$row->first_name?>" class="form-control" name="first_name" value="<?=$row->first_name?>"/> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Last Name</label>
                                                                <input type="text" placeholder="<?=$row->last_name?>" class="form-control" name="last_name" value="<?=$row->last_name?>"/> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Phone Number</label>
                                                                <input type="text" placeholder="<?=$row->phone?>" class="form-control" name="phone" value="<?=$row->phone?>" class="number"/> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Occupation</label>
                                                                <input type="text" placeholder="<?=$row->occupation?>" class="form-control" name="occupation" value="<?=$row->occupation?>"/> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Email</label>
                                                                <input type="email" placeholder="<?=$row->email?>" class="form-control" name="email" value="<?=$row->email?>"/> </div>
                                                            <div class="margiv-top-10">
                                                                <button class="btn green" value="submit"> Save Changes </button>
                                                                <button class="btn default" value="reset"> Cancel </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END PERSONAL INFO TAB -->
                                                    <!-- CHANGE AVATAR TAB -->
                                                    <div class="tab-pane" id="tab_1_2">

                                                        <?=form_open('profile/photoUpdate' , array('class' => 'form-horizontal form-bordered', 'enctype' =>'multipart/form-data')); ?>
                                                            <div class="form-group">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                        <img src="<?=base_url()?>assets/img/no_img.png" alt="" /> </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new" > Select image </span>
                                                                            <span class="fileinput-exists"> Change </span>
                                                                            <input type="file" name="photo">
                                                                            <input type="hidden" name="id_user" value="<?=$row->id?>">
                                                                            <input type="hidden" name="photo_lama" value="<?=$row->photo?>">
                                                                        </span>
                                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix margin-top-10">
                                                                    <span class="label label-danger">NOTE!</span>
                                                                    <span> Upload gambar hanya dengan ekstensi .png .jpg .jpeg </span>
                                                                </div>
                                                            </div>
                                                            <div class="margin-top-10">
                                                                <button value="submit" class="btn green" style="margin-left:-15px;"> Submit </button>
                                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END CHANGE AVATAR TAB -->
                                                    <!-- CHANGE PASSWORD TAB -->
                                                    <div class="tab-pane" id="tab_1_3">
                                                        <?=form_open('auth/change_password' , array('class' => 'form-horizontal form-bordered', 'enctype' =>'multipart/form-data')); ?>
                                                            <div class="form-group">
                                                                <label class="control-label">Current Password</label>
                                                                <input type="password" class="form-control" name="old" id="old"/> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">New Password</label>
                                                                <input type="password" class="form-control" name="new" id="new" /> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Re-type New Password</label>
                                                                <input type="password" class="form-control"  name="new_confirm" id="new_confirm"/> </div>
                                                                <input type="hidden" name="user_id" value="<?=$row->id?>">
                                                                <span id="pesan" style="margin-left:-15px"></span>
                                                            <div class="margin-top-10">
                                                                <button  value="submit" class="btn green"> Change Password </button>
                                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                                            </div>
                                                        </form>


                                                    </div>
                                                    <!-- END CHANGE PASSWORD TAB -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROFILE CONTENT -->
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
        <script type="text/javascript" src="<?=base_url()?>assets/js/profile.js">

        </script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>
    <script type="text/javascript">
        $(document).ready(function(){
             $("#new_confirm").keyup(function(){
                  var pwd = $("#new").val();
                  var confirm_pwd = $("#new_confirm").val();

                  if (pwd != confirm_pwd ) {
                       $("#pesan").html("<span class='label label-danger'>Password Not Match</span>");
                  }else {
                       $("#pesan ").html("<span class='label label-success'>Password Match</span>");
                  }

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
</html>
