<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Forum_model extends CI_Model
{
    protected $table = 'forum';

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }


    // public function get_count() {
    //     return $this->db->count_all();
    // }

    // public function get_data($limit, $start) {
    //     $this->db->limit($limit, $start);
    //     $query = $this->db->get($this->table);

    //     return $query->result();
    // }



    public function get_count() {
        return $this->db->count_all($this->table);
    }

    public function get_data($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);
        $this->db->WHERE('forum.status', 1);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }










    public function get_user_data($params = array()){

        $this->db->select('forum.*');
        $this->db->from('forum');


        if (!empty($params['views'])) {
            $this->db->order_by("forum.views", "desc");
        }else{
            $this->db->order_by("forum.id", "desc");
        }
		
		if (!empty($params['search']['div_name'])) {
            $this->db->like('forum.post_title', $params['search']['div_name']);
        }
		
        $this->db->WHERE('forum.status', 1);


        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }


   
    public function singleforum($id)
    {
        $this->db->select('forum.*,users.username,users.full_name,users.full_name_bn');
        $this->db->from('forum');
        $this->db->join('users', 'forum.created_by = users.id', 'left');
        $this->db->WHERE('forum.id', $id);

        return $this->db->get()->result();
    }

    public function get_comments($post_id)
    {
        $this->db->select('forum_comment.*,users.username,users.full_name,users.full_name_bn');
        $this->db->from('forum_comment');
        $this->db->join('users', 'forum_comment.created_by = users.id', 'left');
        $this->db->WHERE('forum_comment.post_id', $post_id);
        $this->db->WHERE('forum_comment.reply_id', 0);

        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

	 public function get_reply($id)
    {
        $this->db->select('forum_comment.*,users.username,users.full_name,users.full_name_bn');
        $this->db->from('forum_comment');
        $this->db->join('users', 'forum_comment.created_by = users.id', 'left');
        $this->db->WHERE('forum_comment.reply_id', $id);

        return $this->db->get()->result();
    }
	
	public function checkId($id)
    {
        return $this->db->query("select * from forum where id = " . $id)->result();
    }


}