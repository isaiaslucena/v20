<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {
	public function get_newsletter_conf($idempresa) {
		$sqlquery = 'SELECT * FROM v2_newsletter WHERE idEmpresa = '.$idempresa;
		return $this->db->query($sqlquery)->result_array();
	}

	public function get_newsletter_model_byempresa($data) {
		$sqlquery = 'SELECT template FROM v2_newsletter WHERE model = "'.$data['model'].'" AND idEmpresa = '.$data['empresa'].' LIMIT 1';
		if ($this->db->query($sqlquery)->row()->template) {
			return $this->db->query($sqlquery)->row()->template;
		} else {
			return NULL;
		};
	}

	public function get_newsletter_model_byid($id) {
		$sqlquery = 'SELECT template FROM v2_newsletter WHERE id = '.$id.' LIMIT 1';
		return $this->db->query($sqlquery)->row()->template;
	}

	public function get_newsletter_id_bymodel($modelname) {
		$sqlquery = 'SELECT id FROM v2_newsletter WHERE mode = "'.$modelname.'" LIMIT 100';
		return $this->db->query($sqlquery)->row()->id;
	}

	public function save_newsletter_conf($data) {
		if ($this->db->query($sqlquery)->num_rows()) {
			$jsonpost = addslashes(json_encode($this->input->post()));
			$updatequery = 'UPDATE v2_newsletter SET model = "'.$data['model'].'", template = "'.$jsonpost.'" WHERE idEmpresa = '.$data['empresa'].' AND model = "'.$data['model'].'" LIMIT 1';
			return $this->db->query($updatequery);
		} else {
			$insertquery = 'INSERT INTO v2_newsletter (idEmpresa, model, template) VALUES ('.$data['empresa'].',"'.$data['model'].'","'.$jsonpost.'")';
			return $this->db->query($insertquery);
		}
	}
}