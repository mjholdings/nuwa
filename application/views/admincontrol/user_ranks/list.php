<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                <h5><?= __('Danh sách Thành viên theo Cấp bậc') ?></h5>
                <div>Thổng số thành viên: <?= $total_users ?> </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th><?= __('ID') ?></th>
                                <th><?= __('Tên') ?></th>
                                <th><?= __('Cấp độ') ?></th>
                                <th><?= __('Vị trí') ?></th>
                                <th><?= __('Doanh thu') ?></th>                                
                                <th><?= __('Order lớn nhất') ?></th>                                
                                <th><?= __('Nạp') ?></th>
                                <th><?= __('Tiêu dùng') ?></th>
                                <th><?= __('Tuyển dụng') ?></th>
                                <th><?= __('Vị trí tuyển') ?></th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($branch as $key => $value) { ?>
                                <tr>
                                    <td><?= $value['id'] ?></td>
                                    <td><?= $value['name'] ?></td>
                                    <td><?= c_format($value['con_revenue_branch']); ?></td>
                                    <td><?= $value['sale_commission_rate'] . '%'; ?></td>                                    
                                    <td><?= $value['name'] ?></td>
                                    <td><?= c_format($value['con_revenue_branch']); ?></td>
                                    <td><?= $value['sale_commission_rate'] . '%'; ?></td>
                                    <td><?= $value['sale_commission_rate'] . '%'; ?></td>
                                    

                                    
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