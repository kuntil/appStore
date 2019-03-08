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
                        <?php 
                        // echo print_r($item);
                        foreach($item as $row) : ?>
                        <div class="col-sm-6 invoice-col">
                        <address>
                            <strong>Kode Barang :<?php echo $row->item_code ?></strong><br>
                            Nama Barang :<?php echo $row->item_name ?><br>
                            Barcode : <?php echo $row->barcode ?><br>
                            Deskripsi : <?php echo $row->desc ?><br>
                            Tipe Barang : <?php echo $row->item_type ?><br>
                            Pajak : <?php echo $row->item_tax ?>
                        </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6 invoice-col">
                        <address>
                            <strong>Kode Supplier <?php echo $row->supplier_id ?></strong><br>
                            Unit Satuan : <?php echo $row->measurement_unit ?><br>
                            Kode Brand : <?php echo $row->brand_id ?><br>
                            Metode Pengiriman : <?php echo $row->delivery_method ?>
                        </address>
                        </div>
                        <!-- /.col -->
                        <?php endforeach; ?>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                    <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Histori Harga Barang</h3>
                    </div>
                    <div class="box-body">
                    
                    <table id="tableItemDetail" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Item Code</th>
                                <th>Tgl Mulai</th>
                                <th>Tgl Akhir</th>
                                <th>Harga 1</th>
                                <th>Harga 2</th>
                                <th>Harga 3</th>
                                <th>Diskon 1</th>
                                <th>Diskon 2</th>
                                <th>Diskon 3</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>No</th>
                            <th>Item Code</th>
                            <th>Tgl Mulai</th>
                            <th>Tgl Akhir</th>
                            <th>Harga 1</th>
                            <th>Harga 2</th>
                            <th>Harga 3</th>
                            <th>Diskon 1</th>
                            <th>Diskon 2</th>
                            <th>Diskon 3</th>
                            <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>

                    </div>
                    <div class="box-footer">
                    <button type="button" data-toggle="modal" data-target="#categorybarangModal" class="btn btn-info">Tambah Barang</button>
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
<div class="modal fade" id="categorybarangModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Memasukan Data Categori Barang</h4>
      </div>
      <div class="modal-body">
      <?php echo form_open('admin/gudang/item_price/add'); ?>
        <div class="box-body">
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="item_code" name='item_code' placeholder="Item Code" value="<?php echo $this->uri->segment(5)?>" readonly>
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <input type="date" class="form-control" id="valid_from" name='valid_from' placeholder="Tanggal Awal">
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <input type="date" class="form-control" id="valid_to" name='valid_to' placeholder="Tanggal Akhir">
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="harga_1" name='harga_1' placeholder="Harga 1">
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="harga_2" name='harga_2' placeholder="Harga 2">
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="harga_3" name='harga_3' placeholder="Harga 3">
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="diskon_1" name='diskon_1' placeholder="Diskon 1">
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="diskon_2" name='diskon_2' placeholder="Diskon 2">
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="diskon_3" name='diskon_3' placeholder="Diskon 3">
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="status" name='status' placeholder="Status">
            </div>
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
