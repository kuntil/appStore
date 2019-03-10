<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_model extends CI_Model {

    var $table = 'stok_tbl';
    var $column_order = array(null, 'gudang_id','gudang_name','item_code','item_name','tgl','stok_awal','stok_keluar','stok_masuk','stok_sekarang','qversion','qid'); //set column field database for datatable orderable
    var $column_search = array('item_code','item_name','tgl','stok_awal','stok_keluar','stok_masuk','stok_sekarang','qversion','qid'); //set column field database for datatable searchable 
    var $order = array('stok_tbl.item_code' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function isExist(){
        $this->db->where('gudang_id',$_POST['gudang_id']);
        $this->db->where('item_code',$_POST['item_code']);
        $this->db->where('tgl',date('Y:m:d'));
        $result = $this->db->get($this->table);
        if($result->num_rows() > 0){
            return false;
        }else{
            return true;
        }
    }

    public function add($data){
        
        $res = $this->db->insert($this->table,$data);
        print_r($res);
        if(!$res){
            $ret['ErrorMessage'] = $this->db->_error_message();
            $ret['ErrorNumber'] = $this->db->_error_number();
            return $message = "DB Error: (".$ret['ErrorNumber'].") ".$ret['ErrorMessage'];
        }else{
            return $message = "Input Succesfully";
        }
    }
    
    public function edit($data,$key1,$key2){
        $this->db->set('gudang_id',$key1);
        $this->db->set('item_code',$key1);
        $this->db->set('tgl',date('Y/m/d'));
        $res = $this->db->update($this->table);
        if(!$res){
            $ret['ErrorMessage'] = $this->db->_error_message();
            $ret['ErrorNumber'] = $this->db->_error_number();
            return $message = "DB Error: (".$ret['ErrorNumber'].") ".$ret['ErrorMessage'];
        }else{
            return $message = "Input Succesfully";
        }
    }

    public function _get_datatables_query(){    
        $this->db->from($this->table);
        $i=0;
        if($_POST){
            foreach ($this->column_search as $item) // loop column 
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {
                    
                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }
    
                    if(count($this->column_search) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }
            
            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } 
            else if(isset($this->order))
            {   
                $order = $this->order;
                $this->db->order_by(key($order), $order[key($order)]);
            }
        }
    }
    
    function getByID( string $gudang_id=null, string $item_code=null){

        $this->db->where('gudang_id',$gudang_id);
        $this->db->where('item_code',$item_code);
        $this->db->where('tgl', date('y-m-d'));
        $query = $this->db->get($this->table);
        $num = $query->num_rows();
        echo $num;
        if($num==0){
            $data  = (object) array(
                'gudang_id'=> $gudang_id,
                'item_code'=> $item_code,
                'tgl'=> date('y-m-d'),
                'stok_revisi' => 0,
                'alasan'=> '',
            );
            $output = array($data);
            return($output);
        }else{
            return $query->result();
        }
        
    }
    

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST){
            if($_POST['length'] != -1){
                $this->db->limit($_POST['length'], $_POST['start']);
            }
        }
        $this->db->join('item_tbl','item_tbl.item_code = stok_tbl.item_code');
        $this->db->where('stok_tbl.gudang_id',$_POST['gudang_id']);
        // print_r($this->db);
        $query = $this->db->get();
        // print_r($query);
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $this->db->join('item_tbl','item_tbl.item_code = stok_tbl.item_code');
        $this->db->where('stok_tbl.gudang_id',$_POST['gudang_id']);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        $this->db->join('item_tbl','item_tbl.item_code = stok_tbl.item_code');
        $this->db->where('stok_tbl.gudang_id',$_POST['gudang_id']);
        return $this->db->count_all_results();
    }


}