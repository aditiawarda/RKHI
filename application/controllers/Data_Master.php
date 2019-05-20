<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Master extends CI_Controller
{
		function __construct(){
		parent::__construct();		
		$this->load->model('DataMaster_Konten');
		$this->md_konten = $this->DataMaster_Konten;
                $this->load->helper('url');
	}
 
	function index(){
		$data['list_konten'] = $this->DataMaster_Konten->list_all()->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('forum2/index',$data);
		$this->load->view('templates/footer', $data);
	}
	public function lihat()
	{

		if (empty($this->uri->segment('3'))) {
			redirect(base_url());
		}

		if (empty($this->uri->segment('4'))) {
			redirect(base_url());
		}

		$name = $this->uri->segment('3');
		$id = $this->uri->segment('4');

		switch ($name) {
			
			case 'konten':
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$id_konten = $this->security->xss_clean($this->input->post('id_konten'));
					$judul_konten = $this->security->xss_clean($this->input->post('judul_konten'));
					$isi_konten = $this->security->xss_clean($this->input->post('isi_konten'));
					// validasi
					$this->form_validation->set_rules('id_konten', 'ID Instansi', 'required');
					$this->form_validation->set_rules('judul_konten', 'Judul Konten');
					$this->form_validation->set_rules('isi_konten', 'Isi Konten');
				}
				$data['id_konten'] = $this->md_konten->get_data($id)->id_konten;
				$data['judul_konten'] = $this->md_konten->get_data($id)->judul_konten;
				$data['isi_konten'] = $this->md_konten->get_data($id)->isi_konten;
				break;
			
			

			default:
				redirect(base_url('data_master'));
				break;
		}

		$data['id'] = $id;
		$data['name'] = $name;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('forum2/chatting',$data);
		$this->load->view('templates/footer', $data);
	}
	public function lihatkomentar($id)
	{

		$data['list_konten'] = $this->DataMaster_Konten->list_chat($id)->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('forum2/allchatting',$data);
		$this->load->view('templates/footer', $data);
	}
	public function addnew()
	{
		$judul_diskusi = $this->input->post('judul_diskusi');
		$isi_diskusi = $this->input->post('isi_diskusi');
 
		$data = array(
			'judul_diskusi' => $judul_diskusi,
			'isi_diskusi' => $isi_diskusi
			);
		$this->DataMaster_Konten->input_data($data,'konten_diskusi')->result();
		redirect('data_master/index');

}
	function indexdiskusi(){
		$data['list_konten'] = $this->DataMaster_Konten->list_all()->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('forum2/diskusi',$data);
		$this->load->view('templates/footer', $data);
	}
	public function delete()
	{

		if (empty($this->uri->segment('3'))) {
			redirect(base_url());
		}

		if (empty($this->uri->segment('4'))) {
			redirect(base_url());
		}

		$name = $this->uri->segment('3');
		$id = $this->uri->segment('4');

		switch ($name) {
			case 'konten':
				$this->md_konten->delete($id);
				$this->session->set_flashdata('msg_alert', 'Data mahasiswa berhasil dihapus');
				redirect(base_url('data_master/indexdiskusi'));
				break;

			default:
				redirect(base_url());
				break;
		}
	}
}


