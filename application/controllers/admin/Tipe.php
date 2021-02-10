<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tipe extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("tipe_model");
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data["tipe"] = $this->tipe_model->getAll();
        $this->load->view("admin/tipe/list", $data);
    }
    public function add()
    {
        $tipe = $this->tipe_model;
        $validation = $this->form_validation;
        $validation->set_rules($tipe->rules());

        $post = $this->input->post();

        $s = $this->db->query("SELECT * FROM merk_kend")->result_array();
        $x = [
            'tp' => $s
        ];
        if ($validation->run()) {

            $save = [
                'id_merk' => $post['merk'],
                'tipe' => $post['tipe']
            ];
            $this->db->insert('tipe_kend', $save);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view('admin/tipe/new_form', $x);
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/tipe');

        $tipe = $this->tipe_model;
        $validation = $this->form_validation;
        $validation->set_rules($tipe->rules());
        if ($validation->run()) {
            $tipe->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $s = $this->db->query("SELECT * FROM merk_kend")->result_array();
        $x = [
            'tp' => $s
        ];

        $data["tipe"] = $tipe->getById($id);
        $data["tp"] = $s;
        if (!$data["tipe"]) show_404();

        $this->load->view("admin/tipe/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->tipe_model->delete($id)) {
            redirect(site_url('admin/tipe'));
        }
    }
}
