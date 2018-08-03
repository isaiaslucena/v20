<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {
	public function get_newsletter_conf($idempresa) {
		$sqlquery = 'SELECT * FROM v2_newsletter WHERE idEmpresa = '.$idempresa;
		return $this->db->query($sqlquery)->result_array();
	}

	public function save_newsletter_conf($data) {
		$sqlquery = 'REPLACE INTO v2_newsletter (id, idEmpresa, template, model) VALUES ('.$data['id'].','.$data['idEmpresa'].',"'.$data['template'].'","'.$data['model'].'")';
		if ($this->db->query($sqlquery)) {
			return true;
		} else {
			return false;
		}
	}
}