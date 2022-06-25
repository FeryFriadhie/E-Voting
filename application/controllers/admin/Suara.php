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
        $data['title'] = 'Print Suara';
        $data['rows'] = $this->SuaraModel->getSuara()->result();
        $this->load->view('admin/print_suara', $data);
    }

    // public function excel()
    // {
    //     $data['title'] = 'Export Excel';
    //     $data['rows'] = $this->SuaraModel->getSuara()->result();
    //     $this->load->view('admin/suara', $data);
    //     require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
    //     require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

    //     $object =  new PHPExcel();
    //     $object->getProperties()->setCreator("Tim E-Voting");
    //     $object->getProperties()->setLastModifiedBy("Tim E-Voting");
    //     $object->getProperties()->setTitle("Hasil Rekapitulasi Suara");
    //     $object->setActiveSheetIndex(0);
    //     $object->getActiveSheet()->setCellValue('A1', 'NO');
    //     $object->getActiveSheet()->setCellValue('B1', 'NAMA USER');
    //     $object->getActiveSheet()->setCellValue('C1', 'NAMA KANDIDAT');
    //     $object->getActiveSheet()->setCellValue('D1', 'CREATED');

    //     $baris = 2;
    //     $no = 1;

    //     foreach ($data['rows'] as $row) {
    //         $object->getActiveSheet()->setCellValue('A'.$baris, $no++);
    //         $object->getActiveSheet()->setCellValue('B'.$baris, $row->nama_user);
    //         $object->getActiveSheet()->setCellValue('C'.$baris, $row->nama_kandidat);
    //         $object->getActiveSheet()->setCellValue('D'.$baris, $row->created);

    //         $baris++;
    //     }

    //     $filename="Hasil_Rekapitulasi_Suara" .'.xlsx';
    //     $object->getActiveSheet()->setTitle("Hasil Rekapitulasi Suara");
    //     header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //     header('Content-Disposition: attachment;filename="'.$filename.'"');
    //     header('Cache-Control: max-age=0');

    //     $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
    //     $writer->save('php://output');
    //     exit;

    // }
}
?>