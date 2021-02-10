<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model
{
    private $_table = "bengkel";

    public $id_bengkel;
    public $nama;
    public $namabengkel;
    public $email;
    public $jenis;
    public $alamat;
    public $telephone;

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
        ];
    }
    public function getAll()
    {
        return $this->db->get_where($this->_table, ['status' => 'EVALUASI'])->result();
    }
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_bengkel" => $id])->row();
    }
    // public function getbeng($id)
    // {
    //     return $this->db->query("SELECT * FROM bengkel WHERE id_user ='$id'")->result();
    // }
}
