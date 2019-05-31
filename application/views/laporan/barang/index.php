        

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
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Laporan semua penjualan barang</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                       <tr>
                          <th class="text-center">Nama Barang</th>
                          <th class="text-center">Kode barang</th>
                          <th class="text-center">Kategory</th>
                          <th class="text-center">Merek</th>
                          <th class="text-center">Stok</th>
                        </tr>
                      </thead>


                      <tbody>
                       <?php $total=0; ?>
                      <?php foreach ($penualan as $key): ?>
                        <tr>
                          <td class="text-center"> <?= $key['nama_barang'] ?></td>
                          <td class="text-center"> <?= $key['kode_barang'] ?></td>
                          <td class="text-center"> <?= $key['catagory'] ?></td>
                          <td class="text-center"> <?= $key['merek'] ?></td>
                          <td class="text-center"> <?= $key['stok']-$key['jumlah'] ?></td>
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

       
