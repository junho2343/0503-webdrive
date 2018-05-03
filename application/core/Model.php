<?php 


	class Model{
		protected $db;
		protected $sql;
		protected $data;
		function __construct(){
			$this->db = new PDO("mysql:host=localhost;dbname=junho;charset=utf8","root","wjsrnr");
			$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
		}
		function query($sql = false){
			if($sql)$this->sql = $sql;
			$res = $this->db->prepare($this->sql);
			if($res->execute($this->data)){
				return $res;
			}else{

				echo "error";
				echo $this->sql;
			}
		}
		function fetch($sql = false){
			if($sql)$this->sql = $sql;
			return $this->query()->fetch();
		}
		function fetchAll($sql = false){
			if($sql)$this->sql = $sql;
			return $this->query()->fetchAll();
		}
		function rowCount($sql = false){
			if($sql)$this->sql = $sql;
			return $this->query()->rowCount();
		}
	}