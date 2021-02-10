<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Bengkel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("bengkel_model");
        $this->load->library('form_validation');
        $this->_login();
    }

    public function index()
    {
        $id = $this->session->userdata('id');
        $val = $this->db->query("SELECT * FROM user where id_user='$id'")->row_array();
        if ($val['level'] == 'Superadmin') {
            $data["bengkel"] = $this->bengkel_model->getAll();
            $this->load->view("bengkel/bengkel/list", $data);
        } else {
            $data["bengkel"] = $this->bengkel_model->getbeng($id);
            $this->load->view("bengkel/bengkel/list", $data);
        }
    }
    public function add()
    {
        $bengkel = $this->bengkel_model;
        $validation = $this->form_validation;
        $validation->set_rules($bengkel->rules());

        $post = $this->input->post();

        $config['upload_path']          = './assets/foto_bengkel/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = true;
        // $config['max_size']             = 1024;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $this->load->library('upload', $config);
        $s = $this->db->query("SELECT * FROM jenis_bengkel")->result_array();
        $x = [
            'jen' => $s
        ];

        if ($validation->run()) {
            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data("file_name");
                $x = [
                    'pemilik' => $post['pemilik'],
                    'namabengkel' => $post['namabengkel'],
                    'id_jenis' => $post['jenis'],
                    'id_user' => $this->session->userdata('id'),
                    'alamat' => $post['alamat'],
                    'telephone' => $post['telephone'],
                    'email' => $post['email'],
                    'diskripsi' => $post['diskripsi'],
                    'longitude' => $post['longitude'],
                    'latitude' => $post['latitude'],
                    'foto' => $foto
                ];
            } else {
                $x = [
                    'pemilik' => $post['pemilik'],
                    'namabengkel' => $post['namabengkel'],
                    'id_jenis' => $post['jenis'],
                    'id_user' => $this->session->userdata('id'),
                    'alamat' => $post['alamat'],
                    'telephone' => $post['telephone'],
                    'email' => $post['email'],
                    'diskripsi' => $post['diskripsi'],
                    'longitude' => $post['longitude'],
                    'latitude' => $post['latitude'],
                    'foto' => ''
                ];
            }
            // print_r($x);
            // die;

            $this->db->insert('bengkel', $x);
            // $bengkel->save($x);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("bengkel/bengkel/new_form", $x);
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('bengkel/bengkel');

        $bengkel = $this->bengkel_model;
        $validation = $this->form_validation;
        $validation->set_rules($bengkel->rules());
        $post = $this->input->post();

        $config['upload_path']          = './assets/foto_bengkel/';
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
                    'pemilik' => $post['pemilik'],
                    'namabengkel' => $post['namabengkel'],
                    'id_jenis' => $post['jenis'],
                    'alamat' => $post['alamat'],
                    'telephone' => $post['telephone'],
                    'diskripsi' => $post['diskripsi'],
                    // 'longitude' => $post['longitude'],
                    // 'latitude' => $post['latitude'],
                    'foto' => $foto
                ];
            } else {
                $x = [
                    'pemilik' => $post['pemilik'],
                    'namabengkel' => $post['namabengkel'],
                    'id_jenis' => $post['jenis'],
                    'alamat' => $post['alamat'],
                    'telephone' => $post['telephone'],
                    'diskripsi' => $post['diskripsi'],
                    // 'longitude' => $post['longitude'],
                    // 'latitude' => $post['latitude'],
                    'foto' => ''
                ];
            }
            // print_r($x);
            // die;
            $bengkel->update($x);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $s = $this->db->query("SELECT * FROM jenis_bengkel")->result_array();
        $data = [
            'jen' => $s
        ];


        $data["bengkel"] = $bengkel->getById($id);
        $data["jen"] = $s;
        if (!$data["bengkel"]) show_404();

        $this->load->view("bengkel/bengkel/edit_form", $data);
    }
    public function bengkel()
    {

        $data["bengkel"] = $this->bengkel_model->getAll();
        $this->load->view("admin/master/bengkel", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->bengkel_model->delete($id)) {
            redirect(site_url('bengkel/bengkel'));
        }
    }

    public function lap_bengkel()
    {
        $lap = $this->db->query("SELECT a.tanggal,a.kode,b.keluhan,b.harga,d.nama,c.namabengkel,c.alamat,c.telephone,f.tipe FROM `order` a INNER JOIN keluhan b ON a.id_kel=b.id_kel  INNER JOIN bengkel c ON a.id_bengkel=c.id_bengkel INNER JOIN kendaraan e ON a.id_kend=e.id_kend INNER JOIN `user` d ON e.id_user=d.id_user INNER JOIN tipe_kend f ON e.id_tipe=f.id_tipe");

        $data = [
            'row' => $lap->row_array(),
            'result' => $lap->result_array()
        ];
        $this->load->view("laporan/lap_bengkel", $data);
    }
}
