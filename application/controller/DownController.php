<?php 

	class DownController extends Controller{
		function file(){
			$this->model->down_file();
			exit();
		}
		function in(){
			$this->model->down_in();
			exit();
		}
		function out(){
			$this->model->down_out();
			exit();
		}
	}