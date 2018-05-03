<?php 

	class MemberModel extends Model{
		function action(){
			extract($_POST);
			switch($action){
				case"login":{
					$id = html_re($id);
					$pw = html_re($pw);
					access($id,"빈값 존재");
					access($pw,"빈값 존재");

					$pw = hash("sha256",$pw.$id);

					$this->sql="SELECT * FROM member where id=:id and pw=:pw";
					$this->data = array(
						":id" => $id,
						":pw" => $pw,
					);
					access($row = $this->fetch(),"아이디 혹은 비밀번호가 틀립니다");
					$_SESSION['idx'] = $row->idx;
					// $row->admin == 1 ? $_SESSION['admin']=true : "";

					move("/file/file");

					break;
				}
				case"join":{
					$id = html_re($id);
					$pw = html_re($pw);
					$name = html_re($name);
					access($id,"빈값 존재");
					access($pw,"빈값 존재");
					access($name,"빈값 존재");

					$pw = hash("sha256",$pw.$id);

					$this->sql="SELECT * FROM member where id=:id";
					$this->data = array(
						":id" => $id,
					);
					access(!$this->fetch(),"이미 존재하는 아이디입니다");

					$this->sql = "INSERT INTO member (id,pw,name) values (:id,:pw,:name)";
					$this->data = array(
						":id" => $id,
						":pw" => $pw,
						":name" => $name,
					);
					$this->query();
					move("/member/login");

					break;
				}
			}
		}
	}