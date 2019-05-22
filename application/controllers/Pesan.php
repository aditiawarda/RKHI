<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();        
        $this->load->library('Form_validation');
        $this->load->library('M_db');
        $this->load->model('Email_model');
        $this->load->model('Video_model');                          //
		$this->load->model('Client_model','mod_client');
		$this->load->model('Kriteria_model','mod_kriteria');
		$this->load->model('Alternatif_model','mod_alternatif');
		$this->load->library('Ion_auth');
		ceklogin();

    }
    

    public function index()
    {
    	$data['kirim_email'] = $this->Email_model->read()->result();
		$this->template->load('template/backend/dashboard', 'pesan/pesan_list', $data);
    }
    public function balas($id)
    {   
        $where = array('id_email' => $id);
		$data['kirim_email'] = $this->Email_model->edit($where,'kirim_email')->result();
        $this->template->load('template/backend/dashboard', 'pesan/pesan_balas', $data);
    }

    public function send()
    {
        $to =  $this->input->post('from');  // User email pass here
        $subject = 'Balasan dari Rumah Konsultasi Hukum Islam';

        $from = 'melektechnology@gmail.com';              // Pass here your mail id

        // ini gambar atas
        $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#000000;padding-left:3%"><img src="header-email.jpg" width="300px" vspace=10 /></td></tr>';
        $emailContent .='<tr><td style="height:20px"></td></tr>';


        $emailContent .= $this->input->post('message');  //   Post message available here

        // ini footer
        $emailContent .='<tr><td style="height:20px"></td></tr>';
        $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://uinsgd.ac.id/' target='_blank' style='text-decoration:none;color: #60d2ff;'>www.uinsgd.ac.id</a></p></td></tr></table></body></html>";
                    

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => '465',
            'smtp_timeout' => '60',
            'smtp_user' => 'melektechnology@gmail.com',
            'smtp_pass' => 'qv32xy67t5',
            'charset' => 'utf-8',
            'newline' => "\r\n",
            'mailtype' => 'html',
            'validation' => TRUE
        ); 
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->from($from);                  //email dari.
        $this->email->to($to);                      //email untuk.
        $this->email->subject($subject);            //subject email.
        $this->email->message($emailContent);       //isi pesan email.
        $this->email->send();

        $this->session->set_flashdata('msg',"Mail has been sent successfully");
        $this->session->set_flashdata('msg_class','alert-success');
        return redirect('pesan/index');
    }

}
