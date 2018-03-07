<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_client extends CI_Controller {
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
		} else {
			$data['client_selected'] = 'true';
		}
		$data['title'] = 'DataClip - Business Inteligence';
		$data['clients'] = $this->home_client_model->get_clients();
		$this->smarty->view('foot_home_client.tpl', $data);
	}

	public function client_info($id) {
		// $this->load->model('home_client_model');
		$datae = $this->home_client_model->get_client_info($id);

		// var_dump($datae);

		if (isset($datae['last_tvn'][0])) {
			$datae['last_tvn'][0]['Titulo'] = htmlspecialchars_decode($datae['last_tvn'][0]['Titulo']);
			$datae['last_tvn'][0]['Titulo'] = strip_tags($datae['last_tvn'][0]['Titulo']);
			$datae['last_tvn'][0]['Titulo'] = utf8_encode($datae['last_tvn'][0]['Titulo']);

			$datae['last_tvn'][0]['Subtitulo'] = htmlspecialchars_decode($datae['last_tvn'][0]['Subtitulo']);
			$datae['last_tvn'][0]['Subtitulo'] = strip_tags($datae['last_tvn'][0]['Subtitulo']);
			$datae['last_tvn'][0]['Subtitulo'] = utf8_encode($datae['last_tvn'][0]['Subtitulo']);

			$datae['last_tvn'][0]['Noticia'] = htmlspecialchars_decode($datae['last_tvn'][0]['Noticia']);
			$datae['last_tvn'][0]['Noticia'] = strip_tags($datae['last_tvn'][0]['Noticia'],'<br>');
			$datae['last_tvn'][0]['Noticia'] = utf8_encode($datae['last_tvn'][0]['Noticia']);

			$datae['last_tvn'][0]['Editoria'] = utf8_encode($datae['last_tvn'][0]['Editoria']);
			$datae['last_tvn'][0]['Veiculo'] = utf8_encode($datae['last_tvn'][0]['Veiculo']);
			$datae['last_tvn'][0]['Empresa'] = utf8_encode($datae['last_tvn'][0]['Empresa']);
			$datae['last_tvn'][0]['Video'] = utf8_encode($datae['last_tvn'][0]['Video']);
			// $datae['last_tvn'][0]['Hora'] = preg_replace('/\s/', '', $datae['last_tvn'][0]['Hora']);
			$datae['last_tvn'][0]['Hora'] = trim($datae['last_tvn'][0]['Hora']);
		} else {
			$datae['last_tvn'] = 'None';
		}

		if (isset($datae['last_radion'][0])) {
			$datae['last_radion'][0]['Titulo'] = htmlspecialchars_decode($datae['last_radion'][0]['Titulo']);
			$datae['last_radion'][0]['Titulo'] = strip_tags($datae['last_radion'][0]['Titulo']);
			$datae['last_radion'][0]['Titulo'] = utf8_encode($datae['last_radion'][0]['Titulo']);

			$datae['last_radion'][0]['Subtitulo'] = htmlspecialchars_decode($datae['last_radion'][0]['Subtitulo']);
			$datae['last_radion'][0]['Subtitulo'] = strip_tags($datae['last_radion'][0]['Subtitulo']);
			$datae['last_radion'][0]['Subtitulo'] = utf8_encode($datae['last_radion'][0]['Subtitulo']);

			$datae['last_radion'][0]['Noticia'] = htmlspecialchars_decode($datae['last_radion'][0]['Noticia']);
			$datae['last_radion'][0]['Noticia'] = strip_tags($datae['last_radion'][0]['Noticia'],'<br>');
			$datae['last_radion'][0]['Noticia'] = utf8_encode($datae['last_radion'][0]['Noticia']);

			$datae['last_radion'][0]['Editoria'] = utf8_encode($datae['last_radion'][0]['Editoria']);
			$datae['last_radion'][0]['Veiculo'] = utf8_encode($datae['last_radion'][0]['Veiculo']);
			$datae['last_radion'][0]['Empresa'] = utf8_encode($datae['last_radion'][0]['Empresa']);
			$datae['last_radion'][0]['Audio'] = utf8_encode($datae['last_radion'][0]['Audio']);
			$datae['last_radion'][0]['Hora'] = trim($datae['last_radion'][0]['Hora']);
		} else {
			$datae['last_radion'] = 'None';
		}

		if (isset($datae['last_printn'][0])) {
			$datae['last_printn'][0]['Titulo'] = htmlspecialchars_decode($datae['last_printn'][0]['Titulo']);
			$datae['last_printn'][0]['Titulo'] = strip_tags($datae['last_printn'][0]['Titulo']);
			$datae['last_printn'][0]['Titulo'] = utf8_encode($datae['last_printn'][0]['Titulo']);

			$datae['last_printn'][0]['Subtitulo'] = htmlspecialchars_decode($datae['last_printn'][0]['Subtitulo']);
			$datae['last_printn'][0]['Subtitulo'] = strip_tags($datae['last_printn'][0]['Subtitulo']);
			$datae['last_printn'][0]['Subtitulo'] = utf8_encode($datae['last_printn'][0]['Subtitulo']);

			$datae['last_printn'][0]['Noticia'] = htmlspecialchars_decode($datae['last_printn'][0]['Noticia']);
			$datae['last_printn'][0]['Noticia'] = strip_tags($datae['last_printn'][0]['Noticia'],'<br>');
			$datae['last_printn'][0]['Noticia'] = utf8_encode($datae['last_printn'][0]['Noticia']);

			$datae['last_printn'][0]['Editoria'] = utf8_encode($datae['last_printn'][0]['Editoria']);
			$datae['last_printn'][0]['Veiculo'] = utf8_encode($datae['last_printn'][0]['Veiculo']);
			$datae['last_printn'][0]['Empresa'] = utf8_encode($datae['last_printn'][0]['Empresa']);
			$datae['last_printn'][0]['Imagem'] = utf8_encode($datae['last_printn'][0]['Imagem']);
			$datae['last_printn'][0]['Hora'] = trim($datae['last_printn'][0]['Hora']);
		} else {
			$datae['last_printn'] = 'None';
		}

		// var_dump($datae['last_onlinen']);
		// var_dump(count($datae['last_onlinen']));
		// if (count($datae['last_onlinen']) > 1) {
		// 	$onlinen = 0;
		// 	foreach ($datae['last_onlinen'] as $last_onlinenn) {
		// 		if (isset($last_onlinenn[$onlinen])) {
		// 			$datae['last_onlinen'][$onlinen]['Titulo'] = htmlspecialchars_decode($last_onlinenn[$onlinen]['Titulo']);
		// 			$datae['last_onlinen'][$onlinen]['Titulo'] = strip_tags($last_onlinenn[$onlinen]['Titulo']);
		// 			$datae['last_onlinen'][$onlinen]['Titulo'] = utf8_encode($last_onlinenn[$onlinen]['Titulo']);

		// 			$datae['last_onlinen']['Subtitulo'] = htmlspecialchars_decode($last_onlinenn[$onlinen]['Subtitulo']);
		// 			$datae['last_onlinen']['Subtitulo'] = strip_tags($last_onlinenn[$onlinen]['Subtitulo']);
		// 			$datae['last_onlinen']['Subtitulo'] = utf8_encode($last_onlinenn[$onlinen]['Subtitulo']);

		// 			$datae['last_onlinen'][$onlinen]['Noticia'] = htmlspecialchars_decode($last_onlinenn[$onlinen]['Noticia']);
		// 			$datae['last_onlinen'][$onlinen]['Noticia'] = strip_tags($last_onlinenn[$onlinen]['Noticia'],'<br>');
		// 			$datae['last_onlinen'][$onlinen]['Noticia'] = utf8_encode($last_onlinenn[$onlinen]['Noticia']);

		// 			$datae['last_onlinen'][$onlinen]['Editoria'] = utf8_encode($last_onlinenn[$onlinen]['Editoria']);
		// 			$datae['last_onlinen'][$onlinen]['Veiculo'] = utf8_encode($last_onlinenn[$onlinen]['Veiculo']);
		// 			$datae['last_onlinen'][$onlinen]['Empresa'] = utf8_encode($last_onlinenn[$onlinen]['Empresa']);
		// 			$datae['last_onlinen'][$onlinen]['Imagem'] = utf8_encode($last_onlinenn[$onlinen]['Imagem']);
		// 			$datae['last_onlinen'][$onlinen]['Hora'] = trim($last_onlinenn[$onlinen]['Hora']);
		// 		} else {
		// 			$datae['last_onlinen'][$onlinen] = 'None';
		// 		}
		// 		$onlinen++;
		// 	}
		// } else {
			if (isset($datae['last_onlinen'][0])) {
				$datae['last_onlinen'][0]['Titulo'] = htmlspecialchars_decode($datae['last_onlinen'][0]['Titulo']);
				$datae['last_onlinen'][0]['Titulo'] = strip_tags($datae['last_onlinen'][0]['Titulo']);
				$datae['last_onlinen'][0]['Titulo'] = utf8_encode($datae['last_onlinen'][0]['Titulo']);

				$datae['last_onlinen'][0]['Subtitulo'] = htmlspecialchars_decode($datae['last_onlinen'][0]['Subtitulo']);
				$datae['last_onlinen'][0]['Subtitulo'] = strip_tags($datae['last_onlinen'][0]['Subtitulo']);
				$datae['last_onlinen'][0]['Subtitulo'] = utf8_encode($datae['last_onlinen'][0]['Subtitulo']);

				$datae['last_onlinen'][0]['Noticia'] = htmlspecialchars_decode($datae['last_onlinen'][0]['Noticia']);
				$datae['last_onlinen'][0]['Noticia'] = strip_tags($datae['last_onlinen'][0]['Noticia'],'<br>');
				$datae['last_onlinen'][0]['Noticia'] = utf8_encode($datae['last_onlinen'][0]['Noticia']);

				$datae['last_onlinen'][0]['Editoria'] = utf8_encode($datae['last_onlinen'][0]['Editoria']);
				$datae['last_onlinen'][0]['Veiculo'] = utf8_encode($datae['last_onlinen'][0]['Veiculo']);
				$datae['last_onlinen'][0]['Empresa'] = utf8_encode($datae['last_onlinen'][0]['Empresa']);
				$datae['last_onlinen'][0]['Imagem'] = utf8_encode($datae['last_onlinen'][0]['Imagem']);
				$datae['last_onlinen'][0]['Hora'] = trim($datae['last_onlinen'][0]['Hora']);
			} else {
				$datae['last_onlinen'][0] = 'None';
			}
		// }

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($datae, JSON_PRETTY_PRINT);
	}

	public function client_subjects($id) {
		$data = $this->utf8_encoder($this->home_client_model->get_client_subjects($id));

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($data, JSON_PRETTY_PRINT);
	}

	public function subject_keywords($id) {
		$data = $this->utf8_encoder($this->home_client_model->get_subject_keywords($id));

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($data, JSON_PRETTY_PRINT);
	}

	public function client_subjects_keywords($id, $startdate = null, $enddate = null) {
		$subs_keyws = $this->utf8_encoder($this->home_client_model->get_client_subjectskeywords($id, $startdate, $enddate));

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
		$count = $this->home_client_model->count_subject_news($id, $startdate, $enddate);

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($count, JSON_PRETTY_PRINT);
	}

	public function count_keyword_news($id, $startdate = null, $enddate = null) {
		$count = $this->home_client_model->count_keyword_news($id, $startdate, $enddate);

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($count, JSON_PRETTY_PRINT);
	}

	public function count_client_news($id, $startdate = null, $enddate = null) {
		$count = $this->home_client_model->count_client_news($id, $startdate, $enddate);

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($count, JSON_PRETTY_PRINT);
	}

	public function count_vtype_news($clientid, $startdate = null, $enddate = null) {
		$count = $this->utf8_encoder($this->home_client_model->count_vtype_news($clientid, $startdate, $enddate));

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($count, JSON_PRETTY_PRINT);
	}

	public function count_rating_news($clientid, $startdate = null, $enddate = null) {
		$count = $this->utf8_encoder($this->home_client_model->count_rating_news($clientid, $startdate, $enddate));

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($count, JSON_PRETTY_PRINT);
	}

	public function count_states_news($clientid, $startdate = null, $enddate = null) {
		$count = $this->utf8_encoder($this->home_client_model->count_states_news($clientid, $startdate, $enddate));

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($count, JSON_PRETTY_PRINT);
	}

	public function single_news($idnews, $keywordid) {
		$data = $this->home_client_model->get_single_news($idnews, $keywordid);
		$data = $this->htmlchars_decoder($data);
		$data = $this->tags_stripper($data);
		$data = $this->utf8_encoder($data);
		$data = $this->linebreak_to_br($data);

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($data, JSON_PRETTY_PRINT);
	}

	public function keyword_news($keywordid, $startdate = null, $enddate = null) {
		$data['data'] = $this->home_client_model->get_client_keyword_news($keywordid, $startdate, $enddate);
		$data['data'] = $this->htmlchars_decoder($data['data']);
		// $data = $this->tags_stripper($data);
		$data['data'] = $this->utf8_encoder($data['data']);

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($data, JSON_PRETTY_PRINT);
	}

	public function today_news($id) {
		// $this->load->model('home_client_model');
		$data = $this->home_client_model->get_client_news($id);

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
}
?>