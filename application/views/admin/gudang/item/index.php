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
                        <h3 class="box-title">List Barang</h3>
                    </div>
                    <div class="box-body">
                    
                    <table id="tableItem" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>KD.Barang</th>
                                <th>Nama</th>
                                <th>Supplier</th>
                                <!--<th>Barcode</th>
                                <th>Desc</th>
                                <th>item_type</th>-->
                                <th>item_tax</th>
                                <th>measurement_unit</th>
                                <th>brand_id</th>
                                <!--<th>delivery_method</th>
                                <th>photo</th>
                                <th>Harga</th>
                                <th>price_2</th>
                                <th>price_3</th>
                                <th>disc_1</th>
                                <th>disc_2</th>
                                <th>disc_3</th>-->
                                <th>stock_alert</th>
                                <th>status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>No</th>
                            <th>KD.Barang</th>
                            <th>Nama</th>
                            <th>Supplier</th>
                            <!--<th>Barcode</th>
                            <th>Desc</th>
                            <th>item_type</th>-->
                            <th>item_tax</th>
                            <th>measurement_unit</th>
                            <th>brand_id</th>
                            <!--<th>delivery_method</th>
                            <th>photo</th>
                            <th>Harga</th>
                            <th>price_2</th>
                            <th>price_3</th>
                            <th>disc_1</th>
                            <th>disc_2</th>
                            <th>disc_3</th>-->
                            <th>stock_alert</th>
                            <th>status</th>
                            <th></th>
                            </tr>
                        </tfoot>
                    </table>

                    </div>
                    <div class="box-footer">
                    <button type="button" data-toggle="modal" data-target="#itemModal" class="btn btn-info">Tambah Barang</button>
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

<!-- Modal  ADD-->
<div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Memasukan Data Barang</h4>
      </div>
      <div class="modal-body">
      <?php echo form_open('admin/gudang/item/add'); ?>
        <div class="box-body">
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="kd_barang" name='brand_id' placeholder="Brand">
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="item_code" name='item_code' placeholder="KD.Barang">
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="item_name" name='item_name' placeholder="Nama Barang">
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="supplier_id" name='supplier_id' placeholder="Supplier Barang">
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="barcode" name='barcode' placeholder="Barcode">
            </div>
            <br>
            <div class="input-group">
                  <label>Type Barang</label>
                  <select class="form-control" name='item_type'>
                    <option>Purchase</option>
                    <option>Service</option>
                  </select>
            </div>
            <br>
            <div class="input-group">
                  <label>Pajak Barang</label>
                  <select class="form-control" name='item_tax'>
                    <option value='1'>Tidak Kena Pajak</option>
                    <option value='2'>PPN</option>
                  </select>
            </div>
            <br>
            <div class="input-group">
                  <label>Delivery Method</label>
                  <select class="form-control" name='delivery_method'>
                    <option value='1'>Direct Delivery</option>
                    <option value='2'>Manual Delivery</option>
                  </select>
            </div>
            <br>
            <div class="input-group ">              
                <input type="input" class="form-control" id="measurement_unit" name='measurement_unit' placeholder="Satuan Unit">
            </div>
            <br>
            <div class="input-group">             
                <span class="input-group-addon">Rp</span>
                <input type="input" class="form-control" id="kd_barang" placeholder="Recommended Purchase Price">
                <span class="input-group-addon">.00</span>
            </div>
            <br>
            <div class="input-group">           
                <span class="input-group-addon">Rp</span>   
                <input type="input" class="form-control" id="kd_barang" placeholder="Recommended Sales Price">
                <span class="input-group-addon">.00</span>
            </div>
            <!--<div class="input-group">              
                <label for="kd_barang">Harga</label>
                <input type="input" class="form-control" id="kd_barang" placeholder="Isi Kode Barang">
            </div>-->
            <br>
            <div class="input-group">              
                <span class="input-group-addon">%</span>
                <input type="input" class="form-control" id="disc" name='disc_1' placeholder="Recommended Discount 1">
                <span class="input-group-addon">%</span>
                <input type="input" class="form-control" id="disc" name='disc_2' placeholder="Recommended Discount 2">
                <span class="input-group-addon">%</span>
                <input type="input" class="form-control" id="disc" name='disc_3' placeholder="Recommended Discount 2">
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="stock_alert" name='stock_alert' placeholder="Peringatan Stock">
                <span class="input-group-addon">.00</span>
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <label for="desc">Deskripsi Barang</label>
                <textarea class="form-control" rows="3" id='desc' placeholder="Enter ..." name='desc'></textarea>
            </div>
            <br>
            <div class="icheckbox_flat-green">
            <label>
                <input type="checkbox">Active
            </label>
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

<!-- END Modal Add -->

<!-- Modal  Edit-->
<div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Memasukan Data Barang</h4>
      </div>
      <div class="modal-body">
      <?php echo form_open('admin/gudang/item/add'); ?>
        <div class="box-body">
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="kd_barang" name='brand_id' placeholder="Brand">
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="item_code" name='item_code' placeholder="KD.Barang">
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="item_name" name='item_name' placeholder="Nama Barang">
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="supplier_id" name='supplier_id' placeholder="Supplier Barang">
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="barcode" name='barcode' placeholder="Barcode">
            </div>
            <br>
            <div class="input-group">
                  <label>Type Barang</label>
                  <select class="form-control" name='item_type'>
                    <option>Purchase</option>
                    <option>Service</option>
                  </select>
            </div>
            <br>
            <div class="input-group">
                  <label>Pajak Barang</label>
                  <select class="form-control" name='item_tax'>
                    <option value='1'>Tidak Kena Pajak</option>
                    <option value='2'>PPN</option>
                  </select>
            </div>
            <br>
            <div class="input-group">
                  <label>Delivery Method</label>
                  <select class="form-control" name='delivery_method'>
                    <option value='1'>Direct Delivery</option>
                    <option value='2'>Manual Delivery</option>
                  </select>
            </div>
            <br>
            <div class="input-group ">              
                <input type="input" class="form-control" id="measurement_unit" name='measurement_unit' placeholder="Satuan Unit">
            </div>
            <br>
            <div class="input-group">             
                <span class="input-group-addon">Rp</span>
                <input type="input" class="form-control" id="kd_barang" placeholder="Recommended Purchase Price">
                <span class="input-group-addon">.00</span>
            </div>
            <br>
            <div class="input-group">           
                <span class="input-group-addon">Rp</span>   
                <input type="input" class="form-control" id="kd_barang" placeholder="Recommended Sales Price">
                <span class="input-group-addon">.00</span>
            </div>
            <!--<div class="input-group">              
                <label for="kd_barang">Harga</label>
                <input type="input" class="form-control" id="kd_barang" placeholder="Isi Kode Barang">
            </div>-->
            <br>
            <div class="input-group">              
                <span class="input-group-addon">%</span>
                <input type="input" class="form-control" id="disc" name='disc_1' placeholder="Recommended Discount 1">
                <span class="input-group-addon">%</span>
                <input type="input" class="form-control" id="disc" name='disc_2' placeholder="Recommended Discount 2">
                <span class="input-group-addon">%</span>
                <input type="input" class="form-control" id="disc" name='disc_3' placeholder="Recommended Discount 2">
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="stock_alert" name='stock_alert' placeholder="Peringatan Stock">
                <span class="input-group-addon">.00</span>
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <label for="desc">Deskripsi Barang</label>
                <textarea class="form-control" rows="3" id='desc' placeholder="Enter ..." name='desc'></textarea>
            </div>
            <br>
            <div class="icheckbox_flat-green">
            <label>
                <input type="checkbox">Active
            </label>
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
 table = $('#tableItem').DataTable({ 

     "processing": true, //Feature control the processing indicator.
     "serverSide": true, //Feature control DataTables' server-side processing mode.
     "order": [], //Initial no order.

     // Load data for the table's content from an Ajax source
     "ajax": {
         "url": "<?php echo site_url('admin/gudang/item/ajax_list')?>",
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

 $('#editItemModal').click(function () {
    var ids = $.map(table.rows('.selected').data(), function (item) {
        return item[0]
    });
    console.log(ids)
    alert(table.rows('.selected').data().length + ' row(s) selected');
});

});

</script>
