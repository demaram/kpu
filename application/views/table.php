
<link rel="stylesheet" href="<?=base_url()?>assets/css/user.css">
<div id="style">

</div>
<style media="screen">
     body{
          zoom: 100%;
          overflow-y: true;
           overflow-x: true;
          moz-transform: scale(0.9);
     }
     th{
          text-align: left;
          color:transparent;
     }
     td{
          text-align: left;
          border: 1px solid #eee;
     }


     th > .fixlah{
       position: absolute;
       padding: 7px 0px 0px 0px !important   ;
       background-color: transparent;
       margin-top:-59px;
       line-height: normal;
       justify-content:center;
       color: #fff;

     }
     th:first-child .fixlah{
       border: none;
     }
#seksi{
     border: 1px solid #000;
    padding-top: 37px;
    background: #0f406e;
}
#seksi.positioned {
  position: absolute;
  top:100px;
  left:100px;
  width:800px;
  box-shadow: 0 0 15px #333;
}
</style>
<div class="row">
   <div class="col-md-12">

       <!-- BEGIN EXAMPLE TABLE PORTLET-->
       <div class="portlet box">
            <div class="portlet-title">

                <div class="tools"> </div>
            </div>
            <div id="contain2">
                <table class="table_scroll alert"  id="pertama" >

                </table>
            </div>
       </div>
       <!-- END EXAMPLE TABLE PORTLET-->
   </div>

   <div class="col-md-12">

       <!-- BEGIN EXAMPLE TABLE PORTLET-->
       <div class="portlet box" id="seksi">
            <div id="contain" class="wrap">
                 <table class="table_scroll " id="handsome" >
                      <thead>
                          <tr>
                              <th>Client
                                   <div class="fixlah">Client</div>
                              </th>
                              <th >Perihal<div class="fixlah">Perihal</div></th>
                              <th >No SPK<div class="fixlah">No SPK</div></th>
                              <th>Start<div class="fixlah">Start</div></th>
                              <th>End<div class="fixlah">End</div></th>
                              <th >Lokasi<div class="fixlah">Lokasi</div></th>
                              <th>Personil<div class="fixlah">Personil</div></th>
                              <th>PIC<div class="fixlah">PIC</div></th>
                              <th>Keterangan<div class="fixlah">Keterangan</div></th>
                          </tr>
                      </thead>
                    <tbody id="kedua">

                    </tbody>
                </table>
            </div>
       </div>
       <!-- END EXAMPLE TABLE PORTLET-->
   </div>

</div>
<?php $this->load->view('__template/footer.php') ?>

<script type="text/javascript">

     $(document).ready(function(){
          setInterval(style, 3000);
          setInterval(ajaxCall, 3000);
          setInterval(ajaxCall2, 3000);

     });

     function style(){
          $.ajax({
                 type : "POST",
                 url : "<?=base_url();?>ajax/style",
                 data : "",
                 success : function(data){
                      $("#style").html(data);
                 }
          });
     }

     function ajaxCall(){
                       $.ajax({
                              type : "POST",
                              url : "<?=base_url();?>ajax/fetch1",
                              data : "",
                              success : function(data){
                                   $("#pertama").html(data);
                              }
                       });


     }


    function ajaxCall2(){
                     $.ajax({
                             type : "POST",
                             url : "<?=base_url();?>ajax/fetch2",
                             data : "",
                             success : function(data){
                                  $("#kedua").html(data);
                             }
                     });

    }


    $(document).ready(function(){
        $(".sticky-header").floatThead({scrollingTop:50});
    });
</script>



<script type="text/javascript">
var my_time;
$(document).ready(function() {
  pageScroll();
  $("#contain").mouseover(function() {
    clearTimeout(my_time);
  }).mouseout(function() {
    pageScroll();
  });
});

function pageScroll() {
	var objDiv = document.getElementById("contain");
  objDiv.scrollTop = objDiv.scrollTop + 1;
  console.log(objDiv.height);
  if (objDiv.scrollTop == (objDiv.scrollHeight - objDiv.clientHeight)) {
    objDiv.scrollTop = 30;
  }
  my_time = setTimeout('pageScroll()', 90);
}

</script>
