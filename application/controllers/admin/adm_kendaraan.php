<?php

defined('BASEPATH') or exit('No direct script access allowed');

class adm_kendaraan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("kendaraan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $id = $this->session->userdata('id');
        $val = $this->db->query("SELECT * FROM user where id_user='$id'")->row_array();
        if ($val['level'] == 'Superadmin') {
            $data["kendaraan"] = $this->kendaraan_model->getAll();
            $this->load->view("admin/kendaraan/list", $data);
        } else {
            $data["kendaraan"] = $this->kendaraan_model->getkend($id);
            $this->load->view("admin/kendaraan/list", $data);
        }
    }

    public function add()
    {
        $kendaraan = $this->kendaraan_model;
        $validation = $this->form_validation;
        $validation->set_rules($kendaraan->rules());

        $id = $this->session->userdata('id');

        $post = $this->input->post();
        $s = $this->db->query("SELECT * FROM jenis_kend")->result_array();
        $y = $this->db->query("SELECT * FROM merk_kend")->result_array();
        $z = $this->db->query("SELECT * FROM tipe_kend")->result_array();
        $x = [
            'jn' => $s,
            'mrk' => $y,
            'tp' => $z
        ];


        if ($validation->run()) {

            if ($validation->run()) {
                $save = [
                    'id_jnskend' => $post['jenis_kend'],
                    'id_merk' => $post['merk'],
                    'id_tipe' => $post['tipe'],
                    'tahun' => $post['tahun'],
                    'no_plat' => $post['no_plat'],
                    'id_user' => $id

                ];
            }
            $this->db->insert('kendaraan', $save);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view('konsumen/kendaraan/new_form', $x);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('konsumen/kendaraan');

        $kendaraan = $this->kendaraan_model;
        $validation = $this->form_validation;
        $validation->set_rules($kendaraan->rules());


        if ($validation->run()) {
            $kendaraan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $s = $this->db->query("SELECT * FROM jenis_kend")->result_array();
        $y = $this->db->query("SELECT * FROM merk_kend")->result_array();
        $z = $this->db->query("SELECT * FROM tipe_kend")->result_array();

        $data = [
            'jn' => $s,
            'mrk' => $y,
            'tp' => $z
        ];

        $data["kendaraan"] = $kendaraan->getById($id);
        if (!$data["kendaraan"]) show_404();

        $this->load->view("konsumen/kendaraan/edit_form", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->kendaraan_model->delete($id)) {
            redirect(site_url('konsumen/kendaraan'));
        }
    }
}
