<?php defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{
    private $_table = "order";

    public $id_order;
    public $tgl_order;
    public $id_kel;
    public function rules()
    {
        return [
            [
                'field' => 'tgl_order',
                'label' => 'Tanggal Service',
                'rules' => 'required'
            ],

            [
                'field' => 'keluhan',
                'label' => 'Keluhan',
                'rules' => 'required'
            ]

        ];
    }
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getbengkel($id)
    {

        $kend = $this->db->query("SELECT * FROM kendaraan a JOIN jenis_kend b ON a.id_jnskend=b.id_jnskend WHERE a.id_kend= '$id'")->row_array();
        $a = $kend['jenis_kend'];
        return  $this->db->query("SELECT * FROM bengkel a JOIN jenis_bengkel b ON a.id_jenis=b.id_jenis WHERE b.jenis_bengkel='$a'")->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_order" => $id])->row();
    }
    public function save()
    {
        $this->db->insert($this->_table);
    }
}
