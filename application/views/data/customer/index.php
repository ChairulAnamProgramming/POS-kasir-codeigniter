        

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?= $title; ?></h3>
              </div>
            </div>

            <div class="clearfix"></div>
                <?= $this->session->flashdata('message'); ?>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
               <form id="demo-form2 " action="<?= base_url("Data/save_costumer"); ?>" method="post" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kode_pembeli">Kode Pembeli <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <input type="text" id="kode_pembeli"  name="kode_pembeli" required value="<?= $AutoNumber; ?>"class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_pembeli">Nama Pembeli <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <input type="text" id="nama_pembeli"  name="nama_pembeli" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telp">Phone <span class="required" autocomplete="off">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <input type="number" id="telp"  name="telp" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <textarea class="form-control col-md-7 col-xs-12" name="alamat" id="alamat"></textarea>
                        </div>
                      </div>

                       <div class="form-group">
                         <label class="control-label col-md-6 col-sm-6 col-xs-12">
                        </label>
                          <div class="col-md-3 col-sm-3 col-xs-3">
                          <button type="submit" name="submit" class="btn btn-success submit">Add</button>
                        </div>
                       </div>

                    </form>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Customer</h2>
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
                          <th class="text-center">Kode Pembeli</th>
                          <th class="text-center">Nama Pembeli</th>
                          <th class="text-center">Phone</th>
                          <th class="text-center">Alamat</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody id="contentCostumer"></tbody>
                    </table>
                  </div>
                </div>

                <div id="cont">
                  
                </div>
              </div>
              </div>
          </div>
        </div>
        <!-- /page content -->

        <script src="<?= base_url('assets/') ?>vendors/jquery/dist/jquery.min.js"></script>

        <script type="text/javascript">
         $(document).ready(function() 
         {
            loadData();


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

         function loadData()
         {
          $.get('<?= base_url("Data/dataCostumer"); ?>',function(data)
          {
            $('#contentCostumer').html(data)
            $('.deleteData').click(function(e)
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
          });
         }

         function resetForm()
         {

            $('#kode_pembeli').val('');
            $('#nama_pembeli').val('');
            $('textarea').val('');
            $('[type=number]').val('');
            $('[name=nama_pembeli]').focus();
            $('form').attr('action','<?= base_url("Sales/save_costumer"); ?>');
            $('.submit').html('Add');

         }
</script>
