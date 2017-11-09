<?php

class Pageno{
    public function page_no(){
        //获取分页
        $count = count($this->news_model->get_news());                      //总记录数
        $pagesize=3;                                               //每页个数
        $pagecount=ceil($count/$pagesize);                   //总页数
        $pageno=($this->input->get('pageno')) ? $this->input->get('pageno'):'1'; //当前页

        if ($pageno < 1) $pageno = 1;
        if ($pageno > $pagecount) $pageno = $pagecount;

        $startno=($pageno-1)*$pagesize;
        $data['news']=$this->db->query("select * from `news` order by `id` desc limit $startno,$pagesize")->result_array();

    }




}