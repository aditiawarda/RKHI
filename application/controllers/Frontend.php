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

    }

    public function index(){
    	//$this->load->view('welcome_message');
    	$this->template->load('template/frontend/home', 'frontend/home');
    }

    public function galeri(){
    	//$this->load->view('welcome_message');
    	$this->template->load('template/frontend/home', 'frontend/galeri');
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

    public function create() 
    {

            $data = array(
                'nama_depan' => $this->input->post('nama_depan',TRUE),
                'nama_belakang' => $this->input->post('nama_belakang',TRUE),
                'email' => $this->input->post('email',TRUE),
                'subject' => $this->input->post('subject',TRUE),
                'pesan' => $this->input->post('pesan',TRUE),
	    );

            $this->Email_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
           
        
    }

}
