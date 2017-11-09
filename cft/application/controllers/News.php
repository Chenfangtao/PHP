<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/9
 * Time: 9:56
 */

class News extends CI_Controller {
    /**
     * News constructor.
     */
    public function __construct(){
        parent :: __construct();
        $news = $this->config->item('news');
        $this->load->database($news);
        $this->load->model('news_model');
    }

//    显示新闻首页
    public function index(){
        $data['news'] = $this->news_model->get_news_list(array(), array(0,4));    //调用News_model模型
        $this->load->view('news_index/index',$data);
    }
    
//    显示新闻列表页
    public function news_list(){
        $data['news'] = $this->news_model->get_news_list(array(), array(0,5));    //调用News_model模型
        $this->load->view('news_index/news',$data);
        var_dump($_SERVER);
    }

//    关于我们
    public function news_about()
    {
        $this->load->view('news_index/about');
    }

//    三级分销
    public function news_distribution()
    {
        $this->load->view('news_index/distribution');
    }    

//    显示新闻详情页
    public function news_detail(){
        $res = $this->input->get('pageno');
        $data['news'] = $this->news_model->get_news_one($res);    //调用News_model模型
        $this->load->view('news_index/news-detail',$data);
    }

//    滑动加载更多列表页
    public function get_news_liebiao()
    {
        $page =$this->input->post('page');
        $news_list = $this->news_model->get_news_list(array(), array(($page-1)*4,4));
        $html = '';
        foreach ($news_list as $v)
        {
                $html .= '<li>';
                $html .= '<a href="' . site_url('news/news_list').'">';
                $html .= '<div class="pic">';
                $html .= '<img src="' . __PUBLIC__ . $v['img']. '"/>';
                $html .= '</div>';
                $html .= '<div class="text">';
                $html .= '<p class="time">' . date('Y-m-d H:i:s', $v['news_time']) . '</p>';
                $html .= '<p>' . $v['news_title'] . '</p>';
                $html .= '</div>';
                $html .= '</a>';
                $html .= '</li>';
        }
        if ($news_list)
        {
            $result = array(
                'status' => 'success',
                'news_list' => $html
            );
        }
        else
        {
            $result = array(
                'status' => 'error',
            );
        }

        echo json_encode($result);
    }




//    滑动加载更多详情页
    public function get_news_list()
    {
        $page = $this->input->post('page');
        $news_list = $this->news_model->get_news_list(array(), array(($page-1)*5, 5));
        $html = '';
        foreach ($news_list as $v)
        {
            $html .= '<div class="active-list">';
            $html .= '<ul>';
            $html .= '<li>';
            $html .= '<a href="' . site_url('news/news_detail').'?pageno='.$v['id'] . '">';
            $html .= '<div class="pic">';
            $html .= '<img src="' .  __PUBLIC__.$v["img"] . '" alt="" />';
            $html .= '</div>';
            $html .= '<div class="right-text">';
            $html .= '<h3>' . $v["news_title"] . '</h3>';
            $html .= '<p>' . $v['news_detail'] . '</p>';
            $html .= '<span class="time">' . date('Y-m-d H:i:s',$v['news_time']) . '</span>';
            $html .= '</div>';
            $html .= '</a>';
            $html .= '</li>';
            $html .= '</ul>';
            $html .= '</div>';
        }

        $result = array(
            'status' => 'success',
            'news_list' => $html
        );
        echo json_encode($result);
    }
}