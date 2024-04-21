<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Md_Region_Model extends CI_Model
{
    function getDataAlatBantuResult()
    {
        $this->db->select('*');
        $this->db->from('md_kelompok');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function hapus_md_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('md_kelompok');
    }

    function getDataAlatBantuById($id)
    {
        return $this->db->get_where('md_kelompok', ['id' => $id])->row_array();
    }
}
