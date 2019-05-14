<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Client extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Client_model');
        $this->load->library('Form_validation');
        $this->load->library('Ion_auth');
        ceklogin();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'client/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'client/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'client/index.html';
            $config['first_url'] = base_url() . 'client/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Client_model->total_rows($q);
        $client = $this->Client_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'client_data' => $client,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template/backend/dashboard', 'client/client_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Client_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_client' => $row->id_client,
		'nama_client' => $row->nama_client,
		'alamat_client' => $row->alamat_client,
		'no_telpon' => $row->no_telpon,
	    );
            $this->template->load('template/backend/dashboard', 'client/client_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('client'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('client/create_action'),
	    'id_client' => set_value('id_client'),
	    'nama_client' => set_value('nama_client'),
	    'alamat_client' => set_value('alamat_client'),
	    'no_telpon' => set_value('no_telpon'),
	);
        $this->template->load('template/backend/dashboard', 'client/client_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_client' => $this->input->post('nama_client',TRUE),
		'alamat_client' => $this->input->post('alamat_client',TRUE),
		'no_telpon' => $this->input->post('no_telpon',TRUE),
	    );

            $this->Client_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('client'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Client_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('client/update_action'),
		'id_client' => set_value('id_client', $row->id_client),
		'nama_client' => set_value('nama_client', $row->nama_client),
		'alamat_client' => set_value('alamat_client', $row->alamat_client),
		'no_telpon' => set_value('no_telpon', $row->no_telpon),
	    );
            $this->template->load('template/backend/dashboard', 'client/client_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('client'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_client', TRUE));
        } else {
            $data = array(
		'nama_client' => $this->input->post('nama_client',TRUE),
		'alamat_client' => $this->input->post('alamat_client',TRUE),
		'no_telpon' => $this->input->post('no_telpon',TRUE),
	    );

            $this->Client_model->update($this->input->post('id_client', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('client'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Client_model->get_by_id($id);

        if ($row) {
            $this->Client_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('client'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('client'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_client', 'nama client', 'trim|required');
	$this->form_validation->set_rules('alamat_client', 'alamat client', 'trim|required');
	$this->form_validation->set_rules('no_telpon', 'no telpon', 'trim|required');

	$this->form_validation->set_rules('id_client', 'id_client', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "client.xls";
        $judul = "client";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Client");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Client");
	xlsWriteLabel($tablehead, $kolomhead++, "No Telpon");

	foreach ($this->Client_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_client);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kepsek);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_client);
	    xlsWriteLabel($tablebody, $kolombody++, $data->visi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->misi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_telpon);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file client.php */
/* Location: ./application/controllers/client.php */