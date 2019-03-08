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
                                    <h3 class="box-title"><?php echo lang('users_create_user'); ?></h3>
                                </div>   
                                <?php echo form_open('admin/gudang/item/edit/'.$this->uri->segment(4)); 
                                foreach($item as $row) : ?>
                                <div class="box-body">
                                    <label>Kode Barang</label>
                                    <div class="input-group col-xs-10">              
                                        <input type="input" class="form-control" id="item_code" name='item_code' placeholder="KD.Barang" value="<?php echo $row->item_code ?>" readonly>
                                    </div>
                                    <br>
                                    <label>Nama Barang</label>
                                    <div class="input-group col-xs-12">              
                                        <input type="input" class="form-control" id="item_name" name='item_name' placeholder="Nama Barang" value="<?php echo $row->item_name ?>">
                                    </div>
                                    <br>
                                    <label>Kode Supplier</label>
                                    <div class="input-group col-xs-12">              
                                        <input type="input" class="form-control" id="supplier_id" name='supplier_id' placeholder="Supplier Barang" value="<?php echo $row->supplier_id ?>">
                                    </div>
                                    <br>
                                    <label>Barcode</label>
                                    <div class="input-group col-xs-12">              
                                        <input type="input" class="form-control" id="barcode" name='barcode' placeholder="Barcode" value="<?php echo $row->barcode ?>">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <label>Type Barang</label>
                                        <select class="form-control" name='item_type'>
                                        <?php if ($row->item_type =="Purchase"){
                                            echo "<option selected >Purchase</option>";
                                            echo "<option>Service</option>";
                                        }else{
                                            echo "<option  >Purchase</option>";
                                            echo "<option selected>Service</option>";
                                        }?>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <label>Pajak Barang</label>
                                        <select class="form-control" name='item_tax'>
                                        <?php if ($row->item_tax =="1"){
                                            echo "<option value='1'Selected >Tidak Kena Pajak</option>";
                                            echo "<option value='2'>PPN</option>";
                                        }else{
                                            echo "<option value='1' >Tidak Kena Pajak</option>";
                                            echo "<option value='2' Selected>PPN</option>";
                                        }?>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <label>Delivery Method</label>
                                        <select class="form-control" name='delivery_method'>
                                        <?php if ($row->delivery_method =="1"){
                                            echo "<option value='1' selected>Direct Delivery</option>";
                                            echo "<option value='2'>Manual Delivery</option>";
                                        }else{
                                            echo "<option value='1'>Direct Delivery</option>";
                                            echo "<option value='2' selected>Manual Delivery</option>";
                                        }?>
                                        </select>
                                    </div>
                                    <br>
                                    <label>Unit Satuan</label>
                                    <div class="input-group ">              
                                        <input type="input" class="form-control" id="measurement_unit" name='measurement_unit' placeholder="Satuan Unit" value="<?php echo $row->measurement_unit ?>">
                                    </div>
                                    <br>
                                    <label>Pengingat Stok</label>
                                    <div class="input-group col-xs-12">              
                                        <input type="input" class="form-control" id="stock_alert" name='stock_alert' placeholder="Peringatan Stock" value="<?php echo $row->stock_alert ?>">
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                    <br>
                                    <div class="input-group col-xs-12">              
                                        <label for="desc">Deskripsi Barang</label>
                                        <textarea class="form-control" rows="3" id='desc' placeholder="Enter ..." name='desc'><?php echo $row->desc ?></textarea>
                                    </div>
                                    <br>
                                    <div class="icheckbox_flat-green">
                                    <div class="input-group">
                                        <label>Status</label>
                                        <select class="form-control" name='status'>
                                        <?php if ($row->status =="1"){
                                            echo "<option value='1' selected>Aktif</option>";
                                            echo "<option value='2'>Tidak Aktif</option>";
                                        }else{
                                            echo "<option value='1'>Aktif</option>";
                                            echo "<option value='2' selected>Tidak Aktif</option>";
                                        }?>
                                        </select>
                                    </div>
                                    </div>
                                    <?php endforeach;?>
                                </div>
                                <div class="modal-footer">
                                    <button type="cancel" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                <?php echo form_close();?>