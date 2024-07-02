<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                <h5><?= __('Cài đặt Thưởng') ?></h5>
                <div>
                    <a id="toggle-uploader" href="<?= base_url('admincontrol/create_reward') ?>" class="btn btn-light"><?= __("admin.add_new") ?></a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th><?= __('Tên') ?></th>
                                <!-- <th><?= __('Cá nhân') ?></th>
                                <th><?= __('Tổng cá nhân') ?></th>
                                <th><?= __('Trực tiếp') ?></th>
                                <th><?= __('Gián tiếp') ?></th>
                                <th><?= __('Tuyến dưới') ?></th>
                                <th><?= __('Nhóm') ?></th>
                                <th><?= __('Tuyển trực tiếp') ?></th>
                                <th><?= __('Tuyển gián tiếp') ?></th>
                                <th><?= __('Tuyển tuyến dưới') ?></th> -->
                                <th><?= __('Thưởng HH (%)') ?></th>
                                <th><?= __('Thưởng cứng') ?></th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($reward as $key => $value) { ?>
                                <tr>
                                    <td><?= $value['name'] ?></td>
                                    <!-- <td><?= c_format($value['con_revenue_personal']); ?></td>
                                    <td><?= c_format($value['con_revenue_total']); ?></td>
                                    <td><?= c_format($value['con_revenue_direct_members']); ?></td>
                                    <td><?= c_format($value['con_revenue_indirect_members']); ?></td>
                                    <td><?= c_format($value['con_revenue_members']); ?></td>
                                    <td><?= c_format($value['con_revenue_team']); ?></td>
                                    <td><?= $value['con_refer_direct_number']; ?></td>
                                    <td><?= $value['con_refer_number']; ?></td>
                                    <td><?= $value['con_refer_number'] + $value['con_refer_direct_number']; ?></td> -->
                                    <td><?= $value['sale_comission_rate'] . '%'; ?></td>
                                    <td><?= c_format($value['sale_comission_fixed']) . 'đ'; ?></td>

                                    <td>
                                        <a href="<?= base_url('admincontrol/update_reward/' . $value['id']) ?>" class="btn btn-sm btn-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <a href="<?= base_url('admincontrol/delete_reward/' . $value['id']) ?>" class="btn btn-sm btn-danger btn-delete">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <ul class="pagination justify-content-end">
                    <?= $pagination ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(".btn-delete").off('click').on('click', function(e) {
        e.preventDefault();
        var proceed = confirm('<?= __("admin.sure_delete") ?>');
        if (proceed) {
            let url = $(this).attr('href');
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                success: function(result) {
                    if (result.status) {
                        location.reload();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            html: result.message,
                        });
                        showPrintMessage(result.message, 'error');
                    }
                },
            });
        }
    });
</script>