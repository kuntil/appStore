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
                        <h3 class="box-title">Category Barang</h3>
                    </div>
                    <div class="box-body">
                    
                    <table id="tableItem" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No Ref.</th>
                                <th>Gudang Asal</th>
                                <th>Gudang Tujuan</th>
                                <th>Barang</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No Ref.</th>
                                <th>Gudang Asal</th>
                                <th>Gudang Tujuan</th>
                                <th>Barang</th>
                                <th>Jumlah</th>
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
      <?php echo form_open('admin/gudang/category_barang/add'); ?>
        <div class="box-body">
            <div class="input-group col-xs-12">              
            <label>Pilih Gudang Asal </label>
            <select class="form-control" name='gudang_from'>
                <?php foreach( $gudang as $row) : ?>
                <option value="<?php echo $row->gudang_id?>"><?php echo $row->gudang_name?></option>
            <?php endforeach;?>  
            </select>         
            </div>
            <br>
            <div class="input-group col-xs-12">              
            <label>Pilih Gudang Tujuan </label>
            <select class="form-control" name='gudang_to'>
                <?php foreach( $gudang as $row) : ?>
                <option value="<?php echo $row->gudang_id?>"><?php echo $row->gudang_name?></option>
            <?php endforeach;?>
            </select> 
            </div>
            <br>
            <div class="input-group col-xs-12">              
            <label>Pilih Barang </label>
            <input type="text" class="form-control" name="item_code" id="searchItem" placeholder="Barang" autocomplete="on">
            </div>
            <br>
            <div class="input-group col-xs-12">
                <label>Stok Transfer </label>              
                <input type="input" class="form-control" id="stok" name='stok' placeholder="Stok">
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
 
    $( "#searchItem" ).autocomplete({
        source: "<?php echo site_url('admin/gudang/item/get_autocomplete');?>"
    });
 //datatables
 table = $('#tableItem').DataTable({ 

     "processing": true, //Feature control the processing indicator.
     "serverSide": true, //Feature control DataTables' server-side processing mode.
     "order": [], //Initial no order.

     // Load data for the table's content from an Ajax source
     "ajax": {
         "url": "<?php echo site_url('admin/gudang/category_barang/ajax_list')?>",
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
