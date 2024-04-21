<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sf_Tickets_Model extends CI_Model
{

    function getDataBarangResult()
    {
        return  $this->db->get('sf_tickets')->result_array();
    }

    function getDataBarangById($id)
    {
        return $this->db->get_where('sf_tickets', ['id' => $id])->row_array();
    }


    public function hapus_data_ticket($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('sf_tickets');
    }
}
