<?php

class Mfasilitas extends CI_Model {

  function get_data() {
    $this->db->order_by('id', 'ASC');
    return $this->db->get('fasilitas')->result();
  }

}
