<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                <h5><?= __('Danh sách khoản Thưởng Thành viên') ?></h5>

                <div class="d-flex align-items-center">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Select 1: Sắp xếp theo -->
                            <select id="order_by" class="form-control mr-2">
                                <option value="commission_date" <?= ($order_by == 'commission_date') ? 'selected' : '' ?>>Ngày thưởng</option>
                                <option value="firstname" <?= ($order_by == 'firstname') ? 'selected' : '' ?>>Tên</option>
                                <option value="commission" <?= ($order_by == 'commission') ? 'selected' : '' ?>>Giá trị thưởng</option>
                                <option value="total_wallet_amount" <?= ($order_by == 'total_wallet_amount') ? 'selected' : '' ?>>Tổng giá trị ví</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <!-- Select 3: Số lượng hiển thị -->
                            <select id="limit" class="form-control mr-2">
                                <option value="10" <?= ($limit == 10) ? 'selected' : '' ?>>10</option>
                                <option value="20" <?= ($limit == 20) ? 'selected' : '' ?>>20</option>
                                <option value="30" <?= ($limit == 30) ? 'selected' : '' ?>>30</option>
                                <option value="50" <?= ($limit == 50) ? 'selected' : '' ?>>50</option>
                                <option value="100" <?= ($limit == 100) ? 'selected' : '' ?>>100</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <!-- Select 2: Lọc theo loại người dùng -->
                            <select id="filter_type" class="form-control mr-2">
                                <option value="user" <?= ($filter_type == 'user') ? 'selected' : '' ?>>Thành viên</option>
                                <option value="client" <?= ($filter_type == 'client') ? 'selected' : '' ?>>Khách hàng</option>
                                <option value="admin" <?= ($filter_type == 'admin') ? 'selected' : '' ?>>Quản trị</option>
                            </select>
                        </div>
                        <div class="col-md-3">Tổng số <strong><?= $total_commissions ?> </strong></div>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th><?= __('ID') ?></th>
                                <th><?= __('Tên') ?></th>
                                <th><?= __('Phương thức thưởng') ?></th>
                                <th><?= __('Loại thưởng') ?></th>
                                <th><?= __('Giá trị thưởng') ?></th>
                                <th><?= __('Ngày thưởng') ?></th>
                                <th><?= __('Tổng giá trị Ví') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_commissions as $value) { ?>
                                <tr>
                                    <td><?= $value['id'] ?></td>
                                    <td><?= $value['firstname'] . ' ' . $value['lastname'] ?></td>
                                    <td><?= $value['commission_method'] ?></td>
                                    <td><?= $value['commission_type'] ?></td>
                                    <td><?= c_format($value['commission']); ?></td>
                                    <td><?= date('d-m-Y', strtotime($value['commission_date'])); ?></td>
                                    <td><?= c_format($value['total_wallet_amount']); ?></td>
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
    $(document).ready(function() {
        $('#order_by, #filter_type, #limit').change(function() {
            let order_by = $('#order_by').val();
            let filter_type = $('#filter_type').val();
            let limit = $('#limit').val();
            let url = "<?= base_url('admincontrol/user_commissions') ?>";
            window.location.href = url + "?order_by=" + order_by + "&filter_type=" + filter_type + "&limit=" + limit;
        });
    });
</script>
