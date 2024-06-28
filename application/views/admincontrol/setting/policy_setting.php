<div class="card saas-settings">
    <div class="card-header bg-secondary text-white">
        <h5><?= __('Chính sách trả Thưởng') ?></h5>
    </div>
    <div class="card-body">
        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data" id="setting-form">
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills flex-column flex-sm-row" id="TabsNav">
                        <li class="nav-item flex-sm-fill text-sm-center">
                            <a class="nav-link active bg-secondary show" data-bs-toggle="tab" href="#market_vendor-setting" role="tab"><?= __('Thưởng Duy Trì') ?></a>
                        </li>
                        <li class="nav-item flex-sm-fill text-sm-center">
                            <a class="nav-link" href="#vendor_setting" role="tab" data-bs-toggle="tab"><?= __('Thưởng Nhóm - Hệ Thống') ?></a>
                        </li>
                        <li class="nav-item flex-sm-fill text-sm-center">
                            <a class="nav-link" href="#vendor_deposite_setting" role="tab" data-bs-toggle="tab"><?= __('Thưởng Đồng Chia') ?></a>
                        </li>
                        <li class="nav-item flex-sm-fill text-sm-center">
                            <a class="nav-link" href="#vendor_permission_setting" role="tab" data-bs-toggle="tab"><?= __('Chính Sách Khác') ?></a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-12">
                    <div class="tab-content">
                        <div class="tab-pane py-3 active show" id="market_vendor-setting" role="tabpanel">
                            <div class="form-group">
                                <label class="control-label"><?= __('Kích hoạt') ?></label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input update_all_settings" type="checkbox" <?= $market_vendor['marketvendorstatus'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="marketvendorstatus" data-setting_type="market_vendor">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card h-100">
                                        <div class="card-header bg-secondary text-white text-center">
                                            <h5><?= __('Chính sách thưởng duy trì Doanh số - Tuyển dụng') ?>
                                            </h5>
                                        </div>

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            <?= __('Duy trì theo tháng') ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text currency-symbol">#</span>
                                                            </div>
                                                            <input class="form-control" name="market_vendor[commission_sale]" type="number" value="<?= isset($market_vendor) ? $market_vendor['commission_sale'] : '' ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            <?= __('Duy trì theo ngày') ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text currency-symbol">#</span>
                                                            </div>
                                                            <input class="form-control" name="market_vendor[commission_sale]" type="number" value="<?= isset($market_vendor) ? $market_vendor['commission_sale'] : '' ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 py-3">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('Điều kiện doanh thu') ?></label>
                                                        <select name="market_vendor[commission_type]" class="form-control">
                                                            <option value=""><?= __('Chọn loại doanh thu') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'percentage') ? 'selected' : '' ?> value="percentage"><?= __('Doanh thu Cá nhân') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'fixed') ? 'selected' : '' ?> value="fixed"><?= __('Doanh thu Trực tiếp') ?></option>
                                                            <option value=""><?= __('Doanh thu Gián tiếp') ?></option>
                                                            <option value=""><?= __('Doanh thu tuyến Dưới') ?></option>
                                                            <option value=""><?= __('Doanh thu Nhóm') ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 py-3">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            <?= __('Mục tiêu') ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text currency-symbol">
                                                                    <?= ($market_vendor['commission_type'] == 'percentage') ? '%'  : $CurrencySymbol ?>
                                                                </span>
                                                            </div>
                                                            <input class="form-control" name="market_vendor[commission_sale]" type="number" value="<?= isset($market_vendor) ? $market_vendor['commission_sale'] : '' ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 py-3">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('Điều kiện tuyển dụng') ?></label>
                                                        <select name="market_vendor[commission_type]" class="form-control">
                                                            <option value=""><?= __('Chọn loại tuyển dụng') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'percentage') ? 'selected' : '' ?> value="percentage"><?= __('Tuyển trực tiếp') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'fixed') ? 'selected' : '' ?> value="fixed"><?= __('Tuyển gián tiếp') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'fixed') ? 'selected' : '' ?> value="fixed"><?= __('Tuyển tuyến dưới') ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 py-3">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            <?= __('Số lượng mục tiêu') ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text currency-symbol">#</span>
                                                            </div>
                                                            <input class="form-control" name="market_vendor[commission_sale]" type="number" value="<?= isset($market_vendor) ? $market_vendor['commission_sale'] : '' ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 py-3">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('Loại Hoa hồng') ?></label>
                                                        <select name="market_vendor[commission_type]" class="form-control">
                                                            <option value=""><?= __('Chọn loại Hoa hồng') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'percentage') ? 'selected' : '' ?> value="percentage"><?= __('admin.percentage') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'fixed') ? 'selected' : '' ?> value="fixed"><?= __('admin.fixed') ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 py-3">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            <?= __('Thưởng Hoa hồng') ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text currency-symbol">
                                                                    <?= ($market_vendor['commission_type'] == 'percentage') ? '%'  : $CurrencySymbol ?>
                                                                </span>
                                                            </div>
                                                            <input class="form-control" name="market_vendor[commission_sale]" type="number" value="<?= isset($market_vendor) ? $market_vendor['commission_sale'] : '' ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane py-3" id="vendor_setting">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label"><?= __('Kích hoạt') ?></label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input update_all_settings" type="checkbox" <?= $vendor['storestatus'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="storestatus" data-setting_type="vendor">
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header bg-secondary text-white text-center">
                                            <h5 class="text-center">
                                                <?= __('Chính sách Thưởng Doanh Thu Nhóm') ?></h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6 py-2">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('Điều kiện hưởng doanh thu') ?></label>
                                                        <select name="market_vendor[commission_type]" class="form-control">
                                                            <option value=""><?= __('Chọn loại doanh thu') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'percentage') ? 'selected' : '' ?> value="percentage"><?= __('Doanh thu Cá nhân') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'fixed') ? 'selected' : '' ?> value="fixed"><?= __('Doanh thu Trực tiếp') ?></option>
                                                            <option value=""><?= __('Doanh thu Gián tiếp') ?></option>
                                                            <option value=""><?= __('Doanh thu tuyến Dưới') ?></option>
                                                            <option value=""><?= __('Doanh thu Nhóm') ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 py-2">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            <?= __('Doanh thu mục tiêu') ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text currency-symbol">
                                                                    <?= ($market_vendor['commission_type'] == 'percentage') ? '%'  : $CurrencySymbol ?>
                                                                </span>
                                                            </div>
                                                            <input class="form-control" name="market_vendor[commission_sale]" type="number" value="<?= isset($market_vendor) ? $market_vendor['commission_sale'] : '' ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 py-2">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('Điều kiện tuyển dụng') ?></label>
                                                        <select name="market_vendor[commission_type]" class="form-control">
                                                            <option value=""><?= __('Chọn loại tuyển dụng') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'percentage') ? 'selected' : '' ?> value="percentage"><?= __('Tuyển trực tiếp') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'fixed') ? 'selected' : '' ?> value="fixed"><?= __('Tuyển gián tiếp') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'fixed') ? 'selected' : '' ?> value="fixed"><?= __('Tuyển tuyến dưới') ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 py-2">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            <?= __('Số lượng mục tiêu') ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text currency-symbol">#</span>
                                                            </div>
                                                            <input class="form-control" name="market_vendor[commission_sale]" type="number" value="<?= isset($market_vendor) ? $market_vendor['commission_sale'] : '' ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 py-2">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('Loại Hoa hồng từ Doanh thu Nhóm') ?></label>
                                                        <select name="market_vendor[commission_type]" class="form-control">
                                                            <option value=""><?= __('Chọn loại Hoa hồng') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'percentage') ? 'selected' : '' ?> value="percentage"><?= __('admin.percentage') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'fixed') ? 'selected' : '' ?> value="fixed"><?= __('admin.fixed') ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 py-2">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            <?= __('Thưởng Hoa hồng') ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text currency-symbol">
                                                                    <?= ($market_vendor['commission_type'] == 'percentage') ? '%'  : $CurrencySymbol ?>
                                                                </span>
                                                            </div>
                                                            <input class="form-control" name="market_vendor[commission_sale]" type="number" value="<?= isset($market_vendor) ? $market_vendor['commission_sale'] : '' ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label"><?= __('Kích hoạt') ?></label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input update_all_settings" type="checkbox" <?= $vendor['storestatus'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="storestatus" data-setting_type="vendor">
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header bg-secondary text-white text-center">
                                            <h5 class="text-center">
                                                <?= __('Chính sách Thưởng Doanh Thu Toàn Hệ Thống') ?></h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6 py-2">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('Điều kiện hưởng doanh thu') ?></label>
                                                        <select name="market_vendor[commission_type]" class="form-control">
                                                            <option value=""><?= __('Chọn loại doanh thu') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'percentage') ? 'selected' : '' ?> value="percentage"><?= __('Doanh thu Cá nhân') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'fixed') ? 'selected' : '' ?> value="fixed"><?= __('Doanh thu Trực tiếp') ?></option>
                                                            <option value=""><?= __('Doanh thu Gián tiếp') ?></option>
                                                            <option value=""><?= __('Doanh thu tuyến Dưới') ?></option>
                                                            <option value=""><?= __('Doanh thu Nhóm') ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 py-2">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            <?= __('Doanh thu mục tiêu') ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text currency-symbol">
                                                                    <?= ($market_vendor['commission_type'] == 'percentage') ? '%'  : $CurrencySymbol ?>
                                                                </span>
                                                            </div>
                                                            <input class="form-control" name="market_vendor[commission_sale]" type="number" value="<?= isset($market_vendor) ? $market_vendor['commission_sale'] : '' ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 py-2">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('Điều kiện tuyển dụng') ?></label>
                                                        <select name="market_vendor[commission_type]" class="form-control">
                                                            <option value=""><?= __('Chọn loại tuyển dụng') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'percentage') ? 'selected' : '' ?> value="percentage"><?= __('Tuyển trực tiếp') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'fixed') ? 'selected' : '' ?> value="fixed"><?= __('Tuyển gián tiếp') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'fixed') ? 'selected' : '' ?> value="fixed"><?= __('Tuyển tuyến dưới') ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 py-2">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            <?= __('Số lượng mục tiêu') ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text currency-symbol">#</span>
                                                            </div>
                                                            <input class="form-control" name="market_vendor[commission_sale]" type="number" value="<?= isset($market_vendor) ? $market_vendor['commission_sale'] : '' ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 py-2">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('Loại Hoa hồng từ Doanh thu Nhóm') ?></label>
                                                        <select name="market_vendor[commission_type]" class="form-control">
                                                            <option value=""><?= __('Chọn loại Hoa hồng') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'percentage') ? 'selected' : '' ?> value="percentage"><?= __('admin.percentage') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'fixed') ? 'selected' : '' ?> value="fixed"><?= __('admin.fixed') ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 py-2">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            <?= __('Thưởng Hoa hồng') ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text currency-symbol">
                                                                    <?= ($market_vendor['commission_type'] == 'percentage') ? '%'  : $CurrencySymbol ?>
                                                                </span>
                                                            </div>
                                                            <input class="form-control" name="market_vendor[commission_sale]" type="number" value="<?= isset($market_vendor) ? $market_vendor['commission_sale'] : '' ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane py-3" id="vendor_deposite_setting">
                            <div class="form-group">
                                <h6>
                                    <div class="mybadge bg-info text-white mb-2 text-wrap rounded px-2 py-1 vendor-deposit-on-message <?= ($vendor['depositstatus']) ? '' : 'd-none' ?>">
                                        <?= __('Đang bật áp dụng thưởng đồng chia cho các thành viên đạt điều kiện Cấp bậc - Doanh số - Tuyển dụng') ?>
                                    </div>
                                </h6>

                                <h6>
                                    <div class="mybadge bg-danger text-white rounded mb-2 text-wrap px-2 py-1 vendor-deposit-off-message <?= ($vendor['depositstatus']) ? 'd-none' : '' ?>">
                                        <?= __('Đang không áp dụng thưởng đồng chia') ?>
                                    </div>
                                </h6>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label"><?= __('Kích hoạt') ?></label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input update_all_settings" type="checkbox" <?= $vendor['storestatus'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="storestatus" data-setting_type="vendor">
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header bg-secondary text-white text-center">
                                            <h5 class="text-center">
                                                <?= __('Chính sách đồng chia') ?></h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-4 py-2">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('Nguồn trả thưởng đồng chia') ?></label>
                                                        <select name="market_vendor[commission_type]" class="form-control">
                                                            <option value=""><?= __('Chọn nguồn trả thưởng') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'percentage') ? 'selected' : '' ?> value="percentage"><?= __('Doanh thu Toàn hệ thống') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'fixed') ? 'selected' : '' ?> value="fixed"><?= __('Doanh thu Chi nhánh') ?></option>
                                                            <option value=""><?= __('Doanh thu Nhánh') ?></option>
                                                            <option value=""><?= __('Doanh thu Nhóm') ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 py-2">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('Người được hưởng đồng chia') ?></label>
                                                        <select name="market_vendor[commission_type]" class="form-control">
                                                            <option value=""><?= __('Chọn người hưởng') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'percentage') ? 'selected' : '' ?> value="percentage"><?= __('Mọi người') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'fixed') ? 'selected' : '' ?> value="fixed"><?= __('Thành viên Chi nhánh') ?></option>
                                                            <option value=""><?= __('Thành viên Nhánh') ?></option>
                                                            <option value=""><?= __('Thành viên Nhóm') ?></option>
                                                            <option value=""><?= __('Thành viên Cấp') ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 py-2">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('Chọn cấp ') ?></label>
                                                        <select name="market_vendor[commission_type]" class="form-control">
                                                            <option value=""><?= __('Chọn người hưởng') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'percentage') ? 'selected' : '' ?> value="percentage"><?= __('Mọi người') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'fixed') ? 'selected' : '' ?> value="fixed"><?= __('Thành viên Chi nhánh') ?></option>
                                                            <option value=""><?= __('Thành viên Nhánh') ?></option>
                                                            <option value=""><?= __('Thành viên Nhóm') ?></option>
                                                            <option value=""><?= __('Thành viên Cấp') ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 py-2">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('Điều kiện hưởng đồng chia') ?></label>
                                                        <select name="market_vendor[commission_type]" class="form-control">
                                                            <option value=""><?= __('Chọn điều kiện doanh thu') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'percentage') ? 'selected' : '' ?> value="percentage"><?= __('Doanh thu Cá nhân') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'fixed') ? 'selected' : '' ?> value="fixed"><?= __('Doanh thu Trực tiếp') ?></option>
                                                            <option value=""><?= __('Doanh thu Gián tiếp') ?></option>
                                                            <option value=""><?= __('Doanh thu tuyến Dưới') ?></option>
                                                            <option value=""><?= __('Doanh thu Nhóm') ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 py-2">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            <?= __('Doanh thu mục tiêu') ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text currency-symbol">
                                                                    <?= ($market_vendor['commission_type'] == 'percentage') ? '%'  : $CurrencySymbol ?>
                                                                </span>
                                                            </div>
                                                            <input class="form-control" name="market_vendor[commission_sale]" type="number" value="<?= isset($market_vendor) ? $market_vendor['commission_sale'] : '' ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 py-2">
                                                    <div class="form-group">
                                                        <label class="control-label"><?= __('Điều kiện tuyển dụng đồng chia') ?></label>
                                                        <select name="market_vendor[commission_type]" class="form-control">
                                                            <option value=""><?= __('Chọn điều kiện tuyển dụng') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'percentage') ? 'selected' : '' ?> value="percentage"><?= __('Tuyển trực tiếp') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'fixed') ? 'selected' : '' ?> value="fixed"><?= __('Tuyển gián tiếp') ?></option>
                                                            <option <?= ($market_vendor['commission_type'] == 'fixed') ? 'selected' : '' ?> value="fixed"><?= __('Tuyển tuyến dưới') ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 py-2">
                                                    <div class="form-group">
                                                        <label class="control-label">
                                                            <?= __('Số lượng mục tiêu') ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text currency-symbol">#</span>
                                                            </div>
                                                            <input class="form-control" name="market_vendor[commission_sale]" type="number" value="<?= isset($market_vendor) ? $market_vendor['commission_sale'] : '' ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane py-3" id="vendor_permission_setting">
                            <div class="form-group">
                                <div class="text-wrap rounded bg-info text-white mb-2 px-2 py-1">
                                    <?= __('Cài đặt các cấu hình và chính sách cho tính Thưởng khác.') ?>
                                </div>
                                <div class="form-group row mt-4">
                                    <label class="control-label col-sm-5">
                                        <?= __('Tính hoa hồng doanh thu sau chiết khấu') ?>
                                    </label>
                                    <div class="form-check form-switch col-sm-2">
                                        <input class="form-check-input update_all_settings" type="checkbox" <?= $market_vendor['marketaddnewprogram'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="marketaddnewprogram" data-setting_type="market_vendor">
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <label class="control-label col-sm-5">
                                        <?= __('Tính hoa hồng doanh thu sau thuế') ?>
                                    </label>
                                    <div class="form-check form-switch col-sm-2">
                                        <input class="form-check-input update_all_settings" type="checkbox" <?= $market_vendor['marketaddnewcampaign'] == 1 ? 'checked' : '' ?> data-toggle="toggle" data-size="normal" data-on="<?= __('admin.status_on'); ?>" data-off="<?= __('admin.status_off'); ?>" data-setting_key="marketaddnewcampaign" data-setting_type="market_vendor">
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
            $("input[name='market_vendor[commission_sale]']").siblings('.input-group-prepend').find('.input-group-text').text('%');
        else
            $("input[name='market_vendor[commission_sale]']").siblings('.input-group-prepend').find('.input-group-text').text('<?= $CurrencySymbol ?>');
    })

    $("#setting-form").on('submit', function() {
        $("#setting-form .alert-error").remove();
        var affiliate_cookie = parseInt($(".input-affiliate_cookie").val());
        if (affiliate_cookie <= 0 || affiliate_cookie > 365) {
            $(".input-affiliate_cookie").after("<div class='alert alert-danger alert-error'><?= __('admin.days_between_1_and_365'); ?></div>");
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