<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends CI_Model
{

    public function get_ariticles_by_user($user_id)
    {
        $this->db->select('a.*, t.type_name');
        $this->db->from('t_article a');
        $this->db->join('t_article_type t', 'a.type_id=t.type_id');
        $this->db->where('a.user_id', $user_id);
        $this->db->order_by('a.post_date', 'desc');

        return $this->db->get()->result();
    }

    public function get_types_by_user($user_id)
    {
        $sql = "select t.*, (select count(*) from t_article a where a.type_id=t.type_id) num from  t_article_type t where t.user_id=$user_id";
        return $this->db->query($sql)->result();
    }

    public function save_article($title, $content, $type_id, $user_id){
        $this->db->insert('t_article', array(
            'content' => $content,
            'title' => $title,
            'type_id' => $type_id,
            'user_id' => $user_id
        ));
        return $this->db->affected_rows();
    }

    public function delete_articles($ids){
        $sql = "delete from t_article where article_id in($ids)";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function get_article_type($type_id){
        $sql = "select * from t_article_type where type_id = $type_id";
        return $this->db->query($sql)->row();

    }

    public function update_type($type_id,$type_name){
        //update t_article_type set type_name = "111" where type_id = 1
        $this->db->set('type_name', $type_name);
        $this->db->where('type_id', $type_id);
        $this->db->update('t_article_type');
        return $this->db->affected_rows();
    }


//    public function get_blog_by_id($id){
//        $sql = "select * from t_article where article_id = $id";
//        return $this->db->query($sql)->row();
//    }

//    public function get_blog_type($user_id){
//
//        $sql = "select * from t_article_type where user_id = $user_id";
//        return $this->db->query($sql)->result();
//    }
}