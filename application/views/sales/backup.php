   

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?= $title; ?></h3>
              </div>
            </div>


            
          </div>

          <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <?= $this->session->flashdata('message') ?>
                <div class="x_panel">
                  <div class="x_title">

                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" method="post" action="<?= base_url('Sales'); ?>" data-parsley-validate class="form-horizontal form-label-left">

                      <h2 class="text-center" id="namaBarang"></h2>

                       <div class="form-group">

                        <div class="row">
                        <label class="control-label col-md-4 col-sm-4 col-xs-4" for="no_penjualan">No Penjualan <span class="required">*</span>
                        </label>
                          <div class="col-md-4 col-sm-4 col-xs-4">
                          <input type="text" id="no_penjualan" name="no_penjualan" class="form-control" value="<?= $noPenjualan; ?>" readonly onkeyup="kode()" autocomplete="off">
                          <span class="help-block small"><?= form_error('kode_barang','<small class="text-danger pl-3">','</small>');  ?></span>
                        </div>
                        </div>

                        <div class="row">
                          <label class="control-label col-md-4 col-sm-4 col-xs-4" for="kode_barang">Kode Barang <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <input type="text" id="kode_barang" name="kode_barang" class="form-control" required value="<?= set_value('kode_barang') ?>" onkeyup="kode()" autocomplete="off">
                          <span class="help-block small"><?= form_error('kode_barang','<small class="text-danger pl-3">','</small>');  ?></span>
                        </div>
                        </div>

                        <div class="row">
                          <div class="col-md-7 col-sm-7 col-xs-5"></div>
                          <button type="submit" class="btn btn-success justify-content-end submit">Submit</button>

                        </div>

                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
                      <!-- Button trigger modal -->

                    <form method="post" action="<?= base_url('Sales/cetak/').$noPenjualan; ?>">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Total Belanjaan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th class='text-center'>#</th>
                          <th class='text-center'>Nama Barang</th>
                          <th class='text-center'>Diskon</th>
                          <th class='text-center'>Harga Barang</th>
                          <th class='text-center'>Jumlah</th>
                          <th class='text-center'>Sub Total</th>
                          <th class='text-center'>Cancel</th>
                        </tr>
                      </thead>
                     
                        <tbody id="contentBelanja">   </tbody>
                    </table>

                  </div>
                </div>
              </div>
</form>



            </div>
        </div>
        <!-- /page content -->







<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-body" id="exampleModalLabel">Struktur Belanja</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
         <h5 class="text-center"><strong><?= $outlet['nama_toko']; ?></strong> <br><?= $outlet['alamat']; ?></h5>
      </div>
      <div class="modal-body">
       

          <div class="row no-gutters ">
              <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="row">
                  <div class="col-md-3 col-sm-3 col-xs-2 ">
                    <strong>No Penjualan</strong>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                   <?= $noPenjualan ?>
                  </div>
                </div>

                <div class="row ">
                  <div class="col-md-3 col-sm-3 col-xs-2 ">
                    <strong>Tanggal</strong>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                   <?=  date('d m Y') ?>
                  </div>
                </div>

                <div class="row ">
                  <div class="col-md-3 col-sm-3 col-xs-2 ">
                    <strong>Kasir</strong>
                  </div>
                  <div class="col-md-4 col-sm-4 col-xs-4">
                   <?= $user['name'];?>
                  </div>
                </div>
                        <?php $total=0; ?>
                        <?php foreach ($penjualan as $key): ?>
                          <?php $harga = str_replace('.','',$key['harga_jual']); ?>
                          <?php 
                                $diskon= $key['diskon'];
                                $count=$harga*$diskon/100;
                                $subtotal=$harga-$count; ?>
                        <div class="row">
                          <div class="col-md-5">
                            <?= $key['nama_barang'] ?>
                          </div>
                          <div class="col-md-2">
                            Rp.<?= number_format($harga); ?>,-
                          </div>
                          <div class="col-md-1">
                            X <?= $key['jumlah'] ?>    
                          </div>
                          <div class="col-md-4">
                            Rp.<?= number_format($subtotal*$key['jumlah']); ?>,-    
                          </div>
                        </div>
                        <?php $total= $total+($subtotal*$key['jumlah']); ?>
                        <?php endforeach ?>
                        <hr>
                      <div class="row">
                        <div class="col-md-2 text-body">
                          <strong>Total</strong>
                        </div>
                        <div class="col-md-10">
                          <strong>Rp.<?= number_format($total); ?>,-</strong>
                        </div>
                        <div class="col-md-2 text-body">
                          <strong>Tunai</strong>
                        </div>
                        <div class="col-md-10">
                          <strong>Rp. <span id="tunaiModal"></span>,-</strong>
                        </div>
                        <div class="col-md-2 text-body">
                          <strong>Kembali</strong>
                        </div>
                        <div class="col-md-10">
                          <strong>Rp.<?= number_format($total); ?>,-</strong>
                        </div>
                      </div><hr>
                      <h6><strong>*</strong>Barang yang sudah di beli tidak dapat di kembalikan</h6>

          </div>
        </div>


      </div>
      <div class="modal-footer">
        <?php echo anchor('Sales/selesai/'.$noPenjualan.'','Selesai',['class'=>'btn btn-info']) ?>
        <button type="button" class="btn btn-primary">Cetak</button>
      </div>
    </div>
  </div>
</div>




<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">

   $(document).ready(function()
    {
      loadData();
      $('#kode_barang').focus();
    });


   $('form').on('submit', function(e)
    {

        $('.submit').show();
        e.preventDefault();
        $.ajax(
        {
            type:$(this).attr('method'),
            url:$(this).attr('action'),
            data:$(this).serialize(),
            success:function()
            {
              window.location.reload(true);
                loadData();
                resetForm();
            }
        });
    })

   function resetForm()
         {
            $('form').attr('action','<?= base_url("Autocomplite/save_category"); ?>');
            $('#kode_barang').val('');
            $('#kode_barang').focus();

         }



      function kode(){
         var barang = $('#kode_barang').val();
           $.ajax({
               url: "<?=base_url() ?>Sales/autocomplete",
               data : 'barang='+barang,
           }).done( function(data){


              var json = data;
              obj = JSON.parse(json);
              $("#nama_barang").html(obj.namabarang);
              $("#harga").html(obj.harga);             
       } );
     }



     function loadData()
         {
          $.get('<?= base_url("Sales/dataBelanja"); ?>',function(data)
          {

            $('#contentBelanja').html(data)
             $('.plusData').click(function(e)
            {
                e.preventDefault();
                 $.ajax(
                {
                    type:'get',
                    url:$(this).attr('href'),
                    success:function()
                    {
                        loadData();
                    }
                });
            });

            $('.minusData').click(function(e)
            {
                e.preventDefault();
                 $.ajax(
                {
                    type:'get',
                    url:$(this).attr('href'),
                    success:function()
                    {
                        loadData();
                    }
                });
            });
            $('.updateData').click(function(e)
            {
                $('.submit').html('Update');
                e.preventDefault();
                $('[name=nama_pembeli').focus();
                $('[name=kode_pembeli').val($(this).attr('kode'));
                $('[name=nama_pembeli').val($(this).attr('nama'));
                $('[name=telp').val($(this).attr('phone'));
                $('[name=alamat').val($(this).attr('alamat'));
                $('form').attr('action',$(this).attr('href'));

            });


               $('#tunai').keyup(function()
            {
              var total = $('#total').val();
              var tuun = $('#tunai').val();
                        $('#kembali').val(tuun-total);
               

                $('#exampleModal').ready(function()
                {
                   $('#tunaiModal').val('12');
                })

            });


          });
         }
</script>


 

