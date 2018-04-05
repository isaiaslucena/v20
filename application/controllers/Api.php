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

	public function set_imgs_values($startdate, $enddate) {
		$data = $this->home_model->get_imgs_novalues($startdate, $enddate);

		// var_dump($data);
		// print_r($data);

		// exit();

		foreach ($data as $img) {
			$idnoticia = $img['IdNoticia'];
			$data = $img['Data'];
			$idimagem = $img['IdImagem'];
			$imagem = $img['Imagem'];
			$mwidth = $img['MarcarW'];
			$mheight = $img['MarcarH'];
			$edvalor = $img['ValorEditoria'];
			$edformato = $img['Formato'];
			switch ($edformato) {
				case 1:
					//Jornal
					$larguracm = 29.7;
					$alturacm = 52;
					break;
				case 2:
					// Tabloide
					$larguracm = 20;
					$alturacm = 26.5;
					break;
				case 3:
					// Revista
					$larguracm = 26;
					$alturacm = 29.7;
					break;
				default:
					$larguracm = 29.7;
					$alturacm = 52;
					break;
			}


			$imgurl = 'http://www.multclipp.com.br/arquivos/noticias/'.str_replace('-', '/', $data).'/'.$idnoticia.'/'+$imagem;
			// list($width, $height) = getimagesize($imgurl);
			// $imgsizes = getimagesize($imgurl);

			// var_dump($imgsizes);
			var_dump($imgurl);
			// exit();
		}
	}
}
?>