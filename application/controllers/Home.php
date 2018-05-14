<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function htmlchars_decoder($array) {
		array_walk_recursive($array, function(&$item, $key) {
			$item = htmlspecialchars_decode($item);
		});
		return $array;
	}

	function tags_stripper($array) {
		array_walk_recursive($array, function(&$item, $key) {
			$item = strip_tags($item, '<br>');
		});
		return $array;
	}

	function utf8_encoder($array) {
		array_walk_recursive($array, function(&$item, $key) {
			if (!mb_detect_encoding($item, 'utf-8', true)){
				$item = utf8_encode($item);
			}
		});
		return $array;
	}

	function linebreak_to_br($array) {
		array_walk_recursive($array, function(&$item, $key) {
			$pattern = "/\r\n/";
			$replacement = '<br>';
			$item = preg_replace($pattern, $replacement, $item);
		});
		return $array;
	}

	public function index($idclient = null) {
		if (is_null($idclient)) {
			$data['client_selected'] = 'false';
			$data['client_sel_id'] = 0;
		} else {
			$data['client_selected'] = 'true';
			$data['client_sel_id'] = $idclient;
		}
		$data['title'] = 'DataClip - Business Inteligence';
		$data['clients'] = $this->utf8_encoder($this->home_model->get_clients());
		header ('Access-Control-Allow-Origin: *');
		$this->smarty->view('foot_home_client.tpl', $data);
	}

	public function noticia($idnoticia) {
		$this->smarty->view('foot_noticia.tpl', $data);
	}

	public function client_info($id) {
		$datae = $this->home_model->get_client_info($id);

		// if (isset($datae['last_tvn'][0])) {
		// 	$datae['last_tvn'][0]['Titulo'] = htmlspecialchars_decode($datae['last_tvn'][0]['Titulo']);
		// 	$datae['last_tvn'][0]['Titulo'] = strip_tags($datae['last_tvn'][0]['Titulo']);
		// 	$datae['last_tvn'][0]['Titulo'] = utf8_encode($datae['last_tvn'][0]['Titulo']);

		// 	$datae['last_tvn'][0]['Subtitulo'] = htmlspecialchars_decode($datae['last_tvn'][0]['Subtitulo']);
		// 	$datae['last_tvn'][0]['Subtitulo'] = strip_tags($datae['last_tvn'][0]['Subtitulo']);
		// 	$datae['last_tvn'][0]['Subtitulo'] = utf8_encode($datae['last_tvn'][0]['Subtitulo']);

		// 	$datae['last_tvn'][0]['Noticia'] = htmlspecialchars_decode($datae['last_tvn'][0]['Noticia']);
		// 	$datae['last_tvn'][0]['Noticia'] = strip_tags($datae['last_tvn'][0]['Noticia'],'<br>');
		// 	$datae['last_tvn'][0]['Noticia'] = utf8_encode($datae['last_tvn'][0]['Noticia']);

		// 	$datae['last_tvn'][0]['Editoria'] = utf8_encode($datae['last_tvn'][0]['Editoria']);
		// 	$datae['last_tvn'][0]['Veiculo'] = utf8_encode($datae['last_tvn'][0]['Veiculo']);
		// 	$datae['last_tvn'][0]['Empresa'] = utf8_encode($datae['last_tvn'][0]['Empresa']);
		// 	$datae['last_tvn'][0]['Video'] = utf8_encode($datae['last_tvn'][0]['Video']);
		// 	// $datae['last_tvn'][0]['Hora'] = preg_replace('/\s/', '', $datae['last_tvn'][0]['Hora']);
		// 	$datae['last_tvn'][0]['Hora'] = trim($datae['last_tvn'][0]['Hora']);
		// } else {
		// 	$datae['last_tvn'] = 'None';
		// }

		// if (isset($datae['last_radion'][0])) {
		// 	$datae['last_radion'][0]['Titulo'] = htmlspecialchars_decode($datae['last_radion'][0]['Titulo']);
		// 	$datae['last_radion'][0]['Titulo'] = strip_tags($datae['last_radion'][0]['Titulo']);
		// 	$datae['last_radion'][0]['Titulo'] = utf8_encode($datae['last_radion'][0]['Titulo']);

		// 	$datae['last_radion'][0]['Subtitulo'] = htmlspecialchars_decode($datae['last_radion'][0]['Subtitulo']);
		// 	$datae['last_radion'][0]['Subtitulo'] = strip_tags($datae['last_radion'][0]['Subtitulo']);
		// 	$datae['last_radion'][0]['Subtitulo'] = utf8_encode($datae['last_radion'][0]['Subtitulo']);

		// 	$datae['last_radion'][0]['Noticia'] = htmlspecialchars_decode($datae['last_radion'][0]['Noticia']);
		// 	$datae['last_radion'][0]['Noticia'] = strip_tags($datae['last_radion'][0]['Noticia'],'<br>');
		// 	$datae['last_radion'][0]['Noticia'] = utf8_encode($datae['last_radion'][0]['Noticia']);

		// 	$datae['last_radion'][0]['Editoria'] = utf8_encode($datae['last_radion'][0]['Editoria']);
		// 	$datae['last_radion'][0]['Veiculo'] = utf8_encode($datae['last_radion'][0]['Veiculo']);
		// 	$datae['last_radion'][0]['Empresa'] = utf8_encode($datae['last_radion'][0]['Empresa']);
		// 	$datae['last_radion'][0]['Audio'] = utf8_encode($datae['last_radion'][0]['Audio']);
		// 	$datae['last_radion'][0]['Hora'] = trim($datae['last_radion'][0]['Hora']);
		// } else {
		// 	$datae['last_radion'] = 'None';
		// }

		// if (isset($datae['last_printn'][0])) {
		// 	$datae['last_printn'][0]['Titulo'] = htmlspecialchars_decode($datae['last_printn'][0]['Titulo']);
		// 	$datae['last_printn'][0]['Titulo'] = strip_tags($datae['last_printn'][0]['Titulo']);
		// 	$datae['last_printn'][0]['Titulo'] = utf8_encode($datae['last_printn'][0]['Titulo']);

		// 	$datae['last_printn'][0]['Subtitulo'] = htmlspecialchars_decode($datae['last_printn'][0]['Subtitulo']);
		// 	$datae['last_printn'][0]['Subtitulo'] = strip_tags($datae['last_printn'][0]['Subtitulo']);
		// 	$datae['last_printn'][0]['Subtitulo'] = utf8_encode($datae['last_printn'][0]['Subtitulo']);

		// 	$datae['last_printn'][0]['Noticia'] = htmlspecialchars_decode($datae['last_printn'][0]['Noticia']);
		// 	$datae['last_printn'][0]['Noticia'] = strip_tags($datae['last_printn'][0]['Noticia'],'<br>');
		// 	$datae['last_printn'][0]['Noticia'] = utf8_encode($datae['last_printn'][0]['Noticia']);

		// 	$datae['last_printn'][0]['Editoria'] = utf8_encode($datae['last_printn'][0]['Editoria']);
		// 	$datae['last_printn'][0]['Veiculo'] = utf8_encode($datae['last_printn'][0]['Veiculo']);
		// 	$datae['last_printn'][0]['Empresa'] = utf8_encode($datae['last_printn'][0]['Empresa']);
		// 	$datae['last_printn'][0]['Imagem'] = utf8_encode($datae['last_printn'][0]['Imagem']);
		// 	$datae['last_printn'][0]['Hora'] = trim($datae['last_printn'][0]['Hora']);
		// } else {
		// 	$datae['last_printn'] = 'None';
		// }

		// if (isset($datae['last_onlinen'][0])) {
		// 	$datae['last_onlinen'][0]['Titulo'] = htmlspecialchars_decode($datae['last_onlinen'][0]['Titulo']);
		// 	$datae['last_onlinen'][0]['Titulo'] = strip_tags($datae['last_onlinen'][0]['Titulo']);
		// 	$datae['last_onlinen'][0]['Titulo'] = utf8_encode($datae['last_onlinen'][0]['Titulo']);

		// 	$datae['last_onlinen'][0]['Subtitulo'] = htmlspecialchars_decode($datae['last_onlinen'][0]['Subtitulo']);
		// 	$datae['last_onlinen'][0]['Subtitulo'] = strip_tags($datae['last_onlinen'][0]['Subtitulo']);
		// 	$datae['last_onlinen'][0]['Subtitulo'] = utf8_encode($datae['last_onlinen'][0]['Subtitulo']);

		// 	$datae['last_onlinen'][0]['Noticia'] = htmlspecialchars_decode($datae['last_onlinen'][0]['Noticia']);
		// 	$datae['last_onlinen'][0]['Noticia'] = strip_tags($datae['last_onlinen'][0]['Noticia'],'<br>');
		// 	$datae['last_onlinen'][0]['Noticia'] = utf8_encode($datae['last_onlinen'][0]['Noticia']);

		// 	$datae['last_onlinen'][0]['Editoria'] = utf8_encode($datae['last_onlinen'][0]['Editoria']);
		// 	$datae['last_onlinen'][0]['Veiculo'] = utf8_encode($datae['last_onlinen'][0]['Veiculo']);
		// 	$datae['last_onlinen'][0]['Empresa'] = utf8_encode($datae['last_onlinen'][0]['Empresa']);
		// 	$datae['last_onlinen'][0]['Imagem'] = utf8_encode($datae['last_onlinen'][0]['Imagem']);
		// 	$datae['last_onlinen'][0]['Hora'] = trim($datae['last_onlinen'][0]['Hora']);
		// } else {
		// 	$datae['last_onlinen'][0] = 'None';
		// }

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($datae, JSON_PRETTY_PRINT);
	}

	public function client_subjects($clientid) {
		$data = $this->utf8_encoder($this->home_model->get_client_subjects($clientid));

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($data, JSON_PRETTY_PRINT);
	}

	public function subject_keywords($subjectid) {
		$data = $this->utf8_encoder($this->home_model->get_subject_keywords($subjectid));

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($data, JSON_PRETTY_PRINT);
	}

	public function veiculos_tipoveiculos($tveiculoid) {
		$data = $this->utf8_encoder($this->home_model->get_veiculos_tipoveiculos($tveiculoid));

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($data, JSON_PRETTY_PRINT);
	}

	public function editorias_veiculos($veiculoid) {
		$data = $this->utf8_encoder($this->home_model->get_editorias_veiculos($veiculoid));

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($data, JSON_PRETTY_PRINT);
	}

	public function editorias_sites() {
		$qtext = $this->input->get('query');
		$data = $this->utf8_encoder($this->home_model->get_editorias_sites($qtext));

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($data, JSON_PRETTY_PRINT);
	}

	public function get_tveiculos(){
		$data = $this->utf8_encoder($this->home_model->get_tveiculos());

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($data, JSON_PRETTY_PRINT);
	}

	public function client_subjects_keywords($id, $startdate = null, $enddate = null) {
		$subs_keyws = $this->utf8_encoder($this->home_model->get_client_subjectskeywords($id, $startdate, $enddate));

		$subjects_keywords = array();
		$newsubjectid = 0;
		$newkeywordid = 0;
		$ncount = -1;
		foreach ($subs_keyws as $subject) {
			$subjectid = $subject['IdAssunto'];
			$subjectnm = $subject['Assunto'];
			$subjectqn = $subject['AQNoticias'];

			$keywordid = $subject['IdPChave'];
			$keywordnm = $subject['PChave'];
			$keywordtb = $subject['TermoBusca'];
			$keywordgf = $subject['Grifar'];
			$keywordqn = $subject['PQNoticias'];

			$subjectarr = array(
				'IdAssunto' => $subjectid,
				'Assunto' => $subjectnm,
				'QNoticias' => $subjectqn,
				'PChaves' => array()
			);

			$keywordarr = array(
				'IdPChave' => $keywordid,
				'PChave' => $keywordnm,
				'TermoBusca' => $keywordtb,
				'Grifar' => $keywordgf,
				'QNoticias' => $keywordqn
			);

			if ($newsubjectid != $subjectid) {
				$ncount++;

				array_push($subjects_keywords, $subjectarr);

				array_push($subjects_keywords[$ncount]['PChaves'], $keywordarr);
			} else {
				array_push($subjects_keywords[$ncount]['PChaves'], $keywordarr);
			}
			$newsubjectid = $subjectid;
		}

		// var_dump($subjects_keywords);

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($subjects_keywords, JSON_PRETTY_PRINT);
	}

	public function count_subject_news($id, $startdate = null, $enddate = null) {
		$count = $this->home_model->count_subject_news($id, $startdate, $enddate);

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($count, JSON_PRETTY_PRINT);
	}

	public function count_keyword_news($id, $startdate = null, $enddate = null) {
		$count = $this->home_model->count_keyword_news($id, $startdate, $enddate);

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($count, JSON_PRETTY_PRINT);
	}

	public function count_client_news($id, $startdate = null, $enddate = null) {
		$count = $this->home_model->count_client_news($id, $startdate, $enddate);

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($count, JSON_PRETTY_PRINT);
	}

	public function count_vtype_news($clientid, $startdate = null, $enddate = null) {
		$count = $this->utf8_encoder($this->home_model->count_vtype_news($clientid, $startdate, $enddate));

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($count, JSON_PRETTY_PRINT);
	}

	public function count_rating_news($clientid, $startdate = null, $enddate = null) {
		$count = $this->utf8_encoder($this->home_model->count_rating_news($clientid, $startdate, $enddate));

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($count, JSON_PRETTY_PRINT);
	}

	public function count_states_news($clientid, $startdate = null, $enddate = null) {
		$count = $this->utf8_encoder($this->home_model->count_states_news($clientid, $startdate, $enddate));

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($count, JSON_PRETTY_PRINT);
	}

	public function get_states(){
		$data = $this->utf8_encoder($this->home_model->get_states());

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($data, JSON_PRETTY_PRINT);
	}

	public function single_news_keyword($idnews, $keywordid) {
		$data = $this->home_model->get_single_news_keyword($idnews, $keywordid);
		$data = $this->htmlchars_decoder($data);
		$data = $this->tags_stripper($data);
		$data = $this->utf8_encoder($data);
		$data = $this->linebreak_to_br($data);

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($data, JSON_PRETTY_PRINT);
	}

	public function single_news($idnews, $idclient) {
		$datan = $this->home_model->get_single_news($idnews, $idclient);
		$datan = $this->htmlchars_decoder($datan);
		$datan = $this->tags_stripper($datan);
		$datan = $this->utf8_encoder($datan);
		$datan = $this->linebreak_to_br($datan);

		if (isset($datan[0])) {
			$data = $datan[0];
		} else {
			$data = $datan;
		}

		$data['PChaves'] = array();
		$newkeywordid = 0;
		$ncount = -1;
		foreach ($datan as $n) {
			$keywordid = $n['IdPChave'];
			$keywordnm = $n['PChave'];
			$keywordgf = $n['Grifar'];

			$keywordarr = array(
				'IdPChave' => $keywordid,
				'PChave' => $keywordnm,
				'Grifar' => $keywordgf
			);

			if ($newkeywordid != $keywordid) {
				$ncount++;
				array_push($data['PChaves'], $keywordarr);
			} else {
				array_push($data['PChaves'], $keywordarr);
			}
			$newkeywordid = $keywordid;
		}

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($data, JSON_PRETTY_PRINT);
	}

	public function keyword_news($keywordid, $clientid, $startdate = null, $enddate = null) {
		$data['data'] = $this->home_model->get_client_keyword_news($keywordid, $clientid, $startdate, $enddate);
		$data['data'] = $this->htmlchars_decoder($data['data']);
		// $data = $this->tags_stripper($data);
		$data['data'] = $this->utf8_encoder($data['data']);

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($data, JSON_PRETTY_PRINT);
	}

	public function today_news($id) {
		// $this->load->model('home_model');
		$data = $this->home_model->get_client_news($id);

		$nn = 0;
		foreach ($data as $item) {
			$data[$nn]['Titulo'] = htmlspecialchars_decode($item['Titulo']);
			$data[$nn]['Titulo'] = strip_tags($item['Titulo']);
			$data[$nn]['Titulo'] = utf8_encode($item['Titulo']);

			$data[$nn]['Subtitulo'] = htmlspecialchars_decode($item['Subtitulo']);
			$data[$nn]['Subtitulo'] = strip_tags($item['Subtitulo']);
			$data[$nn]['Subtitulo'] = utf8_encode($item['Subtitulo']);

			$data[$nn]['Noticia'] = htmlspecialchars_decode($item['Noticia']);
			$data[$nn]['Noticia'] = strip_tags($item['Noticia'],'<br>');
			$data[$nn]['Noticia'] = utf8_encode($item['Noticia']);

			$data[$nn]['Editoria'] = utf8_encode($item['Editoria']);
			$data[$nn]['TipoVeiculo'] = utf8_encode($item['TipoVeiculo']);
			$data[$nn]['Veiculo'] = utf8_encode($item['Veiculo']);
			$data[$nn]['Empresa'] = utf8_encode($item['Empresa']);
			$data[$nn]['Hora'] = preg_replace('/\s/', '', $item['Hora']);
			$nn++;
		}

		// var_dump($data);

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($data, JSON_PRETTY_PRINT);
	}

	public function news_export($clientid, $startdate = null, $enddate = null) {
		$datan = $this->home_model->get_news_export($clientid, $startdate, $enddate);
		$datan = $this->htmlchars_decoder($datan);
		$datan = $this->tags_stripper($datan);
		$datan = $this->utf8_encoder($datan);

		$dataarr = array();
		$ncount = 0;
		foreach ($datan as $data) {
			// $ncount++;
			$dataarr[$ncount]['imgurl'] = 'http://www.multclipp.com.br/arquivos/noticias/'.str_replace('-', '/', $data['Data']).'/'.$data['Id'].'/'.$data['Imagem'];
			// var_dump($imgurl);
			// echo "<br>";

			$dataarr[$ncount]['imgsize'] = getimagesize($dataarr[$ncount]['imgurl']);
			// var_dump($imgsize);
			// echo "<br>";


			switch ($data['Formato']) {
				case 1:
					$dataarr[$ncount]['LarguraCM'] = 29.7;
					$dataarr[$ncount]['AlturaCM'] = 52;
					break;
				case 2:
					$dataarr[$ncount]['LarguraCM'] = 20;
					$dataarr[$ncount]['AlturaCM'] = 26.5;
				case 3;
					$dataarr[$ncount]['LarguraCM'] = 26;
					$dataarr[$ncount]['AlturaCM'] = 29.7;
					break;
				default:
					$dataarr[$ncount]['LarguraCM'] = 0;
					$dataarr[$ncount]['AlturaCM'] = 0;
					break;
			}

			$dataarr[$ncount]['AlturaCMImagem'] = ($dataarr[$ncount]['AlturaCM'] * $data['MarcarH']) / $dataarr[$ncount]['imgsize'][1];
			$dataarr[$ncount]['LarguraCMImagem'] = ($dataarr[$ncount]['LarguraCM'] * $data['MarcarW']) / $dataarr[$ncount]['imgsize'][0];
			if ($dataarr[$ncount]['LarguraCMImagem'] < 6.5) {
				$dataarr[$ncount]['NrColunas'] = 1;
			} else {
				$dataarr[$ncount]['NrColunas'] = $dataarr[$ncount]['LarguraCMImagem'] / 5;
			}
			$dataarr[$ncount]['Centimetragem'] = number_format(($dataarr[$ncount]['NrColunas'] * $dataarr[$ncount]['AlturaCMImagem']), 2);
			// var_dump($Centimetragem);
			// echo "<br>";

			// if ($ncount == 12) {
			// 	exit();
			// }

			$ncount++;
		}

		print_r($dataarr);

		// header('Content-Type: application/json, charset=utf-8');
		// print json_encode($datan, JSON_PRETTY_PRINT);
	}

	public function excel_export(){
		if ($this->input->method(TRUE) == 'POST') {
			$postdata = ($_POST = json_decode(file_get_contents("php://input"),true));

			$dataexp = $this->utf8_encoder($this->htmlchars_decoder($this->home_model->excel_export($postdata)));

			header('Content-Type: application/json, charset=utf-8');
			print json_encode($dataexp, JSON_PRETTY_PRINT);
		} else {
			header("HTTP/1.1 405 Method Not Allowed");
		}
	}

	public function set_aval() {
		if ($this->input->method(TRUE) == 'POST') {
			$postdata = ($_POST = json_decode(file_get_contents("php://input"),true));

			if ($this->home_model->set_aval($postdata) === TRUE) {
				header('Content-Type: application/json');
				$message = 'OK';
				print json_encode($message, JSON_PRETTY_PRINT);
			} else {
				header("HTTP/1.1 500 Internal Server Error");
			}
		} else {
			header("HTTP/1.1 405 Method Not Allowed");
			// print json_encode($message, JSON_PRETTY_PRINT);
		}
	}

	public function set_moti() {
		if ($this->input->method(TRUE) == 'POST') {
			$postdata = ($_POST = json_decode(file_get_contents("php://input"),true));

			if ($this->home_model->set_moti($postdata) === TRUE) {
				header('Content-Type: application/json');
				$message = 'OK';
				print json_encode($message, JSON_PRETTY_PRINT);
			} else {
				header("HTTP/1.1 500 Internal Server Error");
			}
		} else {
			header("HTTP/1.1 405 Method Not Allowed");
			// print json_encode($message, JSON_PRETTY_PRINT);
		}
	}

	public function send_mail() {
		if ($this->input->method(TRUE) == 'POST') {
			$postdata = ($_POST = json_decode(file_get_contents("php://input"),true));
			$mail_to = $postdata['mail_to'];
			$mail_subject = $postdata['mail_subject'];
			$mail_message = $postdata['mail_message'];

			// $this->email->from('noticias@multclipp.com.br', 'Noticias', 'noticias@multclipp.com.br');
			$this->email->from('noticias@dataclip.com.br', 'Noticias', 'noticias@dataclip.com.br');
			$this->email->to($mail_to);
			// $this->email->cc('another@another-example.com');
			// $this->email->bcc('them@their-example.com');

			$this->email->subject($mail_subject);
			$this->email->message($mail_message);

			if ($this->email->send(FALSE)) {
				header('Content-Type: application/json');
				$message = "Email enviado com sucesso!";
				print json_encode($message, JSON_PRETTY_PRINT);
			} else {
				header('Content-Type: application/json');
				$message = "Erro ao tentar enviar o email!";
				print json_encode($message, JSON_PRETTY_PRINT);
			}
		} else {
			header('Content-Type: application/json');
			$message = "Método não permitido!";
			print json_encode($message, JSON_PRETTY_PRINT);
		}
	}

	public function proxy($url = null) {
		$durl = base64_decode($url);
		$fmimetype = exif_imagetype($durl);

		switch ($fmimetype) {
			case 1:
				$fcontenttype = "image/gif";
				break;
			case 2:
				$fcontenttype = "image/jpeg";
				break;
			case 3:
				$fcontenttype = "image/png";
				break;
			case 6:
				$fcontenttype = "image/bmp";
				break;
			default:
				$fcontenttype = "image/jpg";
				break;
		}

		header("Cache-Control: max-age=3600, public");
		header("Content-type: ".$fcontenttype);

		print file_get_contents($durl);
	}

	public function imgs_values() {
		$this->load->view('imgs_values');
	}

	public function advsearch(){
		if ($this->input->method(TRUE) == 'POST') {
			$postdata = ($_POST = json_decode(file_get_contents("php://input"), true));

			$searchdata = $this->utf8_encoder($this->home_model->advsearch($postdata));

			header('Content-Type: application/json, charset=utf-8');
			print json_encode($searchdata, JSON_PRETTY_PRINT);
		}
	}

	public function advsearch_nonjson(){
		if ($this->input->method(TRUE) == 'POST') {
			$postdata['idempresa'] = $this->input->post('idempresa');
			$postdata['startdate'] = $this->input->post('startdate');
			$postdata['enddate'] = $this->input->post('enddate');
			$postdata['starttime'] = $this->input->post('starttime');
			$postdata['endtime'] = $this->input->post('endtime');
			$postdata['subjectsid'] = $this->input->post('subjectsid');
			$postdata['keywordsid'] = $this->input->post('keywordsid');
			$postdata['tveiculosid'] = $this->input->post('tveiculosid');
			$postdata['veiculosid'] = $this->input->post('veiculosid');
			$postdata['editoriasid'] = $this->input->post('editoriasid');
			$postdata['estadosid'] = $this->input->post('estadosid');
			$postdata['destaque'] = $this->input->post('destaque');
			$postdata['motivacao'] = $this->input->post('motivacao');
			$postdata['avaliacao'] = $this->input->post('avaliacao');

			$searchdata = $this->home_model->advsearch($postdata);

			header('Content-Type: application/json');
			print json_encode($searchdata, JSON_PRETTY_PRINT);
		}
	}

	public function get_mclipp($iduser, $idclient) {
		$data = $this->home_model->get_mclipp($iduser, $idclient);

		header('Content-Type: application/json');
		print json_encode($data, JSON_PRETTY_PRINT);
	}

	public function create_mclipp(){
		if ($this->input->method(TRUE) == 'POST') {
			$postdata = ($_POST = json_decode(file_get_contents("php://input"), true));

			// var_dump($postdata);

			$quatnots = count($postdata['idsnoticias']);
			$insert_selecoes = array(
				'idUsuario' => $postdata['iduser'],
				'Nome' =>	$postdata['name'],
				'idEmpresa' => $postdata['idclient'],
				'QNoticias' => $quatnots
			);
			$insertedid = $this->home_model->create_mclipp_selecoes($insert_selecoes);

			$selecoesnoticias = array();

			$today = date('Y-m-d');
			foreach ($postdata['idsnoticias'] as $cidnoticia) {
				$selnoticia = array(
					'idselecao' => $insertedid,
					'idNoticia' => $cidnoticia,
					'Ordem' => 0,
					'Data' => $today,
					'idUsuario' => $postdata['iduser']
				);
				array_push($selecoesnoticias, $selnoticia);
			}
			$this->home_model->create_mclipp_selecoesnoticias($selecoesnoticias);

			$response['idSelecao'] = $insertedid;
			header('Content-Type: application/json, charset=utf-8');
			print json_encode($response, JSON_PRETTY_PRINT);
		}
	}

	public function edit_mclipp() {
		if ($this->input->method(TRUE) == 'POST') {
			$postdata = ($_POST = json_decode(file_get_contents("php://input"), true));

			if (empty($postdata['Nome']) or is_null($postdata['Nome']) or $postdata['Nome'] == 'undefined' or $postdata['Nome'] == 'NaN') {
				header("HTTP/1.1 500 Internal Server Error");
				header('Content-Type: application/json');
				print json_encode(false);
			} else {
				$this->home_model->edit_mclipp_selecoes($postdata);

				header('Content-Type: application/json');
				print json_encode(true);
			}
		}
	}
}
?>