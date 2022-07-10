<?php
defined ('BASEPATH') OR exit('No direct script access allowed');
class SuaraModel extends CI_Model
{
    public function getSuara() {
        $this->db->select('*, suara.id as id_suara, user.nama as nama_user');
        $this->db->from('suara');
        $this->db->join('user', 'user.id = suara.id_user');
        return $this->db->get();
    }
    // Delete Suara Menggunakan Checkbox but belum fungsi 
    public function hapusbanyak($id, $jmldata)
    {

        for ($i = 0; $i < $jmldata; $i++) {
            $this->db->delete('suara', ['id' => $id[$i]]);
        }
        return true;
    }
}
?>