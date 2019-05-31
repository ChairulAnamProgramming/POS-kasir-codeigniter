        

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
                    <form id="demo-form2" method="post" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id">Kode Barang <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" id="id" value="<?= $goodsById['id']; ?>" name="id" readonly class="form-control col-md-7 col-xs-12">
                          <input type="text" id="kode_barang" value="<?= $goodsById['kode_barang']; ?>" name="kode_barang" readonly class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_barang">Nama Barang <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama_barang" name="nama_barang" value="<?= $goodsById['nama_barang'];  ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_barang">Katagori <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_group form-control" name="catagory" id="catagory" onchange="myData()">
                                <option value="<?= $goodsById['catagory'];  ?>"><?= $goodsById['catagory'];  ?></option>
                              <?php foreach ($catagory as $cat): ?>
                                <option value="<?= $cat['nama_catagory']; ?>" >
                                  <?= $cat['nama_catagory'] ?>
                                </option>
                              <?php endforeach ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_barang">Merek <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_group form-control" name="merek" id="merek">
                                <option value="<?= $goodsById['merek'];  ?>"><?= $goodsById['merek'];  ?></option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="harga_beli">Harga Beli <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="harga_beli" name="harga_beli" value="<?= $goodsById['harga_beli'];  ?>" class="form-control col-md-7 col-xs-12 rupiah">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="harga_jual">Harga Jual <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="harga_jual" name="harga_jual" value="<?= $goodsById['harga_jual'];  ?>" class="form-control col-md-7 col-xs-12 rupiah">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="stok">Stok <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="number" id="stok" name="stok" value="<?= $goodsById['stok'];  ?>" class="form-control col-md-7 col-xs-12 rupiah">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="diskon">Diskon <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                        <input type="number" class="form-control has-feedback-left" id="diskon" value="<?= $goodsById['diskon'];  ?>" name="diskon">
                        <span class=" form-control-feedback right" aria-hidden="true">%</span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keterangan">Keterangan <span class="required">*</span>
                        </label>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                          <textarea id="keterangan"  class="form-control "  name="keterangan" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100"  data-parsley-validation-threshold="10"><?= $goodsById['keterangan'];  ?></textarea>                          
                        </div>
                      </div>


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="<?= base_url('Goods'); ?>" class="btn btn-primary">Cancel</a>
                          <a href="<?= base_url('Goods/add_goods'); ?>" class="btn btn-primary">Reset</a>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- /page content -->

       
<script type="text/javascript">
   function myData(){
         var catagory = $('#catagory').val();
           $.ajax({
               url: "<?=base_url() ?>Autocomplite/merek",
               data : 'catagory='+catagory,
           }).done( function(merek){

              var json = merek;
              $("#merek").html(json);
       } );
     }
</script>