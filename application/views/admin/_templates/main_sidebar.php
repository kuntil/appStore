<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <aside class="main-sidebar">
                <section class="sidebar">
<?php if ($admin_prefs['user_panel'] == TRUE): ?>
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $user_login['firstname'].$user_login['lastname']; ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> <?php echo lang('menu_online'); ?></a>
                        </div>
                    </div>

<?php endif; ?>
<?php if ($admin_prefs['sidebar_form'] == TRUE): ?>
                    <!-- Search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="<?php echo lang('menu_search'); ?>...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>

<?php endif; ?>
                    <!-- Sidebar menu -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="<?php echo site_url('/'); ?>">
                                <i class="fa fa-home text-primary"></i> <span><?php echo lang('menu_access_website'); ?></span>
                            </a>
                        </li>

                        <li class="header text-uppercase"><?php echo lang('menu_main_navigation'); ?></li>
                        <li class="<?=active_link_controller('users')?>">
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span>Penjualan</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Faktur Penjualan</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Transaksi Faktur Penjualan</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Konsumen & Laporan Penjualan</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Konsumen</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Area Penjualan & Salesman</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Penagihan</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Petugas Penagihan</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Salesman</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Area Penjualan</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Pengiriman/Ekspedisi</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Penawaran Penjualan</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Surat Jalan</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Pencarian Barang</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Pelunasan Faktur Penjualan</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Otorisasi Penjualan</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Voucher Hutang</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Retur Faktur Penjualan</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Pemberian Hak Akses Faktur</a></li>
                            </ul>
                        </li>
                        <li class="<?=active_link_controller('groups')?>">
                        <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span>Pembelian</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Faktur Pembelian</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Transaksi Faktur Pembelian</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Laporan Supplier & Pembelian</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('admin/supplier'); ?>">Supplier</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Penawaran Pembelian</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Kode Barang Supplier</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Pelunasan Faktur Pembelian</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Voucher Piutang</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Produksi</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Retur Faktur Pembelian</a></li>
                            </ul>
                        </li>
                        <li class="treeview <?=active_link_controller('prefs')?>">
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span>Barang & Gudang</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('admin/gudang/transfer_gudang'); ?>">Transfer Antar Gudang</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('admin/gudang/penyesuain_barang'); ?>">Penyesuaian Persedian</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Laporan Persedian</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('admin/gudang/item'); ?>">Barang</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('admin/gudang/category_barang'); ?>">Kategori Barang</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('admin/gudang/gudang'); ?>">Gudang</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('admin/gudang/unit_satuan'); ?>">Unit Satuan</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Daftar Harga</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('admin/gudang/merk_barang'); ?>">Merk Barang</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Otorisasi Retur pada Barang</a></li>
                            </ul>
                        </li>
                        <li class="<?=active_link_controller('groups')?>">
                            <a href="#">
                                <i class="fa fa-shield"></i>
                                <span>Akuntansi</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Pembayaran</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Deposit</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Transfer antar kas</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Laporan Akuntansi</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Kas & Bank</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">GI Chart</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Kategori Transaksi</a></li>
                            </ul>
                        </li>
                        <li class="<?=active_link_controller('groups')?>">
                            <a href="#">
                                <i class="fa fa-shield"></i>
                                <span>Pengaturan</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Oengaturan Perusahaan</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Akun Pengguna</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Hak Akses Pengguna</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Jangka Waktu Pembayaran</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Progil Penjualan - POS</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Tipe Pajak</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Grup Pajak</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Tipe Pajak barang</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Pengatruan Buku Besar - GL</a></li>
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('#'); ?>">Log Pengguna</a></li>

                            </ul>
                        </li>
                        <li class="<?=active_link_controller('files')?>">
                            <a href="<?php echo site_url('admin/files'); ?>">
                                <i class="fa fa-file"></i> <span><?php echo lang('menu_files'); ?></span>
                            </a>
                        </li>
                    </ul>
                </section>
            </aside>
