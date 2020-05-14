<?php

class Harga extends App_controller {

	function __construct() {

		parent::__construct();
		// $this->load->model('Mhome', 'mdl');

	}

  function index() {

		$data_array = array();
		$data_array['kategori'] = $this->db->get('kategori_sampah')->result();

		$title = "Harga Sampah";
		$deskripsi = "";
		$image = "";
		$subtitle = "harga";
		$content = $this->load->view('frontend/harga.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);

	}

}
