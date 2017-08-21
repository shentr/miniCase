<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {


	public function index()
	{
		$this->load->view('regist');
	}

	public function regist()
	{
		$username = $this->input->post('username');
		$password = $this -> input -> post('password');
		$btn_type = $this -> input -> post('btn_type');

		$this -> load -> model('user_model');
		if($btn_type == "登录"){
			$row = $this -> user_model -> get_user_by_name_pwd($username, $password);
			if($row){//登录成功
				$result = $this -> user_model -> get_all_user();
				$this -> load -> view("list", array(
					"userlist" => $result
				));
			}else{
				echo "登录失败";
			}
		}else{

			$result = $this -> user_model -> save_user($username, $password);
			if($result > 0){
				echo '注册成功';
			}else{
				echo '注册失败';
			}
		}
	}

	public function list_user(){
		$this -> load -> model('user_model');
		$result = $this -> user_model -> get_all_user();
		$this -> load -> view("list", array(
			"userlist" => $result
		));
	}

	public  function del_user(){
		$id = $this -> input -> get("id");

		$this -> load -> model('user_model');
		$row = $this -> user_model -> del_user($id);
		if($row){
			redirect("user/list_user");
		}

	}
}
