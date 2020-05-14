<?php

class Kurikul extends App_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Mkurikul', 'mdl');

	}

	function index() {

		$data_array = array();
    $data_array['data'] = $this->mdl->get_data();
    
		$title = "Kurikulum";
		$deskripsi = "";
		$image = "";
		$subtitle = "kurikulum";
		$content = $this->load->view('frontend/kurikulum.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);

	}

}
