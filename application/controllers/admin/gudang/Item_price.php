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
        $this->db->trans_start();
        // echo $this->item->get_sequenceNo($this->input->post('item_code'));
        $data= array(
            'seq_no' => $this->item->get_sequenceNo($this->input->post('item_code')),
            'item_code' => $this->input->post('item_code'),
            'valid_from'=>$this->input->post('valid_from'),
            'valid_to'=>$this->input->post('valid_to'),
            'harga_1'=>$this->input->post('harga_1'),
            'harga_2'=>$this->input->post('harga_2'),
            'harga_3'=>$this->input->post('harga_3'),
            'diskon_1'=>$this->input->post('diskon_1'),
            'diskon_2'=>$this->input->post('diskon_2'),
            'diskon_3'=>$this->input->post('diskon_3'),
            'status'=>$this->input->post('status')
         
        );
        $res = $this->item->add($data);
        if(!$res){
            $this->session->set_flashdata('Error',$res);
            redirect("admin/gudang/item/detail/".$this->input->post('item_code'));
            $this->db->trans_complete();
        }else{
            $this->item->change_status($this->input->post('item_code'),$this->input->post('valid_from'));
            $this->session->set_flashdata('Error',$res);
            $this->db->trans_complete();
            redirect("admin/gudang/item/detail/".$this->input->post('item_code'));
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
                        "recordsTotal" => $this->item->count_all($id),
                        "recordsFiltered" => $this->item->count_filtered($id),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
}