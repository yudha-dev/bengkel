<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("jenis_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["jenis"] = $this->jenis_model->getAll();
        $this->load->view("admin/jenis/list", $data);
    }
    public function add()
    {
        $jenis = $this->jenis_model;
        $validation = $this->form_validation;
        $validation->set_rules($jenis->rules());
        $post = $this->input->post();
        if ($validation->run()) {
            $x = [
                'jenis_bengkel' => $post['jenis_bengkel'],


            ];
            $this->db->insert('jenis_bengkel', $x);
            // $jenis->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/jenis/new_form");
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/jenis');

        $jenis = $this->jenis_model;
        $validation = $this->form_validation;
        $validation->set_rules($jenis->rules());

        if ($validation->run()) {
            $jenis->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["jenis"] = $jenis->getById($id);
        if (!$data["jenis"]) show_404();

        $this->load->view("admin/jenis/edit_form", $data);
    }
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->jenis_model->delete($id)) {
            redirect(site_url('admin/jenis'));
        }
    }
}
