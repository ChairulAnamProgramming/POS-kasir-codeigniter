        

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
               <form id="demo-form2 " action="<?= base_url("Autocomplite/save_category"); ?>" method="post" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_catagory">Nama Category <span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <input type="text" id="nama_catagory"  name="nama_catagory" required class="form-control col-md-7 col-xs-12">
                        </div>
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
                          <th class="text-center">Nama Categori</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody id="contentCategory"></tbody>
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
          $.get('<?= base_url("Autocomplite/dataCategory"); ?>',function(data)
          {
            $('#contentCategory').html(data)
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
                $('[name=nama_catagory').focus();
                $('[name=nama_catagory').val($(this).attr('nama'));
                $('form').attr('action',$(this).attr('href'));

            });
          });
         }

         function resetForm()
         {
            $('[type=text]').val('');
            $('[name=nama_catagory]').focus();
            $('form').attr('action','<?= base_url("Autocomplite/save_category"); ?>');
            $('.submit').html('Add');

         }
</script>
