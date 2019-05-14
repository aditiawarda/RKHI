<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Client_model extends CI_Model
{

    public $table = 'client';
    private $tb_client='client';
    public $id = 'id_client';
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
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_client', $q);
	$this->db->or_like('nama_client', $q);
	$this->db->or_like('alamat_client', $q);
	$this->db->or_like('no_telpon', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_client', $q);
	$this->db->or_like('nama_client', $q);
	$this->db->or_like('alamat_client', $q);
	$this->db->or_like('no_telpon', $q);
	$this->db->limit($limit, $start);
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

/* End of file client_model.php */
/* Location: ./application/models/client_model.php */