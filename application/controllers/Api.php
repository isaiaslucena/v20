<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	function htmlchars_decoder($array) {
		array_walk_recursive($array, function(&$item, $key) {
			$item = htmlspecialchars_decode($item);
		});
		return $array;
	}

	function tags_stripper($array) {
		array_walk_recursive($array, function(&$item, $key) {
			$item = strip_tags($item);
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

	public function index() {
		header("HTTP/1.1 403 Forbidden");
	}

	public function deleteall_dbcache() {
		$this->db->cache_delete_all();
		echo "Database cache sucesssfuly deleted!"."\r\n";
	}

	public function clients() {
		$this->load->model('home_model');
		$datac = $this->home_model->get_clients();

		$arrk = 0;
		foreach ($datac as $data) {
			$datac[$arrk]['Nome'] = htmlspecialchars_decode($data['Nome']);
			$datac[$arrk]['Nome'] = strip_tags($data['Nome']);
			$datac[$arrk]['Nome'] = utf8_encode($data['Nome']);
			// var_dump($data);
			// var_dump($data['Nome']);
			// utf8_encode($datanome);
			$arrk++;
		}

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($datac, JSON_PRETTY_PRINT);
		// print_r($datac);
		// print $datac;
	}

	public function print_news() {
		if ($this->input->method(TRUE) == 'POST') {
			$postdata = ($_POST = json_decode(file_get_contents("php://input"), true));

			$this->load->model('home_model');
			if (isset($startdate)) {
				$startdate = $postdata['startdate'];
				$enddate = $postdata['enddate'];
				$news = $this->home_model->get_print_news($startdate, $enddate);
			} else {
				$news = $this->home_model->get_print_news();
			}

			$news = $this->htmlchars_decoder($news);
			$news = $this->tags_stripper($news);
			$news = $this->utf8_encoder($news);

			$ncidemp = null;
			$ncountnews = 0;
			$ncountemp = -1;
			$tprintnews = array();
			foreach ($print_news as $news) {
				$nidemp = $news->IdEmpresa;
				$nemp = $news->Empresa;
				$nidnews = $news->Id;
				$ntitlenews = $news->Titulo;
				$nnews = $news->Noticia;
				$nidvtype = $news->IdTipoVeiculo;
				$nvtype = $news->TipoVeiculo;
				$nidv = $news->IdVeiculo;
				$nveh = $news->Veiculo;
				$nided = $news->IdEditoria;
				$nedt = $news->Editoria;
				$ndate = $news->Data;
				$ntime = $news->Hora;

				$currnews = array(
					'IdEmpresa' => $nidemp,
					'Empresa' => $nemp,
					'Id' => $nidnews,
					'Titulo' => $ntitlenews,
					'Noticia' => $nnews,
					'IdTipoVeiculo' => $nidvtype,
					'TipoVeiculo' => $nvtype,
					'IdVeiculo' => $nidv,
					'Veiculo' => $nveh,
					'IdEditoria' => $nided,
					'Editoria' => $nedt,
					'Data' => $ndate,
					'Hora' => $ntime
				);

				if ($ncidemp != $nidemp) {
					$ncountemp++;
					$empresas = array(
						'IdEmpresa' => $nidemp,
						'Empresa' => $nemp,
						'Noticias' => array()
					);
					array_push($tprintnews, $empresas);
					array_push($tprintnews[$ncountemp]['Noticias'], $currnews);
				} else {
					array_push($tprintnews[$ncountemp]['Noticias'], $currnews);
				}
				$ncidemp = $nidemp;
			}

			header('Content-Type: application/json, charset=utf-8');
			print json_encode($news);
		}
	}

	public function print_newspapers() {
		if ($this->input->method(TRUE) == 'POST') {
			$postdata = ($_POST = json_decode(file_get_contents("php://input"), true));

			$this->load->model('home_model');
			if (isset($startdate)) {
				$startdate = $postdata['startdate'];
				$enddate = $postdata['enddate'];
				$news = $this->home_model->get_newspaper($startdate, $enddate);
			} else {
				$news = $this->home_model->get_newspaper();
			}

			$news = $this->htmlchars_decoder($news);
			$news = $this->tags_stripper($news);
			$news = $this->utf8_encoder($news);

			$newspapers = array();
			$newnidnews = 0;
			$newnidv = 0;
			$newiddemp = 0;
			$ncounvtemp = -1;
			foreach ($news as $cnews) {
				$nidemp = $cnews['IdEmpresa'];
				$nemp = $cnews['Empresa'];
				$nidnews = $cnews['Id'] ;
				$ntitle = $cnews['Titulo'];
				$ntitle = $cnews['Subtitulo'];
				$nnews = $cnews['Noticia'];
				$nidv = $cnews['IdVeiculo'];
				$nve = $cnews['Veiculo'];
				$ndate = $cnews['Data'];
				$ntime = $cnews['Hora'];

				$jornal = array(
					'IdVeiculo' => $nidv,
					'Veiculo' => $nve,
					'Empresas' => array()
				);

				$empresa = array(
					'IdEmpresa' => $nidemp,
					'Empresa' => $nemp,
					'Noticias' => array()
				);

				$noticia = array(
					'Id' => $nidnews,
					'Titulo' => $ntitle,
					'Data' => $ndate,
					'Hora' => $ntime,
					'Noticia' => $nnews
				);

				if ($newnidv != $nidv) {
					$ncounvtemp++;
					$ncounetemp = -1;

					//adiciona novo jornal
					array_push($newspapers, $jornal);
					// adiciona nova empresa no jornal
					array_push($newspapers[$ncounvtemp]['Empresas'], $empresa);

					if ($newiddemp != $nidemp) {
						$ncounetemp++;

						//adiciona nova noticia na empresa
						array_push($newspapers[$ncounvtemp]['Empresas'][$ncounetemp]['Noticias'], $noticia);
					} else {
						$ncounetemp++;
						//adiciona nova notícia da mesma empresa
						array_push($newspapers[$ncounvtemp]['Empresas'][$ncounetemp]['Noticias'], $noticia);
					}
				} else {
					if ($newiddemp != $nidemp) {
						$ncounetemp++;

						// adiciona nova empresa no jornal
						array_push($newspapers[$ncounvtemp]['Empresas'], $empresa);
						//adiciona nova noticia na empresa
						array_push($newspapers[$ncounvtemp]['Empresas'][$ncounetemp]['Noticias'], $noticia);
					} else {
						//adiciona nova notícia da mesma empresa
						array_push($newspapers[$ncounvtemp]['Empresas'][$ncounetemp]['Noticias'], $noticia);
					}
				}

				$newnidnews = $nidnews;
				$newnidv = $nidv;
				$newiddemp = $nidemp;
			}

			header('Content-Type: application/json, charset=utf-8');
			print json_encode($newspapers);
		} else {
			header("HTTP/1.1 403 Forbidden");
		}
	}

	public function print_newspaper_client_news() {
		if ($this->input->method(TRUE) == 'POST') {
			$postdata = ($_POST = json_decode(file_get_contents("php://input"), true));
			$idnpaper = $postdata['idnpaper'];
			$idnclient = $postdata['idclient'];
			$offset = $postdata['offset'];

			$this->load->model('home_model');
			if (isset($postdata['startdate'])) {
				$startdate = $postdata['startdate'];
				$enddate = $postdata['enddate'];
				$news = $this->home_model->get_newspaper_clientnews($idnpaper, $idnclient, $offset, $startdate, $enddate);
			} else {
				$news['Query']['Quantidade'] = $this->home_model->count_newspaper_clientnews($idnpaper, $idnclient, $offset);
				$nfnews = $this->home_model->get_newspaper_clientnews($idnpaper, $idnclient, $offset);
			}

			$news['Query']['Offset'] = $offset;

			$nfnews = $this->htmlchars_decoder($nfnews);
			$nfnews = $this->tags_stripper($nfnews);
			$nfnews = $this->utf8_encoder($nfnews);

			$newnidnews = null;
			$newnidpchave = null;
			$newnidimg = null;
			$nnewstempc = -1;
			$nnimgtempc = -1;
			$npchavetempc = -1;
			$news['Noticias'] = array();
			foreach ($nfnews as $cnews) {
				$nidv = $cnews['IdVeiculo'];
				$nve = $cnews['Veiculo'];
				$nidtv = $cnews['IdTVeiculo'];
				$ntv = $cnews['TVeiculo'];
				$nided = $cnews['IdEditoria'];
				$ned = $cnews['Editoria'];
				$nidemp = $cnews['IdEmpresa'];
				$nemp = $cnews['Empresa'];
				$nidnews = $cnews['IdNoticia'] ;
				$ntitle = $cnews['Titulo'];
				$nsubtitle = $cnews['Subtitulo'];
				$nnews = $cnews['Noticia'];
				$ndate = $cnews['Data'];
				$ntime = $cnews['Hora'];
				$nurl = $cnews['NoticiaURL'];
				$nidpchave = $cnews['IdPChave'];
				$npchave = $cnews['PChave'];
				$ntermosbusca = $cnews['TermoBusca'];
				$nidimg = $cnews['IdImagem'];
				$nimg = $cnews['Imagem'];
				$nimgurl = $cnews['URLImagem'];

				$noticia = array(
					'IdVeiculo' => $nidv,
					'Veiculo' => $nve,
					'IdTVeiculo' => $nidtv,
					'TVeiculo' => $ntv,
					'IdEditoria' => $nided,
					'Editoria' => $ned,
					'IdEmpresa' => $nidemp,
					'Empresa' => $nemp,
					'Id' => $nidnews,
					'Titulo' => $ntitle,
					'Subtitulo' => $nsubtitle,
					'Data' => $ndate,
					'Hora' => $ntime,
					'Noticia' => $nnews,
					'NoticiaURL' => $nurl
				);

				// $termosbusca = array();

				// $arrtermobusca = explode('" OR " ', $ntermobusca);

				$palavrachave = array(
					'IdPChave' => $nidpchave,
					'PChave' => $npchave,
					'TermosBusca' => $ntermosbusca
				);

				$imagem = array(
					'IdImagem' => $nidimg,
					'Imagem' => 'http://www.multclipp.com.br/arquivos/noticias/'.str_replace("-", "/", $ndate)."/".$nidnews."/".$nimg,
					'URLImagem' => $nimgurl
				);

				if ($newnidnews != $nidnews) {
					$nnewstempc++;
					array_push($news['Noticias'], $noticia);

					$news['Noticias'][$nnewstempc]['PChaves'] = array();
					if ($newnidpchave != $nidpchave) {
						array_push($news['Noticias'][$nnewstempc]['PChaves'], $palavrachave);
					}

					$news['Noticias'][$nnewstempc]['Imagens'] = array();
					if ($newnidimg != $nidimg) {
						array_push($news['Noticias'][$nnewstempc]['Imagens'], $imagem);
					}
				} else {
					if ($newnidpchave != $nidpchave) {
						array_push($news['Noticias'][$nnewstempc]['PChaves'], $palavrachave);
					}

					if ($newnidimg != $nidimg) {
						array_push($news['Noticias'][$nnewstempc]['Imagens'], $imagem);
					}
				}

				$newnidnews = $nidnews;
				$newnidpchave = $nidpchave;
				$newnidimg = $nidimg;
			}

			header('Content-Type: application/json, charset=utf-8');
			print json_encode($news);
		} else {
			header("HTTP/1.1 403 Forbidden");
		}
	}

	public function client_print_news() {
		if ($this->input->method(TRUE) == 'POST') {
			$postdata = ($_POST = json_decode(file_get_contents("php://input"), true));
			$idclient = $postdata['idclient'];
			$offset = $postdata['offset'];

			$this->load->model('home_model');
			if (isset($startdate)) {
				$startdate = $postdata['startdate'];
				$enddate = $postdata['enddate'];
				$news['total'] = $this->home_model->count_client_print_news($idclient, $startdate, $enddate);
				$news['result'] = $this->home_model->get_client_print_news($idclient, $offset, $startdate, $enddate);
			} else {
				$news['total'] = $this->home_model->count_client_print_news($idclient);
				$news['result'] = $this->home_model->get_client_print_news($idclient, $offset);
			}

			$news['offset'] = $offset;
			$news['result'] = $this->htmlchars_decoder($news['result']);
			$news['result'] = $this->tags_stripper($news['result']);
			$news['result'] = $this->utf8_encoder($news['result']);

			header('Content-Type: application/json, charset=utf-8');
			print json_encode($news);
		}
	}

	public function get_imgs_values($startdate, $enddate) {
		$imgs = $this->home_model->get_imgs_novalues($startdate, $enddate);

		header('Content-Type: application/json, charset=utf-8');
		print json_encode($imgs);
	}

	public function set_imgs_values() {
		if ($this->input->method(TRUE) == 'POST') {
			// $postdata = ($_POST = json_decode(file_get_contents("php://input"), true));
			$postdata['IdImagem'] = $this->input->post('IdImagem');
			$postdata['IdNoticia'] = $this->input->post('IdNoticia');
			$postdata['imgwidth'] = $this->input->post('imgwidth');
			$postdata['imgheight'] = $this->input->post('imgheight');
			$postdata['equivalencia'] = $this->input->post('equivalencia');

			$resp = $this->home_model->set_imgs_values($postdata);

			$msg = array(
				'IdImagem' => $postdata['IdImagem'],
				'IdNoticia' => $postdata['IdNoticia'],
				'query' => $resp
			);

			header('Content-Type: application/json, charset=utf-8');
			print json_encode($msg);
		}
	}

	public function save_newsletter_conf() {
		if ($this->input->method(TRUE) == 'POST') {
			// $postdata = ($_POST = json_decode(file_get_contents("php://input"), true));
			$reqpost = $this->input->post();
			$this->load->model('api_model');

			// header('Content-Type: application/json');
			// header('Access-Control-Allow-Origin: *');
			print $this->api_model->save_newsletter_conf($reqpost);
			// var_dump($this->api_model->save_newsletter_conf($reqpost));
		} else {
			header("HTTP/1.1 403 Forbidden");
		}
	}

	public function get_newsletter_conf() {
		$this->load->model('api_model');
		$data['idempresa'] = $this->input->get('empresa', TRUE);
		$data['recorded'] = $this->input->get('recorded', TRUE);
		$data['model'] = $this->input->get('model', TRUE);
		$data['modelid'] = $this->input->get('modelid', TRUE);

		$this->load->model('api_model');
		if ($data['recorded'] === 'on' && is_null($data['modelid'])) {
			$dbmodel = $this->api_model->get_newsletter_model_byempresa($data);
			$dbsubmodel = $this->api_model->get_newsletter_id_bymodel($data['model']);
			// header('Content-Type: application/json');
			print (is_null($dbmodel)) ? NULL : json_encode(array('model' => $dbmodel, 'submodel' => $dbsubmodel));
		} else if ($data['modelid']) {
			$dbmodel = $this->api_model->get_newsletter_model_byid($data['modelid']);
			// header('Content-Type: application/json');
			print json_encode(array('model' => $dbmodel));
		} else {
			$file = '/app/newsletter/models/'.$data['model'];
			// header('Content-Type: application/json');
			print (file_exists($file)) ? json_encode(array('model' => json_encode(array('template' => file_get_contents($file))))) : NULL;
		}

		// $newsletterconf = $this->api_model->get_newsletter_conf($idempresa);

		// header('Content-Type: application/json');
		// header('Access-Control-Allow-Origin: *');
		// print json_encode($newsletterconf);
	}

	public function get_empresa_news_bydate() {
		$this->load->model('api_model');
		$this->load->model('home_model');

		$idempresa = $this->input->get('idempresa', TRUE);
		$startdate = $this->input->get('startdate', TRUE);
		$enddate = $this->input->get('enddate', TRUE);

		$empresa_info = $this->home_model->get_client_info($idempresa);
		$empresa_news = $this->api_model->get_empresa_news_bydate($idempresa, $startdate, $enddate);

		$empresa_news = $this->htmlchars_decoder($empresa_news);
		$empresa_news = $this->tags_stripper($empresa_news);
		$empresa_news = $this->utf8_encoder($empresa_news);

		$newidass = 0;
		$newidpc = 0;
		$ncountnews = 0;
		$ncountass = -1;
		$ncountpc = -1;
		$final_news = array(
			'Info' => array(),
			// 'Assuntos' => array()
			'Noticias' => array()
		);

		array_push($final_news['Info'], $empresa_info);

		foreach ($empresa_news as $news) {
			array_push($final_news['Noticias'], $news);
		}

		// foreach ($empresa_news as $news) {
		// 	$nidnews = $news['IdNoticia'];
		// 	$ntitle = $news['Titulo'];
		// 	$nsubtitle = $news['Subtitulo'];
		// 	$nnews = $news['Noticia'];
		// 	$ndate = $news['Data'];
		// 	$ntime = $news['Hora'];

		// 	$nidimg = $news['IdImagem'];
		// 	$nimg = $news['Imagem'];

		// 	$nidass = $news['IdAssunto'];
		// 	$nass = $news['Assunto'];
		// 	$nidPChave = $news['IdPChave'];
		// 	$nPChave = $news['PChave'];

		// 	$nidvtype = $news['IdTVeiculo'];
		// 	$nvtype = $news['TVeiculo'];
		// 	$nidv = $news['IdVeiculo'];
		// 	$nveh = $news['Veiculo'];
		// 	$nided = $news['IdEditoria'];
		// 	$nedt = $news['Editoria'];

		// 	$currass = array(
		// 		'IdAssunto' => $nidass,
		// 		'Assunto' => $nass,
		// 		'PalavrasChave' => array()
		// 	);

		// 	$curpchave = array(
		// 		'IdPChave' => $nidPChave,
		// 		'PChave' => $nPChave,
		// 		'Noticias' => array()
		// 	);

		// 	$currnews = array(
		// 		'Id' => $nidnews,
		// 		'Titulo' => $ntitle,
		// 		'Noticia' => $nnews,
		// 		'IdTipoVeiculo' => $nidvtype,
		// 		'TipoVeiculo' => $nvtype,
		// 		'IdVeiculo' => $nidv,
		// 		'Veiculo' => $nveh,
		// 		'IdEditoria' => $nided,
		// 		'Editoria' => $nedt,
		// 		'Data' => $ndate,
		// 		'Hora' => $ntime,
		// 		'Imagens' => array()
		// 	);

		// 	$curimagens = array(
		// 		'IdImagem' => $nidimg,
		// 		'Imagem' => $nimg
		// 	);

		// 	if ($newidass != $nidass) {
		// 		$ncountass++;
		// 		array_push($final_news['Assuntos'], $currass);

		// 		if ($newidpc != $nidPChave) {
		// 			$ncountpc++;
		// 			array_push($final_news['Assuntos'][$ncountass]['PalavrasChave'], $curpchave);
		// 			array_push($final_news['Assuntos'][$ncountass]['PalavrasChave'][$ncountpc]['Noticias'], $currnews);
		// 		} else {
		// 			array_push($final_news['Assuntos'][$ncountass]['PalavrasChave'][$ncountpc]['Noticias'], $currnews);
		// 		}
		// 	} else {
		// 		if ($newidpc != $nidPChave) {
		// 			$ncountpc++;
		// 			array_push($final_news['Assuntos'][$ncountass]['PalavrasChave'], $curpchave);
		// 			array_push($final_news['Assuntos'][$ncountass]['PalavrasChave'][$ncountpc]['Noticias'], $currnews);
		// 		} else {
		// 			array_push($final_news['Assuntos'][$ncountass]['PalavrasChave'][$ncountpc]['Noticias'], $currnews);
		// 		}
		// 	}
		// 	$newidass = $nidass;
		// 	$newidpc = $nidPChave;
		// }


		// header('Content-Type: application/json, charset=utf-8');
		// header('Content-Type: text/plain');
		print json_encode($final_news);
		// echo 'teste';
	}
}
?>