<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller
{
    function __construct()
    {
        parent::__construct();        
        $this->load->library('Form_validation');
        $this->load->library('M_db');
        $this->load->model('Video_model');
		$this->load->model('Client_model','mod_client');
		$this->load->model('Kriteria_model','mod_kriteria');
		$this->load->model('Alternatif_model','mod_alternatif');
		$this->load->library('Ion_auth');
		ceklogin();

    }
    

    public function index()
    {
    	$data['video_kategori'] = $this->Video_model->show_kategori()->result();
		$this->template->load('template/backend/dashboard', 'video/upload', $data);
	}

	public function insert()
	{
		$judul = $this->input->post('judul');
		$kategori = $this->input->post('kategori');

		$data = array(
			'judul' => $judul,
			'kategori' => $kategori
			);

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'mkv|mp4|';
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('video')) {
            $error = $this->upload->display_errors();
            print_r($error);
        } else {
            $result = $this->upload->data();
            print_r($result);
			$this->Video_model->input_data($data,'video_content');
			redirect('admin/Dashboard');
        }
	}

	public function delete()
	{
		$data['video_kategori'] = $this->Video_model->show_kategori()->result();
		$this->template->load('template/backend/dashboard', 'video/upload', $data);
	}
    
}
