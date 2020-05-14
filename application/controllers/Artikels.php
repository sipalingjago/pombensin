<?php

class Artikels extends App_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Martikels', 'mdl');

	}

	function index($num = null) {
    $data_array = array();
		$config['base_url'] = base_url().'index.php/artikels/index/';
		$config['total_rows'] = $this->db->count_all('artikel');
		$config['per_page'] = '9';
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
		$data_array['berita'] = $this->mdl->get_data($config['per_page'],$num);

		$title = "Artikel";
		$deskripsi = "";
		$image = "";
		$subtitle = "artikel";
		$content = $this->load->view('frontend/artikel.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);

	}

	function id($id) {

		$data_array = array();

		$data_array['berita'] = $this->mdl->cek_data($id);
		$data_array['berita2'] = $this->mdl->cek_data2($id);
		$data_array['berita3'] = $this->mdl->cek_data3($id);

		//Hitung user yang membaca berita
		$see = $data_array['berita']->hits;
		$see = $see + 1;
		$data['hits'] = $see;
		$this->mdl->update_data($id, $data);

		$title = $data_array['berita']->judul;
		$deskripsi = $data_array['berita']->deskripsi;
		$image = $data_array['berita']->thumb;
		$subtitle = "berita";
		$content = $this->load->view('frontend/artikel_detail.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);

	}

}
