<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Item_price extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->model('admin/gudang/ItemPrice_model','item');
        
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
            redirect("admin/gudang/gudang");
        }else{
            $this->session->set_flashdata('Error',$res);
            redirect("admin/gudang/gudang");
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
            redirect("admin/gudang/gudang");
        }else{
            $this->session->set_flashdata('Error',$res);
            redirect("admin/gudang/gudang");
        }
    }

    public function ajax_list()
    {
        $id=$_POST['item_code'];
        $list = $this->item->get_datatables($id);
        $data = array();
        $no = $_POST['start'];  
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->seq_no;
            $row[] = $item->item_code;
            $row[] = $item->valid_from;
            $row[] = $item->valid_to;
            $row[] = $item->harga_1;
            $row[] = $item->harga_2;
            $row[] = $item->harga_3;
            $row[] = $item->diskon_1;
            $row[] = $item->diskon_2;
            $row[] = $item->diskon_3;
            $row[] = $item->status;
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