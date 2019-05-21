<?php

class Video_model extends CI_Model{

      public function show_kategori()
      {
      	return $this->db->get('video_kategori');
      }

      public function show_content()
      {
      	return $this->db->get('video_content');
      }
      
      public function input_data($data,$table){
      	$this->db->insert($table,$data);
      }

      public function show_video(){
            return $this->db->get('video_content');
      }

      public function getVideoName($id)
      {     
            $this->db->where('id', $id);
            $query = $this->db->get('video_content');
            return $query;
      }

      public function getName()
      {
            return $this->db->get('video_content');
      }

      public function delete($id)
      {
            return $this->db->delete('video_content', ['id' => $id]);
      }

}