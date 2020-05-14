<?php

class Lokasi extends App_controller {

	function __construct() {

		parent::__construct();
		// $this->load->model('Mhome', 'mdl');

	}

  function index() {

		$data_array = array();

		$title = "Beranda";
		$deskripsi = "";
		$image = "";
		$subtitle = "home";
		$content = $this->load->view('frontend/home.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);

	}

  function id($id) {

		$data_array = array();
		$data_array['data'] = $this->db->select('l.*, kl.nama nama_kategori, kl.icon')
																	 ->from('lokasi l')
																	 ->join('kategori_lokasi kl', 'kl.id=l.id_kategori')
																	 ->where('l.id', $id)
																	 ->get()
																	 ->row();;

		$title = "Beranda";
		$deskripsi = "";
		$image = "";
		$subtitle = "home";
		$content = $this->load->view('frontend/lokasi.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);

	}

	function get_location() {
		$data = $this->db->get('lokasi')->result();
		echo json_encode($data);
	}
}
