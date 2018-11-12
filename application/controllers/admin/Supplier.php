<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Supplier extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->model('admin/Supplier_model','supplier');
        
    }


	public function index()
	{
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        /* Title Page */
        $this->page_title->push(lang('menu_dashboard'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['data']=array();
        $this->template->admin_render('admin/supplier/index', $this->data);
    }

    public function ajax_list()
    {
        $list = $this->supplier->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $suppliers) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $suppliers->supplier_id;
            $row[] = $suppliers->supplier_name;
            $row[] = $suppliers->adddres;
            $row[] = $suppliers->telp;
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->customers->count_all(),
                        "recordsFiltered" => $this->customers->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
}