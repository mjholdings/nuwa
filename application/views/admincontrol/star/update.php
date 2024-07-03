<div class="content-body">
    <div class="card award-level">
        <div class="card-header bg-secondary text-white d-flex justify-content-between">
            <h5><?= __('Cài đặt Thưởng') ?></h5>
            <a id="toggle-uploader" href="<?= base_url('admincontrol/star') ?>" class="btn btn-sm btn-light">
                <?= __('Quay lại') ?>
            </a>
        </div>
        <div class="card-body">
            <form>
                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                <?= __('Số sao') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Số sao') ?>"></span>
                            </label>
                            <div class="input-group">
                                <input value="<?= $star['star'] ?>" type="number" class="form-control" name="star" placeholder="<?= __('Số sao') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <?php
                        // Truy vấn danh sách cấp độ từ bảng award_level
                        $award_level = $this->Product_model->getAllAward();
                        $current_level = $star['con_award_level_id'];

                        ?>

                        <div class="col-md-6 mb-3"> <label class="form-label">
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


                    <!-- Điều kiện Doanh thu -->
                    <div class="row">
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Doanh thu cá nhân yêu cầu') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu cá nhân yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $star['con_revenue_personal'] ?>" type="number" class="form-control" name="con_revenue_personal" min="0" step="0.01" placeholder="<?= __('Nhập doanh thu cá nhân yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Doanh thu tổng yêu cầu') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tổng doanh thu cá nhân yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $star['con_revenue_total'] ?>" type="number" class="form-control" name="con_revenue_total" min="0" step="0.01" placeholder="<?= __('Nhập tổng doanh thu cá nhân yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Doanh thu nhánh dưới yêu cầu') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu nhánh dưới') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $star['con_revenue_members'] ?>" type="number" class="form-control" name="con_revenue_members" min="0" step="0.01" placeholder="<?= __('Nhập tổng nhánh dưới yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Doanh thu tổng trực tiếp') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu cấp dưới trực tiếp yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $star['con_revenue_direct_members'] ?>" type="number" class="form-control" name="con_revenue_direct_members" min="0" step="0.01" placeholder="<?= __('Nhập tổng cấp trực tiếp dưới yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Doanh thu tổng gián tiếp') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu cấp dưới gián tiếp yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $star['con_revenue_indirect_members'] ?>" type="number" class="form-control" name="con_revenue_indirect_members" min="0" step="0.01" placeholder="<?= __('Nhập tổng cấp gián tiếp dưới yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Doanh thu tổng nhóm') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu nhóm yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $star['con_revenue_team'] ?>" type="number" class="form-control" name="con_revenue_team" min="0" step="0.01" placeholder="<?= __('Nhập tổng nhóm yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                    </div>
                    <!-- Điều kiện Tiêu dùng -->
                    <div class="row">
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Tiêu dùng cá nhân yêu cầu') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tiêu dùng cá nhân yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $star['con_consum_personal'] ?>" type="number" class="form-control" name="con_consum_personal" min="0" step="0.01" placeholder="<?= __('Nhập doanh thu cá nhân yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Tiêu dùng tổng yêu cầu') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tổng doanh thu cá nhân yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $star['con_consum_total'] ?>" type="number" class="form-control" name="con_consum_total" min="0" step="0.01" placeholder="<?= __('Nhập tổng doanh thu cá nhân yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Tiêu dùng nhánh dưới yêu cầu') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tiêu dùng nhánh dưới') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $star['con_consum_members'] ?>" type="number" class="form-control" name="con_consum_members" min="0" step="0.01" placeholder="<?= __('Nhập tổng nhánh dưới yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Tiêu dùng tổng trực tiếp') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tiêu dùng cấp dưới trực tiếp yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $star['con_consum_direct_members'] ?>" type="number" class="form-control" name="con_consum_direct_members" min="0" step="0.01" placeholder="<?= __('Nhập tổng cấp trực tiếp dưới yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Tiêu dùng tổng gián tiếp') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tiêu dùng cấp dưới gián tiếp yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $star['con_consum_indirect_members'] ?>" type="number" class="form-control" name="con_consum_indirect_members" min="0" step="0.01" placeholder="<?= __('Nhập tổng cấp gián tiếp dưới yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-4 mb-3"> <label class="form-label">
                                <?= __('Tiêu dùng tổng nhóm') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tiêu dùng nhóm yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                <input value="<?= $star['con_consum_team'] ?>" type="number" class="form-control" name="con_consum_team" min="0" step="0.01" placeholder="<?= __('Nhập tổng nhóm yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                    </div>

                    <!-- Điều kiện tuyển dụng -->
                    <div class="row">
                        <div class="col-md-3 mb-3"> <label class="form-label">
                                <?= __('Số lượng thành viên mời trực tiếp yêu cầu') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Số lượng thành viên mời trực tiếp yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball">#</span>
                                <input value="<?= $star['con_refer_direct_number'] ?>" type="number" class="form-control" name="con_refer_direct_number" min="0" step="1" placeholder="<?= __('Nhập Số lượng thành viên mời trực tiếp yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="col-md-3 mb-3"> <label class="form-label">
                                <?= __('Số lượng thành viên mời gián tiếp yêu cầu') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Số lượng thành viên mời gián tiếp yêu cầu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text refer-reg-symball">#</span>
                                <input value="<?= $star['con_refer_number'] ?>" type="number" class="form-control" name="con_refer_number" min="0" step="1" placeholder="<?= __('Nhập Số lượng thành viên mời gián yêu cầu') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>


                        <?php
                        // Truy vấn danh sách chức danh từ bảng reward
                        $rewards = $this->Product_model->getAllReward();
                        $current_reward = $star['con_refer_reward_id'];
                        ?>

                        <div class="col-md-3 mb-3"> <label class="form-label">
                                <?= __('Chọn Chức danh') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Chọn Chức danh') ?>"></span>
                            </label>
                            <select class="form-control" name="con_refer_reward_id">
                                <option value="0"><?= __('Chọn Chức danh') ?></option>
                                <?php foreach ($rewards as $reward) : ?>
                                    <option value="<?= $reward['id'] ?>" <?= $current_reward == $reward['id'] ? 'selected="selected"' : ''; ?>><?= $reward['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <p class="error-message"></p>
                        </div>
                        <?php $current_logic = $star['con_and']; ?>
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
                    </div>

                    <!-- Thưởng -->
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                <?= __('Nguồn thưởng doanh thu / tiêu dùng') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Thưởng Hoa hồng từ đâu') ?>"></span>
                            </label>
                            <div class="input-group">
                                <select name="bonus_comission_source" class="form-control">
                                    <option value="" selected="selected"><?= __('Chọn nguồn trả thưởng') ?></option>
                                    <option value="sales_personal"><?= __('Doanh thu Cá nhân') ?></option>
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
                                <input value="<?= $star['sale_commission_rate'] ?>" type="number" class="form-control" name="sale_commission_rate" min="0" step="0.01" placeholder="<?= __('Thưởng Hoa hồng') ?>">
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
                                <input value="<?= $star['sale_commission_fixed'] ?>" type="number" class="form-control" name="sale_commission_fixed" min="0" step="1" placeholder="<?= __('Thưởng cứng') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary me-3"><?= __('admin.save') ?></button>
                    <button type="submit" class="btn btn-primary" data-redirect='true'><?= __('admin.save_and_close') ?></button>
                </div>

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
                                window.location = '<?= base_url("admincontrol/star") ?>';
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