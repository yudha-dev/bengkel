<?php

defined('BASEPATH') or exit('No direct script access allowed');

class jeniskend extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("jeniskend_model");
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data["jeniskend"] = $this->jeniskend_model->getAll();
        $this->load->view("admin/jeniskend/list", $data);
    }
    public function add()
    {
        $jeniskend = $this->jeniskend_model;
        $validation = $this->form_validation;
        $validation->set_rules($jeniskend->rules());
        $post = $this->input->post();
        if ($validation->run()) {
            $x = [
                'jenis_kend' => $post['jenis_kend'],


            ];
            $this->db->insert('jenis_kend', $x);
            // $jenis->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view("admin/jeniskend/new_form");
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/jeniskend');

        $jeniskend = $this->jeniskend_model;
        $validation = $this->form_validation;
        $validation->set_rules($jeniskend->rules());

        if ($validation->run()) {
            $jeniskend->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["jeniskend"] = $jeniskend->getById($id);
        if (!$data["jeniskend"]) show_404();

        $this->load->view("admin/jeniskend/edit_form", $data);
    }
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->jeniskend_model->delete($id)) {
            redirect(site_url('admin/jeniskend'));
        }
    }
}
