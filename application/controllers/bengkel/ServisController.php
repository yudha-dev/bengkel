<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ServisController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Bengkel_model', 'OrderModel', 'Kendaraan_model'));
        $this->load->library('form_validation');
        $this->_login();
    }
    //
    public function index()
    {
        $session = $this->session->userdata('id');
        $bengkel = $this->Bengkel_model->getIdBengkel($session)->row();
        $id = $bengkel->id_bengkel;

        $servis = $this->OrderModel->getServiceBengkel($id)->result();

        $data = [
            'folder'    => 'servis',
            'page'      => 'data_servis',
            'title'     => 'Data Servis',
            'servis'    => $servis
        ];

        $this->load->view('bengkel/templates/index', $data);
    }
    //detail
    public function getDetail($kode)
    {
        $detail     = $this->OrderModel->getDetailOrder($kode)->result();
        $profil     = $this->OrderModel->getSingleOrder($kode)->row();
        $mesin      = $this->OrderModel->getMesin($kode)->row();

        $data = [
            'folder'    => 'servis',
            'page'      => 'detail_servis',
            'title'     => 'Detail Servis',
            'mesin'     => $mesin,
            'profil'    => $profil,
            'detail'    => $detail
        ];

        $this->load->view('bengkel/templates/index', $data);
    }
    //proses service
    public function verifikasiServis($id)
    {
        $this->Kendaraan_model->prosesServis($id);

        $this->session->set_flashdata('proses', 'Servis Berhasil Di proses');
        redirect(site_url('bengkel/servis/data_servis'));
    }
    //done
    public function selesaiService($id)
    {
        $user = $this->Kendaraan_model->getUserAll($id)->row();
        $this->Kendaraan_model->selesaiServis($id);

        $userkey = 'a859631d94df';
        $passkey = '3f109df052a53eaa3237060a';
        $telepon = $user->telephone;
        $message = 'Hallo, ' . $user->nama . ' Servis anda sudah selesai terimakasih';
        $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $userkey,
            'passkey' => $passkey,
            'to' => $telepon,
            'message' => $message
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);
        $this->session->set_flashdata('selesai', 'Servis selesai');
        redirect(site_url('bengkel/servis/data_servis'));
    }
    //harga mesin
    public function mesin()
    {
        $post = $this->input->post();
        $kode = $post['kode'];
        $data = [
            'harga_mesin'   => preg_replace("/[^0-9\,]/", "", $post['harga_mesin']),
        ];

        $this->OrderModel->hargaMesin($data, $kode);
        $this->session->set_flashdata('harga', 'Harga berhasil di update');
        redirect(site_url('bengkel/servis/data_servis'));
    }
}
