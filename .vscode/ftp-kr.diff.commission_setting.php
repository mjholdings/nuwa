<div class="card saas-settings">
    <div class="card-header bg-secondary text-white">
        <h5><?= __('Hệ thống Thưởng') ?></h5>
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data" id="setting-form">
            <div class="row">

                <div class="col-12">
                    <ul class="nav nav-pills flex-column flex-sm-row" id="TabsNav">
                        <li class="nav-item flex-sm-fill text-sm-center">
                            <a class="nav-link active show" href="#commission_revenue_setting" role="tab" data-bs-toggle="tab"><?= __('Thưởng Doanh Số') ?></a>
                        </li>
                        <li class="nav-item flex-sm-fill text-sm-center">
                            <a class="nav-link bg-secondary" data-bs-toggle="tab" href="#bonus_recruitment_setting" role="tab"><?= __('Thưởng Tuyển Dụng') ?></a>
                        </li>
                        <li class="nav-item flex-sm-fill text-sm-center">
                            <a class="nav-link bg-secondary" href="#bonus_rank_setting" role="tab" data-bs-toggle="tab"><?= __('Thưởng Lên Cấp') ?></a>
                        </li>
                    </ul>
                </div>


                <div class="col-sm-12">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane py-3 active show" id="commission_revenue_setting">
                            <div class="form-group">
                                <div class="text-wrap rounded bg-info text-white mb-2 px-2 py-1">
                                    <?= __('BẬT/TẮT những loại Thưởng sẽ áp dụng cho Thành viên') ?>
                                </div>

                                <!-- Doanh thu cá nhân -->

                                <div class="form-group row mt-4">
                                    <label class="control-label col-sm-3">
                                        <?= __('1 - Hoa hồng từ doanh thu cá nhân') ?>
                                    </label>
                                    <label class="control-label col-sm-7">
                                        <?= __('Thành viên nhận hoa hồng dựa trên doanh thu từ việc bán sản phẩm hoặc dịch vụ của chính cá nhân họ.') ?>
                                    </label>
                                    <div class="form-check form-switch col-sm-2">
                                        <input class="form-check-input update_all_settings" type="checkbox" <?= $market_vendor['bonus_from_sales_personal'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="bonus_from_sales_personal" data-setting_type="market_vendor">
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3 pt-2">
                                            <div>
                                                <?php
                                                $commission_type = array(
                                                    'percentage' => __('admin.percentage'),
                                                    'fixed'      => __('admin.fixed'),
                                                );
                                                ?>
                                                <select name="market_vendor[bonus_from_sales_personal_type]" class="form-control bonus_from_sales_personal_type">
                                                    <?php foreach ($commission_type as $key => $value) { ?>
                                                        <option <?= $market_vendor['bonus_from_sales_personal_type'] == $key ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="toggle-container">
                                                <div class="percentage-value d-none">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="currency-symbol mt-2">
                                                                <?= $market_vendor['admin_sale_commission_type'] == 'percentage' ? '%' : $CurrencySymbol ?>
                                                            </div>
                                                            <input name="market_vendor[bonus_from_sales_personal_value]" id="bonus_from_sales_personal_value" class="form-control mt-2" value="<?php echo $market_vendor['bonus_from_sales_personal_value']; ?>" type="number" placeholder='<?= __('admin.sale_commission') ?>'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <script type="text/javascript">
                                        $("select.bonus_from_sales_personal_type").on("change", function() {
                                            $con = $(this).parents(".form-group");
                                            $con.find(
                                                ".toggle-container .percentage-value, .toggle-container .default-value"
                                            ).addClass('d-none');
                                            if ($(this).val() == 'default') {
                                                $con.find(".toggle-container .default-value").removeClass("d-none");
                                            } else {
                                                $con.find(".toggle-container .percentage-value").removeClass(
                                                    "d-none");
                                            }

                                            if ($(this).val() == 'percentage')
                                                $("input[name='market_vendor[bonus_from_sales_personal_value]']").siblings(
                                                    '.currency-symbol').text('%');
                                            else
                                                $("input[name='market_vendor[bonus_from_sales_personal_value]']").siblings(
                                                    '.currency-symbol').text('<?= $CurrencySymbol ?>');
                                        })

                                        $("select.bonus_from_sales_personal_type").trigger("change");
                                    </script>

                                </div>




                                <!-- Doanh thu trực tiếp -->
                                <div class="form-group row mt-4">
                                    <label class="control-label col-sm-3">
                                        <?= __('2 - Hoa hồng từ doanh thu Trực tiếp') ?>
                                    </label>
                                    <label class="control-label col-sm-7">
                                        <?= __('Thành viên nhận hoa hồng từ doanh thu của các thành viên họ trực tiếp tuyển dụng vào hệ thống') ?>
                                    </label>
                                    <div class="form-check form-switch col-sm-2">
                                        <input class="form-check-input update_all_settings" type="checkbox" <?= $market_vendor['bonus_from_sales_direct_members'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="bonus_from_sales_direct_members" data-setting_type="market_vendor">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 pt-2">
                                            <div>
                                                <?php
                                                $commission_type = array(
                                                    'percentage' => __('admin.percentage'),
                                                    'fixed'      => __('admin.fixed'),
                                                );
                                                ?>
                                                <select name="market_vendor[bonus_from_sales_direct_members_type]" class="form-control bonus_from_sales_direct_members_type">
                                                    <?php foreach ($commission_type as $key => $value) { ?>
                                                        <option <?= $market_vendor['bonus_from_sales_direct_members_type'] == $key ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="toggle-container">
                                                <div class="percentage-value d-none">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="currency-symbol mt-2">
                                                                <?= $market_vendor['bonus_from_sales_direct_members_type'] == 'percentage' ? '%' : $CurrencySymbol ?>
                                                            </div>
                                                            <input name="market_vendor[bonus_from_sales_direct_members_value]" id="bonus_from_sales_direct_members_value" class="form-control mt-2" value="<?php echo $market_vendor['bonus_from_sales_direct_members_value']; ?>" type="number" placeholder='<?= __('admin.sale_commission') ?>'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $("select.bonus_from_sales_direct_members_type").on("change", function() {
                                                $con = $(this).parents(".form-group");
                                                $con.find(
                                                    ".toggle-container .percentage-value, .toggle-container .default-value"
                                                ).addClass('d-none');
                                                if ($(this).val() == 'default') {
                                                    $con.find(".toggle-container .default-value").removeClass(
                                                        "d-none");
                                                } else {
                                                    $con.find(".toggle-container .percentage-value").removeClass(
                                                        "d-none");
                                                }

                                                if ($(this).val() == 'percentage')
                                                    $("input[name='market_vendor[bonus_from_sales_direct_members_value]']")
                                                    .siblings('.currency-symbol').text('%');
                                                else
                                                    $("input[name='market_vendor[bonus_from_sales_direct_members_value]']")
                                                    .siblings('.currency-symbol').text('<?= $CurrencySymbol ?>');
                                            })

                                            $("select.bonus_from_sales_direct_members_type").trigger("change");
                                        </script>
                                    </div>
                                </div>



                                <!-- Doanh thu gián tiếp -->
                                <div class="form-group row mt-4">
                                    <label class="control-label col-sm-3">
                                        <?= __('3 - Hoa hồng từ doanh thu Gián tiếp') ?>
                                    </label>
                                    <label class="control-label col-sm-7">
                                        <?= __('Thành viên nhận hoa hồng từ doanh thu của các thành viên được Thành viên trực tiếp tuyển dụng và các thành viên được cấp dưới tuyển dụng vào hệ thống') ?>
                                    </label>
                                    <div class="form-check form-switch col-sm-2">

                                        <input class="form-check-input update_all_settings" type="checkbox" <?= $market_vendor['bonus_from_sales_indirect_members'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="bonus_from_sales_indirect_members" data-setting_type="market_vendor">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 pt-2">
                                            <div>
                                                <?php
                                                $commission_type = array(
                                                    'percentage' => __('admin.percentage'),
                                                    'fixed'      => __('admin.fixed'),
                                                );
                                                ?>
                                                <select name="market_vendor[bonus_from_sales_indirect_members_type]" class="form-control bonus_from_sales_indirect_members_type">
                                                    <?php foreach ($commission_type as $key => $value) { ?>
                                                        <option <?= $market_vendor['bonus_from_sales_indirect_members_type'] == $key ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="toggle-container">
                                                <div class="percentage-value d-none">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="currency-symbol mt-2">
                                                                <?= $market_vendor['bonus_from_sales_indirect_members_type'] == 'percentage' ? '%' : $CurrencySymbol ?>
                                                            </div>
                                                            <input name="market_vendor[bonus_from_sales_indirect_members_value]" id="bonus_from_sales_indirect_members_value" class="form-control mt-2" value="<?php echo $market_vendor['bonus_from_sales_indirect_members_value']; ?>" type="number" placeholder='<?= __('admin.sale_commission') ?>'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $("select.bonus_from_sales_indirect_members_type").on("change", function() {
                                                $con = $(this).parents(".form-group");
                                                $con.find(
                                                    ".toggle-container .percentage-value, .toggle-container .default-value"
                                                ).addClass('d-none');
                                                if ($(this).val() == 'default') {
                                                    $con.find(".toggle-container .default-value").removeClass(
                                                        "d-none");
                                                } else {
                                                    $con.find(".toggle-container .percentage-value").removeClass(
                                                        "d-none");
                                                }

                                                if ($(this).val() == 'percentage')
                                                    $(
                                                        "input[name='market_vendor[bonus_from_sales_indirect_members_value]']"
                                                    )
                                                    .siblings('.currency-symbol').text('%');
                                                else
                                                    $(
                                                        "input[name='market_vendor[bonus_from_sales_indirect_members_value]']"
                                                    )
                                                    .siblings('.currency-symbol').text('<?= $CurrencySymbol ?>');
                                            })

                                            $("select.bonus_from_sales_indirect_members_type").trigger("change");
                                        </script>
                                    </div>
                                </div>



                                <!-- Doanh thu tuyến dưới -->
                                <div class="form-group row mt-4">
                                    <label class="control-label col-sm-3">
                                        <?= __('4 - Hoa hồng từ doanh thu Tuyến dưới') ?>
                                    </label>
                                    <label class="control-label col-sm-7">
                                        <?= __('Thành viên nhận hoa hồng từ doanh thu của các thành viên họ trực tiếp hoặc gián tiếp tuyển dụng vào hệ thống.') ?>
                                    </label>
                                    <div class="form-check form-switch col-sm-2">
                                        <input class="form-check-input update_all_settings" type="checkbox" <?= $market_vendor['bonus_from_sales_members'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="bonus_from_sales_members" data-setting_type="market_vendor">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 pt-2">
                                            <div>
                                                <?php
                                                $commission_type = array(
                                                    'percentage' => __('admin.percentage'),
                                                    'fixed'      => __('admin.fixed'),
                                                );
                                                ?>
                                                <select name="market_vendor[bonus_from_sales_members_type]" class="form-control bonus_from_sales_members_type">
                                                    <?php foreach ($commission_type as $key => $value) { ?>
                                                        <option <?= $market_vendor['bonus_from_sales_members_type'] == $key ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="toggle-container">
                                                <div class="percentage-value d-none">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="currency-symbol mt-2">
                                                                <?= $market_vendor['bonus_from_sales_members_type'] == 'percentage' ? '%' : $CurrencySymbol ?>
                                                            </div>
                                                            <input name="market_vendor[bonus_from_sales_members_value]" id="bonus_from_sales_members_value" class="form-control mt-2" value="<?php echo $market_vendor['bonus_from_sales_members_value']; ?>" type="number" placeholder='<?= __('admin.sale_commission') ?>'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $("select.bonus_from_sales_members_type").on("change", function() {
                                                $con = $(this).parents(".form-group");
                                                $con.find(
                                                    ".toggle-container .percentage-value, .toggle-container .default-value"
                                                ).addClass('d-none');
                                                if ($(this).val() == 'default') {
                                                    $con.find(".toggle-container .default-value").removeClass(
                                                        "d-none");
                                                } else {
                                                    $con.find(".toggle-container .percentage-value").removeClass(
                                                        "d-none");
                                                }

                                                if ($(this).val() == 'percentage')
                                                    $("input[name='market_vendor[bonus_from_sales_members_value]']")
                                                    .siblings('.currency-symbol').text('%');
                                                else
                                                    $("input[name='market_vendor[bonus_from_sales_members_value]']")
                                                    .siblings('.currency-symbol').text('<?= $CurrencySymbol ?>');
                                            })

                                            $("select.bonus_from_sales_members_type").trigger("change");
                                        </script>
                                    </div>
                                </div>


                                <!-- Doanh thu nhóm -->
                                <div class="form-group row mt-4">
                                    <label class="control-label col-sm-3">
                                        <?= __('5 - Hoa hồng từ doanh thu Nhóm') ?>
                                    </label>
                                    <label class="control-label col-sm-7">
                                        <?= __('Thành viên nhận hoa hồng dựa trên tổng doanh thu của cả nhóm do họ dẫn dắt, bao gồm của cá nhân họ và cả doanh thu của các tuyến dưới.') ?>
                                    </label>
                                    <div class="form-check form-switch col-sm-2">
                                        <input class="form-check-input update_all_settings" type="checkbox" <?= $market_vendor['bonus_from_sales_team'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="bonus_from_sales_team" data-setting_type="market_vendor">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 pt-2">
                                            <div>
                                                <?php
                                                $commission_type = array(
                                                    'percentage' => __('admin.percentage'),
                                                    'fixed'      => __('admin.fixed'),
                                                );
                                                ?>
                                                <select name="market_vendor[bonus_from_sales_team_type]" class="form-control bonus_from_sales_team_type">
                                                    <?php foreach ($commission_type as $key => $value) { ?>
                                                        <option <?= $market_vendor['bonus_from_sales_team_type'] == $key ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="toggle-container">
                                                <div class="percentage-value d-none">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="currency-symbol mt-2">
                                                                <?= $market_vendor['bonus_from_sales_team_type'] == 'percentage' ? '%' : $CurrencySymbol ?>
                                                            </div>
                                                            <input name="market_vendor[bonus_from_sales_team_value]" id="bonus_from_sales_team_value" class="form-control mt-2" value="<?php echo $market_vendor['bonus_from_sales_team_value']; ?>" type="number" placeholder='<?= __('admin.sale_commission') ?>'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $("select.bonus_from_sales_team_type").on("change", function() {
                                                $con = $(this).parents(".form-group");
                                                $con.find(
                                                    ".toggle-container .percentage-value, .toggle-container .default-value"
                                                ).addClass('d-none');
                                                if ($(this).val() == 'default') {
                                                    $con.find(".toggle-container .default-value").removeClass(
                                                        "d-none");
                                                } else {
                                                    $con.find(".toggle-container .percentage-value").removeClass(
                                                        "d-none");
                                                }

                                                if ($(this).val() == 'percentage')
                                                    $("input[name='market_vendor[bonus_from_sales_team_value]']").siblings(
                                                        '.currency-symbol').text('%');
                                                else
                                                    $("input[name='market_vendor[bonus_from_sales_team_value]']").siblings(
                                                        '.currency-symbol').text('<?= $CurrencySymbol ?>');
                                            })

                                            $("select.bonus_from_sales_team_type").trigger("change");
                                        </script>
                                    </div>
                                </div>

                                <!-- Doanh thu Nhánh -->
                                <div class="form-group row mt-4">
                                    <label class="control-label col-sm-3">
                                        <?= __('6 - Hoa hồng từ doanh thu Nhánh') ?>
                                    </label>
                                    <label class="control-label col-sm-7">
                                        <?= __('Thành viên nhận hoa hồng dựa trên tổng doanh thu của cả Nhánh họ tham gia tính từ Gốc') ?>
                                    </label>
                                    <div class="form-check form-switch col-sm-2">
                                        <input class="form-check-input update_all_settings" type="checkbox" <?= $market_vendor['bonus_from_sales_branch_members'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="bonus_from_sales_branch_members" data-setting_type="market_vendor">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 pt-2">
                                            <div>
                                                <?php
                                                $commission_type = array(
                                                    'percentage' => __('admin.percentage'),
                                                    'fixed'      => __('admin.fixed'),
                                                );
                                                ?>
                                                <select name="market_vendor[bonus_from_sales_branch_members_type]" class="form-control bonus_from_sales_branch_members_type">
                                                    <?php foreach ($commission_type as $key => $value) { ?>
                                                        <option <?= $market_vendor['bonus_from_sales_branch_members_type'] == $key ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="toggle-container">
                                                <div class="percentage-value d-none">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="currency-symbol mt-2">
                                                                <?= $market_vendor['bonus_from_sales_branch_members_type'] == 'percentage' ? '%' : $CurrencySymbol ?>
                                                            </div>
                                                            <input name="market_vendor[bonus_from_sales_branch_members_value]" id="bonus_from_sales_branch_members_value" class="form-control mt-2" value="<?php echo $market_vendor['bonus_from_sales_branch_members_value']; ?>" type="number" placeholder='<?= __('admin.sale_commission') ?>'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $("select.bonus_from_sales_branch_members_type").on("change", function() {
                                                $con = $(this).parents(".form-group");
                                                $con.find(
                                                    ".toggle-container .percentage-value, .toggle-container .default-value"
                                                ).addClass('d-none');
                                                if ($(this).val() == 'default') {
                                                    $con.find(".toggle-container .default-value").removeClass(
                                                        "d-none");
                                                } else {
                                                    $con.find(".toggle-container .percentage-value").removeClass(
                                                        "d-none");
                                                }

                                                if ($(this).val() == 'percentage')
                                                    $("input[name='market_vendor[bonus_from_sales_branch_members_value]']")
                                                    .siblings('.currency-symbol').text('%');
                                                else
                                                    $("input[name='market_vendor[bonus_from_sales_branch_members_value]']")
                                                    .siblings('.currency-symbol').text('<?= $CurrencySymbol ?>');
                                            })

                                            $("select.bonus_from_sales_branch_members_type").trigger("change");
                                        </script>
                                    </div>
                                </div>

                                <!-- Doanh thu gian hàng -->
                                <div class="form-group row mt-4">
                                    <label class="control-label col-sm-3">
                                        <?= __('7 - Hoa hồng từ doanh thu Gian hàng') ?>
                                    </label>
                                    <label class="control-label col-sm-7">
                                        <?= __('Thành viên nhận hoa hồng dựa trên tổng doanh thu của cả Gian hàng họ đang tham gia') ?>
                                    </label>
                                    <div class="form-check form-switch col-sm-2">
                                        <input class="form-check-input update_all_settings" type="checkbox" <?= $market_vendor['bonus_from_sales_shop'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="bonus_from_sales_shop" data-setting_type="market_vendor">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 pt-2">
                                            <div>
                                                <?php
                                                $commission_type = array(
                                                    'percentage' => __('admin.percentage'),
                                                    'fixed'      => __('admin.fixed'),
                                                );
                                                ?>
                                                <select name="market_vendor[bonus_from_sales_shop_type]" class="form-control bonus_from_sales_shop_type">
                                                    <?php foreach ($commission_type as $key => $value) { ?>
                                                        <option <?= $market_vendor['bonus_from_sales_shop_type'] == $key ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="toggle-container">
                                                <div class="percentage-value d-none">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="currency-symbol mt-2">
                                                                <?= $market_vendor['bonus_from_sales_shop_type'] == 'percentage' ? '%' : $CurrencySymbol ?>
                                                            </div>
                                                            <input name="market_vendor[bonus_from_sales_shop_value]" id="bonus_from_sales_shop_value" class="form-control mt-2" value="<?php echo $market_vendor['bonus_from_sales_shop_value']; ?>" type="number" placeholder='<?= __('admin.sale_commission') ?>'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tiêu dùng cá nhân -->
                                <div class="form-group row mt-4">
                                    <label class="control-label col-sm-3">
                                        <?= __('8 - Hoa hồng từ tiêu dùng Cá nhân') ?>
                                    </label>
                                    <label class="control-label col-sm-7">
                                        <?= __('Thành viên nhận hoa hồng dựa trên tiêu dùng từ việc mua sản phẩm hoặc dịch vụ của chính họ.') ?>
                                    </label>
                                    <div class="form-check form-switch col-sm-2">
                                        <input class="form-check-input update_all_settings" type="checkbox" <?= $market_vendor['bonus_from_consum_personal'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="bonus_from_consum_personal" data-setting_type="market_vendor">
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3 pt-2">
                                            <div>
                                                <?php
                                                $commission_type = array(
                                                    'percentage' => __('admin.percentage'),
                                                    'fixed'      => __('admin.fixed'),
                                                );
                                                ?>
                                                <select name="market_vendor[bonus_from_consum_personal_type]" class="form-control bonus_from_consum_personal_type">
                                                    <?php foreach ($commission_type as $key => $value) { ?>
                                                        <option <?= $market_vendor['bonus_from_consum_personal_type'] == $key ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="toggle-container">
                                                <div class="percentage-value d-none">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="currency-symbol mt-2">
                                                                <?= $market_vendor['admin_consum_commission_type'] == 'percentage' ? '%' : $CurrencySymbol ?>
                                                            </div>
                                                            <input name="market_vendor[bonus_from_consum_personal_value]" id="bonus_from_consum_personal_value" class="form-control mt-2" value="<?php echo $market_vendor['bonus_from_consum_personal_value']; ?>" type="number" placeholder='<?= __('admin.sale_commission') ?>'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <script type="text/javascript">
                                        $("select.bonus_from_consum_personal_type").on("change", function() {
                                            $con = $(this).parents(".form-group");
                                            $con.find(
                                                ".toggle-container .percentage-value, .toggle-container .default-value"
                                            ).addClass('d-none');
                                            if ($(this).val() == 'default') {
                                                $con.find(".toggle-container .default-value").removeClass("d-none");
                                            } else {
                                                $con.find(".toggle-container .percentage-value").removeClass(
                                                    "d-none");
                                            }

                                            if ($(this).val() == 'percentage')
                                                $("input[name='market_vendor[bonus_from_consum_personal_value]']")
                                                .siblings('.currency-symbol').text('%');
                                            else
                                                $("input[name='market_vendor[bonus_from_consum_personal_value]']")
                                                .siblings('.currency-symbol').text('<?= $CurrencySymbol ?>');
                                        })

                                        $("select.bonus_from_consum_personal_type").trigger("change");
                                    </script>

                                </div>

                                <!-- Tiêu dùng trực tiếp -->
                                <div class="form-group row mt-4">
                                    <label class="control-label col-sm-3">
                                        <?= __('9 - Hoa hồng từ tiêu dùng Trực tiếp') ?>
                                    </label>
                                    <label class="control-label col-sm-7">
                                        <?= __('Thành viên nhận hoa hồng từ tiêu dùng của các thành viên họ trực tiếp tuyển dụng vào hệ thống') ?>
                                    </label>
                                    <div class="form-check form-switch col-sm-2">
                                        <input class="form-check-input update_all_settings" type="checkbox" <?= $market_vendor['bonus_from_consum_direct_members'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="bonus_from_consum_direct_members" data-setting_type="market_vendor">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 pt-2">
                                            <div>
                                                <?php
                                                $commission_type = array(
                                                    'percentage' => __('admin.percentage'),
                                                    'fixed'      => __('admin.fixed'),
                                                );
                                                ?>
                                                <select name="market_vendor[bonus_from_consum_direct_members_type]" class="form-control bonus_from_consum_direct_members_type">
                                                    <?php foreach ($commission_type as $key => $value) { ?>
                                                        <option <?= $market_vendor['bonus_from_consum_direct_members_type'] == $key ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="toggle-container">
                                                <div class="percentage-value d-none">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="currency-symbol mt-2">
                                                                <?= $market_vendor['bonus_from_consum_direct_members_type'] == 'percentage' ? '%' : $CurrencySymbol ?>
                                                            </div>
                                                            <input name="market_vendor[bonus_from_consum_direct_members_value]" id="bonus_from_consum_direct_members_value" class="form-control mt-2" value="<?php echo $market_vendor['bonus_from_consum_direct_members_value']; ?>" type="number" placeholder='<?= __('Hoa hồng tiêu dùng') ?>'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $("select.bonus_from_consum_direct_members_type").on("change", function() {
                                                $con = $(this).parents(".form-group");
                                                $con.find(
                                                    ".toggle-container .percentage-value, .toggle-container .default-value"
                                                ).addClass('d-none');
                                                if ($(this).val() == 'default') {
                                                    $con.find(".toggle-container .default-value").removeClass(
                                                        "d-none");
                                                } else {
                                                    $con.find(".toggle-container .percentage-value").removeClass(
                                                        "d-none");
                                                }

                                                if ($(this).val() == 'percentage')
                                                    $(
                                                        "input[name='market_vendor[bonus_from_consum_direct_members_value]']"
                                                    )
                                                    .siblings('.currency-symbol').text('%');
                                                else
                                                    $(
                                                        "input[name='market_vendor[bonus_from_consum_direct_members_value]']"
                                                    )
                                                    .siblings('.currency-symbol').text('<?= $CurrencySymbol ?>');
                                            })

                                            $("select.bonus_from_consum_direct_members_type").trigger("change");
                                        </script>
                                    </div>
                                </div>

                                <!-- Tiêu dùng gián tiếp -->
                                <div class="form-group row mt-4">
                                    <label class="control-label col-sm-3">
                                        <?= __('10 - Hoa hồng từ tiêu dùng Gián tiếp') ?>
                                    </label>
                                    <label class="control-label col-sm-7">
                                        <?= __('Thành viên nhận hoa hồng từ tiêu dùng của các thành viên được Thành viên trực tiếp tuyển dụng và các thành viên được cấp dưới tuyển dụng vào hệ thống') ?>
                                    </label>
                                    <div class="form-check form-switch col-sm-2">
                                        <input class="form-check-input update_all_settings" type="checkbox" <?= $market_vendor['bonus_from_consum_indirect_members'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="bonus_from_consum_indirect_members" data-setting_type="market_vendor">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 pt-2">
                                            <div>
                                                <?php
                                                $commission_type = array(
                                                    'percentage' => __('admin.percentage'),
                                                    'fixed'      => __('admin.fixed'),
                                                );
                                                ?>
                                                <select name="market_vendor[bonus_from_consum_indirect_members_type]" class="form-control bonus_from_consum_indirect_members_type">
                                                    <?php foreach ($commission_type as $key => $value) { ?>
                                                        <option <?= $market_vendor['bonus_from_consum_indirect_members_type'] == $key ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="toggle-container">
                                                <div class="percentage-value d-none">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="currency-symbol mt-2">
                                                                <?= $market_vendor['bonus_from_consum_indirect_members_type'] == 'percentage' ? '%' : $CurrencySymbol ?>
                                                            </div>
                                                            <input name="market_vendor[bonus_from_consum_indirect_members_value1]" id="bonus_from_consum_indirect_members_value1" class="form-control mt-2" value="<?php echo $market_vendor['bonus_from_consum_indirect_members_value1']; ?>" type="number" placeholder='<?= __('Hoa hồng tiêu dùng') ?>'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $("select.bonus_from_consum_indirect_members_type").on("change", function() {
                                                $con = $(this).parents(".form-group");
                                                $con.find(
                                                    ".toggle-container .percentage-value, .toggle-container .default-value"
                                                ).addClass('d-none');
                                                if ($(this).val() == 'default') {
                                                    $con.find(".toggle-container .default-value").removeClass(
                                                        "d-none");
                                                } else {
                                                    $con.find(".toggle-container .percentage-value").removeClass(
                                                        "d-none");
                                                }

                                                if ($(this).val() == 'percentage')
                                                    $(
                                                        "input[name='market_vendor[bonus_from_consum_indirect_members_value]']"
                                                    )
                                                    .siblings('.currency-symbol').text('%');
                                                else
                                                    $(
                                                        "input[name='market_vendor[bonus_from_consum_indirect_members_value]']"
                                                    )
                                                    .siblings('.currency-symbol').text('<?= $CurrencySymbol ?>');
                                            })

                                            $("select.bonus_from_consum_indirect_members_type").trigger("change");
                                        </script>
                                    </div>
                                </div>

                                <!-- Tiêu dùng tuyến dưới -->
                                <div class="form-group row mt-4">
                                    <label class="control-label col-sm-3">
                                        <?= __('11 - Hoa hồng từ tiêu dùng Tuyến dưới') ?>
                                    </label>
                                    <label class="control-label col-sm-7">
                                        <?= __('Thành viên nhận hoa hồng từ tiêu dùng của các thành viên họ trực tiếp hoặc gián tiếp tuyển dụng vào hệ thống.') ?>
                                    </label>
                                    <div class="form-check form-switch col-sm-2">
                                        <input class="form-check-input update_all_settings" type="checkbox" <?= $market_vendor['bonus_from_consum_members'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="bonus_from_consum_members" data-setting_type="market_vendor">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 pt-2">
                                            <div>
                                                <?php
                                                $commission_type = array(
                                                    'percentage' => __('admin.percentage'),
                                                    'fixed'      => __('admin.fixed'),
                                                );
                                                ?>
                                                <select name="market_vendor[bonus_from_consum_members_type]" class="form-control bonus_from_consum_members_type">
                                                    <?php foreach ($commission_type as $key => $value) { ?>
                                                        <option <?= $market_vendor['bonus_from_consum_members_type'] == $key ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="toggle-container">
                                                <div class="percentage-value d-none">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="currency-symbol mt-2">
                                                                <?= $market_vendor['bonus_from_consum_members_type'] == 'percentage' ? '%' : $CurrencySymbol ?>
                                                            </div>
                                                            <input name="market_vendor[bonus_from_consum_members_value]" id="bonus_from_consum_members_value" class="form-control mt-2" value="<?php echo $market_vendor['bonus_from_consum_members_value']; ?>" type="number" placeholder='<?= __('Hoa hồng tiêu dùng') ?>'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $("select.bonus_from_consum_members_type").on("change", function() {
                                                $con = $(this).parents(".form-group");
                                                $con.find(
                                                    ".toggle-container .percentage-value, .toggle-container .default-value"
                                                ).addClass('d-none');
                                                if ($(this).val() == 'default') {
                                                    $con.find(".toggle-container .default-value").removeClass(
                                                        "d-none");
                                                } else {
                                                    $con.find(".toggle-container .percentage-value").removeClass(
                                                        "d-none");
                                                }

                                                if ($(this).val() == 'percentage')
                                                    $("input[name='market_vendor[bonus_from_consum_members_value]']")
                                                    .siblings('.currency-symbol').text('%');
                                                else
                                                    $("input[name='market_vendor[bonus_from_consum_members_value]']")
                                                    .siblings('.currency-symbol').text('<?= $CurrencySymbol ?>');
                                            })

                                            $("select.bonus_from_consum_members_type").trigger("change");
                                        </script>
                                    </div>
                                </div>

                                <!-- Tiêu dùng Nhóm -->
                                <div class="form-group row mt-4">
                                    <label class="control-label col-sm-3">
                                        <?= __('12 - Hoa hồng từ tiêu dùng Nhóm') ?>
                                    </label>
                                    <label class="control-label col-sm-7">
                                        <?= __('Thành viên nhận hoa hồng dựa trên tổng tiêu dùng của cả nhóm do họ dẫn dắt, bao gồm của cá nhân họ và cả doanh thu của các tuyến dưới.') ?>
                                    </label>
                                    <div class="form-check form-switch col-sm-2">
                                        <input class="form-check-input update_all_settings" type="checkbox" <?= $market_vendor['bonus_from_consum_team'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="bonus_from_consum_team" data-setting_type="market_vendor">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 pt-2">
                                            <div>
                                                <?php
                                                $commission_type = array(
                                                    'percentage' => __('admin.percentage'),
                                                    'fixed'      => __('admin.fixed'),
                                                );
                                                ?>
                                                <select name="market_vendor[bonus_from_consum_team_type]" class="form-control bonus_from_consum_team_type">
                                                    <?php foreach ($commission_type as $key => $value) { ?>
                                                        <option <?= $market_vendor['bonus_from_consum_team_type'] == $key ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="toggle-container">
                                                <div class="percentage-value d-none">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="currency-symbol mt-2">
                                                                <?= $market_vendor['bonus_from_consum_team_type'] == 'percentage' ? '%' : $CurrencySymbol ?>
                                                            </div>
                                                            <input name="market_vendor[bonus_from_consum_team_value]" id="bonus_from_consum_team_value" class="form-control mt-2" value="<?php echo $market_vendor['bonus_from_consum_team_value']; ?>" type="number" placeholder='<?= __('Hoa hồng tiêu dùng') ?>'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $("select.bonus_from_consum_team_type").on("change", function() {
                                                $con = $(this).parents(".form-group");
                                                $con.find(
                                                    ".toggle-container .percentage-value, .toggle-container .default-value"
                                                ).addClass('d-none');
                                                if ($(this).val() == 'default') {
                                                    $con.find(".toggle-container .default-value").removeClass(
                                                        "d-none");
                                                } else {
                                                    $con.find(".toggle-container .percentage-value").removeClass(
                                                        "d-none");
                                                }

                                                if ($(this).val() == 'percentage')
                                                    $("input[name='market_vendor[bonus_from_consum_team_value]']")
                                                    .siblings('.currency-symbol').text('%');
                                                else
                                                    $("input[name='market_vendor[bonus_from_consum_team_value]']")
                                                    .siblings('.currency-symbol').text('<?= $CurrencySymbol ?>');
                                            })

                                            $("select.bonus_from_consum_team_type").trigger("change");
                                        </script>
                                    </div>
                                </div>

                                <!-- Tiêu dùng Nhánh -->
                                <div class="form-group row mt-4">
                                    <label class="control-label col-sm-3">
                                        <?= __('13 - Hoa hồng từ tiêu dùng Nhánh') ?>
                                    </label>
                                    <label class="control-label col-sm-7">
                                        <?= __('Thành viên nhận hoa hồng dựa trên tổng tiêu dùng của cả Nhánh họ tham gia tính từ Gốc') ?>
                                    </label>
                                    <div class="form-check form-switch col-sm-2">
                                        <input class="form-check-input update_all_settings" type="checkbox" <?= $market_vendor['bonus_from_consum_branch_members'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="bonus_from_consum_branch_members" data-setting_type="market_vendor">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 pt-2">
                                            <div>
                                                <?php
                                                $commission_type = array(
                                                    'percentage' => __('admin.percentage'),
                                                    'fixed'      => __('admin.fixed'),
                                                );
                                                ?>
                                                <select name="market_vendor[bonus_from_consum_branch_members_type]" class="form-control bonus_from_consum_branch_members_type">
                                                    <?php foreach ($commission_type as $key => $value) { ?>
                                                        <option <?= $market_vendor['bonus_from_consum_branch_members_type'] == $key ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="toggle-container">
                                                <div class="percentage-value d-none">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="currency-symbol mt-2">
                                                                <?= $market_vendor['bonus_from_consum_branch_members_type'] == 'percentage' ? '%' : $CurrencySymbol ?>
                                                            </div>
                                                            <input name="market_vendor[bonus_from_consum_branch_members_value]" id="bonus_from_consum_branch_members_value" class="form-control mt-2" value="<?php echo $market_vendor['bonus_from_consum_branch_members_value']; ?>" type="number" placeholder='<?= __('admin.sale_commission') ?>'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $("select.bonus_from_consum_branch_members_type").on("change", function() {
                                                $con = $(this).parents(".form-group");
                                                $con.find(
                                                    ".toggle-container .percentage-value, .toggle-container .default-value"
                                                ).addClass('d-none');
                                                if ($(this).val() == 'default') {
                                                    $con.find(".toggle-container .default-value").removeClass(
                                                        "d-none");
                                                } else {
                                                    $con.find(".toggle-container .percentage-value").removeClass(
                                                        "d-none");
                                                }

                                                if ($(this).val() == 'percentage')
                                                    $(
                                                        "input[name='market_vendor[bonus_from_consum_branch_members_value]']"
                                                    )
                                                    .siblings('.currency-symbol').text('%');
                                                else
                                                    $(
                                                        "input[name='market_vendor[bonus_from_consum_branch_members_value]']"
                                                    )
                                                    .siblings('.currency-symbol').text('<?= $CurrencySymbol ?>');
                                            })

                                            $("select.bonus_from_consum_branch_members_type").trigger("change");
                                        </script>
                                    </div>
                                </div>

                                <script type="text/javascript">
                                    $("select.bonus_from_sales_shop_type").on("change", function() {
                                        $con = $(this).parents(".form-group");
                                        $con.find(
                                            ".toggle-container .percentage-value, .toggle-container .default-value"
                                        ).addClass('d-none');
                                        if ($(this).val() == 'default') {
                                            $con.find(".toggle-container .default-value").removeClass("d-none");
                                        } else {
                                            $con.find(".toggle-container .percentage-value").removeClass("d-none");
                                        }

                                        if ($(this).val() == 'percentage')
                                            $("input[name='market_vendor[bonus_from_sales_shop_value]']").siblings(
                                                '.currency-symbol').text('%');
                                        else
                                            $("input[name='market_vendor[bonus_from_sales_shop_value]']").siblings(
                                                '.currency-symbol').text('<?= $CurrencySymbol ?>');
                                    })

                                    $("select.bonus_from_sales_shop_type").trigger("change");
                                </script>
                            </div>
                        </div>


                        <div class="tab-pane py-3" id="bonus_recruitment_setting" role="tabpanel">
                            <div class="row">

                                <!-- Tuyển dụng trực tiếp -->
                                <div class="col-sm-6">
                                    <div class="card h-100">
                                        <div class="card-header bg-secondary text-white text-center">
                                            <h5><?= __('14 - Thưởng tuyển dụng trực tiếp cá nhân') ?>
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="control-label"><?= __('Kích hoạt') ?></label>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input update_all_settings" type="checkbox" <?= $market_vendor['bonus_recruitment_direct'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="bonus_recruitment_direct" data-setting_type="market_vendor">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('Số mời trực tiếp') ?></label>
                                                        <input class="form-control" name="market_vendor[bonus_recruitment_direct_number]" type="number" value="<?= isset($market_vendor) ? $market_vendor['bonus_recruitment_direct_number'] : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('Nguồn  trả thưởng') ?></label>
                                                        <select name="market_vendor[bonus_recruitment_direct_source]" class="form-control">
                                                            <option value=""><?= __('Chọn nguồn trả thưởng') ?></option>
                                                            <option <?= ($market_vendor['bonus_recruitment_direct_source'] == 'sales_personal') ? 'selected' : '' ?> value="sales_personal"><?= __('Doanh thu Cá nhân') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_direct_source'] == 'sales_direct') ? 'selected' : '' ?> value="sales_direct"><?= __('Doanh thu Trực tiếp') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_direct_source'] == 'sales_indirect') ? 'selected' : '' ?> value="sales_indirect"><?= __('Doanh thu Gián tiếp') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_direct_source'] == 'sales_members') ? 'selected' : '' ?> value="sales_members"><?= __('Doanh thu Tuyến dưới') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_direct_source'] == 'sales_shop') ? 'selected' : '' ?> value="sales_shop"><?= __('Doanh thu Chi nhánh') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_direct_source'] == 'sales_branch') ? 'selected' : '' ?> value="sales_branch"><?= __('Doanh thu Nhánh') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_direct_source'] == 'sales_team') ? 'selected' : '' ?> value="sales_team"><?= __('Doanh thu Nhóm') ?></option>
                                                            <option <?= ($market_vendor['bonus_recruitment_direct_source'] == 'consum_personal') ? 'selected' : '' ?> value="consum_personal"><?= __('Tiêu dùng Cá nhân') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_direct_source'] == 'consum_direct') ? 'selected' : '' ?> value="consum_direct"><?= __('Tiêu dùng Trực tiếp') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_direct_source'] == 'consum_indirect') ? 'selected' : '' ?> value="consum_indirect"><?= __('Tiêu dùng Gián tiếp') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_direct_source'] == 'consum_members') ? 'selected' : '' ?> value="consum_members"><?= __('Tiêu dùng Tuyến dưới') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_direct_source'] == 'consum_shop') ? 'selected' : '' ?> value="consum_shop"><?= __('Tiêu dùng Chi nhánh') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_direct_source]'] == 'consum_branch') ? 'selected' : '' ?> value="consum_branch"><?= __('Tiêu dùng Nhánh') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_direct_source]'] == 'consum_team') ? 'selected' : '' ?> value="consum_team"><?= __('Tiêu dùng Nhóm') ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('admin.commission_type') ?></label>
                                                        <select name="market_vendor[bonus_recruitment_direct_type]" class="form-control">
                                                            <option value="">
                                                                <?= __('admin.select_product_commission_type') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_direct_type'] == 'percentage') ? 'selected' : '' ?> value="percentage"><?= __('admin.percentage') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_direct_type'] == 'fixed') ? 'selected' : '' ?> value="fixed"><?= __('admin.fixed') ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            <?= __('Hoa hồng cho cá nhân') ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text currency-symbol">
                                                                    <?= ($market_vendor['bonus_recruitment_direct_type'] == 'percentage') ? '%'  : $CurrencySymbol ?>
                                                                </span>
                                                            </div>
                                                            <input class="form-control" name="market_vendor[bonus_recruitment_direct_value]" type="number" value="<?= isset($market_vendor) ? $market_vendor['bonus_recruitment_direct_value'] : '' ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script type="text/javascript">
                                                $("select.bonus_recruitment_direct_type").on("change", function() {
                                                    $con = $(this).parents(".form-group");
                                                    $con.find(
                                                        ".toggle-container .percentage-value, .toggle-container .default-value"
                                                    ).addClass('d-none');
                                                    if ($(this).val() == 'default') {
                                                        $con.find(".toggle-container .default-value").removeClass(
                                                            "d-none");
                                                    } else {
                                                        $con.find(".toggle-container .percentage-value")
                                                            .removeClass("d-none");
                                                    }

                                                    if ($(this).val() == 'percentage')
                                                        $("input[name='market_vendor[bonus_recruitment_direct_value]']")
                                                        .siblings('.currency-symbol').text('%');
                                                    else
                                                        $("input[name='market_vendor[bonus_recruitment_direct_value]']")
                                                        .siblings('.currency-symbol').text(
                                                            '<?= $CurrencySymbol ?>');
                                                })

                                                $("select.bonus_recruitment_direct_type").trigger("change");
                                            </script>

                                        </div>
                                    </div>
                                </div>

                                <!-- Tuyển dụng gián tiếp -->
                                <div class="col-sm-6">
                                    <div class="card h-100">
                                        <div class="card-header bg-secondary text-white text-center">
                                            <h5><?= __('15 - Thưởng tuyển dụng gián tiếp (tuyến dưới mời)') ?>
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="control-label"><?= __('Kích hoạt') ?></label>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input update_all_settings" type="checkbox" <?= $market_vendor['bonus_recruitment_indirect'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="bonus_recruitment_indirect" data-setting_type="market_vendor">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('Số mời gián tiếp') ?></label>
                                                        <input class="form-control" name="market_vendor[bonus_recruitment_indirect_number]" type="number" value="<?= isset($market_vendor) ? $market_vendor['bonus_recruitment_indirect_number'] : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('Nguồn  trả thưởng gián tiếp') ?></label>
                                                        <select name="market_vendor[bonus_recruitment_indirect_source]" class="form-control">
                                                            <option value=""><?= __('Chọn nguồn trả thưởng') ?></option>
                                                            <option <?= ($market_vendor['bonus_recruitment_indirect_source'] == 'sales_personal') ? 'selected' : '' ?> value="sales_personal"><?= __('Doanh thu Cá nhân') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_indirect_source'] == 'sales_direct') ? 'selected' : '' ?> value="sales_direct"><?= __('Doanh thu Trực tiếp') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_indirect_source'] == 'sales_indirect') ? 'selected' : '' ?> value="sales_indirect"><?= __('Doanh thu Gián tiếp') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_indirect_source'] == 'sales_members') ? 'selected' : '' ?> value="sales_members"><?= __('Doanh thu Tuyến dưới') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_indirect_source'] == 'sales_shop') ? 'selected' : '' ?> value="sales_shop"><?= __('Doanh thu Chi nhánh') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_indirect_source'] == 'sales_branch') ? 'selected' : '' ?> value="sales_branch"><?= __('Doanh thu Nhánh') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_indirect_source'] == 'sales_team') ? 'selected' : '' ?> value="sales_team"><?= __('Doanh thu Nhóm') ?></option>
                                                            <option <?= ($market_vendor['bonus_recruitment_indirect_source'] == 'consum_personal') ? 'selected' : '' ?> value="consum_personal"><?= __('Tiêu dùng Cá nhân') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_indirect_source'] == 'consum_direct') ? 'selected' : '' ?> value="consum_direct"><?= __('Tiêu dùng Trực tiếp') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_indirect_source'] == 'consum_indirect') ? 'selected' : '' ?> value="consum_indirect"><?= __('Tiêu dùng Gián tiếp') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_indirect_source'] == 'consum_members') ? 'selected' : '' ?> value="consum_members"><?= __('Tiêu dùng Tuyến dưới') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_indirect_source'] == 'consum_shop') ? 'selected' : '' ?> value="consum_shop"><?= __('Tiêu dùng Chi nhánh') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_indirect_source'] == 'consum_branch') ? 'selected' : '' ?> value="consum_branch"><?= __('Tiêu dùng Nhánh') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_indirect_source'] == 'consum_team') ? 'selected' : '' ?> value="consum_team"><?= __('Tiêu dùng Nhóm') ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('admin.commission_type') ?></label>
                                                        <select name="market_vendor[bonus_recruitment_indirect_type]" class="form-control">
                                                            <option value="">
                                                                <?= __('admin.select_product_commission_type') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_indirect_type'] == 'percentage') ? 'selected' : '' ?> value="percentage"><?= __('admin.percentage') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_indirect_type'] == 'fixed') ? 'selected' : '' ?> value="fixed"><?= __('admin.fixed') ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            <?= __('Hoa hồng hưởng') ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text currency-symbol">
                                                                    <?= ($market_vendor['bonus_recruitment_indirect_type'] == 'percentage') ? '%'  : $CurrencySymbol ?>
                                                                </span>
                                                            </div>
                                                            <input class="form-control" name="market_vendor[bonus_recruitment_indirect_value]" type="number" value="<?= isset($market_vendor) ? $market_vendor['bonus_recruitment_indirect_value'] : '' ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <script type="text/javascript">
                                                $("select.bonus_recruitment_indirect_type").on("change", function() {
                                                    $con = $(this).parents(".form-group");
                                                    $con.find(
                                                        ".toggle-container .percentage-value, .toggle-container .default-value"
                                                    ).addClass('d-none');
                                                    if ($(this).val() == 'default') {
                                                        $con.find(".toggle-container .default-value").removeClass(
                                                            "d-none");
                                                    } else {
                                                        $con.find(".toggle-container .percentage-value")
                                                            .removeClass("d-none");
                                                    }

                                                    if ($(this).val() == 'percentage')
                                                        $("input[name='market_vendor[bonus_recruitment_direct_value]']")
                                                        .siblings('.currency-symbol').text('%');
                                                    else
                                                        $("input[name='market_vendor[bonus_recruitment_direct_value]']")
                                                        .siblings('.currency-symbol').text(
                                                            '<?= $CurrencySymbol ?>');
                                                })

                                                $("select.bonus_recruitment_indirect_type").trigger("change");
                                            </script>

                                        </div>
                                    </div>
                                </div>

                                <!-- Tuyển dụng gián tiếp + trực tiếp -->
                                <div class="col-sm-12 mt-3">
                                    <div class="card h-100">
                                        <div class="card-header bg-secondary text-white text-center">
                                            <h5><?= __('16 - Thưởng tuyển dụng tuyến dưới trực tiếp + gián tiếp') ?>
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="control-label"><?= __('Kích hoạt') ?></label>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input update_all_settings" type="checkbox" <?= $market_vendor['bonus_recruitment_downline'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="bonus_recruitment_downline" data-setting_type="market_vendor">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('Số tuyến dưới mời vào') ?></label>
                                                        <input class="form-control" name="market_vendor[bonus_recruitment_downline_number]" type="number" value="<?= isset($market_vendor) ? $market_vendor['bonus_recruitment_downline_number'] : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('Nguồn  trả thưởng tuyển tuyến dưới') ?></label>
                                                        <select name="market_vendor[bonus_recruitment_downline_source]" class="form-control">
                                                            <option value=""><?= __('Chọn nguồn trả thưởng') ?></option>
                                                            <option <?= ($market_vendor['bonus_recruitment_downline_source'] == 'sales_personal') ? 'selected' : '' ?> value="sales_personal"><?= __('Doanh thu Cá nhân') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_downline_source'] == 'sales_direct') ? 'selected' : '' ?> value="sales_direct"><?= __('Doanh thu Trực tiếp') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_downline_source'] == 'sales_indirect') ? 'selected' : '' ?> value="sales_indirect"><?= __('Doanh thu Gián tiếp') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_downline_source'] == 'sales_members') ? 'selected' : '' ?> value="sales_members"><?= __('Doanh thu Tuyến dưới') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_downline_source'] == 'sales_shop') ? 'selected' : '' ?> value="sales_shop"><?= __('Doanh thu Chi nhánh') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_downline_source'] == 'sales_branch') ? 'selected' : '' ?> value="sales_branch"><?= __('Doanh thu Nhánh') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_downline_source'] == 'sales_team') ? 'selected' : '' ?> value="sales_team"><?= __('Doanh thu Nhóm') ?></option>
                                                            <option <?= ($market_vendor['bonus_recruitment_downline_source'] == 'consum_personal') ? 'selected' : '' ?> value="consum_personal"><?= __('Tiêu dùng Cá nhân') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_downline_source'] == 'consum_direct') ? 'selected' : '' ?> value="consum_direct"><?= __('Tiêu dùng Trực tiếp') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_downline_source'] == 'consum_indirect') ? 'selected' : '' ?> value="consum_indirect"><?= __('Tiêu dùng Gián tiếp') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_downline_source'] == 'consum_members') ? 'selected' : '' ?> value="consum_members"><?= __('Tiêu dùng Tuyến dưới') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_downline_source'] == 'consum_shop') ? 'selected' : '' ?> value="consum_shop"><?= __('Tiêu dùng Chi nhánh') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_downline_source'] == 'consum_branch') ? 'selected' : '' ?> value="consum_branch"><?= __('Tiêu dùng Nhánh') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_downline_source'] == 'consum_team') ? 'selected' : '' ?> value="consum_team"><?= __('Tiêu dùng Nhóm') ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('admin.commission_type') ?></label>
                                                        <select name="market_vendor[bonus_recruitment_downline_type]" class="form-control">
                                                            <option value="">
                                                                <?= __('admin.select_product_commission_type') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_downline_type'] == 'percentage') ? 'selected' : '' ?> value="percentage"><?= __('admin.percentage') ?>
                                                            </option>
                                                            <option <?= ($market_vendor['bonus_recruitment_downline_type'] == 'fixed') ? 'selected' : '' ?> value="fixed"><?= __('admin.fixed') ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            <?= __('Hoa hồng hưởng') ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text currency-symbol">
                                                                    <?= ($market_vendor['bonus_recruitment_downline_type'] == 'percentage') ? '%'  : $CurrencySymbol ?>
                                                                </span>
                                                            </div>
                                                            <input class="form-control" name="market_vendor[bonus_recruitment_downline_value]" type="number" value="<?= isset($market_vendor) ? $market_vendor['bonus_recruitment_downline_value'] : '' ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script type="text/javascript">
                                                $("select.bonus_recruitment_downline_type").on("change", function() {
                                                    $con = $(this).parents(".form-group");
                                                    $con.find(
                                                        ".toggle-container .percentage-value, .toggle-container .default-value"
                                                    ).addClass('d-none');
                                                    if ($(this).val() == 'default') {
                                                        $con.find(".toggle-container .default-value").removeClass(
                                                            "d-none");
                                                    } else {
                                                        $con.find(".toggle-container .percentage-value")
                                                            .removeClass("d-none");
                                                    }

                                                    if ($(this).val() == 'percentage')
                                                        $("input[name='market_vendor[bonus_recruitment_downline_value]']")
                                                        .siblings('.currency-symbol').text('%');
                                                    else
                                                        $("input[name='market_vendor[bonus_recruitment_downline_value]']")
                                                        .siblings('.currency-symbol').text(
                                                            '<?= $CurrencySymbol ?>');
                                                })

                                                $("select.bonus_recruitment_downline_type").trigger("change");
                                            </script>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane pt-3" id="vendor_setting">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="control-label"><?= __('Thưởng tuyển dụng cá nhân'); ?></label>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <div class="form-group">
                                                        <div class="input-group mt-2">
                                                            <div class="input-group-prepend"><span class="input-group-text">
                                                                    <?= __('Số thành viên trực tiếp mời'); ?></span>
                                                            </div>
                                                            <input name="market_vendor[bonus_from_recruitment_direct_number]" class="form-control" value="<?php echo $market_vendor['bonus_from_recruitment_direct_number']; ?>" type="text" placeholder='<?= __('admin.clicks'); ?>'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="currency-symbol mt-2"><?= $CurrencySymbol ?>
                                                            </div>
                                                            <input name="market_vendor[bonus_from_recruitment_direct_value]" class="form-control mt-2" value="<?php echo c_format($market_vendor['bonus_from_recruitment_direct_value'], false); ?>" type="number" placeholder='<?= __('admin.amount'); ?>'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('Kích hoạt') ?></label>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input update_all_settings" type="checkbox" <?= $market_vendor['admin_click_status'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="bonus_from_recruitment_direct" data-setting_type="market_vendor">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <label class="control-label mt-2"><?= __('Được thưởng'); ?></label>
                                            <div class="row">
                                                <div class="col-sm-5 pt-2">
                                                    <div>
                                                        <?php
                                                        $commission_type = array(
                                                            'percentage' => __('admin.percentage'),
                                                            'fixed'      => __('admin.fixed'),
                                                        );
                                                        ?>
                                                        <select name="market_vendor[bonus_from_recruitment_direct_type]" class="form-control bonus_from_recruitment_direct_type">
                                                            <?php foreach ($commission_type as $key => $value) { ?>
                                                                <option <?= $market_vendor['bonus_from_recruitment_direct_type'] == $key ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="toggle-container">
                                                        <div class="percentage-value d-none">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="currency-symbol mt-2">
                                                                        <?= $market_vendor['bonus_from_recruitment_direct_type'] == 'percentage' ? '%' : $CurrencySymbol ?>
                                                                    </div>
                                                                    <input name="market_vendor[bonus_from_recruitment_direct_value]" id="bonus_from_recruitment_direct_value" class="form-control mt-2" value="<?php echo $market_vendor['bonus_from_recruitment_direct_value']; ?>" type="number" placeholder='<?= __('admin.sale_commission') ?>'>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <script type="text/javascript">
                                                $("select.bonus_from_recruitment_direct_type").on("change", function() {
                                                    $con = $(this).parents(".form-group");
                                                    $con.find(
                                                        ".toggle-container .percentage-value, .toggle-container .default-value"
                                                    ).addClass('d-none');
                                                    if ($(this).val() == 'default') {
                                                        $con.find(".toggle-container .default-value").removeClass(
                                                            "d-none");
                                                    } else {
                                                        $con.find(".toggle-container .percentage-value")
                                                            .removeClass("d-none");
                                                    }

                                                    if ($(this).val() == 'percentage')
                                                        $(
                                                            "input[name='market_vendor[bonus_from_recruitment_direct_value]']"
                                                        )
                                                        .siblings('.currency-symbol').text('%');
                                                    else
                                                        $(
                                                            "input[name='market_vendor[bonus_from_recruitment_direct_value]']"
                                                        )
                                                        .siblings('.currency-symbol').text(
                                                            '<?= $CurrencySymbol ?>');
                                                })

                                                $("select.bonus_from_recruitment_direct_type").trigger("change");
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="control-label"><?= __('Thưởng tuyển dụng gián tiếp'); ?></label>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <div class="form-group">
                                                        <div class="input-group mt-2">
                                                            <div class="input-group-prepend"><span class="input-group-text">
                                                                    <?= __('Số thành viên gián tiếp mời'); ?></span>
                                                            </div>
                                                            <input name="market_vendor[admin_click_count]" class="form-control" value="<?php echo $market_vendor['admin_click_count']; ?>" type="text" placeholder='<?= __('admin.clicks'); ?>'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="currency-symbol mt-2"><?= $CurrencySymbol ?>
                                                            </div>
                                                            <input name="market_vendor[admin_click_amount]" class="form-control mt-2" value="<?php echo c_format($market_vendor['admin_click_amount'], false); ?>" type="number" placeholder='<?= __('admin.amount'); ?>'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('Kích hoạt') ?></label>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input update_all_settings" type="checkbox" <?= $market_vendor['admin_click_status'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="admin_click_status" data-setting_type="market_vendor">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <label class="control-label mt-2"><?= __('Được thưởng'); ?></label>
                                            <div class="row">
                                                <div class="col-sm-5 pt-2">
                                                    <div>
                                                        <?php
                                                        $commission_type = array(
                                                            'percentage' => __('admin.percentage'),
                                                            'fixed'      => __('admin.fixed'),
                                                        );
                                                        ?>
                                                        <select name="market_vendor[admin_sale_commission_type]" class="form-control admin_sale_commission_type">
                                                            <?php foreach ($commission_type as $key => $value) { ?>
                                                                <option <?= $market_vendor['admin_sale_commission_type'] == $key ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="toggle-container">
                                                        <div class="percentage-value d-none">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="currency-symbol mt-2">
                                                                        <?= $market_vendor['admin_sale_commission_type'] == 'percentage' ? '%' : $CurrencySymbol ?>
                                                                    </div>
                                                                    <input name="market_vendor[admin_commission_value]" id="admin_commission_value" class="form-control mt-2" value="<?php echo $market_vendor['admin_commission_value']; ?>" type="number" placeholder='<?= __('admin.sale_commission') ?>'>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <script type="text/javascript">
                                                $("select.admin_sale_commission_type").on("change", function() {
                                                    $con = $(this).parents(".form-group");
                                                    $con.find(
                                                        ".toggle-container .percentage-value, .toggle-container .default-value"
                                                    ).addClass('d-none');
                                                    if ($(this).val() == 'default') {
                                                        $con.find(".toggle-container .default-value").removeClass(
                                                            "d-none");
                                                    } else {
                                                        $con.find(".toggle-container .percentage-value")
                                                            .removeClass("d-none");
                                                    }

                                                    if ($(this).val() == 'percentage')
                                                        $("input[name='market_vendor[admin_commission_value]']").siblings(
                                                            '.currency-symbol').text('%');
                                                    else
                                                        $("input[name='market_vendor[admin_commission_value]']").siblings(
                                                            '.currency-symbol').text('<?= $CurrencySymbol ?>');
                                                })

                                                $("select.admin_sale_commission_type").trigger("change");
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="control-label"><?= __('Thưởng tuyển dụng nhóm (cá nhân + gián tiếp)'); ?></label>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <div class="form-group">
                                                        <div class="input-group mt-2">
                                                            <div class="input-group-prepend"><span class="input-group-text">
                                                                    <?= __('Số thành viên trực tiếp mời'); ?></span>
                                                            </div>
                                                            <input name="market_vendor[admin_click_count]" class="form-control" value="<?php echo $market_vendor['admin_click_count']; ?>" type="text" placeholder='<?= __('admin.clicks'); ?>'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="currency-symbol mt-2"><?= $CurrencySymbol ?>
                                                            </div>
                                                            <input name="market_vendor[admin_click_amount]" class="form-control mt-2" value="<?php echo c_format($market_vendor['admin_click_amount'], false); ?>" type="number" placeholder='<?= __('admin.amount'); ?>'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('Kích hoạt') ?></label>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input update_all_settings" type="checkbox" <?= $market_vendor['admin_click_status'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="admin_click_status" data-setting_type="market_vendor">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <label class="control-label mt-2"><?= __('Được thưởng'); ?></label>
                                            <div class="row">
                                                <div class="col-sm-5 pt-2">
                                                    <div>
                                                        <?php
                                                        $commission_type = array(
                                                            'percentage' => __('admin.percentage'),
                                                            'fixed'      => __('admin.fixed'),
                                                        );
                                                        ?>
                                                        <select name="market_vendor[admin_sale_commission_type]" class="form-control admin_sale_commission_type">
                                                            <?php foreach ($commission_type as $key => $value) { ?>
                                                                <option <?= $market_vendor['admin_sale_commission_type'] == $key ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="toggle-container">
                                                        <div class="percentage-value d-none">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="currency-symbol mt-2">
                                                                        <?= $market_vendor['admin_sale_commission_type'] == 'percentage' ? '%' : $CurrencySymbol ?>
                                                                    </div>
                                                                    <input name="market_vendor[admin_commission_value]" id="admin_commission_value" class="form-control mt-2" value="<?php echo $market_vendor['admin_commission_value']; ?>" type="number" placeholder='<?= __('admin.sale_commission') ?>'>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <script type="text/javascript">
                                                $("select.admin_sale_commission_type").on("change", function() {
                                                    $con = $(this).parents(".form-group");
                                                    $con.find(
                                                        ".toggle-container .percentage-value, .toggle-container .default-value"
                                                    ).addClass('d-none');
                                                    if ($(this).val() == 'default') {
                                                        $con.find(".toggle-container .default-value").removeClass(
                                                            "d-none");
                                                    } else {
                                                        $con.find(".toggle-container .percentage-value")
                                                            .removeClass("d-none");
                                                    }

                                                    if ($(this).val() == 'percentage')
                                                        $("input[name='market_vendor[admin_commission_value]']").siblings(
                                                            '.currency-symbol').text('%');
                                                    else
                                                        $("input[name='market_vendor[admin_commission_value]']").siblings(
                                                            '.currency-symbol').text('<?= $CurrencySymbol ?>');
                                                })

                                                $("select.admin_sale_commission_type").trigger("change");
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div role="tabpanel" class="tab-pane py-3" id="bonus_rank_setting">
                            <div class="form-group">

                                <h6>
                                    <div class="mybadge bg-info text-white mb-2 text-wrap rounded px-2 py-1 vendor-deposit-on-message <?= ($market_vendor['bonus_up_rank']) ? '' : 'd-none' ?>">
                                        <?= __('17 - Thưởng lên cấp đang được Áp dụng. Cài đặt chi tiết về % thưởng mỗi khi lên cấp vào phần Nhảy cấp cài đặt.') ?>
                                        <p class="mt-3"><a class="btn btn-secondary" href="<?= base_url('admincontrol/award_level'); ?>">Cài đặt nhảy cấp ở
                                                đây</a></p>
                                    </div>
                                </h6>

                                <h6>
                                    <div class="mybadge bg-danger text-white rounded mb-2 text-wrap px-2 py-1 vendor-deposit-off-message <?= ($market_vendor['bonus_up_rank']) ? 'd-none' : '' ?>">
                                        <?= __('Thưởng lên cấp đang không được Áp dụng. Muốn hoa hồng thưởng cho mỗi khi lên cấp kích hoạt lên') ?>
                                    </div>
                                </h6>

                                <label class="control-label">
                                    <?= __('Kích hoạt') ?>
                                </label>
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="form-check form-switch">
                                            <input class="form-check-input update_all_settings" type="checkbox" <?= $market_vendor['bonus_up_rank'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="bonus_up_rank" data-setting_type="market_vendor">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label"><?= __('Nguồn  trả thưởng lên cấp') ?></label>
                                            <select name="market_vendor[bonus_up_rank_source]" class="form-control">
                                                <option value=""><?= __('Chọn nguồn trả thưởng') ?></option>
                                                <option <?= ($market_vendor['bonus_up_rank_source'] == 'sales_personal') ? 'selected' : '' ?> value="sales_personal"><?= __('Doanh thu Cá nhân') ?></option>
                                                <option <?= ($market_vendor['bonus_up_rank_source'] == 'sales_direct') ? 'selected' : '' ?> value="sales_direct"><?= __('Doanh thu Trực tiếp') ?></option>
                                                <option <?= ($market_vendor['bonus_up_rank_source'] == 'sales_indirect') ? 'selected' : '' ?> value="sales_indirect"><?= __('Doanh thu Gián tiếp') ?></option>
                                                <option <?= ($market_vendor['bonus_up_rank_source'] == 'sales_members') ? 'selected' : '' ?> value="sales_members"><?= __('Doanh thu Tuyến dưới') ?></option>
                                                <option <?= ($market_vendor['bonus_up_rank_source'] == 'sales_shop') ? 'selected' : '' ?> value="sales_shop"><?= __('Doanh thu Chi nhánh') ?></option>
                                                <option <?= ($market_vendor['bonus_up_rank_source'] == 'sales_branch') ? 'selected' : '' ?> value="sales_branch"><?= __('Doanh thu Nhánh') ?></option>
                                                <option <?= ($market_vendor['bonus_up_rank_source'] == 'sales_team') ? 'selected' : '' ?> value="sales_team"><?= __('Doanh thu Nhóm') ?></option>
                                                <option <?= ($market_vendor['bonus_up_rank_source'] == 'consum_personal') ? 'selected' : '' ?> value="consum_personal"><?= __('Tiêu dùng Cá nhân') ?></option>
                                                <option <?= ($market_vendor['bonus_up_rank_source'] == 'consum_direct') ? 'selected' : '' ?> value="consum_direct"><?= __('Tiêu dùng Trực tiếp') ?></option>
                                                <option <?= ($market_vendor['bonus_up_rank_source'] == 'consum_indirect') ? 'selected' : '' ?> value="consum_indirect"><?= __('Tiêu dùng Gián tiếp') ?></option>
                                                <option <?= ($market_vendor['bonus_up_rank_source'] == 'consum_members') ? 'selected' : '' ?> value="consum_members"><?= __('Tiêu dùng Tuyến dưới') ?></option>
                                                <option <?= ($market_vendor['bonus_up_rank_source'] == 'consum_shop') ? 'selected' : '' ?> value="consum_shop"><?= __('Tiêu dùng Chi nhánh') ?></option>
                                                <option <?= ($market_vendor['bonus_up_rank_source'] == 'consum_branch') ? 'selected' : '' ?> value="consum_branch"><?= __('Tiêu dùng Nhánh') ?></option>
                                                <option <?= ($market_vendor['bonus_up_rank_source'] == 'consum_team') ? 'selected' : '' ?> value="consum_team"><?= __('Tiêu dùng Nhóm') ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-sm btn-primary btn-submit"><?= __('admin.save_settings') ?></button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>
</div>

<script type="text/javascript">
    $("select[name='market_vendor[commission_type]']").on('change', function() {
        if ($(this).val() == 'percentage')
            $("input[name='market_vendor[commission_sale]']").siblings('.input-group-prepend').find(
                '.input-group-text').text('%');
        else
            $("input[name='market_vendor[commission_sale]']").siblings('.input-group-prepend').find(
                '.input-group-text').text('<?= $CurrencySymbol ?>');
    })

    $("#setting-form").on('submit', function() {
        $("#setting-form .alert-error").remove();
        var affiliate_cookie = parseInt($(".input-affiliate_cookie").val());
        if (affiliate_cookie <= 0 || affiliate_cookie > 365) {
            $(".input-affiliate_cookie").after(
                "<div class='alert alert-danger alert-error'><?= __('admin.days_between_1_and_365'); ?></div>");
        }
        if ($("#setting-form .alert-error").length == 0) return true;
        return false;
    })

    $(".btn-submit").on('click', function(evt) {
        evt.preventDefault();
        var formData = new FormData($("#setting-form")[0]);

        $(".btn-submit").btn("loading");
        formData = formDataFilter(formData);
        $this = $("#setting-form");

        $.ajax({
            type: 'POST',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function(result) {
                $(".btn-submit").btn("reset");
                $(".alert-dismissable").remove();

                $this.find(".has-error").removeClass("has-error");
                $this.find("span.text-danger").remove();

                if (result['location']) {
                    window.location = result['location'];
                }

                if (result['success']) {
                    showPrintMessage(result['success'], 'success');
                    var body = $("html, body");
                    body.stop().animate({
                        scrollTop: 0
                    }, 500, 'swing', function() {});
                }

                if (result['errors']) {
                    $.each(result['errors'], function(i, j) {
                        $ele = $this.find('[name="' + i + '"]');
                        if ($ele) {
                            $ele.parents(".form-group").addClass("has-error");
                            $ele.after("<span class='d-block text-danger'>" + j + "</span>");
                        }
                    });
                }
            },
        })
        return false;
    });

    $('.update_all_settings').on('change', function() {

        var checked = $(this).prop('checked');
        var setting_key = $(this).data('setting_key');
        var setting_type = $(this).data('setting_type');

        if (setting_key == 'depositstatus') {
            $('.mybadge').addClass('d-none');

            if (checked == true) {
                $('.vendor-deposit-on-message').removeClass('d-none');
            } else {
                $('.vendor-deposit-off-message').removeClass('d-none');
            }
        }

        if (checked == true) {
            var status = 1;
        } else {
            var status = 0;
        }

        $.ajax({
            url: '<?= base_url("admincontrol/update_all_settings") ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                'action': 'update_all_settings',
                status: status,
                setting_key: setting_key,
                setting_type: setting_type
            },
            success: function(json) {},
        })
    });
</script>