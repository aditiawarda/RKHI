<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model
{
    public $table = 'kirim_email';
    private $tb_client='kirim_email';
    public $id = 'id_email';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->library('m_db');
    }

    function client_data($where=array(),$order="nama_client ASC")
    {
        $d=$this->m_db->get_data($this->tb_client,$where,$order);
        return $d;
    }
    // get all
    public function read()
    {
        return $this->db->get('kirim_email');
    }
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}