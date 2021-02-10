<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Superadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("superadmin_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["superadmin"] = $this->superadmin_model->getAll();
        $this->load->view("admin/superadmin/list", $data);
    }
    public function add()
    {
        $superadmin = $this->superadmin_model;
        $validation = $this->form_validation;
        $validation->set_rules($superadmin->rules());
        $post = $this->input->post();

        $config['upload_path']          = './assets/foto_admin/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = true;
        // $config['max_size']             = 1024;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->load->library('upload', $config);
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/superadmin');

        $superadmin = $this->superadmin_model;
        $validation = $this->form_validation;
        $validation->set_rules($superadmin->rules());

        if ($validation->run()) {
            $superadmin->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["superadmin"] = $superadmin->getById($id);
        if (!$data["superadmin"]) show_404();

        $this->load->view("admin/superadmin/edit_form", $data);
    }
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->superadmin_model->delete($id)) {
            redirect(site_url('admin/superadmin'));
        }
    }
}
