<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Surface extends CI_Controller
{

    public function __construct()
    {
        
        parent::__construct();

        if (!$this->session->userdata('email')) {
            redirect('auth');
        }

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('Sf_Tickets_Model');
        $this->load->model('Sf_Progress_Model');

        $this->load->model('Md_Alat_Ukur_Model');
        $this->load->model('Md_Alat_Bantu_Model');

    }


    // ------------------------------------------------------------------------------------------------------


    public function index()
    {

        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surface/index', $data);
        $this->load->view('templates/footer');
    }


    // -----------------------------------------------------------------------------------------------------


    public function Open_Ticket()
    {
        $data['title'] = 'Open Ticket';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('rm', 'RM', 'required');
        $this->form_validation->set_rules('tgl_registrasi', 'Tgl_Registrasi');
        $this->form_validation->set_rules('sts', 'Sts');
        $this->form_validation->set_rules('selesai', 'Selesai');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surface/open-ticket', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'rm' => htmlentities($this->input->post('rm')),
                'tgl_registrasi' => htmlentities($this->input->post('tgl_registrasi')),
                'sts' => htmlentities($this->input->post('sts')),
                'selesai' => htmlentities($this->input->post('selesai'))

            ];
            $this->db->insert('sf_tickets', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data Berhasil Ditambahkan</div>');
            redirect('surface/tickets');
        }
    }


   

    // ------------------------------------------------------------------------------------------

    public function Selesai($id)
    {

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['getDataBarangById'] = $this->Sf_Tickets_Model->getDataBarangById($id);

        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('selesai', 'Selesai');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surface/preview/preview_data', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => htmlentities($this->input->post('id')),
                'selesai' => htmlentities($this->input->post('selesai'))

            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('sf_tickets', $data);


            $in = $id;
            redirect(base_url() . "surface/preview_data/" . $in);
        }
    }

    public function hapus_data_tickets($id)
    {
        $this->Sf_Tickets_Model->hapus_data_ticket($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       Data Berhasil Dihapus</div>');
        redirect('surface/tickets');
    }

    //-----------------------------------------------------------------------------------------------------

    public function Tickets()
    {
        $data['title'] = 'Tickets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['hasil'] = $this->Sf_Tickets_Model->getDataBarangResult();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surface/tickets', $data);
        $this->load->view('templates/footer');
    }

    //-----------------------------------------------------------------------------------------------------

    public function preview_data($id)
    {
        $data['title'] = 'Progress';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data['getDataBarangById'] = $this->Sf_Tickets_Model->getDataBarangById($id);
        $data['getDataAlatUkurResult'] = $this->Md_Alat_Ukur_Model->getDataAlatUkurResult();
        $data['getDataAlatBantuResult'] = $this->Md_Alat_Bantu_Model->getDataAlatBantuResult();
        $data['getDataProgressResultWithID'] = $this->Sf_Progress_Model->getDataProgressResultWithID($id);
        $data['getDataPemeriksaanRowWitdId'] = $this->Sf_Progress_Model->getDataPemeriksaanRowWitdId($id);


        $this->form_validation->set_rules('id_registrasi', 'Registrasi', 'required');
        $this->form_validation->set_rules('nama_peminjam', 'Nama_Peminjam');
        $this->form_validation->set_rules('alat_ukur', 'Alat_Ukur');
        $this->form_validation->set_rules('alat_bantu', 'Alat_Bantu');
        $this->form_validation->set_rules('jumlah', 'Jumlah');
        $this->form_validation->set_rules('tanggal_peminjaman', 'Tanggal_Peminjaman');
        $this->form_validation->set_rules('jam_peminjaman', 'Jam_Peminjaman');
        $this->form_validation->set_rules('tanggal_pengembalian', 'Tanggal_Pengembalian');
        $this->form_validation->set_rules('jam_pengembalian', 'Jam_Pengembalian');
        $this->form_validation->set_rules('status', 'Status');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('surface/preview/preview_data', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_registrasi' => htmlentities($this->input->post('id_registrasi')),
                'nama_peminjam' => htmlentities($this->input->post('nama_peminjam')),
                'alat_ukur' => htmlentities($this->input->post('alat_ukur')),
                'alat_bantu' => htmlentities($this->input->post('alat_bantu')),
                'jumlah' => htmlentities($this->input->post('jumlah')),
                'tanggal_peminjaman' => htmlentities($this->input->post('tanggal_peminjaman')),
                'jam_peminjaman' => htmlentities($this->input->post('jam_peminjaman')),
                'tanggal_pengembalian' => htmlentities($this->input->post('tanggal_pengembalian')),
                'jam_pengembalian' => htmlentities($this->input->post('jam_pengembalian')),
                'status' => htmlentities($this->input->post('status'))
            ];
            $this->db->insert('sf_progress', $data);

            $in = $id;
            redirect(base_url() . "surface/preview_data/" . $in);
        }
    }

   

    public function PDF($id)
    {
        $mpdf = new \Mpdf\Mpdf();
        $data['getDataProgressResultWithID'] =  $this->Sf_Progress_Model->getDataProgressResultWithID($id);
        $data['getDataBarangById'] =  $this->Sf_Progress_Model->getDataPemeriksaanRowQueryWitdId($id);

        $data = $this->load->view('pdf/report', $data, TRUE);

        $mpdf->WriteHTML($data);
        $mpdf->Output('report.pdf', \Mpdf\Output\Destination::INLINE);
    }

}
