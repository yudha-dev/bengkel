<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Service extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("order_model");
        $this->load->library('form_validation');
    }
    //
    public function index()
    {
        $id_kend = $this->input->post('id_kendaraan');
        $data["id_kend"] = $this->input->post('id_kend');
        $data["order"] = $this->order_model->getAll();
        $data["beng"] = $this->order_model->getbengkel($id_kend);
        $this->load->view("konsumen/konsumen/service", $data);
    }
    //

    public function lap_service($id = null)
    {
        $get = $this->db->query("SELECT a.tanggal,b.keluhan,b.harga, d.nama, e.tipe, a.kode  FROM `order` a JOIN keluhan b ON a.id_kel=b.id_kel INNER JOIN kendaraan c ON	a.id_kend=c.id_kend INNER JOIN `user` d ON c.id_user=d.id_user INNER JOIN tipe_kend e ON c.id_tipe=e.id_tipe WHERE a.kode='$id'");

        $total = $this->db->query("SELECT a.tanggal,b.keluhan,b.harga, d.nama, e.tipe, a.kode, SUM(b.harga) AS total   FROM `order` a JOIN keluhan b ON a.id_kel=b.id_kel INNER JOIN kendaraan c ON	a.id_kend=c.id_kend INNER JOIN `user` d ON c.id_user=d.id_user INNER JOIN tipe_kend e ON c.id_tipe=e.id_tipe WHERE a.kode='$id'")->row()->total;

        $data = [
            'row' => $get->row(),
            'result' => $get->result(),
            'total' => $total,
        ];
        $this->load->view("laporan/lap_service", $data);
    }
}
