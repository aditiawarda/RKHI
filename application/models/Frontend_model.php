<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Frontend_model extends CI_Model
{	
    function __construct()
    {
    	parent::__construct(); 
    	
    }
    
    function tampilkan_data(){
    	// $sql = " SELECT
					// alternatif.status,
					// alternatif.total,
					// client.nama_client,
					// client.alamat_client,
					// client.id_client,
					// alternatif.id_client,
					// alternatif.id_alternatif
					// FROM
					// alternatif
					// INNER JOIN client ON client.id_client = alternatif.id_client ORDER BY total DESC ";
    	$sql = " SELECT
					alternatif.status,
					alternatif.total,
					client.nama_client,
					client.alamat_client,
					client.id_client,
					alternatif.id_client,
					alternatif.id_alternatif
					FROM
					alternatif
					INNER JOIN client ON client.id_client = alternatif.id_client ORDER BY total DESC ";
    	return $this->db->query($sql);
    }

    function tampilkan_detail($id_client){
  		// $param = array('id_client' =>$id_client);
		// return $this->db->get_where('client', $param);
		$sql = " SELECT
					alternatif_nilai.id_alternatif_nilai,
					alternatif_nilai.id_alternatif,
					alternatif_nilai.id_kriteria,
					alternatif_nilai.id_subkriteria,
					alternatif.id_alternatif,
					alternatif.id_client,
					alternatif.status,
					alternatif.total,
					kriteria.id_kriteria,
					kriteria.nama_kriteria,
					subkriteria.id_subkriteria,
					subkriteria.nama_subkriteria,
					subkriteria.id_kriteria,
					client.id_client,
					client.nama_client,
					client.alamat_client,
					client.no_telpon
					FROM
					alternatif_nilai
					INNER JOIN alternatif ON alternatif_nilai.id_alternatif = alternatif.id_alternatif
					INNER JOIN kriteria ON alternatif_nilai.id_kriteria = kriteria.id_kriteria
					INNER JOIN subkriteria ON kriteria.id_kriteria = subkriteria.id_kriteria AND alternatif_nilai.id_subkriteria = subkriteria.id_subkriteria
					INNER JOIN client ON alternatif.id_client = client.id_client
					WHERE client.id_client = '$id_client'
				 ";
				 return $this->db->query($sql);

    }

    function detail_kriteria($id_client)
    {
    	$sql = " SELECT
					alternatif_nilai.id_alternatif_nilai,
					alternatif_nilai.id_alternatif,
					alternatif_nilai.id_kriteria,
					alternatif_nilai.id_subkriteria,
					alternatif.id_alternatif,
					alternatif.id_client,
					alternatif.status,
					alternatif.total,
					kriteria.id_kriteria,
					kriteria.nama_kriteria,
					subkriteria.id_subkriteria,
					subkriteria.nama_subkriteria,
					subkriteria.id_kriteria,
					client.id_client,
					client.nama_client,
					client.alamat_client,
					client.no_telpon
					FROM
					alternatif_nilai
					INNER JOIN alternatif ON alternatif_nilai.id_alternatif = alternatif.id_alternatif
					INNER JOIN kriteria ON alternatif_nilai.id_kriteria = kriteria.id_kriteria
					INNER JOIN subkriteria ON kriteria.id_kriteria = subkriteria.id_kriteria AND alternatif_nilai.id_subkriteria = subkriteria.id_subkriteria
					INNER JOIN client ON alternatif.id_client = client.id_client
					WHERE client.id_client = '$id_client'
				 ";
				 return $this->db->query($sql);
    }
	
}