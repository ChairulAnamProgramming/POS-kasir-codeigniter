        

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
                <a href="" class="btn btn-primary">Tambah Karyawan</a>
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
                          <th class="text-center">Name</th>
                          <th class="text-center">NIK</th>
                          <th class="text-center">NIP</th>
                          <th class="text-center">Phone</th>
                          <th class="text-center">Jabatan</th>
                          <th class="text-center">Email</th>
                          <th class="text-center">Addreas</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach ($employee as $emp): ?>
                        <tr>
                          <td class="text-center"><?= $emp['name']; ?></td>
                          <td class="text-center"><?= $emp['nik']; ?></td>
                          <td class="text-center"><?= $emp['nip']; ?></td>
                          <td class="text-center"><?= $emp['telp']; ?></td>
                          <td class="text-center"><?= $emp['jabatan']; ?></td>
                          <td class="text-center"><?= $emp['email']; ?></td>
                          <td class="text-center"><?= $emp['alamat']; ?></td>
                          <td class="text-center">
                            <a href="<?= base_url('Admin/edite_employee/').$emp['id']; ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o"></i></a>
                            <a href="<?= base_url('Admin/delete_employee/').$emp['id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a>
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

       
