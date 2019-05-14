<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller
{
    function __construct()
    {
        parent::__construct();        
        $this->load->library('Form_validation');
        $this->load->library('M_db');
		$this->load->model('Client_model','mod_client');
		$this->load->model('Kriteria_model','mod_kriteria');
		$this->load->model('Alternatif_model','mod_alternatif');
		$this->load->library('Ion_auth');
		ceklogin();

    }
    
    function index()
    {
 
    	$sql="SELECT alternatif.id_alternatif,client.id_client,client.nama_client,client.alamat_client, client.no_telpon, alternatif.status FROM alternatif LEFT JOIN client ON alternatif.id_client = client.id_client ";
        $data['data']=$this->m_db->get_query_data($sql);
        $this->template->load('template/backend/dashboard', 'alternatif/alternatif_list', $data);
    }

    function create()
    {
    			
			$id_client=$this->input->post('id_client');
			$kriteria=$this->input->post('kriteria');
			$this->mod_alternatif->alternatif_add($id_client,$kriteria);

			$d2=$this->m_db->get_data('alternatif');
			if(!empty($d2))
			{
				$listClient="";
				foreach($d2 as $r)
				{
					$listClient.=$r->id_client.",";
				}
				$listClient=substr($listClient,0,-1);
				
				$sql="Select * from client Where id_client NOT IN ($listClient)";
				$d['client']=$this->m_db->get_query_data($sql);
				$d['kriteria']=$this->mod_kriteria->kriteria_data();
	        	$this->template->load('template/backend/dashboard', 'alternatif/alternatif_form', $d);
			}else{

	        $d['client']=$this->mod_client->client_data();
	        $d['kriteria']=$this->mod_kriteria->kriteria_data();
	        $this->template->load('template/backend/dashboard', 'alternatif/alternatif_form', $d);
	    }
		
	}

	function hapus()
	{
		$id=$this->input->get('alternatif');
		if($this->mod_alternatif->alternatif_delete($id)==TRUE)
		{
			redirect('alternatif');
		}else{
			redirect('alternatif');
		}
	}
    
}
