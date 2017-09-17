<div class="page-header-inner ">
   <!-- BEGIN LOGO -->
   <div class="page-logo">
        <img src="<?=base_url()?>assets/img/logo1.png" class="logo-default">
        <div class="menu-toggler sidebar-toggler" >

        </div>
   </div>

   <!-- END LOGO -->
   <!-- BEGIN RESPONSIVE MENU TOGGLER -->
   <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
   <!-- END RESPONSIVE MENU TOGGLER -->
   <!-- BEGIN PAGE ACTIONS -->

   <!-- END PAGE ACTIONS -->
   <!-- BEGIN PAGE TOP -->
   <div class="page-top">
        <!-- BEGIN TOP NAVIGATION MENU -->

         <div class="top-menu">

             <ul class="nav navbar-nav top-date " >
                 <i> Current Date : </i><b>  <?=date('d M Y')?> </b>
             </ul>
            <ul class="nav navbar-nav pull-right">
                 <?php
                 $id = $this->session->userdata('id') ;
                 $user = $this->db->query("SELECT * FROM users where id ='$id'")->result();
                 foreach ($user as $row) {
                 }
                 ?>

                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="<?=base_url()?>assets/img/<?=$row->photo?>" />
                        <span class="username username-hide-on-mobile"> <?= $row->username?> </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="<?=base_url()?>profile">
                               <i class="icon-user"></i> My Profile </a>
                        </li>
                        <li>
                            <a href="<?=site_url()?>logout">
                               <i class="icon-key"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->

            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
   </div>
   <!-- END PAGE TOP -->
</div>
<!-- END HEADER INNER -->
