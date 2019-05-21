<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMaster_Konten extends CI_Model {

	public function addnew($id,$name) {
		$d_t_d = array(
			'judul_konten' => $id,
			'isi_konten' => $name
		);
		$this->db->insert('konten_diskusi', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Berhasil Komentar');
	}
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}

	public function get_data($id) {
		$q=$this->db->select('*')->from('konten_diskusi')->where('id_konten', $id)->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/') );
		}
		return $q->row();
	}
	public function list_chat($id){
		return $this->db->select('*')->from('chat')->where('id_konten', $id)->get();
		
		
	}
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
	
	public function list_all(){
		return $this->db->get('konten_diskusi');
	}
	public function delete($id) {
		$q=$this->db->select('*')->from('konten_diskusi')->where('id_konten', $id)->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/') );
		}
		$this->db->delete('konten_diskusi', array('id_konten' => $id));
	}
	
}

/* End of file DataMaster_Mahasiswa.php */
/* Location: ./application/models/DataMaster_Mahasiswa.php */