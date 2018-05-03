<?php 

	class MemberController extends Controller{
		function login(){
			if(isset($_SESSION['idx'])){
				move("/file/file");
			}
			
		}
		function logout(){
			session_destroy();
			move("/member/login");
		}

	}