<?php

class Supplier extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->helper('number');
        $this->load->model('admin/Supplier_model');
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }ss
    }


	public function index()
	{
        $this->data['data']=array();
        this->template->admin_render('admin/supplier/index', $this->data)
    }

    public function supplier_page()
     {

          // Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));


          $books = $this->supplier_page->get_suppliers();

          $data = array();

          foreach($books->result() as $r) {

               $data[] = array(
                    $r->supplier_id,
                    $r->supplier_name,
                    $r->addres,
                    $r->telp
               );
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => $books->num_rows(),
                 "recordsFiltered" => $books->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();
     }
}