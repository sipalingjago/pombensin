<?php

class Pengaduan extends App_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Mpengaduan', 'mdl');

	}

	function index($num = null) {

		$data_array = array();
		$config['base_url'] = base_url().'index.php/pengaduan/index/';
		$config['total_rows'] = $this->db->count_all('pengaduan');
		$config['per_page'] = '4';
		$config['full_tag_open']    = '<nav class="Page navigation example"><ul class="pagination justify-content-end pagination-lg">';
		$config['full_tag_close']   = '</ul></nav>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
		// $config['next_tag_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']  = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']  = '</span></li>';
		$this->pagination->initialize($config);

		$data_array['halaman'] = $this->pagination->create_links();
		$data_array['data'] = $this->mdl->get_data($config['per_page'],$num);

		$title = "Pengaduan";
		$deskripsi = "";
		$image = "";
		// $deskripsi = $data_array['agenda']->deskripsi;
		$subtitle = "pengaduan";
		$content = $this->load->view('frontend/pengaduan.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);


	}

	function send() {

		$data_array = array();


		$title = "Pengaduan";
		$deskripsi = "";
		$image = "";
		// $deskripsi = $data_array['agenda']->deskripsi;
		$subtitle = "pengaduan";
		$content = $this->load->view('frontend/kirim_pengaduan.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);


	}

	function data() {
		$data_array = array();

		// $data_array['agenda'] = $this->mdl->cek_data($id);
		$data_array['pengaduan'] = $this->mdl->get_data_all();
		$data_array['berita_lain'] = $this->mdl->cek_data2();

		$title = "Pengaduan";
		$deskripsi = "";
		$image = "";
		// $deskripsi = $data_array['agenda']->deskripsi;
		$subtitle = "pengaduan";
		$content = $this->load->view('user/pengaduan_list.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);

	}

	function id($id) {

		$data_array['data'] = $this->mdl->cek_data($id);
		$data_array['pengaduan'] = $this->mdl->get_pengaduan($id);

		$title = "Pengaduan";
		$deskripsi = "";
		$image = "";
		// $deskripsi = $data_array['agenda']->deskripsi;
		$subtitle = "pengaduan";
		$content = $this->load->view('frontend/pengaduan_detail.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);

	}

	function kirim() {

		$post = $this->input->post();
		$media = $_FILES['foto']['name'];
		if(empty($media)) {
			$name = NULL;
		} else {
			$config = array(
				'file_name'    => $media,
				'upload_path'  => './assets/image/',
				'allowed_types' => 'jpg|jpeg',
				'max_size'      => 0
			);

			$this->upload->initialize($config);

			if(!$this->upload->do_upload('foto')) {

				$error = $this->upload->display_errors($media);
				$this->alert_error($error);
				// echo $media[$i];exit;
				// $this->session->set_flashdata($error);
				redirect('pengaduan/send');

			}

			$get_name = $this->upload->data();
			$name = $get_name['file_name'];

		}

		// echo json_encode($name);exit;

		$data = array(
			'nama_pengadu' => $this->input->post('nama_pengadu'),
			'email' => $this->input->post('email'),
			'judul_pengaduan' => $this->input->post('judul_pengaduan'),
			'foto' => $name,
			'isi' => $this->input->post('isi'),
			'tanggal' => date('Y-m-d')
		);

		$query = $this->mdl->insert_data($data);

		$query == true ? $this->alert_info('Pengaduan anda berhasil terkirim') : $this->alert_error('Pengaduan anda berhasil terkirim');

		redirect('pengaduan');


	}

}
