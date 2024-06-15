<?php foreach ($branchlist as $branch) : ?>

  <tr>

    <td class="text-center"><?php //echo $branch['id']; ?></td>

    <td>

      <?php     

      //echo $branch['name'];

      ?>

    </td>

    <td class=""><?php echo $branch['address']; ?></td>

    <td class="text-center"><?php echo $branch['phone']; ?></td>

    <td class="text-center"><?php echo $branch['location']; ?></td>

    <td class="text-center">

      <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#branchModel<?= $branch['id'] ?>">

        <i class="fas fa-info-circle" style="color:#ffffff"></i>

      </button>



      <!-- Modal -->

      <div class="modal fade" id="branchModel<?= $branch['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">

          <div class="modal-content">

            <div class="modal-header">

              <h5 class="modal-title"><?= __('admin.branch_info') ?></h5>

              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">

              <div class="row">

                <div class="col-md-6">

                  <strong><?= __('admin.name') ?></strong>

                  <p><?php echo $branch['name']; ?></p>

                </div>

                <div class="col-md-6">

                  <strong><?= __('admin.address') ?></strong>

                  <p><?php echo $branch['address']; ?></p>

                </div>

              </div>

              <div class="row">

                <div class="col-md-6">

                  <strong><?= __('admin.phone') ?></strong>

                  <p><?php echo $branch['phone']; ?></p>

                </div>

                <div class="col-md-6">

                  <strong><?= __('admin.location') ?></strong>

                  <p><?php echo $branch['location']; ?></p>

                </div>

              </div>

              <div class="row">

                <div class="col-md-6">

                  <strong><?= __('admin.phone') ?></strong>

                  <p><?php echo $branch['phone']; ?></p>

                </div>

                <div class="col-md-6">

                  <strong><?= __('admin.name') ?></strong>

                  <p><?php echo $branch['name']; ?></p>

                </div>

              </div>

              <div class="row">

                <div class="col-md-6">

                  <strong><?= __('admin.sales') ?></strong>

                  <p><?php echo $branch['name']; ?> / <?php echo c_format($branch['name']); ?></p>

                </div>

                <div class="col-md-6">

                  <strong><?= __('admin.type') ?></strong>

                  <p><?php echo __('admin.type_' . $branch['name']); ?></p>

                </div>

              </div>

              <div class="row">

                <div class="col-md-6">

                  <strong><?= __('admin.country') ?></strong>

                  <p>

                  </p>

                </div>

                <div class="col-md-6">

                  <strong><?= __('admin.state') ?></strong>



                </div>

              </div>

              <div class="row">

                <div class="col-md-6">

                  <strong><?= __('admin.city') ?></strong>



                </div>

                <div class="col-md-6">

                  <strong><?= __('admin.postal_code') ?></strong>

                </div>

                <div class="col-md-12">

                  <strong><?= __('admin.full_address') ?></strong>

                  <p>

                  </p>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>


      <a class="btn btn-danger deleteuser" data-url="<?php echo base_url(); ?>admincontrol/deleteusers/<?php echo $branch['id']; ?>/<?php echo $branch['name']; ?>" href="#"><i class="fa fa-trash-o cursors" aria-hidden="true" style="color:#ffffff"></i></a>

      <a class="btn btn-primary" onclick="return confirm('<?php echo __('admin.are_you_sure_to_edit'); ?>');" href="<?php echo base_url(); ?>admincontrol/addbranch/<?php echo $branch['id']; ?>"><i class="fa fa-edit cursors" aria-hidden="true" style="color:#ffffff"></i></a>

    </td>

  </tr>

<?php endforeach; ?>