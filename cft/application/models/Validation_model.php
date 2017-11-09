<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validation_model extends CI_Model {

    /**
     * 添加新闻
     * @param $data
     * @return mixed
     */
    public function validation_form($data)
    {
        return $this->db->insert('news', $data);
    }

    /*删除一条信息*/
    public function del_news($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('news');

    }

    /*更新一条信息*/
    public function update_news($id,$data)
    {
        return $this->db->where('id',$id)->update('news',$data);
    }

    public function get_news($id)
    {
       return $this->db->where('id',$id)->get('news')->row_array();
    }
}