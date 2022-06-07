<?php
defined ('BASEPATH') OR exit('No direct script access allowed');
class VisimisiModel extends CI_Model
{
    public function getVisimisi() {
        $this->db->select('*, visimisi.id as id_visimisi');
        $this->db->from('visimisi');
        $this->db->join('kandidat', 'kandidat.id = visimisi.id_kandidat');
        return $this->db->get();
    }
    public function simpan()
    {
        $data = [
            'id_kandidat' => $this->input->post('id_kandidat'),
            'visi' => $this->input->post('visi', true),
            'misi' => $this->input->post('misi', true),
        ];
        $this->db->insert('visimisi', $data);
    }

    public function update()
    {   
        $data = [
            'id_kandidat' => $this->input->post('id_kandidat'),
            'visi' => $this->input->post('visi', true),
            'misi' => $this->input->post('misi', true),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('visimisi', $data);
    }
}
?>