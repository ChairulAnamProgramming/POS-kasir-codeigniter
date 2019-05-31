<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	public function index()
	{
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
		// echo "Selamat datang ",$data['user']['name'];
		$data['title'] = "My Profile";
		$this->load->view('templates/header',$data);
		$this->load->view('templates/topbar',$data);

		if ($data['user']['role_id'] == 1) {
			$this->load->view('templates/sidebar',$data);
		}elseif($data['user']['role_id'] == 2){
			$this->load->view('templates/sidebar_user',$data);
		}
		$this->load->view('user/index',$data);
		$this->load->view('templates/footer');
	}

	public function edit()
	{
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
		// echo "Selamat datang ",$data['user']['name'];
		$data['title'] = "Edit Profile";

		$this->form_validation->set_rules('name', 'Full Name', 'trim|required');
		
		if($this->form_validation->run() == false)
		{
			$this->load->view('templates/header',$data);
			$this->load->view('templates/topbar',$data);
			if ($data['user']['role_id'] == 1) {
			$this->load->view('templates/sidebar',$data);
		}elseif($data['user']['role_id'] == 2){
			$this->load->view('templates/sidebar_user',$data);
		}
			$this->load->view('user/edite',$data);
			$this->load->view('templates/footer');
		}else{
			$name = $this->input->post('name');
			$nip = $this->input->post('nip');
			$nik = $this->input->post('nik');
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
					$old_image =$data['user']['image'];
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
					  Your profile has been updated
					</div>');
					redirect('user');
		}

		
	}

	public function changePassword()
	{
		$data['user'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();
		// echo "Selamat datang ",$data['user']['name'];
		$data['title'] = "Change Password";

		$this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
		$this->form_validation->set_rules('new_password1', 'New Password', 'trim|required|min_length[8]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Conferm New Password', 'trim|required|min_length[8]|matches[new_password1]');
		
		if($this->form_validation->run() == false)
		{
			$this->load->view('templates/header',$data);
			if ($data['user']['role_id'] == 1) {
			$this->load->view('templates/sidebar',$data);
		}elseif($data['user']['role_id'] == 2){
			$this->load->view('templates/sidebar_user',$data);
		}
			$this->load->view('templates/topbar',$data);
			$this->load->view('user/change-password',$data);
			$this->load->view('templates/footer');
		}else{
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if(!password_verify($current_password,$data['user']['password']))
			{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
					  Wrong current password!</div>');
					redirect('user/changePassword');
			}else{
				if($current_password == $new_password)
				{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
					  New password cannot be the same as current password!</div>');
					redirect('user/changePassword');
				}else{
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('password',$password_hash);
					$this->db->where('email',$this->session->userdata('email'));
					$this->db->update('users');

					$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
					  New password changed
					</div>');
					redirect('user/changePassword');
				}
			}
		}
		
		
	}
}