<div class="content-body">
    <div class="card award-level">
        <div class="card-header bg-secondary text-white d-flex justify-content-between">
            <h5><?= __('Cài đặt Thưởng') ?></h5>
            <a id="toggle-uploader" href="<?= base_url('admincontrol/reward') ?>" class="btn btn-sm btn-light">
                <?= __('Quay lại') ?>
            </a>
        </div>
        <div class="card-body">
            <form>
                <div class="form-content">
                    <!-- Thông tin điều kiện cơ bản -->
                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                <?= __('Tên') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('admin.award_level_minimum_earning_desc') ?>"></span>
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="name" value="<?= $reward['name'] ?>" placeholder="<?= __('admin.minimum_earning') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                <?= __('Doanh thu tối thiểu') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu tối thiểu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input type="number" class="form-control" name="minimum_earning" min="0" step="0.01" value="<?= $reward['minimum_earning'] ?>" placeholder="<?= __('admin.minimum_earning') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>


                        <?php
                        // Truy vấn danh sách cấp độ từ bảng award_level
                        $award_level = $this->Product_model->getAllAward();
                        $current_level = $star['con_award_level_id'];

                        ?>

                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Cấp độ yêu cầu') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Chọn cấp độ yêu cầu') ?>"></span>
                            </label>
                            <select class="form-control" name="con_award_level_id">
                                <option value=""><?= __('Chọn cấp độ') ?></option>
                                <?php foreach ($award_level as $level) : ?>
                                    <option value="<?= $level['id'] ?>" <?= $current_level == $level['id'] ? 'selected="selected"' : ''; ?>><?= $level['level_number'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <p class="error-message"></p>
                        </div>

                    </div>

                    <!-- Điều kiện doanh thu -->
                    <div class="row">
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Doanh thu cá nhân yêu cầu') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu cá nhân yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $reward['con_revenue_personal'] ?>" type="number" class="form-control" name="con_revenue_personal" min="0" step="0.01" placeholder="<?= __('Nhập doanh thu cá nhân yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Doanh thu tổng cộng') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tổng doanh thu cá nhân') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $reward['con_revenue_total'] ?>" type="number" class="form-control" name="con_revenue_total" min="0" step="0.01" placeholder="<?= __('Nhập tổng doanh thu cá nhân yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Doanh thu tổng tuyến dưới yêu cầu') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu tổng tuyến dưới yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $reward['con_revenue_members'] ?>" type="number" class="form-control" name="con_revenue_members" min="0" step="0.01" placeholder="<?= __('Nhập tổng cấp dưới yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Doanh thu tổng nhóm yêu cầu') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu nhóm yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $reward['con_revenue_team'] ?>" type="number" class="form-control" name="con_revenue_team" min="0" step="0.01" placeholder="<?= __('Nhập tổng cấp dưới yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Doanh thu tổng trực tiếp yêu cầu') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu trực tiếp yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $reward['con_revenue_direct_members'] ?>" type="number" class="form-control" name="con_revenue_direct_members" min="0" step="0.01" placeholder="<?= __('Nhập tổng cấp trực tiếp dưới yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Doanh thu tổng gián tiếp yêu cầu') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu gián tiếp yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $reward['con_revenue_indirect_members'] ?>" type="number" class="form-control" name="con_revenue_indirect_members" min="0" step="0.01" placeholder="<?= __('Nhập tổng cấp trực tiếp dưới yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                    </div>

                    <!-- Điều kiện tiêu dùng -->
                    <div class="row">
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Tiêu dùng cá nhân yêu cầu') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tiêu dùng cá nhân yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $reward['con_consum_personal'] ?>" type="number" class="form-control" name="con_consum_personal" min="0" step="0.01" placeholder="<?= __('Nhập doanh thu cá nhân yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Tiêu dùng tổng cộng') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tổng doanh thu cá nhân') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $reward['con_consum_total'] ?>" type="number" class="form-control" name="con_consum_total" min="0" step="0.01" placeholder="<?= __('Nhập tổng doanh thu cá nhân yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Tiêu dùng tổng tuyến dưới yêu cầu') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tiêu dùng tổng tuyến dưới yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $reward['con_consum_members'] ?>" type="number" class="form-control" name="con_consum_members" min="0" step="0.01" placeholder="<?= __('Nhập tổng cấp dưới yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Tiêu dùng tổng nhóm yêu cầu') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tiêu dùng nhóm yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $reward['con_consum_team'] ?>" type="number" class="form-control" name="con_consum_team" min="0" step="0.01" placeholder="<?= __('Nhập tổng cấp dưới yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Tiêu dùng tổng trực tiếp yêu cầu') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tiêu dùng trực tiếp yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $reward['con_consum_direct_members'] ?>" type="number" class="form-control" name="con_consum_direct_members" min="0" step="0.01" placeholder="<?= __('Nhập tổng cấp trực tiếp dưới yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Tiêu dùng tổng gián tiếp yêu cầu') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tiêu dùng gián tiếp yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $reward['con_consum_indirect_members'] ?>" type="number" class="form-control" name="con_consum_indirect_members" min="0" step="0.01" placeholder="<?= __('Nhập tổng cấp trực tiếp dưới yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                    </div>

                    <!-- Điều kiện tuyển -->
                    <div class="row">
                        <div class="col-md-3 mb-3"> <label class="form-label">
                                <?= __('Số lượng thành viên mời gián tiếp yêu cầu') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Số lượng thành viên mời gián tiếp yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball">#</span>
                                <input value="<?= $reward['con_refer_number'] ?>" type="number" class="form-control" name="con_refer_number" min="0" step="1" placeholder="<?= __('Nhập Số lượng thành viên mời yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-3 mb-3"> <label class="form-label">
                                <?= __('Số lượng thành viên mời trực tiếp yêu cầu') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Số lượng thành viên mời trực tiếp yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball">#</span>
                                <input value="<?= $reward['con_refer_direct_number'] ?>" type="number" class="form-control" name="con_refer_direct_number" min="0" step="1" placeholder="<?= __('Nhập Số lượng thành viên mời yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>


                        <?php
                        // Truy vấn danh sách chức danh từ bảng reward
                        $rewards = $this->Product_model->getAllReward();
                        ?>

                        <div class="col-md-3 mb-3"> <label class="form-label">
                                <?= __('Chọn Chức danh') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Chọn Chức danh') ?>"></span>
                            </label>
                            <select class="form-control" name="con_refer_reward_id">
                                <option value=""><?= __('Chọn Chức danh') ?></option>
                                <?php foreach ($rewards as $reward) : ?>
                                    <option value="<?= $reward['id'] ?>"><?= $reward['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">
                                <?= __('Điều kiện kết hợp') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Chọn điều kiện kết hợp') ?>"></span>
                            </label>
                            <select class="form-control" name="con_and">
                                <option value="1" <?= $reward['con_and'] ? 'selected="selected"' : ''; ?>><?= __('Và') ?></option>
                                <option value="0" <?= $reward['con_and'] != true ? 'selected="selected"' : ''; ?>><?= __('Hoặc') ?></option>
                            </select>
                            <p class="error-message"></p>
                        </div>
                    </div>

                    <!-- Điều kiện cấp độ - Sao  -->

                    <!-- Thưởng hoa hồng -->
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                <?= __('Nguồn thưởng doanh thu / tiêu dùng') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Thưởng Hoa hồng từ đâu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <select name="bonus_comission_source" class="form-control">
                                    <option value=""><?= __('Chọn nguồn trả thưởng') ?></option>
                                    <option <?= ($reward['bonus_comission_source'] == 'sales_personal') ? 'selected' : '' ?> value="sales_personal"><?= __('Doanh thu Cá nhân') ?></option>
                                    <option <?= ($reward['bonus_comission_source'] == 'sales_direct') ? 'selected' : '' ?> value="sales_direct"><?= __('Doanh thu Trực tiếp') ?></option>
                                    <option <?= ($reward['bonus_comission_source'] == 'sales_indirect') ? 'selected' : '' ?> value="sales_indirect"><?= __('Doanh thu Gián tiếp') ?></option>
                                    <option <?= ($reward['bonus_comission_source'] == 'sales_members') ? 'selected' : '' ?> value="sales_members"><?= __('Doanh thu Tuyến dưới') ?></option>
                                    <option <?= ($reward['bonus_comission_source'] == 'sales_shop') ? 'selected' : '' ?> value="sales_shop"><?= __('Doanh thu Chi nhánh') ?></option>
                                    <option <?= ($reward['bonus_comission_source'] == 'sales_branch') ? 'selected' : '' ?> value="sales_branch"><?= __('Doanh thu Nhánh') ?></option>
                                    <option <?= ($reward['bonus_comission_source'] == 'sales_team') ? 'selected' : '' ?> value="sales_team"><?= __('Doanh thu Nhóm') ?></option>
                                    <option <?= ($reward['bonus_comission_source'] == 'consum_personal') ? 'selected' : '' ?> value="consum_personal"><?= __('Tiêu dùng Cá nhân') ?></option>
                                    <option <?= ($reward['bonus_comission_source'] == 'consum_direct') ? 'selected' : '' ?> value="consum_direct"><?= __('Tiêu dùng Trực tiếp') ?></option>
                                    <option <?= ($reward['bonus_comission_source'] == 'consum_indirect') ? 'selected' : '' ?> value="consum_indirect"><?= __('Tiêu dùng Gián tiếp') ?></option>
                                    <option <?= ($reward['bonus_comission_source'] == 'consum_members') ? 'selected' : '' ?> value="consum_members"><?= __('Tiêu dùng Tuyến dưới') ?></option>
                                    <option <?= ($reward['bonus_comission_source'] == 'consum_shop') ? 'selected' : '' ?> value="consum_shop"><?= __('Tiêu dùng Chi nhánh') ?></option>
                                    <option <?= ($reward['bonus_comission_source'] == 'consum_branch') ? 'selected' : '' ?> value="consum_branch"><?= __('Tiêu dùng Nhánh') ?></option>
                                    <option <?= ($reward['bonus_comission_source'] == 'consum_team') ? 'selected' : '' ?> value="consum_team"><?= __('Tiêu dùng Nhóm') ?></option>
                                </select>
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                <?= __('Thưởng Hoa hồng') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Thưởng Hoa hồng') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball">%</span>
                                <input type="number" class="form-control" name="sale_comission_rate" min="0" step="0.01" value="<?= $reward['sale_comission_rate'] ?>" placeholder="<?= __('admin.sale_comission_rate') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                <?= __('Thưởng cứng') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Thưởng cứng') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball">đ</span>
                                <input value="<?= $reward['sale_comission_fixed'] ?>" type="number" class="form-control" name="sale_comission_fixed" min="0" step="1" placeholder="<?= __('Thưởng cứng') ?>">
                            </div>
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
                                window.location = '<?= base_url("admincontrol/reward") ?>';
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