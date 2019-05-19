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
				redirect(base_url());
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

		if (empty($this->uri->segment('3'))) {
			redirect(base_url());
		}

		$name = 'konten';

		switch ($name) {
			
			case 'konten':
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$judul_diskusi = $this->security->xss_clean($this->input->post('judul_diskusi'));
					$isi_diskusi = $this->security->xss_clean($this->input->post('isi_diskusi'));

					// validasi
					$this->form_validation->set_rules('judul_diskusi', 'Judul Diskusi');
					$this->form_validation->set_rules('isi_diskusi', 'Isi Diskusi');
					if (!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', 'Gagal membuat data instansi baru');
						redirect(base_url('data_master/addnew/' . $name));
					}
					// to-do
					$this->md_konten->add_new($judul_diskusi, $isi_diskusi);
					redirect(base_url('data_master/indexdiskusi'));
				}
				break;

			default:
				redirect(base_url());
				break;
		}

		$data['name'] = $name;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('forum2/p_diskusi', $data);
		$this->load->view('templates/footer', $data);

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


