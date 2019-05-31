

        <!-- page content -->
        <div class="right_col" role="main">
               
            <div class="row">
              <div class="col-md-12">
                 <!-- <?= $this->session->flashdata('message'); ?> -->
              </div>
                <div class="x_panel">
              <div class="col-md-4 col-sm-8 col-xs-12">
                  <form id="demo-form2" method="post" action="<?= base_url('Sales'); ?>" data-parsley-validate class="form-horizontal form-label-left">
                  
                     <div class="row  margin-b">
                          <div class="col-md-8 col-sm-12 col-xs-12">
                          <input type="text" id="kode_barang" name="kode_barang" class="form-control" placeholder="Kode Barang" onfocus="kode()" required autocomplete="off">
                          <input type="hidden" id="no_penjualan" name="no_penjualan" class="form-control" value="<?= $noPenjualan; ?>" autocomplete="off">
                          </div>
                          <a class="btn btn-info col-md-3 col-sm-12 col-xs-12 btn-xs" id="COdee" data-toggle="modal" data-target="#cariKodee" style="margin-top: 2%;"><i class="fa fa-search"></i> Kode</a>
                     </div>

                     <div class="row margin-b">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" id="nama_barang" name="nama_barang" class="form-control sales" placeholder="Nama Banrang" readonly autocomplete="off">
                          </div>
                     </div>

                     <div class="row margin-b">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="text" id="harga" name="harga" class="form-control sales" placeholder="Harga" readonly autocomplete="off">
                          </div>
                     </div>

                     <div class="row margin-b">
                          <button type="submit" class="btn btn-info col-md-12 col-sm-12 col-xs-12 " style="margin-top: 2%;"><i class="fa fa-check-square-o"></i>Tambah</button>
                     </div>
                  </form>

                     


                </div>

              <div class="col-md-8 col-sm-12 col-xs-12">
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="row">

                            <div class="col-md-3 col-sm-3 col-xs-3">
                            <h1>Total >></h1>
                            </div>

                          <div class="col-md-9 col-sm-9 col-xs-9 total">
                            <h1 class="text-center" id="total"></h1>
                          </div>

                        </div>
                    </div>
                    </div>
                     </div>
              </div>
              </div>

              <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12"></div>
                <div class="col-md-1 col-sm-1 col-xs-12">
                    <button type="button" class="btn btn-primary " id="disabled-btn" data-toggle="modal" data-target="#exampleModal" style="margin-top: 2%;"><i class="fa fa-print"></i> Selesai</button>
               </div>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th class='text-center'>Nama Barang</th>
                          <th class='text-center'>Harga</th>
                          <th class='text-center'>Qty</th>
                          <th class='text-center'>Sub Total</th>
                          <th class='text-center'>Cancel</th>
                        </tr>
                      </thead>
                     
                        <tbody id="contentBelanja">   </tbody>
                    </table>

                  </div>
                </div>
              </div>


                 

            </div>
          </div>

        <!-- /page content -->




<?php $total=0; ?>
<?php foreach ($penjualan as $key): ?>
  <?php $harga = str_replace('.','',$key['harga_jual']); ?>
  <?php 
        $diskon= $key['diskon'];
        $count=$harga*$diskon/100;
        $subtotal=$harga-$count; ?>
<?php $total= $total+($subtotal*$key['jumlah']); ?>
<?php endforeach ?>


<!-- Modal -->
<form method="post" id="form_success" action="<?= base_url('Sales/selesai/').$noPenjualan ?>">   
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title text-body text-center" id="exampleModalLabel"><i class="fa fa-check-square-o"></i> Pembayaran</h4>
      </div>
      <div class="modal-body">  
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="row">

                 
                  <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="row">
                     <label class="col-md-3 col-sm-3 col-xs-12">Tanggal</label>

                     <div class="col-md-9 col-sm-9 col-xs-12">
                       <div class="input-prepend input-group">
                      <input type="text"  name="date" id="date" class="form-control" readonly value="<?= date('d/m/Y'); ?>">
                    </div>
                     </div>
                   </div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="row">
                    <label class="col-md-3 col-sm-3 col-xs-12">Faktur</label>

                     <div class="col-md-9 col-sm-9 col-xs-12">
                     <div class="input-prepend input-group">
                      <input type="text"  name="faktur" id="faktur" class="form-control" readonly value="<?= $noPenjualan; ?>">
                    </div>
                    </div>
                   </div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-12 ">
                      <div class="row">
                        <label class="col-md-3 col-sm-3 col-xs-12 ">Bayar</label>
                      
                   <div class="col-md-9 col-sm-9 col-xs-12">
                     <div class="input-prepend input-group">
                      <input type="hidden"  name="total" id="grand-total" class="form-control" readonly value="<?=$total; ?>">
                      <input type="hidden"  name="total" id="grand-total" class="form-control" readonly value="<?=$total; ?>">
                      <input type="number" required name="tunai" id="tunai" class="form-control" >
                    </div>
                   </div>
                 </div>
                  </div>


                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="row">


                 <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                      <label class="col-md-3 col-sm-3 col-xs-12">Kasir</label>

                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="input-prepend input-group">
                          <input type="text"  name="kasir" id="kasir" class="form-control" readonly value="<?= $user['name']; ?>">
                        </div>
                      </div>  
                    </div>
                  </div>



                 <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                      <label class="col-md-3 col-sm-3 col-xs-12">Pelanggan </label>

                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="input-prepend input-group">
                          <input type="text"  name="pelanggan" id="pelanggan" class="form-control" value="-">
                        </div>
                      </div>  
                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                      <label class="col-md-3 col-sm-3 col-xs-12">Stok </label>

                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="input-prepend input-group">
                          <input type="text"  name="sisa_stok" id="sisa_stok" class="form-control" value="-">
                        </div>
                      </div>  
                    </div>
                  </div>

                   

                  

                    </div>
                </div>
                
            </div> 

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12" style="margin-top: 8px;">
                      <h5>Kembalian :</h5>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                      <h3> Rp.<label id="kembali">0</label>,-</h3>
                    </div>
                  </div>
                  <span id="info-total" class="badge bg-red"></span>
              </div>

               <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12" style="margin-top: 8px;">
                      <h5>Total :</h5>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                      <h3> <strong>Rp.<?=number_format($total); ?>,-</strong></h3>
                    </div>
                  </div>
                  <span id="info-total" class="badge bg-red"></span>
              </div>

            </div>

          </div>
          <div class="bg-abu-abu">
            <div class="row">
              <div class="col-md-1 col-sm-1 col-xs-1"></div>
                <div class="col-md-11 col-sm-11 col-xs-11">
                      <button  type="submit" class="btn btn-primary " ><i class="fa fa-check-square-o"></i> Cetak & Simpan</button>
                      <button type="button" class="btn btn-danger " data-dismiss="modal"><i class="fa fa-remove"></i> Batal</button>
                </div>
              </div>  
            </div>
        </div>
    </div>
  </div>
</form>      



<!-- Modal -->
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
                          <th class="text-center">Stok</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach ($barang as $gds): ?>
                        <tr>
                          <td class="text-center"><?= $gds['nama_barang']; ?></td>
                          <td class="text-center"><?= $gds['kode_barang']; ?></td>
                          <td class="text-center"><?= $gds['stok']; ?></td>
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




  <!-- Modal -->
<div class="modal fade" id="selesai" tabindex="-1" role="dialog" aria-labelledby="selesaiLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title text-body text-center" id="selesaiLabel"><i class="fa fa-check-square-o"></i> Transaksi selesai</h4>
      </div>
        <div class="modal-body">  
         <?php $total=0; ?>
        
          <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-2">
              <span>Tanggal</span>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-1">
              <span>:</span>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
              <span><?= date('d m Y') ?></span>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-2">
              <span>Pelanggan</span>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-1">
              <span>:</span>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
              <span>-</span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-2">
              <span>Faktur</span>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-1">
              <span>:</span>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
              <span><?= $noPenjualan ?></span>
            </div>
          </div><hr>
        
                    <table class="myTable">
                      <thead>
                        <tr>
                          <th>Nama Barang</th>
                          <th>Harga</th>
                          <th>Qty</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
          <?php foreach ($penjualan as $key): ?>
          <?php $harga = str_replace('.','',$key['harga_jual']); ?>
          <?php 
                $diskon= $key['diskon'];
                $count=$harga*$diskon/100;
                $subtotal=$harga-$count; ?>
                        <tr>
                          <td><?= $key['nama_barang'] ?> </td>
                          <td><?= number_format($harga) ?></td>
                          <td><?= $key['jumlah'] ?></td>
                          <td><?= number_format($subtotal*$key['jumlah']) ?></td>
                        </tr>
               <?php $total= $total+($subtotal*$key['jumlah']); ?>
        <?php endforeach ?>
                      </tbody>

                      <tbody>
                         <tr>
                          <td>Total</td>
                          <td colspan="2"></td>
                          <td><?= $total; ?></td>
                        </tr>
                        <tr>
                          <td>Dibayar</td>
                          <td colspan="2"></td>
                          <td id="bayar"></td>
                        </tr>
                        <tr>
                          <td>Kembali</td>
                          <td colspan="2"></td>
                          <td id="kembaliSuccess"></td>
                        </tr>
                      </tbody>
                    </table>



        </div>
          <div class="bg-abu-abu">
            <div class="row">
              <div class="col-md-1 col-sm-1 col-xs-1"></div>
                <div class="col-md-11 col-sm-11 col-xs-11">
                     <button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Struk</button>
                      <button type="button" class="btn btn-primary " id="finish"><i class="fa fa-check"></i> Transaksi Baru</button>
                </div>
              </div>  
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

      var total = $('#grand-total').val();

      console.log(total)
      
      if (total != 0) {
        $('#disabled-btn').attr('disabled',false);
      }else{
        $('#disabled-btn').attr('disabled',true);

      }
      

      $('#COdee').on('keyup',function(e)
      {
        console.log("Oke "+e);
      });



      
    });

   $('#finish').click(function()
   {
    location.reload(true);
   });

   $('#form_success').on('submit', function(e)
    {
        e.preventDefault();
        $.ajax(
        {
            type:$(this).attr('method'),
            url:$(this).attr('action'),
            data:$(this).serialize(),
            success:function()
            {
                loadData();
                resetForm();
            }
        });

        $('#selesai').modal('show');
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
              $("#nama_barang").val(obj.namabarang);
              $("#harga").val(obj.harga); 

              const kode = $('#kode_barang').val();

              if (kode != obj.harga) {

              }


       } );
     }


     function loadData()
         {
          $.get('<?= base_url("Sales/dataBelanja"); ?>',function(data)
          {

            $('#contentBelanja').html(data);

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
                        location.reload(true);
                    }
                });
            });

             $('.deleteData').click(function(e)
             {
              e.preventDefault();
              $.ajax({
                type : 'get',
                url : $(this).attr('href'),
                success: function()
                {
                  loadData()
                  location.reload(true);
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
                      location.reload(true);
                  }
              });
          });        

         $('#tunai').keyup(function()
          {
            var total = $('#grand-total').val();
            var tuun = $('#tunai').val();

            $('#kembali').html(tuun-total);
            $('#bayar').html(tuun);

           

            $('#kembaliSuccess').html(tuun-total);
            if (tuun-total < 0 ) { 
            $('#info-total').html("Pembayaran belum cukup");
            }else{
            $('span').remove('#info-total');
            }

            $
            

          });

         $('#targetSuccess').click(function()
         {
          $('form').on('submit', function(e)
              {

                  e.preventDefault();
                  $.ajax(
                  {
                      type:$(this).attr('method'),
                      url:$(this).attr('action'),
                      data:$(this).serialize(),
                      success:function()
                      {
                          loadData();
                          resetForm();
                      }
                  });
              })

         })

    });

           $('.namaKode').click(function(e)
            {
              e.preventDefault();
             $('[name=kode_barang]').val($(this).attr('namaKode'));
             $('#cariKodee').modal('hide');
             $('#kode_barang').focus();

            })

          $.get('<?= base_url("Sales/total"); ?>',function(data)
          {
            $('#total').html(data);
          });




         }





</script>


 

