<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterData extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('email')) {
            redirect('auth');
        }

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('Md_Region_Model');
    }
    
    // -----------------------------------------------------------------------------------------  

    public function Region()
    {
        $data['title'] = 'Data Pemeriksaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['dataPemeriksaan'] = $this->Md_Region_Model->getDataAlatBantuResult();

        $this->form_validation->set_rules('id_kelompok', 'id_kelompok', 'required');
        $this->form_validation->set_rules('nama_teknisi', 'nama_teknisi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/region', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_kelompok' => htmlentities($this->input->post('id_kelompok')),
                'nama_teknisi' => htmlentities($this->input->post('nama_teknisi'))
            ];

            $this->db->insert('md_kelompok', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil Ditambahkan</div>');
            redirect('masterdata/region');
        }
    }
    // -----------------------------------------------------------------------------------------
    public function hapus_kelompok($id)
    {
        $this->Md_Region_Model->hapus_md_data($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       Data Berhasil Dihapus</div>');
        redirect('masterdata/region');
    }
    // -----------------------------------------------------------------------------------------
    public function Ubah_Kelompok($id)
    {
        $data['title'] = 'Data pemeriksaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pemeriksaan'] = $this->Md_Region_Model->getDataAlatBantuById($id);

        
        $this->form_validation->set_rules('id_kelompok', 'id_kelompok', 'required');
        $this->form_validation->set_rules('nama_teknisi', 'nama_teknisi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/ubah/region', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_kelompok' => htmlentities($this->input->post('id_kelompok')),
                'nama_teknisi' => htmlentities($this->input->post('nama_teknisi'))
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('md_kelompok', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah</div>');
            redirect('masterdata/region');
        }
    }
}
