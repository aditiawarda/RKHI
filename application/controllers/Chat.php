<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();        
        $this->load->library('Form_validation');
        $this->load->library('M_db');
        $this->load->model('Email_model');
        $this->load->model('Video_model');
        $this->load->model('Chat_model');
		$this->load->model('Client_model','mod_client');
		$this->load->model('Kriteria_model','mod_kriteria');
		$this->load->model('Alternatif_model','mod_alternatif');
		$this->load->library('Ion_auth');
    }
    

    public function index()
    {
    	$data['kirim_email'] = $this->Email_model->read()->result();
		$this->template->load('template/backend/dashboard', 'chat/chat_private', $data);
    }
    

}
