<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_Model {

    var $table = 'item_tbl';
    var $column_order = array(null, 'item_code','item_name','supplier_id','item_tax','measurement_unit','brand_id','stock_alert','status'); //set column field database for datatable orderable
    var $column_search = array('item_code','item_name','supplier_id','item_tax','measurement_unit','brand_id','stock_alert','status'); //set column field database for datatable searchable 
    var $order = array('item_code' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add($data){
        $res = $this->db->insert($this->table,$data);
        if(!$res){
            $ret['ErrorMessage'] = $this->db->_error_message();
            $ret['ErrorNumber'] = $this->db->_error_number();
            return $message = "DB Error: (".$ret['ErrorNumber'].") ".$ret['ErrorMessage'];
        }else{
            return $message = "Input Succesfully";
        }
    }

    public function edit($data,$key1,$key2){
        $this->db->set($data);
        $this->db->where('item_code',$key1);
        $this->db->where('supplier_id',$key2);
        $res = $this->db->update($this->table);
        if(!$res){
            $ret['ErrorMessage'] = $this->db->_error_message();
            $ret['ErrorNumber'] = $this->db->_error_number();
            return $message = "DB Error: (".$ret['ErrorNumber'].") ".$ret['ErrorMessage'];
        }else{
            return $message = "Update Succesfully";
        }
    }

    public function search_item($item){
        $this->db->like('item_name', $item , 'both');
        $this->db->order_by('item_name', 'ASC');
        $this->db->limit(10);
        return $this->db->get($this->table)->result();
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

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST){
            if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function getByID($id){
        $this->db->where('item_code',$id);
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


}