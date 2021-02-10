<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan_model extends CI_Model
{
    private $_table = "kendaraan";

    public $id_kend;
    public $jenis_kend;
    public $merk;
    public $tipe;
    public $tahun;
    public $no_plat;


    public function rules()
    {
        return [
            [
                'field' => 'jenis_kend',
                'label' => 'Jenis Kendaraan',
                'rules' => 'required'
            ],

            [
                'field' => 'merk',
                'label' => 'Merk',
                'rules' => 'required'
            ],

            [
                'field' => 'tipe',
                'label' => 'Tipe',
                'rules' => 'required'
            ],

            [
                'field' => 'tahun',
                'label' => 'Tahun',
                'rules' => 'required'
            ],

            [
                'field' => 'no_plat',
                'label' => 'No. Plat',
                'rules' => 'required'
            ]
        ];
    }
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getkend($id)
    {
        return $this->db->query("SELECT * FROM kendaraan WHERE id_user='$id'")->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kend" => $id])->row();
    }
    public function save($x)
    {

        return $this->db->insert($this->_table, $x);
    }
    public function update()
    {
        $post = $this->input->post();
        $up = [
            'id_jnskend' => $post['jenis_kend'],
            'id_merk' => $post['merk'],
            'id_tipe' => $post['tipe'],
            'tahun' => $post['tahun'],
            'no_plat' => $post['no_plat']
        ];

        $this->db->where('id_kend', $post['id']);
        $this->db->update('kendaraan', $up);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_kend" => $id));
    }

    //new
    public function kendaraan($id)
    {
        $this->db->select('*');
        $this->db->join('user', 'kendaraan.id_user = user.id_user');
        $this->db->join('jenis_kend', 'kendaraan.id_jnskend = jenis_kend.id_jnskend');
        $this->db->join('merk_kend', 'kendaraan.id_merk = merk_kend.id_merk');
        $this->db->join('tipe_kend', 'kendaraan.id_tipe = tipe_kend.id_tipe');
        return $this->db->get_where($this->_table, ['kendaraan.id_user' => $id, 'kendaraan.status' => 'Order']);
    }
    //
    public function getDataKendaraan($id)
    {
        return $this->db->get_where($this->_table, ['id_kend' => $id]);
    }
    //
    public function getUser($id)
    {
        $this->db->select('*');
        $this->db->join('user', 'kendaraan.id_user = user.id_user');
        $this->db->join('jenis_kend', 'kendaraan.id_jnskend = jenis_kend.id_jnskend');
        return $this->db->get_where($this->_table, ['kendaraan.id_kend' => $id]);
    }
    //
    public function getUpdate($id)
    {
        $this->db->where('id_kend', $id);
        $this->db->update($this->_table, ['status' => 'Penjemputan']);
    }
    //proses
    public function prosesServis($id)
    {
        $this->db->where('id_kend', $id);
        $this->db->update($this->_table, ['status' => 'Sedang Service']);
    }
    //review
    public function selesaiServis($id)
    {
        $this->db->where('id_kend', $id);
        $this->db->update($this->_table, ['status' => 'Review']);
    }
    //sukses
    public function sukses($id)
    {
        $this->db->where('id_kend', $id);
        $this->db->update($this->_table, ['status' => 'Selesai']);
    }
    //
    public function getUserAll($id)
    {
        $this->db->select('*');
        $this->db->join('user', 'kendaraan.id_user = user.id_user');
        $this->db->join('konsumen', 'konsumen.id_user = user.id_user');
        $this->db->join('jenis_kend', 'kendaraan.id_jnskend = jenis_kend.id_jnskend');
        return $this->db->get_where($this->_table, ['kendaraan.id_kend' => $id]);
    }
}
