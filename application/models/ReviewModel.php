<?php defined('BASEPATH') or exit('No direct script access allowed');

class ReviewModel extends CI_Model
{
    private $_table = 'review';
    //get
    public function getAll($id)
    {
        $this->db->select('*');
        $this->db->join('user', 'review.id_user = user.id_user');
        $this->db->join('bengkel', 'review.id_bengkel = bengkel.id_bengkel');
        return $this->db->get_where($this->_table, ['review.id_bengkel' => $id]);
    }
    //save data
    public function save($data)
    {
        //INSERT INTO kategori
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }
}
