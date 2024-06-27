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
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    <?= __('Tên') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tên') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="name" placeholder="<?= __('Tên') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-6 mb-3"> <label class="form-label">
                                    <?= __('Doanh thu tối thiểu') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu tối thiểu') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                    <input value="0" type="number" class="form-control" name="minimum_earning" min="0" step="0.01" placeholder="<?= __('Nhập doanh thu tối thiểu yêu cầu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3"> <label class="form-label">
                                    <?= __('Doanh thu cá nhân yêu cầu') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu cá nhân yêu cầu') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                    <input value="0" type="number" class="form-control" name="con_revenue_personal" min="0" step="0.01" placeholder="<?= __('Nhập doanh thu cá nhân yêu cầu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-6 mb-3"> <label class="form-label">
                                    <?= __('Doanh thu tổng cộng') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tổng doanh thu cá nhân') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                    <input value="0" type="number" class="form-control" name="con_revenue_total" min="0" step="0.01" placeholder="<?= __('Nhập tổng doanh thu cá nhân yêu cầu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-6 mb-3"> <label class="form-label">
                                    <?= __('Doanh thu tổng tuyến dưới yêu cầu') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu tổng tuyến dưới yêu cầu') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                    <input value="0" type="number" class="form-control" name="con_revenue_members" min="0" step="0.01" placeholder="<?= __('Nhập tổng cấp dưới yêu cầu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-6 mb-3"> <label class="form-label">
                                    <?= __('Doanh thu tổng nhóm yêu cầu') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu nhóm yêu cầu') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                    <input value="0" type="number" class="form-control" name="con_revenue_team" min="0" step="0.01" placeholder="<?= __('Nhập tổng cấp dưới yêu cầu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-6 mb-3"> <label class="form-label">
                                    <?= __('Doanh thu tổng trực tiếp yêu cầu') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu trực tiếp yêu cầu') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                    <input value="0" type="number" class="form-control" name="con_revenue_direct_members" min="0" step="0.01" placeholder="<?= __('Nhập tổng cấp trực tiếp dưới yêu cầu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-6 mb-3"> <label class="form-label">
                                    <?= __('Doanh thu tổng gián tiếp yêu cầu') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Doanh thu gián tiếp yêu cầu') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball"><?= $CurrencySymbol ?></span>
                                    <input value="0" type="number" class="form-control" name="con_revenue_indirect_members" min="0" step="0.01" placeholder="<?= __('Nhập tổng cấp trực tiếp dưới yêu cầu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3"> <label class="form-label">
                                    <?= __('Số lượng thành viên mời gián tiếp yêu cầu') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Số lượng thành viên mời gián tiếp yêu cầu') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball">#</span>
                                    <input value="0" type="number" class="form-control" name="con_refer_number" min="0" step="1" placeholder="<?= __('Nhập Số lượng thành viên mời yêu cầu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-6 mb-3"> <label class="form-label">
                                    <?= __('Số lượng thành viên mời trực tiếp yêu cầu') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Số lượng thành viên mời trực tiếp yêu cầu') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball">#</span>
                                    <input value="0" type="number" class="form-control" name="con_refer_direct_number" min="0" step="1" placeholder="<?= __('Nhập Số lượng thành viên mời yêu cầu') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>


                            <?php
                            // Truy vấn danh sách chức danh từ bảng reward
                            $rewards = $this->Product_model->getAllReward();
                            ?>

                            <div class="col-md-6 mb-3"> <label class="form-label">
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
                            <div class="col-md-6 mb-3">
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

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    <?= __('Hoa hồng') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Hoa hồng') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball">%</span>
                                    <input value="0" type="number" class="form-control" name="sale_comission_rate" min="0" step="0.01" placeholder="<?= __('Hoa hồng') ?>">
                                </div>
                                <p class="error-message"></p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    <?= __('Thưởng cứng') ?>
                                    <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Thưởng cứng') ?>"></span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text refer-reg-symball">đ</span>
                                    <input value="0" type="number" class="form-control" name="sale_comission_fixed" min="0" step="1" placeholder="<?= __('Thưởng cứng') ?>">
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
    </script>