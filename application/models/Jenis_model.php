<?php defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_model extends CI_Model
{
    private $_table = "jenis_bengkel";

    public $id_jenis;
    public $jenis_bengkel;

    public function rules()
    {
        return [
            [
                'field' => 'jenis_bengkel',
                'label' => 'Jenis Bengkel',
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
        return $this->db->get_where($this->_table, ["id_jenis" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_jenis = uniqid();
        $this->jenis_bengkel = $post["jenis_bengkel"];

        return $this->db->insert($this->_table, $this);
    }
    public function update()
    {
        $post = $this->input->post();
        $this->id_jenis = uniqid();
        $this->jenis_bengkel = $post["jenis_bengkel"];
        return $this->db->update($this->_table, $this, array('id_jenis' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_jenis" => $id));
    }
}
