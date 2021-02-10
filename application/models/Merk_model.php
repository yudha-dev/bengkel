<?php defined('BASEPATH') or exit('No direct script access allowed');

class Merk_model extends CI_Model
{
    private $_table = "merk_kend";

    public $id_merk;
    public $id_jnskend;
    public $merk;

    public function rules()
    {
        return [
            [
                'field' => 'jenis_kend',
                'label' => 'Jenis Kendaraan',
                'rules' => 'required'
            ],

            [
                'field' => 'merk',
                'label' => 'Merk',
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
        return $this->db->get_where($this->_table, ["id_merk" => $id])->row();
    }
    public function save($x)
    {
        $this->db->insert($this->_table, $x);
    }
    public function update()
    {
        $post = $this->input->post();
        $up = [
            'id_jnskend' => $post['jenis_kend'],
            'merk' => $post['merk'],

        ];

        $this->db->where('id_merk', $post['id']);
        $this->db->update('merk_kend', $up);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_merk" => $id));
    }
}
