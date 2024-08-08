<?php if ($award_level_status) { ?>
    <div class="content-body">
        <div class="card award-level">
            <div class="card-header bg-secondary text-white d-flex justify-content-between">
                <h5><?= __('admin.award_level') ?></h5>
                <a id="toggle-uploader" href="<?= base_url('admincontrol/award_level') ?>" class="btn btn-sm btn-light">
                    <?= __('admin.back') ?>
                </a>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-content">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <?= __('admin.level_number') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('admin.award_level_level_number_desc') ?>">
                                    </span>
                                </label>
                                <input type="text" class="form-control" name="level_number" placeholder="<?= __('admin.level_number') ?>">
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <?= __('admin.jump_level') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('admin.award_level_jump_level_desc') ?>"></span>
                                    <span class="field-description default-level-description d-none" data-bs-toggle="tooltip" title="<?= __('admin.award_level_jump_default_level_desc') ?>"></span>
                                </label>
                                <select class="form-select" name="jump_level">
                                    <option value=''><?= __('admin.choose_jump_level') ?></option>
                                    <option value="0"><?= __('admin.default') ?></option>
                                    <?php foreach ($award_levels as $key => $value) : ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['level_number'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <p class="error-message"></p>
                            </div>
                        </div>

                        <!-- Doanh số yêu cầu -->
                        <div class="row">
                            <div class="col-12">
                                <h5>Điều kiện doanh số lên cấp:</h5>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <?= __('Doanh thu cá nhân') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu cá nhân') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                    <input value="0" type="number" class="form-control" name="con_revenue_personal" min="0" step="0.01" placeholder="<?= __('Doanh số cá nhân yêu cầu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <?= __('Của (để 0 toàn bộ)') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Của (để 0 toàn bộ)') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball">đơn hàng</span>
                                    <input type="number" class="form-control" name="con_revenue_personal_orders" min="0" step="1" placeholder="<?= __('Nhập số đơn hàng cho doanh thu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <?= __('Doanh số cộng dồn') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh số cộng dồn') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                    <input v type="number" class="form-control" name="con_revenue_total" min="0" step="0.01" placeholder="<?= __('Doanh số cá nhân Tổng yêu cầu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">
                                    <?= __('Cộng dồn trong (0 toàn bộ)') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Cộng dồn trong (0 toàn bộ)') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball">ngày</span>
                                    <input type="number" class="form-control" name="con_revenue_total_days" min="0" step="1" placeholder="<?= __('Nhập số ngày cộng dồn doanh thu cá nhân') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <?= __('Doanh số nhóm yêu cầu') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh số nhóm yêu cầu') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                    <input value="0" type="number" class="form-control" name="con_revenue_team" min="0" step="0.01" placeholder="<?= __('Doanh số nhóm yêu cầu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <?= __('Doanh số tuyến dưới yêu cầu') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh số tuyến dưới yêu cầu') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                    <input value="0" type="number" class="form-control" name="con_revenue_members" min="0" step="0.01" placeholder="<?= __('Doanh số tuyến dưới yêu cầu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <?= __('Doanh số trực tiếp yêu cầu') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh số trực tiếp yêu cầu') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                    <input value="0" type="number" class="form-control" name="con_revenue_direct_members" min="0" step="0.01" placeholder="<?= __('Doanh số trực tiếp yêu cầu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <?= __('Doanh số gián tiếp yêu cầu') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh số gián tiếp yêu cầu') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                    <input value="0" type="number" class="form-control" name="con_revenue_indirect_members" min="0" step="0.01" placeholder="<?= __('Doanh số gián tiếp yêu cầu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                        </div>

                        <!-- Tiêu dùng yêu cầu -->
                        <div class="row">
                            <div class="col-12">
                                <h5>Điều kiện tiêu dùng lên cấp:</h5>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <?= __('Tiêu dùng cá nhân yêu cầu') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tiêu dùng cá nhân yêu cầu') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                    <input value="0" type="number" class="form-control" name="con_consum_personal" min="0" step="0.01" placeholder="<?= __('Tiêu dùng cá nhân yêu cầu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">
                                    <?= __('Của (để 0 toàn bộ)') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Của (để 0 toàn bộ)') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball">đơn hàng</span>
                                    <input type="number" class="form-control" name="con_consum_personal_orders" min="0" step="1" value="<?= $award_level['con_consum_personal_orders'] ?>" placeholder="<?= __('Nhập số đơn hàng tiêu dùng') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                            <!-- and or -->
                            <?php $current_logic = $award_level['con_and']; ?>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">
                                    <?= __('Điều kiện kết hợp') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Chọn điều kiện kết hợp') ?>"></span>
                                </label>
                                <select class="form-control" name="con_and">
                                    <option value="1" selected="selected"><?= __('Và') ?></option>
                                    <option value="0"><?= __('Hoặc') ?></option>
                                </select>
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <?= __('Tiêu dùng cá nhân Tổng yêu cầu') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tiêu dùng cá nhân Tổng yêu cầu') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                    <input v type="number" class="form-control" name="con_consum_total" min="0" step="0.01" placeholder="<?= __('Tiêu dùng cá nhân Tổng yêu cầu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label class="form-label">
                                    <?= __('Cộng dồn trong (0 toàn bộ)') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Cộng dồn trong (0 toàn bộ)') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball">ngày</span>
                                    <input type="number" class="form-control" name="con_consum_total_days" min="0" step="1" placeholder="<?= __('Nhập số ngày cộng dồn doanh thu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                            <?php
                            // Truy vấn danh sách chức danh từ bảng membership_plans
                            $plans = $this->Product_model->getAllPlan();
                            ?>

                            <div class="col-md-3 mb-3"> <label class="form-label">
                                    <?= __('Chọn Chức danh') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Bất kỳ vị trí') ?>"></span>
                                </label>
                                <select class="form-control" name="con_refer_reward_id">
                                    <option value=""><?= __('Bất kỳ vị trí') ?></option>
                                    <?php foreach ($plans as $plan) : ?>
                                        <option value="<?= $plan['id'] ?>"><?= $plan['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">
                                    <?= __('Số người 1 nhánh tối đa (0 là không giới hạn)') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Một nhánh tối đa') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball">người</span>
                                    <input type="number" class="form-control" name="con_refer_number_1_branch" min="0" step="1" value="<?= $award_level['con_refer_number_1_branch'] ?>" placeholder="<?= __('Số người một nhánh tối đa cho phép') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <?= __('Tiêu dùng nhóm yêu cầu') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tiêu dùng nhóm yêu cầu') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                    <input value="0" type="number" class="form-control" name="con_consum_team" min="0" step="0.01" placeholder="<?= __('Tiêu dùng nhóm yêu cầu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <?= __('Tiêu dùng tuyến dưới yêu cầu') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tiêu dùng tuyến dưới yêu cầu') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                    <input value="0" type="number" class="form-control" name="con_consum_members" min="0" step="0.01" placeholder="<?= __('Tiêu dùng tuyến dưới yêu cầu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <?= __('Tiêu dùng trực tiếp yêu cầu') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tiêu dùng trực tiếp yêu cầu') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                    <input value="0" type="number" class="form-control" name="con_consum_direct_members" min="0" step="0.01" placeholder="<?= __('Tiêu dùng trực tiếp yêu cầu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <?= __('Tiêu dùng gián tiếp yêu cầu') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tiêu dùng gián tiếp yêu cầu') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                    <input value="0" type="number" class="form-control" name="con_consum_indirect_members" min="0" step="0.01" placeholder="<?= __('Tiêu dùng gián tiếp yêu cầu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                        </div>


                        <!-- Tuyển dụng yêu cầu -->
                        <div class="row">
                            <div class="col-12">
                                <h5>Điều kiện tuyển dụng lên cấp:</h5>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">
                                    <?= __('Tuyển trực tiếp yêu cầu') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tuyển trực tiếp yêu cầu') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                    <input type="number" class="form-control" name="con_refer_direct_number" min="0" step="0.01" value="0" placeholder="<?= __('Nhập Tuyển trực tiếp yêu cầu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">
                                    <?= __('Tuyển gián tiếp yêu cầu') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tuyển gián tiếp yêu cầu') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                    <input type="number" class="form-control" name="con_refer_number" min="0" step="1" value="0">
                                </div>
                                <p class="error-message"></p>
                            </div>
                        </div>

                        <!-- Điều kiện đồng chia -->
                        <div class="col-12">
                            <h5>Điều kiện Đồng chia</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="form-label">
                                    <?= __('Số lượng thành viên') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Số lượng thành viên') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball">người</span>
                                    <input type="number" class="form-control" name="con_shared_number_of_members" min="0" step="0.01" placeholder="<?= __('admin.minimum_earning') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">
                                    <?= __('Thành viên lên cấp') ?>
                                    <span class="field-description <?= ($award_level['con_shared_level_of_members'] == '0') ? 'd-none' : '' ?>" data-bs-toggle="tooltip" title="<?= __('Thành viên lên cấp') ?>"></span>
                                    <span class="field-description default-level-description <?= ($award_level['con_shared_level_of_members'] == '0') ? '' : 'd-none' ?>" data-bs-toggle="tooltip" title="<?= __('Thành viên lên cấp') ?>"></span>
                                </label>
                                <select class="form-select" name="con_shared_level_of_members">
                                    <option value=''><?= __('Chọn cấp thành viên') ?></option>
                                    <option <?= ($award_level['con_shared_level_of_members'] == '0') ? 'selected' : '' ?> value="0"><?= __('admin.default') ?></option>
                                    <?php foreach ($award_levels as $key => $value) : ?>
                                        <?php $class = ($value['id'] == $award_level['con_shared_level_of_members']) ? 'selected' : '' ?>
                                        <option <?= $class ?> value="<?= $value['id'] ?>"><?= $value['level_number'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">
                                    <?= __('Tỷ lệ đồng chia hưởng (từ doanh thu)') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tỷ lệ đồng chia') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball">%</span>
                                    <input type="number" class="form-control" name="shared_commission_rate" min="0" step="0.01" placeholder="<?= __('admin.minimum_earning') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <?= __('admin.minimum_earning') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('admin.award_level_minimum_earning_desc') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                    <input value="0" type="number" class="form-control" name="minimum_earning" min="0" step="0.01" placeholder="<?= __('admin.minimum_earning') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                        </div>

                        <!-- Thưởng hoa hồng -->
                        <div class="row">
                            <div class="col-12">
                                <h5>Hoa hồng khi đạt cấp:</h5>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <?= __('Nguồn thưởng khi lên cấp') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Nguồn thưởng khi lên cấp') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <select name="comission_source" class="form-control">
                                        <option value=""><?= __('Chọn nguồn trả thưởng') ?></option>
                                        <option value="sales_personal" selected="selected"><?= __('Doanh thu Cá nhân') ?></option>
                                        <option value="sales_direct"><?= __('Doanh thu Trực tiếp') ?></option>
                                        <option value="sales_indirect"><?= __('Doanh thu Gián tiếp') ?></option>
                                        <option value="sales_members"><?= __('Doanh thu Tuyến dưới') ?></option>
                                        <option value="sales_shop"><?= __('Doanh thu Chi nhánh') ?></option>
                                        <option value="sales_branch"><?= __('Doanh thu Nhánh') ?></option>
                                        <option value="sales_team"><?= __('Doanh thu Nhóm') ?></option>
                                        <option value="consum_personal"><?= __('Tiêu dùng Cá nhân') ?></option>
                                        <option value="consum_direct"><?= __('Tiêu dùng Trực tiếp') ?></option>
                                        <option value="consum_indirect"><?= __('Tiêu dùng Gián tiếp') ?></option>
                                        <option value="consum_members"><?= __('Tiêu dùng Tuyến dưới') ?></option>
                                        <option value="consum_shop"><?= __('Tiêu dùng Chi nhánh') ?></option>
                                        <option value="consum_branch"><?= __('Tiêu dùng Nhánh') ?></option>
                                        <option value="consum_team"><?= __('Tiêu dùng Nhóm') ?></option>
                                        <option value="commission_personal"><?= __('Thu nhập Cá nhân') ?></option>
                                        <option value="commission_direct"><?= __('Thu nhập Trực tiếp') ?></option>
                                        <option value="commission_members"><?= __('Thu nhập Tuyến dưới') ?></option>
                                    </select>
                                </div>
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <?= __('admin.sale_comission_rate') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('admin.award_level_sale_comission_rate_desc') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball">%</span>
                                    <input value="0" type="number" class="form-control" name="sale_comission_rate" min="0" step="0.01" placeholder="<?= __('admin.sale_comission_rate') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">
                                    <?= __('admin.bonus') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('admin.award_level_bonus_desc') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                    <input value="0" type="number" class="form-control" name="bonus" min="0" step="0.01" placeholder="<?= __('admin.bonus') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-check-label">
                                    <?= __('admin.set_default') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('admin.award_level_default_desc') ?>"></span>
                                </label>
                                <input type="checkbox" class="form-check-input" name="default_registration_level" value="1">
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-check-label">
                                    <?= __('Tách nhánh') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Đến cấp này có tách nhánh không') ?>"></span>
                                </label>
                                <input type="checkbox" class="form-check-input" name="split_branch" value="1">
                                <p class="error-message"></p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary me-3"><?= __('admin.save') ?></button>
                        <button type="submit" class="btn btn-primary" data-redirect='true'><?= __('admin.save_and_close') ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $("button[type='submit']").on('click', function(e) {
            e.preventDefault();

            $this = $(this);
            let form = $(this).parents('form');
            let url = form.attr('action');

            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: form.serialize(),
                success: function(result) {
                    $("input,select").removeClass('error');
                    $(".error-message").text('');

                    if (result.validation) {
                        $.each(result.validation, function(key, value) {
                            $("[name='" + key + "']").addClass('error');
                            $("[name='" + key + "']").siblings('.error-message').text(value);
                            showPrintMessage(value, 'error');
                        })
                    } else {
                        if (result.status) {
                            showPrintMessage(result.message, 'success');

                            let redirect = $this.data('redirect');
                            if (redirect) {
                                setTimeout(function() {
                                    window.location = '<?= base_url("admincontrol/award_level") ?>';
                                }, 1000);
                            }
                        } else {
                            showPrintMessage(result.message, 'error');
                        }

                    }
                },
            });
        })


        let jumpLevelDesc = '<?= __('admin.award_level_jump_level_desc') ?>';
        let defaultJumpLevelDesc = '<?= __('admin.award_level_jump_default_level_desc') ?>';
        $("select[name='jump_level']").on('change', function() {
            let value = $(this).val();
            if (value == '0') {
                $(this).siblings('label').find('.field-description').addClass('d-none');
                $(this).siblings('label').find('.field-description.default-level-description').removeClass('d-none');
            } else {
                $(this).siblings('label').find('.field-description').removeClass('d-none');
                $(this).siblings('label').find('.field-description.default-level-description').addClass('d-none');
            }
        })
    </script>

<?php } else { ?>
    <div>
        <h4 class="notification_on_pages">
            <span class="badge bg-secondary"><?= __('admin.award_level_module_is_off') ?>
                <a href="<?= base_url('admincontrol/addons') ?>">
                    <?= __('admin.admin_click_here_to_activate') ?>
                </a>
            </span>
        </h4>
    </div>
<?php } ?>