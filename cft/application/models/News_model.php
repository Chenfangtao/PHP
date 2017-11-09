<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/9
 * Time: 11:20
 */

class News_model extends CI_Model {
    /*
     * 降序查询news表中所有数据
     */
    public function get_news()
    {
        $query = $this->db->order_by('id', 'desc')->get('news')->result_array();
        return $query;
    }

    /*查询一条数据*/
    public function get_news_one($id)
    {
        return $this->db->where('id',$id)->get('news')->row_array();
    }

    public function get_page_count()
    {
        $sql = "SELECT COUNT(*) AS `count` FROM `news` ";
        $re = $this->db->query($sql)->row_array();
        return $re['count'];
    }

    /**/
    public function get_news_list($where = array(), $limit = array())
    {
        $where && $this->db->where($where);
        if ($limit == 'total_num')
        {
            $result = $this->db->count_all_results();
        }
        else
        {
            $this->db->order_by('id DESC');
            $limit && $this->db->limit($limit[1], $limit[0]);
            $result = $this->db->get('news')->result_array();
        }
        return $result;
    }

    /*获取分页
     *@param   $pagene 当前页
     *@param   $pagesize 每页显示
    */
    public function page_no($pageno,$pagesize){
        $count = $this->get_page_count();
        ($this->get_news());                                         //总记录数
        $pagecount = ceil($count/$pagesize);                   //总页数

        if ($pageno < 1) $pageno = 1;
        if ($pageno > $pagecount) $pageno = $pagecount;

        $startno=($pageno-1)*$pagesize;
        $result = $this->db->query("SELECT * FROM `news` ORDER BY `id` DESC limit $startno,$pagesize")->result_array();
        return $result =   array(
            'pagecount' =>  $pagecount,
            'news_list' =>  $result
        );
    }

   /* public function get_news_list($where = '', $limit = array(), $order_by = 'id DESC')
    {
        $where && $this->db->where($where);
        $order_by && $this->db->order_by($order_by);
        $limit && $this->db->limit($limit[0], $limit[1]);
        return $this->db->get('news')->row_array();
    }


    public function get_member($where)
    {
        $where = is_numeric($where) ? array('id' => $Where) : $where;
        return $this->db->where($where)->get('member')->row_array();
    }*/

}

