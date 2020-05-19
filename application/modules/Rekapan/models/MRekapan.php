<?php

class Mrekapan extends CI_Model {

	function get_data() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('nozzel ')->result();
	}

	function insert_data($data) {
		return $this->db->insert('nozzel ', $data);
	}

	function get_tangki(){
		$this->db->order_by('id', 'ASC');
		return $this->db->get('tangki')->result();
	}

	function get_admin(){
		$this->db->order_by('id', 'ASC');
		return $this->db->get('admin')->result();
	}

	function cek_data($id) {
		$this->db->where('id', $id);
		return $this->db->get('nozzel ')->row();
	}

	function update_data($data, $id) {
		$this->db->where('id', $id);
		return $this->db->update('nozzel ', $data);
	}

	function delete_data($id) {
		$this->db->where('id', $id);
		return $this->db->delete('nozzel ');
	}

	function make_query()
	{
		$this->db->select('nozzel.*, tangki.nama as nama_tangki, admin.nama as nama_admin')
				 ->from("nozzel")
				 ->join("tangki", "tangki.id = nozzel.id_tangki")
				 ->join("admin", "admin.id = nozzel.id_admin");
			 if(isset($_POST["search"]["value"]))
			 {
						$this->db->like("nozzel.nama", $_POST["search"]["value"]);
						// $this->db->or_like("date", $_POST["search"]["value"]);
			 }
			 if(isset($_POST["order"]))
			 {
						$this->db->order_by($_POST['order']['0']['column'], $_POST['order']['0']['dir']);
			 }
			 else
			 {
						$this->db->order_by('nozzel.id', 'DESC');
			 }
	}

	function make_datatables(){
			 $this->make_query();
			 if($_POST["length"] != -1)
			 {
						$this->db->limit($_POST['length'], $_POST['start']);
			 }
			 $query = $this->db->get();
			 return $query->result();
	}

	function get_filtered_data(){
			 $this->make_query();
			 $query = $this->db->get();
			 return $query->num_rows();
	}

	function get_all_data()
	{
			 $this->db->select("*");
			 $this->db->from("nozzel ");
			 return $this->db->count_all_results();
	}


}
