<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Kendaraan_model', 'Bengkel_model', 'Keluhan_model', 'ReviewModel']);
        $this->load->library('form_validation');
    }

    public function index()
    {
        $id = $this->session->userdata('id');
        $val = $this->db->query("SELECT * FROM user where id_user='$id'")->row_array();
        if ($val['level'] == 'Superadmin') {
            $data["kendar"] = $this->Kendaraan_model->getAll();
            $this->load->view("konsumen/kendaraan/list", $data);
        } else {
            $data["kendar"] = $this->Kendaraan_model->kendaraan($id)->result();
            $this->load->view("konsumen/kendaraan/list", $data);
        }
    }

    public function add()
    {
        $kendaraan = $this->Kendaraan_model;
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
        $this->load->view('konsumen/kendaraan/new_form', $x);


        if ($validation->run()) {

            if ($validation->run()) {
                $save = [
                    'id_jnskend'    => $post['jenis_kend'],
                    'id_merk'       => $post['merk'],
                    'id_tipe'       => $post['tipe'],
                    'tahun'         => $post['tahun'],
                    'no_plat'       => $post['no_plat'],
                    'id_user'       => $id,
                    'status'        => 'Order'

                ];
            }
            $this->db->insert('kendaraan', $save);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('konsumen/kendaraan'));
        }
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('konsumen/kendaraan');

        $kendaraan = $this->Kendaraan_model;
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

        if ($this->Kendaraan_model->delete($id)) {
            redirect(site_url('konsumen/kendaraan'));
        }
    }
    //ambil view service
    public function getService($id)
    {
        $kend = $this->Kendaraan_model->getDataKendaraan($id)->row();

        $data = [
            'folder'    => 'servis',
            'page'      => 'order_servis',
            'title'     => 'Order Service',
            'kend'      => $kend
        ];

        $this->load->view('konsumen/templates/index', $data);
    }
    //ambil lokasi
    public function getLokasi($id)
    {
        $user   = $this->Kendaraan_model->getUser($id)->row();
        $alamat = $this->session->all_userdata();

        $data = [
            'folder'    => 'servis',
            'page'      => 'lokasi_service',
            'title'     => 'Lokasi Service',
            'user'      => $user,
            'alamat'    => $alamat
        ];

        $this->load->view('konsumen/templates/index', $data);
    }
    //simpan data sementara ke session
    public function store()
    {
        $post = $this->input->post();

        $data = [
            'id'        => $post['id'],
            'alamat'    => $post['alamat'],
            'tanggal'   => date('Y-m-d'),
            'jenis'     => $post['jenis'],
            'id_kend'   => $post['id_kend'],
        ];

        $this->session->set_userdata($data);
        redirect(site_url('konsumen/daftar_bengkel'));
    }
    //tampilkan data di session dan view ke bengkel
    public function daftarBengkel()
    {
        $user       = $this->session->all_userdata();
        $mobil      = $this->Bengkel_model->getMobil()->result();
        $motor      = $this->Bengkel_model->getMotor()->result();

        if ($user['jenis'] == 'Mobil') {
            $jenis = $mobil;
        } else {
            $jenis = $motor;
        }

        $data = [
            'folder'    => 'servis',
            'page'      => 'daftar_bengkel',
            'title'     => 'List Bengkel',
            'jenis'     => $jenis,
            'kend'      => $user['id_kend']
        ];

        $this->load->view('konsumen/templates/index', $data);
    }
    //show bengkel detai
    public function detailBengkel($id)
    {
        $bengkel = $this->Bengkel_model->getById($id);
        $review = $this->ReviewModel->getAll($id)->result();

        $data = [
            'folder'    => 'servis',
            'page'      => 'detail_bengkel',
            'title'     => 'Detail Bengkel',
            'bengkel'   => $bengkel,
            'review'    => $review
        ];

        $this->load->view('konsumen/templates/index', $data);
    }
    //insert id bengkel ke session
    public function storeBengkel()
    {
        $post = $this->input->post();

        $data = [
            'id_bengkel'    => $post['bengkel'],
        ];

        $this->session->set_userdata($data);
        redirect(site_url('konsumen/input_keluhan'));
    }
    //keluhan view
    public function keluhan()
    {
        $session    = $this->session->all_userdata();
        $id         = $session['id_bengkel'];
        $bengkel    = $this->Bengkel_model->getById($id);
        $keluhan    = $this->Keluhan_model->keluhanBengkel($id)->result();

        $data = [
            'folder'    => 'servis',
            'page'      => 'keluhan',
            'title'     => 'Input Keluhan',
            'keluhan'   => $keluhan,
            'bengkel'   => $bengkel
        ];

        $this->load->view('konsumen/templates/index', $data);
    }
}
