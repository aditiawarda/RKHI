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

	public function error()
	{
		$this->session->set_flashdata('failed1', 'Maaf format yang anda masukkan tidak valid atau judul sudah digunakan');
		$data['video_kategori'] = $this->Video_model->show_kategori()->result();
		$this->template->load('template/backend/dashboard', 'video/error', $data);
	}

	public function success()
	{
		$this->session->set_flashdata('success1', 'Video berhasil ditambahkan');
		$data['video_kategori'] = $this->Video_model->show_kategori()->result();
		$this->template->load('template/backend/dashboard', 'video/success', $data);
	}

	public function insert()
	{
		$judul = $this->input->post('judul');
		$kategori = $this->input->post('kategori');
		$nmfile = $judul;

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'mp4|mkv|';
        $config['file_name'] = $nmfile;
        
        $setName = $this->Video_model->getName();
        if($setName->num_rows() > 0){
			$getName = $setName->row_array();
			redirect('Video/error');
		}

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('video')) {
            $error = $this->upload->display_errors();
            /*print_r($error);*/
            redirect('Video/error');
        } else {
            $result = $this->upload->data();
            print_r($result);
        	
        	$data = array(
				'judul' => $nmfile,
				'kategori' => $kategori,
				'file_type' => $result['file_ext']
			);
			$this->Video_model->input_data($data,'video_content');
			redirect('Video/success');
        }
	}

	public function delete()
	{
		$data['video_kategori'] = $this->Video_model->show_content()->result();
		$this->template->load('template/backend/dashboard', 'video/delete', $data);
	}

	public function actionDelete()
	{
		$id = $this->uri->segment(3);
		$setName = $this->Video_model->getVideoName($id);
		if($setName->num_rows() > 0){
			$getName = $setName->row_array();
			$getVideoName = './uploads/'.$getName['judul'].$getName['file_type'];
			$deleteFileContent = unlink($getVideoName);
			if($deleteFileContent){
				$delete = $this->Video_model->delete($id);
				if($delete){
					$this->alertSuccess();
				}else{
					$this->alertFailed();
				}
			}else{
				$this->alertFailed();
			}
		}else{
			$this->alertFailed();
		}
		redirect('Video/delete');
	}

	private function alertSuccess()
	{
		return $this->session->set_flashdata('success', 'Video Berhasil Dihapus');
	}

	private function alertFailed()
	{
		return $this->session->set_flashdata('failed', 'Video Gagal Dihapus');
	}
}
