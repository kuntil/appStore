<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penyesuaian_barang extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->model('admin/gudang/PenyesuaianBarang_model','item');
        
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
        $this->template->admin_render('admin/gudang/penyesuaian_barang/index', $this->data);
    }

    public function add(){
        
        $data= array(
            'seq_no' => $this->input->post('seq_no'),
            'gudang_id' => $this->input->post('gudang_id'),
            'item_id'=>$this->input->post('item_id'),
            'input_date'=>$this->input->post('input_date'),
            'qty'=>$this->input->post('qty'),
            'status'=>$this->input->post('status')
        );

        $res = $this->item->add($data);
        if(!$res){
            $this->session->set_flashdata('Error',$res);
            redirect("admin/gudang/penyesuaian_barang");
        }else{
            $this->session->set_flashdata('Error',$res);
            redirect("admin/gudang/penyesuaian_barang");
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
            $row[] = $item->seq_no;
            $row[] = $item->gudang_id;
            $row[] = $item->item_id;
            $row[] = $item->input_date;
            $row[] = $item->qty;
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