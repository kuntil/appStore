<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Stok extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->model('admin/gudang/stok_model','item');
        
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
        $this->template->admin_render('admin/gudang/stok/index', $this->data);
    }

    public function add(){
        
        $data= array(
            'gudang_id' => $this->input->post('gudang_id'),
            'gudang_name' => $this->input->post('gudang_name'),
            'gudang_desc'=>$this->input->post('gudang_desc'),
            'status'=>$this->input->post('status')
        );

        $res = $this->item->add($data);
        if(!$res){
            $this->session->set_flashdata('Error',$res);
            redirect("admin/gudang/stok");
        }else{
            $this->session->set_flashdata('Error',$res);
            redirect("admin/gudang/stok");
        }
    }

    public function edit(){
        $data= array(
            'gudang_id' => $this->input->post('gudang_id'),
            'gudang_name' => $this->input->post('gudang_name'),
            'gudang_desc'=>$this->input->post('gudang_desc'),
            'status'=>$this->input->post('status')
        );

        $res = $this->item->edit($data);
        if(!$res){
            $this->session->set_flashdata('Error',$res);
            redirect("admin/gudang/stok");
        }else{
            $this->session->set_flashdata('Error',$res);
            redirect("admin/gudang/stok");
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
            $row[] = $item->item_code;
            $row[] = $item->item_name;
            $row[] = $item->tgl;
            $row[] = $item->stok_awal;
            $row[] = $item->stok_masuk;
            $row[] = $item->stok_keluar;
            $row[] = $item->stok_sekarang;
            $row[] ='<a href="penyesuaian_barang/detail/'.$item->gudang_id.'/'.$item->item_code.'">Penyesuaian Stok</a>';
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