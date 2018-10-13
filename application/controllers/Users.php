<?php
class Users extends CI_Controller {
        var $API = '';

        public function __construct()
        {
                parent::__construct();
                $this->API = "http://localhost/ppk/api";
                $this->load->library('session');
                $this->load->library('curl');
                $this->load->helper('form');
                $this->load->helper('url');
        }

        public function index()
        {
            //get messages from the session
            if($this->session->userdata('success_msg')){
                $data['success_msg'] = $this->session->userdata('success_msg');
                $this->session->unset_userdata('success_msg');
            }
            if($this->session->userdata('error_msg')){
                $data['error_msg'] = $this->session->userdata('error_msg');
                $this->session->unset_userdata('error_msg');
            }
            
                $data['users'] = json_decode($this->curl->simple_get($this->API.'/users'));
                $this->load->view('templates/header');
				$this->load->view('users/list', $data);
                $this->load->view('templates/footer');
        }
		
		public function create()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');

			if(isset($_POST['submit']))
            {
                $data = array
                (
                    'nama' => $_POST['nama'],
                    'dob' => $_POST['dob'],
                    'jenis_kelamin' => $_POST['jenis_kelamin'],
                    'email' => $_POST['email'],
                    'alamat' => $_POST['alamat']
                );
                $insert = $this->curl->simple_post($this->API.'/users', $data, array(CURLOPT_BUFFERSIZE => 10));
                
                if($insert)
                {
                    $this->session->set_userdata('success_msg', 'Data user berhasil ditambahkan.');
                    redirect('users');
                }else
                {
                    $data['error_msg'] = 'Terjadi masalah, coba lagi.';
                }
            }else
            {
                $this->load->view('templates/header');
                $this->load->view('users/create');
                $this->load->view('templates/footer');
            }
		}
    
        function edit()
        {
            if(isset($_POST['submit']))
            {
                $data = array
                (
                    'id' => $this->input->post('id'),
                    'nama' => $this->input->post('nama'),
                    'dob' => $this->input->post('dob'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'email' => $this->input->post('email'),
                    'alamat' => $this->input->post('alamat')
                );
                if(isset($data) && !empty($data) && !is_null($data)){
                    $update = $this->curl->simple_put($this->API.'/users', $data, array(CURLOPT_BUFFERSIZE => 10));
                    if($update)
                    {
                        $this->session->set_userdata('success_msg', 'Data user berhasil diupdate.');
                        redirect('users');
                    }else
                    {
                        $data['error_msg'] = 'Terjadi masalah, coba lagi.';
                    }
                }else
                {
                    $data['error_msg'] = 'Terjadi masalah, coba lagi.';
                }
            }else
            {
  
                $params = $this->uri->segment(3);
                $segs = $this->uri->segment_array();
                $lolo = array( 
                    1 => $this->uri->segment(1), 
                    2 => $this->uri->segment(2), 
                    3 => $this->uri->segment(3));
   
  
                $data['users'] = json_decode($this->curl->simple_get($this->API.'/users/'.$params));
                $this->load->view('templates/header');
                $this->load->view('users/edit',  $data);
                $this->load->view('templates/footer');
            }
        }
    
        function delete($id)
        {
            if(empty($id))
            {
                redirect('users');
            }else
            {
                $delete = $this->curl->simple_delete($this->API.'/users', array('id' => $id), array(CURLOPT_BUFFERSIZE => 10));
                
                if($delete)
                {
                    $this->session->set_userdata('success_msg', 'Data user berhasi dihapus.');
                }else
                {
                    $this->session->set_userdata('error_msg', 'Terjadi masalah, coba lagi.');
                }redirect('users');
            }
        }
}