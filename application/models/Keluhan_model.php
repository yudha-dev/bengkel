<?php defined('BASEPATH') or exit('No direct script access allowed');

class Keluhan_model extends CI_Model
{
    private $_table = "keluhan";

    public $id_kel;
    public $keluhan;
    public $harga;


    public function rules()
    {
        return [
            [
                'field' => 'keluhan',
                'label' => 'Keluhan',
                'rules' => 'required'
            ],

            [
                'field' => 'harga',
                'label' => 'Harga',
                'rules' => 'required'
            ],


        ];
    }
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function resultById($id)
    {
        return $this->db->get_where($this->_table, ["id_kel" => $id])->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kel" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_kel = uniqid();
        $this->keluhan = $post["keluhan"];
        $this->harga = $post["harga"];

        return $this->db->insert($this->_table, $this);
    }
    public function update()
    {
        $post = $this->input->post();
        $this->id_kel = $post["id"];
        $this->keluhan = $post["keluhan"];
        $this->harga = $post["harga"];

        return $this->db->update($this->_table, $this, array('id_kel' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_kel" => $id));
    }
    public function keluhanBengkel($id)
    {
        $this->db->select('id_kel, keluhan, harga');
        $this->db->join('bengkel', 'keluhan.id_bengkel = bengkel.id_bengkel');
        return $this->db->get_where($this->_table, ['keluhan.id_bengkel' => $id]);
    }
}
