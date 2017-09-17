<?php /**
 *
 */
class Jadwal extends CI_Controller
{

     function __construct()
     {
          parent::__construct();
          $this->load->model('m_jadwal');
		$this->load->library(array('ion_auth','form_validation'));
          if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}
          elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
     }

     function index(){
         $jadwal = $this->m_jadwal->get_all_spk();
         $data = array('title'    => 'Admin Dashboard',
                       'heading1' => 'Data PK',
                       'data'     => $jadwal
                   );
         $this->load->view('admin/dashboard',$data);
     }

     function add(){
          $data = array('title'   => 'Add Data PK',
                       'heading1' => 'Data PK',
                       'heading2' => 'Tambah Data PK',
                       'action'   => 'insert'
                   );
         $this->load->view('admin/jadwal/f_jadwal',$data);
     }

     function edit($id)
     {
          if ($id == NULL) {
              show_404();
              exit;
          }
          $jadwal = $this->m_jadwal->get_single_jadwal($id);
          $data = array('title'   => 'Edit Data PK',
                     'heading1' => 'Data PK',
                     'heading2' => 'Edit Data PK',
                     'action'   => 'update',
                     'data'     => $jadwal
                  );
       $this->load->view('admin/jadwal/f_jadwal',$data);
     }

     function insert()
     {
          $this->form_validation->set_rules('vendor', 'Nama Vendor', 'required');
          $this->form_validation->set_rules('no_permata', 'Nomor Permata', 'required');
          $this->form_validation->set_rules('no_kpu', 'Nomor KPU', 'required');
          $this->form_validation->set_rules('no_spk', 'Nomor SPK', 'required');
          $this->form_validation->set_rules('penempatan', 'Lokasi', 'required');
          $this->form_validation->set_rules('start', 'Tanggal Awal', 'required');
          $this->form_validation->set_rules('end', 'Tanggal Akhir', 'required');
          $this->form_validation->set_rules('pic', 'Person In Charge', 'required');
          $this->form_validation->set_rules('jumlah_personil', 'Jumlah Personil', 'required|numeric');

          if ($this->form_validation->run() == FALSE)
          {
               $this->add();
          }else
          {
               $last_id = $this->m_jadwal->get_last_id();
               $id = $last_id + 1;

               $data_pk = array(
                                   'id_pk' => $id,
                                   'no_permata' => $this->input->post('no_permata'),
                                   'no_kpu'  => $this->input->post('no_kpu'),
                               );
               $insert1 = $this->db->insert('pk', $data_pk);
               if ($insert1 == TRUE)
               {
                    $data_spk = array(
                                       'id_pk'              => $id,
                                       'vendor'             => $this->input->post('vendor'),
                                       'no_spk'             => $this->input->post('no_spk'),
                                       'penempatan'         => $this->input->post('penempatan'),
                                       'start'              => date('Y-m-d',strtotime($this->input->post('start'))),
                                       'end'              => date('Y-m-d',strtotime($this->input->post('end'))),
                                       'jumlah_personil'    => $this->input->post('jumlah_personil'),
                                       'pic'                => $this->input->post('pic')
                                   );
                    $insert2 = $this->db->insert('spk', $data_spk);
                    if ($insert2)
                    {
                         $this->session->set_flashdata('success','Data Inserted');
                         redirect('jadwal');
                    }
                    else
                    {
                         $this->session->set_flashdata('error','Cannot Insert Data, Something Wrong With SPK');
                         redirect('jadwal');
                    }
               }else
               {
                    $this->session->set_flashdata('error','Cannot Insert Data, Something Wrong With PK');
                    redirect('jadwal');
               }



          }
     }

     function update()
     {
          $this->form_validation->set_rules('vendor', 'Nama Vendor', 'required');
          $this->form_validation->set_rules('no_kpu', 'Nomor KPU', 'required');
          $this->form_validation->set_rules('no_spk', 'Nomor SPK', 'required');
          $this->form_validation->set_rules('penempatan', 'Lokasi', 'required');
          $this->form_validation->set_rules('start', 'Tanggal Awal', 'required');
          $this->form_validation->set_rules('end', 'Tanggal Akhir', 'required');
          $this->form_validation->set_rules('pic', 'Person In Charge', 'required');
          $this->form_validation->set_rules('jumlah_personil', 'Jumlah Personil', 'required|numeric');

          $id_pk = $this->input->post('id_pk');
          $id_spk = $this->input->post('id_spk');

         if ($this->form_validation->run() == FALSE) {
              $this->edit($id_pk);
         }else {

              $data_pk = array(
                                  'id_pk' => $id_pk,
                                  'no_permata' => $this->input->post('no_permata'),
                                  'no_kpu'  => $this->input->post('no_kpu'),
                              );
              $this->db->where('id_pk',$id_pk);
              $update1 = $this->db->update('pk', $data_pk);

              if ($update1 == TRUE)
              {
                   $data_spk = array(
                                 'id_spk'             => $this->input->post('id_spk'),
                                 'vendor'             => $this->input->post('vendor'),
                                 'no_spk'             => $this->input->post('no_spk'),
                                 'penempatan'             => $this->input->post('penempatan'),
                                 'start'              => date('Y-m-d',strtotime($this->input->post('start'))),
                                 'end'              => date('Y-m-d',strtotime($this->input->post('end'))),
                                 'jumlah_personil'    => $this->input->post('jumlah_personil'),
                                 'pic'                => $this->input->post('pic'),
                                 );
                  $this->db->where('id_spk', $id_spk);
                  $update2 = $this->db->update('spk', $data_spk);

                  if ($update1 && $update2 == TRUE) {
                       $this->session->set_flashdata('success','Data Updated');
                       redirect('admin');
                  }
                  else
                  {
                       $this->session->set_flashdata('error','Cannot Insert Data, Something Wrong With SPK');
                       redirect('admin');
                  }
              }
              else
              {
                   $this->session->set_flashdata('error','Cannot Update Data');
                   redirect('admin');
              }

         }
     }

     function delete($id)
     {
          $this->db->where('id', $id);
          $delete = $this->db->delete('jadwal');

          if ($delete) {
              $this->session->set_flashdata('success','Data Deleted');
              redirect('jadwal');
         }else {
              $this->session->set_flashdata('error','Cannot Delete Data');
              redirect('jadwal');
         }

     }

}
 ?>
