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

      // Tampilkan data buku
      public function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('book_resource');
        $this->db->order_by('id','desc');
        if(array_key_exists('id',$params) && !empty($params['id'])){
            $this->db->where('id',$params['id']);
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }
        //return fetched data
        return $result;
    }
}