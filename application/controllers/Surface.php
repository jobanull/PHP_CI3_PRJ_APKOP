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

        $this->load->model('Md_Region_Model');

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
        $this->form_validation->set_rules('nama_nasabah', 'Nama_Nasabah');
        $this->form_validation->set_rules('ktp_nasabah', 'Ktp_Nasabah');
        $this->form_validation->set_rules('jumlah_pinjaman', 'Jumlah_Pinjaman');
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
                'nama_nasabah' => htmlentities($this->input->post('nama_nasabah')),
                'ktp_nasabah' => htmlentities($this->input->post('ktp_nasabah')),
                'jumlah_pinjaman' => htmlentities($this->input->post('jumlah_pinjaman')),
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
    $data['getDataAlatBantuResult'] = $this->Md_Region_Model->getDataAlatBantuResult();
    $data['getDataProgressResultWithID'] = $this->Sf_Progress_Model->getDataProgressResultWithID($id);
    $data['getDataPemeriksaanRowWitdId'] = $this->Sf_Progress_Model->getDataPemeriksaanRowWitdId($id);

    $this->form_validation->set_rules('id_registrasi', 'Registrasi', 'required');
    $this->form_validation->set_rules('jumlah_pinjaman', 'Jumlah_Pinjaman');
    $this->form_validation->set_rules('kelompok', 'Kelompok');
    $this->form_validation->set_rules('tanggal_pinjaman', 'Tanggal_Pinjaman');
    $this->form_validation->set_rules('tanggal_pengembalian', 'Tanggal_Pengembalian');
    $this->form_validation->set_rules('jumlah_pengembalian', 'Jumlah_Pengembalian');
    $this->form_validation->set_rules('selisih', 'Selisih');
    $this->form_validation->set_rules('status', 'Status');

    if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('surface/preview/preview_data', $data);
        $this->load->view('templates/footer');
    } else {
        // Start transaction
        $this->db->trans_begin();

        $data = [
            'id_registrasi' => htmlentities($this->input->post('id_registrasi')),
            'jumlah_pinjaman' => htmlentities($this->input->post('jumlah_pinjaman')),
            'kelompok' => htmlentities($this->input->post('kelompok')),
            'tanggal_pinjaman' => htmlentities($this->input->post('tanggal_pinjaman')),
            'jumlah_pengembalian' => htmlentities($this->input->post('jumlah_pengembalian')),
            'tanggal_pengembalian' => htmlentities($this->input->post('tanggal_pengembalian')),
            'selisih' => htmlentities($this->input->post('selisih')),
            'status' => htmlentities($this->input->post('status'))
        ];

        $this->db->insert('sf_progress', $data);

        // Update sisa_pinjaman
        $this->db->set('selisih', 'selisih - jumlah_pengembalian', FALSE);
        $this->db->where('id_registrasi', $id);
        $this->db->update('sf_progress');

        if ($this->db->trans_status() === FALSE) {
            // Rollback transaction if any query fails
            $this->db->trans_rollback();
            echo "Transaction failed!";
        } else {
            // Commit transaction
            $this->db->trans_commit();
            redirect(base_url() . "surface/preview_data/" . $id);
        }
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
