<?php defined('BASEPATH') or exit('No direct script access allowed');

class Superadmin_model extends CI_Model
{
    private $_table = "superadmin";

    public $id_sa;
    public $nama;
    public $username;
    public $password;
    public $foto = "default.jpg";

    public function rules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Name',
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
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_sa" => $id])->row();
    }
    public function save()
    {
        $post = $this->input->post();
        $this->id_sa = uniqid();
        $this->nama = $post["nama"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        return $this->db->insert($this->_table, $this);
    }
    public function update()
    {
        $post = $this->input->post();
        $this->id_sa = uniqid();
        $this->nama = $post["nama"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        return $this->db->update($this->_table, $this, array('id_sa' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_sa" => $id));
    }
}
