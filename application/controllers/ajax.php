<?php /**
 *
 */
class Ajax extends CI_Controller
{
     function __construct()
    {
         parent::__construct();
         error_reporting(E_ALL & ~E_NOTICE);
         $this->load->model('m_jadwal');
    }

     public function cek_permata()
     {
          $no_pk_vendor = $this->input->post('no_pk_vendor');

          $query = $this->db->query("SELECT no_pk_vendor from pk where no_pk_vendor = '$no_pk_vendor'");
          if ($query->row() == 1) {
               echo "Nomor PK Client Sudah Terpakai";
          }
     }
     public function cek_kpu(){
          $no_kpu = $this->input->post('no_kpu');

          $query = $this->db->query("SELECT no_kpu from pk where no_kpu = '$no_kpu'");
          if ($query->row() == 1) {
               echo "Nomor PK KPU sudah terpakai";
          }
     }

     function style(){

          $count1 = $this->m_jadwal->get_filter_spk()->num_rows();

          switch ($count1) {
               case '0':
                    $height2 = 0;
                    $tinggi = 700;
                    break;
               case '1':
                    $height2 = 80;
                    $tinggi = 600;
                    break;
               case '2':
                    $height2 =130;
                    $tinggi = 500;
                    break;
               case '3':
                    $height2 = 180;
                    $tinggi = 400;
                    break;
               case '4':
                    $height2 = 230;
                    $tinggi = 300;
                    break;
               case '5':
                    $height2 = 280;
                    $tinggi = 200;
                    break;
               case '6':
                    $height2 = 330;
                    $tinggi = 100;
                    break;
               case '7':
                    $height2 = 380;
                    break;
               case '8':
                    $height2 = 430;
                    break;
               case '9':
                    $height2 = 480;
                    break;
          }
          echo "
          <input id='tinggi' type='hidden' value='".$tinggi."'>
          <style media='screen'>
          body { font-family: 'helvetica';
          background: rgb(255, 255, 255);
          }
          .thalert{
               color:rgb(255, 255, 255) !important;
          }
          #contain {
          height: ".$tinggi."px;
          overflow-y: scroll;
           overflow-x: hidden;
          }
          #contain2 {
          overflow-y: hidden;
          overflow-x: hidden;
          }
          .table_scroll {
          width: 100%;
          border-collapse: collapse;
          }
          .table_scroll thead th {
          padding: 7px;
          }
          .table_scroll tbody td {
          padding: 10px;
          color: #000000;
          font-size: 12px;
          height:32px;
          background-color:rgb(255, 255, 255);
          }
          #kedua tr:nth-child(even){background-color:rgb(212, 225, 255) !important;}
          #pertama tr:nth-child(even){background-color:rgb(255, 214, 214);}
          #pertama tr {
               background-color:#c85656;
          }
          </style>";
     }

     function fetch1()
     {
          $count1 = $this->m_jadwal->get_filter_spk()->num_rows();

          if ($count1 >= 1) {

               $jadwal = $this->m_jadwal->get_filter_spk()->result();
               $no = 1;
               echo "<thead>
                   <tr>
                       <th class='thalert'>Client</th>
                       <th class='thalert'>Perihal</th>
                       <th class='thalert'>No SPK</th>
                       <th class='thalert'>Start</th>
                       <th class='thalert'>End</th>
                       <th class='thalert'>Lokasi</th>
                       <th class='thalert'>Personil</th>
                       <th class='thalert'>PIC</th>
                       <th class='thalert'>Keterangan</th>
                   </tr>
               </thead>";
                     foreach ($jadwal as $row){
                          $spk = $this->db->query("SELECT * FROM spk where id_pk ='$row->id_pk' and now() >= DATE_SUB(spk.end, INTERVAL 30 DAY) AND spk.status ='1' ")->result();
                    echo  '
                    <tr><td colspan="9"><b>No PK Client</b> : '.$row->no_pk_vendor.' <span style="margin-left:30px;margin-right:30px"></span> <b>No PK KPU</b> :'.$row->no_kpu.'</td>
                    </tr>';
                    foreach ($spk as $spk ) {
                        echo '
                    <tr>
                    <td ><b>'.$spk->vendor.'</b></td>

                    <td> '.$spk->perihal.'</td>

                    <td>'.$spk->no_spk.'</td>
                    <td style="color:rgb(28, 137, 144)"><b>'.date("d M Y",strtotime($spk->start)).'</b></td>
                    <td style="color:rgb(28, 137, 144)"><b> '.date("d M Y",strtotime($spk->end)).'</b></td>
                    <td> '.$spk->penempatan.'</td>
                    <td> '.$spk->jumlah_personil.'</td>
                    <td> '.$spk->pic.'</td>
                    <td> '.$spk->keterangan.'</td>
                    </tr>';
                    $no++;
               }
                     }
               $count = $this->m_jadwal->get_filter_spk()->num_rows();
               if ($count >= 1) { ?>
                    <script type="text/javascript">
                    var audio = new Audio('<?=base_url()?>assets/sound/beep.wav');
                    audio.play();
                    </script>

               <?php
               }
          }
     }

     function fetch2()
     {
          $jadwal = $this->m_jadwal->get_filter_spk2()->result();

                foreach ($jadwal as $row){
                     $spk = $this->db->query("SELECT * FROM spk where id_pk ='$row->id_pk' and now() <= DATE_SUB(spk.end, INTERVAL 30 DAY) AND spk.status ='1'")->result();
               echo  '
               <tr><td colspan="9"><b>No PK Client</b> : '.$row->no_pk_vendor.' <span style="margin-left:30px;margin-right:30px"></span> <b>No PK KPU</b> :'.$row->no_kpu.'</td>
               </tr>';
                foreach ($spk as $spk ) {
                     echo '
               <tr>
                    <td style="text-align:left;"><b>'.$spk->vendor.'</b></td>

                    <td > '.$spk->perihal.'</td>
                    <td >'.$spk->no_spk.'</td>
                   <td  style="color:rgb(28, 137, 144)"><b>'.date("d M Y",strtotime($spk->start)).'</b></td>
                    <td style="color:rgb(28, 137, 144)"><b> '.date("d M Y",strtotime($spk->end)).'</b></td>
                    <td >'.$spk->penempatan.'</td>
                   <td >'.$spk->jumlah_personil.'</td>
                    <td > '.$spk->pic.'</td>
                    <td > '.$spk->keterangan.'</td>
               </tr>';


                }}

     }
}
 ?>
