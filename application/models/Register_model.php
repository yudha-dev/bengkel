<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register_model extends CI_Model
{

    public function simpan($data)
    {
        return $this->db->insert('tb_user', $data);
    }
}
