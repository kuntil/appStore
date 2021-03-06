<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemPrice_model extends CI_Model {

    var $table = 'item_price_tbl';
    var $column_order = array(null, 'seq_no','item_code','valid_from','valid_to','harga_1','harga_2','harga_3','diskon_1','diskon_2','diskon_3','status'); //set column field database for datatable orderable
    var $column_search = array('seq_no','item_code','valid_from','valid_to','harga_1','harga_2','harga_3','diskon_1','diskon_2','diskon_3','status'); //set column field database for datatable searchable 
    var $order = array('seq_no , item_code' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }   

    public function get_sequenceNo($id){
        $query ="SELECT IFNULL(MAX(seq_no),0)+1 seq_no FROM item_price_tbl WHERE item_code='$id'";
        $res = $this->db->query($query)->row();
        // echo print_r($res);
        return $res->seq_no;
    }

    public function change_status($id,$validFrom){
        $data = array(
            'status' => '0',
            'valid_to'=> $validFrom
         );
        $this->db->where('item_code',$id);
        $this->db->where('valid_from !=',$validFrom);
        $res =$this->db->update($this->table,$data);
        if(!$res){
            return 0;
        }else{
            return 1;
        }
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

    public function edit($data=null,$key=null){
        $this->db->set($data);
        $this->db->where('item_code',$key1);
        $res = $this->db->update($this->table);
        if(!$res){
            $ret['ErrorMessage'] = $this->db->_error_message();
            $ret['ErrorNumber'] = $this->db->_error_number();
            return $message = "DB Error: (".$ret['ErrorNumber'].") ".$ret['ErrorMessage'];
        }else{
            return $message = "Update Succesfully";
        }
    }

    public function _get_datatables_query($id){
        $this->db->where('item_code',$id);
        $this->db->from($this->table);
        $i=0;

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

    function get_datatables($id=null)
    {
        $this->_get_datatables_query($id);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function getByID($id,$seq_no){
        $this->db->where('item_code',$id);
        $this->db->where('seq_no',$seq_no); 
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
 
    function count_filtered($id=null)
    {
        $this->_get_datatables_query($id);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all($id=null)
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


}