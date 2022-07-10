<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Suara extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('SuaraModel');
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
    }

    public function index() 
    {
        $data['title'] = 'Suara';
        $data['rows'] = $this->SuaraModel->getSuara()->result();
        // $data['rows'] = $this->SuaraModel->hapusbanyak();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/suara', $data);
        $this->load->view('templates/admin_footer');
    }

    public function hapus($id)
    {
        $this->db->delete('suara', ['id' => $id]);
        if($this->db->affected_rows() > 0) 
        {
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil dihapus!</h4>
                </div>');
            
            redirect('admin/suara');
        }
    }

    public function print()
    {
        $data['title'] = 'Admin E-Voting | Print Suara';
        $data['rows'] = $this->SuaraModel->getSuara()->result();
        $this->load->view('admin/print_suara', $data);
    }

    public function excel()
    {
        $data['title'] = 'Admin E-Voting | Export Excel';
        $data['rows'] = $this->SuaraModel->getSuara()->result();
        $this->load->view('admin/suara_excel', $data);
    }
// Delete Suara Menggunakan Checkbox but belum fungsi 
    public function deletemultiple()
    {
        if($this->input->is_ajax_request() == true) {
            $id_suara = $this->input->post('id_suara', true);
            $jmldata = count((array)$id_suara);
            $hapusdata['rows'] = $this->SuaraModel->getSuara()->result();
            $hapusdata['rows'] = $this->SuaraModel->hapusbanyak($id_suara, $jmldata);

            if($hapusdata == true) {
                $message = [
                    'sukses' => "$jmldata data suara berhasil dihapus"
                ];
            }
            echo json_encode($message);
        } else {
            exit('Maaf tidak bisa dilanjutkan');
        }
    }
}
?>