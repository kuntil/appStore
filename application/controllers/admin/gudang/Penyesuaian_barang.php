<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penyesuaian_barang extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->model('admin/gudang/Stok_model','item');
        $this->load->model('admin/gudang/StokRevisi_model','revisi');
        $this->load->model('admin/gudang/Gudang_model','gudang');
        $this->load->model('admin/gudang/Item_model','barang');
        
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
        $list = $this->barang->get_datatables();
        $this->data['item'] = $list;
        $this->data['data']=array();
        $this->template->admin_render('admin/gudang/penyesuaian_barang/index', $this->data);
    }

    public function execute(){
        if($this->revisi->isExist()){
            $this->add();
        }else{
            $this->edit();
        }
    }

    public function add(){
        
        $data= array(
            'gudang_id' => $this->input->post('gudang_id'),
            'item_code' => $this->input->post('item_code'),
            'tgl'=>$this->input->post('tgl'),
            'stok_revisi'=>$this->input->post('stok_revisi'),
            'alasan'=>$this->input->post('alasan')
        );

        $res = $this->revisi->add($data);
        if(!$res){
            $this->session->set_flashdata('Error',$res);
            redirect("admin/gudang/penyesuaian_barang");
        }else{
            $this->session->set_flashdata('Error',$res);
            redirect("admin/gudang/penyesuaian_barang");
        }
    }

    public function add_barang(){
        $data= array(
            'gudang_id' => $this->input->post('gudang_id'),
            'item_code' => $this->input->post('item_code'),
            'tgl'=>$this->input->post('tgl'),
            'stok_awal'=>$this->input->post('stok_awal'),
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

    public function edit(){
        
        $data= array(
            'stok_revisi'=>$this->input->post('stok_revisi'),
            'alasan'=>$this->input->post('alasan')
        );
        $res = $this->revisi->edit($data,$this->input->post('gudang_id'),$this->input->post('item_code'));
        if(!$res){
            $this->session->set_flashdata('Error',$res);
            redirect("admin/gudang/penyesuaian_barang");
        }else{
            $this->session->set_flashdata('Error',$res);
            redirect("admin/gudang/penyesuaian_barang");
        }
    }

    public function detail(string $id=null, string $item_code=null){

        /* Title Page */
        $this->page_title->push(lang('menu_dashboard'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $list = $this->revisi->getByID($id,$item_code);
        $this->data['item'] = $list;
        // print_r($list);
        $this->data['data']=array();
        $this->template->admin_render('admin/gudang/penyesuaian_barang/detail', $this->data);
    }

    public function ajax_list()
    {
        // echo "nilai gudang".$_POST['gudang_id'];
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
            $row[] = $item->stok_keluar;
            $row[] = $item->stok_sekarang;
            $row[] = '<a href="penyesuaian_stok/detail/'.$item->gudang_id.'/'.$item->item_code.'/'.$item->tgl.'">Penyesuaian Stok</a>';
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