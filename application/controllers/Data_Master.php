
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
	//ini index
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
		$judul_konten = $this->input->post('judul_konten');
		$isi_konten = $this->input->post('isi_konten');
 
		$data = array(
			'judul_konten' => $judul_konten,
			'isi_konten' => $isi_konten
			);
		$this->DataMaster_Konten->input_data($data,'konten_diskusi');
		redirect('data_master/index');

	}

	public function edit($id){
	$where = array('id_konten' => $id);
	$data['konten_diskusi'] = $this->DataMaster_Konten->edit_data($where,'konten_diskusi')->result();
	$this->load->view('templates/header', $data);
	$this->load->view('templates/sidebar', $data);
	$this->load->view('templates/topbar', $data);
	$this->load->view('forum2/edit_diskusi',$data);
	$this->load->view('templates/footer', $data);
	}

	public function update(){
	$id_konten = $this->input->post('id_konten');
	$judul_konten = $this->input->post('judul_konten');
	$isi_konten = $this->input->post('isi_konten');
 
	$data = array(
		'judul_konten' => $judul_konten,
		'isi_konten' => $isi_konten
	);
 
	$where = array(
		'id_konten' => $id_konten
	);
 
	$this->DataMaster_Konten->update_data($where,$data,'konten_diskusi');
	redirect('data_master/indexdiskusi');
}

	public function chat()
	{
		$name = $this->uri->segment('3');

		$id_konten = $this->input->post('id_konten');
		$isi = $this->input->post('isi');
 
		$data = array(
			'id_konten' => $name,
			'isi' => $isi
			);
		$this->DataMaster_Konten->input_data($data,'chat');
		redirect('data_master/lihat/konten/'.$name);

	}


	public function isidiskusi(){
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('forum2/p_diskusi');
		$this->load->view('templates/footer');
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


