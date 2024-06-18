<div class="row">
    <div class="col-12">
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4><?= __('admin.manage_branch') ?></h4>
                <a class="btn btn-primary" href="<?= base_url('adminbranch') ?>"><?= __('admin.cancel') ?></a>
            </div>
            <div class="card-body">
                <form id="admin-form">
                    <input type="hidden" name="branch_id" value="<?= !empty($branch) ? $branch->id : '' ?>">
                    <div class="form-group">
                        <label><?= __('admin.name') ?></label>
                        <input placeholder="<?= __('admin.enter_branch_name') ?>" name="name" value="<?= !empty($branch) ? $branch->name : '' ?>" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label><?= __('admin.address') ?></label>
                        <input placeholder="<?= __('admin.enter_branch_address') ?>" name="address" value="<?= !empty($branch) ? $branch->address : '' ?>" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label><?= __('admin.phone') ?></label>
                        <input placeholder="<?= __('admin.enter_branch_phone') ?>" name="phone" value="<?= !empty($branch) ? $branch->phone : '' ?>" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label><?= __('admin.location') ?></label>
                        <input placeholder="<?= __('admin.enter_branch_location') ?>" name="location" value="<?= !empty($branch) ? $branch->location : '' ?>" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-submit"><?= __('admin.submit') ?></button>
                        <span class="loading-submit"></span>
                    </div>
                </form>
            </div>
        </div> 
    </div> 
</div>

<script type="text/javascript">
document.querySelector(".btn-submit").addEventListener('click', function(evt){
    evt.preventDefault();
    
    var form = document.querySelector("#admin-form");
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '<?= base_url('adminbranch/save') ?>', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            var result = JSON.parse(xhr.responseText);
            if (result.location) {
                window.location = result.location;
            } else {
                for (var key in result.errors) {
                    form.querySelector('[name="' + key + '"]').classList.add('is-invalid');
                    form.querySelector('[name="' + key + '"]').nextElementSibling.textContent = result.errors[key];
                }
            }
        }
    };
    xhr.send(formData);
});
</script>
