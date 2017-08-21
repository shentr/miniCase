<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$loginedUser = $this -> session -> userdata('loginedUser');
		$this -> load -> model('article_model');
		$articles = $this -> article_model -> get_ariticles_by_user($loginedUser -> user_id);
		$types = $this -> article_model -> get_types_by_user($loginedUser -> user_id);

		$this->load->view('index', array(
			'articles' => $articles,
			'types' => $types
		));
	}

	public function login(){
		$this->load->view('login');
	}

	public function logout(){
		$this -> session -> unset_userdata('loginedUser');
		redirect('welcome/login');
	}

	public function reg(){
		$this->load->view('reg');
	}

	public function check_login(){
		//1. 接收数据
		$username = $this -> input -> post('username');
		$password = $this -> input -> post('password');

		//2. 验证
		//3. 数据库操作
		$this -> load -> model('user_model');//加载model文件
		$result = $this -> user_model -> get_by_name_pwd($username, $password);

		if($result){//查到结果
			$this -> session -> set_userdata('loginedUser', $result);
			redirect('welcome/index');
		}else{//未查到结果
			echo 'fail';
		}
	}

	public function check_name(){
		$name = $this -> input -> get('uname');

		$this -> load -> model('user_model');
		$result = $this -> user_model -> get_by_name($name);
		if($result){
			echo 'fail';
		}else{
			echo 'success';
		}
	}

	public function do_reg(){
		$email = htmlspecialchars($this -> input -> post('email'));
		$username = $this -> input -> post('username');
		$password = $this -> input -> post('password');
		$password2 = $this -> input -> post('password2');
		$gender = $this -> input -> post('gender');
		$province = $this -> input -> post('province');
		$city = $this -> input -> post('city');

		//验证

		$this -> load -> model('user_model');
		$rows = $this -> user_model -> save($email, $username, $password, $gender, $province, $city);
		if($rows > 0){
			//$this -> load -> view('login');
			redirect('welcome/login');
		}else{
			$this -> load -> view('reg');
		}
	}

	public function userSettings(){

		$mood = $this->session->userdata("loginedUser")->mood;

		$data['mood'] = $mood;

		$this->load->view("userSettings",$data);

	}

	public function update_setting(){

		$new_mood = $this->input->post('mood');
		$user_id = $this->session->userdata("loginedUser")->user_id;
		$this -> load -> model('user_model');
		$row = $this->user_model->update_setting($user_id,$new_mood);
		if($row){
			$user = $this->session->userdata("loginedUser");
			$user->mood = $new_mood;
			$this->session->set_userdata('loginedUser',$user);
			redirect("welcome/userSettings");
		}

	}
}
