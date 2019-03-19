<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transfer_barang extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->model('admin/gudang/TransferBarang_model','item');
        $this->load->model('admin/gudang/gudang_model','gudang');
        
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
        $list = $this->gudang->get_datatables();
        $this->data['gudang'] = $list;
        $this->data['data']=array();
        $this->template->admin_render('admin/gudang/transfer_barang/index', $this->data);
    }

    public function add(){
        
        $data= array(
            'seq_no' => $this->input->post('seq_no'),
            'gudang_id' => $this->input->post('gudang_id'),
            'gudang_id_to'=>$this->input->post('gudang_id_to'),
            'item_code'=>$this->input->post('item_code'),
            'tgl_transfer'=>$this->input->post('tgl_transfer'),
            'qty'=>$this->input->post('qty'),
            'status'=>$this->input->post('status')
        );

        $res = $this->item->add($data);
        if(!$res){
            $this->session->set_flashdata('Error',$res);
            redirect("admin/gudang/transfer_barang");
        }else{
            $this->session->set_flashdata('Error',$res);
            redirect("admin/gudang/transfer_barang");
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
            $row[] = $item->gudang_id_to;
            $row[] = $item->item_code;
            $row[] = $item->tgl_transfer;
            $row[] = $item->status;
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