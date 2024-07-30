<?php if ($award_level_status) { ?>

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
                                    <input type="text" class="form-control" name="level_number" value="<?= $award_level['level_number'] ?>" placeholder="<?= __('admin.level_number') ?>">
                                    <p class="error-message"></p>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">
                                        <?= __('admin.jump_level') ?>
                                        <span class="field-description <?= ($award_level['jump_level'] == '0') ? 'd-none' : '' ?>" data-bs-toggle="tooltip" title="<?= __('admin.award_level_jump_level_desc') ?>"></span>
                                        <span class="field-description default-level-description <?= ($award_level['jump_level'] == '0') ? '' : 'd-none' ?>" data-bs-toggle="tooltip" title="<?= __('admin.award_level_jump_default_level_desc') ?>"></span>
                                    </label>
                                    <select class="form-select" name="jump_level">
                                        <option value=''><?= __('admin.choose_jump_level') ?></option>
                                        <option <?= ($award_level['jump_level'] == '0') ? 'selected' : '' ?> value="0"><?= __('admin.default') ?></option>
                                        <?php foreach ($award_levels as $key => $value) : ?>
                                            <?php $class = ($value['id'] == $award_level['jump_level']) ? 'selected' : '' ?>
                                            <option <?= $class ?> value="<?= $value['id'] ?>"><?= $value['level_number'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <p class="error-message"></p>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">
                                        <?= __('admin.minimum_earning') ?>
                                        <span class="field-description" data-bs-toggle="tooltip" title="<?= __('admin.award_level_minimum_earning_desc') ?>"></span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                        <input type="number" class="form-control" name="minimum_earning" min="0" step="0.01" value="<?= $award_level['minimum_earning'] ?>" placeholder="<?= __('admin.minimum_earning') ?>">
                                    </div>
                                    <p class="error-message"></p>
                                </div>
                            </div>

                            <!-- Điều kiện doanh thu -->
                            <div class="row">
                                <div class="col-12">
                                    <h5>Điều kiện Doanh thu đạt cấp</h5>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">
                                        <?= __('Doanh thu cá nhân') ?>
                                        <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu cá nhân') ?>"></span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                        <input type="number" class="form-control" name="con_revenue_personal" min="0" step="0.01" value="<?= $award_level['con_revenue_personal'] ?>" placeholder="<?= __('Nhập doanh thu cá nhân') ?>">
                                    </div>
                                    <p class="error-message"></p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">
                                        <?= __('Doanh thu cá tổng cá nhân') ?>
                                        <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu tổng cá nhân') ?>"></span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                        <input type="number" class="form-control" name="con_revenue_total" min="0" step="0.01" value="<?= $award_level['con_revenue_total'] ?>" placeholder="<?= __('Nhập doanh thu tổng cá nhân') ?>">
                                    </div>
                                    <p class="error-message"></p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">
                                        <?= __('Doanh thu trực tiếp') ?>
                                        <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu trực tiếp') ?>"></span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                        <input type="number" class="form-control" name="con_revenue_direct_members" min="0" step="0.01" value="<?= $award_level['con_revenue_direct_members'] ?>" placeholder="<?= __('Nhập Doanh thu trực tiếp') ?>">
                                    </div>
                                    <p class="error-message"></p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">
                                        <?= __('Doanh thu gián tiếp') ?>
                                        <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu gián tiếp') ?>"></span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                        <input type="number" class="form-control" name="con_revenue_indirect_members" min="0" step="0.01" value="<?= $award_level['con_revenue_indirect_members'] ?>" placeholder="<?= __('Nhập Doanh thu gián tiếp') ?>">
                                    </div>
                                    <p class="error-message"></p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">
                                        <?= __('Doanh thu tuyến dưới') ?>
                                        <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu tuyến dưới') ?>"></span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                        <input type="number" class="form-control" name="con_revenue_members" min="0" step="0.01" value="<?= $award_level['con_revenue_members'] ?>" placeholder="<?= __('Nhập Doanh thu tuyến dưới') ?>">
                                    </div>
                                    <p class="error-message"></p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">
                                        <?= __('Doanh thu nhóm') ?>
                                        <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu nhóm') ?>"></span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                        <input type="number" class="form-control" name="con_revenue_team" min="0" step="0.01" value="<?= $award_level['con_revenue_team'] ?>" placeholder="<?= __('Nhập doanh thu nhóm') ?>">
                                    </div>
                                    <p class="error-message"></p>
                                </div>
                            </div>

                            <!-- Điều kiện tiêu dùng -->
                            <div class="col-12">
                                <h5>Điều kiện Tiêu dùng đạt cấp</h5>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">
                                        <?= __('Tiêu dùng cá nhân') ?>
                                        <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tiêu dùng cá nhân') ?>"></span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                        <input type="number" class="form-control" name="con_consum_personal" min="0" step="0.01" value="<?= $award_level['con_consum_personal'] ?>" placeholder="<?= __('Nhập doanh thu cá nhân') ?>">
                                    </div>
                                    <p class="error-message"></p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">
                                        <?= __('Tiêu dùng cá tổng cá nhân') ?>
                                        <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tiêu dùng tổng cá nhân') ?>"></span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                        <input type="number" class="form-control" name="con_consum_total" min="0" step="0.01" value="<?= $award_level['con_consum_total'] ?>" placeholder="<?= __('Nhập doanh thu tổng cá nhân') ?>">
                                    </div>
                                    <p class="error-message"></p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">
                                        <?= __('Tiêu dùng trực tiếp') ?>
                                        <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tiêu dùng trực tiếp') ?>"></span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                        <input type="number" class="form-control" name="con_consum_direct_members" min="0" step="0.01" value="<?= $award_level['con_consum_direct_members'] ?>" placeholder="<?= __('Nhập Tiêu dùng trực tiếp') ?>">
                                    </div>
                                    <p class="error-message"></p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">
                                        <?= __('Tiêu dùng gián tiếp') ?>
                                        <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tiêu dùng gián tiếp') ?>"></span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                        <input type="number" class="form-control" name="con_consum_indirect_members" min="0" step="0.01" value="<?= $award_level['con_consum_indirect_members'] ?>" placeholder="<?= __('Nhập Tiêu dùng gián tiếp') ?>">
                                    </div>
                                    <p class="error-message"></p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">
                                        <?= __('Tiêu dùng tuyến dưới') ?>
                                        <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tiêu dùng tuyến dưới') ?>"></span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                        <input type="number" class="form-control" name="con_consum_members" min="0" step="0.01" value="<?= $award_level['con_consum_members'] ?>" placeholder="<?= __('Nhập Tiêu dùng tuyến dưới') ?>">
                                    </div>
                                    <p class="error-message"></p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">
                                        <?= __('Tiêu dùng nhóm') ?>
                                        <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tiêu dùng nhóm') ?>"></span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                        <input type="number" class="form-control" name="con_consum_team" min="0" step="0.01" value="<?= $award_level['con_consum_team'] ?>" placeholder="<?= __('Nhập doanh thu nhóm') ?>">
                                    </div>
                                    <p class="error-message"></p>
                                </div>
                            </div>

                            <!-- Điều kiện tuyển dụng -->
                            <div class="col-12">
                                <h5>Điều kiện Tuyển dụng đạt cấp</h5>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">
                                        <?= __('Tuyển trực tiếp') ?>
                                        <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tuyển trực tiếp') ?>"></span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                        <input type="number" class="form-control" name="con_refer_direct_number" min="0" step="0.01" value="<?= $award_level['con_refer_direct_number'] ?>" placeholder="<?= __('Nhập Tuyển trực tiếp') ?>">
                                    </div>
                                    <p class="error-message"></p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">
                                        <?= __('Tuyển gián tiếp') ?>
                                        <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tuyển gián tiếp') ?>"></span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                        <input type="number" class="form-control" name="con_refer_number" min="0" step="0.01" value="<?= $award_level['con_refer_number'] ?>" placeholder="<?= __('Nhập Tuyển gián tiếp') ?>">
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
                                        <?php foreach ($plans as $plan_item) : ?>
                                            <option value="<?= $plan_item['id'] ?>" <?= $award_level['con_refer_reward_id'] == $plan_item['id'] ? 'selected="selected"' : ''; ?>><?= $plan_item['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <p class="error-message"></p>
                                </div>
                                <?php $current_logic = $award_level['con_and']; ?>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">
                                        <?= __('Điều kiện kết hợp') ?>
                                        <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Chọn điều kiện kết hợp') ?>"></span>
                                    </label>
                                    <select class="form-control" name="con_and">
                                        <option value="1" <?= $current_logic == 1 ? 'selected="selected"' : ''; ?>><?= __('Và') ?></option>
                                        <option value="0" <?= $current_logic == 0 ? 'selected="selected"' : ''; ?>><?= __('Hoặc') ?></option>
                                    </select>
                                    <p class="error-message"></p>
                                </div>
                                <!--  -->
                            </div>
                            <div class="col-12">
                                <h5>Hoa hồng khi đạt cấp:</h5>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">
                                        <?= __('Nguồn trả thưởng lên cấp') ?>
                                        <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Nguồn trả thưởng lên cấp') ?>"></span>
                                    </label>
                                    <div class="input-group">
                                        <select name="comission_source" class="form-control">
                                            <option value=""><?= __('Chọn nguồn trả thưởng') ?></option>
                                            <option <?= ($award_level['comission_source'] == 'sales_personal') ? 'selected' : '' ?> value="sales_personal"><?= __('Doanh thu Cá nhân') ?></option>
                                            <option <?= ($award_level['comission_source'] == 'sales_direct') ? 'selected' : '' ?> value="sales_direct"><?= __('Doanh thu Trực tiếp') ?></option>
                                            <option <?= ($award_level['comission_source'] == 'sales_indirect') ? 'selected' : '' ?> value="sales_indirect"><?= __('Doanh thu Gián tiếp') ?></option>
                                            <option <?= ($award_level['comission_source'] == 'sales_members') ? 'selected' : '' ?> value="sales_members"><?= __('Doanh thu Tuyến dưới') ?></option>
                                            <option <?= ($award_level['comission_source'] == 'sales_shop') ? 'selected' : '' ?> value="sales_shop"><?= __('Doanh thu Chi nhánh') ?></option>
                                            <option <?= ($award_level['comission_source'] == 'sales_branch') ? 'selected' : '' ?> value="sales_branch"><?= __('Doanh thu Nhánh') ?></option>
                                            <option <?= ($award_level['comission_source'] == 'sales_team') ? 'selected' : '' ?> value="sales_team"><?= __('Doanh thu Nhóm') ?></option>
                                            <option <?= ($award_level['comission_source'] == 'consum_personal') ? 'selected' : '' ?> value="consum_personal"><?= __('Tiêu dùng Cá nhân') ?></option>
                                            <option <?= ($award_level['comission_source'] == 'consum_direct') ? 'selected' : '' ?> value="consum_direct"><?= __('Tiêu dùng Trực tiếp') ?></option>
                                            <option <?= ($award_level['comission_source'] == 'consum_indirect') ? 'selected' : '' ?> value="consum_indirect"><?= __('Tiêu dùng Gián tiếp') ?></option>
                                            <option <?= ($award_level['comission_source'] == 'consum_members') ? 'selected' : '' ?> value="consum_members"><?= __('Tiêu dùng Tuyến dưới') ?></option>
                                            <option <?= ($award_level['comission_source'] == 'consum_shop') ? 'selected' : '' ?> value="consum_shop"><?= __('Tiêu dùng Chi nhánh') ?></option>
                                            <option <?= ($award_level['comission_source'] == 'consum_branch') ? 'selected' : '' ?> value="consum_branch"><?= __('Tiêu dùng Nhánh') ?></option>
                                            <option <?= ($award_level['comission_source'] == 'consum_team') ? 'selected' : '' ?> value="consum_team"><?= __('Tiêu dùng Nhóm') ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">
                                        <?= __('Tỷ lệ hoa hồng được hưởng') ?>
                                        <span class="field-description" data-bs-toggle="tooltip" title="<?= __('admin.award_level_sale_comission_rate_desc') ?>"></span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text refer-reg-symball">%</span>
                                        <input type="number" class="form-control" name="sale_comission_rate" min="0" step="0.01" value="<?= $award_level['sale_comission_rate'] ?>" placeholder="<?= __('admin.sale_comission_rate') ?>">
                                    </div>
                                    <p class="error-message"></p>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">
                                        <?= __('Thưởng cứng') ?>
                                        <span class="field-description" data-bs-toggle="tooltip" title="<?= __('admin.award_level_bonus_desc') ?>"></span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                        <input type="number" class="form-control" name="bonus" min="0" step="0.01" value="<?= $award_level['bonus'] ?>" placeholder="<?= __('admin.bonus') ?>">
                                    </div>
                                    <p class="error-message"></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        <?= __('admin.set_default') ?>
                                        <span class="field-description" data-bs-toggle="tooltip" title="<?= __('admin.award_level_default_desc') ?>"></span>
                                    </label>
                                    <input type="checkbox" class="form-check-input" name="default_registration_level" <?= ($award_level['default_registration_level']) ? 'checked' : '' ?> value="1">
                                    <p class="error-message"></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        <?= __('Tách nhóm') ?>
                                        <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Đạt cấp có tách nhóm không') ?>"></span>
                                    </label>
                                    <input type="checkbox" class="form-check-input" name="split_branch" <?= ($award_level['split_branch']) ? 'checked' : '' ?> value="1">
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
    <?php } ?>


    <script type="text/javascript">
        $("button[type='submit']").on('click', function(e) {
            e.preventDefault();
            $this = $(this);
            let form = $this.parents('form');
            let url = form.attr('action');

            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: form.serialize(),
                success: function(result) {
                    $("input").removeClass('error');
                    $(".error-message").text('');

                    if (result.validation) {
                        $.each(result.validation, function(key, value) {
                            $("input[name='" + key + "']").addClass('error');
                            $("input[name='" + key + "']").siblings('.error-message').text(value);
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