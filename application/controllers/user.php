<?php /**
 *
 */
class User extends CI_Controller
{

     function __construct()
     {
          parent::__construct();
          $this->load->model('m_jadwal');
     }

     function index()
     {
          $jadwal = $this->m_jadwal->get_filter_spk();
          $jadwal2 = $this->m_jadwal->get_filter_spk2();
          $count1 = $this->m_jadwal->get_filter_spk()->num_rows();
          $data = array('data' => $jadwal,
                        'heading' => 'Data Vendor',
                        'title' => 'Data Jadwal',
                        'data1'=>$jadwal,
                        'data2' =>$jadwal2,
                        'hitung'=> $count1,
          );

          $this->load->view('table',$data);
     }




}
 ?>
