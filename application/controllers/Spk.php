<?php /**
 *
 */
class Spk extends CI_Controller
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

     function edit($id_pk, $id_spk)
     {
          if ($id_pk == NULL || $id_spk == NULL)
          {
               show_404();
               exit;
          }
          $spk = $this->m_jadwal->get_single_spk($id_spk);
          $data = array('title'   => 'Edit Data SPK',
                          'heading1' => 'Data SPK',
                          'heading2' => 'Edit Data SPK',
                          'heading3' => 'PK',
                          'action'   => 'update',
                          'id_pk'   => $id_pk,
                          'data_pk' => $this->m_jadwal->get_single_pk($id_pk),
                          'data'     => $spk
                  );
          $this->load->view('admin/jadwal/f_spk',$data);
     }

     function perpanjang($id_pk, $id_spk)
     {
          if ($id_pk == NULL || $id_spk == NULL)
          {
               show_404();
               exit;
          }
          $spk = $this->m_jadwal->get_single_spk($id_spk);
          $data = array(  'title'   =>  'Perpanjang SPK',
                          'heading1' => 'Data SPK',
                          'heading2' => 'Perpanjang SPK',
                          'heading3' => 'PK',
                          'action'   => 'extended',
                          'id_pk'   => $id_pk,
                          'data_pk' => $this->m_jadwal->get_single_pk($id_pk),
                          'data_spk'=> $spk
                  );
          $this->load->view('admin/jadwal/f_spk',$data);
     }

     function add($id_pk)
     {
          if ($id_pk == NULL)
          {
               show_404();
               exit;
          }
          $data_pk = $this->m_jadwal->get_single_pk($id_pk);
          $data = array(  'title'    => 'Tambah Data SPK',
                          'heading1' => 'Data SPK',
                          'heading2' => 'Tambah Data SPK',
                          'heading3' => 'PK',
                          'action'   => 'insert',
                          'data_pk'  => $data_pk,
                          'id_pk'    => $id_pk,
                  );
          $this->load->view('admin/jadwal/f_spk',$data);
     }

     function view($id_pk, $id_spk)
     {
          if ($id_pk == NULL || $id_spk == NULL)
          {
               show_404();
               exit;
          }
          $data_pk = $this->m_jadwal->get_single_pk($id_pk);
          $data_spk = $this->m_jadwal->get_single_spk($id_spk);
          $data = array(  'title'    => 'Tambah Data SPK',
                          'heading1' => 'Data SPK',
                          'heading2' => 'Tambah Data SPK',
                          'heading3' => 'PK',
                          'action'   => 'insert',
                          'data_pk'  => $data_pk,
                          'data_spk'  => $data_spk,
                          'id_pk'    => $id_pk,

                  );
          $this->load->view('admin/jadwal/v_single_spk',$data);
     }

     function terminate($id , $id_pk){
          $data_spk = array(
                            'keterangan'         => $this->input->post('keterangan'),
                            'status'             => 0,
                        );
         $this->db->where('id_spk', $id);
         $update = $this->db->update('spk', $data_spk);
         if ($update)
         {
              $this->session->set_flashdata('success','SPK berhasil di non-aktifkan dan tersimpan dalam histori');
              redirect('admin/view/'.$id_pk);
         }
         else
         {
              $this->session->set_flashdata('error','SPK gagal di non-aktifkan');
              redirect('admin/view/'.$id_pk);
         }
     }
     function extended()
     {
          $this->form_validation->set_rules('time', 'Range Waktu', 'required');

          $id_spk = $this->input->post('id_spk');
          $id_pk = $this->input->post('id_pk');
          if ($this->form_validation->run() == FALSE)
          {
               redirect('Spk/perpanjang/'.$id_pk.'/'.$id_spk);
          }else
          {
               $this->db->query("UPDATE spk set status ='0' where id_spk = '$id_spk' ");

               $time = $this->input->post('time');// Waktu
               $arrtime = explode('-',$time);
               $start_date = date('Y-m-d',strtotime($arrtime[0]));
               $end_date = date('Y-m-d',strtotime($arrtime[1]));
               $id_histori  = $this->input->post('id_histori');

               if ($id_histori == '0' || $id_histori == NULL) {
                    $id_histori =  $id_spk;
               }


               if ($end_date <= date('Y-m-d') ) { // cek jika tanggal akhir di input sebelum hari ini
                    $this->session->set_flashdata('error','Tanggal Berakhir Tidak Boleh Sebelum Hari Ini');
                    redirect('Spk/perpanjang/'.$id_pk.'/'.$id_spk);

               }else {

                    $data_spk = array(
                                       'id_pk'              => $id_pk,
                                       'keterangan'         => $this->input->post('keterangan'),
                                       'vendor'             => $this->input->post('vendor'),
                                       'no_spk'             => $this->input->post('no_spk'),
                                       'start'              => date('Y-m-d',strtotime($start_date)),
                                       'end'                => date('Y-m-d',strtotime($end_date)),
                                       'penempatan'         => $this->input->post('penempatan'),
                                       'jumlah_personil'    => $this->input->post('jumlah_personil'),
                                       'pic'                => $this->input->post('pic'),
                                       'perihal'            => $this->input->post('perihal'),
                                       'id_histori'         => $id_histori,
                                       'status'             => 1,
                                   );
                    $insert = $this->db->insert('spk', $data_spk);
                    if ($insert)
                    {
                         $this->session->set_flashdata('success','Data SPK Baru Berhasil di Update');
                         redirect('admin/view/'.$id_pk);
                    }
                    else
                    {
                         $this->session->set_flashdata('error','Data Gagal Diupdate');
                         redirect('admin/view/'.$id_pk);
                    }
               }
          }

     }

     function insert()
     {
          $this->form_validation->set_rules('time', 'Tanggal Awal', 'required');

          $id_pk = $this->input->post('id_pk');
          if ($this->form_validation->run() == FALSE)
          {
               redirect('Spk/add/'.$id_pk);
          }else
          {
               $time = $this->input->post('time');
               $arrtime = explode('-',$time);
               $start_date = date('Y-m-d',strtotime($arrtime[0]));
               $end_date = date('Y-m-d',strtotime($arrtime[1]));

               if ($end_date <= date('Y-m-d') ) {
                    $this->session->set_flashdata('error','Tanggal Berakhir Tidak Boleh Sebelum Hari Ini');
                    redirect('Spk/add/'.$id_pk);
               }else {
                    $data_spk = array(
                                       'id_pk'              => $id_pk,
                                       'vendor'             => $this->input->post('vendor'),
                                       'no_spk'             => $this->input->post('no_spk'),
                                       'start'              => date('Y-m-d',strtotime($start_date)),
                                       'end'                => date('Y-m-d',strtotime($end_date)),
                                       'jumlah_personil'    => $this->input->post('jumlah_personil'),
                                       'penempatan'         => $this->input->post('penempatan'),
                                       'pic'                => $this->input->post('pic'),
                                       'perihal'         => $this->input->post('perihal'),
                                       'keterangan'         => $this->input->post('keterangan'),
                                       'status'             => 1,
                                        );
                    $insert2 = $this->db->insert('spk', $data_spk);
                    if ($insert2)
                    {
                         $this->session->set_flashdata('success','Data SPK Berasil Di Input');
                         redirect('admin/view/'.$id_pk);
                    }
                    else
                    {
                         $this->session->set_flashdata('error','Data SPK Gagal Di Input');
                         redirect('admin/view/'.$id_pk);
                    }

               }

          }
     }// end function insert()


     function update()
     {
          $this->form_validation->set_rules('time', 'Range Waktu', 'required');

          $id_spk = $this->input->post('id_spk');
          $id_pk = $this->input->post('id_pk');
          if ($this->form_validation->run() == FALSE)
          {
               redirect('Spk/edit/'.$id_pk.'/'.$id_spk);
          }else
          {
               $time = $this->input->post('time');
               $arrtime = explode('-',$time);
               $start_date = date('Y-m-d',strtotime($arrtime[0]));
               $end_date = date('Y-m-d',strtotime($arrtime[1]));

               if ($end_date <= date('Y-m-d') ) {
                    $this->session->set_flashdata('error','Tanggal Berakhir Tidak Boleh Sebelum Hari Ini');
                    redirect('Spk/edit/'.$id_pk.'/'.$id_spk);

               }else {

                    $data_spk = array(
                                       'id_pk'              => $id_pk,
                                       'vendor'             => $this->input->post('vendor'),
                                       'no_spk'             => $this->input->post('no_spk'),
                                       'start'              => date('Y-m-d',strtotime($start_date)),
                                       'end'                => date('Y-m-d',strtotime($end_date)),
                                       'jumlah_personil'    => $this->input->post('jumlah_personil'),
                                       'penempatan'         => $this->input->post('penempatan'),
                                       'pic'                => $this->input->post('pic'),
                                       'perihal'            => $this->input->post('perihal'),
                                       'keterangan'         => $this->input->post('keterangan'),
                                       'status'             => 1,
                                   );
                    $this->db->where('id_spk', $id_spk);
                    $update = $this->db->update('spk', $data_spk);
                    if ($update)
                    {
                         $this->session->set_flashdata('success','Data Berhasil Diupdate');
                         redirect('admin/view/'.$id_pk);
                    }
                    else
                    {
                         $this->session->set_flashdata('error','Data Gagal Diupdate');
                         redirect('admin/view/'.$id_pk);
                    }
               }
          }
     }



     function delete($id_spk , $id_pk)
     {
          $this->db->where('id_spk', $id_spk);
          $delete = $this->db->delete('spk');

          if ($delete)
          {
               $this->session->set_flashdata('success','Data Berahasil Dihapus');
               redirect('admin/view/'.$id_pk);
          }else{
              $this->session->set_flashdata('error','Data Gagal Dihapus');
              redirect('admin/view/'.$id_pk);
          }
     }
}
 ?>
