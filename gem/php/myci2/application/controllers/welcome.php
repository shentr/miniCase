<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function regist()
	{
		$this->load->view('regist');
	}

	public function save()
	{
		//1. 接收数据
		$username = $this -> input -> post('username');
		$password = $this -> input -> post('password');
		$repassword = $this -> input -> post('repassword');

		$flag = TRUE; //一个boolean类型的标识位，用来标识是否成功提交，true表示可以成功提交，false反之

		$data = array();

		//2. 验证
		if($username == ''){
			$data['err_name'] = '请输入用户名!';
			$flag = FALSE;
		}
		if($password != $repassword){
			$data['err_pwd'] = '两次密码不一致!';
			$flag = FALSE;
		}

		if(!$flag){
			$this -> load -> view('regist', $data);//跳转
			//redirect('welcome/regist');//重定向
		}



		//3. 连接数据库

		//4. 加载view
	}


}
