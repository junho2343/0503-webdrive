<?php 

	class DownModel extends Model{
		function down_file(){
			$idx = isset($_GET['idx']) ? $_GET['idx'] : "";
			
			access($idx,"이상한접근");
			

			$row = $this->fetch("SELECT name FROM file where idx='{$idx}'");
			$ext = explode(".",$row->name);
			$ext = isset($ext[1]) ? ".".array_pop($ext) : "";
			// echo DATA_PATH."/{$idx}{$row->ext}";
			header("content-description: file-transfer");
			header("content-disposition: attachment;filename={$row->name}");
			readfile(DATA_PATH."/{$idx}{$ext}");
		}
		function down_in(){
			$idx = isset($_GET['idx']) ? $_GET['idx'] : "";
			$m_id = isset($_SESSION['idx']) ? $_SESSION['idx'] : "";
			access($idx,"이상한접근");
			access($m_id,"이상한접근");

			$f_id = $this->fetch("SELECT f_id FROM in_share where idx='{$idx}'");
			$row = $this->fetch("SELECT name,ext FROM file where idx='{$f_id->f_id}'");

			header("content-description: file-transfer");
			header("content-disposition: attachment;filename={$row->name}");
			readfile(DATA_PATH."/{$f_id->f_id}{$row->ext}");

			$this->query("UPDATE in_share SET download=download+1 where idx='{$idx}'");
		}
		function down_out(){
			$code = isset($_GET['code']) ? $_GET['code'] : "";
			access($code,"이상한접근");

			$f_id = $this->fetch("SELECT f_id FROM out_share where code='{$code}'");
			$row = $this->fetch("SELECT name,ext FROM file where idx='{$f_id->f_id}'");

			header("content-description: file-transfer");
			header("content-disposition: attachment;filename={$row->name}");
			readfile(DATA_PATH."/{$f_id->f_id}{$row->ext}");

			$this->query("UPDATE out_share SET download=download+1 where code='{$code}'");
		}
	}
