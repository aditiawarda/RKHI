<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller
{

	function __construct()
    {
        parent::__construct();
        $this->load->model('Frontend_model','fm');
        $this->load->model('Kriteria_model','mod_kriteria');
        $this->load->model("Email_model");
        $this->load->library('Form_validation');
		$this->load->library('M_db');
        $this->load->model('Video_model');

    }

    public function index(){
    	//$this->load->view('welcome_message');
    	$this->template->load('template/frontend/home', 'frontend/home');
    }

    public function galeri(){
    	//$this->load->view('welcome_message');
        $data['video_content'] = $this->Video_model->show_video()->result();
        $this->template->load('template/frontend/home', 'frontend/galeri', $data);
    }

    public function forumdiskusi(){
        $this->template->load('template/frontend/home', 'forumdiskusi/forumdiskusi');
    }
    // public function create()
    // {
    //     $data = array(
    //         'button' => 'Create',
    //         'id_email' => set_value('id_email'),
    //         'nama_depan' => set_value('nama_depan'),
    //         'nama_belakang' => set_value('nama_belakang'),
    //         'email' => set_value('email'),
    //         'subject' => set_value('subject'),
    //         'pesan' => set_value('pesan')
    //     );

    //     $this->template->load('template/frontend/home', 'frontend/home', $data);
    // }

    

}
