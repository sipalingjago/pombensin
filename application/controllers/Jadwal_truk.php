<?php

class Jadwal_truk extends App_controller {

	function __construct() {

		parent::__construct();
		// $this->load->model('Mhome', 'mdl');

	}

  function index() {

		$data_array = array();
		$data_array['jadwal'] = $this->db->get('jadwal_truk')->result();

		$title = "Jadwal Truk";
		$deskripsi = "";
		$image = "";
		$subtitle = "jadwal";
		$content = $this->load->view('frontend/jadwal.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);

	}

}
