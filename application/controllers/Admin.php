<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index() {
		echo "teste index";
	}

	public function adm_load_to_home() {
		$wtl = $this->input->get('wtl', TRUE);

		file_exists($wtl.'index.php');
		// var_dump($wtl);
	}

	public function newsletter_() {
		$this->load->view('newsletter/index');
	}
}