        

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?= $title; ?></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <?= $this->session->flashdata('message'); ?>
                <a href="<?= base_url('Data/add_goods') ?>" class="btn btn-primary col-md-12 btn-xs">Add Goods</a>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Users Employee Company</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">Nama Barang</th>
                          <th class="text-center">Kode Barang</th>
                          <th class="text-center">Katagori</th>
                          <th class="text-center">Merek</th>
                          <th class="text-center">Harga Beli</th>
                          <th class="text-center">Harga Jual</th>
                          <th class="text-center">Diskon</th>
                          <th class="text-center">Keterangan</th>
                          <th class="text-center">Stok</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach ($goods as $gds): ?>
                        <tr>
                          <td class="text-center"><?= $gds['nama_barang']; ?></td>
                          <td class="text-center"><?= $gds['kode_barang']; ?></td>
                          <td class="text-center"><?= $gds['catagory']; ?></td>
                          <td class="text-center"><?= $gds['merek']; ?></td>
                          <td class="text-center">Rp.<?= number_format(str_replace('.','',$gds['harga_beli'])); ?>,-</td>
                          <td class="text-center">Rp.<?= number_format(str_replace('.','',$gds['harga_jual'])); ?>,-</td>
                          <td class="text-center"><?= $gds['diskon']; ?></td>
                          <td class="text-center"><?= $gds['keterangan']; ?></td>
                          <td class="text-center"><?= $gds['stok']; ?></td>
                          <td class="text-center">
                            <a href="<?= base_url('data/edite_goods/').$gds['id']; ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o"></i></a>
                            <a href="<?= base_url('data/delete_goods/').$gds['id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a>
                          </td>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              </div>
          </div>
        </div>
        <!-- /page content -->

       
