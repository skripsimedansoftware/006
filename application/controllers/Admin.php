<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('template', ['module' => strtolower($this->router->fetch_class())]);
		$this->load->model(['user', 'project', 'project_category', 'criteria']);
		if (empty($this->session->userdata($this->router->fetch_class())))
		{
			if (!in_array($this->router->fetch_method(), ['login', 'register', 'forgot_password']))
			{
				redirect(base_url($this->router->fetch_class().'/login'), 'refresh');
			}
		}
	}

	public function index()
	{
		$this->template->load('home');
	}

	public function login()
	{
		if ($this->input->method() == 'post')
		{
			$this->form_validation->set_rules('identity', 'Email/Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required');
			if ($this->form_validation->run() == TRUE)
			{
				$user = $this->user->sign_in($this->input->post('identity'), $this->input->post('password'));
				if ($user->num_rows() >= 1)
				{
					$this->session->set_userdata(strtolower($this->router->fetch_class()), $user->row()->id);
					redirect(base_url($this->router->fetch_class()), 'refresh');
				}
				else
				{
					redirect(base_url($this->router->fetch_class().'/'.$this->router->fetch_method()), 'refresh');
				}
			}
			else
			{
				$this->load->view('admin/login');
			}
		}
		else
		{
			$this->load->view('admin/login');
		}
	}

	public function profile($id = NULL, $option = NULL)
	{
		$data['profile'] = $this->user->detail(array('id' => (!empty($id))?$id:$this->session->userdata(strtolower($this->router->fetch_class()))))->row();
		switch ($option)
		{
			case 'edit':
				if ($this->input->method() == 'post')
				{
					if ($id !== $this->session->userdata($this->router->fetch_class()) OR $id > $this->session->userdata($this->router->fetch_class()))
					{
						$this->session->set_flashdata('edit_profile', array('status' => 'failed', 'message' => 'Anda tidak memiliki akses untuk mengubah profil orang lain!'));
						redirect(base_url($this->router->fetch_class().'/profile/'.$id) ,'refresh');
					}

					$this->form_validation->set_data($this->input->post());
					$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_is_owned_data[user.email.'.strtolower($this->session->userdata($this->router->fetch_class()).']'));
					$this->form_validation->set_rules('username', 'Nama Pengguna', 'trim|required|callback_is_owned_data[user.username.'.strtolower($this->session->userdata($this->router->fetch_class()).']'));
					$this->form_validation->set_rules('full_name', 'Nama Lengkap', 'trim|required');

					if ($this->form_validation->run() == TRUE)
					{
						$update_data = array(
							'email' => $this->input->post('email'),
							'username' => $this->input->post('username'),
							'full_name' => $this->input->post('full_name')
						);

						if (!empty($this->input->post('password')))
						{
							$update_data['password'] = sha1($this->input->post('password'));
						}

						if (!empty($_FILES['photo']))
						{
							$config['upload_path'] = './uploads/';
							$config['allowed_types'] = 'png|jpg|jpeg';
							$config['file_name'] = url_title('user-profile-'.$id);
							$this->load->library('upload', $config);

							if (!$this->upload->do_upload('photo'))
							{
								$this->session->set_flashdata('upload_photo_error', $this->upload->display_errors());
							}
							else
							{
								// resize
								$config['image_library']	= 'gd2';
								$config['source_image']		= $this->upload->data()['full_path'];
								$config['maintain_ratio']	= TRUE;
								$config['width']			= 160;
								$config['height']			= 160;
								// watermark
								$config['wm_text'] 			= strtolower($this->router->fetch_class());
								$config['wm_type'] 			= 'text';
								$config['wm_font_color'] 	= 'ffffff';
								$config['wm_font_size'] 	= 12;
								$config['wm_vrt_alignment'] = 'middle';
								$config['wm_hor_alignment'] = 'center';
								$this->load->library('image_lib', $config);

								if ($this->image_lib->resize())
								{
									$this->image_lib->watermark();
								}

								$update_data['photo'] = $this->upload->data()['file_name'];
							}
						}

						$this->user->update($update_data, array('id' => $id));
						$this->session->set_flashdata('edit_profile', array('status' => 'success', 'message' => 'Profil berhasil diperbaharui!'));
						redirect(base_url($this->router->fetch_class().'/profile/'.$id) ,'refresh');
					}
					else
					{
						$this->template->load('profile_edit', $data);
					}
				}
				else
				{
					$this->template->load('profile_edit', $data);
				}
			break;

			default:
				$this->template->load('profile', $data);
			break;
		}
	}

	public function project($option = 'view', $id = NULL)
	{
		if (!empty($id))
		{
			switch ($option) {
				case 'edit':
					if ($this->input->method() == 'post')
					{
						$deadline = NULL;
						if (!empty($this->input->post('deadline')))
						{
							$deadline = explode('/', $this->input->post('deadline'));
							foreach ($deadline as $dl) {
								if (!in_array($dl, ['dd', 'mm', 'yyyy']))
								{
									$deadline = $deadline[2].'-'.$deadline[1].'-'.$deadline[0];
								}
								else
								{
									$deadline = NULL;
								}
							}
						}

						$this->project->update(array(
							'name' => $this->input->post('name'),
							'category' => $this->input->post('category'),
							'area' => $this->input->post('area'),
							'budget' => $this->input->post('budget'),
							'deadline' => $deadline
						), array('id' => $id));

						$this->session->set_flashdata('project', array('status' => 'success', 'message' => 'Data project berhasil diperbaharui'));
						redirect(base_url($this->router->fetch_class().'/project'), 'refresh');
					}
					else
					{
						$data['edit'] = $this->project->view(array('id' => $id))->row();
						$this->template->load('project/edit', $data);
					}
				break;

				case 'delete':
				break;

				default:
					show_404();
				break;
			}
		}
		else
		{
			if ($option == 'add')
			{
				if ($this->input->method() == 'post')
				{
					$this->form_validation->set_rules('name', 'Nama Project', 'trim|required|max_length[40]');
					$this->form_validation->set_rules('category', 'Kategori Project', 'trim|required|integer', array('integer' => 'Bidang {field} dibutuhkan.'));
					$this->form_validation->set_rules('budget', 'Project Budget', 'trim|required|numeric');

					if ($this->form_validation->run() == TRUE)
					{
						$deadline = NULL;

						if (!empty($this->input->post('deadline')))
						{
							$deadline = explode('/', $this->input->post('deadline'));
							foreach ($deadline as $dl) {
								if (!in_array($dl, ['dd', 'mm', 'yyyy']))
								{
									$deadline = $deadline[2].'-'.$deadline[1].'-'.$deadline[0];
								}
								else
								{
									$deadline = NULL;
								}
							}
						}

						$this->project->create(array(
							'name' => $this->input->post('name'),
							'category' => $this->input->post('category'),
							'area' => $this->input->post('area'),
							'budget' => $this->input->post('budget'),
							'deadline' => $deadline
						));


						$this->session->set_flashdata('project', array('status' => 'success', 'message' => 'Data project berhasil ditambahkan'));
						redirect(base_url($this->router->fetch_class().'/project'), 'refresh');
					}
					else
					{
						$this->template->load('project/add');
					}
				}
				else
				{
					$this->template->load('project/add');
				}
			}
			else
			{
				if (!empty($id))
				{
					$this->output->set_content_type('application/json')->set_output(json_encode(array('status' => 'success', 'data' => $this->project_category->view(array('id' => $this->input->post('id')))->row())));
				}
				else
				{
					$this->template->load('project/home');
				}
			}
		}
	}

	public function project_category($option = 'view', $id = NULL)
	{
		if (!empty($id))
		{
			if ($this->input->method() == 'post')
			{
				$this->project_category->update(array('name' => $this->input->post('name')), array('id' => $id));
				$this->output->set_content_type('application/json')->set_output(json_encode(array('status' => 'success', 'data' => $this->project_category->view(array('id' => $id))->row())));
			}
			else
			{
				if ($option == 'view')
				{
					$this->output->set_content_type('application/json')->set_output(json_encode(array('status' => 'success', 'data' => $this->project_category->view(array('id' => $id))->row())));
				}
				else
				{
					$this->project_category->delete(array('id' => $id));
					$this->output->set_content_type('application/json')->set_output(json_encode(array('status' => 'success', 'data' => $this->project_category->view(array('id' => $id))->row())));
				}
			}
		}
		else
		{
			if ($this->input->method() == 'post')
			{
				$this->project_category->create(array('name' => $this->input->post('name')));
				$this->output->set_content_type('application/json')->set_output(json_encode(array('status' => 'success', 'data' => $this->project_category->view()->result())));
			}
			else
			{
				$this->output->set_content_type('application/json')->set_output(json_encode(array('status' => 'success', 'data' => $this->project_category->view()->result())));
			}
		}
	}

	public function criteria($option = 'view', $id = NULL)
	{
		if (!empty($id))
		{
			switch ($option) {
				case 'edit':
					if ($this->input->method() == 'post')
					{

					}
					else
					{
						$this->template->load('page');
					}
				break;

				case 'delete':
				break;

				default:
					show_404();
				break;
			}
		}
		else
		{
			if ($option == 'view')
			{
				$this->template->load('criteria/home');
			}
			// add
			else
			{
				// add
				if ($this->input->method() == 'post')
				{

				}
				// 
				else
				{
					$this->template->load('criteria/add');
				}
			}
		}
	}

	public function search_freelance($id)
	{
		$this->template->load('saw/search_freelance');
	}

	public function is_owned_data($val, $str)
	{
		$str = explode('.', $str);
		$data = $this->db->get('user', array($str[1] => $val));
		if ($data->num_rows() >= 1)
		{
			if ($data->row()->id == $str[2])
			{
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('is_owned_data', lang('form_validation_is_unique'));
				return FALSE;
			}
		}
		else
		{
			return TRUE;
		}

		return FALSE;
	}

	public function logout()
	{
		session_destroy();
		redirect(base_url($this->router->fetch_class().'/login'), 'refresh');
	}

	public function register()
	{
		$this->load->view('admin/register');
	}

	public function forgot_password()
	{
		if ($this->input->method() == 'post')
		{

		}
		else
		{
			$this->load->view('admin/forgot_password');
		}
	}

	public function reset_password($user_id = NULL)
	{
		$this->email->to('agungmasda29@gmail.com');
		$this->email->from('no-reply@medansoftware.my.id', 'Medan Software');
		$this->email->subject('Ganti Kata Sandi');
		$data['link'] = base_url();
		$data['code'] = 1337;
		$data['full_name'] = 'Agung Dirgantara';
		$this->email->message($this->load->view('email/reset_password', $data, TRUE));
		if (!$this->email->send())
		{
			redirect(base_url($this->router->fetch_class().'/forgot_password'), 'refresh');
		}
		else
		{
			redirect(base_url($this->router->fetch_class().'/forgot_password'), 'refresh');
		}		
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */