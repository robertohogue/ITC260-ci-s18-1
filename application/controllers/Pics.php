<?php
//application/controllers/News.php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('pics_model');
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $data['pics'] = $this->pics_model->get_pics();
                $data['title'] = 'Pics archive';

                //$this->load->view('templates/header', $data);
                $this->load->view('pics/index', $data);
                //$this->load->view('templates/footer', $data);
        }

        public function view($slug = NULL)
        {
                $data['pics_item'] = $this->pics_model->get_pics($slug);

                if (empty($data['pics_item']))
                {
                        show_404();
                }

                $data['title'] = $data['pics_item']['title'];

                //$this->load->view('templates/header', $data);
                //$this->load->view('pics/view', $data);
                $this->load->view('pics/view', $pics);
                //$this->load->view('templates/footer', $data);
        }
                public function create()
            {
                $this->load->helper('form');
                $this->load->library('form_validation');

                $data['title'] = 'Create a pics item';

                $this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('text', 'Text', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                    //$this->load->view('templates/header', $data);
                    $this->load->view('pics/create', $data);
                    //$this->load->view('templates/footer', $data);

                }
                else
                {
                    $slug = $this->news_model->set_news();
                    
                    if($slug !== false){
                        feedback('Picture category successfully created', 'info');
                        redirect('/pics/view/' . $slug);
                    }else{
                        feedback('Picture category NOT created', 'error');
                        redirect('/pics/create');
                        
                    }

                }
            }

}