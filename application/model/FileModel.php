<?php 


	class FileModel extends Model{
		var $dir_size;
		function get_files(){
			$path = isset($_GET['path']) ? $_GET['path'] : 0;
			return $this->fetchAll("SELECT * FROM file where parents='{$path}' and type='file' and id='{$_SESSION['idx']}'");
		}
		function get_dirs(){
			$path = isset($_GET['path']) ? $_GET['path'] : 0;
			$row = $this->fetchAll("SELECT * FROM file where type='dir' and parents='{$path}' and id='{$_SESSION['idx']}'");
			foreach($row as $val => $data){
				$this->dir_size=0;
				$this->get_dir_size($data->idx);
				$this->query("UPDATE file SET size={$this->dir_size} where idx='{$data->idx}'");
			}
			return $this->fetchAll("SELECT * FROM file where parents='{$path}' and type='dir' and id='{$_SESSION['idx']}'");
		}
		function get_dir_size($target){
			$row = $this->fetchAll("SELECT * FROM file where parents='{$target}' and id='{$_SESSION['idx']}'");
			foreach($row as $val => $data){
				$data->type == 'dir' ? $this->get_dir_size($data->idx) : $this->dir_size = $this->dir_size+ $data->size;
			}
		}
		function get_parents(){
			$path = isset($_GET['path']) ? $_GET['path'] : 0;
			return $this->fetch("SELECT parents FROM file where idx='{$path}'");
		}
		function get_modify(){
			$idx = isset($_GET['idx']) ? $_GET['idx'] : "";
			return $this->fetch("SELECT name FROM file where idx='{$idx}'");
		}
		function delete(){
			$idx = isset($_GET['idx']) ? $_GET['idx'] :"";
			$this->deleting($idx);
			move("");
		}
		function deleting($target){
			$row = $this->fetchAll("SELECT * FROM file where parents='{$target}'");
			foreach($row as $val => $data){
				$data->type == 'dir' ? $this->deleting($data->idx) : $this->query("DELETE FROM file where idx='{$data->idx}'");
			}
			$this->query("DELETE FROM file where idx='{$target}'");

		}
		function action(){
			extract($_POST);
			switch($action){
				case"upload":{
					$file = $_FILES['file'];
					$name = $file['name'];
					access($name,"값이 비어있어요");
					$size = floor($file['size']/1024/1024*1000)/1000;
					$size = number_format($size,3);
					$type = "file";
					$parents = isset($_GET['path']) ? $_GET['path'] : 0;
					$date = date("Y-m-d");
					$ext = explode(".",$name);
					$ext = isset($ext[1]) ? ".".array_pop($ext) : "";

					$this->sql = "INSERT INTO file (name,size,type,parents,id,date) values (:name,:size,:type,:parents,:id,:date)";
					$this->data = array(
						":name" => $name,
						":size" => $size,
						":type" => $type,
						":parents" => $parents,
						":id" => $_SESSION['idx'],
						":date" => $date,
					);
					$this->query();

					$count = $this->fetch("SELECT idx FROM file order by idx desc limit 1")->idx;
					move_uploaded_file($file['tmp_name'],DATA_PATH."/{$count}{$ext}");
					move("");
					break;
				}
				case"folder":{
					$name = html_re($name);
					access($name,"값이 비어있어요");
					$parents = isset($_GET['path']) ? $_GET['path'] : 0;

					$this->sql = "SELECT * FROM file where parents=:parents and name=:name and id='{$_SESSION['idx']}'";
					$this->data = array(
						":parents" => $parents,
						":name" => $name,
					);
					access(!$this->fetch(),"이미 존재하는 디렉토리명입니다");

					$type = "dir";
					$date = date("Y-m-d");

					$this->sql = "INSERT INTO file (name,type,parents,id,date) values (:name,:type,:parents,:id,:date)";
					$this->data = array(
						":name" => $name,
						":type" => $type,
						":parents" => $parents,
						":id" => $_SESSION['idx'],
						":date" => $date,
					);
					$this->query();
					move("");

					break;
				}
				case"modify":{
					// $idx = isset($_GET[''])
					$name = html_re($name);
					access($name,"빈값존재");

					$parents = isset($_GET['path']) ? $_GET['path'] : 0;

					$this->sql = "SELECT * FROM file where name=:name and type='dir' and parents=:parents and id='{$_SESSION['idx']}'";
					$this->data = array(
						":name" => $name,
						":parents" => $parents,
					);
					access(!$this->fetch(),"이미 존재하는 이름입니다");

					$date = date("Y-m-d");
					$this->sql = "UPDATE file SET name=:name, date=:date where idx=:idx";
					$this->data = array(
						":name" => $name,
						":date" => $date,
						":idx" => $idx,
					);
					$this->query();
					move("");
					break;
				}
			}		
		}
	}