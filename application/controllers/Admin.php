<?php
class Admin extends CI_Controller
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
         $spk =  $this->m_jadwal->get_filter_spk()->result();
         foreach ($spk as $spk) {
              $end =  date('Y-m-d', strtotime('+3 days',strtotime($spk->end)));
              $now = date('Y-m-d');
              if ($now >= $end) {
                   $data_spk = array(
                                      'keterangan'         => 'Belum Diperpanjang',
                                      'status'             => 0,
                                   );
                   $this->db->where('id_spk', $spk->id_spk);
                   $update = $this->db->update('spk', $data_spk);
              }
         }
         $jadwal = $this->m_jadwal->get_all_pk();
         $data = array('title'    => 'KPUsahatama - Admin',
                       'heading1' => 'Data PK',
                       'data'     => $jadwal
                   );
         $this->load->view('admin/dashboard',$data);
     }

     function add()
     {
          $data = array('title'   => 'KPUsahatama - Tambah Data PK',
                       'heading1' => 'Data PK',
                       'heading2' => 'Tambah Data PK',
                       'action'   => 'insert'
                   );
          $this->load->view('admin/jadwal/f_pk',$data);
     }

     function edit($id)
     {
          if ($id == NULL)
          {
               show_404();
               exit;
          }
          $jadwal = $this->m_jadwal->get_single_pk($id);
          $data = array('title'   => 'KPUsahatama - Edit Data PK',
                          'heading1' => 'Data PK',
                          'heading2' => 'Edit Data PK',
                          'action'   => 'update',
                          'data'     => $jadwal
                  );
          $this->load->view('admin/jadwal/f_pk',$data);
     }

     function view($id_pk)
     {

         if ($id_pk == NULL) {
            show_404();
            exit;
         }
         $pk = $this->m_jadwal->get_single_pk($id_pk);
         $spk = $this->m_jadwal->get_spk($id_pk);
         $total = $this->m_jadwal->get_total_personil($id_pk)->row();

         $data = array('title'         => 'KPUsahatama - Detail PK',
                        'heading1'     => 'Data SPK',
                        'heading2'     => 'Detail PK',
                        'heading3'     => 'SPK',
                         'action'      => 'upd_history',
                         'data2'       => $spk,
                         'data'        => $pk,
                         'id_pk'       => $id_pk,
                         'total'       => $total
                 );

         $this->load->view('admin/jadwal/v_single_pk',$data);
     }



     /*
     *
     *Processing Controller
     *
     */

     function exportExcel()
     {
          $this->load->library("PHPExcel");

          //membuat objek
          $objPHPExcel = new PHPExcel();

          //Sheet yang akan diolah
          $objPHPExcel->setActiveSheetIndex(0);
          $objPHPExcel->getActiveSheet()->setCellValue('A1','DAFTAR KONTRAK PAYUNG');

          $objPHPExcel->getActiveSheet()->setCellValue('A2','No');
          $objPHPExcel->getActiveSheet()->setCellValue('B2','Client');
          $objPHPExcel->getActiveSheet()->setCellValue('C2','Nama Pekerjaan / Pengadaan');
          $objPHPExcel->getActiveSheet()->setCellValue('D2','Nomor Surat');
          $objPHPExcel->getActiveSheet()->setCellValue('E2','Penanggung Jawab');
          $objPHPExcel->getActiveSheet()->setCellValue('F2','Lokasi Penempatan');
          $objPHPExcel->getActiveSheet()->setCellValue('G2','Waktu Pelaksanaan');
          $objPHPExcel->getActiveSheet()->setCellValue('H2','Akhir Kontrak');
          $objPHPExcel->getActiveSheet()->setCellValue('I2','Jumlah Tenaga Kerja');
          $objPHPExcel->getActiveSheet()->setCellValue('J2','Status Aktif');
          $objPHPExcel->getActiveSheet()->setCellValue('K2','Keterangan');

          $data = $this->m_jadwal->get_all_pk();
          $i = 3;
          $j = 4;
          $k = 1;
          foreach ($data as $row) {
               $spk = $this->db->query("SELECT * FROM spk where id_pk = '$row->id_pk'")->result();
               $objPHPExcel->getActiveSheet()->setCellValue('A'.$i,$k);
               $objPHPExcel->getActiveSheet()->setCellValue('B'.$i,'No PK Client :'.$row->no_pk_vendor);
               $objPHPExcel->getActiveSheet()->setCellValue('C'.$i, 'No PK KPU : '.$row->no_kpu);
               $objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(30);
               foreach ($spk as $spk) {
                    if ($spk->status == '1') {
                         $status = 'AKTIF';
                    }else {
                         $status = 'NONAKTIF';
                    }
                    $objPHPExcel->getActiveSheet()->setCellValue('B'.$j,$spk->vendor);
                    $objPHPExcel->getActiveSheet()->setCellValue('C'.$j,$spk->perihal);
                    $objPHPExcel->getActiveSheet()->setCellValue('D'.$j,$spk->no_spk);
                    $objPHPExcel->getActiveSheet()->setCellValue('E'.$j,$spk->pic);
                    $objPHPExcel->getActiveSheet()->setCellValue('F'.$j,$spk->penempatan);
                    $objPHPExcel->getActiveSheet()->setCellValue('G'.$j,date('d M Y',strtotime($spk->start)));
                    $objPHPExcel->getActiveSheet()->setCellValue('H'.$j,date('d M Y',strtotime($spk->end)));
                    $objPHPExcel->getActiveSheet()->setCellValue('I'.$j,$spk->jumlah_personil);
                    $objPHPExcel->getActiveSheet()->setCellValue('J'.$j,$status);
                    $objPHPExcel->getActiveSheet()->setCellValue('K'.$j,$spk->keterangan);
                   $j++;
                   $i++;
               }

               $i++;
               $j++;
               $k++;
               $objPHPExcel->getActiveSheet()
                       ->getStyle('A2:K2')
                       ->getFill()
                       ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                       ->getStartColor()
                       ->setRGB('0bb10c');

          }
          //set VIEW in excel
          $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);
          $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(40);

          $objPHPExcel->getActiveSheet()->getStyle("A1:O1")->getFont()->setSize(21);
          $objPHPExcel->getActiveSheet()->mergeCells("A1:I1");
          //Set Title
          $objPHPExcel->getActiveSheet()->setTitle('Daftar Kontrak Payung');

          //Save ke .xlsx, kalau ingin .xls, ubah 'Excel2007' menjadi 'Excel5'
          $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

          //Header

          ob_end_clean();
          header( "Content-type: application/vnd.ms-excel" );
          header('Content-Disposition: attachment; filename="List PK & SPK.xlsx"');
          header("Pragma: no-cache");
          header("Expires: 0");

          //Download
          $objWriter->save("php://output");
     }


     function insert()
     {
          $this->form_validation->set_rules('no_pk_vendor', 'Nomor PK Vendor', 'required');
          if ($this->form_validation->run() == FALSE)
          {
               redirect('admin/add');
          }else
          {

               $data_pk = array(
                                   'id_pk' => $id,
                                   'no_pk_vendor' => $this->input->post('no_pk_vendor'),
                                   'no_kpu'  => $this->input->post('no_kpu'),
                               );
               $insert1 = $this->db->insert('pk', $data_pk);
               if ($insert1 == TRUE)
               {
                    $this->session->set_flashdata('success','Data Berhasil Diinput');
                    redirect('admin');
               }else
               {
                    $this->session->set_flashdata('error','Data Gagal Diinput');
                    redirect('admin');
               }

          }
     }// end function insert()

     function update()
     {
          $this->form_validation->set_rules('no_pk_vendor', 'Nomor PK Vendor', 'required');

          $id = $this->input->post('id_pk');
          if ($this->form_validation->run() == FALSE)
          {
               redirect('admin/edit/'.$id);
          }
         else
         {

               $data_pk = array(
                                  'no_pk_vendor' => $this->input->post('no_pk_vendor'),
                                  'no_kpu'  => $this->input->post('no_kpu'),
                              );
               $this->db->where('id_pk',$id);
               $update1 = $this->db->update('pk', $data_pk);

               if ($update1 == TRUE)
               {

                    $this->session->set_flashdata('success','Data Berhasil Dirubah');
                    redirect('admin');
               }else
               {
                    $this->session->set_flashdata('error','Data Gagal Dirubah');
                    redirect('admin');
               }


         }
    }// end function update()

     function delete($id)
     {
          $this->db->where('id_pk', $id);
          $delete = $this->db->delete('pk');

          if ($delete)
          {
               $this->session->set_flashdata('success','Data Deleted');
               redirect('admin');
          }else{
              $this->session->set_flashdata('error','Cannot Delete Data');
              redirect('admin');
          }
     }




}// END CLASS ADMIN
 ?>
