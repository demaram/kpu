<?php
class Profile extends CI_Controller
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

/*
*
*VIEW Controller
*
*/
     function index()
     {
         $users = $this->ion_auth->users()->result();
         $data = array('title'    => 'KPUsahatama - Profil Admin',
                       'heading1' => 'Profile Admin',
                       'data'     => $users
                   );
         $this->load->view('admin/profile/v_profile',$data);
     }

     function update()
     {
          $this->form_validation->set_rules('email', 'Email', 'required');

          $id = $this->input->post('id_user');
          if ($this->form_validation->run() == FALSE)
          {
               $this->index();
          }
         else
         {

               $data = array(
                                   'username' => $this->input->post('username'),
                                  'first_name' => $this->input->post('first_name'),
                                  'last_name'  => $this->input->post('last_name'),
                                  'phone'  => $this->input->post('phone'),
                                  'occupation'  => $this->input->post('occupation'),
                                  'email'  => $this->input->post('email'),
                              );
               $this->db->where('id',$id);
               $update1 = $this->db->update('users', $data);

               if ($update1 == TRUE)
               {
                    $this->session->set_flashdata('success','Data Berhasil Dirubah');
                    redirect('profile');
               }else
               {
                    $this->session->set_flashdata('error','Data Gagal Dirubah');
                    redirect('profile');
               }


         }
     }


    function photoUpdate()
    {

           $id = $this->input->post('id_user');
           $photo   = $_FILES['photo']['name'];

           echo $photo;
          if (!empty($photo)) {
               $nama_photo = rand(0,99).$photo;
               $config['upload_path'] = './assets/img/';
               $config['allowed_types'] = 'gif|jpg|png|jpeg';
               $config['max_size']     = '2000';
               $config['max_width'] = '1300';
               $config['max_height'] = '768';
               $config['file_name'] = $nama_photo;
               $this->load->library('upload', $config);
               $upload = $this->upload->do_upload('photo');

               if (!$upload) {
                   $error = array('error_upload' =>$this->upload->display_errors());
                   $this->session->set_flashdata('error_upload',$error);
                    redirect('profile');
               }

          }else {
               $nama_photo = $this->input->post('photo_lama');
          }

          $data  = array('photo' => $nama_photo );

          $this->db->where('id',$id);
          $update = $this->db->update('users', $data);

          if ($update) {
               $this->session->set_flashdata('success','Photo Berhasil Dirubah');
               redirect('profile');
          }else {
               $this->session->set_flashdata('error','Photo Gagal Dirubah');
               redirect('profile');
          }
    }
}
 ?>
