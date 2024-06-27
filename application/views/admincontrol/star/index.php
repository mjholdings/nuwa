<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                <h5><?= __('Cài đặt Thưởng') ?></h5>
                <div>
                    <a id="toggle-uploader" href="<?= base_url('admincontrol/create_star') ?>" class="btn btn-light"><?= __("admin.add_new") ?></a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th><?= __('Số sao') ?></th>
                                <th><?= __('YC Cá nhân') ?></th>
                                <th><?= __('YC DT Tổng') ?></th>
                                <th><?= __('YC Trực tiếp') ?></th>
                                <th><?= __('YC Gián tiếp') ?></th>
                                <th><?= __('YC Tuyến dưới') ?></th>
                                <th><?= __('YC DT Nhóm') ?></th>
                                <th><?= __('YC Tuyển trực tiếp') ?></th>
                                <th><?= __('YC Tuyển gián tiếp') ?></th>
                                <th><?= __('Thưởng HH (%)') ?></th>
                                <th><?= __('Thưởng cứng (đ)') ?></th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($star as $key => $value) { ?>
                                <tr>
                                    <td><?= $value['star'] ?></td>
                                    <td><?= c_format($value['con_revenue_personal']); ?></td>
                                    <td><?= c_format($value['con_revenue_total']); ?></td>
                                    <td><?= c_format($value['con_revenue_direct_members']); ?></td>
                                    <td><?= c_format($value['con_revenue_indirect_members']); ?></td>
                                    <td><?= c_format($value['con_revenue_members']); ?></td>
                                    <td><?= c_format($value['con_revenue_team']); ?></td>
                                    <td><?= $value['con_refer_direct_number']; ?></td>
                                    <td><?= $value['con_refer_number']; ?></td>
                                    <td><?= $value['sale_commission_rate'] . '%'; ?></td>
                                    <td><?= c_format($value['sale_commission_fixed']) . 'đ'; ?></td>

                                    <td>
                                        <a href="<?= base_url('admincontrol/update_star/' . $value['id']) ?>" class="btn btn-sm btn-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <a href="<?= base_url('admincontrol/delete_star/' . $value['id']) ?>" class="btn btn-sm btn-danger btn-delete">
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