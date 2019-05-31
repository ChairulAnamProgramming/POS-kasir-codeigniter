<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

public function __construct()
{
	parent::__construct();
	is_logged_in();
	$this->load->model('Data_model','data');
}
	public function index()
	{
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
		$data['goods'] = $this->data->getGoods();
		$data['title'] = 'Stock of Goods';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('data/goods/index',$data);
		$this->load->view('templates/footer');	
	}

	public function add_goods()
	{
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
		$data['AutoNumber'] = $this->data->getAutoNumberGoods();
		$data['catagory'] = $this->data->getCatagory();
		
		$data['title'] = 'Add Goods';
		$this->form_validation->set_rules('kode_barang', 'Kode Barang', 'trim|required');
		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('data/goods/add',$data);
			$this->load->view('templates/footer');	

		}else{
			$data = 
			[
				'kode_barang' => $this->input->post('kode_barang',true),
				'nama_barang' => $this->input->post('nama_barang',true),
				'catagory' => $this->input->post('catagory',true),
				'merek' => $this->input->post('merek',true),
				'harga_beli' => $this->input->post('harga_beli',true),
				'harga_jual' => $this->input->post('harga_jual',true),
				'stok' => $this->input->post('stok',true),
				'diskon' => $this->input->post('diskon',true),
				'keterangan' => $this->input->post('keterangan',true)
			];

			$this->db->insert('table_goods',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
					  Goods has been added
					</div>');
					redirect('data');
		}
	}

	public function delete_goods($id)
	{
		$this->db->delete('table_goods',['id'=>$id]);
		$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
					  Goods has been deleted
					</div>');
					redirect('data');
	}

	public function edite_goods($id)
	{

		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
		$data['goodsById'] = $this->data->getGoodsById($id);
		$data['catagory'] = $this->data->getCatagory();
		$data['merek'] = $this->data->getMerek();
		$data['title'] = 'Edite Goods';
		$this->form_validation->set_rules('kode_barang', 'Kode Barang', 'trim|required');
		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('data/goods/edite',$data);
			$this->load->view('templates/footer');	

		}else{
			$data = 
			[
				'kode_barang' => $this->input->post('kode_barang',true),
				'nama_barang' => $this->input->post('nama_barang',true),
				'catagory' => $this->input->post('catagory',true),
				'merek' => $this->input->post('merek',true),
				'harga_beli' => $this->input->post('harga_beli',true),
				'harga_jual' => $this->input->post('harga_jual',true),
				'stok' => $this->input->post('stok',true),
				'diskon' => $this->input->post('diskon',true),
				'keterangan' => $this->input->post('keterangan',true)
			];
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('table_goods',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
					  Goods has been updated
					</div>');
					redirect('data');
		}
	}

	public function customer()
	{
			$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
			$data['costumer'] = $this->db->get('table_pembeli')->result_array();
			$data['AutoNumber'] = $this->data->getAutoNumberPembeli();
			$data['title'] = 'Customer';
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('data/customer/index',$data);
			$this->load->view('templates/footer');	
	}

	public function dataCostumer()
	{

		$costumer = $this->db->get('table_pembeli')->result_array();;
    	foreach ($costumer as $key) {
    		$update = "<a href='".base_url('Data/edite_customer/').$key['id_pembeli']."'  kode='".$key['kode_pembeli']."' nama='".$key['nama_pembeli']."' phone='".$key['telp']."' alamat='".$key['alamat']."' class='btn btn-success btn-xs updateData'> <i class='fa fa-pencil-square-o updateData'></i> </a>";

    		$delete = "<a href='".base_url('Data/delete_customer/').$key['id_pembeli']."'  class='btn btn-danger btn-xs deleteData'> <i class='fa fa-remove deleteData'></i> </a>";

    		  echo "<tr>
    		  			<td class='text-center'>". $key['kode_pembeli'] ."</td> 
    		  			<td class='text-center'>". $key['nama_pembeli'] ."</td> 
    		  			<td class='text-center'>". $key['telp'] ."</td> 
    		  			<td class='text-center'>". $key['alamat'] ."</td> 
    		  			<td class='text-center'>".$update . $delete."</td> 
    		  		</tr>";
    	}
	}


	public function save_costumer()
	{

		$data = 
    	[
    		'kode_pembeli' => $this->input->post('kode_pembeli'),
    		'nama_pembeli' => $this->input->post('nama_pembeli'),
    		'alamat' => $this->input->post('alamat'),
    		'telp' => $this->input->post('telp')
    	];
    	$this->db->insert('table_pembeli',$data);
    	$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button> Customer has been added </div>');
	}

	public function edite_customer($id)
	{
		$data = 
    	[
    		'kode_pembeli' => $this->input->post('kode_pembeli'),
    		'nama_pembeli' => $this->input->post('nama_pembeli'),
    		'alamat' => $this->input->post('alamat'),
    		'telp' => $this->input->post('telp')
    	];
    	$this->db->where('id_pembeli',$id);
    	$this->db->update('table_pembeli',$data);
    	$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
					  Customer has been updated
					</div>');
	}

	public function delete_customer($id)
	{
		$this->db->delete('table_pembeli',['id_pembeli'=>$id]);
    	$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
					  Customer has been deleted
					</div>');
	}



	public function catagory()
	{
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
		$data['catagory'] = $this->data->getCatagory();
		$data['title'] = 'Category';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('data/catagory/index',$data);
		$this->load->view('templates/footer');	
	}

	public function add_catagory()
	{
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
		$data['catagory'] = $this->data->getCatagory();
		$data['title'] = 'Customer';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('data/catagory/add',$data);
		$this->load->view('templates/footer');	
	}

	public function merek()
	{
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
		$data['merek'] = $this->data->getMerek();
		$data['title'] = 'Merek';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('data/merek/index',$data);
		$this->load->view('templates/footer');	
	}

	public function pembelian()
	{
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
		$data['title'] = 'Pembelian Barang';
		$query = "SELECT * FROM table_pembelian_barang JOIN table_goods ON `table_pembelian_barang`.`kode_barang` = `table_goods`.`kode_barang`";
		$data['pembelian'] = $this->db->query($query)->result_array();
		$data['barang'] = $this->db->get('table_goods')->result_array();

		$this->form_validation->set_rules('kode_barang', 'Kode Barang', 'trim|required');
		if ($this->form_validation->run()== false) {
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('data/goods/pembelian',$data);
			$this->load->view('templates/footer');	
		}else{
			$data =
			[
				'kode_barang' => $this->input->post('kode_barang',true),
				'stok_tambahan' => $this->input->post('stok',true),
				'date_pembelian' => date('d m Y')
			];
			$this->db->insert('table_pembelian_barang',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
			  Stok barang berhasil di tambah
			</div>');
			redirect('data/pembelian');
		}
	}












}
