        

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
                <div class="x_panel">
                  <form method="post">

                    <div class="row margin-b">
                      <div class="col-md-3 col-sm-12 col-xs-12">
                        <input type="text" id="kode_barang" name="kode_barang" class="form-control" placeholder="Kode Barang">
                      </div>
                      <div class="col-md-9 col-sm-12 col-xs-12">
                      <button type="button" class="btn btn-info " id="COdee" data-toggle="modal" data-target="#cariKodee"><i class="fa fa-search"></i> Kode</button>
                      </div>

                      <div class="col-md-3 col-sm-12 col-xs-12">
                        <input type="number" id="stok" name="stok" class="form-control" placeholder="Stok">
                      </div>   
                    </div>

                    <div class="row">
                      <div class="col-md-3 col-sm-12 col-xs-12">
                        <button type="submit" class="btn btn-primary col-md-12 col-sm-12 col-xs-12">Tambah</button>
                      </div>
                    </div>


                  </form>
                </div>

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Stok Pembelian Barang</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">Nama Barang</th>
                          <th class="text-center">Kode Barang</th>
                          <th class="text-center">Stok Pembelian</th>
                          <th class="text-center">Tanggal</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach ($pembelian as $gds): ?>
                        <tr>
                          <td class="text-center"><?= $gds['nama_barang']; ?></td>
                          <td class="text-center"><?= $gds['kode_barang']; ?></td>
                          <td class="text-center"><?= $gds['stok_tambahan']; ?></td>
                          <td class="text-center"><?= $gds['date_pembelian']; ?></td>
                          <td class="text-center"></td>
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

       


<!-- Cari Kode -->
<div class="modal fade" id="cariKodee" tabindex="-1" role="dialog" aria-labelledby="cariKodeeLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title text-body text-center" id="cariKodeeLabel"><i class="fa fa-check-square-o"></i> Cari Kode</h4>
      </div>
      <div class="modal-body">  
         <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">Nama Barang</th>
                          <th class="text-center">Kode Barang</th>
                          <th class="text-center">Pilih</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach ($barang as $gds): ?>
                        <tr>
                          <td class="text-center"><?= $gds['nama_barang']; ?></td>
                          <td class="text-center"><?= $gds['kode_barang']; ?></td>
                          <td class="text-center">
                            <a class="btn btn-success btn-xs namaKode" namaKode="<?= $gds['kode_barang']; ?>"><i class="fa fa-check"></i> Pilih</a>
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
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

  <script type="text/javascript">
    $(document).ready(function()
    {


      $('.namaKode').click(function()
      {
          $('#kode_barang').val($(this).attr('namaKode'))
          $('#cariKodee').modal('hide');
          $('#kode_barang').focus();
      });


    });
  </script>