<?php

class Profil extends App_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Mprofil', 'mdl');

	}

	function index() {
    $data_array = array();
		$data_array['tentang'] = $this->mdl->get_tentang();
		$data_array['visi'] = $this->mdl->get_visi();
		$data_array['misi'] = $this->mdl->get_misi();
		$data_array['pegawai'] = $this->mdl->get_pegawai();


		$title = "Profil";
		$deskripsi = "";
		$image = "";
		$subtitle = "profil";
		$content = $this->load->view('frontend/profil.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);
	}

}
