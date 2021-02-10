<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Keluhan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("keluhan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $id = $this->session->userdata('id');
        $cek = $this->db->select('b.id_kel')->from('bengkel a')->join('keluhan b', 'a.id_bengkel=b.id_bengkel', 'inner')->where('a.id_user =' . $id)->get()->row_array();

        // print_r($cek['id_kel']);
        // die;
        $data["keluhan"] = $this->keluhan_model->resultById($cek['id_kel']);
        $this->load->view("bengkel/keluhan/list", $data);
    }
    public function add()
    {
        $keluhan = $this->keluhan_model;
        $validation = $this->form_validation;
        $validation->set_rules($keluhan->rules());
        $post = $this->input->post();
        $user = $this->session->userdata('id');

        $id_bengkel = $this->db->get_where('bengkel', ['id_user' => $user])->row()->id_bengkel;

        if ($validation->run()) {
            $x = [
                'keluhan' => $post['keluhan'],
                'harga' => $post['harga'],
                'id_bengkel' => $id_bengkel


            ];

            $this->db->insert('keluhan', $x);
            // $keluhan->save($x);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("bengkel/keluhan/new_form");
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('bengkel/keluhan');

        $keluhan = $this->keluhan_model;
        $validation = $this->form_validation;
        $validation->set_rules($keluhan->rules());

        if ($validation->run()) {
            $keluhan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["keluhan"] = $keluhan->getById($id);
        if (!$data["keluhan"]) show_404();

        $this->load->view("bengkel/keluhan/edit_form", $data);
    }
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->keluhan_model->delete($id)) {
            redirect(site_url('bengkel/keluhan'));
        }
    }
}
