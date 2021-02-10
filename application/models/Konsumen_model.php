<?php defined('BASEPATH') or exit('No direct script access allowed');

class Konsumen_model extends CI_Model
{
    private $_table = "konsumen";

    public $id_kons;
    public $nama;
    public $alamat;
    public $telephone;
    public $username;
    public $email;
    public $password;
    public $foto = "default.jpg";

    public function rules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],

            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ],

            [
                'field' => 'telephone',
                'label' => 'Telephone',
                'rules' => 'required'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required'
            ],

            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ],

            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ]
        ];
    }
    public function getAll()
    {
        return $this->db->query("SELECT * FROM user a JOIN konsumen b ON a.id_user=b.id_user")->result();
    }
    public function getkons($id)
    {
        return $this->db->query("SELECT * FROM user a LEFT JOIN konsumen b ON a.id_user=b.id_user WHERE a.id_user='$id'")->result();
    }
    public function getById($id)
    {
        return $this->db->query("SELECT * FROM user a LEFT JOIN konsumen b ON a.id_user=b.id_user WHERE a.id_user='$id'")->row();
    }
    public function save($x)
    {
        return $this->db->insert($this->_table, $x);
    }
    public function update($x, $xuser)
    {
        $post = $this->input->post();
        $k = $post['id'];
        $cek = $this->db->get_where($this->_table, 'id_user =' . $k)->num_rows();
        if ($cek > 0) {
            $this->db->update($this->_table, $x, ['id_user' => $k]);
        } else {
            $this->db->insert($this->_table, $x);
        }
        $this->db->update('user', $xuser, ['id_user' => $k]);
    }
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_kons" => $id));
    }
}
