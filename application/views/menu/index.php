<div class="main-panel">
        <div class="content-wrapper">
                      <div class="col-12">
                          <a href="" class="btn btn-info btn-sm col-12" data-toggle="modal" data-target="#Submenu"><i class="mdi mdi-plus-circle-outline"></i></a>
                      </div>
        <div class="col-lg-12 grid-margin stretch-card">
                      <div class="card">
                <div class="card-body">
                  <div class="row mb-1">
                      <div class="col-10">
                        <h4 class="card-title">Submenu Management</h4>
                      </div>
                  </div>
                    <?php foreach ($icon as $m ): ?>
                        
                    <?php endforeach ?>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Menu</th>
                        <th>Url</th>
                        <th>Icon</th>
                        <th>Active</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        <?php foreach ($subMenu as $sm): ?>
                            
                      <tr>
                        <td><?= $i; $i++; ?></td>
                        <td><?= $sm['title']; ?></td>
                        <td><?= $sm['menu']; ?></td>
                        <td><?= $sm['url']; ?></td>
                        <td><i class="<?= $sm['icon']; ?>"></i></td>
                        <td><?= $sm['is_active']; ?></td>
                        <td>
                            <a href=""><i class="mdi mdi-lead-pencil text-success"></i></a> |
                            <a href=""><i class="mdi mdi-delete text-danger"></i></a> 
                        </td>
                      </tr>
                        <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>




<!-- Modal -->
<div class="modal fade" id="Submenu" tabindex="-1" role="dialog" aria-labelledby="SubmenuLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="SubmenuLabel">Add Submenu Management</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form class="forms-sample" method="post" action="">

            <div class="form-group">
              <input type="title" class="form-control" name="title" id="title" placeholder="Submenu Title" value="<?= set_value('title'); ?>">
              <span class="help-block small"><?= form_error('title','<small class="text-danger pl-3">','</small>');  ?></span>
            </div>

            <div class="form-group">
                <select class="form-control" id="menu_id" name="menu_id">
                  <option>..:: Select SubMenu ::..</option>
                      <?php foreach($menu as $m): ?>
                        <option value="<?= $m['id']?>"><?= $m['menu']?></option>
                      <?php endforeach;?>
                </select>
            </div>

            <div class="form-group">
                <select class="form-control" id="menu_id" name="menu_id">
                  <option>..:: Select Icon ::..</option>
                      <?php foreach($icon as $ic): ?>
                        <option value="<?= $ic['icon']?>"><?= $ic['icon'] ?></option>
                      <?php endforeach;?>
                </select>
            </div>

            <div class="form-group">
              <input type="url" class="form-control" name="url" id="url" placeholder="Url" value="<?= set_value('url'); ?>">
              <span class="help-block small"><?= form_error('url','<small class="text-danger pl-3">','</small>');  ?></span>
            </div>


            <div class="form-check form-check-flat form-check-primary">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" checked>
                        Acitve ?
                      <i class="input-helper"></i></label>
                    </div>

       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>


            </div>