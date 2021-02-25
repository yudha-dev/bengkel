<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('OrderModel', 'Kendaraan_model', 'Bengkel_model', 'ReviewModel'));
        $this->load->library('form_validation');
    }
    public function index()
    {
        $id = $this->session->userdata('id');

        $order = $this->OrderModel->getData($id)->result();

        $data = [
            'folder'    => 'order',
            'page'      => 'data_servis',
            'title'     => 'Data Order Service',
            'order'     => $order
        ];

        $this->load->view('konsumen/templates/index', $data);
    }
    public function store()
    {
        $post       = $this->input->post();
        //kode
        $kode       = $this->OrderModel->maxCode()->row();
        $urut       = (int) substr($kode->kode, 3, 4);
        $urut++;
        $char       = "SVC";
        $kode       = $char . sprintf("%03s", $urut);
        //mesin
        if (isset($post['mesin'])) {
            $mesin = $post['mesin'];
        } else {
            $mesin = 'tidak';
        }
        //sesssion
        $session    = $this->session->all_userdata();
        $keluhan    = $post['keluhan'];
        foreach ($keluhan as $kel) {
            $data[] = [
                'id_kel'        => $kel,
                'id_bengkel'    => $session['id_bengkel'],
                'id_kend'       => $session['id_kend'],
                'kode'          => $kode,
                'tanggal'       => date('Y-m-d'),
                'alamat'        => $session['alamat'],
                'mesin'         => $mesin
            ];
        }

        $this->OrderModel->save($data);
        $this->Kendaraan_model->getUpdate($session['id_kend']);
        $this->session->unset_userdata(['id_kend', 'id_bengkel', 'alamat', 'jenis', 'tanggal']);
        redirect(site_url('konsumen/servis/data_servis'));
    }
    //
    public function getDetail($kode)
    {
        $detail     = $this->OrderModel->getDetailOrder($kode)->result();
        $bengkel    = $this->OrderModel->getDetailBengkel($kode)->row();
        $mesin      = $this->OrderModel->getMesin($kode)->row();
        $total      = $this->OrderModel->total($kode)->row();

        $data = [
            'folder'    => 'order',
            'page'      => 'detail_servis',
            'title'     => 'Detail Order Service',
            'bengkel'   => $bengkel,
            'detail'    => $detail,
            'mesin'     => $mesin,
            'total'     => $total
        ];

        $this->load->view('konsumen/templates/index', $data);
    }
    //
    public function review($id)
    {
        $detail  = $this->OrderModel->getDetailBengkel($id)->row();
        $bengkel = $this->Bengkel_model->getById($detail->id_bengkel);

        $data = [
            'folder'    => 'order',
            'page'      => 'review',
            'title'     => 'Review Order',
            'bengkel'   => $bengkel,
            'detail'    => $detail
        ];

        $this->load->view('konsumen/templates/index', $data);
    }
    //
    public function addReview()
    {
        $post       = $this->input->post();
        $session    = $this->session->all_userdata();

        $data = [
            'id_user'       => $session['id'],
            'id_bengkel'    => $post['id_bengkel'],
            'isi'           => $post['isi'],
        ];

        $this->ReviewModel->save($data);
        $this->Kendaraan_model->sukses($post['id_kend']);
        return redirect(site_url('konsumen/servis/data_servis'));
    }
    //
    public function showDetail($kode)
    {
        $detail     = $this->OrderModel->getDetailOrder($kode)->result();

        $data = [
            'folder'    => 'order',
            'page'      => 'detail_selesai',
            'title'     => 'Histori Servis',
            'detail'    => $detail,
        ];

        $this->load->view('konsumen/templates/index', $data);
    }
}
