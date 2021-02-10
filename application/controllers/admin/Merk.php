<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Merk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("merk_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["merk"] = $this->merk_model->getAll();
        $this->load->view("admin/merk/list", $data);
    }
    public function add()
    {
        $merk_kend = $this->merk_model;
        $validation = $this->form_validation;
        $validation->set_rules($merk_kend->rules());

        $post = $this->input->post();

        $s = $this->db->query("SELECT * FROM jenis_kend")->result_array();
        $x = [
            'jen' => $s
        ];

        if ($validation->run()) {

            $save = [
                'id_jnskend' => $post['jenis_kend'],
                'merk' => $post['merk']
            ];

            $this->db->insert('merk_kend', $save);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view('admin/merk/new_form', $x);
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/merk');

        $merk_kend = $this->merk_model;
        $validation = $this->form_validation;
        $validation->set_rules($merk_kend->rules());

        if ($validation->run()) {
            $merk_kend->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $s = $this->db->query("SELECT * FROM jenis_kend")->result_array();

        $data["merk"] = $merk_kend->getById($id);
        $data["mrk"] = $s;
        if (!$data["merk"]) show_404();

        $this->load->view("admin/merk/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->merk_model->delete($id)) {
            redirect(site_url('admin/merk'));
        }
    }
}
