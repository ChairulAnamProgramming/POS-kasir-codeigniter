        

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
                    <h2>List Semua Pembeli</h2>
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
                          <th class="text-center">No</th>
                          <th class="text-center">Kode</th>
                          <th class="text-center">Nama</th>
                          <th class="text-center">Telpon</th>
                          <th class="text-center">Alamat</th>
                        </tr>
                      </thead>



                      <tbody>
                       <?php $i=1; ?>
                      <?php foreach ($pembeli as $key): ?>
                        <tr>
                          <td class="text-center"><?= $i;$i++; ?></td>
                          <td class="text-center"><?= $key['kode_pembeli']; ?></td>
                          <td class="text-center"> <?= $key['nama_pembeli']; ?></td>
                          <td class="text-center"><?= $key['telp'];?></td>
                          <td class="text-center"><?= $key['alamat'];?></td>
                        
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