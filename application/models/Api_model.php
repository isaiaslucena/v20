<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {
	public function get_newsletter_conf($idempresa) {
		$sqlquery = 'SELECT * FROM v2_newsletter WHERE idEmpresa = $idempresa';
		return $this->db->query($sqlquery)->result_array();
	}
}