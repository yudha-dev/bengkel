<?php defined('BASEPATH') or exit('No direct script access allowed');

class Bengkel_model extends CI_Model
{
    private $_table = "bengkel";

    public $id_bengkel;
    public $nama;
    public $namabengkel;
    public $jenis;
    public $alamat;
    public $telephone;
    public $diskripsi;
    // public $longitude;
    // public $latitude;
    public $foto = "default.jpg";
    public $status;

    public function rules()
    {
        return [
            [
                'field' => 'pemilik',
                'label' => 'Nama Pemilik',
                'rules' => 'required'
            ],
            [
                'field' => 'namabengkel',
                'label' => 'Nama Bengkel',
                'rules' => 'required'
            ],

            [
                'field' => 'jenis',
                'label' => 'Jenis ',
                'rules' => 'required'
            ],

            [
                'field' => 'alamat',
                'label' => 'Alamat ',
                'rules' => 'required'
            ],

            [
                'field' => 'telephone',
                'label' => 'Thelephone',
                'rules' => 'required'
            ],
            [
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required'
            ],

            [
                'field' => 'diskripsi',
                'label' => 'Deskripsi Bengkel',
                'rules' => 'required'
            ],

            // [
            //     'field' => 'longitude',
            //     'label' => 'Longitude',
            //     'rules' => 'required'
            // ],

            // [
            //     'field' => 'latitude',
            //     'label' => 'Latitude',
            //     'rules' => 'required'
            // ],
            // [
            //     'field' => 'Status',
            //     'label' => 'status',
            //     'rules' => 'required'
            // ]

        ];
    }
    public function getAll($id)
    {
        return $this->db->get_where($this->_table, ['status' => $id])->result();
    }
    public function getbeng($id)
    {
        return $this->db->query("SELECT * FROM bengkel WHERE id_user ='$id'")->result();
    }
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_bengkel" => $id])->row();
    }

    public function save($x)
    {
        $this->db->insert($this->_table, $x);
    }
    public function update($up)
    {
        $post = $this->input->post();


        $this->db->where('id_bengkel', $post['id']);
        $this->db->update('bengkel', $up);

        // return $this->db->update($this->_table, $this, array('id_bengkel' => $post['id']));
    }
    public function pilih_b($status)
    {
        $this->db->where("status", $status);
        return $this->db->get("bengkel");
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_bengkel" => $id));
    }
    //
    public function getMobil()
    {
        $this->db->select('*');
        $this->db->join('jenis_bengkel', 'bengkel.id_jenis = jenis_bengkel.id_jenis');
        return $this->db->get_where($this->_table, ['jenis_bengkel' => 'Mobil', 'status' => 'AKTIF']);
    }
    //
    public function getMotor()
    {
        $this->db->select('*');
        $this->db->join('jenis_bengkel', 'bengkel.id_jenis = jenis_bengkel.id_jenis');
        return $this->db->get_where($this->_table, ['jenis_bengkel' => 'Motor', 'status' => 'AKTIF']);
    }
    //
    public function getIdBengkel($id)
    {
        return $this->db->get_where($this->_table, ['id_user' => $id]);
    }
}
