

<div class="page-footer">
    <div class="page-footer-inner">
         <?=date('Y')?> &copy;KPUsahatama Copyright
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->
<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="<?=base_url()?>assets/js/jquery.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<script src="<?=base_url()?>assets/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/morris/raphael-min.js" type="text/javascript"></script>

<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?=base_url()?>assets/js/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?=base_url()?>assets/js/dashboard.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/datatable.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/datatables/datatables.min.js" type="text/javascript"></script>
 <script src="<?=base_url()?>assets/js/table-datatables-managed.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

<script src="<?=base_url()?>assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?=base_url()?>assets/js/layout.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/demo.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/quick-sidebar.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<script type="text/javascript">
$(document).ready(function(){
     $(".yakin").click(function(){
         return confirm("Apa anda yakin ingin menghapus data ini?");
     });
});
</script>
