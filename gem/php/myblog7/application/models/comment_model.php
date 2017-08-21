<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model
{

    public function save($id,$content,$user_id)
    {
       $this->db->insert('t_comment',array(
           'content' => $content,
           'article_id' => $id,
           'user_id' => $user_id
       ));
       return $this->db->affected_rows();
    }

    public function get_comment_by_articleid($id){
        $sql = "select c.*,u.username from t_comment c,t_user u where c.user_id = u.user_id and c.article_id = $id";
        return $this->db->query($sql)->result();
    }

    public function get_comment($user_id){
        $sql = "select c.*,a.title,u.username from t_article a,t_comment c,t_user u where c.user_id = u.user_id and c.article_id = a.article_id and a.user_id = $user_id";
        return $this->db->query($sql)->result();
    }

    public function delete_comment($comment_id){
        $this->db->delete('t_comment',array(
            'comm_id' => $comment_id
        ));
        return $this->db->affected_rows();
    }

    public function delete_comment_by_commUser($commUser,$user_id){
        $sql = "delete from t_comment where user_id = $commUser and article_id in (select t_article.article_id from t_article where t_article.user_id = $user_id)";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }


    public function get_comment_limit($n,$o,$user_id) {
        if($o==''){$o=0;}
        $sql = "select c.*,a.title,u.username from t_article a,t_comment c,t_user u where c.user_id = u.user_id and c.article_id = a.article_id and a.user_id = $user_id limit $o,$n";
        $result = $this->db->query ($sql);
        $re = $result->result ();
        return $re;
    }

}