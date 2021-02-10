<?php defined('BASEPATH') or exit('No direct script access allowed');

class Tipe_model extends CI_Model
{
    private $_table = "tipe_kend";

    public $id_tipe;
    public $tipe;
    public $id_merk;


    public function rules()
    {
        return [
            [
                'field' => 'merk',
                'label' => 'Merk',
                'rules' => 'required'
            ],
            [
                'field' => 'tipe',
                'label' => 'Tipe',
                'rules' => 'required'
            ],

        ];
    }
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_tipe" => $id])->row();
    }
    public function save($x)
    {
        $this->db->insert($this->_table, $x);
    }
    public function update()
    {
        $post = $this->input->post();
        $this->id_tipe = $post["id"];
        $up = [
            'id_merk' => $post['merk'],
            'tipe' => $post['tipe'],
        ];

        $this->db->where('id_tipe', $post['id']);
        $this->db->update('tipe_kend', $up);
    }
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_tipe" => $id));
    }
}
