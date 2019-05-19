<?php

class Video_model extends CI_Model{

      public function show_kategori()
      {
      	return $this->db->get('video_kategori');
      }
      
      public function input_data($data,$table){
      	$this->db->insert($table,$data);
      }

}