<?php

defined('BASEPATH') or exit('No direct script access allowed');

class adm_konsumen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("konsumen_model");
        $this->load->library('form_validation');
    }

    public function index()
    {

        $id = $this->session->userdata('id');
        $val = $this->db->query("SELECT * FROM user where id_user='$id'")->row_array();
        if ($val['level'] == 'Superadmin') {
            $data["konsumen"] = $this->konsumen_model->getAll();
            $this->load->view("admin/konsumen/list", $data);
        } else {
            $data["konsumen"] = $this->konsumen_model->getkons($id);
            $this->load->view("admin/konsumen/list", $data);
        }
    }
    public function add()

    {
        $konsumen = $this->konsumen_model;
        $validation = $this->form_validation;
        $validation->set_rules($konsumen->rules());
        $post = $this->input->post();

        $config['upload_path']          = './assets/foto_konsumen/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = true;
        // $config['max_size']             = 1024;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->load->library('upload', $config);

        if ($validation->run()) {
            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data("file_name");
                $x = [
                    'nama' => $post['nama'],
                    'alamat' => $post['alamat'],
                    'telephone' => $post['telephone'],
                    'username' => $post['username'],
                    'password' => $post['password'],
                    'foto' => $foto
                ];
            } else {
                $x = [
                    'nama' => $post['nama'],
                    'alamat' => $post['alamat'],
                    'telephone' => $post['telephone'],
                    'username' => $post['username'],
                    'password' => $post['password'],
                    'foto' => ''
                ];
            }

            $konsumen->save($x);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("konsumen/konsumen/new_form");
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('konsumen/konsumen');

        $konsumen = $this->konsumen_model;
        $validation = $this->form_validation;
        $validation->set_rules($konsumen->rules());
        $post =  $this->input->post();



        $config['upload_path']          = './assets/foto_konsumen/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = true;
        // $config['max_size']             = 1024;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->load->library('upload', $config);

        if ($validation->run()) {
            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data("file_name");
                $x = [
                    'alamat' => $post['alamat'],
                    'telephone' => $post['telephone'],
                    'id_user' => $id,
                    'foto' => $foto
                ];
                $xuser = [
                    'nama' => $post['nama'],
                    'username' => $post['username'],
                    'password' => $post['password'],
                    'email' => $post['email'],
                ];
            } else {
                $xuser = [
                    'nama' => $post['nama'],
                    'username' => $post['username'],
                    'password' => $post['password'],
                    'email' => $post['email'],
                ];
                $x = [
                    'alamat' => $post['alamat'],
                    'telephone' => $post['telephone'],
                    'id_user' => $id,
                    'foto' => ''
                ];
            }

            $konsumen->update($x, $xuser);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["konsumen"] = $konsumen->getById($id);
        if (!$data["konsumen"]) show_404();

        $this->load->view("konsumen/konsumen/edit_form", $data);
    }
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->konsumen_model->delete($id)) {
            redirect(site_url('konsumen/konsumen'));
        }
    }
}
