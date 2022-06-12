<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller 
{
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
    }
    public function index() {
        $data['title'] = 'Dashboard';
        $data['total_user'] = $this->db->get('user')->num_rows();
        $data['total_suara'] = $this->db->get('suara')->num_rows();
        $data['kandidat1osis'] = $this->db->get_where('suara',  ['nama_kandidat' => 'Calon No.1 OSIS'])->num_rows();
        $data['kandidat2osis'] = $this->db->get_where('suara',  ['nama_kandidat' => 'Calon No.2 OSIS'])->num_rows();
        $data['kandidat3osis'] = $this->db->get_where('suara',  ['nama_kandidat' => 'Calon No.3 OSIS'])->num_rows();
        $data['kandidat1mpk'] = $this->db->get_where('suara',  ['nama_kandidat' => 'Calon No.1 MPK'])->num_rows();
        $data['kandidat2mpk'] = $this->db->get_where('suara',  ['nama_kandidat' => 'Calon No.2 MPK'])->num_rows();
        $data['kandidat3mpk'] = $this->db->get_where('suara',  ['nama_kandidat' => 'Calon No.3 MPK'])->num_rows();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/admin_footer');
    }
}
?>