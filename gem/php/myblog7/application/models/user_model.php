<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class User_model extends CI_Model{

    public function get_by_name_pwd($name, $pwd){
        //$this -> db -> query("select * from t_user where username='$name' and password='$pwd'");//有sql注入危险
        return $this -> db -> get_where('t_user', array(
            'username' => $name,
            'password' => $pwd
        )) -> row(); // result();
    }

    public function get_by_name($username){
        return $this -> db -> get_where('t_user', array('username' => $username)) -> row();
    }

    public function save($email, $username, $password, $gender, $province, $city){
        $this -> db -> insert('t_user', array(
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'sex' => $gender,
            'province' => $province,
            'city' => $city
        ));
        return $this -> db -> affected_rows();
    }
    public function update_setting($user_id,$mood){
        $this->db->set('mood',$mood);
        $this->db->where('user_id',$user_id);
        $this->db->update("t_user");
        return $this->db->affected_rows();
    }
}