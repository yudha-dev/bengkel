<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Orderku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("order_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $id_kend = $this->input->post('id_kendaraan');
        $data["id_kend"] = $this->input->post('id_kend');
        $data["order"] = $this->order_model->getAll();
        $data["beng"] = $this->order_model->getbengkel($id_kend);
        $this->load->view("konsumen/order/list", $data);
    }

    public function add($kode)
    {
        $k = explode('-', $kode);
        $id = $k[0];
        $id_kend = $k[1];

        $order = $this->order_model;
        $validation = $this->form_validation;
        $validation->set_rules($order->rules());
        $post = $this->input->post();

        // echo $id;
        // print_r($id_kend);
        // die;
        if ($validation->run()) {
            $order->save();
            $k = $this->db->query("SELECT MAX(id_dorder) as kode FROM d_order")->row_array();
            $char               = 'D';
            // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
            $nourut             = substr($k['kode'], 1, 4); //1 adalah jumlah huruf, dan 6 adalah jumlah angka yg di ambil
            $idUrut             = $nourut + 1;
            $id_p = $char . sprintf("%04s", $idUrut);
            $dorder = [
                'id_dorder' => $id_p,
                'id_kel' => $post['keluhan'],
                'keterangan' => $post['keterangan']
            ];
            $this->db->insert('d_order', $dorder);

            $order = [
                'id_dorder' => $id_p,
                'id_bengkel' => $id,
                'id_kend' => $id_kend,
                'tgl_order' => date('Y-m-d')
            ];
            $this->db->insert('order', $order);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data = [
            'id' => $id,
            'klh' => $this->db->query("SELECT * FROM keluhan WHERE id_bengkel='$id'")->result_array()

        ];
        // print_r($data);
        // die;
        $this->load->view("konsumen/order/new_form", $data);
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('konsumen/order');

        $order = $this->order_model;
        $validation = $this->form_validation;
        $validation->set_rules($order->rules());

        if ($validation->run()) {
            $order->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["order"] = $order->getById($id);
        if (!$data["order"]) show_404();

        $this->load->view("konsumen/order/edit_form", $data);
    }
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->order_model->delete($id)) {
            redirect(site_url('konsumen/order'));
        }
    }
}
