        

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
                          <th class="text-center">ID</th>
                          <th class="text-center">Tanggal</th>
                          <th class="text-center">Faktur</th>
                          <th class="text-center">Pemasukan</th>
                          <th class="text-center">Pembayaran</th>
                          <th class="text-center">Pelanggan</th>
                          <th class="text-center"></th>
                        </tr>
                      </thead>



                      <tbody>
                       <?php $total=0; ?>
                      <?php foreach ($penualan as $key): ?>
                        <!-- <?php $harga=str_replace('.','',$key['harga_jual']); ?>
                           <?php $diskon= $key['diskon']; ?>
                           <?php $count=$harga*$diskon/100 ?>
                           <?php $subtotal=$harga-$count ?> -->
                           <?php if ($key['pembayaran'] < $key['pemasukan']): ?>
                             <?php $pemasukan = '<span style="color: #f4c542">Belum Lunas</span>'; ?>
                             <?php else: ?>
                             <?php $pemasukan = '<span style="color: #5eb240">Lunas</span>'; ?>
                           <?php endif ?>
                        <tr>
                          <td class="text-center"><?= $key['id_faktur'] ?></td>
                          <td class="text-center"><?= $key['date']; ?></td>
                          <td class="text-center"> <?= $key['no_faktur']; ?></td>
                          <td class="text-center">Rp.<?= number_format($key['pemasukan']);?>,-</td>
                          <td class="text-center"><?= $pemasukan; ?></td>
                          <td class="text-center">-</td>
                          <td class="text-center"><a class="modalPenjualan" faktur="<?= $key['no_faktur'] ?>" ><i class="fa fa-cog"></i></a></td>
                        
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

       




  <!-- Modal -->
<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="infoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       <div class="modal-header bg-primary text-center">
         <h4><strong>Toko Elektronik</strong></h4>
        <span>Desa tambak Bitin Kec.Daha Utara Kab. Hulu Sungai Selatan</span>
      </div>
        <div class="modal-body">  
  
        <div class="row">
          <div class="col-md-5 col-sm-5 col-xs-12">
                  <table class="myTable">
                <tr>
                  <td>Tanggal</td>
                  <td>:</td>
                  <td><?= date('d m Y'); ?></td>
                </tr>
                <tr>
                  <td>Fakture Penjualan</td>
                  <td>:</td>
                  <td id="noFakturModal"></td>
                </tr>
              </table>
          </div>

          <div class="col-md-12 col-sm-12 col-xs-12">
            <hr>
                  <table class="myTable">
                <thead>
                  <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Qty</th>
                  <th>Total</th>
                </tr>
                </thead>
                <?php $total =0; 
                      $i=1;?>
                <tbody id="body-penjualan">

                </tbody>
              </table>
          </div>

        </div>
        </div>

        <div class="modal-footer bg-abu-abu">
            <a href="<?= base_url('Laporan/print_penjualan'); ?>" type="button" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-remove"></i> Tutup</button>
          </div>
    </div>
</div>
</div>


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript">
  $('.modalPenjualan').click(function()
  {
      const faktur = $(this).attr('faktur');
        $.ajax(
        {
            type:'get',
            url:'<?= base_url('Autocomplite/modalPenjualan/'); ?>'+$(this).attr('faktur'),
            success:function(data)
            {
                $('#body-penjualan').html(data);
                $('#info').modal('show');
                $('#noFakturModal').html(faktur);
            }
        });

  });



  // $.get($(this).attr("href"),function(data)
  //         {
  //           $('#body-penjualan').html(data);
  //         });
   
</script>