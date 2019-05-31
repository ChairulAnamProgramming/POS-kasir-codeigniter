

    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post">
              <h1>Login</h1>
               <?= $this->session->userdata('message'); ?>
              <div>
                <input type="text" class="form-control" placeholder="Email"  name="email" value="<?= set_value('email'); ?>" />
                <span class="help-block small"><?= form_error('email','<small class="text-danger pl-3">','</small>');  ?></span>
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" value="<?= set_value('password'); ?>" />
                <span class="help-block small"><?= form_error('password','<small class="text-danger pl-3">','</small>');  ?></span>
              </div>
              <div>
                <button class="btn btn-default submit" type="submit">Login</button>
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <!-- <p class="change_link">New to site?
                  <a href="<?= base_url('Auth/registration'); ?>" class="to_register"> Create Account </a>
                </p> -->

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="<?= $toko['icon']; ?>"></i> <?= $toko['nama_toko']; ?></h1>
                  <p>©<?= date('Y'); ?>   All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

       
                



