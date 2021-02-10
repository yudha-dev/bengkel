
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view("login/login");
    }

    function admin()
    {
        $this->load->view("login/adm_login");
    }

    function auth()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        $level = $this->input->post('level');

        $cek = $this->Auth_model->cek($user, $pass);
        $val_cek = $cek->num_rows();
        $view_cek = $cek->row_array();

        if ($val_cek > 0) {
            if ($level == 'Konsumen') {
                if ($pass == $view_cek['password']) {
                    $data = [
                        'id' => $view_cek['id_user'],
                        'nama' => $view_cek['nama'],
                        'username' => $view_cek['username'],
                        'password' => $view_cek['password'],
                        'email' => $view_cek['email'],
                        'level' => $view_cek['level']
                    ];
                    $this->session->set_userdata($data);
                    redirect('konsumen', 'refresh');
                } else {
                    echo 'Login gagal';
                }
            } elseif ($level == 'Bengkel') {
                if ($pass == $view_cek['password']) {
                    $data = [
                        'id' => $view_cek['id_user'],
                        'nama' => $view_cek['nama'],
                        'username' => $view_cek['username'],
                        'password' => $view_cek['password'],
                        'email' => $view_cek['email'],
                        'level' => $view_cek['level']
                    ];
                    $this->session->set_userdata($data);
                    redirect('bengkel', 'refresh');
                } else {
                    echo 'Login gagal';
                }
            }
        } else {
            echo 'Data Tidak diteukan';
        }
    }

    function superadmin()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        $cek = $this->Auth_model->cek($user, $pass);
        $val_cek = $cek->num_rows();
        $view_cek = $cek->row_array();
        if ($val_cek > 0) {
            if ($pass == $view_cek['password']) {
                $data = [
                    'id' => $view_cek['id_user'],
                    'id_bengkel' => $view_cek['id_bengkel'],
                    'nama' => $view_cek['nama'],
                    'username' => $view_cek['username'],
                    'password' => $view_cek['password'],
                    'email' => $view_cek['email'],
                    'level' => $view_cek['level']
                ];
                $this->session->set_userdata($data);
                redirect('admin', 'refresh');
            } else {
                echo 'Login gagal';
            }
        } else {
            echo 'Data tidak ditemukan';
        }
    }

    function register_kons()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'this email has already registered!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view("login/register_kons");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat ! akun anda sudah terdaftar. Silahkan Login
          </div');

            redirect('auth');
        }
    }
    function register_beng()
    {
        $this->form_validation->set_rules('nama', 'Nama Pemilik', 'required|trim');
        $this->form_validation->set_rules('namabengkel', 'namabengkel', 'required|trim');
        // $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
        //     'is_unique' => 'this email has already registered!'
        // ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('telephone', 'Telephone', 'required|trim');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');

        if ($this->form_validation->run() == false) {
            $this->load->view("login/register_beng");
        } else {
            $x = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'level' => 'Bengkel',
            ];
            $this->db->insert('user', $x);
            $id_u = $this->db->query("SELECT id_user FROM user WHERE nama='$nama' AND email='$email'")->row()->id_user;

            $data = [
                'id_user' => $id_u,
                'pemilik' => $this->input->post('nama'),
                'namabengkel' => $this->input->post('namabengkel'),
                'email' => $this->input->post('email'),
                'id_jenis' => $this->input->post('jenis_bengkel'),
                'alamat' => $this->input->post('alamat'),
                'telephone' => $this->input->post('telephone')
            ];
            $this->db->insert('bengkel', $data);
            // $this->session->set_flashdata('message', '<div class="alert alert-successz" role="alert">Pendaftaran berhasil ! silahkan verifikasi di email anda.</div');
            echo $this->session->set_flashdata('msg', 'info');


            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        $this->session->sess_destroy();
        redirect('auth');
    }
}

/* End of file Controllername.php */
