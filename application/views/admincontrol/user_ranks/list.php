<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                <h5><?= __('Danh sách Thành viên theo Cấp bậc') ?></h5>

                <div class="d-flex align-items-center">
                    <div class="row">
                        <div class="col-md-3">

                            <!-- Select 1: Sắp xếp theo -->
                            <select id="order_by" class="form-control mr-2">
                                <option value="user_id" <?= ($order_by == 'user_id') ? 'selected' : '' ?>>ID</option>
                                <option value="full_name" <?= ($order_by == 'full_name') ? 'selected' : '' ?>>Tên</option>
                                <option value="level_number" <?= ($order_by == 'level_number') ? 'selected' : '' ?>>Cấp độ</option>
                                <option value="plan_name" <?= ($order_by == 'plan_name') ? 'selected' : '' ?>>Vị trí</option>
                                <option value="referrer_name" <?= ($order_by == 'referrer_name') ? 'selected' : '' ?>>Người giới thiệu</option>
                                <option value="personal_revenue" <?= ($order_by == 'personal_revenue') ? 'selected' : '' ?>>Doanh thu</option>
                                <option value="personal_consumption" <?= ($order_by == 'personal_consumption') ? 'selected' : '' ?>>Tiêu dùng</option>
                                <option value="recruitment_count" <?= ($order_by == 'recruitment_count') ? 'selected' : '' ?>>Tuyển dụng</option>
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
                                <option value="100" <?= ($limit == 200) ? 'selected' : '' ?>>200</option>
                                <option value="100" <?= ($limit == 300) ? 'selected' : '' ?>>300</option>
                                <option value="100" <?= ($limit == 400) ? 'selected' : '' ?>>400</option>
                                <option value="100" <?= ($limit == 500) ? 'selected' : '' ?>>500</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <!-- Select 2: Lọc theo loại người dùng -->
                            <select id="filter_type" class="form-control mr-2">
                                <option value="all" <?= ($filter_type == 'all') ? 'selected' : '' ?>>Tất cả</option>
                                <option value="user" <?= ($filter_type == 'user') ? 'selected' : '' ?>>Thành viên</option>
                                <option value="client" <?= ($filter_type == 'client') ? 'selected' : '' ?>>Khách hàng</option>
                                <option value="admin" <?= ($filter_type == 'admin') ? 'selected' : '' ?>>Quản trị</option>
                            </select>
                        </div>
                        <div class="col-md-3">Tổng số <strong><?= $total_users ?> </strong></div>
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
                                <th><?= __('Cấp độ') ?></th>
                                <th><?= __('Vị trí') ?></th>
                                <th><?= __('Người giới thiệu') ?></th>
                                <th><?= __('Doanh thu') ?></th>
                                <th><?= __('Tiêu dùng') ?></th>
                                <th><?= __('Tuyển dụng') ?></th>
                                <th><?= __('Total Max') ?></th>
                                <th><?= __('Total Branch Max') ?></th>
                                <th><?= __('Vị trí tuyển max') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_users as $key => $value) { ?>
                                <tr>
                                    <td><?= $value['user_id'] ?></td>
                                    <td><?= $value['full_name'] ?></td>
                                    <td><?= $value['level_number'] ? $value['level_number'] : '0' ?></td>
                                    <td><?= $value['plan_name'] ? $value['plan_name'] : $value['type'] ?></td>
                                    <td><?= $value['referrer_name'] ?></td>
                                    <td><?= c_format($value['personal_revenue']); ?></td>
                                    <td><?= c_format($value['personal_consumption']); ?></td>
                                    <td><?= $value['recruitment_count'] ?></td>
                                    <td><?= c_format($value['max_order_total']); ?></td>
                                    <td><?= c_format($value['max_revenue_total']); ?></td>
                                    <td><?= $value['max_recruit_level'] ? $value['max_recruit_level'] : 0 ?></td>
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
            let url = "<?= base_url('admincontrol/user_ranks') ?>";
            window.location.href = url + "?order_by=" + order_by + "&filter_type=" + filter_type + "&limit=" + limit;
        });
    });
</script>