<?php 


	class FileController extends Controller{
		function file(){
			if(!isset($_SESSION['idx'])){
				move("/member/login");
			}
			$this->dirs = $this->model->get_dirs();
			$this->files = $this->model->get_files();
			$this->path = isset($_GET['path']) ? $_GET['path'] : 0;
			$this->parents = $this->model->get_parents();
		}
		function delete(){
			$this->model->delete();
		}
		function modify(){
			$this->modify = $this->model->get_modify();
		}
	}