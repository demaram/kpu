
<div id="style">

</div>

<div class="row">
   <div class="col-md-12">

       <!-- BEGIN EXAMPLE TABLE PORTLET-->
       <div class="portlet box">
            <div class="portlet-title">
                <div class="caption">
                    <img src="<?=base_url()?>/assets/img/logo1.png" alt="" style="width:210px;height:76px;">
               </div>
                <div class="tools"> </div>
            </div>
            <div id="contain2">
                <table class="table_scroll alert" id="handsone">
                    <thead>
                        <tr>
                            <th style="max-width:124px;">Vendor</th>
                            <th >PK</th>
                            <th >Perihal</th>
                            <th >No SPK</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Jml</th>
                            <th>PIC</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody id="pertama">
                         <?php foreach ($data2 as $row): ?>
                              <tr>
                                   <td><?=$row->vendor?></td>
                                   <td><?=$row->vendor?></td>
                                   <td><?=$row->vendor?></td>
                                   <td><?=$row->vendor?></td>
                                   <td><?=$row->vendor?></td>
                                   <td><?=$row->vendor?></td>
                                   <td><?=$row->vendor?></td>
                                   <td><?=$row->vendor?></td>
                                   <td><?=$row->vendor?></td>
                              </tr>
                         <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
       </div>
       <!-- END EXAMPLE TABLE PORTLET-->
   </div>

   <div class="col-md-12">

       <!-- BEGIN EXAMPLE TABLE PORTLET-->
       <div class="portlet box">
            <div id="contain">
                 <table class="table_scroll " id="handsome">

                    <tbody id="kedua">

                    </tbody>
                </table>
            </div>
       </div>
       <!-- END EXAMPLE TABLE PORTLET-->
   </div>

</div>
<?php $this->load->view('__template/footer.php') ?>
<link type="text/css" rel="stylesheet" href="https://docs.handsontable.com/0.15.1/bower_components/handsontable/dist/handsontable.full.min.css">
<script src="https://docs.handsontable.com/0.15.1/bower_components/handsontable/dist/handsontable.full.js"></script>

<script type="text/javascript">
var
    myData = Handsontable.helper.createSpreadsheetData(100, 50),
    container = document.getElementById('example1'),
    positions = document.getElementById('positions'),
    hot;

  hot = new Handsontable(container, {
    data: myData,
    colWidths: [47, 47, 47, 47, 47, 47, 47, 47, 47, 47],
    rowHeaders: true,
    colHeaders: true,
    fixedRowsTop: 2,
    fixedColumnsLeft: 2
  });

  setInterval(function () {
    var str = '';

    str += 'RowOffset: ' + hot.rowOffset();

    positions.innerHTML = str;
  }, 100);
</script>
<script type="text/javascript">


</script>
