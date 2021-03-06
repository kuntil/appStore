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
                        <h3 class="box-title">List Supplier</h3>
                    </div>
                    <div class="box-body">
                    
                    <table id="tableSupplier" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Supplier</th>
                                <th>Nama Supplier</th>
                                <th>Alamat</th>
                                <th>Telp</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
            
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Supplier</th>
                                <th>Nama Supplier</th>
                                <th>Alamat</th>
                                <th>Telp</th>
                            </tr>
                        </tfoot>
                    </table>

                    </div>
                    <div class="box-footer">
                    <button type="button" data-toggle="modal" data-target="#supplierModal" class="btn btn-info">Tambah Supplier</button>
                    <?php 
                    if($this->session->flashdata('error')!=null){
                        echo $this->session->flashdata('message_name');
                    }?>
                    </div>
                </div>
                
                </div>
                
        </div>
    </section>
</di         </div>
XDcCCC            <br>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="nama_supplier" name='nama_supplier' placeholder="Nama Supplier">
            </div>
   v>

<!-- Modal -->
<div class="modal fade" id="supplierModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Memasukan Data Supplier</h4>
      </div>
      <div class="modal-body">
      <?php echo form_open('admin/supplier/add'); ?>
        <div class="box-body">
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="kd_supplier" name='kd_supplier' placeholder="Kode Supplier">
            <br>
            <div class="input-group col-xs-12">              
                <input type="input" class="form-control" id="telp" name='telp' placeholder="Telp">
            </div>
            <br>
            <div class="input-group col-xs-12">              
                <label for="desc">Alamat</label>
                <textarea class="form-control" rows="3" id='desc' placeholder="Enter ..." name='desc'></textarea>
            </div>
            <br>
            <div class="icheckbox_flat-green">
            <label>
            <label>Status </label>
            <select class="form-control" name='status'>
                <option value='1'>Aktif</option>
                <option value='2'>Tidak Aktif</option>
            </select>
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
 table = $('#tableSupplier').DataTable({ 

     "processing": true, //Feature control the processing indicator.
     "serverSide": true, //Feature control DataTables' server-side processing mode.
     "order": [], //Initial no order.

     // Load data for the table's content from an Ajax source
     "ajax": {
         "url": "<?php echo site_url('admin/supplier/ajax_list')?>",
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
