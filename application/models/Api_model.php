<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {
	public function get_newsletter_conf($idempresa) {
		$sqlquery = 'SELECT * FROM v2_newsletter WHERE idEmpresa = '.$idempresa;
		return $this->db->query($sqlquery)->result_array();
	}

	public function save_newsletter_conf($data) {
		$sqlquery = 'SELECT id FROM v2_newsletter WHERE idEmpresa = '.$data['empresa'].' AND model = "'.$data['model'].'"';
		// $result = $this->db->query($sqlquery);
		if ($this->db->query($sqlquery)->num_rows()) {
			$jsonpost = addslashes(json_encode($this->input->post()));
			$updatequery = 'UPDATE v2_newsletter SET model = "'.$data['model'].'", template = "'.$jsonpost.'" WHERE idEmpresa = '.$data['empresa'].' AND model = "'.$data['model'].'" LIMIT 1';
			return $this->db->query($updatequery);
		} else {
			$insertquery = 'INSERT INTO v2_newsletter (idEmpresa, model, template) VALUES ('.$data['empresa'].',"'.$data['model'].'","'.$jsonpost.'")';
			return $this->db->query($insertquery);
		}
		// var_dump($result);

		// $sqlquery = 'REPLACE INTO v2_newsletter (id, idEmpresa, template, model) VALUES ('.$data['id'].','.$data['idEmpresa'].',"'.$data['template'].'","'.$data['model'].'")';
		// if ($this->db->query($sqlquery)) {
		// 	return true;
		// } else {
		// 	return false;
		// }
	}
}