<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {
	function __construct() {
        parent::__construct();        
        $this->load->library('Form_validation');
      	$this->load->library('M_db');
        $this->load->model('Book_model');
		$this->load->model('Client_model','mod_client');
		$this->load->model('Kriteria_model','mod_kriteria');
		$this->load->model('Alternatif_model','mod_alternatif');
		$this->load->library('Ion_auth');
		ceklogin();
    }

    public function index() {
    	$data = array();
        
        //get files from database
        $data['book_resource'] = $this->Book_model->getRows();
        
        //load the view
        $this->template->load('template/backend/dashboard', 'book/index', $data);
	}

	public function insert() {
		$judul = $this->input->post('judul');
		$kategori = $this->input->post('kategori');
		$nmfile = $judul;

        $config['upload_path'] 		= './uploads/books';
        $config['allowed_types'] 	= 'pdf';
        $config['max_size']			= 0;
        $config['file_name'] 		= $nmfile;
        
  //       $setName = $this->Book_model->getName();
  //       if($setName->num_rows() > 0){
		// 	$getName = $setName->row_array();
		// 	redirect('Book/error');
		// }

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('book')) {
            $error = $this->upload->display_errors();
			//            $error = array('error' =>$this->upload->display_errors());
            /*print_r($error);*/
            redirect('Book/error');
        } else {
            $result = $this->upload->data();
            //print_r($result);
        	
        	$data = array(
				'judul' => $nmfile,
				'kategori' => $kategori,
				'file_type' => $result['file_name']
			);
			$this->Book_model->input_data($data,'book_resource');
			redirect('Book/success');
        }
	}

	// Tampilkan Pesan Error
	public function error(){
		$this->session->set_flashdata('failed1', 'Maaf format yang anda masukkan tidak valid atau judul sudah digunakan');
		$data['video_kategori'] = $this->Book_model->show_kategori()->result();
		$this->template->load('template/backend/dashboard', 'book/error', $data);
	}

	// Tampilkan Pesan Sukses
	public function success(){
		$this->session->set_flashdata('success1', 'Dokument berhasil ditambahkan');
		$data['video_kategori'] = $this->Book_model->show_kategori()->result();
		$this->template->load('template/backend/dashboard', 'book/success', $data);
	}

	// Function insert buku
	public function masukan() {
		$data['video_kategori'] = $this->Book_model->show_kategori()->result();
		$this->template->load('template/backend/dashboard', 'book/upload', $data, array('error' =>' '));
	}

	// Function Download
	public function download($id){
        if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
            $fileInfo = $this->Book_model->getRows(array('id' => $id));
            
            //file path
            $file = 'uploads/books/'.$fileInfo['file_type'];
            
            //download file from directory
            force_download($file, NULL);
        }
    }

    public function delete()
	{
		$data['video_kategori'] = $this->Book_model->show_content()->result();
		$this->template->load('template/backend/dashboard', 'book/delete', $data);
	}

	public function actionDelete()
	{
		$id = $this->uri->segment(3);
		$setName = $this->Book_model->getBookName($id);
		if($setName->num_rows() > 0){
			$getName = $setName->row_array();
			$getBookName = './uploads/books'.$getName['judul'].$getName['file_type'];
			$deleteFileContent = unlink($getBookName);
			if($delete){
				$this->session->set_flashdata('failed', 'Resource Gagal Dihapus');
			}else{
				$delete = $this->Book_model->delete($id);
				$this->session->set_flashdata('success', 'Resource Berhasil Dihapus');
			}
		}else{
			$this->session->set_flashdata('failed', 'Resource Gagal Dihapus');
		}
		redirect('book/delete');
	}
}