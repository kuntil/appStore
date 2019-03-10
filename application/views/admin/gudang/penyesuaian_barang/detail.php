<div class="content-wrapper">
    <section class="content-header">
        <?php echo $pagetitle; ?>
        <?php echo $breadcrumb; ?>
    </section>

    <section class="content">
        <div class="row">
        <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"></h3>
                        <i class="fa fa-globe"></i>Detail Barang.
                        <small class="pull-right"><a href="../edit/<?php echo $this->uri->segment(5)?>">Edit</a></small>
                    </div>
                    <div class="box-body">
                    
                    <div class="row invoice-info">
                        <div class="col-sm-6 invoice-col">
                        <div class="modal-body">
                            <?php echo form_open('admin/gudang/penyesuaian_barang/execute');  foreach($item as $row) : ?>
                                <div class="box-body">
                                    <div class="input-group col-xs-12">      
                                        <label>Kode Barang</label>        
                                        <input type='hidden' name='gudang_id' value='<?php echo $row->gudang_id ?>'/>
                                        <input type="input" class="form-control" id="item_code" name='item_code'  value="<?php echo $row->item_code?>" readonly>
                                    </div>
                                    <br>
                                    <div class="input-group col-xs-12">   
                                        <label>Nama Barang</label>                  
                                        <input type="input" class="form-control" id="item_name" name='item_name' value="<?php echo $row->item_code?>"  readonly>
                                    </div>
                                    <br>
                                    <div class="input-group col-xs-12">  
                                    <label>Tanggal</label>                   
                                        <input type="input" class="form-control" id="tgl" name='tgl' placeholder="Tanggal Akhir" value=<?php echo date('Y/m/d'); ?> readonly>
                                    </div>
                                    <br>
                                    <div class="input-group col-xs-12">    
                                    <label>Stok Revisi</label>                
                                        <input type="input" class="form-control" id="stok" name='stok_revisi' value="<?php echo $row->stok_revisi ?>" placeholder="Stok">
                                    </div>
                                    <br>
                                    <div class="input-group col-xs-12">       
                                    <label>Alasan</label>              <br>
                                    <?php 
                                    $data = array(
                                        'name'        => 'alasan',
                                        'id'          => 'alasan',
                                        'value'       =>  $row->alasan,
                                        'rows'        => '5',
                                        'cols'        => '10',
                                        'style'       => 'width:100%',
                                      );
                                  
                                    echo form_textarea($data);
                                    ?>
                                    </div>
                                    <br>
                                </div>
                                <!-- /.box-body -->
                                
                            </div>
                        <div class="modal-footer">
                            <button type="cancel" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        <?php endforeach; 
                        echo form_close();?>
                        </div>
                        <!-- /.col -->
                        
                    </div>
                    </div>
                </div>
            </div>  
    </section>
</div>
 
<script type="text/javascript">
// $.noConflict();
var table;
$(document).ready(function() {
 
 //datatables
 table = $('#tableItemDetail').DataTable({ 

     "processing": true, //Feature control the processing indicator.
     "serverSide": true, //Feature control DataTables' server-side processing mode.
     "order": [], //Initial no order.

     // Load data for the table's content from an Ajax source
     "ajax": {
         "url": "<?php echo site_url('admin/gudang/item_price/ajax_list/')?>",
         "type": "POST",
         "data":{ "item_code": "<?php echo $this->uri->segment(5)?>" }
     },

     //Set column definition initialisation properties.
     "columnDefs": [
     { 
         "targets": [ 0 ], //first column / numbering column
         "orderable": false, //set not orderable
     },
     ],

 });

});

</script>
