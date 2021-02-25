<?php defined('BASEPATH') or exit('No direct script access allowed');

class OrderModel extends CI_Model
{
    private $_table = 'order';
    //get data
    public function getData($id)
    {
        $this->db->select('*');
        $this->db->join('keluhan', 'order.id_kel = keluhan.id_kel');
        $this->db->join('kendaraan', 'order.id_kend = kendaraan.id_kend');
        $this->db->join('user', 'kendaraan.id_user = user.id_user');
        $this->db->join('jenis_kend', 'kendaraan.id_jnskend = jenis_kend.id_jnskend');
        $this->db->join('merk_kend', 'kendaraan.id_merk = merk_kend.id_merk');
        return $this->db->group_by('kode')->get_where($this->_table, ['kendaraan.id_user' => $id]);
    }
    //save data
    public function save($data)
    {
        return $this->db->insert_batch($this->_table, $data);
    }
    //kode
    public function maxCode()
    {
        $this->db->select_max('kode', 'kode');
        return $this->db->get($this->_table);
    }
    //detail order
    public function getDetailOrder($kode)
    {
        $this->db->select('*');
        $this->db->join('keluhan', 'order.id_kel = keluhan.id_kel');
        $this->db->join('bengkel', 'order.id_bengkel = bengkel.id_bengkel');
        $this->db->join('kendaraan', 'order.id_kend = kendaraan.id_kend');
        $this->db->join('jenis_kend', 'kendaraan.id_jnskend = jenis_kend.id_jnskend');
        $this->db->join('merk_kend', 'kendaraan.id_merk = merk_kend.id_merk');
        return $this->db->get_where($this->_table, ['kode' => $kode]);
    }
    //detail order
    public function getDetailBengkel($kode)
    {
        $this->db->select('*');
        $this->db->join('bengkel', 'order.id_bengkel = bengkel.id_bengkel');
        return $this->db->group_by('kode')->get_where($this->_table, ['kode' => $kode]);
    }
    //total
    public function total($kode)
    {
        $this->db->select_sum('harga');
        $this->db->join('keluhan', 'order.id_kel = keluhan.id_kel');
        return $this->db->get_where($this->_table, ['kode' => $kode]);
    }

    //
    public function getServiceBengkel($id)
    {
        $this->db->select('order.alamat as lokasi, nama, tanggal, kendaraan.status, no_plat, kendaraan.id_kend, kode');
        $this->db->join('keluhan', 'order.id_kel = keluhan.id_kel');
        $this->db->join('kendaraan', 'order.id_kend = kendaraan.id_kend');
        $this->db->join('bengkel', 'order.id_bengkel = bengkel.id_bengkel');
        $this->db->join('user', 'kendaraan.id_user = user.id_user');
        $this->db->join('jenis_kend', 'kendaraan.id_jnskend = jenis_kend.id_jnskend');
        $this->db->join('merk_kend', 'kendaraan.id_merk = merk_kend.id_merk');
        $this->db->where_in('kendaraan.status', ['Penjemputan', 'Sedang Service']);
        return $this->db->group_by('kode')->get_where($this->_table, ['order.id_bengkel' => $id]);
    }
    //
    //get data
    public function getSingleOrder($id)
    {
        $this->db->select('*');
        $this->db->join('keluhan', 'order.id_kel = keluhan.id_kel');
        $this->db->join('kendaraan', 'order.id_kend = kendaraan.id_kend');
        $this->db->join('user', 'kendaraan.id_user = user.id_user');
        $this->db->join('jenis_kend', 'kendaraan.id_jnskend = jenis_kend.id_jnskend');
        $this->db->join('merk_kend', 'kendaraan.id_merk = merk_kend.id_merk');
        $this->db->join('tipe_kend', 'kendaraan.id_tipe = tipe_kend.id_tipe');
        return $this->db->group_by('kode')->get_where($this->_table, ['kode' => $id]);
    }
    //detail order
    public function getMesin($kode)
    {
        $this->db->select('*');
        return $this->db->group_by('kode')->get_where($this->_table, ['kode' => $kode]);
    }
    //save harga
    public function hargaMesin($data, $kode)
    {
        $this->db->where('kode', $kode);
        $this->db->update($this->_table, $data);
    }
    //get order
    public function getHistory($id)
    {
        $this->db->select('order.alamat as lokasi, nama, tanggal, kendaraan.status, no_plat, kendaraan.id_kend, kode');
        $this->db->join('keluhan', 'order.id_kel = keluhan.id_kel');
        $this->db->join('kendaraan', 'order.id_kend = kendaraan.id_kend');
        $this->db->join('bengkel', 'order.id_bengkel = bengkel.id_bengkel');
        $this->db->join('user', 'kendaraan.id_user = user.id_user');
        $this->db->join('jenis_kend', 'kendaraan.id_jnskend = jenis_kend.id_jnskend');
        $this->db->join('merk_kend', 'kendaraan.id_merk = merk_kend.id_merk');
        $this->db->where('kendaraan.status', 'Selesai');
        return $this->db->group_by('kode')->get_where($this->_table, ['order.id_bengkel' => $id]);
    }
}
