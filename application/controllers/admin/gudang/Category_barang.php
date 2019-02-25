<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category_barang extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->model('admin/gudang/CategoryBarang_model','item');
        
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
        $this->template->admin_render('admin/gudang/category_barang/index', $this->data);
    }

    public function add(){
        
        $data= array(
            'category_id' => $this->input->post('category_id'),
            'category_name' => $this->input->post('category_name'),
            'category_desc'=>$this->input->post('category_desc')
        );

        $res = $this->item->add($data);
        if(!$res){
            $this->session->set_flashdata('Error',$res);
            redirect("admin/gudang/category_barang");
        }else{
            $this->session->set_flashdata('Error',$res);
            redirect("admin/gudang/category_barang");
        }
    }

    public function ajax_list()
    {
        $list = $this->item->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->category_id;
            $row[] = $item->category_name;
            $row[] = $item->category_desc;
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->item->count_all(),
                        "recordsFiltered" => $this->item->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
}