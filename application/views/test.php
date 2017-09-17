<?php $this->load->view('__template/footer.php');



 ?>



<div id="count">
</div>
<script type="text/javascript">

     $(document).ready(function(){
          setInterval(ajaxCall, 1000);

     });

     function ajaxCall(){
                       $.ajax({
                              type : "POST",
                              url : "<?=base_url();?>user/fetch",
                              data : "s",
                              success : function(data){
                                   $("#count").html(data);
                              }
                       });

     }

</script>
