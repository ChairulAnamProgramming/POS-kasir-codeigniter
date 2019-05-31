<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autocomplite extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Data_model','data');
	}

	public function merek()
	{
        $catagory = $_GET['catagory'];
        $query = "SELECT * FROM table_catagory JOIN table_merek  ON nama_catagory = catagory  WHERE `table_catagory`.`nama_catagory` = '$catagory'";
        $table_cat = $this->db->query($query)->result_array();

			foreach ($table_cat as $key) {


				$merek = $key['merek'];

				echo '<option value="'.$key['merek'].'">'.$key['merek'].'</option>';
			
			}

    }

    public function dataCategory()
    {
    	$data['category'] = $this->data->getCatagory();


    	foreach ($data['category'] as $key) {
    		$update = "<a href='".base_url('Autocomplite/edite_category/').$key['id']."' nama='".$key['nama_catagory']."' class='btn btn-success btn-xs updateData'> <i class='fa fa-pencil-square-o updateData'></i> </a>";

    		$delete = "<a href='".base_url('Autocomplite/delete_category/').$key['id']."'  class='btn btn-danger btn-xs deleteData'> <i class='fa fa-remove deleteData'></i> </a>";

    		  echo "<tr>
    		  			<td class='text-center'>". $key['nama_catagory'] ."</td> 
    		  			<td class='text-center'> ".$update . $delete."</td> 
    		  		</tr>";
    	}
    }
    
    public function save_category()
    {   
        $catagory = $this->data->getCatagory();
        foreach ($catagory as $key ) {
            if ($key['nama_catagory'] == $this->input->post('nama_catagory')) {
                $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button> Category has been added </div>');die();
            }
        }
    	$data = 
    	[
    		'nama_catagory' => $this->input->post('nama_catagory')
    	];
    	$this->db->insert('table_catagory',$data);
    	$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button> Category has been added </div>');
    }

    public function edite_category($id)
    {
    	$data = 
    	[
    		'nama_catagory' => $this->input->post('nama_catagory')
    	];
    	$this->db->where('id',$id);
    	$this->db->update('table_catagory',$data);
    	$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
					  Category has been updated
					</div>');
    }

    public function delete_category($id)
    {
    	$this->db->delete('table_catagory',['id'=>$id]);
    	$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
					  Category has been deleted
					</div>');
    }




    public function dataMerek()
    {
    	$data['merek'] = $this->data->getMerek();


    	foreach ($data['merek'] as $key) {
    		$update = "<a href='".base_url('Autocomplite/edite_merek/').$key['id']."' merek='".$key['merek']."' catagory='".$key['catagory']."' class='btn btn-success btn-xs updateData'> <i class='fa fa-pencil-square-o updateData'></i> </a>";

    		$delete = "<a href='".base_url('Autocomplite/delete_merek/').$key['id']."'  class='btn btn-danger btn-xs deleteData'> <i class='fa fa-remove deleteData'></i> </a>";

    		  echo "<tr>
    		  			<td class='text-center'>". $key['merek'] ."</td> 
    		  			<td class='text-center'>". $key['catagory'] ."</td> 
    		  			<td class='text-center'>".$update . $delete."</td> 
    		  		</tr>";
    	}
    }


    public function save_merek()
    {
    	$data = 
    	[
    		'merek' => $this->input->post('merek'),
    		'catagory' => $this->input->post('catagory')
    	];
    	$this->db->insert('table_merek',$data);
    	$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button> Category has been added </div>');
    }



      public function edite_merek($id)
    {
        $data = 
        [
            'merek' => $this->input->post('merek'),
            'catagory' => $this->input->post('catagory')
        ];
        $this->db->where('id',$id);
        $this->db->update('table_merek',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                      Category has been updated
                    </div>');
    }


     public function delete_merek($id)
    {
        $this->db->delete('table_merek',['id'=>$id]);
        $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                      Category has been deleted
                    </div>');
    }

    public function modalPenjualan($id)
    {
        // var_dump($id);die();
           $query = "SELECT * FROM table_penjualan JOIN table_goods ON `table_penjualan`.`kode_barang` = `table_goods`.`kode_barang`   WHERE `table_penjualan`.`no_penjualan` = '$id'";
            $penjualan =$this->db->query($query)->result_array();
            // var_dump($penjualan);die();
            $faktur = $this->db->get_where('faktur',['no_faktur'=> $id])->row_array();
            $i=1;
            $total=0;
        foreach ($penjualan as $key) {
            $harga=str_replace('.','',$key['harga_jual']);
            $diskon= $key['diskon'];
             $count=$harga*$diskon/100;
             $subtotal=$harga-$count;
            

              echo "<tr>
                        <td>". $i ."</td> 
                        <td>". $key['nama_barang']."</td> 
                        <td>". $key['harga_jual']."</td> 
                        <td>". $key['jumlah']."</td> 
                        <td>Rp.". number_format($subtotal).",-</td> 
                    </tr>";
                    $total= $total+($subtotal*$key['jumlah']);
                    $i++;
        } 
                echo "<tr>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <th>Total</th> 
                        <td>Rp.".number_format($total).",-</td> 
                    </tr>";
                    echo "
                    <tr>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <th>Dibayar</th> 
                        <td>Rp.".number_format($faktur['pembayaran']).",-</td> 
                    </tr>";
                     $kembal = $faktur['pembayaran']-$total;
                     echo "
                     <tr>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                        <th>Kembalian</th> 
                        <td>Rp.".number_format($kembal).",-</td> 
                    </tr>";



    }





}


