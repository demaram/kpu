<?php /**
 *
 */
class Histori extends CI_Controller
{

     function __construct()
     {
          parent::__construct();
          $this->load->model('m_histori');
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
     function index()
     {
          $histori = $this->m_histori->get_histori()->result() ;
          $data = array('title'    => 'KPUsahatama - Histori SPK',
                       'heading1' => 'Histori SPK',
                       'data'     => $histori,
                   );


         $this->load->view('admin/histori/v_histori',$data);

     }

     function delete($id_spk)
     {
          $this->db->where('id_spk', $id_spk);
          $delete = $this->db->delete('spk');

          if ($delete)
          {
               $this->session->set_flashdata('success','Data Berahasil Dihapus');
               redirect('histori');
          }else{
              $this->session->set_flashdata('error','Data Gagal Dihapus');
              redirect('histori');
          }

     }

     function view($id_histori,$id_spk,$id_pk)
     {
          if ($id_histori == NULL || $id_spk == NULL || $id_pk == NULL) {
               show_404();
               exit();
          }
          $data_pk = $this->m_jadwal->get_single_pk($id_pk);
          $merge1 = array('title'         => 'KPUsahatama - Detail PK',
                         'heading1'     => 'Lihat Histori',
                         'heading2'     => 'PK',
                         'heading3'     => 'SPK',
                         'data_pk'      => $data_pk,
                  );
          switch ($id_histori) {
               case '0':
                    $histori = $this->m_histori->get_all_histori($id_spk)->result();
                    $merge2 = array('data' => $histori);
                    $data = array_merge($merge1,$merge2);
                    $this->load->view('admin/histori/v_single_histori',$data);
                    break;
               default:
                    $histori = $this->m_histori->get_all_histori($id_histori)->result();
                    $merge2 = array('data' => $histori);
                    $data = array_merge($merge1,$merge2);
                    $this->load->view('admin/histori/v_single_histori',$data);
                    break;
          }
     }



}
 ?>
