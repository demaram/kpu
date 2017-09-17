<?php /**
 *
 */
class M_histori extends CI_Model
{
     function get_histori()
     {
          $query = $this->db->query("SELECT * FROM spk where status = '0'");
          return $query;
     }

     function get_spk_sebelumnya()
     {
          $query = $this->db->query("SELECT
                                        a.no_spk,
                                        b.no_spk sebelum,
                                        a.keterangan,
                                        a.perihal,
                                        a.end, a.id_pk, a.id_spk
                                        FROM `spk` a  join spk b where a.id_histori = b.id_spk AND a.status ='0'");
          return $query;
     }

     function get_all_histori($id)
     {
          $query = $this->db->query("SELECT * FROM spk where id_histori ='$id' OR id_spk ='$id'");
          return $query;
     }
}
 ?>
