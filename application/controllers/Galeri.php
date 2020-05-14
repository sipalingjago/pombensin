<?php

class Galeri extends App_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Mgaleri', 'mdl');

	}

	function index() {
    $data_array = array();
		$data_array['data'] = $this->mdl->get_ketegori_foto();

		$title = "Galeri";
		$deskripsi = "";
		$image = "";
		$subtitle = "galeri";
		$content = $this->load->view('frontend/galeri.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);
	}

	function id($id) {
		$data_array = array();
		$data_array['data'] = $this->mdl->get_foto($id);

		$title = "Galeri";
		$deskripsi = "";
		$image = "";
		$subtitle = "galeri";
		$content = $this->load->view('frontend/galeri_detail.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);
	}

}
