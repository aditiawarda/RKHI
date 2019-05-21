<?php
	if(defined('BASEPATH'))
		exit('NO direct script access allowed');
	class Email extends CI_controler
	{
		function__construct()
	{
		parent::__construct();
		$this->load->model('Email-model');
	}
	public function index()
	{
//		$this->template->load('template/frontent/home', 'frontend/galeri');
		$this->load->view('template/frontend/home');

	}
	public function create()
	{
		$nama_depan=$this->input->post('nama_depan');
		$nama_belakang=$this->input->post('nama_belakang');
		$email=$this->input->post('email');
		$subject=$this->input->post('subject');
		$pesan=$this->input->post('pesan');

		$data=array(
			'nama_depan'=> $nama_depan,
			'nama_belakang'=> $nama_belakang,
			'email'=>$email,
			'subject'=>$subject,
			'pesan'=>$pesan
		);
		$this->Email_model->insert($data);
		
	}
}