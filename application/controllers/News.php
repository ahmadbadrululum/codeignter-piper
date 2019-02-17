<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->helper('url_helper');
    }

	public function index()
	{
        $data['news'] = $this->news_model->getNews();
        $data['title'] = 'Arsip berita';
        
		$this->load->view('news/index', $data);
    }
    
    public function view($slug = NULL)
	{
        $data['news'] = $this->news_model->getNews($slug);        
		$this->load->view('news/view', $data);
    }


    public function create()
	{   
        
        $this->load->helper('form');
        $this->load->library('form_validation');


        $this->form_validation->set_rules('title', 'title must be input', 'required' );
        $this->form_validation->set_rules('text', 'text must be input', 'required' );
        if($this->form_validation->run() === FALSE){
            $this->load->view('news/create');
          }else{
            $this->news_model->createNews();
            redirect('news');
          }
    }

    public function update($id)
	{   
        
        $this->load->helper('form');
        $this->load->library('form_validation');


        $this->form_validation->set_rules('title', 'title must be input', 'required' );
        $this->form_validation->set_rules('text', 'text must be input', 'required' );
        if($this->form_validation->run() === FALSE){
            $data['news_item'] = $this->news_model->getNewsId($id);
            $this->load->view('news/update', $data);
          }else{
            $this->news_model->updateNews($id);
            redirect('news');
          }
    }

    public function delete($id)
    {
        $this->news_model->deleteNews($id);
        redirect('news');
    }

}
