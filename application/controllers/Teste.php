<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Teste extends CI_Controller {
		public function index($idclient = null) {
		if (is_null($idclient)) {
			$data['client_selected'] = 'false';
			$data['client_sel_id'] = 0;
		} else {
			$data['client_selected'] = 'true';
			$data['client_sel_id'] = $idclient;
		}
		$data['title'] = 'DataClip - Business Inteligence';
			$this->smarty->view('teste_foot_home_client.tpl', $data);
	}
}

?>