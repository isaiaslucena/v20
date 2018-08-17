<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {
	public function get_newsletter_conf($idempresa) {
		$sqlquery = 'SELECT * FROM v2_newsletter WHERE idEmpresa = '.$idempresa;
		return $this->db->query($sqlquery)->result_array();
	}

	public function get_newsletter_model_byempresa($data) {
		$sqlquery = 'SELECT template FROM v2_newsletter WHERE model = "'.$data['model'].'" AND idEmpresa = '.$data['idempresa'].' LIMIT 1';
		$result = $this->db->query($sqlquery);
		// print_r($result);
		// exit();
		if ($result->result_id->num_rows != 0) {
			return $result->row()->template;
		} else {
			return NULL;
		};
	}

	public function get_newsletter_model_byid($id) {
		$sqlquery = 'SELECT template FROM v2_newsletter WHERE id = '.$id.' LIMIT 1';
		return $this->db->query($sqlquery)->row()->template;
	}

	public function get_newsletter_id_bymodel($modelname) {
		$sqlquery = 'SELECT id FROM v2_newsletter WHERE model = "'.$modelname.'" LIMIT 100';
		$results = $this->db->query($sqlquery)->result_array();
		$ids = array();
		foreach ($results as $result) {
			array_push($ids, $result['id']);
		}
		return $ids;
	}

	public function save_newsletter_conf($data) {
		$sqlquery = 'SELECT id FROM v2_newsletter WHERE idEmpresa = '.$data['empresa'].' AND model = "'.$data['model'].'"';
		$result = $this->db->query($sqlquery);
		if ($result->result_id->num_rows > 0) {
			$jsonpost = addslashes(json_encode($data));
			$updatequery = 'UPDATE v2_newsletter SET model = "'.$data['model'].'", template = "'.$jsonpost.'" WHERE idEmpresa = '.$data['empresa'].' AND model = "'.$data['model'].'" LIMIT 1';
			return $this->db->query($updatequery);
		} else {
			$insertquery = 'INSERT INTO v2_newsletter (idEmpresa, model, template) VALUES ('.$data['empresa'].',"'.$data['model'].'","'.$jsonpost.'")';
			return $this->db->query($insertquery);
		}
	}
}