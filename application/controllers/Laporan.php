<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	public function index()
	{
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
		$data['title'] = "Laporan Penjualan";
		$query = "SELECT * FROM faktur";
		$data['penualan'] = $this->db->query($query)->result_array();

		$join = "SELECT * FROM faktur JOIN table_penjualan ON `faktur`.`no_faktur` = `table_penjualan`.`no_penjualan` ORDER BY	`id_faktur` DESC";
		$data['join'] = $this->db->query($join);

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('laporan/penjualan/index',$data);
		$this->load->view('templates/footer');
	}


	public function stokBarang()
	{
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
		$data['title'] = "Laporan Penjualan";
		$query = "SELECT * FROM table_goods JOIN table_penjualan ON `table_goods`.`kode_barang` = `table_penjualan`.`kode_barang` JOIN `table_pembeli` ON `table_penjualan`.`kode_pelanggan` = `table_pembeli`.`kode_pembeli`";
		$data['penualan'] = $this->db->query($query)->result_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('laporan/barang/index',$data);
		$this->load->view('templates/footer');
	}

	public function print_penjualan()
	{
			$print = $this->db->get('table_goods')->result_array();

			foreach ($print as $key) {
				print $key['harga_jual'];
			}
	}


	public function pembell()
	{
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
		$data['title'] = "Laporan Penjualan";

		$data['pembeli'] = $this->db->get('table_pembeli')->result_array();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('laporan/pembeli/index',$data);
		$this->load->view('templates/footer');
	}

}

?>