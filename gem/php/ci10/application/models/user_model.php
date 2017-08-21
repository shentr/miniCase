<?php
    class User_model extends CI_Model
    {
        public function save_user($username, $password){
            $this->db->insert('t_user', array(
                'username' => $username ,
                'password' => $password
            ));
            return $this->db->affected_rows();
        }

        public function get_user_by_name_pwd($username, $password){
            $query = $this->db->get_where('t_user', array(
                'username' => $username ,
                'password' => $password
            ));
            return $query -> row();
        }

        public function get_all_user(){
            return $this -> db -> get("t_user") -> result();
        }

        public function del_user($id){
            $this->db->delete('t_user', array('id' => $id));
            return $this->db->affected_rows();
        }

    }




?>