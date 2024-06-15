<script type="text/javascript">
    var tel_input = false;
</script>

<link rel="stylesheet" href="<?= base_url('assets/plugins/tel/css/intlTelInput.css') ?>?v=<?= av() ?>">
<script src="<?= base_url('assets/plugins/tel/js/intlTelInput.js') ?>"></script>

<form id="addClientForm" method="post" action="" enctype="multipart/form-data">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-secondary text-white d-flex justify-content-between">
                    <h5><?= __('admin.page_title_addbranch') ?></h5>
                    <button id="toggle-uploader" class="btn btn-light" type="submit"><?= __('admin.save') ?></button>
                </div>
                <div class="card-body">
                    <input type="hidden" name="branch_id" value="<?= isset($branch['id']) ? $branch['id'] : '' ?>">
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-sm-2 col-form-label"><?= __('admin.branch_name') ?></label>
                        <div class="col-sm-10">
                            <input name="name" value="<?php echo $branch->name; ?>" class="form-control" required="required" type="text">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label"><?= __('admin.full_address') ?></label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="address" placeholder="<?= __('admin.full_address') ?>" rows="4"><?= $branch->address ?></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row ">
                        <label for="example-text-input" class="col-sm-2 col-form-label"><?= __('admin.phone') ?></label>
                        <div class="col-sm-10 form-group">
                            <input type="hidden" name='countrycode' id="countrycode" value="" class="form-control" placeholder="">

                            <input onkeypress="return isNumberKey(event);" id="phone" class="form-control custom_input tel_input" name="phone" type="text" value="<?php echo $branch->phone; ?>" <?php echo empty($branch->phone) ?  'required="required"' : ''; ?>>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label"><?= __('admin.location') ?></label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="location" placeholder="<?= __('admin.location') ?>" rows="4"><?= $branch->location ?></textarea>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        window.tel_inputphone = intlTelInput(document.querySelector("#phone"), {
            initialCountry: "auto",
            utilsScript: "<?= base_url('/assets/plugins/tel/js/utils.js?1562189064761') ?>",
            separateDialCode: true,
            geoIpLookup: function(success, failure) {
                $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "US";
                    success(countryCode);
                });
            },
        });
    });
    $(document).ready(function() {
        $("#addClientForm").submit(function(e) {
            $this = $(this);

            var is_valid = 0;
            var need_valid = 0;

            $(".tel_input").each(function() {

                let this_is_valid = true;
                $(this).parents(".form-group").removeClass("has-error");
                $(this).parents(".form-group").find(".text-danger").remove();

                if (window["tel_input" + $(this).attr('id')]) {

                    var errorMap = ['<?= __('user.invalid_number') ?>', '<?= __('user.invalid_country_code') ?>', '<?= __('user.too_short') ?>', '<?= __('user.too_long') ?>', '<?= __('user.invalid_number') ?>'];
                    var errorInnerHTML = '';
                    if ($(this).val().trim()) {
                        need_valid++;
                        if (window["tel_input" + $(this).attr('id')].isValidNumber()) {

                            window["tel_input" + $(this).attr('id')].setNumber($(this).val().trim());

                            is_valid++;
                            this_is_valid = true;
                        } else {
                            var errorCode = window["tel_input" + $(this).attr('id')].getValidationError();
                            errorInnerHTML = errorMap[errorCode];
                            this_is_valid = false;
                        }
                    } else {
                        if ($(this).attr('required') !== undefined) {
                            need_valid++;
                            this_is_valid = false;
                            errorInnerHTML = 'The Mobile Number field is required.';
                        }
                    }

                    if (!this_is_valid) {
                        $(this).parents(".form-group").addClass("has-error");
                        $(this).parents(".form-group").find('> div').after("<span class='text-danger'>" + errorInnerHTML + "</span>");

                    }
                }
            });
            if (is_valid == 1) {
                $(".tel_input").each(function() {
                    if ($(this).val().trim() && window["tel_input" + $(this).attr('id')].isValidNumber()) {
                        country_id = window["tel_input" + $(this).attr('id')].getSelectedCountryData().dialCode;

                        $("#countrycode").val(country_id);
                    }
                });
                return true;
            } else {
                return false;
            }


        });
    });
</script>

<script type="text/javascript">
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode != 46 && charCode != 45 && charCode > 31 &&
            (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
    renderStateAndCart('<?= $branch->ucountry ?>');
    $("#country").change(function() {
        renderStateAndCart($(this).val())
    });

    function renderStateAndCart(countryCode) {
        $.ajax({
            url: '<?= base_url('admincontrol/getState') ?>',
            type: 'POST',

            data: {
                country_id: countryCode,
                isId: true
            },
            beforeSend: function() {
                $('[name="state"]').prop("disabled", true);
            },
            complete: function() {
                $('[name="state"]').prop("disabled", false);
            },
            success: function(html) {

                $('[name="state"]').html(html);
                if ('<?= $branch->state ?>' != "")
                    $('[name="state"]').val('<?= $branch->state ?>')
            },
        });
    }
</script>