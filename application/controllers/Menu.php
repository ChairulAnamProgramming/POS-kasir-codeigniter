<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_model','menu');
		is_logged_in();
	}
	public function index()
	{
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
		// echo "Selamat datang ",$data['user']['name'];
		$data['title'] = "Sub Menu";
		$data['icon'] = $this->db->get('table_icon')->result_array();
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$data['subMenu'] = $this->menu->getSubMenu();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('menu/index',$data);
		$this->load->view('templates/footer');
	}
}

?>