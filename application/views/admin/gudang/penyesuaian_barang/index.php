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
                        <div class="input-group">
                        <label><h3 class="box-title">Pilih Gudang</h3></label>
                        <select class="form-control" name='gudang_id' id="selectGudang">
                            <option value=""></option>
                            <?php foreach( $gudang as $row) : ?>
                            <option value="<?php echo $row->gudang_id?>"><?php echo $row->gudang_name?></option>
                        <?php endforeach;?>
                        </select>
                    </div>
                    </div>
                    <div class="box-body">
                    
                    <table id="tableMerekBarang" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Tanggal</th>
                                <th>Stok Awal</th>
                                <th>Stok Masuk</th>
                                <th>Stok Keluar</th>
                                <th>Stok Sekarang</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Tanggal</th>
                            <th>Stok Awal</th>
                            <th>Stok Masuk</th>
                            <th>Stok Keluar</th>
                            <th>Stok Sekarang</th>
                            <th></th>
                            </tr>
                        </tfoot>
                    </table>

                    </div>
                    <div class="box-footer">
                    <button type="button" data-toggle="modal" data-target="#inputPenyesuaianBarang" class="btn btn-info">Tambah</button>
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
<div class="modal fade" id="inputPenyesuaianBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Memasukan Data</h4>
      </div>
      <div class="modal-body">
      <?php echo form_open('admin/gudang/penyesuaian_barang/add'); ?>
        <div class="box-body">
            <div class="input-group col-xs-12">              
            <label>Pilih Gudang </label>
            <select class="form-control" name='gudang_id'>
                <?php foreach( $gudang as $row) : ?>
                <option value="<?php echo $row->gudang_id?>"><?php echo $row->gudang_name?></option>
            <?php endforeach;?>
            </select>
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <label>Pilih Barang </label>
                <!-- <select class="form-control" name='gudang_id'>
                    <?php foreach( $item as $row) : ?>
                    <option value="<?php echo $row->item_code?>"><?php echo $row->item_name?></option>
                <?php endforeach;?>
                </select> -->
                <input type="text" class="form-control" id="searchItem" placeholder="Title" autocomplete="on">
            </div>
            <br>
            <div class="input-group col-xs-12">         
                <label>Tanggal </label>
                <div class="input-group date" data-provide="datepicker">
                    <input type="text" class="form-control" name='tgl' id='datepicker'>
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
            </div>
            <br>
            <div class="input-group col-xs-12">
                <label>Stok Awal </label>              
                <input type="input" class="form-control" id="stok_awal" name='stok_awal' placeholder="Stok Awal">
            </div>
            <br>
            <div class="input-group col-xs-12">              
            <label>Status </label>
            <select class="form-control" name='status'>
                <option value='1'>Aktif</option>
                <option value='2'>Tidak Aktif</option>
            </select>
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
var gudang;
$(document).ready(function() {

    $( "#searchItem" ).autocomplete({
        source: "<?php echo site_url('admin/gudang/item/get_autocomplete');?>"
    });

    $('#selectGudang').change( function() {
        // gudang = $("#selectGudang").val();
        table.ajax.reload();
    });


 //datatables
 table = $('#tableMerekBarang').DataTable({ 

     "processing": true, //Feature control the processing indicator.
     "serverSide": true, //Feature control DataTables' server-side processing mode.
     "order": [], //Initial no order.

     // Load data for the table's content from an Ajax sou\=orce
     "ajax": {
         "url": "<?php echo site_url('admin/gudang/stok/ajax_list')?>",
         "type": "POST",
         "data": function(d){
             d.gudang_id = $("#selectGudang").val();
         }
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
