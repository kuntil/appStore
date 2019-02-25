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
                        <h3 class="box-title">List Merek Barang</h3>
                    </div>
                    <div class="box-body">
                    
                    <table id="tablePenyesuaianBarang" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Tql Transfer</th>
                                <th>Seq No.</th>
                                <th>Gudang ID</th>
                                <th>Gudang ID To</th>
                                <th>Item Code</th>
                                <th>Qty</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>Tql Transfer</th>
                            <th>Seq No.</th>
                            <th>Gudang ID</th>
                            <th>Gudang ID To</th>
                            <th>Item Code</th>
                            <th>Qty</th>
                            <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>

                    </div>
                    <div class="box-footer">
                    <button type="button" data-toggle="modal" data-target="#inputGudangModal" class="btn btn-info">Tambah Barang</button>
                    <?php 
                    if($this->session->flashdata('error')!=null){
                        echo $this->session->flashdata('message_name');
                    }?>
                    </div>
                </div>
                
                </div>
                
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="inputMerekBarangModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Memasukan Data Merek</h4>
      </div>
      <div class="modal-body">
      <?php echo form_open('admin/gudang/penyesuaian_barang/add'); ?>
        <div class="box-body">
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="tgl_transfer" name='tgl_transfer' placeholder="Tgl Transfer">
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="gudang_id" name='gudang_id' placeholder="Gudang ID">
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="gudang_id_to" name='gudang_id_to' placeholder="Gudang ID To">
            </div>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="item_code" name='item_code' placeholder="Item Code">
            </div>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="qty" name='qty' placeholder="Quantity">
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="status" name='status' placeholder="Status">
            </div>
            <br>
        </div>
        <!-- /.box-body -->
        
      </div>
      <div class="modal-footer">
        <button type="cancel" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      <?php echo form_close();?>
    </div>
  </div>
</div>

 
<script type="text/javascript">
// $.noConflict();
var table;
$(document).ready(function() {
 
 //datatables
 table = $('#tablePenyesuaianBarang').DataTable({ 

     "processing": true, //Feature control the processing indicator.
     "serverSide": true, //Feature control DataTables' server-side processing mode.
     "order": [], //Initial no order.

     // Load data for the table's content from an Ajax sou\=orce
     "ajax": {
         "url": "<?php echo site_url('admin/gudang/penyesuaian_barang/ajax_list')?>",
         "type": "POST"
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
