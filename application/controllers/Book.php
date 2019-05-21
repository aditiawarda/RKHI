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
    	$data['video_kategori'] = $this->Book_model->show_kategori()->result();
		$this->template->load('template/backend/dashboard', 'book/upload', $data);
	}

	public function insert() {
		$judul = $this->input->post('judul');
		$kategori = $this->input->post('kategori');
		$nmfile = $judul;

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf';
        $config['file_name'] = $nmfile;
        
        $setName = $this->Book_model->getName();
        if($setName->num_rows() > 0){
			$getName = $setName->row_array();
			redirect('Book/error');
		}

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('book')) {
            $error = $this->upload->display_errors();
            /*print_r($error);*/
            redirect('Book/error');
        } else {
            $result = $this->upload->data();
            print_r($result);
        	
        	$data = array(
				'judul' => $nmfile,
				'kategori' => $kategori,
				'file_type' => $result['file_ext']
			);
			$this->Book_model->input_data($data,'book_resource');
			redirect('Book/success');
        }
	}

		public function error(){
			$this->session->set_flashdata('failed1', 'Maaf format yang anda masukkan tidak valid atau judul sudah digunakan');
			$data['video_kategori'] = $this->Book_model->show_kategori()->result();
			$this->template->load('template/backend/dashboard', 'book/error', $data);
	}

	public function success(){
		$this->session->set_flashdata('success1', 'Video berhasil ditambahkan');
		$data['video_kategori'] = $this->Book_model->show_kategori()->result();
		$this->template->load('template/backend/dashboard', 'book/success', $data);
	}
}