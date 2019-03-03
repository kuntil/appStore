<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Item extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->model('admin/gudang/Item_model','item');
        
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
        $this->template->admin_render('admin/gudang/item/index', $this->data);
    }

    public function add(){
        
        $data= array(
            'item_code' => $this->input->post('item_code'),
            'item_name' => $this->input->post('item_name'),
            'supplier_id'=>$this->input->post('supplier_id'),
            'barcode'=>$this->input->post('barcode'),
            'desc'=>$this->input->post('desc'),
            'item_type'=>$this->input->post('item_type'),
            'item_tax'=>$this->input->post('item_tax'),
            'measurement_unit'=>$this->input->post('measurement_unit'),
            'brand_id'=>$this->input->post('brand_id'),
            'delivery_method'=>$this->input->post('delivery_method'),
            'photo'=>$this->input->post('photo'),
            'price_1'=>$this->input->post('price_1'),
            'price_1'=>$this->input->post('price_2'),
            'price_1'=>$this->input->post('price_3'),
            'disc_1'=>$this->input->post('disc_1'),
            'disc_1'=>$this->input->post('disc_2'),
            'disc_1'=>$this->input->post('disc_3'),
            'disc_1'=>$this->input->post('stock_alert'),
            'disc_1'=>$this->input->post('status')
        );

        $res = $this->item->add($data);
        if(!$res){
            $this->session->set_flashdata('Error',$res);
            redirect("admin/gudang/item");
        }else{
            $this->session->set_flashdata('Error',$res);
            redirect("admin/gudang/item");
        }
    }

    public function edit(){
        $key1 = $this->$this->input->post('item_code');
        $key2 = $this->input->post('supplier_id');
        $data= array(
            'item_name' => $this->input->post('item_name'),
            'barcode'=>$this->input->post('barcode'),
            'desc'=>$this->input->post('desc'),
            'item_type'=>$this->input->post('item_type'),
            'item_tax'=>$this->input->post('item_tax'),
            'measurement_unit'=>$this->input->post('measurement_unit'),
            'brand_id'=>$this->input->post('brand_id'),
            'delivery_method'=>$this->input->post('delivery_method'),
            'photo'=>$this->input->post('photo'),
            'price_1'=>$this->input->post('price_1'),
            'price_1'=>$this->input->post('price_2'),
            'price_1'=>$this->input->post('price_3'),
            'disc_1'=>$this->input->post('disc_1'),
            'disc_1'=>$this->input->post('disc_2'),
            'disc_1'=>$this->input->post('disc_3'),
            'disc_1'=>$this->input->post('stock_alert'),
            'disc_1'=>$this->input->post('status')
        );

        $res = $this->item->edit($data,$key1,$key2);
        if(!$res){
            $this->session->set_flashdata('Error',$res);
            redirect("admin/gudang/item");
        }else{
            $this->session->set_flashdata('Error',$res);
            redirect("admin/gudang/item");
        }
    }

    public function detail($id=null){
        $no=0;
        $list = $this->item->getByID($id);
                
        /* Title Page */
        $this->page_title->push(lang('menu_dashboard'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['item'] = $list;
        $this->data['data']=array();
        
        $this->template->admin_render('admin/gudang/item/detail', $this->data);
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
            $row[] = $item->item_code;
            $row[] = $item->item_name;
            $row[] = $item->supplier_id;
            // $row[] = $item->barcode;
            // $row[] = $item->desc;
            // $row[] = $item->item_type;
            $row[] = $item->item_tax;
            $row[] = $item->measurement_unit;
            $row[] = $item->brand_id;
            // $row[] = $item->delivery_method;
            // $row[] = $item->photo;
            // $row[] = $item->price_1;
            // $row[] = $item->price_2;
            // $row[] = $item->price_3;
            // $row[] = $item->disc_1;
            // $row[] = $item->disc_2;
            // $row[] = $item->disc_3;
            $row[] = $item->stock_alert;
            $row[] = $item->status;
            $row[] = '<a href="item/detail/'.$item->item_code.'">Edit</a>';
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