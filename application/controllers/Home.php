<?php

class Home extends App_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Mhome', 'mdl');

	}

	function index() {

		$data_array = array();
		$data_array['slider'] = $this->mdl->get_slider();
		$data_array['berita'] = $this->mdl->get_berita();
		$data_array['artikel'] = $this->mdl->get_artikel();
		$data_array['tentang'] = $this->mdl->get_tentang();
		$data_array['keunggulan'] = $this->mdl->get_keunggulan();
		$data_array['program'] = $this->mdl->get_program();

		$title = "Beranda";
		$deskripsi = "";
		$image = "";
		$subtitle = "home";
		$content = $this->load->view('frontend/home.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);

	}

}
