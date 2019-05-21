<?php

class Book_model extends CI_Model{

      public function show_kategori()
      {
            return $this->db->get('video_kategori');
      }

      public function show_content()
      {
            return $this->db->get('book_resource');
      }
      
      public function input_data($data,$table){
            $this->db->insert($table,$data);
      }

      public function show_book(){
            return $this->db->get('book_resource');
      }

      public function getBookName($id)
      {     
            $this->db->where('id', $id);
            $query = $this->db->get('book_resource');
            return $query;
      }

      public function getName()
      {
            return $this->db->get('book_resource');
      }

      public function delete($id)
      {
            return $this->db->delete('book_resource', ['id' => $id]);
      }

}