<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Md_Alat_Ukur_Model extends CI_Model
{
    function getDataAlatUkurResult()
    {
        $this->db->select('*');
        $this->db->from('md_alat_ukur');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function hapus_md_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('md_alat_ukur');
    }

    function getDataAlatUkurById($id)
    {
        return $this->db->get_where('md_alat_ukur', ['id' => $id])->row_array();
    }
}
