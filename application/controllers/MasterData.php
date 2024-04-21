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
        $this->load->model('Md_Alat_Ukur_Model');
        $this->load->model('Md_Alat_Bantu_Model');
    }
    
    // -----------------------------------------------------------------------------------------

    public function Alat_Ukur()
    {
        $data['title'] = 'Data Pemeriksaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['dataPemeriksaan'] = $this->Md_Alat_Ukur_Model->getDataAlatUkurResult();

        $this->form_validation->set_rules('nama_alat', 'Nama_alat', 'required');
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('kode', 'Kode');
        $this->form_validation->set_rules('spesifikasi', 'Spesifikasi');
        $this->form_validation->set_rules('jumlah', 'Jumlah');
        $this->form_validation->set_rules('satuan', 'Satuan');
        $this->form_validation->set_rules('pemakai', 'Pemakai');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/alat-ukur', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_alat' => htmlentities($this->input->post('nama_alat')),
                'merk' => htmlentities($this->input->post('merk')),
                'kode' => htmlentities($this->input->post('kode')),
                'spesifikasi' => htmlentities($this->input->post('spesifikasi')),
                'jumlah' => htmlentities($this->input->post('jumlah')),
                'status' => htmlentities($this->input->post('status')),
                'pemakai' => htmlentities($this->input->post('pemakai'))
            ];

            $this->db->insert('md_alat_ukur', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil Ditambahkan</div>');
            redirect('masterdata/alat_ukur');
        }
    }
    // -----------------------------------------------------------------------------------------
    public function hapus_alat_ukur($id)
    {
        $this->Md_Alat_Ukur_Model->hapus_md_data($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       Data Berhasil Dihapus</div>');
        redirect('masterdata/alat_ukur');
    }
    // -----------------------------------------------------------------------------------------
    public function getUbahAlatUkur()
    {
        echo json_encode($this->Md_Alat_Ukur_Model->getDataAlatUkurById($_POST['id']));
    }
    // -----------------------------------------------------------------------------------------
    public function Ubah_Alat_Ukur($id)
    {
        $data['title'] = 'Data pemeriksaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pemeriksaan'] = $this->Md_Alat_Ukur_Model->getDataAlatUkurById($id);

        $this->form_validation->set_rules('nama_alat', 'Nama_alat', 'required');
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('kode', 'Kode');
        $this->form_validation->set_rules('spesifikasi', 'Spesifikasi');
        $this->form_validation->set_rules('jumlah', 'Jumlah');
        $this->form_validation->set_rules('status', 'status');
        $this->form_validation->set_rules('pemakai', 'Pemakai');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/ubah/alat-ukur', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_alat' => htmlentities($this->input->post('nama_alat')),
                'merk' => htmlentities($this->input->post('merk')),
                'kode' => htmlentities($this->input->post('kode')),
                'spesifikasi' => htmlentities($this->input->post('spesifikasi')),
                'jumlah' => htmlentities($this->input->post('jumlah')),
                'status' => htmlentities($this->input->post('status')),
                'pemakai' => htmlentities($this->input->post('pemakai'))
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('md_alat_ukur', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah</div>');
            redirect('masterdata/alat_ukur');
        }
    }

    // -----------------------------------------------------------------------------------------  

    public function Alat_Bantu()
    {
        $data['title'] = 'Data Pemeriksaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['dataPemeriksaan'] = $this->Md_Alat_Bantu_Model->getDataAlatBantuResult();

        $this->form_validation->set_rules('nama_alat', 'Nama_alat', 'required');
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('kode', 'Kode');
        $this->form_validation->set_rules('spesifikasi', 'Spesifikasi');
        $this->form_validation->set_rules('jumlah', 'Jumlah');
        $this->form_validation->set_rules('satuan', 'Satuan');
        $this->form_validation->set_rules('pemakai', 'Pemakai');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/alat-bantu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_alat' => htmlentities($this->input->post('nama_alat')),
                'merk' => htmlentities($this->input->post('merk')),
                'kode' => htmlentities($this->input->post('kode')),
                'spesifikasi' => htmlentities($this->input->post('spesifikasi')),
                'jumlah' => htmlentities($this->input->post('jumlah')),
                'status' => htmlentities($this->input->post('status')),
                'pemakai' => htmlentities($this->input->post('pemakai'))
            ];

            $this->db->insert('md_alat_bantu', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil Ditambahkan</div>');
            redirect('masterdata/alat_bantu');
        }
    }
    // -----------------------------------------------------------------------------------------
    public function hapus_alat_bantu($id)
    {
        $this->Md_Alat_Bantu_Model->hapus_md_data($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       Data Berhasil Dihapus</div>');
        redirect('masterdata/alat_bantu');
    }
    // -----------------------------------------------------------------------------------------
    public function getUbahAlatBantu()
    {
        echo json_encode($this->Md_Alat_Bantu_Model->getDataAlatBantuById($_POST['id']));
    }
    // -----------------------------------------------------------------------------------------
    public function Ubah_Alat_Bantu($id)
    {
        $data['title'] = 'Data pemeriksaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pemeriksaan'] = $this->Md_Alat_Bantu_Model->getDataAlatBantuById($id);

        $this->form_validation->set_rules('nama_alat', 'Nama_alat', 'required');
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('kode', 'Kode');
        $this->form_validation->set_rules('spesifikasi', 'Spesifikasi');
        $this->form_validation->set_rules('jumlah', 'Jumlah');
        $this->form_validation->set_rules('status', 'status');
        $this->form_validation->set_rules('pemakai', 'Pemakai');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('masterdata/ubah/alat-bantu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_alat' => htmlentities($this->input->post('nama_alat')),
                'merk' => htmlentities($this->input->post('merk')),
                'kode' => htmlentities($this->input->post('kode')),
                'spesifikasi' => htmlentities($this->input->post('spesifikasi')),
                'jumlah' => htmlentities($this->input->post('jumlah')),
                'status' => htmlentities($this->input->post('status')),
                'pemakai' => htmlentities($this->input->post('pemakai'))
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('md_alat_bantu', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil Diubah</div>');
            redirect('masterdata/alat_bantu');
        }
    }
}
