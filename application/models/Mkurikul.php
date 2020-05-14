<?php

class Mkurikul extends CI_Model {

  function get_data() {
    return $this->db->get('kurikulum')->row();
  }

}
