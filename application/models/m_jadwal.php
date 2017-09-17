
<?php /**
 *
 */
class M_jadwal extends CI_Model
{

     public function get_all_pk()
     {
          $query = $this->db->query("SELECT * FROM  pk WHERE 1=1");
          return $query->result();
     }
     public function get_join_pk()
     {
          $query = $this->db->query("SELECT * FROM spk JOIN pk on pk.id_pk = spk.id_pk WHERE 1=1");
          return $query;
     }

    public function get_filter_spk()
    {
         $query = $this->db->query("SELECT * FROM spk JOIN pk on pk.id_pk = spk.id_pk where now() >= DATE_SUB(spk.end, INTERVAL 30 DAY) AND spk.status ='1' group by pk.id_pk order by pk.id_pk ASC, spk.id_spk ASC ");
         $result = $query->result();
         return $query;
    }

    public function get_filter_spk2()
    {
         $query = $this->db->query("SELECT pk.id_pk, pk.no_pk_vendor, pk.no_kpu FROM spk JOIN pk on pk.id_pk = spk.id_pk where now() <= DATE_SUB(spk.end, INTERVAL 30 DAY) AND spk.status ='1' group by pk.id_pk order by spk.id_spk");
         return $query;
    }

    public function get_spk($id){
         $query = $this->db->query("SELECT * FROM spk where id_pk = '$id' and status ='1'");
         return $query->result();
    }

     public function get_single_pk($id)
     {
          $query = $this->db->query("SELECT * FROM pk where id_pk = '$id'");
          return $query->result();
     }

     public function get_single_spk($id){
          $query = $this->db->query("SELECT * FROM spk where id_spk = '$id'");
          return $query->result();
     }

     public function get_last_id()
     {
          $query = $this->db->select("MAX(id_pk) as id")->get('pk')->row();
          return $query->id;
     }

     public function get_total_personil($id_pk)
     {
          $query = $this->db->query("SELECT SUM(jumlah_personil) as jumlah FROM spk where id_pk = '$id_pk' and status ='1'");
          return $query;
     }
}
 ?>
