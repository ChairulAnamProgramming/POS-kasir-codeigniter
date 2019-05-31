

    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post">
              <h1>Create acount</h1>
               <?= $this->session->userdata('message'); ?>
              <div>
                <input type="text" class="form-control" placeholder="Full Name"  name="nama" value="<?= set_value('nama'); ?>" />
                <span class="help-block small"><?= form_error('nama','<small class="text-danger pl-3">','</small>');  ?></span>
              </div>

              <div>
                <input type="text" class="form-control" placeholder="Email"  name="email" value="<?= set_value('email'); ?>" />
                <span class="help-block small"><?= form_error('email','<small class="text-danger pl-3">','</small>');  ?></span>
              </div>

              <div class="col-md-6">
                <input type="password" class="form-control" name="password1" placeholder="password1" value="<?= set_value('password1'); ?>" />
                <span class="help-block small"><?= form_error('password1','<small class="text-danger pl-3">','</small>');  ?></span>
              </div>

              <div class="col-md-6">
                <input type="password" class="form-control" name="password2" placeholder="password2" value="<?= set_value('password2'); ?>" />
                <span class="help-block small"><?= form_error('password2','<small class="text-danger pl-3">','</small>');  ?></span>
              </div>

              <div>
                <button class="btn btn-default submit" type="submit">Create</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member?
                  <a href="<?= base_url('Auth'); ?>" class="to_register"> Login </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> TOKO SERBA!</h1>
                  <p>©<?= date('Y'); ?>   All Rights Reserved. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

       
                










<!-- 



<div class="row mt-5">
    <div class="col-md-3"></div>
        <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

          <h4 class="card-title text-center">Registrasi</h4>

            <?= $this->session->userdata('message'); ?>
          <form class="forms-sample" method="post">

            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Admin" value="<?= set_value('nama'); ?>">
              <span class="help-block small"><?= form_error('nama','<small class="text-danger pl-3">','</small>');  ?></span>
            </div>

                    
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="admin@admin.com" value="<?= set_value('email'); ?>">
              <span class="help-block small"><?= form_error('email','<small class="text-danger pl-3">','</small>');  ?></span>
            </div>

        <div class="row">   
            <div class="col-6">
                <div class="form-group">
                  <label for="password1">Password</label>
                  <input type="password" class="form-control" name="password1" id="password1" placeholder="********">
                  <span class="small"><smal class="text-warning"><cite title="Source Title">Password min 8 karakter</cite></small></span>

                  <span class="help-block small"><?= form_error('password1','<small class="text-danger pl-3">','</small>');  ?></span>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                  <label for="password2">Password</label>
                  <input type="password" class="form-control" name="password2" id="password2" placeholder="********">
                  <span class="help-block small"><?= form_error('password2','<small class="text-danger pl-3">','</small>');  ?></span>
                </div>
            </div>
        </div>


            <button type="submit" class="btn btn-primary mr-4 mx-auto ">Registrasi</button>

          </form><hr>
             <a href="<?= base_url(); ?>" class="col-12 btn btn-outline-primary btn-sm mb-1">Sudah punya akun ?</a>
        </div>
      </div>
    </div>

</div> -->