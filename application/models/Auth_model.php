
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    function cek($user, $pass)
    {
        return $this->db->query("SELECT * FROM user WHERE username='$user' and password='$pass'");
    }
}

/* End of file Auth_model.php */
