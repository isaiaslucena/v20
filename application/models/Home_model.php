<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
	public function get_clients() {
		// $this->db->cache_on();
		$sqlquery = "SELECT Id, Nome FROM Empresa WHERE Status = 1 AND Owner = 2 AND Banner IS NOT NULL ORDER BY Nome ASC";
		return $this->db->query($sqlquery)->result_array();
	}

	public function get_client_info($idclient) {
		// $this->db->cache_on();
		$querybanner = "SELECT id,nome,banner FROM Empresa WHERE Id = $idclient ORDER BY Nome ASC";
		$data['id'] = $this->db->query($querybanner)->row('id');
		$data['name'] = $this->db->query($querybanner)->row('nome');
		$data['banner'] = "http://www.multclipp.com.br/arquivos/empresa/".$idclient."/banner/".rawurlencode($this->db->query($querybanner)->row('banner'));

		// $querytv =	"SELECT TOP 1
		// 						nt.Id,nt.Titulo,nt.Subtitulo, nt.Noticia,nti.Imagem as Video,
		// 						nt.idVeiculo,ve.Nome as Veiculo,
		// 						nt.idEditoria,ed.Nome as Editoria,
		// 						ent.IdEmpresa, em.Nome as Empresa,
		// 						nt.Data,nt.Hora
		// 						FROM Noticias nt
		// 						JOIN NoticiaImagem nti ON nt.Id = nti.idNoticia
		// 						JOIN EmpresaNoticia ent ON nt.Id = ent.idNoticia
		// 						JOIN Empresa em ON ent.IdEmpresa = em.Id
		// 						JOIN Veiculo ve ON nt.idVeiculo = ve.Id
		// 						JOIN TipoVeiculo tve ON ve.idTipoVeiculo = tve.Id
		// 						JOIN Editorias ed ON nt.idEditoria = ed.Id
		// 						WHERE
		// 						ent.Liberada = 1 AND
		// 						ent.IdEmpresa = $idclient AND
		// 						tve.Id = 8
		// 						ORDER BY nt.Id DESC";
		// $data['last_tvn'] = $this->db->query($querytv)->result_array();
		// $queryradio =	"SELECT TOP 1
		// 							nt.Id,nt.Titulo,nt.Subtitulo, nt.Noticia,nti.Imagem as Audio,
		// 							nt.idVeiculo,ve.Nome as Veiculo,
		// 							nt.idEditoria,ed.Nome as Editoria,
		// 							ent.IdEmpresa, em.Nome as Empresa,
		// 							nt.Data,nt.Hora
		// 							FROM Noticias nt
		// 							JOIN NoticiaImagem nti ON nt.Id = nti.idNoticia
		// 							JOIN EmpresaNoticia ent ON nt.Id=ent.idNoticia
		// 							JOIN Empresa em ON ent.IdEmpresa=em.Id
		// 							JOIN Veiculo ve ON nt.idVeiculo=ve.Id
		// 							JOIN TipoVeiculo tve ON ve.idTipoVeiculo=tve.Id
		// 							JOIN Editorias ed ON nt.idEditoria=ed.Id
		// 							WHERE
		// 							ent.Liberada = 1 AND
		// 							ent.IdEmpresa = $idclient AND
		// 							tve.Id = 9
		// 							ORDER BY nt.Id DESC";
		// $data['last_radion'] = $this->db->query($queryradio)->result_array();
		// $queryprint =	"SELECT TOP 1
		// 							nt.Id,nt.Titulo,nt.Subtitulo, nt.Noticia,nti.Imagem,
		// 							nt.idVeiculo,ve.Nome as Veiculo,
		// 							nt.idEditoria,ed.Nome as Editoria,
		// 							ent.IdEmpresa, em.Nome as Empresa,
		// 							nt.Data,nt.Hora
		// 							FROM Noticias nt
		// 							JOIN NoticiaImagem nti ON nt.Id = nti.idNoticia
		// 							JOIN EmpresaNoticia ent ON nt.Id=ent.idNoticia
		// 							JOIN Empresa em ON ent.IdEmpresa=em.Id
		// 							JOIN Veiculo ve ON nt.idVeiculo=ve.Id
		// 							JOIN TipoVeiculo tve ON ve.idTipoVeiculo=tve.Id
		// 							JOIN Editorias ed ON nt.idEditoria=ed.Id
		// 							WHERE
		// 							ent.Liberada = 1 AND
		// 							ent.IdEmpresa = $idclient AND
		// 							tve.Id IN (3,10,12,14,18)
		// 							ORDER BY nt.Id DESC";
		// $data['last_printn'] = $this->db->query($queryprint)->result_array();
		// $queryonline =	"SELECT TOP 1
		// 								nt.Id,nt.Titulo,nt.Subtitulo, nt.Noticia,nti.Imagem,
		// 								nt.idVeiculo,ve.Nome as Veiculo,
		// 								nt.idEditoria,ed.Nome as Editoria,
		// 								ent.IdEmpresa, em.Nome as Empresa,
		// 								nt.Data,nt.Hora
		// 								FROM Noticias nt
		// 								JOIN NoticiaImagem nti ON nt.Id = nti.idNoticia
		// 								JOIN EmpresaNoticia ent ON nt.Id=ent.idNoticia
		// 								JOIN Empresa em ON ent.IdEmpresa=em.Id
		// 								JOIN Veiculo ve ON nt.idVeiculo=ve.Id
		// 								JOIN TipoVeiculo tve ON ve.idTipoVeiculo=tve.Id
		// 								JOIN Editorias ed ON nt.idEditoria=ed.Id
		// 								WHERE
		// 								ent.Liberada = 1 AND
		// 								ent.IdEmpresa = $idclient AND
		// 								tve.Id IN (2,13)
		// 								ORDER BY nt.Id DESC";
		// $data['last_onlinen'] = $this->db->query($queryonline)->result_array();
		return $data;
	}

	public function get_client_news($idclient, $startdate = null, $enddate = null) {
		if (is_null($startdate)) {
			$startdate = date('Y-m-d');
			$enddate = date('Y-m-d');
		}
		// $this->db->cache_on();
		$query =	"SELECT
					nt.Id,nt.Titulo,nt.Subtitulo,nt.Noticia,
					tve.Id as idTipoVeiculo,tve.Nome as TipoVeiculo,
					nt.idVeiculo,ve.Nome as Veiculo,
					nt.idEditoria,ed.Nome as Editoria,
					ent.IdEmpresa, em.Nome as Empresa,
					nt.Data,nt.Hora
					FROM Noticias nt
					JOIN EmpresaNoticia ent ON nt.Id=ent.idNoticia
					JOIN Empresa em ON ent.IdEmpresa=em.Id
					JOIN Veiculo ve ON nt.idVeiculo=ve.Id
					JOIN TipoVeiculo tve ON ve.idTipoVeiculo=tve.Id
					JOIN Editorias ed ON nt.idEditoria=ed.Id
					WHERE
					ent.Liberada = 1 AND
					ent.IdEmpresa = $idclient AND
					tve.Id NOT IN (17,27,26,24,23) AND
					nt.DATA >= '$startdate' AND nt.DATA <= '$enddate'
					ORDER BY nt.DATA, nt.HORA DESC";
		$result = $this->db->query($query)->result_array();
		return $result;
	}

	public function get_client_subjects($idclient) {
		$sqlquery = "SELECT * FROM Assunto WHERE idEmpresa = $idclient ORDER BY Nome ASC";
		return $this->db->query($sqlquery)->result_array();
	}

	public function get_subject_keywords($idsubject) {
		$sqlquery = "SELECT * FROM PalavraChave WHERE Ativo = 1 AND idAssunto = $idsubject ORDER BY Nome ASC";
		return $this->db->query($sqlquery)->result_array();
	}

	public function get_veiculos_tipoveiculos($tveiculoid) {
		$sqlquery = "SELECT * FROM Veiculo WHERE idTipoVeiculo = $tveiculoid ORDER BY Nome ASC";
		return $this->db->query($sqlquery)->result_array();
	}

	public function get_editorias_veiculos($veiculoid) {
		$sqlquery = "SELECT * FROM Editorias WHERE idVeiculo = $veiculoid ORDER BY Nome ASC";
		return $this->db->query($sqlquery)->result_array();
	}

	public function get_editorias_sites($qtext) {
		$sqlquery = "SELECT Id, Nome FROM Veiculo WHERE idTipoVeiculo = 4 AND Nome LIKE '".$qtext."%' ORDER BY Nome ASC";
		return $this->db->query($sqlquery)->result_array();
	}

	public function get_client_subjectskeywords($idclient, $startdate = null, $enddate = null) {
		if (is_null($startdate)) {
			$startdate = date('Y-m-d');
			$enddate = date('Y-m-d');
		}

		$sqlquery = "SELECT
								ast.Id AS IdAssunto, ast.Nome AS Assunto, ast.Ordem, s.AQNoticias,
								pc.Id AS IdPChave, pc.Nome AS PChave, pc.TermoBusca, pc.Grifar, p.PQNoticias
								FROM Assunto ast
								JOIN PalavraChave pc ON ast.Id = pc.idAssunto
								LEFT JOIN
									(SELECT ast.Id, COUNT(nt.Id) as AQNoticias
									FROM Noticias nt
									JOIN NoticiaPalavraChave npc ON nt.Id = npc.idNoticia
									JOIN PalavraChave pc ON npc.idPalavraChave = pc.Id
									JOIN Assunto ast ON ast.Id = pc.idAssunto
									WHERE ast.idEmpresa = $idclient AND
									pc.Ativo = 1 AND
									nt.Data >= '$startdate' AND nt.Data <= '$enddate'
									GROUP BY ast.Id) s ON s.Id = ast.Id
								LEFT JOIN
									(SELECT pc.Id, COUNT(nt.Id) as PQNoticias
									FROM Noticias nt
									JOIN NoticiaPalavraChave npc ON nt.Id = npc.idNoticia
									JOIN PalavraChave pc ON npc.idPalavraChave = pc.Id
									JOIN Assunto ast ON ast.Id = pc.idAssunto
									WHERE ast.idEmpresa = $idclient AND
									pc.Ativo = 1 AND
									nt.Data >= '$startdate' AND nt.Data <= '$enddate'
									GROUP BY pc.Id) p ON p.Id = pc.Id
								WHERE ast.idEmpresa = $idclient AND pc.Ativo = 1
								ORDER BY ast.Ordem, ast.Id, pc.Id ASC";
		return $this->db->query($sqlquery)->result_array();
	}

	public function get_print_news($startdate = null, $enddate = null) {
		if (is_null($startdate)) {
			$startdate = date('Y-m-d');
			$enddate = date('Y-m-d');
		}
		// $this->db->cache_on();
		$sqlquery =	"SELECT
								ent.IdEmpresa, em.Nome as Empresa,
								nt.Id,nt.Titulo, nt.Noticia,
								tve.Id as IdTipoVeiculo, tve.Nome as TipoVeiculo,
								nt.idVeiculo as IdVeiculo, ve.Nome as Veiculo,
								nt.idEditoria as IdEditoria, ed.Nome as Editoria,
								nt.Data, nt.Hora
								FROM Noticias nt
								JOIN EmpresaNoticia ent ON nt.Id = ent.idNoticia
								JOIN Empresa em ON ent.IdEmpresa = em.Id
								JOIN Veiculo ve ON nt.idVeiculo = ve.Id
								JOIN TipoVeiculo tve ON ve.idTipoVeiculo = tve.Id
								JOIN Editorias ed ON nt.idEditoria = ed.Id
								WHERE
								tve.Id IN (3, 10, 12, 14, 18, 27) AND
								ent.Liberada = 1 AND
								ent.IdEmpresa IN (SELECT Id FROM Empresa WHERE Status = 1 AND Owner = 2 AND Banner IS NOT NULL) AND
								nt.Data >= '$startdate' AND nt.Data <= '$enddate'
								ORDER BY em.Nome ASC, nt.DATA, nt.HORA DESC";
		return $this->db->query($sqlquery)->result_array();
	}

	public function get_single_news_keyword($newsid, $keywordid) {
		$sqlquery =	"SELECT nt.*, ve.Nome as Veiculo, ed.Nome as Editoria,
								nti.Id as IdImagem, nti.Imagem, nti.url as ImagemURL,
								ass.Id as IdAssunto, ass.Nome as Assunto,
								pc.Id as IdPChave, pc.Nome as PChave, pc.Grifar,
								ent.Motivacao, ent.Avaliacao
								FROM Noticias nt
								JOIN EmpresaNoticia ent ON  ent.idNoticia = nt.Id
								JOIN NoticiaPalavraChave npc ON npc.idNoticia = nt.Id
								JOIN PalavraChave pc ON pc.Id = npc.idPalavraChave
								JOIN Assunto ass ON ass.Id = pc.idAssunto
								JOIN Veiculo ve ON nt.idVeiculo = ve.Id
								JOIN Editorias ed ON nt.idEditoria = ed.Id
								LEFT JOIN NoticiaImagem nti ON nt.Id = nti.idNoticia
								WHERE nt.Id = $newsid AND pc.Id = $keywordid";
		return $this->db->query($sqlquery)->result_array();
	}

	public function get_single_news($newsid, $idclient) {
		$sqlquery =	"SELECT nt.*, tve.id IdTipoVeiculo, tve.Nome as TipoVeiculo,
								ve.Nome as Veiculo, ed.Nome as Editoria,
								nti.Id as IdImagem, nti.Imagem, nti.url as ImagemURL,
								nti.MarcarX1, nti.MarcarX2, nti.MarcarY1, nti.MarcarY2, nti.MarcarW, nti.MarcarH,
								ass.Id as IdAssunto, ass.Nome as Assunto,
								pc.Id as IdPChave, pc.Nome as PChave, pc.Grifar,
								ent.Motivacao, ent.Avaliacao,
								CASE WHEN ntd.det_audiencia > 0 THEN ntd.det_audiencia ELSE (COALESCE(ed.Valor, 0) + 250) * re.aud_mt END as Audiencia,
								CASE WHEN ntd.det_valor > 0 THEN ntd.det_valor ELSE COALESCE(ed.Valor, 0) + 250 END as Equivalencia
								FROM Noticias nt
								LEFT JOIN NoticiaDetalhes ntd ON nt.Id = ntd.det_id_noticia
								JOIN NoticiaPalavraChave npc ON npc.idNoticia = nt.Id
								JOIN PalavraChave pc ON pc.Id = npc.idPalavraChave
								JOIN Assunto ass ON ass.Id = pc.idAssunto
								JOIN EmpresaNoticia ent ON  ent.idNoticia = nt.Id AND ent.IdEmpresa = ass.idEmpresa
								JOIN Veiculo ve ON nt.idVeiculo = ve.Id
								JOIN TipoVeiculo tve ON ve.idTipoVeiculo = tve.Id
								JOIN Editorias ed ON nt.idEditoria = ed.Id
								JOIN Releva re ON ve.TiragemSemana = re.aud_ts
								LEFT OUTER JOIN NoticiaImagem nti ON nt.Id = nti.idNoticia
								WHERE nt.Id = $newsid AND ent.IdEmpresa = $idclient";
		return $this->db->query($sqlquery)->result_array();
	}

	public function get_client_keyword_news($keywordid, $clientid, $startdate = null, $enddate = null) {
		if (is_null($startdate)) {
			$startdate = date('Y-m-d');
			$enddate = date('Y-m-d');
		}

		$sqlquery =	"SELECT
								nt.Id, nt.Titulo, nt.Noticia, nt.URL, nt.Data, nt.Hora,
								tve.Id as IdTipoVeiculo, tve.Nome as TipoVeiculo,
								nt.idVeiculo, ve.Nome as Veiculo,
								nt.idEditoria, ed.Nome as Editoria,
								ntp.idPalavraChave, plc.Nome as PalavraChave,
								CASE WHEN ntd.det_valor > 0 THEN ntd.det_valor ELSE COALESCE(ed.Valor, 0) + 250 END as EdValor,
								CASE WHEN ntd.det_audiencia > 0 THEN ntd.det_audiencia ELSE (COALESCE(ed.Valor, 0) + 250) * re.aud_mt END as EdAudiencia,
								ntp.Avaliacao, ntp.Motivacao
								FROM Noticias nt
								INNER JOIN NoticiaPalavraChave ntp ON nt.Id = ntp.idNoticia
								INNER JOIN PalavraChave plc ON ntp.idPalavraChave = plc.Id
								INNER JOIN Veiculo ve ON nt.idVeiculo = ve.Id
								LEFT JOIN Releva re ON ve.TiragemSemana = re.aud_ts
								INNER JOIN TipoVeiculo tve ON ve.idTipoVeiculo = tve.Id
								INNER JOIN Editorias ed ON nt.idEditoria = ed.Id
								LEFT JOIN NoticiaDetalhes ntd ON nt.Id = ntd.det_id_noticia
								INNER JOIN Assunto ass ON plc.idAssunto = ass.Id
								INNER JOIN EmpresaNoticia ent ON ent.idNoticia = nt.Id AND ent.IdEmpresa = ass.idEmpresa
								WHERE
								nt.Data BETWEEN '$startdate' AND '$enddate' AND
								ent.IdEmpresa = $clientid AND
								ntp.idPalavraChave = $keywordid
								ORDER BY nt.Data DESC";
		return $this->db->query($sqlquery)->result_array();
	}

	public function get_newspaper($startdate = null, $enddate = null) {
		if (is_null($startdate)) {
			$today = date('Y-m-d');
			// $this->db->cache_on();
			$sqlquery =	"SELECT
							nt.IdVeiculo, ve.Nome as Veiculo,
							ent.IdEmpresa, em.Nome as Empresa,
							nt.Id, nt.Titulo, nt.Subtitulo, nt.Noticia, nt.Data, nt.Hora,
							ntr.Id as IdRevisao, ntr.idUsuario as IdRUsuario
							FROM Noticias nt
							JOIN EmpresaNoticia ent ON nt.Id = ent.idNoticia
							JOIN Empresa em ON ent.IdEmpresa = em.Id
							JOIN Veiculo ve ON nt.idVeiculo = ve.Id
							JOIN TipoVeiculo tve ON ve.idTipoVeiculo = tve.Id
							JOIN Editorias ed ON nt.idEditoria = ed.Id
							LEFT JOIN NoticiasRevisao ntr ON nt.Id = ntr.idNoticia
							WHERE
							tve.Id IN (3, 10, 12, 14, 18, 27) AND
							ent.Liberada = 1 AND
							nt.DATA = '$today' AND
							ntr.Id IS NULL AND
							ent.IdEmpresa IN (SELECT Id FROM Empresa WHERE Status = 1 AND Owner = 2 AND Banner IS NOT NULL)
							ORDER BY ve.Nome, em.Nome ASC";
			$result = $this->db->query($sqlquery)->result_array();
		} else {
			$sqlquery =	"SELECT
							nt.IdVeiculo, ve.Nome as Veiculo,
							ent.IdEmpresa, em.Nome as Empresa,
							nt.Id, nt.Titulo, nt.Subtitulo, nt.Noticia, nt.Data, nt.Hora,
							ntr.Id as IdRevisao, ntr.idUsuario as IdRUsuario
							FROM Noticias nt
							JOIN EmpresaNoticia ent ON nt.Id = ent.idNoticia
							JOIN Empresa em ON ent.IdEmpresa = em.Id
							JOIN Veiculo ve ON nt.idVeiculo = ve.Id
							JOIN TipoVeiculo tve ON ve.idTipoVeiculo = tve.Id
							JOIN Editorias ed ON nt.idEditoria = ed.Id
							LEFT JOIN NoticiasRevisao ntr ON nt.Id = ntr.idNoticia
							WHERE
							tve.Id IN (3, 10, 12, 14, 18, 27) AND
							ent.Liberada = 1 AND
							nt.DATA >= '$startdate' AND nt.DATA <= '$enddate' AND
							ntr.Id IS NULL AND
							ent.IdEmpresa IN (SELECT Id FROM Empresa WHERE Status = 1 AND Owner = 2 AND Banner IS NOT NULL)
							ORDER BY ve.Nome, em.Nome ASC";
			$result = $this->db->query($sqlquery)->result_array();
		}
		return $result;
	}

	public function count_newspaper_clientnews($idnpaper, $idclient, $offset, $startdate = null, $enddate = null) {
		if (is_null($startdate)) {
			$today = date('Y-m-d');
			// $this->db->cache_on();
			$sqlquery =	"SELECT COUNT(nt.Id) as QNoticias
							FROM Noticias nt
							JOIN Veiculo ve ON nt.idVeiculo = ve.Id
							JOIN TipoVeiculo tve ON ve.idTipoVeiculo = tve.Id
							JOIN Editorias ed ON nt.idEditoria = ed.Id
							JOIN EmpresaNoticia ent on nt.Id = ent.idNoticia
							JOIN Empresa em ON ent.IdEmpresa = em.Id
							JOIN NoticiaPalavraChave npc ON nt.Id = npc.idNoticia
							JOIN PalavraChave pc ON npc.idPalavraChave = pc.Id
							LEFT JOIN NoticiaImagem nimg ON nt.Id = nimg.idNoticia
							WHERE
							nt.idVeiculo = $idnpaper AND
							ent.IdEmpresa = $idclient AND
							nt.Data = '$today'";
			$result = $this->db->query($sqlquery)->row()->QNoticias;
		} else {
			$result = "not ready";
		}
		return $result;
	}

	public function get_newspaper_clientnews($idnpaper, $idclient, $offset, $startdate = null, $enddate = null) {
		if (is_null($startdate)) {
			$today = date('Y-m-d');
			// $this->db->cache_on();
			$sqlquery =		"SELECT
							ve.Id as IdVeiculo, ve.Nome as Veiculo,
							tve.Id as IdTVeiculo, tve.Nome as TVeiculo,
							ed.Id as IdEditoria, ed.Nome as Editoria,
							em.Id as IdEmpresa, em.Nome as Empresa,
							nt.Id as IdNoticia, nt.Titulo as Titulo, nt.Subtitulo as Subtitulo, nt.Noticia, nt.Data, nt.Hora, nt.URL as NoticiaURL,
							pc.Id as IdPChave, pc.Nome as PChave, pc.TermoBusca,
							nimg.Id as IdImagem, nimg.Imagem, nimg.url as URLImagem
							FROM Noticias nt
							JOIN Veiculo ve ON nt.idVeiculo = ve.Id
							JOIN TipoVeiculo tve ON ve.idTipoVeiculo = tve.Id
							JOIN Editorias ed ON nt.idEditoria = ed.Id
							JOIN EmpresaNoticia ent on nt.Id = ent.idNoticia
							JOIN Empresa em ON ent.IdEmpresa = em.Id
							JOIN NoticiaPalavraChave npc ON nt.Id = npc.idNoticia
							JOIN PalavraChave pc ON npc.idPalavraChave = pc.Id
							LEFT JOIN NoticiaImagem nimg ON nt.Id = nimg.idNoticia
							LEFT JOIN NoticiasRevisao ntr ON nt.Id = ntr.idNoticia
							WHERE
							nt.idVeiculo = $idnpaper AND
							ent.IdEmpresa = $idclient AND
							nt.Data = '$today' AND
							ntr.Id IS NULL
							ORDER BY ve.Id, em.Id, ed.Id, nt.Id, pc.Id, nimg.Id ASC";
							// OFFSET $offset ROWS FETCH NEXT 10 ROWS ONLY";
			$result = $this->db->query($sqlquery)->result_array();
		} else {
			$result = "not ready";
		}
		return $result;
	}

	public function count_client_print_news($idclient, $startdate = null, $enddate = null) {
		if (is_null($startdate)) {
			$today = date('Y-m-d');
			$sqlquery =	"SELECT COUNT(nt.Id)
							FROM Noticias nt
							JOIN NoticiaImagem nti ON nt.Id = nti.idNoticia
							JOIN EmpresaNoticia ent ON nt.Id = ent.idNoticia
							JOIN Empresa em ON ent.IdEmpresa = em.Id
							JOIN Veiculo ve ON nt.idVeiculo = ve.Id
							JOIN TipoVeiculo tve ON ve.idTipoVeiculo = tve.Id
							JOIN Editorias ed ON nt.idEditoria = ed.Id
							JOIN NoticiaPalavraChave ntpc ON nt.Id = ntpc.idNoticia
							JOIN PalavraChave pc ON ntpc.idPalavraChave = pc.Id
							LEFT JOIN NoticiasRevisao ntr ON nt.Id = ntr.idNoticia
							WHERE
							tve.Id IN (3, 10, 12, 14, 18, 27) AND
							ntr.Id IS NULL AND
							ent.Liberada = 1 AND
							nt.DATA = '$today' AND
							ent.IdEmpresa = $idclient";
			$result = $this->db->query($sqlquery)->result_array();
		} else {
			$result = "not ready";
		}
		return $result;
	}

	public function get_client_print_news($idclient, $offset, $startdate = null, $enddate = null) {
		if (is_null($startdate)) {
			$today = date('Y-m-d');
			// $this->db->cache_on();
			$sqlquery =	"SELECT
							ent.IdEmpresa, em.Nome as Empresa,
							nt.Id, nt.Titulo, nt.Noticia,
							pc.Id as IdPChave, pc.Nome as PChave, pc.TermoBusca,
							nti.Id as IdImagem, nti.Imagem, nti.url as ImagemURL,
							tve.Id as IdTipoVeiculo, tve.Nome as TipoVeiculo,
							nt.idVeiculo as IdVeiculo, ve.Nome as Veiculo,
							nt.idEditoria as IdEditoria, ed.Nome as Editoria,
							nt.Data, nt.Hora
							FROM Noticias nt
							LEFT JOIN NoticiaImagem nti ON nt.Id = nti.idNoticia
							JOIN EmpresaNoticia ent ON nt.Id = ent.idNoticia
							JOIN Empresa em ON ent.IdEmpresa = em.Id
							JOIN Veiculo ve ON nt.idVeiculo = ve.Id
							JOIN TipoVeiculo tve ON ve.idTipoVeiculo = tve.Id
							JOIN Editorias ed ON nt.idEditoria = ed.Id
							JOIN NoticiaPalavraChave ntpc ON nt.Id = ntpc.idNoticia
							JOIN PalavraChave pc ON ntpc.idPalavraChave = pc.Id
							LEFT JOIN NoticiasRevisao ntr ON nt.Id = ntr.idNoticia
							WHERE
							tve.Id IN (3, 10, 12, 14, 18, 27) AND
							ntr.Id IS NULL AND
							ent.Liberada = 1 AND
							nt.DATA = '$today' AND
							ent.IdEmpresa = $idclient
							ORDER BY nt.Id ASC, nt.DATA, nt.HORA DESC
							OFFSET $offset ROWS FETCH NEXT 100 ROWS ONLY";
			$result = $this->db->query($sqlquery)->result_array();
		} else {
			$result = "not ready";
		}
		return $result;
	}

	public function get_client_imgs_news($idclient, $idnews) {
		$sqlquery = "";
		$result = $this->db->query($sqlquery)->result_array();
	}

	public function count_subject_news($idsubject, $startdate = null, $enddate = null) {
		if (is_null($startdate)) {
			$startdate = date('Y-m-d');
			$enddate = date('Y-m-d');
		}

		$sqlquery = "SELECT
								COUNT(nt.Id) AS NoticiasAssuntos
								FROM Noticias nt
								JOIN NoticiaPalavraChave npc ON nt.Id = npc.idNoticia
								JOIN PalavraChave pc ON npc.idPalavraChave = pc.Id
								JOIN Assunto ast ON ast.Id = pc.idAssunto
								WHERE
								ast.Id = $idsubject AND
								nt.Data >= '$startdate' AND nt.Data <= '$enddate'";
		return $this->db->query($sqlquery)->row()->NoticiasAssuntos;
	}

	public function count_keyword_news($idkeyword, $startdate = null, $enddate = null) {
		if (is_null($startdate)) {
			$startdate = date('Y-m-d');
			$enddate = date('Y-m-d');
		}

		$sqlquery = "SELECT
								COUNT(nt.Id) AS NoticiasAssuntos
								FROM Noticias nt
								JOIN NoticiaPalavraChave npc ON nt.Id = npc.idNoticia
								JOIN PalavraChave pc ON npc.idPalavraChave = pc.Id
								JOIN Assunto ast ON ast.Id = pc.idAssunto
								WHERE
								pc.Id = $idkeyword AND
								nt.Data >= '$startdate' AND nt.Data <= '$enddate'";
		return $this->db->query($sqlquery)->row()->NoticiasAssuntos;
	}

	public function get_tveiculos() {
		$sqlquery =	"SELECT Id, Nome FROM TipoVeiculo WHERE Id NOT IN (17,27,26,24,23) ORDER BY Nome ASC";
		return $this->db->query($sqlquery)->result_array();
	}

	public function count_vtype_news($idclient, $startdate = null, $enddate = null) {
		if (is_null($startdate)) {
			$startdate = date('Y-m-d');
			$enddate = date('Y-m-d');
		}

		$sqlquery =	"SELECT tve.Id, tve.Nome, COUNT(nt.Id) as QNoticias
								FROM Noticias nt
								INNER JOIN EmpresaNoticia ent ON ent.idNoticia = nt.Id
								INNER JOIN Veiculo ve ON ve.Id = nt.idVeiculo
								INNER JOIN TipoVeiculo tve ON tve.Id = ve.idTipoVeiculo
								WHERE ent.IdEmpresa = $idclient AND tve.Id NOT IN (17,27,26,24,23) AND
								nt.Data >= '$startdate' AND nt.Data <= '$enddate'
								GROUP BY tve.Id, tve.Nome";
		return $this->db->query($sqlquery)->result_array();
	}

	public function count_rating_news($idclient, $startdate = null, $enddate = null) {
		if (is_null($startdate)) {
			$startdate = date('Y-m-d');
			$enddate = date('Y-m-d');
		}

		$sqlquery =	"SELECT ent.Avaliacao,
								CASE WHEN ent.Avaliacao = 1 THEN CONCAT('-',COUNT(nt.Id)) ELSE COUNT(nt.Id) END AS QNoticias
								FROM Noticias nt
								INNER JOIN EmpresaNoticia ent ON ent.idNoticia = nt.Id
								WHERE ent.IdEmpresa = $idclient AND
								nt.Data >= '$startdate' AND nt.Data <= '$enddate'
								GROUP BY ent.Avaliacao ORDER BY ent.Avaliacao ASC";
		return $this->db->query($sqlquery)->result_array();
	}

	public function count_states_news($idclient, $startdate = null, $enddate = null) {
		if (is_null($startdate)) {
			$startdate = date('Y-m-d');
			$enddate = date('Y-m-d');
		}

		$sqlquery =	"SELECT est.Id, est.uf, est.nome as Estado, COUNT(nt.Id) as QNoticias
								FROM Noticias nt
								JOIN EmpresaNoticia ent ON ent.idNoticia = nt.Id
								JOIN Veiculo ve ON ve.id = nt.idVeiculo
								JOIN dados_estados est ON est.id = ve.idEstado
								WHERE ent.IdEmpresa = $idclient AND
								nt.Data >= '$startdate' AND nt.Data <= '$enddate'
								GROUP BY est.id, est.uf, est.nome
								ORDER BY est.nome ASC";
		return $this->db->query($sqlquery)->result_array();
	}

	public function get_states() {
		$sqlquery =	"SELECT id, uf, nome FROM dados_estados";
		return $this->db->query($sqlquery)->result_array();
	}

	public function count_client_news($idclient, $startdate = null, $enddate = null) {
		if (is_null($startdate)) {
			$startdate = date('Y-m-d');
			$enddate = date('Y-m-d');
		}

		$sqlquery =	"SELECT
								nt.Data,
								COUNT(nt.Id) as QNoticias,
								SUM(CASE WHEN ntd.det_audiencia > 0 THEN ntd.det_audiencia ELSE (COALESCE(ed.Valor, 0) + 250) * re.aud_mt END) as EdAudiencia,
								SUM(CASE WHEN ntd.det_valor > 0 THEN ntd.det_valor ELSE COALESCE(ed.Valor, 0) + 250 END) as EdValor
								FROM Noticias nt
								INNER JOIN NoticiaPalavraChave ntp ON nt.Id = ntp.idNoticia
								INNER JOIN PalavraChave plc ON ntp.idPalavraChave = plc.Id
								INNER JOIN Assunto ass ON plc.idAssunto = ass.Id
								INNER JOIN Veiculo ve ON nt.idVeiculo = ve.Id
								LEFT JOIN Releva re ON ve.TiragemSemana = re.aud_ts
								INNER JOIN TipoVeiculo tve ON ve.idTipoVeiculo = tve.Id
								INNER JOIN Editorias ed ON nt.idEditoria = ed.Id
								LEFT JOIN NoticiaDetalhes ntd ON nt.Id = ntd.det_id_noticia
								INNER JOIN EmpresaNoticia ent ON ent.idNoticia = nt.Id AND ent.IdEmpresa = ass.idEmpresa
								WHERE
								ent.IdEmpresa = $idclient AND
								nt.Data >= '$startdate' AND nt.Data <= '$enddate'
								GROUP BY nt.Data
								ORDER BY nt.Data ASC";
		return $this->db->query($sqlquery)->result_array();
	}

	public function get_news_export($idclient, $startdate, $enddate) {
		if (is_null($startdate)) {
			$startdate = date('Y-m-d');
			$enddate = date('Y-m-d');
		}

		$sqlquery = 	"SELECT
									nt.Id, nt.Data, nt.Hora, nt.Titulo, nt.URL,
									tve.Nome as TipodeVeiculo, ve.Nome as Veiculo, ed.Nome as Editoria, ass.Nome as Assunto, plc.Nome as PalavraChave,
									ed.Formato, ve.TiragemSemana as Tier, nim.MarcarW, nim.MarcarH, nim.Imagem,
									CASE WHEN ntd.det_audiencia > 0 THEN ntd.det_audiencia ELSE (COALESCE(ed.Valor, 0) + 250) * re.aud_mt END as Audiencia,
									CASE WHEN ntd.det_valor > 0 THEN ntd.det_valor ELSE COALESCE(ed.Valor, 0) + 250 END as Equivalencia
									FROM Noticias nt
									INNER JOIN NoticiaPalavraChave ntp ON nt.Id = ntp.idNoticia
									INNER JOIN PalavraChave plc ON ntp.idPalavraChave = plc.Id
									INNER JOIN Veiculo ve ON nt.idVeiculo = ve.Id
									LEFT JOIN Releva re ON ve.TiragemSemana = re.aud_ts
									INNER JOIN TipoVeiculo tve ON ve.idTipoVeiculo = tve.Id
									INNER JOIN Editorias ed ON nt.idEditoria = ed.Id
									LEFT JOIN NoticiaDetalhes ntd ON nt.Id = ntd.det_id_noticia
									INNER JOIN Assunto ass ON plc.idAssunto = ass.Id
									INNER JOIN EmpresaNoticia ent ON ent.idNoticia = nt.Id AND ent.IdEmpresa = ass.idEmpresa
									INNER JOIN NoticiaImagem nim ON nim.idNoticia = nt.Id
									WHERE
									ntp.idPalavraChave IN (SELECT pc.Id FROM Assunto ast JOIN PalavraChave pc ON pc.idAssunto = ast.Id WHERE ast.IdEmpresa = $idclient) AND
									nt.Data >= '$startdate' AND nt.Data <= '$enddate'
									ORDER BY nt.Id ASC LIMIT 20";
		return $this->db->query($sqlquery)->result_array();
	}

	public function get_imgs_novalues($startdate, $enddate) {
		$sqlquery =		"SELECT
									nt.Id as IdNoticia, nt.Data,
									nti.Id as IdImagem, nti.Imagem,
									nti.MarcarW, nti.MarcarH,
									ed.Valor as ValorEditoria, ed.Formato
									FROM Noticias nt
									INNER JOIN Editorias ed ON nt.idEditoria = ed.Id
									INNER JOIN Veiculo ve ON nt.idVeiculo = ve.Id
									INNER JOIN TipoVeiculo tve ON ve.idTipoVeiculo = tve.Id
									INNER JOIN NoticiaImagem nti ON nt.Id = nti.idNoticia
									LEFT OUTER JOIN ImagemExp ixp ON nt.Id = ixp.img_id_noticia
									WHERE
									nt.Data BETWEEN '$startdate' AND '$enddate' AND
									tve.Id IN (3,10,12,18) AND
									ixp.img_id_imagem IS NULL AND
									nti.MarcarW > 1 AND nti.MarcarH > 1
									OR nt.Data BETWEEN '$startdate' AND '$enddate' AND
									tve.Id IN (3,10,12,18) AND
									ixp.img_id_imagem IS NOT NULL AND
									nti.MarcarW > 1 AND nti.MarcarH > 1 AND ixp.img_valor = 0";
		return $this->db->query($sqlquery)->result_array();
	}

	public function set_imgs_values($data) {
		$query = $this->db->query("SELECT * FROM ImagemExp WHERE img_id_imagem = ".$data['IdImagem']);
		$resultquery = $query->num_rows();
		if ($resultquery == 0) {
			$data_insert = array(
				'img_id_imagem' => $data['IdImagem'],
				'img_id_noticia' => $data['IdNoticia'],
				'img_width' => $data['imgwidth'],
				'img_height' => $data['imgheight'],
				'img_midia' => 1,
				'img_valor' => $data['equivalencia'],
				'img_cm' => 0
			);
			$this->db->insert('ImagemExp', $data_insert);
			return 'insert';
		} else {
			$this->db->set('img_valor', $data['equivalencia']);
			$this->db->where('img_id_imagem', $data['IdImagem']);
			$this->db->where('img_id_noticia', $data['IdNoticia']);
			$this->db->update('ImagemExp');
			return 'update';
		}
	}

	public function set_aval($data) {
		$this->db->set('Avaliacao', $data['aval']);
		$this->db->where('IdEmpresa', $data['idclient']);
		$this->db->where('IdNoticia', $data['idnews']);
		$this->db->update('NoticiaPalavraChave');

		$this->db->set('Avaliacao', $data['aval']);
		$this->db->where('IdEmpresa', $data['idclient']);
		$this->db->where('IdNoticia', $data['idnews']);
		$this->db->update('EmpresaNoticia');

		if ($this->db->trans_complete()) {
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function set_moti($data) {
		$this->db->set('Motivacao', $data['moti']);
		$this->db->where('IdEmpresa', $data['idclient']);
		$this->db->where('IdNoticia', $data['idnews']);
		$this->db->update('NoticiaPalavraChave');

		$this->db->set('Motivacao', $data['moti']);
		$this->db->where('IdEmpresa', $data['idclient']);
		$this->db->where('IdNoticia', $data['idnews']);
		$this->db->update('EmpresaNoticia');

		if ($this->db->trans_complete()) {
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function advsearch($data) {
		$startdate = $data['startdate'];
		$enddate = $data['enddate'];
		$starttime = $data['starttime'];
		$endtime = $data['endtime'];
		$idempresa = $data['idempresa'];

		$countquery =	"SELECT DISTINCT
									COUNT(nt.Id) as quant
									FROM Noticias nt
									INNER JOIN NoticiaPalavraChave npc ON nt.Id = npc.idNoticia
									INNER JOIN PalavraChave pc ON npc.idPalavraChave = pc.Id
									INNER JOIN Assunto ass ON npc.idAssunto = ass.Id
									INNER JOIN Editorias ed ON npc.idEditoria = ed.Id
									INNER JOIN Veiculo ve ON ed.idVeiculo = ve.Id
									INNER JOIN TipoVeiculo tve ON ve.idTipoVeiculo = tve.Id
									LEFT JOIN dados_estados est ON ve.idEstado = est.id
									LEFT JOIN dados_cidades cid on ve.idCidade = cid.id
									LEFT JOIN NoticiaDetalhes ntd ON nt.Id = ntd.det_id_noticia
									LEFT JOIN Releva re ON ve.TiragemSemana = re.aud_ts
									INNER JOIN EmpresaNoticia ent ON nt.Id = ent.idNoticia
									INNER JOIN Empresa em ON ent.idEmpresa = em.Id
									WHERE nt.Data BETWEEN '$startdate' AND '$enddate' AND
									npc.Liberada = 1 AND
									npc.idEmpresa = $idempresa ";

		$sqlquery =	"SELECT DISTINCT
								nt.Id, nt.Titulo, nt.Noticia, nt.URL, nt.Data, nt.Hora,
								tve.Id as IdTipoVeiculo, tve.Nome as TipoVeiculo,
								nt.idVeiculo, ve.Nome as Veiculo,
								nt.idEditoria, ed.Nome as Editoria,
								ass.Id as IdAssunto, ass.Nome as Assunto,
								pc.Id as idPalavraChave,
								pc.Nome as PalavraChave,
								CASE WHEN ntd.det_valor > 0 THEN ntd.det_valor ELSE COALESCE(ed.Valor, 0) + 250 END as EdValor,
								CASE WHEN ntd.det_audiencia > 0 THEN ntd.det_audiencia ELSE (COALESCE(ed.Valor, 0) + 250) * re.aud_mt END as EdAudiencia,
								npc.Avaliacao, npc.Motivacao
								FROM Noticias nt
								INNER JOIN NoticiaPalavraChave npc ON nt.Id = npc.idNoticia
								INNER JOIN PalavraChave pc ON npc.idPalavraChave = pc.Id
								INNER JOIN Assunto ass ON npc.idAssunto = ass.Id
								INNER JOIN Editorias ed ON npc.idEditoria = ed.Id
								INNER JOIN Veiculo ve ON ed.idVeiculo = ve.Id
								INNER JOIN TipoVeiculo tve ON ve.idTipoVeiculo = tve.Id
								LEFT JOIN dados_estados est ON ve.idEstado = est.id
								LEFT JOIN dados_cidades cid on ve.idCidade = cid.id
								LEFT JOIN NoticiaDetalhes ntd ON nt.Id = ntd.det_id_noticia
								LEFT JOIN Releva re ON ve.TiragemSemana = re.aud_ts
								INNER JOIN EmpresaNoticia ent ON nt.Id = ent.idNoticia
								INNER JOIN Empresa em ON ent.idEmpresa = em.Id
								WHERE nt.Data BETWEEN '$startdate' AND '$enddate' AND
								npc.Liberada = 1 AND
								npc.idEmpresa = $idempresa ";

		if (count($data['subjectsid']) >= 1) {
			$idsassunto = implode(',', $data['subjectsid']);
			$sqlquery .= "AND npc.idAssunto IN ($idsassunto) ";
			$countquery .= "AND npc.idAssunto IN ($idsassunto) ";
		}
		if (count($data['keywordsid']) >= 1) {
			$idspchave = implode(',', $data['keywordsid']);
			$sqlquery .= "AND npc.idPalavraChave IN ($idspchave) ";
			$countquery .= "AND npc.idPalavraChave IN ($idspchave) ";
		}
		if (count($data['tveiculosid']) >= 1) {
			$idstveiculo = implode(',', $data['tveiculosid']);
			$sqlquery .= "AND npc.idTipoVeiculo IN ($idstveiculo) ";
			$countquery .= "AND npc.idTipoVeiculo IN ($idstveiculo) ";
		}
		if (count($data['veiculosid']) >= 1) {
			var_dump('IdVeiculos Maior ou igual que 1');
			$idsveiculo = implode(',', $data['veiculosid']);
			$sqlquery .= "AND npc.idVeiculo IN ($idsveiculo) ";
			$countquery .= "AND npc.idVeiculo IN ($idsveiculo) ";
		}
		if (count($data['editoriasid']) >= 1) {
			$idseditoria = implode(',', $data['editoriasid']);
			$sqlquery .= "AND npc.idEditoria IN ($idseditoria) ";
			$countquery .= "AND npc.idEditoria IN ($idseditoria) ";
		}
		if (count($data['estadosid']) >= 1) {
			$idsestados = implode(',', $data['estadosid']);
			$sqlquery .= "AND ve.idEstado IN ($idsestados) ";
			$countquery .= "AND ve.idEstado IN ($idsestados) ";
		}
		if (!is_null($data['destaque'])) {
			$destaque = $data['destaque'];
			$sqlquery .= "AND npc.Destaque = $destaque ";
			$countquery .= "AND npc.Destaque = $destaque ";
		}
		if (count($data['motivacao']) >= 1) {
			$motivacao = implode(',', $data['motivacao']);
			$sqlquery .= "AND npc.Motivacao IN ($motivacao) ";
			$countquery .= "AND npc.Motivacao IN ($motivacao) ";
		}
		if (count($data['avaliacao']) >= 1) {
			$avaliacao = implode(',', $data['avaliacao']);
			$sqlquery .= "AND npc.Avaliacao IN ($avaliacao) ";
			$countquery .= "AND npc.Avaliacao IN ($avaliacao) ";
		}


		// $sqlquery .= "GROUP BY nt.Id ";
		// $countquery .= "GROUP BY nt.Id ";

		// $sqlquery .= "GROUP BY pc.Id ";
		// $countquery .= "GROUP BY pc.Id ";

		$sqlquery .= "ORDER BY nt.Id ASC";
		// $countquery .= "ORDER BY nt.Id ASC";

		// $countdata = $this->db->query($countquery)->row('quant');
		// $fulldata['recordsTotal'] = $countdata;
		// $fulldata['recordsFiltered'] = $countdata;
		// $fulldata['query'] = $sqlquery;

		// if ($countdata <= 10) {
			// $fulldata['data'] = $this->db->query($sqlquery)->result_array();
		// } else if ($countdata > 10) {
			// $fulldata['data'] = $this->db->query($sqlquery)->result_array();
		// }
		// return $fulldata;
		return $this->db->query($sqlquery)->result_array();
	}

	public function excel_export($edata) {
		$startdate = $edata['startdate'];
		$enddate = $edata['enddate'];
		$idemp = $edata['idemp'];
		$idsnot = implode(",", $edata['idsnot']);
		$idskw = implode(",", $edata['idskw']);

		$sqlquery =	"SELECT
								nt.Id, nt.Id as IdNoticia, nt.Data, nt.Hora, nt.Titulo, nt.URL as URL_Externo,
								CONCAT('http://v20.intranet.dataclip.com.br/home/news/',nt.Id,'/',ntp.IdEmpresa) as URL_Sistema,
								tve.Nome as TipoVeiculo, ve.Nome as Veiculo, ed.Nome as Editoria,
								ass.Nome as Assunto,
								GROUP_CONCAT(DISTINCT plc.Nome ORDER BY plc.Nome SEPARATOR ', ') as PalavraChave,
								ve.TiragemSemana as Tier,
								FORMAT(CASE WHEN ntd.det_audiencia > 0 THEN ntd.det_audiencia ELSE (COALESCE(ed.Valor, 0) + 250) * re.aud_mt END,2,'pt_BR') AS Audiencia,
								CONCAT('R$ ', FORMAT(CASE WHEN ntd.det_valor > 0 THEN ntd.det_valor ELSE COALESCE(ed.Valor, 0) + 250 END,2,'pt_BR')) AS Valor,
								CASE WHEN ntp.Avaliacao = 1 THEN 'Negativo' WHEN ntp.Avaliacao = 2 THEN 'Neutro' WHEN ntp.Avaliacao = 3 THEN 'Positivo' END AS Avaliacao,
								CASE WHEN ntp.Motivacao = 1 THEN 'Espontanea' WHEN ntp.Motivacao = 2 THEN 'Provocada' END AS Motivacao
								FROM Noticias nt
								INNER JOIN NoticiaPalavraChave ntp ON nt.Id = ntp.idNoticia
								INNER JOIN PalavraChave plc ON ntp.idPalavraChave = plc.Id
								INNER JOIN Veiculo ve ON nt.idVeiculo = ve.Id
								LEFT JOIN Releva re ON ve.TiragemSemana = re.aud_ts
								INNER JOIN TipoVeiculo tve ON ve.idTipoVeiculo = tve.Id
								INNER JOIN Editorias ed ON nt.idEditoria = ed.Id
								LEFT JOIN NoticiaDetalhes ntd ON nt.Id = ntd.det_id_noticia
								INNER JOIN Assunto ass ON plc.idAssunto = ass.Id
								INNER JOIN EmpresaNoticia ent ON ent.idNoticia = nt.Id AND ent.IdEmpresa = ass.idEmpresa
								LEFT JOIN NoticiaImagem nim ON nim.idNoticia = nt.Id
								WHERE
								-- nt.Data BETWEEN '$startdate' AND '$enddate' AND
								ntp.idEmpresa = $idemp AND
								ntp.idPalavraChave IN ($idskw) AND
								nt.Id IN ($idsnot)
								GROUP BY nt.Id
								ORDER BY nt.Id ASC";

		return $this->db->query($sqlquery)->result_array();
	}

	public function get_mclipp($iduser, $idclient) {
		$sqlquery = "SELECT * FROM Selecoes WHERE idUsuario = $iduser AND idEmpresa = $idclient ORDER BY ID DESC";

		return $this->db->query($sqlquery)->result_array();
	}

	public function create_mclipp_selecoes($data) {
		$today = date('Y-m-d');
		$insert_selecoes = array(
			'idUsuario' => $data['idUsuario'],
			'Data' => $today,
			'Nome' => $data['Nome'],
			'idEmpresa' => $data['idEmpresa'],
			'AgrupadoPor2' => 1,
			'AgrupadoPor3' => 4,
			'AgrupadoPor1' => 5,
			'AgrupadoPor' => null,
			'Locked' => 0,
			'Observacao' => '',
			'Sinopse' => '',
			'Noticias' => $data['QNoticias']
		);
		$this->db->insert('Selecoes', $insert_selecoes);

		return $this->db->insert_id();
	}

	public function create_mclipp_selecoesnoticias($data) {
		$this->db->insert_batch('SelecoesNoticias', $data);
	}

	public function edit_mclipp_selecoes($data) {
		$this->db->set('Nome', $data['Nome']);
		$this->db->where('ID', $data['idSelecao']);
		$this->db->update('Selecoes');
	}

	public function del_mclipp_selecoes($data) {
		//teste
	}
}

?>