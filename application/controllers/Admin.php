<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('employee_model','employee');
		is_logged_in();
	}
	public function index()
	{
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();

		$join = "SELECT * FROM table_goods JOIN table_penjualan ON `table_goods`.`kode_barang` = `table_penjualan`.`kode_barang` JOIN `table_pembeli` ON `table_penjualan`.`kode_pelanggan` = `table_pembeli`.`kode_pembeli`";
		$data['penjualan'] = $this->db->query($join)->num_rows();

		$data['pembeli'] = $this->db->get('table_pembeli')->num_rows();	
		$data['karyawan'] = $this->db->get('users')->num_rows();	

		$day = date('d m Y');
		$query = "SELECT SUM(tunai) FROM table_penjualan WHERE DATE = '$day'";
		$data['tunai_hari_ini'] = $this->db->query($query)->row_array();

		$total_barang = "SELECT count(kode_barang) FROM table_goods";
		$data['total_barang'] = $this->db->query($total_barang)->row_array();

		$satu = date("d 01 Y") ;
		$januari = $this->db->get_where('table_penjualan',['date'=>$satu])->num_rows();
		$data['januari'] = json_encode($januari);

		$dua = date("d 02 Y") ;
		$februari = $this->db->get_where('table_penjualan',['date'=>$dua])->num_rows();
		$data['februari'] = json_encode($februari);

		$tiga = date("d 03 Y") ;
		$maret = $this->db->get_where('table_penjualan',['date'=>$tiga])->num_rows();
		$data['maret'] = json_encode($maret);

		$empet = date("d 04 Y") ;
		$april = $this->db->get_where('table_penjualan',['date'=>$empet])->num_rows();
		$data['april'] = json_encode($april);

		$lima = date("d 05 Y") ;
		$mei = $this->db->get_where('table_penjualan',['date'=>$lima])->num_rows();
		$data['mei'] = json_encode($mei);

		$enam = date("d 06 Y") ;
		$juni = $this->db->get_where('table_penjualan',['date'=>$enam])->num_rows();
		$data['juni'] = json_encode($juni);

		$tujuh = date("d 07 Y") ;
		$juli = $this->db->get_where('table_penjualan',['date'=>$tujuh])->num_rows();
		$data['juli'] = json_encode($juli);

		$delapan = date("d 08 Y") ;
		$Agust = $this->db->get_where('table_penjualan',['date'=>$delapan])->num_rows();
		$data['agust'] = json_encode($Agust);

		$sembilan = date("d 09 Y") ;
		$sept = $this->db->get_where('table_penjualan',['date'=>$sembilan])->num_rows();
		$data['sept'] = json_encode($sept);

		$sepuluh = date("d 10 Y") ;
		$okt = $this->db->get_where('table_penjualan',['date'=>$sepuluh])->num_rows();
		$data['okt'] = json_encode($okt);

		$seblas = date("d 11 Y") ;
		$nov = $this->db->get_where('table_penjualan',['date'=>$seblas])->num_rows();
		$data['nov'] = json_encode($nov);

		$duabelas = date("d 12 Y") ;
		$des = $this->db->get_where('table_penjualan',['date'=>$duabelas])->num_rows();
		$data['des'] = json_encode($des);

		$data['title'] = "Dashboard";
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/index',$data);
		$this->load->view('templates/footer');	
	}

	public function role()
	{
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get('user_role')->result_array();
		// echo "Selamat datang ",$data['user']['name'];
		$data['title'] = "Role";
		$this->load->view('templates/header_user',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/role',$data);
		$this->load->view('templates/footer_user');
	}

	public function roleAccess($role_id)
	{
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get_where('user_role',['id'=> $role_id])->row_array();

		$this->db->where('id !=',1);
		$data['menu'] = $this->db->get('user_menu')->result_array();
		
		// var_dump($data['role']['role']);die;
		$data['title'] = "Role";
		$this->load->view('templates/header_user',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/role-access',$data);
		$this->load->view('templates/footer_user');
	}

	public function changeAccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = 
		[
			'role_id'=> $role_id,
			'menu_id'=> $menu_id
		];

		$result = $this->db->get_where('user_access_menu',$data);

		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu',$data);
		}else{
			$this->db->delete('user_access_menu',$data);

		}
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Access Changed!</div>');
	}


	public function employee()
	{
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
		$data['title'] = "Employee";
		$data['employee'] = $this->employee->getEmployee();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/employee',$data);
		$this->load->view('templates/footer');	
	}

	public function edite_employee($id)
	{
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
		$data['title'] = "Edite Employee";
		$data['employeeId'] = $this->employee->getEmployeeById($id);

		$this->form_validation->set_rules('name', 'Full Name', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('admin/edite-employee',$data);
			$this->load->view('templates/footer');	
		}else{
			$name = $this->input->post('name');
			$nip = $this->input->post('nip');
			$nik = $this->input->post('nik');
			$role_id = $this->input->post('role_id');
			$alamat = $this->input->post('alamat');
			$jabatan = $this->input->post('jabatan');
			$tmpt_lhr = $this->input->post('tmpt_lhr');
			$tgl_lhr = $this->input->post('tgl_lhr');
			$telp = $this->input->post('telp');
			$email = $this->input->post('email');
			
			// cek jika ada gambar yang di upload
			$upload_image = $_FILES['image']['name'];
			
			if ($upload_image) {
				$config['upload_path'] = './assets/img/profile/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '3000';
				$this->load->library('upload', $config);

				if($this->upload->do_upload('image'))
				{
					$old_image =$data['employeeId']['image'];
					if($old_image != 'default.jpg')
					{
						unlink(FCPATH . 'assets/img/profile/'. $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image',$new_image);
				}else{
					echo $this->upload->display_errors();
				}
			}
			$this->db->set('name',$name);
			$this->db->set('nip',$nip);
			$this->db->set('nik',$nik);
			$this->db->set('role_id',$role_id);
			$this->db->set('alamat',$alamat);
			$this->db->set('jabatan',$jabatan);
			$this->db->set('tmpt_lhr',$tmpt_lhr);
			$this->db->set('tgl_lhr',$tgl_lhr);
			$this->db->set('telp',$telp);
			$this->db->where('email',$email);
			$this->db->update('users');
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
					 Employee has been updated
					</div>');
					redirect('Admin/employee');
		}
		
	}

	public function delete_employee($id)
	{
		$this->db->delete('users',['id'=>$id]);
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
					 Employee has been deleted
					</div>');
					redirect('Admin/employee');
	}
	
}