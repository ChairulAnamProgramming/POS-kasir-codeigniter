<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model('Menu_model','menu');
		$this->load->model('Data_model','data');
		is_logged_in();
	}
	public function index()
	{
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
		$data['title'] = "Kasir";
        $data['noPenjualan'] = $this->data->autoNumberNoPenjualan();
		$data['barang'] = $this->db->get('table_goods')->result_array();
		$data['pembeli'] = $this->db->get('table_pembeli')->result_array();
        $data['outlet'] = $this->data->getOutlet();

       

			$this->form_validation->set_rules('kode_barang', 'Kode Barang', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->db->select('*');
	        $this->db->from('table_penjualan');
	        $this->db->join('table_goods', 'table_goods.kode_barang = table_penjualan.kode_barang');
	        $this->db->where('status',0);
	        $data['penjualan']=$this->db->get()->result_array();


			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('sales/index',$data);
			$this->load->view('templates/footer');
		}else{

			$data = 
			[
                'kode_barang' => $this->input->post('kode_barang',true),
				'no_penjualan' => $this->input->post('no_penjualan',true),
				'jumlah' => 1,
				'kasir' => $data['user']['name'],
				'date' => date('d m Y')
			];
			$this->db->insert('table_penjualan',$data);
			 $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
					  Sales has been submit
					</div>');
        redirect('Sales');
		}
	}

	 public function cancel($id)
    {
        $this->db->where('id_penjualab',$id);
        $this->db->delete('table_penjualan');
        $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
					  Sales has been cancel
					</div>');
        redirect('Sales');
    }

    public function selesai($id)
    {
    	$data=
    	[  
            'no_penjualan' => $id,
            'tunai' => $this->input->post('tunai'),
    		'status'=>1
    	];

        $stok = 

        [
            'kode_barang' => $id,
            'stok' => $this->input->post('jumlah'),
            'date' => $this->input->post('tanggal')
        ];

        $faktur = 
        [
            'no_faktur'=>$id,
            'date' => $this->input->post('date',true),
            'pemasukan' => $this->input->post('total',true),
            'pembayaran' => $this->input->post('tunai',true)
        ];  
    	$this->db->where('status',0);
    	$this->db->update('table_penjualan',$data);
        $this->db->insert('faktur',$faktur);
        $this->db->insert('jumlah_stok',$stok);
    }
public function autocomplete()
{
	$data = $_GET['barang'];
	$nama = $this->db->get_where('table_goods',['kode_barang'=>$data])->row_array();

	$data = 
	[
		'namabarang' => $nama['nama_barang'],
		'harga' => $nama['harga_jual']
	];
	echo json_encode($data);
}



public function tambahJumlah($id)
{
				 
    $oldJumlah =  $this->db->get_where('table_penjualan',['id_penjualab'=>$id])->row_array();

			$data = 
    	[
    		'jumlah' => 1+$oldJumlah['jumlah']
    	];
    	$this->db->where('id_penjualab',$id);
    	$this->db->update('table_penjualan',$data);
    	$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
					  Category has been updated
					</div>');
}


public function KurangJumlah($id)
{
				 
    $oldJumlah =  $this->db->get_where('table_penjualan',['id_penjualab'=>$id])->row_array();

			$data = 
    	[
    		'jumlah' => $oldJumlah['jumlah']-1
    	];
    	$this->db->where('id_penjualab',$id);
    	$this->db->update('table_penjualan',$data);
    	$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
					  Category has been updated
					</div>');
}


public function dataBelanja()
{
    	
    	$this->db->select('*');
	        $this->db->from('table_penjualan');
	        $this->db->join('table_goods', 'table_goods.kode_barang = table_penjualan.kode_barang');
	        $this->db->where('status',0);
	        $penjualan =$this->db->get()->result_array();
	        // var_dump($penjualan);die();

	        $i=1;
	        $total=0;
    	foreach ($penjualan as $key) {
    		$harga=str_replace('.','',$key['harga_jual']);
    		$diskon= $key['diskon'];
    		 $count=$harga*$diskon/100;
    		 $subtotal=$harga-$count;
            

            

    		$plus = "<a href=".base_url('Sales/tambahJumlah/').$key['id_penjualab'] ." class='btn btn-info btn-xs plusData' id='plus'><i class='fa fa-plus'></i></a> ";

    		$minus = "<a href='".base_url('Sales/KurangJumlah/').$key['id_penjualab']."'  class='btn btn-warning btn-xs minusData'> <i class='fa fa-minus'></i> </a>";
    		$cancel =  anchor('Sales/cancel/'.$key['id_penjualab'],'<i class="fa fa-remove "></i>',['class'=>'btn btn-danger deleteData btn-xs']);

    		  echo "<tr>
    		  			<td class='text-center'>". $key['nama_barang'] ."</td> 
    		  			<td class='text-center'>Rp.". number_format($harga) .",-</td> 
    		  			<td class='text-center'>".$minus ." ".$key['jumlah']." ". $plus ."</td> 
    		  			<td class='text-center'>Rp.". number_format($subtotal*$key['jumlah']) .",-</td> 
    		  			<td class='text-center'>".$cancel."</td> 
    		  		</tr>";
    		  		$i++;
    	} 

    }

    public function cetak($id)
    {
        $data =
        [
            'tunai' => $this->input->post('tunai')
        ];

        $this->db->where('no_penjualan',$id);
        $this->db->update('table_penjualan',$data);
    }

    public function total()
    {

        $this->db->select('*');
            $this->db->from('table_penjualan');
            $this->db->join('table_goods', 'table_goods.kode_barang = table_penjualan.kode_barang');
            $this->db->where('status',0);
            $penjualan =$this->db->get()->result_array();
            // var_dump($penjualan);die();

            $i=1;
            $total=0;
        foreach ($penjualan as $key) {
            $harga=str_replace('.','',$key['harga_jual']);
            $diskon= $key['diskon'];
             $count=$harga*$diskon/100;
             $subtotal=$harga-$count;
             $total= $total+($subtotal*$key['jumlah']);
            $i++;
        }

        echo "<h1>Rp.".number_format($total).",-</h1>"; 
    }


}


?>