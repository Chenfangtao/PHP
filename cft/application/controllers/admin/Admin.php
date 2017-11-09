<?php
class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('validation_model');
        $this->load->model('news_model');
    }
    /*
     * 显示后台
     */
    public function index()
    {
        $this->load->view('login/index');
    }

    /*
     * 显示展示页
     */
    public function show_list()
    {
        $id=$this->input->get('pageno');
        $data['news']=$this->news_model->page_no($id,4);
        $this->load->view('login/show',$data);
    }

    /*
     * 添加页面
     */
    public function add_list()
    {
        $this->load->view('login/add');
    }

    /*
     * 修改页面视图
     */
    public function update()
    {
        $id=$this->input->get('pageno');   //获取id
        $data['news']=$this->validation_model->get_news($id);
        $this->load->view('login/update',$data);
    }

    /*
     *修改页面
     */
    public function update_do()
    {
        $this->form_validation->set_rules('title','标题','trim|required');
        $this->form_validation->set_rules('anther','作者','trim|required');
        $this->form_validation->set_rules('content','内容','trim|required');
        if (!$this->form_validation->run()){
            echo validation_errors();
            exit();
        }
//        文件上传开始
        $file_name =time().mt_rand('100','999');    //上传的图片的路径
        $config['upload_path']      = 'public/uploads/';    //上传的路径
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']     = 4096;
        $config['max_width']        = 1024;
        $config['max_height']       = 768;
        $config['file_name']        = $file_name;
        $this->load->library('upload',$config);
        if ( ! $this->upload->do_upload('file'))//如果不满足条件
        {
            $error = array('error' => $this->upload->display_errors());//获取错误信息
            print_r($error);//打印错误信息
            //$this->load->view('upload_form', $error);手册中给出的，未使用
        }
        else
        {
            $data=$this->input->post();
            $data   =array(
                'news_title'    =>  $data['title'],
                'news_anthor'   =>  $data['anther'],
                'news_detail'   =>  $data['content'],
                'img'   =>  'uploads/'.$file_name,
                'news_time'     =>  time(),
            );
            $id=$this->input->get('pageno');   //获取id
            $this->validation_model->update_news($id,$data);
            redirect(site_url('admin/admin/show_list'));
        }
    }
    
    /*
     * 删除一条信息
     */
    public function del_news()
    {
        $id=$this->input->get('pageno');
        if ($this->validation_model->del_news($id))
            redirect(site_url('admin/admin/show_list'));
        else
            echo '删除失败';

    }

    /*
     * 表单验证
     */
    public function get_form()
    {
        $this->form_validation->set_rules('title','标题','trim|required');
        $this->form_validation->set_rules('anther','作者','trim|required');
        $this->form_validation->set_rules('content','内容','trim|required');
        if (!$this->form_validation->run())
        {
            echo validation_errors();
            exit();
        }
//        文件上传开始
        $file_name =time().mt_rand('100','999');    //上传的图片的路径
        $config['upload_path']      = 'public/uploads/';    //上传的路径
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']     = 4096;
        $config['max_width']        = 1024;
        $config['max_height']       = 768;
        $config['file_name']        = $file_name;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file'))//如果不满足条件
        {
            $error = array('error' => $this->upload->display_errors());//获取错误信息
            print_r($error);//打印错误信息
            //$this->load->view('upload_form', $error);手册中给出的，未使用
        }
        else
        {
            $data=$this->input->post();
            $data   =array(
                'news_title'    =>  $data['title'],
                'news_anthor'   =>  $data['anther'],
                'news_detail'   =>  $data['content'],
                'img'   =>  'uploads/'.$file_name,
                'news_time'     =>  time(),
            );
            $this->validation_model->validation_form($data);
            redirect(site_url('admin/admin/show_list'));
        }
    }
}