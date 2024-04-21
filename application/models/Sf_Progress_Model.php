<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sf_Progress_Model extends CI_Model
{
    function getDataPemeriksaanResult()
    {
        return $this->db->get_where('sf_progress')->result_array();
    }

    function getDataProgressResultWithID($id)
    {
        return $this->db->get_where('sf_progress', ['id_registrasi' => $id])->result_array();
    }

    function getDataPemeriksaanRow()
    {
        return $this->db->get_where('Sf_Progress')->row_array();
    }

    function getDataPemeriksaanRowWitdId($id)
    {
        return $this->db->get_where('Sf_Progress', ['id_registrasi' => $id])->row_array();
    }

    function getDataPemeriksaanRowQueryWitdId($id)
    {

        return $this->db->get_where('sf_progress', ['id_registrasi' => $id])->row_array();
    }
}
