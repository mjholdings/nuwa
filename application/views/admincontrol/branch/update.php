
<div class="content-body">
        <div class="card award-level">
            <div class="card-header bg-secondary text-white d-flex justify-content-between">
                <h5><?= __('Sửa thông tin chinh nhánh') ?></h5>
                <a id="toggle-uploader" href="<?= base_url('admincontrol/branch') ?>" class="btn btn-sm btn-light">
                    <?= __('Quay lại') ?>
                </a>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-content">
                        <div class="mb-3">
                            <label class="form-label">
                                <?= __('Tên chi nhánh') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Tên chi nhánh') ?>"></span>
                            </label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="name" id="name" value="<?= $branch['name'] ?>" placeholder="<?= __('Nhập tên chi nhánh') ?>">
                                <input type="hidden" class="form-control" name="is_default" id="is_default" value="<?= $branch['is_default'] ?>" >
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                <?= __('Địa chỉ') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Địa chỉ') ?>"></span>
                            </label>
                            <div class="input-group">                                
                                <textarea class="form-control" id="address" name="address" rows="3" cols="40" placeholder="<?= __('Địa chỉ chi nhánh') ?>">
                                <?= $branch['address'] ?>
                                </textarea>
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                <?= __('Số điện thoại') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Điện thoại chi nhánh') ?>"></span>
                            </label>
                            <div class="input-group">                                
                                <input type="text" class="form-control" name="phone"  id="phone" value="<?= $branch['phone'] ?>" placeholder="<?= __('admin.phone') ?>">
                            </div>
                            <p class="error-message"></p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                <?= __('Vị trí - Google Map') ?>
                                <span class="field-description" data-bs-toggle="tooltip" title="<?= __('Vị trí của Google Map') ?>"></span>
                            </label>
                            <div class="input-group">                                
                                <textarea class="form-control" id="location" name="location" rows="3" cols="40" placeholder="<?= __('Vị trí của Google Map') ?>">
                                <?= $branch['location'] ?> 
                                </textarea>
                            </div>
                            <p class="error-message"></p>
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
    $("button[type='submit']").on('click',function(e){
        e.preventDefault();
        $this = $(this);
        let form = $this.parents('form');
        let url = form.attr('action');

        $.ajax({
            type:'POST',
            dataType:'json',
            data:form.serialize(),
            success:function(result){
                $("input").removeClass('error');
                $(".error-message").text('');

                if(result.validation){
                    $.each(result.validation,function(key,value){
                        $("input[name='"+key+"']").addClass('error');
                        $("input[name='"+key+"']").siblings('.error-message').text(value);
                        showPrintMessage(value, 'error');
                    }) 
                } else {
                        if (result.status) {
                          showPrintMessage(result.message, 'success');
                          let redirect = $this.data('redirect');
                          if (redirect) {
                            setTimeout(function() {
                            window.location = '<?= base_url("admincontrol/branch") ?>';
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
