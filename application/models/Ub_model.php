<?php defined('BASEPATH') or exit('No direct script access allowed');
class Ub_model extends CI_Model
{
    private $_table = "user";

    public $id_user;
    public $nama;
    public $username;
    public $email;
    public $password;
    public $level;

    public function rules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama Pemilik',
                'rules' => 'required'
            ],

            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ],
            [
                'field' => 'level',
                'label' => 'Level',
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
        return $this->db->get_where($this->_table, ["id_user" => $id])->row();
    }
    public function getlevel()
    {
        return $this->db->query("SELECT * FROM user WHERE level ='Bengkel'")->result();
    }
}
