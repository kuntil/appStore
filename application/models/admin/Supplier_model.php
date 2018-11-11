<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_suppliers(){
        return $this->db->get("supplier_tbl");
    }


}