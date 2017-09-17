<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- END SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <?php $segment =  $this->uri->segment(1);

         ?>
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start <?=$segment == 'admin' ? 'active open' : ''  ?> ">
                <a href="<?=base_url()?>admin" class="nav-link">
                    <i class="icon-home"></i>
                    <span class="title">Data PK & SPK</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
               </a>
            </li>

            <li class="nav-item start <?=$segment == 'histori' ? 'active open' : ''  ?>">
                <a href="<?=base_url()?>histori" class="nav-link">
                    <i class="fa fa-map"></i>
                    <span class="title">History SPK</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
               </a>
            </li>

            <li class="nav-item start <?=$segment == 'profile' ? 'active open' : ''  ?>">
                <a href="<?=base_url()?>profile" class="nav-link">
                    <i class="icon-user"></i>
                    <span class="title">Profil</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
               </a>
            </li>



            <li class="nav-item start">
                <a href="<?=base_url()?>logout" class="nav-link">
                    <i class="fa fa-sign-out"></i>
                    <span class="title">Logout</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
               </a>
            </li>


          </ul>

        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->
