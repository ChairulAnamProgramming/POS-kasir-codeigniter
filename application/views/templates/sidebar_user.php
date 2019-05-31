 <?php 
  $role_id = $this->session->userdata('role_id');
  $queryMenu =  "SELECT `user_menu`.`id`,`menu`,`icon`
                  FROM `user_menu` JOIN `user_access_menu`
                  ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                  WHERE `user_access_menu`.`role_id` = $role_id
                  ORDER BY `user_access_menu`.`menu_id` ASC";
                  $menu = $this->db->query($queryMenu)->result_array();
  ?>

 <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= base_url(); ?>" class="site_title"><i class="fa fa-laptop"></i> <span>TOKO ELEKTRO!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?= base_url('assets/img/profile/'). $user['image']; ?>" alt="<?= $user['name']; ?>" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome, <?php if ($user['role_id'] == 1): ?> Admin <?php else: ?> User <?php endif; ?></span>
                <h2><?= $user['name']; ?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                  
                  <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i>User<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                         <li><a href="<?= base_url('User'); ?>">Profile</a></li>
                         <li><a href="<?= base_url('User/edit'); ?>">Edite Profile</a></li>
                         <li><a href="<?= base_url('User/changePassword'); ?>">Change Password</a></li>
                      </ul>
                  </li>
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= base_url('Auth/logout'); ?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>