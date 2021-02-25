<?php

defined('BASEPATH') or exit('No direct script access allowed');

class HistoriServisController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('OrderModel', 'Bengkel_model'));
        $this->load->library('form_validation');
        $this->_login();
    }

    public function index()
    {
        $session = $this->session->userdata('id');

        $bengkel = $this->Bengkel_model->getIdBengkel($session)->row();
        $id      = $bengkel->id_bengkel;

        $servis = $this->OrderModel->getHistory($id)->result();

        $data = [
            'folder'    => 'servis',
            'page'      => 'histori',
            'title'     => 'Data Histori Servis',
            'servis'    => $servis
        ];

        $this->load->view('bengkel/templates/index', $data);
    }
}
