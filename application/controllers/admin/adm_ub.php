<?php

defined('BASEPATH') or exit('No direct script access allowed');

class adm_ub extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("ub_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["user"] = $this->ub_model->getlevel();
        $this->load->view("admin/ub_list", $data);
    }
}
