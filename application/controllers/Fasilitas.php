<?php

class Fasilitas extends App_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Mfasilitas', 'mdl');

	}

	function index() {
    $data_array = array();
		$data_array['data'] = $this->mdl->get_data();

		$title = "Fasilitas";
		$deskripsi = "";
		$image = "";
		$subtitle = "fasilitas";
		$content = $this->load->view('frontend/fasilitas.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);
	}

}
