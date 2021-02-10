<?php ob_start();

defined('BASEPATH') or exit('No direct script access allowed');

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
// require 'vendor/autoload.php';

class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pendaftaran_model");
        $this->load->library('form_validation');
        $this->_login();
    }
    public function index()
    {
        $id = $this->session->userdata('id');
        $val = $this->db->query("SELECT * FROM user where id_user='$id'")->row_array();
        if ($val['level'] == 'Superadmin') {
            $data["bengkel"] = $this->pendaftaran_model->getAll();
            $this->load->view("admin/pendaftaran/list", $data);
        } else {
            $data["bengkel"] = $this->pendaftaran_model->getAll($id);
            $this->load->view("admin/pendaftaran/list", $data);
        }
    }
    public function terima($id)
    {
        $this->db->query("UPDATE bengkel set status= 'AKTIF' WHERE id_bengkel='$id'");
        $y = $this->db->query("SELECT * FROM bengkel where id_bengkel='$id'")->row_array();
        $this->db->query("UPDATE user set username= '$y[email]', password='12345' WHERE id_user='$y[id_user]'");


        redirect('admin/pendaftaran', 'refresh');
    }


    public function tidak($id)
    {
        $this->db->query("UPDATE bengkel set status= 'NONAKTIF' WHERE id_bengkel='$id'");

        redirect('admin/pendaftaran', 'refresh');
    }
}
