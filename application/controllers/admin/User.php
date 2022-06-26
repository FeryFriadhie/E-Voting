<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
    }

    public function index() 
    {
        $data['title'] = 'User';
        $data['rows'] = $this->UserModel->getUser()->result();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/user', $data);
        $this->load->view('templates/admin_footer');
    }

    public function tambah() 
    {
        $data['title'] = 'Tambah User';
        $data['kelas'] = $this->db->get('kelas')->result();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/user_tambah', $data);
        $this->load->view('templates/admin_footer');
    }

    public function simpan()
    {
        $this->UserModel->simpan();
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', 
                '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil disimpan!</h4>
                </div>');
            redirect('admin/user');
        }
    }

    public function edit($id) 
    {
        $data['title'] = 'Edit User';
        $data['kelas'] = $this->db->get('kelas')->result();
        $data['row'] = $this->db->get_where('user', ['id' => $id])->row();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_topbar');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/user_edit', $data);
        $this->load->view('templates/admin_footer');
    }

    public function update()
    {
        $this->UserModel->update();
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', 
                '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil diupdate!</h4>
                </div>');
            redirect('admin/user');
        }
    }

    public function hapus($id)
    {
        $this->db->delete('user', ['id' => $id]);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', 
                '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil dihapus!</h4>
                </div>');
            redirect('admin/user');
        }
    }

    public function uploaddata()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'doc' . time();
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('importexcel')) {   
            $file = $this->upload->data();
            $reader = ReaderEntityFactory::createXLSXReader();

            $reader->open('uploads/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numRow = 1;
                foreach($sheet->getRowIterator() as $row ) {
                    if($numRow > 1) {
                        $datauser = array(
                            'id_kelas' => $row->getCellAtIndex(1),
                            'nama' => $row->getCellAtIndex(2),
                            'email' => $row->getCellAtIndex(3),
                            'password' => $row->getCellAtIndex(4),
                            'level' => $row->getCellAtIndex(5),
                            'status' => $row->getCellAtIndex(6),
                        );
                        $this->UserModel->import_data($datauser);
                    }   
                    $numRow++;
                }
                $reader->close();
                unlink('uploads/' . $file['file_name']);
                $this->session->set_flashdata('message', 
                '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Data Berhasil diimport!</h4>
                </div>');
                redirect('admin/user');
            }
        } else {
            echo "Error:".$this->upload->display_errors();
        }
    }
}
?>