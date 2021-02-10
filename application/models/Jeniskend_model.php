<?php defined('BASEPATH') or exit('No direct script access allowed');

class Jeniskend_model extends CI_Model
{
    private $_table = "jenis_kend";

    public $id_jnskend;
    public $jenis_kend;

    public function rules()
    {
        return [
            [
                'field' => 'jenis_kend',
                'label' => 'Jenis Kendaraan',
                'rules' => 'required'
            ]


        ];
    }
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_jnskend" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_jnskend = uniqid();
        $this->jenis_kend = $post["jenis_kend"];

        return $this->db->insert($this->_table, $this);
    }
    public function update()
    {
        $post = $this->input->post();
        $this->id_jnskend = uniqid();
        $this->jenis_kend = $post["jenis_kend"];
        return $this->db->update($this->_table, $this, array('id_jnskend' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_jnskend" => $id));
    }
}
