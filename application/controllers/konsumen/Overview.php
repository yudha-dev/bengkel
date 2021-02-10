<?php

class Overview extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [
			'folder'    => '',
			'page'      => 'overview',
			'title'     => 'Dashboard',
		];

		$this->load->view('konsumen/templates/index', $data);
	}
}
